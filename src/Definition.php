<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @package        Niirrty\Web
 * @since          25.11.17
 * @version        0.1.0
 */


declare( strict_types = 1 );


namespace Niirrty\Holiday;


use Niirrty\Date\DateTime;
use Niirrty\Holiday\DateMove\IMoveCondition;
use Niirrty\Holiday\DateMove\MoveCondition;


class Definition
{


   // <editor-fold desc="// –––––––   P R I V A T E   F I E L D S   ––––––––––––––––––––––––––––––––––––––">

   /**
    * @type array
    */
   private $_calculatedHolidays = [];

   // </editor-fold>


   // <editor-fold desc="// –––––––   P R O T E C T E D   F I E L D S   ––––––––––––––––––––––––––––––––––">

   /**
    * The country wide, unique, holiday identifier. A good idea is to use the english holiday name here. So most people
    * know what holiday means.
    *
    * @type string
    */
   protected $_identifier;

   /**
    * The holiday date month or NULL if the holiday is not static.
    *
    * @type int|null
    */
   protected $_month;

   /**
    * The holiday date day of month or NULL if the holiday is not static.
    *
    * @type int|null
    */
   protected $_day;

   /**
    * The callback for calculate a dynamic date.
    *
    * The callback must accept one parameter of type int that passes the year to the callback. The callback must
    * return a \DateTime instance.
    *
    * @type callable|null
    */
   protected $_dynamicDate;

   /**
    * The name of the callback, used to calculate an specific base date that will be used to build
    * the final holiday date in combination with the difference days value. The callback function
    * must be registered by defined name.
    *
    * @type string|null
    */
   protected $_baseCallbackName;

   /**
    * The country home language holiday name.
    *
    * @type string
    */
   protected $_name;

   /**
    * Optional name translations. Keys are the 2 char country code like 'de', 'fr', 'cz'
    *
    * @type array
    */
   protected $_nameTranslations;

   /**
    * An optional holiday description.
    *
    * @type string|null
    */
   protected $_description;

   /**
    * The year where the holiday validity starts. NULL means no restriction.
    *
    * @type int|null
    */
   protected $_validFromYear;

   /**
    * The year where the holiday validity ends. NULL means no restriction.
    *
    * @type int|null
    */
   protected $_validToYear;

   /**
    * 0-n conditions, used to move the current holiday declaration date by days, if the condition matches.
    *
    * Only the first matching condition moves the date. If you want to let move the date by all matching conditions
    * one by one, you have to set MoveAllMatches to true.
    *
    * @type array
    */
   protected $_moveConditions;

   /**
    * Set it to TRUE if you wand to handle the changes of all matching conditions. With default FALSE, only the first
    * matching condition moves the date.
    *
    * @type bool
    */
   protected $_moveAllMatches;

   /**
    * The optional callback to validate the current holiday definition date. If defined it must check the current
    * used date and should return TRUE if the date is valid, FALSE otherwise.
    *
    * @type callable|null
    */
   protected $_validationCallback;

   /**
    * The indexes of all country depending regions where the holiday is valid or [ -1 ] if valid for all regions or if
    * there are no regions
    *
    * @type array
    */
   protected $_regions;

   // </editor-fold>


   // <editor-fold desc="// –––––––   C O N S T R U C T O R   A N D / O R   D E S T R U C T O R   ––––––––">

   /**
    * HolidayDefinition constructor.
    *
    * @param string $identifier The country wide, unique, holiday identifier. A good idea is to use the english holiday
    *                           name here. So most people know what holiday means.
    */
   public function __construct( string $identifier )
   {

      $this->_identifier         = $identifier;
      $this->_month              = null;
      $this->_day                = null;
      $this->_dynamicDate        = null;
      $this->_validFromYear      = null;
      $this->_validToYear        = null;
      $this->_validationCallback = null;
      $this->_baseCallbackName   = null;
      $this->_description        = null;
      $this->_moveConditions     = [];
      $this->_moveAllMatches     = false;
      $this->_name               = $identifier;
      $this->_nameTranslations   = [];
      $this->_regions            = [ -1 ];

   }

   // </editor-fold>


   // <editor-fold desc="// –––––––   P U B L I C   M E T H O D S   ––––––––––––––––––––––––––––––––––––––">


   // <editor-fold desc="// – – – –   G E T T E R   – – – – – – – – – – –">

