<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


declare( strict_types = 1 );


namespace Niirrty\Holiday;


require_once __DIR__ . '/helping-functions.php';


/**
 * Class Holiday. It defines the configuration of an single holiday.
 */
class Holiday
{


   // <editor-fold desc="= = =   P R I V A T E   F I E L D S   = = = = = = = = = = = = = = = = = = = = = = = = =">

   private $calculatedDates = [];

   // </editor-fold>


   // <editor-fold desc="= = =   P R O T E C T E D   F I E L D S   = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * Each holiday config must declare an type, that describes how the holiday date
    * should be defined and generated.
    *
    * All usable types are defined as constants of {@see \Niirrty\Holiday\HolidayType}
    *
    * @type string
    */
   protected $type;

   /**
    * Here the holiday date month is defined. It can be used in combination with the following types:
    *
    * - {@see \Niirrty\Holiday\HolidayType::STATIC}
    *   Used as holiday date month part
    * - {@see \Niirrty\Holiday\HolidayType::STATIC_BASE}
    *   Used as month part of the static base date that will be used for calculations
    *
    * Otherwise the value is 0.
    *
    * @type int
    */
   protected $month;

   /**
    * Here the holiday date day is defined. It can be used in combination with the following types:
    *
    * - {@see \Niirrty\Holiday\HolidayType::STATIC}
    *   Used as holiday date day part
    * - {@see \Niirrty\Holiday\HolidayType::STATIC_BASE}
    *   Used as day part of the static base date that will be used for calculations
    *
    * Otherwise the value is 0.
    *
    * @type int
    */
   protected $day;

   /**
    * If the type is {@see \Niirrty\Holiday\HolidayType::STATIC_BASE} or
    * {@see \Niirrty\Holiday\HolidayType::DYNAMIC_BASE} the value defined here is the
    * difference value in days, to calculate the holiday date in relation to an base date.
    *
    * Otherwise the value is 0.
    *
    * @type int
    */
   protected $differenceDays;

   /**
    * The holiday config dynamic calculation callback function, if the type is
    * {@see \Niirrty\Holiday\HolidayType::DYNAMIC} or NULL for all other types.
    *
    * The function must accept at least an single parameter that represents the year
    *
    * @type callable|NULL
    */
   protected $dynamicCallback;

   /**
    * The name of the callback, used to calculate an specific base date that will be used to build
    * the final holiday date in combination with the difference days value. The callback function
    * must be registered by defined name.
    *
    * @type string|null
    */
   protected $baseCallbackName;

   /**
    * Here all holiday names depending to the regions are defined.
    *
    * @type HolidayName[] Array
    */
   protected $names;

   /**
    * An optional holiday description.
    *
    * @type string
    */
   protected $description;

   /**
    * The year where the holiday validity starts. 0 means no restriction.
    *
    * @type int
    */
   protected $validFromYear = 0;

   /**
    * The year where the holiday validity ends. 0 means no restriction.
    *
    * @type int
    */
   protected $validToYear   = 0;

   /**
    * The callback function that check if the day is an valid holiday for an specific year.
    *
    * Is must accept the year as first an only parameter and must return an boolean value.
    *
    * @type callable|NULL
    */
   protected $conditionCallback;

   /**
    * Translations for holiday name
    *
    * @type array
    */
   protected $nameTranslations = [];

   // </editor-fold>


   // <editor-fold desc="= = =   P U B L I C   C O N S T R U C T O R   = = = = = = = = = = = = = = = = = = = = =">

   /**
    * Holiday constructor.
    *
    * @param string $type Each holiday config must declare an type, that describes how the holiday date should be
    *                     defined and generated. All usable types are defined as constants of
    *                     {@see \Niirrty\Holiday\HolidayType}
    */
   public function __construct( string $type = HolidayType::STATIC )
   {

      $this->type                = $type;
      $this->month               = 0;
      $this->day                 = 0;
      $this->differenceDays      = 0;
      $this->validFromYear       = 0;
      $this->validToYear         = 0;
      $this->dynamicCallback     = null;
      $this->baseCallbackName    = null;
      $this->description         = null;
      $this->conditionCallback   = null;
      $this->names               = [];
      $this->differenceDays      = 0;

   }

   // </editor-fold>


   // <editor-fold desc="= = =   G E T T E R S   = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * Gets the holiday config type.
    *
    * Each holiday config must declare an type, that describes how the holiday date
    * should be defined and generated.
    *
    * @return string
    */
   public function getType() : string
   {

      return $this->type;

   }

