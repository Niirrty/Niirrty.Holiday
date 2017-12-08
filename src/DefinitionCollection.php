<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


declare( strict_types = 1 );


namespace Niirrty\Holiday;


use Niirrty\Date\DateTime;


/**
 * Defines a collection of holiday definitions.
 */
class DefinitionCollection implements \ArrayAccess, \IteratorAggregate, \Countable
{


   // <editor-fold desc="= = =   P R I V A T E   F I E L D S   = = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * The country name (e.g. 'Deutschland' or 'United Kingdom')
    *
    * @type string
    */
   private $_countryName;

   /**
    * The country ISO 2 char ID (e.g. 'de' or 'fr')
    *
    * @type string
    */
   private $_countryId;

   /**
    * All holiday definition records.
    *
    * @type \Niirrty\Holiday\Definition[]
    */
   private $_data;

   /**
    * All global callback functions. Each must accept an single parameter $year and must return an
    * \Niirrty\Date\DateTime instance. The keys are the names where the callbacks are accessible.
    *
    * 'easter_sunday' is the only already known predefined callback.
    *
    * @type array
    */
   private $_globalCallbacks;

   /**
    * A numeric indicated array that defines the names of all regions for current country.
    *
    * It makes sense to define the region names with the default language. :-)
    *
    * @type array
    */
   private $_regions;

   // </editor-fold>


   // <editor-fold desc="= = =   P U B L I C   C O N S T R U C T O R   = = = = = = = = = = = = = = = = = = = = =">

   /**
    * HolidayCollection constructor.
    *
    * @param  string $countryName The country name (e.g. 'Deutschland' or 'United Kingdom')
    * @param  string $countryId   The country ISO 2 char ID (e.g.: 'de', 'fr')
    */
   public function __construct( string $countryName, string $countryId )
   {

      $this->_countryName     = $countryName;
      $this->_countryId       = $countryId;
      $this->_data            = [];
      $this->_globalCallbacks = [
         'easter_sunday' => function( $year )
            {
               return ( new DateTime() )->setTimestamp( \easter_date( $year ) );
            }
      ];
      $this->_regions         = [];

   }

   // </editor-fold>


   // <editor-fold desc="= = =   P U B L I C   M E T H O D S   = = = = = = = = = = = = = = = = = = = = = = = = =">


   // <editor-fold desc="= = =   I M P L E M E N T   ' I t e r a t o r A g g r e g a t e '   = = = = = = = = = =">

   /**
    * Retrieve an external iterator
    *
    * @link  http://php.net/manual/en/iteratoraggregate.getiterator.php
    * @return \Niirrty\Holiday\Definition[] An instance of an object implementing <b>Iterator</b> or <b>Traversable</b>
    */
   public function getIterator()
   {

      /** @noinspection PhpIncompatibleReturnTypeInspection */
      return new \ArrayIterator( $this->_data );

   }

   // </editor-fold>


   // <editor-fold desc="= = =   I M P L E M E N T   ' A r r a y A c c e s s '   = = = = = = = = = = = = = = = =">

   /**
    * Whether a offset exists.
    *
    * @param  int $offset An offset to check for.
    * @return boolean true on success or false on failure. The return value will be casted to boolean if non-boolean
    *                 was returned.
    * @link  http://php.net/manual/en/arrayaccess.offsetexists.php
    */
   public function offsetExists( $offset )
   {

      return isset( $this->_data[ $offset ] );

   }

   /**
    * Offset to retrieve.
    *
    * @param  int $offset The offset to retrieve.
    * @return \Niirrty\Holiday\Definition
    * @link   http://php.net/manual/en/arrayaccess.offsetget.php
    */
   public function offsetGet( $offset )
   {

      return $this->_data[ $offset ];

   }