   /**
    * Gets the country wide, unique, holiday identifier. A good idea is to use the english holiday name here. So
    * most people know what holiday means.
    *
    * @return string
    */
   public function getIdentifier() : string
   {

      return $this->_identifier;

   }

   /**
    * Gets the holiday date month or NULL if the holiday is not static.
    *
    * @return int|null
    */
   public function getMonth() : ?int
   {

      return $this->_month;

   }

   /**
    * Gets the holiday date day of month or NULL if the holiday is not static.
    *
    * @return int|null
    */
   public function getDay() : ?int
   {

      return $this->_day;

   }

   /**
    * Gets the callback for calculate a dynamic date.
    *
    * The callback must accept one parameter of type int that passes the year to the callback. The callback must
    * return a \DateTime instance.
    *
    * @return callable|null
    */
   public function getDynamicDateCallback() : ?callable
   {

      return $this->_dynamicDate;

   }

   /**
    * Gets if a usable callback, for calculate a dynamic date, is defined.
    *
    * @return bool
    */
   public function hasDynamicDateCallback() : bool
   {

      return null !== $this->_dynamicDate && \is_callable( $this->_dynamicDate );

   }

   /**
    * Gets the country home language holiday name.
    *
    * @return string
    */
   public function getName() : string
   {

      return $this->_name;

   }

   /**
    * Gets the optional defined name translations. Keys are the 2 char country code like 'de', 'fr', 'cz'
    *
    * @return array
    */
   public function getNameTranslations() : array
   {

      return $this->_nameTranslations;

   }

   /**
    * Gets the holiday name with defined language id.
    *
    * If the language ID is empty the default name is returned, if a translation with defined language id not exists
    * the identifier is returned.
    *
    * @param  string|null $languageId
    * @return string
    */
   public function getNameTranslated( ?string $languageId = null ) : string
   {

      if ( empty( $languageId ) || ! isset( $this->_nameTranslations[ $languageId ] ) )
      {
         return $this->_name;
      }

      return $this->_nameTranslations[ $languageId ];

   }

   /**
    * Get the name of the callback, used to calculate an specific base date that will be used to build
    * the final holiday date in combination with the difference days value. The callback function
    * must be registered by defined name.
    *
    * @return string|null
    */
   public function getBaseCallbackName() : ?string
   {

      return $this->_baseCallbackName;

   }

   /**
    * Gets if a usable validation callback name is defined, used to calculate an specific base date
    * that will be used to build the final holiday date in combination with the difference days value
    *
    * @return bool
    */
   public function hasBaseCallbackName() : bool
   {

      return null !== $this->_baseCallbackName && \is_callable( $this->_baseCallbackName );

   }

   /**
    * Gets an optional holiday description.
    *
    * @return string|null
    */
   public function getDescription() : ?string
   {

      return $this->_description;

   }

   /**
    * Gets the year where the holiday validity starts. NULL means no restriction.
    *
    * @return int|null
    */
   public function getValidFromYear() : ?int
   {

      return $this->_validFromYear;
   }

   /**
    * Gets if the holiday have a known year where it becomes a invalid state, define it here. If this year is lower
    * than ValidToYear it means the holiday becomes a invalid state before it is remarked as valid in a year after.
    *
    * @return int|null
    */
   public function getValidToYear() : ?int
   {

      return $this->_validToYear;

   }

   /**
    * Gets 0-n conditions, used to move the current holiday declaration date by days, if the condition matches.
    *
    * Only the first matching condition moves the date. If you want to let move the date by all matching conditions
    * one by one, you have to set MoveAllMatches to true.
    *
    * @return \Niirrty\Holiday\DateMove\MoveCondition[]
    */
   public function getMoveConditions() : array
   {

      return $this->_moveConditions;

   }

   /**
    * Gets TRUE if handle the changes of all matching conditions. With default FALSE, only the first
    * matching condition moves the date.
    *
    * @return bool
    */
   public function getMoveAllMatches() : bool
   {

      return $this->_moveAllMatches;

   }

   /**
    * Gets the optional callback to validate the current holiday definition date. If defined it must check the current
    * used date and should return TRUE if the date is valid, FALSE otherwise.
    *
    * @return callable|null
    */
   public function getValidationCallback() : ?callable
   {

      return $this->_validationCallback;

   }

