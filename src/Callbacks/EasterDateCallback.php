<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @license        MIT
 * @since          2018-05-01
 * @version        1.1.0
 */


declare( strict_types = 1 );


namespace Niirrty\Holiday\Callbacks;


use Niirrty\Date\DateTime;


class EasterDateCallback implements IDynamicDateCallback
{


   public function calculate( int $year ) : \DateTime
   {

      return DateTime::EasterSunday( $year );

   }


}

