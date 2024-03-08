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


class EasterDateCallback implements IDynamicDateCallback
{


    /**
     * @throws \Throwable
     */
    public function calculate( int $year ): \DateTime
    {

        return DateTime::EasterSunday( $year );

    }


}

