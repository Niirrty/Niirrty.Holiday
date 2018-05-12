<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @license        MIT
 * @since          2018-05-11
 * @version        0.1.0
 */


namespace Niirrty\Holiday\Tests;


use Niirrty\Date\DateTime;
use Niirrty\Holiday\Callbacks\GenericDateCallback;
use PHPUnit\Framework\TestCase;


class GenericDateCallbackTest extends TestCase
{

   public function test_calculate()
   {

      $cb = new GenericDateCallback(
         function ( int $year ) : \DateTime
         {
            if ( 0 === $year % 2 )
            {
               return new DateTime( $year . '-12-07' );
            }
            return new DateTime( $year . '-12-08' );
         }
      );

      $this->assertSame( '1969-12-08', $cb->calculate( 1969 )->format( 'Y-m-d' ) );
      $this->assertSame( '1970-12-07', $cb->calculate( 1970 )->format( 'Y-m-d' ) );
      $this->assertSame( '1971-12-08', $cb->calculate( 1971 )->format( 'Y-m-d' ) );
      $this->assertSame( '1972-12-07', $cb->calculate( 1972 )->format( 'Y-m-d' ) );

   }


}