   /**
    * Gets if a usable validation callback is defined
    *
    * @return bool
    */
   public function hasValidationCallback() : bool
   {

      return null !== $this->_validationCallback && \is_callable( $this->_validationCallback );

   }

   /**
    * Gets the indexes of all country depending regions where the holiday is valid or [ -1 ] if valid for all regions or if
    * there are no regions
    *
    * @return array
    */
   public function getValidRegions() : array
   {

      return $this->_moveConditions;

   }

   // </editor-fold>


   // <editor-fold desc="// – – – –   S E T T E R   – – – – – – – – – – –">

   /**
    * Sets the country home language holiday name.
    *
    * @param  string $name
    * @return \Niirrty\Holiday\Definition
    */
   public function setName( string $name ) : Definition
   {

      $this->_name = $name;

      return $this;

   }

   /**
    * Sets the optional name translations. Keys are the 2 char country code like 'de', 'fr', 'cz'
    *
    * @param  array $translations
    * @return \Niirrty\Holiday\Definition
    */
   public function setNameTranslations( array $translations ) : Definition
   {

      $this->_nameTranslations = $translations;

      return $this;

   }

   /**
    * Adds a optional name translation.
    *
    * @param  string $languageId e.g.: 'de', 'fr', 'cz'
    * @param  string $translation The translated holiday name
    * @return \Niirrty\Holiday\Definition
    */
   public function addNameTranslation( string $languageId, string $translation ) : Definition
   {

      $this->_nameTranslations[ $languageId ] = $translation;

      return $this;

   }

   /**
    * Sets an optional holiday description.
    *
    * @param  string $description
    * @return \Niirrty\Holiday\Definition
    */
   public function setDescription( ?string $description = null ) : Definition
   {

      if ( [] !== $this->_calculatedHolidays )
      {
         $this->_calculatedHolidays = [];
      }

      $this->_description = $description;

      return $this;

   }

   /**
    * Sets the holiday date month and day or NULL if the holiday is not static.
    *
    * @param  int|null $month
    * @param  int|null $day
    * @return \Niirrty\Holiday\Definition
    */
   public function setStaticDate( ?int $month = null, ?int $day = null ) : Definition
   {

      $this->_month = ( null !== $month ) ? \min( 12, \max( 1, $month ) ) : $month;
      $this->_day   = ( null !== $day   ) ? \min( 31, \max( 1, $day   ) ) : $day;

      if ( [] !== $this->_calculatedHolidays )
      {
         $this->_calculatedHolidays = [];
      }

      return $this;

   }

   /**
    * Sets the name of the callback, used to calculate an specific base date that will be used to build
    * the final holiday date. The callback function must be registered by defined name in the parent collection.
    *
    * @param  string|null $callbackName
    * @return \Niirrty\Holiday\Definition
    */
   public function setBaseCallbackName( ?string $callbackName = null ) : Definition
   {

      $this->_baseCallbackName = $callbackName;
      if ( null !== $this->_baseCallbackName && '' === \trim( $this->_baseCallbackName ) )
      {
         $this->_baseCallbackName = null;
      }

      if ( [] !== $this->_calculatedHolidays )
      {
         $this->_calculatedHolidays = [];
      }

      return $this;

   }

   /**
    * Sets the callback for calculate a dynamic date.
    *
    * The callback must accept one parameter of type int that passes the year to the callback. The callback must
    * return a \Niirrty\Date\DateTime instance.
    *
    * @param  callable|null $callback
    * @return \Niirrty\Holiday\Definition
    */
   public function setDynamicDateCallback( ?callable $callback ) : Definition
   {

      $this->_dynamicDate = $callback;

      if ( [] !== $this->_calculatedHolidays )
      {
         $this->_calculatedHolidays = [];
      }

      return $this;

   }

   /**
    * Sets the year where the holiday validity starts. NULL means no restriction.
    *
    * @param  int|null $year
    * @return \Niirrty\Holiday\Definition
    */
   public function setValidFromYear( ?int $year = null ) : Definition
   {

      $this->_validFromYear = $year;

      if ( [] !== $this->_calculatedHolidays )
      {
         $this->_calculatedHolidays = [];
      }

      return $this;

   }

   /**
    * Sets if the holiday have a known year where it becomes a invalid state, define it here. If this year is lower
    * than ValidToYear it means the holiday becomes a invalid state before it is remarked as valid in a year after.
    *
    * @param  int|null $year
    * @return \Niirrty\Holiday\Definition
    */
   public function setValidToYear( ?int $year = null ) : Definition
   {

      $this->_validToYear = $year;

      if ( [] !== $this->_calculatedHolidays )
      {
         $this->_calculatedHolidays = [];
      }

      return $this;

   }

