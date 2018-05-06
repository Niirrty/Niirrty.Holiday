<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @license        MIT
 * @since          2018-05-01
 * @version        0.1.0
 */


declare( strict_types = 1 );


namespace Niirrty\Holiday\Tests\Fixtures;


use Niirrty\Holiday\Callbacks\IDynamicDateCallback;


class MyDynamicDateCallbackCallback implements IDynamicDateCallback
{

   public function calculate( int $year ) : \DateTime
   {

      return ( 0 === $year % 2 )
         ? new \DateTime( $year . '-04-12 00:00:00' )
         : new \DateTime( $year . '-04-15 00:00:00' );

   }

}