   /**
    * Offset to set.
    *
    * @param  int                    $offset The offset to assign the value to.
    * @param  \Niirrty\Holiday\Definition $value  The value to set.
    * @throws \Niirrty\Holiday\Exception
    * @link   http://php.net/manual/en/arrayaccess.offsetset.php
    */
   public function offsetSet( $offset, $value )
   {

      if ( ! ( $value instanceof Holiday ) )
      {
         throw new Exception( 'Can not set an holiday if it is not an Holiday instance!' );
      }

      if ( \is_null( $offset ) )
      {
         $this->_data[] = $value;
      }
      else
      {
         $this->_data[ $offset ] = $value;
      }

   }

   /**
    * Offset to unset.
    *
    * @param int $offset The offset to unset.
    * @link  http://php.net/manual/en/arrayaccess.offsetunset.php
    */
   public function offsetUnset( $offset )
   {

      unset( $this->_data[ $offset ] );

   }

   // </editor-fold>


   // <editor-fold desc="= = =   I M P L E M E N T   ' C o u n t a b l e '   = = = = = = = = = = = = = = = = = =">

   /**
    * Count elements of an object.
    *
    * @return int The custom count as an integer. The return value is cast to an integer.
    * @link   http://php.net/manual/en/countable.count.php
    */
   public function count()
   {

      return \count( $this->_data );

   }

   // </editor-fold>


   // <editor-fold desc="= = =   G E T T E R S   = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * Gets a numeric indicated array that defines the names of all regions/provinces/states for current country.
    *
    * @return array
    */
   public function getRegions() : array
   {

      return $this->_regions;

   }

   /**
    * Gets the country name (e.g. 'Deutschland' or 'United Kingdom')
    *
    * @return string
    */
   public function getCountryName() : string
   {

      return $this->_countryName;

   }

   /**
    * Gets the country ISO 2 char ID (e.g. 'de' or 'fr')
    *
    * @return string
    */
   public function getCountryId() : string
   {

      return $this->_countryId;

   }

   /**
    * Get the names of all an registered global callbacks for getting a dynamic holiday date.
    *
    * 'easter_sunday' is the only already known predefined callback.
    *
    * @return array
    */
   public function getGlobalCallbackNames() : array
   {

      return \array_keys( $this->_globalCallbacks );

   }

   /**
    * Gets all valid holidays for defined year and region(s).
    *
    * @param  int         $year          The year to get the holiday for
    * @param  string|null $languageId    The 2 char ISO language ID for holiday name language (usable default languages
    *                                    are 'cz', 'de', 'en', 'es', 'fr', 'it', 'jp', 'pt'. If empty or unknown the
    *                                    default name is used.
    * @param  array       $regionIndexes The indexes of the required region
    * @return \Niirrty\Holiday\HolidayCollection
    */
   public function getHolidays( int $year, ?string $languageId = null, array $regionIndexes = [] ) : HolidayCollection
   {

      $holidays = HolidayCollection::Create( $year, $this->_countryName, $this->_countryId )
                                   ->setRegions( $this->_regions );

      foreach ( $this->_data as $holiday )
      {

         $holiday = $holiday->toHoliday( $year, $this->_globalCallbacks, $regionIndexes, $languageId );

         if ( null === $holiday )
         {
            // ignore holidays that are not valid
            continue;
         }

         // OK this holiday is valid

         $holidays->add( $holiday );

      }

      return $holidays;

   }

   // </editor-fold>


   // <editor-fold desc="= = =   S E T T E R S   = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * Sets a numeric indicated array that defines the names of all regions/provinces/states for current country.
    *
    * @param  array $regions
    * @return \Niirrty\Holiday\DefinitionCollection
    */
   public function setRegions( array $regions ) : DefinitionCollection
   {

      $this->_regions = $regions;

      return $this;

   }

   // </editor-fold>


   // <editor-fold desc="= = =   O T H E R   P U B L I C   M E T H O D S   = = = = = = = = = = = = = = = = = = =">

   /**
    * Extract the names of all regions with the defined indexes.
    *
    * @param  array $regionIndexes The indexes of the required regions
    * @return array
    */
   public function extractRegionNames( array $regionIndexes ) : array
   {

      $names = [];

      if ( \count( $regionIndexes ) < 1 || $regionIndexes[ 0 ] === -1 )
      {
         return $this->_regions;
      }

      foreach ( $regionIndexes as $regionIndex )
      {
         if ( ! isset( $this->_regions[ $regionIndex ] ) )
         {
            continue;
         }
         $names[ $regionIndex ] = $this->_regions[ $regionIndex ];
      }

      return $names;

   }