   /**
    * Sets 1-n initial conditions, used to move the current holiday declaration date by days, if the condition matches.
    *
    * Only the first matching condition moves the date. If you want to let move the date by all matching conditions
    * one by one, you have to set MoveAllMatches to true.
    *
    * @param \Niirrty\Holiday\DateMove\MoveCondition[] ...$conditions
    * @return \Niirrty\Holiday\Definition
    */
   public function setMoveConditions( MoveCondition ...$conditions ) : Definition
   {

      if ( [] !== $this->_calculatedHolidays )
      {
         $this->_calculatedHolidays = [];
      }

      return $this->clearMoveConditions()
                  ->addMoveConditions( $conditions );

   }

   /**
    * Removes all conditions, used to move the current holiday declaration date by days, if the condition matches.
    *
    * @return \Niirrty\Holiday\Definition
    */
   public function clearMoveConditions() : Definition
   {

      $this->_moveConditions = [];

      if ( [] !== $this->_calculatedHolidays )
      {
         $this->_calculatedHolidays = [];
      }

      return $this;

   }

   /**
    * Adds a condition, used to move the current holiday declaration date by days, if the condition matches.
    *
    * Only the first matching condition moves the date. If you want to let move the date by all matching conditions
    * one by one, you have to set MoveAllMatches to true.
    *    *
    * @param \Niirrty\Holiday\DateMove\MoveCondition $condition
    * @return \Niirrty\Holiday\Definition
    */
   public function addMoveCondition( MoveCondition $condition ) : Definition
   {

      $this->_moveConditions[] = $condition;

      if ( [] !== $this->_calculatedHolidays )
      {
         $this->_calculatedHolidays = [];
      }

      return $this;

   }

   /**
    * Adds 1-n conditions, used to move the current holiday declaration date by days, if the condition matches.
    *
    * Only the first matching condition moves the date. If you want to let move the date by all matching conditions
    * one by one, you have to set MoveAllMatches to true.
    *
    *
    * @param \Niirrty\Holiday\DateMove\MoveCondition[] ...$conditions
    * @return \Niirrty\Holiday\Definition
    */
   public function addMoveConditions( MoveCondition ...$conditions ) : Definition
   {

      foreach ( $conditions as $condition )
      {
         $this->_moveConditions[] = $condition;
      }

      if ( [] !== $this->_calculatedHolidays )
      {
         $this->_calculatedHolidays = [];
      }

      return $this;

   }

   /**
    * Sets TRUE if handle the changes of all matching conditions. With default FALSE, only the first
    * matching condition moves the date.
    *
    * @param  bool $moveAllMatches
    * @return \Niirrty\Holiday\Definition
    */
   public function setMoveAllMatches( bool $moveAllMatches = false ) : Definition
   {

      $this->_moveAllMatches = $moveAllMatches;

      if ( [] !== $this->_calculatedHolidays )
      {
         $this->_calculatedHolidays = [];
      }

      return $this;

   }

   /**
    * Sets the optional callback to validate the current holiday definition date. If defined it must check the current
    * used date and should return TRUE if the date is valid, FALSE otherwise.
    *
    * @param  callable|null $callback
    * @return \Niirrty\Holiday\Definition
    */
   public function setValidationCallback( ?callable $callback = null ) : Definition
   {

      $this->_validationCallback = $callback;

      if ( [] !== $this->_calculatedHolidays )
      {
         $this->_calculatedHolidays = [];
      }

      return $this;

   }

   /**
    * Sets the indexes of all country depending regions where the holiday is valid or [ -1 ] if valid for all regions
    * or if there are no regions.
    *
    * @param  array $regions
    * @return \Niirrty\Holiday\Definition
    */
   public function setValidRegions( array $regions ) : Definition
   {

      $this->_regions = $regions;

      if ( \in_array( -1, $this->_regions, true ) || 0 === \count( $this->_regions ) )
      {
         $this->_regions = [ -1 ];
      }

      if ( [] !== $this->_calculatedHolidays )
      {
         $this->_calculatedHolidays = [];
      }

      return $this;

   }

