<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @license        MIT
 * @since          2018-05-11
 * @version        0.1.0
 */


namespace Niirrty\Holiday\Tests;


use Niirrty\ArgumentException;
use Niirrty\Holiday\Callbacks\SeasonDateCallback;
use PHPUnit\Framework\TestCase;


class SeasonDateCallbackTest extends TestCase
{


   public function test_constructException1()
   {

      $this->expectException( ArgumentException::class );

      new SeasonDateCallback( 'invalid type', SeasonDateCallback::HEMISPHERE_NORTH );

   }
   public function test_constructException2()
   {

      $this->expectException( ArgumentException::class );

      new SeasonDateCallback( SeasonDateCallback::TYPE_WINTER, 'foo' );

   }
   public function test_calculate()
   {

      $cbNorth = new SeasonDateCallback(
         SeasonDateCallback::TYPE_WINTER,
         SeasonDateCallback::HEMISPHERE_NORTH
      );
      $cbSouth = new SeasonDateCallback(
         SeasonDateCallback::TYPE_WINTER,
         SeasonDateCallback::HEMISPHERE_SOUTH
      );

      $this->assertSame( '1969-12-22', $cbNorth->calculate( 1969 )->format( 'Y-m-d' ) );
      $this->assertSame( '1969-06-21', $cbSouth->calculate( 1969 )->format( 'Y-m-d' ) );
      $this->assertSame( '1569-06-21', $cbSouth->calculate( 1569 )->format( 'Y-m-d' ) );

   }


}
