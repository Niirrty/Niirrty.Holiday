<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright      © 2017-2020, Ni Irrty
 * @package        Niirrty\Web
 * @since          2017-12-03
 * @version        1.3.0
 */


declare( strict_types=1 );


namespace Niirrty\Holiday;


use Niirrty\Date\DateTime;
use Niirrty\Holiday\Callbacks\IDynamicDateCallback;
use Niirrty\Holiday\DateMove\IMoveCondition;
use Niirrty\Holiday\DateMove\MoveCondition;


class Definition
{


    // <editor-fold desc="// –––––––   P R I V A T E   F I E L D S   ––––––––––––––––––––––––––––––––––––––">

    /**
     * @type array
     */
    private array $_calculatedHolidays = [];

    // </editor-fold>


    // <editor-fold desc="// –––––––   P R O T E C T E D   F I E L D S   ––––––––––––––––––––––––––––––––––">

    /**
     * The country wide, unique, holiday identifier. A good idea is to use the english holiday name here. So most people
     * know what holiday means.
     *
     * @type string
     */
    protected string $_identifier;

    /**
     * The holiday date month or NULL if the holiday is not static.
     *
     * @type int|null
     */
    protected ?int $_month;

    /**
     * The holiday date day of month or NULL if the holiday is not static.
     *
     * @type int|null
     */
    protected ?int $_day;

    /**
     * The callback for calculate a dynamic date.
     *
     * @type IDynamicDateCallback|null
     */
    protected ?IDynamicDateCallback $_dynamicDate;

    /**
     * The name of a global callback, used to calculate an specific base date that will be used to build
     * the final holiday date in combination with the difference days value. The callback function
     * must be registered globally by defined name.
     *
     * @type string|null
     */
    protected ?string $_baseCallbackName;

    /**
     * The country-depending default ISO 2 char language ID for holidays.
     *
     * @type string
     */
    protected string $_defaultLanguageId;

    /**
     * An optional holiday description.
     *
     * @type string|null
     */
    protected ?string $_description;

    /**
     * The year, where the holiday starts to be valid. NULL means no restriction.
     *
     * @type int|null
     */
    protected ?int $_validFromYear;

    /**
     * The year, where the holiday ends to be valid. NULL means no restriction.
     *
     * @type int|null
     */
    protected ?int $_validToYear;

    /**
     * 0-n conditions, used to move the current holiday declaration date by days, if the condition matches.
     *
     * Only the first matching condition moves the date. If you want to let move the date by all matching conditions
     * one by one, you have to set MoveAllMatches to true.
     *
     * @type array
     */
    protected array $_moveConditions;

    /**
     * Set it to TRUE if you want handle the changes of all matching move conditions. With default FALSE, only the first
     * matching condition moves the date.
     *
     * @type bool
     */
    protected bool $_moveAllMatches;

    /**
     * The optional callback to validate the current holiday definition date. If defined it must check the current
     * used date and should return TRUE if the date is valid, FALSE otherwise.
     *
     * @type callable|null
     */
    protected $_validationCallback;

    /**
     * The indexes of all country-depending regions where the holiday is valid or [ -1 ] if valid for all regions or if
     * there are no regions
     *
     * @type array
     */
    protected array $_regions;

    /**
     * Define if the holiday is a rest day (work free day)
     *
     * @type bool
     */
    protected bool $_isRestDay;

    /**
     * An optional holiday extension.
     *
     * It can be used to extend the holiday validity for example for a different region that is valid since other year.
     *
     * @var Definition|null
     */
    protected ?Definition $_extension = null;

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

        $this->_identifier = $identifier;
        $this->_month = null;
        $this->_day = null;
        $this->_dynamicDate = null;
        $this->_validFromYear = null;
        $this->_validToYear = null;
        $this->_validationCallback = null;
        $this->_baseCallbackName = null;
        $this->_description = null;
        $this->_moveConditions = [];
        $this->_moveAllMatches = false;
        $this->_defaultLanguageId = 'en';
        $this->_regions = [ -1 ];
        $this->_isRestDay = true;

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
    public function getIdentifier(): string
    {

        return $this->_identifier;

    }