   /**
    * Gets the holiday config month.
    *
    * Here the holiday date month is defined. It can be used in combination with the following types:
    *
    * - {@see \Niirrty\Holiday\HolidayType::STATIC}
    *   Used as holiday date month part
    * - {@see \Niirrty\Holiday\HolidayType::STATIC_BASE}
    *   Used as month part of the static base date that will be used for calculations
    *
    * Otherwise the value is 0.
    *
    * @return int
    */
   public function getMonth() : int
   {

      return $this->month;

   }

   /**
    * Gets the holiday config day.
    *
    * Here the holiday date day is defined. It can be used in combination with the following types:
    *
    * - {@see \Niirrty\Holiday\HolidayType::STATIC}
    *   Used as holiday date day part
    * - {@see \Niirrty\Holiday\HolidayType::STATIC_BASE}
    *   Used as day part of the static base date that will be used for calculations
    *
    * Otherwise the value is 0.
    *
    * @return int
    */
   public function getDay() : int
   {

      return $this->day;

   }

   /**
    * Gets the holiday config difference value.
    *
    * If the type is {@see \Niirrty\Holiday\HolidayType::STATIC_BASE} or
    * {@see \Niirrty\Holiday\HolidayType::DYNAMIC_BASE} the value defined here is the
    * difference value in days, to calculate the holiday date in relation to an base date.
    *
    * Otherwise the value is 0.
    *
    * @return int
    */
   public function getDifferenceDays() : int
   {

      return $this->differenceDays;

   }

   /**
    * Gets the holiday config dynamic calculation callback function, if the type is
    * {@see \Niirrty\Holiday\HolidayType::DYNAMIC} or NULL for all other types.
    *
    * @return mixed
    */
   public function getDynamicCallback()
   {

      return $this->dynamicCallback;

   }

   /**
    * Gets the holiday names with the indexes of the associated regions.
    *
    * @return HolidayName[] Array
    */
   public function getNames() : array
   {

      return $this->names;

   }

   /**
    * Get the name of the callback, used to calculate an specific base date that will be used to build
    * the final holiday date in combination with the difference days value. The callback function
    * must be registered by defined name.
    *
    * To be reusable the depending callback must be always declared globally.
    *
    * @return null|string
    */
   public function getBaseCallbackName()
   {

      return $this->baseCallbackName;

   }

   /**
    * Gets the optional holiday description.
    *
    * @return string
    */
   public function getDescription()
   {

      return $this->description;

   }

   /**
    * Gets the year where the holiday validity starts. 0 means no restriction.
    *
    * @return int
    */
   public function getValidFromYear() : int
   {

      return $this->validFromYear;
   }

   /**
    * Gets the year where the holiday validity ends. 0 means no restriction.
    *
    * @return int
    */
   public function getValidToYear() : int
   {

      return $this->validToYear;

   }

   /**
    * Gets the callback function that check if the day is an valid holiday for an specific year.
    *
    * It must accept the year as first an only parameter and must return an boolean value.
    *
    * @return callable|NULL
    */
   public function getConditionCallback()
   {

      return $this->conditionCallback;

   }

   /**
    * Gets the holiday name for defined language. If not defined FALSE is returned.
    *
    * @param  string $language The 2 char ISO language id (e.g.: 'de', 'fr', etc.)
    * @return string|FALSE
    */
   public function getNameTranslated( string $language )
   {

      if ( isset( $this->nameTranslations[ $language ] ) )
      {

         return $this->nameTranslations[ $language ];

      }

      return false;

   }

   /**
    * Returns the holyday name string.
    *
    * @param  int         $regionIndex
    * @param  string|null $language
    * @return string|FALSE
    */
   public function getName( int $regionIndex = -1, string $language = null )
   {

      if ( ! empty( $language ) &&  isset( $this->nameTranslations[ $language ] ) )
      {

         return $this->nameTranslations[ $language ];

      }

      if ( $this->isRegion( $regionIndex, $matchingNameRef ) )
      {
         /** @noinspection PhpUndefinedMethodInspection */
         return $matchingNameRef->getName();
      }

      return false;

   }

