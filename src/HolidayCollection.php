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


use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use Niirrty\Date\DateTime;
use function array_keys;
use function array_search;
use function count;
use function in_array;
use function is_int;
use function is_null;


/**
 * Class HolidayCollection.
 */
class HolidayCollection implements ArrayAccess, IteratorAggregate, Countable
{


    // <editor-fold desc="= = =   P R I V A T E   F I E L D S   = = = = = = = = = = = = = = = = = = = = = = = = =">


    /**
     * The country name (e.g. 'Deutschland' or 'United Kingdom')
     *
     * @type string
     */
    private $_countryName;

    /**
     * The 2 char ISO country ID (e.g.: 'de', 'fr')
     *
     * @type string
     */
    private $_countryId;

    /**
     * All Holiday records.
     *
     * @type Holiday[] Array
     */
    private $_data;

    /**
     * The year where the holidays are valid for
     *
     * @type int
     */
    private $_year;

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
     * @param int    $year        The year where the holidays are valid for
     * @param string $countryName The country name (e.g. 'Deutschland' or 'United Kingdom')
     * @param string $countryId   The 2 char ISO country ID (e.g.: 'de', 'fr')
     */
    public function __construct( int $year, string $countryName, string $countryId )
    {

        $this->_year = $year;
        $this->_countryName = $countryName;
        $this->_countryId = $countryId;
        $this->_data = [];
        $this->_regions = [];

    }

    // </editor-fold>


    // <editor-fold desc="= = =   P U B L I C   M E T H O D S   = = = = = = = = = = = = = = = = = = = = = = = = =">


    // <editor-fold desc="= = =   I M P L E M E N T   ' I t e r a t o r A g g r e g a t e '   = = = = = = = = = =">

    /**
     * Retrieve an external iterator
     *
     * @link  http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return ArrayIterator An instance of an object implementing <b>Iterator</b> or <b>Traversable</b>
     */
    public function getIterator()
    {

        return new ArrayIterator( $this->_data );

    }

    // </editor-fold>


    // <editor-fold desc="= = =   I M P L E M E N T   ' A r r a y A c c e s s '   = = = = = = = = = = = = = = = =">

    /**
     * Whether a offset exists.
     *
     * @param int $offset An offset to check for.
     *
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
     * @param int $offset The offset to retrieve.
     *
     * @return Holiday
     * @link   http://php.net/manual/en/arrayaccess.offsetget.php
     */
    public function offsetGet( $offset )
    {

        return $this->_data[ $offset ];

    }