    /**
     * Gets the holiday date month or NULL if the holiday is not static.
     *
     * @return int|null
     */
    public function getMonth(): ?int
    {

        return $this->_month;

    }

    /**
     * Gets the holiday date day of month or NULL if the holiday is not static.
     *
     * @return int|null
     */
    public function getDay(): ?int
    {

        return $this->_day;

    }

    /**
     * Gets the callback for calculate a dynamic date or NULL if no callback is defined.
     *
     * @return IDynamicDateCallback|null
     */
    public function getDynamicDateCallback(): ?IDynamicDateCallback
    {

        return $this->_dynamicDate;

    }

    /**
     * Gets if a usable callback, for calculate a dynamic date, is defined.
     *
     * @return bool
     */
    public function hasDynamicDateCallback(): bool
    {

        return null !== $this->_dynamicDate;

    }

    /**
     * Gets the country home ISO 2 char language ID.
     *
     * @return string
     */

    /**
     * Get the name of the callback, used to calculate an specific base date that will be used to build
     * the final holiday date in combination with the difference days value. The callback function
     * must be registered by defined name.
     *
     * @return string|null
     */
    public function getBaseCallbackName(): ?string
    {

        return $this->_baseCallbackName;

    }

    /**
     * Gets if a usable validation callback name is defined, used to calculate an specific base date
     * that will be used to build the final holiday date in combination with the difference days value
     *
     * @return bool
     */
    public function hasBaseCallbackName(): bool
    {

        return !empty( $this->_baseCallbackName );

    }

    /**
     * Gets an optional holiday description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {

        return $this->_description;

    }

    /**
     * Gets the year when the holiday validity starts. NULL means no restriction.
     *
     * @return int|null
     */
    public function getValidFromYear(): ?int
    {

        return $this->_validFromYear;
    }

    /**
     * Gets if the holiday have a known year when it becomes an invalid state, define it here. If this year is lower
     * than ValidToYear it means the holiday becomes an invalid state before it is remarked as valid in a year after.
     *
     * @return int|null
     */
    public function getValidToYear(): ?int
    {

        return $this->_validToYear;

    }

    /**
     * Gets 0-n conditions, used to move the current holiday declaration date by days, if the condition matches.
     *
     * Only the first matching condition moves the date. If you want to let move the date by all matching conditions
     * one by one, you have to set MoveAllMatches to true.
     *
     * @return MoveCondition[]
     */
    public function getMoveConditions(): array
    {

        return $this->_moveConditions;

    }

    /**
     * Gets TRUE if handle the changes of all matching conditions. With default FALSE, only the first
     * matching condition moves the date.
     *
     * @return bool
     */
    public function getMoveAllMatches(): bool
    {

        return $this->_moveAllMatches;

    }

    /**
     * Gets the optional callback to validate the current holiday definition date. If defined it must check the current
     * used date and should return TRUE if the date is valid, FALSE otherwise.
     *
     * @return callable|null
     */
    public function getValidationCallback(): ?callable
    {

        return $this->_validationCallback;

    }

    /**
     * Gets if a usable validation callback is defined
     *
     * @return bool
     */
    public function hasValidationCallback(): bool
    {

        return null !== $this->_validationCallback && \is_callable( $this->_validationCallback );

    }

    /**
     * Gets the indexes of all country depending regions where the holiday is valid or [ -1 ] if valid for all regions
     * or if there are no regions
     *
     * @return array
     */
    public function getValidRegions(): array
    {

        return $this->_regions;

    }

    /**
     * Gets if the holiday is a rest day (work free day)
     *
     * @return bool
     */
    public function getIsRestDay(): bool
    {

        return $this->_isRestDay;

    }