   /**
    * Gets the current static, or dynamic calculated holiday date for defined year.
    *
    * @param  int   $year            The year to calculate the holiday date for.
    * @param  array $globalCallbacks Array with global callback functions, required to calculate an dynamic base date
    * @param  bool  $validateBefore  Validate this holiday config before getting the date?
    * @return \DateTime|FALSE
    * @throws Exception
    */
   public function getDate( int $year, array $globalCallbacks, bool $validateBefore = true )
   {

      if ( $validateBefore && ! $this->isValid( $globalCallbacks ) )
      {
         throw new Exception( 'Can not get a holiday date of an invalid holiday config!' );
      }

      if ( isset( $this->calculatedDates[ $year ] ) )
      {
         return $this->calculatedDates[ $year ];
      }

      if ( ( $this->validFromYear > 0 && $year < $this->validFromYear )
         || ( $this->validToYear > 0 && $year > $this->validToYear ) )
      {
         $this->calculatedDates[ $year ] = false;
         return $this->calculatedDates[ $year ];
      }

      switch ( $this->type )
      {


         case HolidayType::STATIC:

            if ( \is_callable( $this->conditionCallback ) )
            {
               if ( ! \call_user_func( $this->conditionCallback, $year ) )
               {
                  $this->calculatedDates[ $year ] = false;
                  return $this->calculatedDates[ $year ];
               }
            }

            $this->calculatedDates[ $year ] = ( new \DateTime() )->setDate( $year, $this->month, $this->day );
            return $this->calculatedDates[ $year ];


         case HolidayType::STATIC_BASE:

            if ( \is_callable( $this->conditionCallback ) )
            {
               if ( ! \call_user_func( $this->conditionCallback, $year ) )
               {
                  $this->calculatedDates[ $year ] = false;
                  return $this->calculatedDates[ $year ];
               }
            }

            if ( 0 === $this->differenceDays )
            {
               $this->calculatedDates[ $year ] = ( new \DateTime() )->setDate( $year, $this->month, $this->day );
               return $this->calculatedDates[ $year ];
            }

            $modifyFormatString = $this->buildDiffModifier();

            $this->calculatedDates[ $year ] =
               ( new \DateTime() )->setDate( $year, $this->month, $this->day )->modify( $modifyFormatString );
            return $this->calculatedDates[ $year ];


         case HolidayType::DYNAMIC:

            if ( \is_callable( $this->conditionCallback ) )
            {
               if ( ! \call_user_func( $this->conditionCallback, $year ) )
               {
                  $this->calculatedDates[ $year ] = false;
                  return $this->calculatedDates[ $year ];
               }
            }

            $this->calculatedDates[ $year ] = \call_user_func( $this->dynamicCallback, $year );
            return $this->calculatedDates[ $year ];


         #case HolidayType::DYNAMIC_BASE:
         default:

            if ( \is_callable( $this->conditionCallback ) )
            {
               if ( ! \call_user_func( $this->conditionCallback, $year ) )
               {
                  $this->calculatedDates[ $year ] = false;
                  return $this->calculatedDates[ $year ];
               }
            }

            $dt = \call_user_func( $globalCallbacks[ $this->baseCallbackName ], $year );

            if ( 0 === $this->differenceDays )
            {
               $this->calculatedDates[ $year ] = $dt;
               return $this->calculatedDates[ $year ];
            }

            $modifyFormatString = $this->buildDiffModifier();

            $this->calculatedDates[ $year ] = $dt->modify( $modifyFormatString );

            return $this->calculatedDates[ $year ];


      }

   }

   // </editor-fold>


   // <editor-fold desc="= = =   S E T T E R S   = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * Sets the holiday config type.
    *
    * Each holiday config must declare an type, that describes how the holiday date
    * should be defined and generated.
    *
    * @param  string $type
    * @param  bool   $clearCache Clear the cache for already generated dates of this holiday?
    * @return Holiday
    * @throws Exception
    */
   public function setType( string $type, bool $clearCache = true ) : Holiday
   {

      switch ( $type )
      {
         case HolidayType::STATIC:
         case HolidayType::STATIC_BASE:
         case HolidayType::DYNAMIC:
         case HolidayType::DYNAMIC_BASE:
            break;
         default:
            throw new Exception( 'Can not use an invalid holiday config type "' . $type . '"!' );
      }

      $this->type = $type;

      if ( $clearCache )
      {
         $this->calculatedDates = [];
      }

      return $this;

   }

