<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


declare( strict_types = 1 );


namespace Niirrty\Holiday;


/**
 * The name of an holiday including all associated translations and all in relation to
 * the regions where the name is valid.
 */
class HolidayName
{


   // <editor-fold desc="= = =   P R I V A T E   F I E L D S   = = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * The holiday name, associated to default language.
    *
    * @type array
    */
   private $name;

   /**
    * The indexes of all regions, using this holiday name. [ -1 ] means it matches all regions.
    *
    * @type array
    */
   private $regions;

   /**
    * The default name language.
    *
    * @type string
    */
   private $defaultLanguage;

   // </editor-fold>


   // <editor-fold desc="= = =   P U B L I C   C O N S T R U C T O R   = = = = = = = = = = = = = = = = = = = = =">

   /**
    * HolidayName constructor.
    *
    * @param string $defaultLanguage The default holiday name language.
    * @param string $name            The holiday name.
    */
   public function __construct( string $defaultLanguage, string $name )
   {

      $this->name            = $name;
      $this->regions         = [ -1 ];
      $this->defaultLanguage = $defaultLanguage;

   }

   // </editor-fold>


   // <editor-fold desc="= = =   G E T T E R S   = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * Gets the holiday name with defined default language, valid for associated regions.
    *
    * @return string
    */
   public function getName() : string
   {

      return $this->name;

   }

   /**
    * Gets the indexes of all regions, using this holiday name. [ -1 ] means it matches all regions.
    *
    * @return array
    */
   public function getRegions() : array
   {

      return $this->regions;

   }

   /**
    * Gets the default language.
    *
    * @return string
    */
   public function getDefaultLanguage() : string
   {

      return $this->defaultLanguage;

   }

   // </editor-fold>


   // <editor-fold desc="= = =   S E T T E R S   = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * Sets the holiday name.
    *
    * @param  string $name
    * @return HolidayName
    */
   public function setName( string $name ) : HolidayName
   {

      $this->name = $name;

      return $this;

   }

   /**
    * Sets the indexes of all regions, using this holiday name. [ -1 ] means it matches all regions.
    *
    * @param  array $regions
    * @return HolidayName
    */
   public function setRegions( array $regions ) : HolidayName
   {

      $this->regions = $regions;

      return $this;

   }

   /**
    * Changes the default language. It must be an ISO 2 char language string like 'de' or 'jp'
    *
    * @param  string $defaultLanguage
    * @return HolidayName
    */
   public function setDefaultLanguage( string $defaultLanguage ) : HolidayName
   {

      $this->defaultLanguage = $defaultLanguage;

      return $this;

   }

   // </editor-fold>


   // <editor-fold desc="= = =   O T H E R   P U B L I C   M E T H O D S   = = = = = = = = = = = = = = = = = = =">

   /**
    * Returns if this holiday name can be used for all known country regions.
    *
    * @return bool
    */
   public function matchesAllRegions() : bool
   {

      return \count( $this->regions ) < 1 || ( -1 === $this->regions[ 0 ] );

   }

   /**
    * Add a region by region index, the use the holiday name.
    *
    * @param  int $regionIndex
    * @return \Niirrty\Holiday\HolidayName
    */
   public function addRegion( int $regionIndex ) : HolidayName
   {

      if ( $regionIndex === -1 )
      {
         $this->regions = [ $regionIndex ];
         return $this;
      }

      if ( ! \in_array( $regionIndex, $this->regions ) )
      {
         if ( isset( $this->regions[ 0 ] ) && $this->regions[ 0 ] === -1 )
         {
            unset( $this->regions[ 0 ] );
         }
         $this->regions[] = $regionIndex;
      }

      return $this;

   }

   /**
    * Adds one or more regions by it index (-1 means all regions)
    *
    * @param  \int[] ...$regionIndexes
    * @return \Niirrty\Holiday\HolidayName
    */
   public function addRegions( int ...$regionIndexes ) : HolidayName
   {

      return $this->addRegionsArray( $regionIndexes );

   }

   /**
    * Adds one or more regions by it index ([-1] means all regions)
    *
    * @param  array $regionIndexes
    * @return \Niirrty\Holiday\HolidayName
    */
   public function addRegionsArray( array $regionIndexes ) : HolidayName
   {

      $cnt = \count( $regionIndexes );

      $addAll = false;

      if ( \count( $this->regions ) === 1 && $this->regions[ 0 ] === -1 )
      {
         $this->regions = [];
         $addAll = true;
      }

      if ( $cnt < 1 )
      {
         if ( $addAll )
         {
            $this->regions = [ -1 ];
         }
         return $this;
      }

      for ( $i = 0; $i < $cnt; $i++ )
      {

         $idx = (int) $regionIndexes[ $i ];

         if ( $idx === -1 )
         {
            $this->regions = [ $idx ];
            return $this;
         }

         if ( ! \in_array( $idx, $this->regions ) && ! \in_array( -1, $this->regions ) )
         {
            $this->regions[] = $idx;
         }

      }

      return $this;

   }

   // </editor-fold>


   // <editor-fold desc="= = =   P U B L I C   S T A T I C   M E T H O D S   = = = = = = = = = = = = = = = = = =">

   /**
    * @param  string $defaultLanguage The default holiday name language.
    * @param  string $defaultName     The default holiday name.
    * @return \Niirrty\Holiday\HolidayName
    */
   public static function Create( string $defaultLanguage, string $defaultName ) : HolidayName
   {

      return new self( $defaultLanguage, $defaultName );

   }

   // </editor-fold>


}

