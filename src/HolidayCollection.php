<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


declare( strict_types = 1 );


namespace Niirrty\Holiday;


/**
 * Class HolidayCollection.
 */
class HolidayCollection implements \ArrayAccess, \IteratorAggregate, \Countable
{


   // <editor-fold desc="= = =   P R I V A T E   F I E L D S   = = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * The country name (e.g. 'Deutschland' or 'United Kingdom')
    *
    * @type string
    */
   private $country;

   /**
    * The country default language ISO 2 char ID (e.g.: 'de', 'fr')
    *
    * @type string
    */
   private $defaultLanguage;

   /**
    * All Holiday records.
    *
    * @type Holiday[] Array
    */
   private $records;

   /**
    * All global callback functions. Each must accept an single parameter $year
    * and must return an \DateTime instance.
    *
    * @type array
    */
   private $globalCallbacks;

   /**
    * A numeric indicated array that defines the names of all regions for current country.
    *
    * It makes sense to define the region names with the default language. :-)
    *
    * @type array
    */
   private $regions;

   // </editor-fold>


   // <editor-fold desc="= = =   P U B L I C   C O N S T R U C T O R   = = = = = = = = = = = = = = = = = = = = =">

   /**
    * HolidayCollection constructor.
    *
    * @param  string $country         The country name (e.g. 'Deutschland' or 'United Kingdom')
    * @param  string $defaultLanguage The country default language ISO 2 char ID (e.g.: 'de', 'fr')
    */
   public function __construct( string $country, string $defaultLanguage )
   {

      $this->country         = $country;
      $this->defaultLanguage = $defaultLanguage;
      $this->records         = [];
      $this->globalCallbacks = [];
      $this->regions         = [];

   }

   // </editor-fold>


   // <editor-fold desc="= = =   P U B L I C   M E T H O D S   = = = = = = = = = = = = = = = = = = = = = = = = =">


   // <editor-fold desc="= = =   I M P L E M E N T   ' I t e r a t o r A g g r e g a t e '   = = = = = = = = = =">

   /**
    * Retrieve an external iterator
    *
    * @link  http://php.net/manual/en/iteratoraggregate.getiterator.php
    * @return Holiday[] An instance of an object implementing <b>Iterator</b> or <b>Traversable</b>
    */
   public function getIterator()
   {

      /** @noinspection PhpIncompatibleReturnTypeInspection */
      return new \ArrayIterator( $this->records );

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

      return isset( $this->records[ $offset ] );

   }

   /**
    * Offset to retrieve.
    *
    * @param  int $offset The offset to retrieve.
    * @return Holiday
    * @link   http://php.net/manual/en/arrayaccess.offsetget.php
    */
   public function offsetGet( $offset )
   {

      return $this->records[ $offset ];

   }

   /**
    * Offset to set.
    *
    * @param  int                    $offset The offset to assign the value to.
    * @param  \Niirrty\Holiday\Holiday $value  The value to set.
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
         $this->records[] = $value;
      }
      else
      {
         $this->records[ $offset ] = $value;
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

      unset( $this->records[ $offset ] );

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

      return \count( $this->records );

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

      return $this->regions;

   }

   /**
    * Gets the country default language ISO 2 char ID (e.g.: 'de', 'fr')
    *
    * @return string
    */
   public function getDefaultLanguage() : string
   {

      return $this->defaultLanguage;

   }

   /**
    * Gets the country name (e.g. 'Deutschland' or 'United Kingdom')
    *
    * @return string
    */
   public function getCountryName() : string
   {

      return $this->defaultLanguage;

   }

   /**
    * Get the names of all an registered global callbacks.
    *
    * @return array
    */
   public function getGlobalCallbackNames() : array
   {

      return \array_keys( $this->globalCallbacks );

   }

