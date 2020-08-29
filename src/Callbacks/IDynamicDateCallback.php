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
 * Each dynamic date callback must implement this interface
 *
 * @package Niirrty\Holiday\Callbacks
 */
interface IDynamicDateCallback
{


    /**
     * Calculate the holiday datetime for defined year and returns it.
     *
     * @param int $year
     *
     * @return DateTime
     */
    public function calculate( int $year ): DateTime;


}