   /**
    * Adds the index of a country depending region where the holiday is valid or [ -1 ] if valid for all regions.
    *
    * @param int $regionIndex
    * @return \Niirrty\Holiday\Definition
    */
   public function addValidRegion( int $regionIndex ) : Definition
   {

      if ( [] !== $this->_calculatedHolidays )
      {
         $this->_calculatedHolidays = [];
      }

      if ( -1 === $regionIndex )
      {
         if ( -1 !== $this->_regions )
         {
            $this->_regions = [ -1 ];
         }

         return $this;
      }

      if ( ! $this->isValidRegion( $regionIndex ) )
      {
         $this->_regions[] = $regionIndex;
      }

      return $this;

   }

   /**
    * Adds a range of indexes of a country depending regions where the holiday is valid.
    *
    * @param int $regionStartIndex
    * @param int $regionEndIndex
    * @return \Niirrty\Holiday\Definition
    */
   public function addValidRegionsRange( int $regionStartIndex, int $regionEndIndex ) : Definition
   {

      $regionStartIndex = \max( 0, $regionStartIndex );

      foreach ( \range( $regionStartIndex, \max( $regionStartIndex, $regionEndIndex ) ) as $regionIndex )
      {
         $this->addValidRegion( $regionIndex );
      }

      return $this;

   }

   /**
    * Adds the defined indexes of country depending regions where the holiday is valid.
    *
    * @param int[] ...$regions
    * @return \Niirrty\Holiday\Definition
    */
   public function addValidRegions( int ...$regions ) : Definition
   {

      foreach ( $regions as $regionIndex )
      {
         $this->addValidRegion( $regionIndex );
      }

      return $this;

   }

   /**
    * Adds the defined indexes of country depending regions where the holiday is valid.
    *
    * @param array $regions
    * @return \Niirrty\Holiday\Definition
    */
   public function addValidRegionsArray( array $regions ) : Definition
   {

      foreach ( $regions as $regionIndex )
      {
         $this->addValidRegion( (int) $regionIndex );
      }

      return $this;

   }

   // </editor-fold>


   // <editor-fold desc="// – – – –   O T H E R   – – – – – – – – – – – –">

   /**
    * Gets if the region with defined region index is valid for current holiday definition.
    *
    * @param  int $regionIndex
    * @return bool
    */
   public function isValidRegion( int $regionIndex ) : bool
   {

      if ( $regionIndex < 0 ) { return true; }

      return ( -1 === $this->_regions[ 0 ] ) || \in_array( $regionIndex, $this->_regions );

   }