   /**
    * Sets the holiday config month.
    *
    * Here the holiday date month is defined. It can be used in combination with the following types:
    *
    * - {@see \Niirrty\Holiday\HolidayType::STATIC}
    *   Used as holiday date month part
    * - {@see \Niirrty\Holiday\HolidayType::STATIC_BASE}
    *   Used as month part of the static base date that will be used for calculations
    *
    * Otherwise the value is 0.
    *
    * @param  int  $month
    * @param  bool $clearCache Clear the cache for already generated dates of this holiday?
    * @return Holiday
    */
   public function setMonth( int $month, bool $clearCache = true ) : Holiday
   {

      if ( $month < 1 )
      {
         $this->month = 0;
      }
      else
      {
         // Ensure we are inside the valid range 1-12 (eg.: 24 results in 12, 14 results in 2, etc.)
         $this->month = $month % 12;
         if ( $this->month === 0 )
         {
            $this->month = 12;
         }
      }

      if ( $clearCache )
      {
         $this->calculatedDates = [];
      }

      return $this;

   }

   /**
    * Sets the holiday config day.
    *
    * Here the holiday date day is defined. It can be used in combination with the following types:
    *
    * - {@see \Niirrty\Holiday\HolidayType::STATIC}
    *   Used as holiday date day part
    * - {@see \Niirrty\Holiday\HolidayType::STATIC_BASE}
    *   Used as day part of the static base date that will be used for calculations
    *
    * Otherwise the value is 0.
    *
    * @param  int  $day
    * @param  bool $clearCache Clear the cache for already generated dates of this holiday?
    * @return Holiday
    */
   public function setDay( int $day, bool $clearCache = true ) : Holiday
   {

      if ( $day < 1 )
      {
         $this->day = 0;
      }
      else if ( $day > 31 )
      {
         $this->day = 31;
      }
      else
      {
         $this->day = $day;
      }

      if ( $clearCache )
      {
         $this->calculatedDates = [];
      }

      return $this;

   }

   /**
    * Sets the holiday config difference days.
    *
    * If the type is {@see \Niirrty\Holiday\HolidayType::STATIC_BASE} or
    * {@see \Niirrty\Holiday\HolidayType::DYNAMIC_BASE} the value defined here is the
    * difference value in days, to calculate the holiday date in relation to an base date.
    *
    * Otherwise the value is 0.
    *
    * @param  int  $differenceDays
    * @param  bool $clearCache Clear the cache for already generated dates of this holiday?
    * @return Holiday
    */
   public function setDifferenceDays( int $differenceDays, bool $clearCache = true ) : Holiday
   {

      $this->differenceDays = $differenceDays;

      if ( $clearCache )
      {
         $this->calculatedDates = [];
      }

      return $this;

   }

   /**
    * Sets the holiday config dynamic calculation callback function, if the type is
    * {@see \Niirrty\Holiday\HolidayType::DYNAMIC} or NULL for all other types.
    *
    * @param  callable|null $dynamicCallback
    * @param  bool          $clearCache      Clear the cache for already generated dates of this holiday?
    * @return Holiday
    */
   public function setDynamicCallback( ?callable $dynamicCallback, bool $clearCache = true ) : Holiday
   {

      if ( \is_callable( $dynamicCallback ) )
      {
         $this->dynamicCallback = $dynamicCallback;
      }
      else
      {
         $this->dynamicCallback = null;
      }

      if ( $clearCache )
      {
         $this->calculatedDates = [];
      }

      return $this;

   }

   /**
    * Set the name of the callback, used to calculate an specific base date that will be used to build
    * the final holiday date in combination with the difference days value. The callback function
    * must be registered by defined name.
    *
    * @param  null|string $baseCallbackName
    * @param  bool       $clearCache       Clear the cache for already generated dates of this holiday?
    * @return Holiday
    */
   public function setBaseCallbackName( $baseCallbackName, bool $clearCache = true ) : Holiday
   {

      if ( empty( $baseCallbackName ) || ! \is_string( $baseCallbackName ) )
      {
         $this->baseCallbackName = null;
      }
      else
      {
         $this->baseCallbackName = $baseCallbackName;
      }

      if ( $clearCache )
      {
         $this->calculatedDates = [];
      }

      return $this;

   }

   /**
    * Sets the holiday day names with the associated country regions.
    *
    * @param  HolidayName[] $names
    * @param  bool          $clearCache Clear the cache for already generated dates of this holiday?
    * @return Holiday
    * @throws Exception
    */
   public function setNames( array $names, bool $clearCache = true ) : Holiday
   {

      if ( count( $names ) < 1 )
      {
         throw new Exception( 'Can not set an holiday without an name!' );
      }

      $this->names = $names;

      if ( $clearCache )
      {
         $this->calculatedDates = [];
      }

      return $this;

   }

