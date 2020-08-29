<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright      © 2017-2020, Ni Irrty
 * @license        MIT
 * @since          2018-05-01
 * @version        1.3.0
 */


declare( strict_types=1 );


namespace Niirrty\Holiday\DateMove;


use DateTime;
use DateTimeInterface;
use function abs;
use function call_user_func;
use function in_array;
use function is_callable;


/**
 * Moves a date by days if a condition matches the date. (e.g. move holiday to monday if its on a sunday)
 */
class MoveCondition implements IMoveCondition
{


    // <editor-fold desc="// –––––––   P R O T E C T E D   F I E L D S   ––––––––––––––––––––––––––––––––––">


    /**
     * The date move condition callback. It must accept a single parameter of type {@see \DateTime} and must return
     * boolean (true if the condition matches the date, false otherwise)
     *
     * @type callable
     */
    protected $_conditionCallback;

    /**
     * How many days a date should be moved if the condition matches the checked date
     *
     * @type int
     */
    protected $_moveDays;

    /**
     * The indexes of all country regions where this MoveCondition can be used for.
     *
     * A empty array or [ -1 ] means holidays of all regions handle this condition
     *
     * @type array
     */
    protected        $_acceptedRegions = [ -1 ];

    protected static $isSaturday       = null;

    protected static $isSunday         = null;

    protected static $isMonday         = null;

    // </editor-fold>


    // <editor-fold desc="// –––––––   C O N S T R U C T O R   A N D / O R   D E S T R U C T O R   ––––––––">

    /**
     * Init a new HolidayMover instance.
     */
    public function __construct()
    {

        $this->_conditionCallback = null;
        $this->_moveDays = 0;

        self::InitCallbacks();

    }

    // </editor-fold>


    // <editor-fold desc="// –––––––   P U B L I C   M E T H O D S   ––––––––––––––––––––––––––––––––––––––">


    // <editor-fold desc="// – – – –   G E T T E R   – – – – – – – – – – –">

    /**
     * Gets the Condition callback. It must accept a single parameter of type {@see \DateTime}
     * and must return boolean (true if the condition matches the date, false otherwise)
     *
     * @return callable|null
     */
    public function getCondition(): ?callable
    {

        return $this->_conditionCallback;

    }

    /**
     * Gets the indexes of all country regions where this MoveCondition can be used for.
     *
     * A empty array or [ -1 ] means holidays of all regions handle this condition
     *
     * @return array
     */
    public function getAcceptedRegions(): array
    {

        return $this->_acceptedRegions;

    }

    /**
     * Gets how many days a date should be moved if the condition matches the checked date
     *
     * @return int
     */
    public function getMoveDays(): int
    {

        return $this->_moveDays;

    }

    // </editor-fold>


    // <editor-fold desc="// – – – –   S E T T E R   – – – – – – – – – – –">

    /**
     * Set the Condition callable. It must accept a single parameter of type {@see \DateTime}
     * and must return boolean (true if the condition matches the date, false otherwise)
     *
     * @param callable $value
     *
     * @return MoveCondition
     */
    public function setCondition( callable $value ): MoveCondition
    {

        $this->_conditionCallback = $value;

        return $this;

    }

    /**
     * Sets the indexes of all country regions where this MoveCondition can be used for.
     *
     * A empty array or [ -1 ] means holidays of all regions handle this condition
     *
     * @param array $regions
     *
     * @return MoveCondition
     */
    public function setAcceptedRegions( array $regions = [ -1 ] ): MoveCondition
    {

        $this->_acceptedRegions = ( [] === $regions ) ? [ -1 ] : $regions;

        return $this;

    }

    /**
     * Sets how many days a date should be moved if the condition matches the checked date
     *
     * @param int $value
     *
     * @return MoveCondition
     */
    public function setMoveDays( int $value ): MoveCondition
    {

        $this->_moveDays = $value;

        return $this;

    }

    // </editor-fold>


    // <editor-fold desc="// – – – –   O T H E R   – – – – – – – – – – – –">

    /**
     * Gets if the current date move implementation condition matches the defined date.
     *
     * @param DateTimeInterface $date
     * @param array              $regions
     *
     * @return bool
     */
    public final function matches( DateTimeInterface $date, array $regions = [] ): bool
    {

        if ( !is_callable( $this->_conditionCallback ) )
        {
            return false;
        }

        if ( [] === $regions )
        {
            $regions = [ -1 ];
        }

        if ( !in_array( -1, $this->_acceptedRegions ) && !in_array( -1, $regions ) )
        {
            $isValid = false;
            foreach ( $regions as $region )
            {
                if ( in_array( $region, $this->_acceptedRegions ) )
                {
                    $isValid = true;
                    break;
                }
            }
            if ( !$isValid )
            {
                return false;
            }
        }

        return call_user_func( $this->_conditionCallback, $date );

    }

    /**
     * Moves the defined date by current defined amount of days and return the new instance.
     *
     * The check if the date value matches the move condition is not included! You have to call it before.
     *
     * @param DateTime $date
     *
     * @return DateTime
     */
    public final function move( DateTime $date ): DateTime
    {

        $clone = clone $date;

        if ( 0 === $this->_moveDays )
        {
            return $clone;
        }

        $absDays = abs( $this->_moveDays );
        $prefix = $this->_moveDays < 0 ? '-' : '+';
        $daysText = $absDays > 1 ? 'days' : 'day';

        return $date->modify( $prefix . $absDays . ' ' . $daysText );

    }

    /**
     * @inheritdoc
     */
    public final function isValid(): bool
    {

        return 0 !== $this->_moveDays && is_callable( $this->_conditionCallback );

    }

    // </editor-fold>


    // </editor-fold>


    // <editor-fold desc="// –––––––   P U B L I C   S T A T I C   M E T H O D S   ––––––––––––––––––––––––">

    /**
     * Creates a new date move.
     *
     * @param int      $moveDays  How many days a date should be moved if the condition matches the checked date
     * @param callable $condition The date move condition callback. It must accept a single parameter of type
     *                            {@see \DateTimeInterface} and must return boolean (true if the condition matches
     *                            the date, false otherwise)
     *
     * @return MoveCondition
     */
    public static function Create( int $moveDays, callable $condition ): MoveCondition
    {

        return ( new MoveCondition() )
            ->setMoveDays( $moveDays )
            ->setCondition( $condition );

    }

    /**
     * Creates a date move that matches if the date is on a sunday.
     *
     * @param int $moveDays
     *
     * @return MoveCondition
     */
    public static function OnSunday( int $moveDays ): MoveCondition
    {

        self::InitCallbacks();

        return MoveCondition::Create( $moveDays, static::$isSunday );

    }

    public static function OnMonday( int $moveDays ): MoveCondition
    {

        self::InitCallbacks();

        return MoveCondition::Create( $moveDays, static::$isMonday );

    }

    public static function OnSaturday( int $moveDays ): MoveCondition
    {

        self::InitCallbacks();

        return MoveCondition::Create( $moveDays, static::$isSaturday );

    }

    protected static function InitCallbacks()
    {

        if ( null !== self::$isSunday )
        {
            return;
        }

        self::$isSaturday = function ( DateTime $date ): bool
        {

            return 6 === ( (int) $date->format( 'w' ) );
        };
        self::$isSunday = function ( DateTime $date ): bool
        {

            return 0 === ( (int) $date->format( 'w' ) );
        };
        self::$isMonday = function ( DateTime $date ): bool
        {

            return 1 === ( (int) $date->format( 'w' ) );
        };

    }


    // </editor-fold>


}