    /**
     * Offset to set.
     *
     * @param string|null $offset The offset to assign the value to.
     * @param Holiday     $value  The value to set.
     *
     * @throws Exception
     * @link   http://php.net/manual/en/arrayaccess.offsetset.php
     */
    public function offsetSet( $offset, $value )
    {

        if ( !( $value instanceof Holiday ) )
        {
            throw new Exception( 'Can not set an holiday if it is not an Holiday instance!' );
        }

        if ( is_null( $offset ) )
        {
            $this->_data[ $value->getIdentifier() ] = $value;
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
     *
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

        return count( $this->_data );

    }

    // </editor-fold>


    // <editor-fold desc="= = =   G E T T E R S   = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =">

    /**
     * Gets a numeric indicated array that defines the names of all regions/provinces/states for current country.
     *
     * @return array
     */
    public function getRegions(): array
    {

        return $this->_regions;

    }

    /**
     * Gets the 2 char ISO country ID (e.g.: 'de', 'fr')
     *
     * @return string
     */
    public function getCountryId(): string
    {

        return $this->_countryId;

    }

    /**
     * Gets the country name (e.g. 'Deutschland' or 'United Kingdom')
     *
     * @return string
     */
    public function getCountryName(): string
    {

        return $this->_countryName;

    }

    /**
     * Get the names of all an registered global callbacks.
     *
     * @return int
     */
    public function getYear(): int
    {

        return $this->_year;

    }

    /**
     * Gets an array with all valid holidays for defined year.
     *
     * @return Holiday[]
     */
    public function getHolidays(): array
    {

        return $this->_data;

    }

    /**
     * Gets if an region with the defined index or name exists.
     *
     * @param string|int $region The name or index of the required region
     *
     * @return bool
     */
    public function hasRegion( $region ): bool
    {

        if ( is_int( $region ) )
        {
            return isset( $this->_regions[ $region ] );
        }

        return ( false !== array_search( $region, $this->_regions ) );

    }

    /**
     * Gets if the country has registered some known regions.
     *
     * @return bool
     */
    public function hasRegions(): bool
    {

        return count( $this->_regions ) > 0;

    }

    /**
     * Gets if the Holiday with the defined identifier is defined.
     *
     * @param string $identifier The Unique holiday identifier
     *
     * @return bool
     */
    public function has( string $identifier ): bool
    {

        return isset( $this->_data[ $identifier ] );

    }

    /**
     * Gets the Holiday with the defined identifier, or NULL if no holiday for identifier is defined.
     *
     * @param string $identifier The Unique holiday identifier
     *
     * @return Holiday|null
     */
    public function get( string $identifier ): ?Holiday
    {

        if ( !$this->has( $identifier ) )
        {
            return null;
        }

        return $this->_data[ $identifier ];

    }

    /**
     * Gets the identifiers or all current defined holidays.
     *
     * @return array
     */
    public function getIdentifiers(): array
    {

        return array_keys( $this->_data );

    }

    // </editor-fold>


    // <editor-fold desc="= = =   S E T T E R S   = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =">

    /**
     * Sets a numeric indicated array that defines the names of all regions/provinces/states for current country.
     *
     * The associated indexes are used later for point to the regions
     *
     * @param array $regions
     *
     * @return HolidayCollection
     */
    public function setRegions( array $regions ): HolidayCollection
    {

        $this->_regions = $regions;

        return $this;

    }

    /**
     * Add an holiday to the collection.
     *
     * @param Holiday $holiday
     *
     * @return HolidayCollection
     */
    public function add( Holiday $holiday ): HolidayCollection
    {

        $this->_data[ $holiday->getIdentifier() ] = $holiday;

        return $this;

    }

    /**
     * Add one or more holidays to the collection.
     *
     * @param Holiday ...$holidays
     *
     * @return HolidayCollection
     */
    public function addRange( Holiday ...$holidays ): HolidayCollection
    {

        foreach ( $holidays as $holiday )
        {
            $this->_data[ $holiday->getIdentifier() ] = $holiday;
        }

        return $this;

    }

    // </editor-fold>


    // <editor-fold desc="= = =   O T H E R   P U B L I C   M E T H O D S   = = = = = = = = = = = = = = = = = = =">

    /**
     * Extract the names of all regions with the defined indexes.
     *
     * @param array $regionIndexes The indexes of the required regions. Empty array means all regions.
     *
     * @return array
     */
    public function extractRegionNames( array $regionIndexes = [] ): array
    {

        $names = [];

        if ( count( $regionIndexes ) < 1 || $regionIndexes[ 0 ] === -1 )
        {
            return $this->_regions;
        }

        foreach ( $regionIndexes as $regionIndex )
        {
            if ( !isset( $this->_regions[ $regionIndex ] ) )
            {
                continue;
            }
            $names[ $regionIndex ] = $this->_regions[ $regionIndex ];
        }

        return $names;

    }

    /**
     * Gets the index of an region with the defined name, or FALSE if it not exists.
     *
     * @param string $region The name of the required region
     *
     * @return int|FALSE
     */
    public function indexOfRegion( string $region )
    {

        return array_search( $region, $this->_regions );

    }

    /**
     * Gets if the defined date is a known holiday for instance year holidays.
     *
     * @param mixed       $date
     * @param string|null $foundIdentifier Return the holiday identifier if the method return true
     *
     * @return bool
     */
    public function containsDate( $date, string &$foundIdentifier = null ): bool
    {

        if ( false === ( $dt = DateTime::Parse( $date ) ) )
        {
            return false;
        }

        $dateString = '' . $this->_year . $dt->format( '-m-d' );

        foreach ( $this->_data as $holiday )
        {
            if ( $dateString === $holiday->getDate()->format( 'Y-m-d' ) )
            {
                $foundIdentifier = $holiday->getIdentifier();

                return true;
            }
        }

        return false;

    }

    /**
     * Gets if the defined day and month is a known holiday for instance year holidays.
     *
     * @param int         $month
     * @param int         $day
     * @param string|null $foundIdentifier Return the first found holiday identifier if the method return true.
     *
     * @return bool
     */
    public function containsDay( int $month, int $day, string &$foundIdentifier = null ): bool
    {

        $dt = DateTime::Create( $this->_year, $month, $day );

        $dateString = $dt->format( 'Y-m-d' );

        foreach ( $this->_data as $holiday )
        {
            if ( $dateString === $holiday->getDate()->format( 'Y-m-d' ) )
            {
                $foundIdentifier = $holiday->getIdentifier();

                return true;
            }
        }

        return false;

    }

    /**
     * Extracts a subset of holidays, starting at defined month and/or day, or later.
     *
     * If you set $month and/or $day to a value lower than 1, the current day and/or month is used
     *
     * @param int $month
     * @param int $day
     *
     * @return HolidayCollection
     */
    public function startsAt( int $month = 1, int $day = 1 ): HolidayCollection
    {

        $result = ( new HolidayCollection( $this->_year, $this->_countryName, $this->_countryId ) )
            ->setRegions( $this->_regions );

        if ( $month < 1 )
        {
            $month = DateTime::CurrentMonth();
        }
        if ( $day < 1 )
        {
            $day = DateTime::CurrentDay();
        }

        $minDate = DateTime::Create( $this->_year, $month, $day );

        foreach ( $this->_data as $identifier => $holiday )
        {
            if ( $holiday->getDate() < $minDate )
            {
                continue;
            }
            $result->_data[ $identifier ] = $holiday;
        }

        return $result;

    }

    /**
     * Extracts all holidays for the region with defined ID. Region ID means the index of the region within the list
     * of defined regions.
     *
     * If you want to known the names of all defined regions
     *
     * @param int $regionId
     *
     * @return HolidayCollection
     */
    public function byRegionId( int $regionId ): HolidayCollection
    {

        $result = ( new HolidayCollection( $this->_year, $this->_countryName, $this->_countryId ) )
            ->setRegions( $this->_regions );

        foreach ( $this->_data as $identifier => $holiday )
        {
            $regions = $holiday->getValidRegions();
            if ( [ -1 ] === $regions || [] === $regions || in_array( $regionId, $regions, true ) )
            {
                $result->_data[ $identifier ] = $holiday;
            }
        }

        return $result;

    }

    /**
     * Extracts all holidays for the regions with defined IDs.
     *
     * @param array $regionIds
     *
     * @return HolidayCollection
     */
    public function byRegionIds( array $regionIds ): HolidayCollection
    {

        $result = ( new HolidayCollection( $this->_year, $this->_countryName, $this->_countryId ) )
            ->setRegions( $this->_regions );

        foreach ( $this->_data as $identifier => $holiday )
        {
            $regions = $holiday->getValidRegions();
            if ( [ -1 ] === $regions || [] === $regions )
            {
                $result->_data[ $identifier ] = $holiday;
            }
            else
            {
                foreach ( $regionIds as $regionId )
                {
                    if ( in_array( $regionId, $regions, true ) )
                    {
                        $result->_data[ $identifier ] = $holiday;
                    }
                }
            }
        }

        return $result;

    }

    /**
     * Extracts all holidays for the region with defined Name.
     *
     * @param string $regionName
     *
     * @return HolidayCollection
     */
    public function byRegionName( string $regionName ): HolidayCollection
    {

        $regionId = $this->indexOfRegion( $regionName );

        if ( false === $regionId || 1 > $regionId )
        {
            return ( new HolidayCollection( $this->_year, $this->_countryName, $this->_countryId ) )
                ->setRegions( $this->_regions );
        }

        return $this->byRegionId( $regionId );

    }

    /**
     * Extracts all holidays for the regions with defined names.
     *
     * @param array $regionNames
     *
     * @return HolidayCollection
     */
    public function byRegionNames( array $regionNames ): HolidayCollection
    {

        $regionIds = [];
        foreach ( $regionNames as $regionName )
        {
            if ( false !== ( $regionId = $this->indexOfRegion( $regionName ) ) )
            {
                $regionIds[] = $regionId;
            }
        }

        return $this->byRegionIds( $regionIds );

    }

    /**
     * Gets only the holidays where working is not required (rest days)
     *
     * @return HolidayCollection
     */
    public function restDays(): HolidayCollection
    {

        $result = ( new HolidayCollection( $this->_year, $this->_countryName, $this->_countryId ) )
            ->setRegions( $this->_regions );

        foreach ( $this->_data as $identifier => $holiday )
        {
            if ( !$holiday->getIsRestDay() )
            {
                continue;
            }
            $result->_data[ $identifier ] = $holiday;
        }

        return $result;

    }

    /**
     * Gets only the not work free, no rest day holidays
     *
     * @return HolidayCollection
     */
    public function noRestDays(): HolidayCollection
    {

        $result = ( new HolidayCollection( $this->_year, $this->_countryName, $this->_countryId ) )
            ->setRegions( $this->_regions );

        foreach ( $this->_data as $identifier => $holiday )
        {
            if ( $holiday->getIsRestDay() )
            {
                continue;
            }
            $result->_data[ $identifier ] = $holiday;
        }

        return $result;

    }

    // </editor-fold>


    // </editor-fold>


    // <editor-fold desc="= = =   P U B L I C   S T A T I C   M E T H O D S   = = = = = = = = = = = = = = = = = =">

    /**
     * Creates a new HolidayCollection instance and returns it.
     *
     * @param int    $year        The year where the holidays are valid for
     * @param string $countryName The country name (e.g. 'Deutschland' or 'United Kingdom')
     * @param string $countryId   The 2 char ISO country ID (e.g.: 'de', 'fr')
     *
     * @return HolidayCollection
     */
    public static function Create( int $year, string $countryName, string $countryId ): HolidayCollection
    {

        return new self( $year, $countryName, $countryId );

    }


    // </editor-fold>


}

