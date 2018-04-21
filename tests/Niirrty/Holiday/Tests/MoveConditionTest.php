<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @license        MIT
 * @since          2018-04-19
 * @version        0.1.0
 */


namespace Niirrty\Holiday\Tests;


use Niirrty\Date\DateTime;
use Niirrty\Holiday\DateMove\MoveCondition;
use PHPUnit\Framework\TestCase;


class MoveConditionTest extends TestCase
{

   private $callback;
   private $condition;
   private $acceptedRegions = [ 1, 3, 4 ];

   public function setUp()
   {

      $this->callback = function ( \DateTime $date ) : bool
      {
         return 4 === (int) $date->format( 'm' );
      };

      $this->condition = MoveCondition::Create( 1, $this->callback )
                                      ->setAcceptedRegions( $this->acceptedRegions );

      parent::setUp();

   }

   public function testCreate()
   {

      $callback = function ( \DateTime $date ) : bool
      {
         return 0 !== ( (int) $date->format( 'w' ) );
      };
      $cond = MoveCondition::Create( 1, $callback );
      $this->assertInstanceOf( MoveCondition::class, $cond );
      $this->assertSame( 1, $cond->getMoveDays() );
      $this->assertSame( $callback, $cond->getCondition() );
      $this->assertTrue( $cond->matches( new DateTime( '2018-04-20 00:00:00' ) ) );
      $this->assertFalse( $cond->matches( new DateTime( '2018-04-22 00:00:00' ) ) );

   }
   public function testOnSunday()
   {

      $cond = MoveCondition::OnSunday( 1 );
      $this->assertInstanceOf( MoveCondition::class, $cond );
      $this->assertFalse( $cond->matches( new DateTime( '2018-04-21 00:00:00' ) ) );
      $this->assertTrue( $cond->matches( new DateTime( '2018-04-22 01:00:00' ) ) );

   }
   public function testOnMonday()
   {

      $cond = MoveCondition::OnMonday( 3 );
      $this->assertInstanceOf( MoveCondition::class, $cond );
      $this->assertTrue( $cond->matches( new DateTime( '2018-04-23 00:00:00' ) ) );
      $this->assertFalse( $cond->matches( new DateTime( '2018-04-22 00:00:00' ) ) );

   }
   public function testOnSaturday()
   {

      $cond = MoveCondition::OnSaturday( 2 );
      $this->assertInstanceOf( MoveCondition::class, $cond );
      $this->assertTrue( $cond->matches( new DateTime( '2018-04-21 00:00:00' ) ) );
      $this->assertFalse( $cond->matches( new DateTime( '2018-04-22 00:00:00' ) ) );

   }
   #public function testGetCondition() { $this->assertSame( '', '' ); }
   #public function testGetAcceptedRegions() { $this->assertSame( '', '' ); }
   #public function testGetMoveDays() { $this->assertSame( '', '' ); }
   #public function testSetCondition() { $this->assertSame( '', '' ); }
   #public function testSetAcceptedRegions() { $this->assertSame( '', '' ); }
   #public function testSetMoveDays() { $this->assertSame( '', '' ); }
   #public function testMatches() { $this->assertSame( '', '' ); }
   #public function testMove() { $this->assertSame( '', '' ); }
   #public function testIsValid() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }
   #public function test() { $this->assertSame( '', '' ); }

}