   /**
    * Gets an array with all valid holidays for defined year and region.
    *
    * The returned array is numeric indicated. Each holiday element is an associative array with the keys:
    *
    * - date:        An \DateTime instance of the holiday date
    * - name:        The holiday name. If an language is defined and exists, it have the requested language,
    *                Otherwise it uses the default language
    * - description: An optional holiday description text
    * - regions:     An associative array with the indexes of all regions where the holiday is valid. index -1 means all
    *
    * @param  int         $year        The year to get the holiday for
    * @param  int         $regionIndex The index of the required region (-1 means all)
    * @param  string|null $language    The required holiday name language (empty means the default language)
    * @return array
    * @throws \Niirrty\Holiday\Exception
    */
   public function getHolidays( int $year, int $regionIndex = -1, string $language = null ) : array
   {

      if ( empty( $language ) )
      {
         $language = $this->defaultLanguage;
      }

      $holidays = [];

      foreach ( $this->records as $holiday )
      {

         $matchingName = null;

         if ( ! $holiday->isRegion( $regionIndex, $matchingName ) )
         {
            // ignore holidays that are not valid for defined region
            continue;
         }

         if ( false === ( $dt = $holiday->getDate( $year, $this->globalCallbacks, true ) ) )
         {
            // Not an valid holiday for current year
            continue;
         }

         // OK this holiday is valid

         // Get the name for declared language
         if ( $language === $this->defaultLanguage )
         {
            /** @noinspection PhpUndefinedMethodInspection */
            $name = $matchingName->getName();
         }
         else
         {
            if ( false === ( $name = $holiday->getNameTranslated( $language ) ) )
            {
               /** @noinspection PhpUndefinedMethodInspection */
               $name = $matchingName->getName();
            }
         }

         /** @noinspection PhpUndefinedMethodInspection */
         $holidays[] = [
            'date'        => $dt,
            'name'        => $name,
            'description' => $holiday->getDescription() ?? '',
            'regions'     => $matchingName->getRegions()
         ];

      }

      return $holidays;

   }

   // </editor-fold>


   // <editor-fold desc="= = =   S E T T E R S   = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * Sets a numeric indicated array that defines the names of all regions/provinces/states for current country.
    *
    * @param  array $regions
    * @return \Niirrty\Holiday\HolidayCollection
    */
   public function setRegions( array $regions ) : HolidayCollection
   {

      $this->regions = $regions;

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
         return $this->regions;
      }

      foreach ( $regionIndexes as $regionIndex )
      {
         if ( ! isset( $this->regions[ $regionIndex ] ) )
         {
            continue;
         }
         $names[ $regionIndex ] = $this->regions[ $regionIndex ];
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
         return isset( $this->regions[ $region ] );
      }

      return ( false !== \array_search( $region, $this->regions ) );

   }

   /**
    * Gets the index of an region with the defined name, or FALSE if it not exists.
    *
    * @param  string $region The name of the required region
    * @return int|FALSE
    */
   public function indexOfRegion( string $region )
   {

      return \array_search( $region, $this->regions );

   }

   /**
    * Gets if the country has registered some known regions.
    *
    * @return bool
    */
   public function hasRegions() : bool
   {

      return \count( $this->regions ) > 0;

   }

   /**
    * Add an global callback function that is used to calculate an specific dynamic date for usage
    * as base date for calculate an movable holyday.
    *
    * @param  string   $name             The callback name.
    * @param  callable $callbackFunction The callback (must accept at least one parameter $year
    * @return \Niirrty\Holiday\HolidayCollection
    * @throws \Niirrty\Holiday\Exception
    */
   public function registerGlobalCallback( string $name, callable $callbackFunction ) : HolidayCollection
   {

      $this->globalCallbacks[ $name ] = $callbackFunction;

      return $this;

   }

   /**
    * Removes an registered global callback.
    *
    * @param  string $name THe name of the callback. Empty $name will remove all registered callbacks.
    * @return \Niirrty\Holiday\HolidayCollection
    */
   public function removeGlobalCallback( string $name = null ) : HolidayCollection
   {

      if ( empty( $name ) )
      {

         $this->globalCallbacks = [];

         return $this;

      }

      unset( $this->globalCallbacks[ $name ] );

      return $this;

   }

   /**
    * Add an holiday to the collection.
    *
    * @param  \Niirrty\Holiday\Holiday $holiday
    * @return \Niirrty\Holiday\HolidayCollection
    */
   public function add( Holiday $holiday ) : HolidayCollection
   {

      $this->records[] = $holiday;

      return $this;

   }

   /**
    * Add one or more holidays to the collection.
    *
    * @param  \Niirrty\Holiday\Holiday[] ...$holidays
    * @return \Niirrty\Holiday\HolidayCollection
    */
   public function addRange( Holiday ...$holidays ) : HolidayCollection
   {

      $this->records = \array_merge( $this->records, $holidays );

      return $this;

   }

   // </editor-fold>


   // </editor-fold>


   // <editor-fold desc="= = =   P U B L I C   S T A T I C   M E T H O D S   = = = = = = = = = = = = = = = = = =">

   /**
    * Creates a new HolidayCollection instance and returns it.
    *
    * @param  string $country         The country name (e.g. 'Deutschland' or 'United Kingdom')
    * @param  string $defaultLanguage The country default language ISO 2 char ID (e.g.: 'de', 'fr')
    * @return \Niirrty\Holiday\HolidayCollection
    */
   public static function Create( string $country, string $defaultLanguage ) : HolidayCollection
   {

      return new self( $country, $defaultLanguage );

   }

   // </editor-fold>


}