   /**
    * Gets if an region with the defined index or name exists.
    *
    * @param  string|int $region The name or index of the required region
    * @return bool
    */
   public function hasRegion( $region ) : bool
   {

      if ( \is_int( $region ) )
      {
         return isset( $this->_regions[ $region ] );
      }

      return ( false !== \array_search( $region, $this->_regions ) );

   }

   /**
    * Gets the index of an region with the defined name, or FALSE if it not exists.
    *
    * @param  string $region The name of the required region
    * @return int|FALSE
    */
   public function indexOfRegion( string $region )
   {

      return \array_search( $region, $this->_regions );

   }

   /**
    * Gets if the country has registered some known regions.
    *
    * @return bool
    */
   public function hasRegions() : bool
   {

      return \count( $this->_regions ) > 0;

   }

   /**
    * Add an global callback function that is used to calculate an specific dynamic date for usage
    * as base date for calculate an movable holiday.
    *
    * 'easter_sunday' is the only already known predefined callback.
    *
    * Are global callback is useful if the calculated dynamic date is the base of many holidays.
    * So the callback should only be declared at a single place.
    *
    * @param  string   $name             The callback name.
    * @param  callable $callbackFunction The callback (must accept at least one parameter $year
    * @return \Niirrty\Holiday\DefinitionCollection
    */
   public function registerGlobalCallback( string $name, callable $callbackFunction ) : DefinitionCollection
   {

      $this->_globalCallbacks[ $name ] = $callbackFunction;

      return $this;

   }

   /**
    * Removes an registered global callback.
    *
    * @param  string $name THe name of the callback. Empty $name will remove all registered callbacks.
    * @return \Niirrty\Holiday\DefinitionCollection
    * @throws \Niirrty\Holiday\Exception If 'easter_sunday' should be deleted.
    */
   public function removeGlobalCallback( string $name = null ) : DefinitionCollection
   {

      if ( empty( $name ) )
      {

         $this->_globalCallbacks = [
            'easter_sunday' => $this->_globalCallbacks[ 'easter_sunday' ]
         ];

         return $this;

      }

      if ( 'easter_sunday' === $name )
      {
         throw new Exception( 'Can not delete the easter sunday base callback!' );
      }

      unset( $this->_globalCallbacks[ $name ] );

      return $this;

   }

   /**
    * Add an holiday Definition to the collection.
    *
    * @param  \Niirrty\Holiday\Definition $definition
    * @return \Niirrty\Holiday\DefinitionCollection
    */
   public function add( Definition $definition ) : DefinitionCollection
   {

      $this->_data[ $definition->getIdentifier() ] = $definition;

      return $this;

   }

   /**
    * Add one or more holiday Definitions to the collection.
    *
    * @param  \Niirrty\Holiday\Definition[] ...$definitions
    * @return \Niirrty\Holiday\DefinitionCollection
    */
   public function addRange( Definition ...$definitions ) : DefinitionCollection
   {

      foreach ( $definitions as $definition )
      {
         $this->_data[ $definition->getIdentifier() ] = $definition;
      }

      return $this;

   }

   // </editor-fold>


   // </editor-fold>


   // <editor-fold desc="= = =   P U B L I C   S T A T I C   M E T H O D S   = = = = = = = = = = = = = = = = = =">

   /**
    * Creates a new DefinitionCollection instance and returns it.
    *
    * @param  string $countryName The country name (e.g. 'Deutschland' or 'United Kingdom')
    * @param  string $countryId   The 2 char ISO country ID (e.g.: 'de', 'fr')
    * @return \Niirrty\Holiday\DefinitionCollection
    */
   public static function Create( string $countryName, string $countryId ) : DefinitionCollection
   {

      return new self( $countryName, $countryId );

   }

   // </editor-fold>


}

