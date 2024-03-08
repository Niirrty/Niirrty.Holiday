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


use Niirrty\Date\DateTime;


/**
 * If a date should be calculated by a DateTime modification (modify() method format), it can be defined by this
 * dynamic date callback.
 *
 * @package Niirrty\Holiday\Callbacks
 */
class ModifyDateCallback implements IDynamicDateCallback
{


    /**
     * ModifyDateCallback constructor.
     *
     * @param int    $month    The base holiday month.
     * @param int    $day      The base holiday day of month
     * @param string $modifier The modifier string. e.g.: 'last monday'
     */
    public function __construct( protected int $month, protected int $day, protected string $modifier ) { }


    /**
     * Calculate the holiday datetime for defined year and returns it.
     *
     * @param int $year
     *
     * @return \DateTime
     */
    public function calculate( int $year ): \DateTime
    {

        return DateTime::Create( $year, $this->month, $this->day )->modify( $this->modifier );

    }


}