    /**
     * Gets an optional holiday extension.
     *
     * It can be used to extend the holiday validity for example for a different region that is valid since other year.
     *
     * @return Definition|null
     */
    public function getExtension(): ?Definition
    {

        return $this->_extension;

    }

    // </editor-fold>


    // <editor-fold desc="// – – – –   S E T T E R   – – – – – – – – – – –">

    /**
     * Sets an optional holiday description.
     *
     * @param string|null $description
     *
     * @return Definition
     */
    public function setDescription( ?string $description = null ): Definition
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
     * @param int|null $month
     * @param int|null $day
     *
     * @return Definition
     */
    public function setStaticDate( ?int $month = null, ?int $day = null ): Definition
    {

        $this->_month = ( null !== $month ) ? \min( 12, \max( 1, $month ) ) : $month;
        $this->_day = ( null !== $day ) ? \min( 31, \max( 1, $day ) ) : $day;

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
     * @param string|null $callbackName
     *
     * @return Definition
     */
    public function setBaseCallbackName( ?string $callbackName = null ): Definition
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
     * @param IDynamicDateCallback|null $callback
     *
     * @return Definition
     */
    public function setDynamicDateCallback( ?IDynamicDateCallback $callback ): Definition
    {

        $this->_dynamicDate = $callback;

        if ( [] !== $this->_calculatedHolidays )
        {
            $this->_calculatedHolidays = [];
        }

        return $this;

    }

    /**
     * Sets the year when the holiday validity starts. NULL means no restriction.
     *
     * @param int|null $year
     *
     * @return Definition
     */
    public function setValidFromYear( ?int $year = null ): Definition
    {

        $this->_validFromYear = $year;

        if ( [] !== $this->_calculatedHolidays )
        {
            $this->_calculatedHolidays = [];
        }

        return $this;

    }

    /**
     * Sets if the holiday have a known year when it becomes a invalid state, define it here. If this year is lower
     * than ValidToYear it means the holiday becomes an invalid state before it is remarked as valid in a year after.
     *
     * @param int|null $year
     *
     * @return Definition
     */
    public function setValidToYear( ?int $year = null ): Definition
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
     * @param MoveCondition ...$conditions
     *
     * @return Definition
     */
    public function setMoveConditions( MoveCondition ...$conditions ): Definition
    {

        if ( [] !== $this->_calculatedHolidays )
        {
            $this->_calculatedHolidays = [];
        }

        $this->clearMoveConditions();
        foreach ( $conditions as $condition )
        {
            $this->addMoveCondition( $condition );
        }

        return $this;

    }

    /**
     * Removes all conditions, used to move the current holiday declaration date by days, if the condition matches.
     *
     * @return Definition
     */
    public function clearMoveConditions(): Definition
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
     *
     * @param MoveCondition $condition
     *
     * @return Definition
     */
    public function addMoveCondition( MoveCondition $condition ): Definition
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
     * @param MoveCondition ...$conditions
     *
     * @return Definition
     */
    public function addMoveConditions( MoveCondition ...$conditions ): Definition
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
     * @param bool $moveAllMatches
     *
     * @return Definition
     */
    public function setMoveAllMatches( bool $moveAllMatches = false ): Definition
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
     * @param callable|null $callback
     *
     * @return Definition
     */
    public function setValidationCallback( ?callable $callback = null ): Definition
    {

        $this->_validationCallback = $callback;

        if ( [] !== $this->_calculatedHolidays )
        {
            $this->_calculatedHolidays = [];
        }

        return $this;

    }

    /**
     * Sets the indexes of all country depending on regions where the holiday is valid or [ -1 ] if valid for all regions
     * or if there are no regions.
     *
     * @param array $regions
     *
     * @return Definition
     */
    public function setValidRegions( array $regions ): Definition
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
     * Adds the index of a country depending on region where the holiday is valid or [ -1 ] if valid for all regions.
     *
     * @param int $regionIndex
     *
     * @return Definition
     */
    public function addValidRegion( int $regionIndex ): Definition
    {

        if ( [] !== $this->_calculatedHolidays )
        {
            $this->_calculatedHolidays = [];
        }

        if ( -1 === $regionIndex )
        {
            if ( [ -1 ] !== $this->_regions )
            {
                $this->_regions = [ -1 ];
            }

            return $this;
        }

        if ( -1 === $this->_regions[ 0 ] )
        {
            $this->_regions = [ $regionIndex ];

            return $this;
        }

        if ( ! $this->isValidRegion( $regionIndex ) )
        {
            $this->_regions[] = $regionIndex;
        }

        return $this;

    }

    /**
     * Adds a range of indexes of a country depending on regions where the holiday is valid.
     *
     * @param int $regionStartIndex
     * @param int $regionEndIndex
     *
     * @return Definition
     */
    public function addValidRegionsRange( int $regionStartIndex, int $regionEndIndex ): Definition
    {

        $regionStartIndex = \max( 0, $regionStartIndex );

        foreach ( \range( $regionStartIndex, \max( $regionStartIndex, $regionEndIndex ) ) as $regionIndex )
        {
            $this->addValidRegion( $regionIndex );
        }

        return $this;

    }

    /**
     * Adds the defined indexes of country depending on regions where the holiday is valid.
     *
     * @param int ...$regions
     *
     * @return Definition
     */
    public function addValidRegions( int ...$regions ): Definition
    {

        foreach ( $regions as $regionIndex )
        {
            $this->addValidRegion( $regionIndex );
        }

        return $this;

    }

    /**
     * Adds the defined indexes of country depending on regions where the holiday is valid.
     *
     * @param array $regions
     *
     * @return Definition
     */
    public function addValidRegionsArray( array $regions ): Definition
    {

        foreach ( $regions as $regionIndex )
        {
            $this->addValidRegion( (int) $regionIndex );
        }

        return $this;

    }

    /**
     * Sets if the holiday is a rest day (work free day)
     *
     * @param bool $isRestDay
     *
     * @return Definition
     */
    public function setIsRestDay( bool $isRestDay ): Definition
    {

        $this->_isRestDay = $isRestDay;

        return $this;

    }

    /**
     * Sets an optional holiday extension.
     *
     * It can be used to extend the holiday validity for example for a different region that is valid since other year.
     *
     * @param Definition|null $extension
     * @return Definition
     */
    public function setExtension( ?Definition $extension ): Definition
    {

        $this->_extension = $extension;

        return $this;

    }

    // </editor-fold>


    // <editor-fold desc="// – – – –   O T H E R   – – – – – – – – – – – –">

    /**
     * Gets if the region with defined region index is valid for current holiday definition.
     *
     * @param int $regionIndex
     *
     * @return bool
     */
    public function isValidRegion( int $regionIndex ): bool
    {

        if ( $regionIndex < 0 )
        {
            return true;
        }

        return ( -1 === $this->_regions[ 0 ] ) || \in_array( $regionIndex, $this->_regions );

    }

    public function hasExtension() : bool
    {

        return null !== $this->_extension;

    }

    /**
     * Gets the current static, or dynamic calculated holiday date for defined year.
     *
     * @param int   $year             The year to calculate the holiday date for.
     * @param string $transName       The translated holiday name, depends on parameter {@see $languageId}
     * @param array $globalCallbacks  Array with global callback functions, required to calculate a dynamic base
     *                                date. They are used if a base callback name is defined. The name must point to
     *                                the callback, registered by use the callback name as associated array key.
     * @param array $regions          If defined, the holiday is only returned if it is valid for a region with a
     *                                defined index.
     * @param string $languageId      The 2 char ISO language ID for holiday name language (known language ID are 'de',
     *                                'en', 'fr', 'it', 'es', 'pt', 'cz', 'pl', 'nl', 'dk', 'no', 'sv', 'fi', 'is', 'jp')
     *
     * @return Holiday|null
     * @throws \Throwable
     */
    public function toHoliday(
        int $year, string $transName, array $globalCallbacks, array $regions = [], string $languageId = 'en' ): ?Holiday
    {

        // Get from cache if defined
        if ( isset( $this->_calculatedHolidays[ $year ][ $languageId ] ) )
        {
            return $this->_calculatedHolidays[ $year ][ $languageId ];
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
                $this->_calculatedHolidays[ $year ][ $languageId ] = null;
                if ( $this->hasExtension() )
                {
                    $this->_calculatedHolidays[ $year ][ $languageId ] = $this->_extension->toHoliday(
                        $year, $transName, $globalCallbacks, $regions, $languageId );
                }
                return $this->_calculatedHolidays[ $year ][ $languageId ];
            }
        }

        // Define the final date
        $baseDate = null;
        $movedDate = null;

        // If a static holiday base month and day is defined => use it to generate the required DateTime
        if ( null !== $this->_month && null !== $this->_day )
        {
            // Its a static holiday
            $baseDate = DateTime::Create( $year, $this->_month, $this->_day );
            // Move it if requested
            $movedDate = $this->moveDateByConditions( clone $baseDate );
        }

        // If a dynamic holiday callback is defined => use it to generate the required DateTime
        else if ( null !== $this->_dynamicDate )
        {
            // Its a dynamic holiday
            $baseDate = $this->_dynamicDate->calculate( $year );
            // Move it if requested
            $movedDate = $this->moveDateByConditions( clone $baseDate );
        }

        // If a dynamic base callback name is defined => use it to generate the required DateTime
        else if ( ! empty( $this->_baseCallbackName ) &&
                  isset( $globalCallbacks[ $this->_baseCallbackName ] ) &&
                  ( $globalCallbacks[ $this->_baseCallbackName ] instanceof IDynamicDateCallback ) )
        {
            // Its a dynamic holiday
            $baseDate = $globalCallbacks[ $this->_baseCallbackName ]->calculate( $year );
            // Move it if requested
            $movedDate = $this->moveDateByConditions( clone $baseDate );
        }

        // Bad config
        else
        {
            $this->_calculatedHolidays[ $year ][ $languageId ] = null;
            if ( $this->hasExtension() )
            {
                $this->_calculatedHolidays[ $year ][ $languageId ] = $this->_extension->toHoliday(
                    $year, $transName, $globalCallbacks, $regions, $languageId );
            }
            return $this->_calculatedHolidays[ $year ][ $languageId ];
        }


        // Get the real year after date movements
        $year = (int) $movedDate->format( 'Y' );


        // Get valid from and valid to year and set defaults if they are unused
        $validFromYear = ( null !== $this->_validFromYear ) ? $this->_validFromYear : 0;
        $validToYear = ( null !== $this->_validToYear ) ? $this->_validToYear : 0;


        if ( $validFromYear > 0 || $validToYear > 0 )
        {

            if ( $validFromYear > 0 )
            {
                if ( $validToYear > 0 )
                {
                    if ( $validFromYear > $validToYear )
                    {
                        // from=2002 to=2000 …-2000 + 2002-…
                        if ( $year > $validToYear && $year < $validFromYear )
                        {
                            $this->_calculatedHolidays[ $year ][ $languageId ] = null;
                            if ( $this->hasExtension() )
                            {
                                $this->_calculatedHolidays[ $year ][ $languageId ] = $this->_extension->toHoliday(
                                    $year, $transName, $globalCallbacks, $regions, $languageId );
                            }
                            return $this->_calculatedHolidays[ $year ][ $languageId ];
                        }
                    }
                    else
                    {
                        // from=1999 to=2000 1999-2000
                        if ( $year < $validFromYear || $year > $validToYear )
                        {
                            $this->_calculatedHolidays[ $year ][ $languageId ] = null;
                            if ( null !== $this->_extension )
                            {
                                $this->_calculatedHolidays[ $year ][ $languageId ] = $this->_extension->toHoliday(
                                    $year, $transName, $globalCallbacks, $regions, $languageId );
                            }
                            return $this->_calculatedHolidays[ $year ][ $languageId ];
                        }
                    }
                }
                else
                {
                    if ( $year < $validFromYear )
                    {
                        $this->_calculatedHolidays[ $year ][ $languageId ] = null;
                        if ( $this->hasExtension() )
                        {
                            $this->_calculatedHolidays[ $year ][ $languageId ] = $this->_extension->toHoliday(
                                $year, $transName, $globalCallbacks, $regions, $languageId );
                        }
                        return $this->_calculatedHolidays[ $year ][ $languageId ];
                    }
                }
            }
            else
            {
                if ( $year > $validToYear )
                {
                    $this->_calculatedHolidays[ $year ][ $languageId ] = null;
                    if ( $this->hasExtension() )
                    {
                        $this->_calculatedHolidays[ $year ][ $languageId ] = $this->_extension->toHoliday(
                            $year, $transName, $globalCallbacks, $regions, $languageId );
                    }
                    return $this->_calculatedHolidays[ $year ][ $languageId ];
                }
            }

        }

        if ( ! isset( $this->_calculatedHolidays[ $year ] ) )
        {
            $this->_calculatedHolidays[ $year ] = [];
        }

        $this->_calculatedHolidays[ $year ][ $languageId ] = ( new Holiday( $this->_identifier ) )
            ->setDescription( $this->_description )
            ->setDate( $movedDate )
            ->setName( $transName )
            ->setLanguage( $languageId )
            ->setValidRegions( $this->_regions )
            ->setIsRestDay( $this->_isRestDay );

        if ( $baseDate != $movedDate )
        {
            $this->_calculatedHolidays[ $year ][ $languageId ]->setMovedFromDate( $baseDate );
        }


        return $this->_calculatedHolidays[ $year ][ $languageId ];

    }