   /**
    * Sets the optional holiday description.
    *
    * @param  string $description
    * @return Holiday
    */
   public function setDescription( string $description = null )
   {

      $this->description = $description;

      return $this;

   }

   /**
    * Sets the year where the holiday validity starts. 0 means no restriction.
    *
    * @param  int    $validFromYear
    * @param  bool   $clearCache    Clear the cache for already generated dates of this holiday?
    * @return Holiday
    */
   public function setValidFromYear( int $validFromYear, bool $clearCache = true ) : Holiday
   {

      $this->validFromYear = ( $validFromYear < 1 ) ? 0 : $validFromYear;

      if ( $clearCache )
      {
         $this->calculatedDates = [];
      }

      return $this;

   }

   /**
    * Sets the year where the holiday ends to be valid. 0 means no restriction.
    *
    * @param  int    $validToYear
    * @param  bool   $clearCache  Clear the cache for already generated dates of this holiday?
    * @return Holiday
    */
   public function setValidToYear( int $validToYear, bool $clearCache = true ) : Holiday
   {

      $this->validToYear = ( $validToYear < 1 ) ? 0 : $validToYear;

      if ( $this->validToYear > 0 && $this->validToYear < $this->validFromYear )
      {
         $this->validToYear = $this->validFromYear;
      }

      if ( $clearCache )
      {
         $this->calculatedDates = [];
      }

      return $this;

   }

   /**
    * Sets the callback function that check if the day is an valid holiday for an specific year.
    *
    * It must accept the year as first an only parameter and must return an boolean value.
    *
    * @param  callable|NULL $conditionalCallback
    * @param  bool          $clearCache          Clear the cache for already generated dates of this holiday?
    * @return Holiday
    */
   public function setConditionCallback( ?callable $conditionalCallback, bool $clearCache = true ) : Holiday
   {

      if ( \is_callable( $conditionalCallback ) )
      {
         $this->conditionCallback = $conditionalCallback;
      }
      else
      {
         $this->conditionCallback = null;
      }

      if ( $clearCache )
      {
         $this->calculatedDates = [];
      }

      return $this;

   }

   /**
    * Sets an translation for holiday name by defined language.
    *
    * @param  string $language The ISO 2 char language id like 'de', 'en' or 'jp'
    * @param  string $name     The translated holiday name.
    * @return \Niirrty\Holiday\Holiday
    */
   public function setNameTranslation( string $language, string $name ) : Holiday
   {

      $this->nameTranslations[ $language ] = $name;

      return $this;

   }

   /**
    * Sets an translation for holiday name by defined language.
    *
    * @param  \string[] ...$languageNamePairs Always use language, name, language, name
    * @return \Niirrty\Holiday\Holiday
    */
   public function setNameTranslations( string ...$languageNamePairs ) : Holiday
   {

      $this->nameTranslations = [];

      return \call_user_func_array( [ $this, 'addNameTranslationsArray' ], $languageNamePairs );

   }

   // </editor-fold>


   // <editor-fold desc="= = =   O T H E R   P U B L I C   M E T H O D S   = = = = = = = = = = = = = = = = = = =">

   /**
    * Manually clear the cache for already generated dates of this holiday.
    */
   public function clearCache()
   {

      $this->calculatedDates = [];

   }

   /**
    * Returns if the defined holiday is valid for defined region.
    *
    * If so the valid HolidayName is returned by 2nd parameter $matchingNameRef
    *
    * @param  int         $regionIndex     The index of an region, or -1 (default) for all regions.
    * @param  HolidayName $matchingNameRef Returns the holiday name of the matching region if method returns TRUE.
    * @return bool
    */
   public function isRegion( int $regionIndex = -1, &$matchingNameRef = null ) : bool
   {

      foreach ( $this->names as $nameData )
      {
         $regions = $nameData->getRegions();
         if ( \in_array( $regionIndex, $regions ) || \in_array( -1, $regions ) )
         {
            $matchingNameRef = $nameData;
            return true;
         }
      }

      return false;

   }

   /**
    * Returns if the current holiday date is an static date. (HolidayType::STATIC + ::STATIC_BASE)
    *
    * @return bool
    */
   public function isStatic() : bool
   {

      return $this->type === HolidayType::STATIC
          || $this->type === HolidayType::STATIC_BASE;

   }