   /**
    * Gets the current static, or dynamic calculated holiday date for defined year.
    *
    * @param  int   $year             The year to calculate the holiday date for.
    * @param  array $globalCallbacks  Array with global callback functions, required to calculate an dynamic base date
    *                                 The are used if a base callback name is defined. The name must point to the
    *                                 callback, registered by use the callback name as associated array key.
    * @param  array $regions          If defined, the holiday is only returned if it is valid for a region with a
    *                                 defined index.
    * @param  string|null $languageId The 2 char ISO language ID for holiday name language (usable default languages
    *                                 are 'cz', 'de', 'en', 'es', 'fr', 'it', 'jp', 'pt'. If empty or unknown the
    *                                 default name is used.
    * @return \Niirrty\Holiday\Holiday|null
    * @throws Exception
    */
   public function toHoliday( int $year, array $globalCallbacks, array $regions = [], ?string $languageId = null ) : ?Holiday
   {

      // Get from cache if defined
      if ( isset( $this->_calculatedHolidays[ $year ] ) )
      {
         return $this->_calculatedHolidays[ $year ];
      }


      // Check if regions are defined
      if ( 0 < \count( $regions ) && ! \in_array( -1, $regions, true ) )
      {
         // There are regions defined where at least one must match
         $isValid = false;
         foreach ( $regions as $region )
         {
            if ( ! $this->isValidRegion( $region ) )
            {
               continue;
            }
            $isValid = true;
            break;
         }
         if ( ! $isValid )
         {
            $this->_calculatedHolidays[ $year ] = null;
            return $this->_calculatedHolidays[ $year ];
         }
      }


      // Define the final date

      // If a static holiday base month and day is defined => use it to generate the required DateTime
      if ( null !== $this->_month && null !== $this->_day )
      {
         // Its a static holiday
         $dt = DateTime::Create( $year, $this->_month, $this->_day );
         // Move it if requested
         $dt = $this->moveDateByConditions( $dt );
      }

      // If a dynamic holiday callback is defined => use it to generate the required DateTime
      else if ( null !== $this->_dynamicDate )
      {
         // Its a dynamic holiday
         $dt = \call_user_func( $this->_dynamicDate, $year );
         if ( ! ( $dt instanceof DateTime ) )
         {
            throw new Exception(
               'Can not get a holiday date if dynamic date callback not return a \\Niirrty\\Date\\DateTime instance!'
            );
         }
         // Move it if requested
         $dt = $this->moveDateByConditions( $dt );
      }

      // If a dynamic base callback name is defined => use it to generate the required DateTime
      else if ( ! empty( $this->_baseCallbackName ) &&
                isset( $globalCallbacks[ $this->_baseCallbackName ] ) &&
                \is_callable( $globalCallbacks[ $this->_baseCallbackName ] ) )
      {
         // Its a dynamic holiday
         $dt = \call_user_func( $globalCallbacks[ $this->_baseCallbackName ], $year );
         if ( ! ( $dt instanceof DateTime ) )
         {
            throw new Exception(
               'Can not get a holiday date if dyn. date base callback not return a \\Niirrty\\Date\\DateTime instance!'
            );
         }
         // Move it if requested
         $dt = $this->moveDateByConditions( $dt );
      }

      // Bad config
      else
      {
         $this->_calculatedHolidays[ $year ] = null;
         return $this->_calculatedHolidays[ $year ];
      }


      // Get the real year after date movements
      $year = $dt->getYear();


      // Get valid from and valid to year and set defaults if they are unused
      $validFromYear = ( null !== $this->_validFromYear ) ? $this->_validFromYear : 0;
      $validToYear   = ( null !== $this->_validToYear )   ? $this->_validToYear   : $year;


      // Ensure the year is inside a valid range. If not, null is returned
      if ( $validFromYear > $validToYear )
      {
         // 'from' is bigger than 'to'. It means   =>   minYear-'to' ……… 'from'-nowYear
         if ( $year > $validToYear && $year < $validFromYear )
         {
            $this->_calculatedHolidays[ $year ] = null;
            return $this->_calculatedHolidays[ $year ];
         }
      }
      else
      {
         // 'from' is lower than 'to'. It means   =>   'from' ……… 'to'
         if ( $year < $validFromYear || $year > $validToYear )
         {
            $this->_calculatedHolidays[ $year ] = null;
            return $this->_calculatedHolidays[ $year ];
         }
      }

      $this->_calculatedHolidays[ $year ] = ( new Holiday( $this->_identifier ) )
         ->setDescription( $this->_description )
         ->setDate( $dt )
         ->setName( $this->getNameTranslated( $languageId ) )
         ->setLanguage( $languageId )
         ->setValidRegions( $this->_regions );

      return $this->_calculatedHolidays[ $year ];

   }

   // </editor-fold>


   // </editor-fold>


   // <editor-fold desc="// –––––––   P R O T E C T E D   M E T H O D S   ––––––––––––––––––––––––––––––––">

   protected function moveDateByConditions( DateTime $date ) : DateTime
   {

      foreach ( $this->_moveConditions as $moveCondition )
      {
         if ( ! ( $moveCondition instanceof IMoveCondition ) || ! $moveCondition->isValid() ||
              ! $moveCondition->matches( $date ) )
         {
            continue;
         }
         $date = $moveCondition->move( $date );
         if ( ! $this->_moveAllMatches )
         {
            break;
         }
      }

      return $date;

   }

   // </editor-fold>


   // <editor-fold desc="// –––––––   P U B L I C   S T A T I C   M E T H O D S   ––––––––––––––––––––––––">

   public static function Create( string $identifier ) : Definition
   {

      return new Definition( $identifier );

   }

   public static function CreateEasterDepending( string $identifier, int $moveDays ) : Definition
   {

      return static::Create( $identifier )
         ->setBaseCallbackName( 'easter_sunday' )
         ->addMoveCondition( MoveCondition::Create( $moveDays, function() { return true; } ));

   }

   public static function CreateNewYear( $localName ) : Definition
   {

      return Definition::Create( \Niirrty\Holiday\Identifiers::NEW_YEAR )
         ->setStaticDate( 1, 1 )
         ->setName( $localName );

   }

   // </editor-fold>


}