    // </editor-fold>


    // </editor-fold>


    // <editor-fold desc="// –––––––   P R O T E C T E D   M E T H O D S   ––––––––––––––––––––––––––––––––">

    protected function moveDateByConditions( \DateTime $date ): \DateTime
    {

        foreach ( $this->_moveConditions as $moveCondition )
        {
            if ( !( $moveCondition instanceof IMoveCondition ) || !$moveCondition->isValid() ||
                 !$moveCondition->matches( $date ) )
            {
                continue;
            }
            $date = $moveCondition->move( $date );
            if ( !$this->_moveAllMatches )
            {
                break;
            }
        }

        return $date;

    }

    // </editor-fold>


    // <editor-fold desc="// –––––––   P U B L I C   S T A T I C   M E T H O D S   ––––––––––––––––––––––––">

    /**
     * Creates a regular Holiday definition.
     *
     * @param string $identifier The unique holiday identifier. (unique for the country))
     * @return Definition
     */
    public static function Create( string $identifier ): Definition
    {

        return new Definition( $identifier );

    }

    /**
     * Creates a holiday that depends on easter-sunday.
     *
     * @param string $identifier The unique holiday identifier. (unique for the country))
     * @param int    $moveDays   Positive or negative difference days to easter-sunday
     * @return Definition
     */
    public static function CreateEasterDepending( string $identifier, int $moveDays ): Definition
    {

        $definition = static::Create( $identifier )->setBaseCallbackName( 'easter_sunday' );

        if ( 0 !== $moveDays )
        {
            $definition->addMoveCondition( MoveCondition::Create( $moveDays, function () { return true; } ) );
        }

        return $definition;

    }

    public static function CreateNewYear(): Definition
    {

        return Definition::Create( 'New Year' )
                         ->setStaticDate( 1, 1 );

    }

    // </editor-fold>


}