   /**
    * Returns if the current holiday date is an dynamic date. (HolidayType::DYNAMIC + ::DYNAMIC_BASE)
    *
    * @return bool
    */
   public function isDynamic() : bool
   {

      return $this->type === HolidayType::DYNAMIC
          || $this->type === HolidayType::DYNAMIC_BASE;

   }

   /**
    * Returns if the current holiday have an valid configuration.
    *
    * @param array $globalCallbacks Array with all global callback functions, required to calculate an dynamic base date
    * @return bool
    */
   public function isValid( array $globalCallbacks = [] ) : bool
   {

      switch ( $this->type )
      {

         case HolidayType::STATIC:
            return $this->month > 0 && $this->day > 0;

         case HolidayType::STATIC_BASE:
            return $this->month > 0 && $this->day > 0;

         case HolidayType::DYNAMIC:
            return ! \is_null( $this->dynamicCallback );

         #case HolidayType::DYNAMIC_BASE:
         default:
            return ! \is_null( $this->baseCallbackName )
            && isset( $globalCallbacks[ $this->baseCallbackName ] )
            && \is_callable( $globalCallbacks[ $this->baseCallbackName ] );

      }

   }

   /**
    * Adds translations for holiday names by defined languages.
    *
    * @param  \string[] ...$languageNamePair language, name[, language, name[, …]]
    * @return \Niirrty\Holiday\Holiday
    */
   public function addNameTranslations( string ...$languageNamePair ) : Holiday
   {

      for ( $i = 0, $c = \count( $languageNamePair ); $i < $c - 1; $i += 2 )
      {

         if ( 2 !== \strlen( $languageNamePair[ $i ] ) )
         {
            throw new \LogicException( 'Can not add holiday name translations if the language "'
               . $languageNamePair[ $i ] . '" is invalid!' );
            break;
         }

         $this->nameTranslations[ $languageNamePair[ $i ] ] = $languageNamePair[ $i + 1 ];

      }

      return $this;

   }

   /**
    * Adds translations for holiday names by defined languages as associative array. Keys are the 2 char ISO
    * language IDs in lower case, values the translated names
    *
    * @param  string[] $languageNamePairs
    * @return \Niirrty\Holiday\Holiday
    * @throws \Niirrty\Holiday\Exception
    */
   public function addNameTranslationsArray( array $languageNamePairs ) : Holiday
   {

      foreach ( $languageNamePairs as $languageId => $name )
      {
         if ( 2 !== \strlen( $languageId ) )
         {
            throw new Exception(
               'Can not add holiday name translations if the language "' . $languageId . '" is invalid!' );
            break;
         }
         $this->nameTranslations[ $languageId ] = $name;
      }

      return $this;

   }

   /**
    * Adds an holiday name.
    *
    * @param  \Niirrty\Holiday\HolidayName $name
    * @return Holiday
    */
   public function addName( HolidayName $name ) : Holiday
   {

      $this->names[] = $name;

      return $this;

   }

   /**
    * Adds one or more holiday names.
    *
    * @param  \Niirrty\Holiday\HolidayName[] ...$names
    * @return Holiday
    */
   public function addNames( HolidayName ...$names ) : Holiday
   {

      $this->names = \array_merge( $this->names, $names );

      return $this;

   }

   // </editor-fold>


   // <editor-fold desc="= = =   P R I V A T E   M E T H O D S   = = = = = = = = = = = = = = = = = = = = = = = =">

   /**
    * …
    *
    * @return string
    */
   private function buildDiffModifier() : string
   {

      $absDiffDays        = \abs( $this->differenceDays );
      $modifyFormatString = '';

      if ( $this->differenceDays < 0 )
      {
         $modifyFormatString = '- ';
      }

      $modifyFormatString .= $absDiffDays . ( $absDiffDays > 1 ? 'days' : 'day');

      return $modifyFormatString;

   }

   // </editor-fold>


   // <editor-fold desc="= = =   P U B L I C   S T A T I C   M E T H O D S   = = = = = = = = = = = = = = = = = =">

   /**
    * Creates an new empty holiday
    *
    * @param  string $type
    * @return \Niirrty\Holiday\Holiday
    */
   public static function Create( string $type = HolidayType::STATIC ) : Holiday
   {

      return new self( $type );

   }

   // </editor-fold>


}

