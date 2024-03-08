<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright      © 2017-2020, Ni Irrty
 * @license        MIT
 * @since          2018-05-01
 * @version        1.3.0
 */


declare( strict_types=1 );


namespace Niirrty\Holiday\Callbacks;


use DateTime;


/**
 * Simple generic method to calculate a date by a callback function/method.
 *
 * Use it like the following example:
 *
 * <code>
 * $cb = new GenericDateCallback(
 *     function ( int $year ) : \DateTime
 *     {
 *         if ( 0 === $year % 2 )
 *         {
 *             return new DateTime( $year . '-12-07' );
 *         }
 *         return new DateTime( $year . '-12-08' );
 *     }
 * );
 * $cb->calculate( 1969 )
 * </code>
 *
 * The callback function checks if the year value is a modulo of 2 (year is smoothly divisible by 2).
 *
 * If so, YEAR-12-07 is returned. Otherwise, YEAR-12-08 is returned.
 *
 * @package Niirrty\Holiday\Callbacks
 */
class GenericDateCallback implements IDynamicDateCallback
{


    /**
     * The callback must accept a single parameter (the year, required to calculate the date) and must
     * return the calculated \DateTime value.
     *
     * @type callable
     */
    protected $_callback;


    /**
     * GenericDateCallback constructor.
     *
     * @param callable $callback
     */
    public function __construct( callable $callback )
    {

        $this->_callback = $callback;

    }


    /**
     * Calculate the holiday datetime for defined year and returns it.
     *
     * @param int $year
     *
     * @return DateTime
     */
    public function calculate( int $year ): DateTime
    {

        return \call_user_func( $this->_callback, $year );

    }


}

