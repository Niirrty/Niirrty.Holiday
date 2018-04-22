<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @license        MIT
 * @since          2018-04-19
 * @version        0.1.0
 */


namespace Niirrty\Holiday\Tests;


use Niirrty\Holiday\DateMove\MoveCondition;
use PHPUnit\Framework\TestCase;


class MoveConditionTest extends TestCase
{

   private $callback;

   /** @type \Niirrty\Holiday\DateMove\MoveCondition */
   private $condition;
   private $acceptedRegions = [ 1, 3, 4 ];

   public function setUp()
   {

      $this->callback = function ( \DateTime $date ) : bool
      {
         $weekDay = (int) $date->format( 'm' );
         return 4 === $weekDay;
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
      $this->assertTrue( $cond->matches( new \DateTime( '2018-04-20 00:00:00' ) ) );
      $this->assertFalse( $cond->matches( new \DateTime( '2018-04-22 00:00:00' ) ) );

   }
   public function testOnSunday()
   {

      $cond = MoveCondition::OnSunday( 1 );
      $this->assertInstanceOf( MoveCondition::class, $cond );
      $this->assertFalse( $cond->matches( new \DateTime( '2018-04-21 00:00:00' ) ) );
      $this->assertTrue( $cond->matches( new \DateTime( '2018-04-22 01:00:00' ) ) );

   }
   public function testOnMonday()
   {

      $cond = MoveCondition::OnMonday( 3 );
      $this->assertInstanceOf( MoveCondition::class, $cond );
      $this->assertTrue( $cond->matches( new \DateTime( '2018-04-23 00:00:00' ) ) );
      $this->assertFalse( $cond->matches( new \DateTime( '2018-04-22 00:00:00' ) ) );

   }
   public function testOnSaturday()
   {

      $cond = MoveCondition::OnSaturday( 2 );
      $this->assertInstanceOf( MoveCondition::class, $cond );
      $this->assertTrue( $cond->matches( new \DateTime( '2018-04-21 00:00:00' ) ) );
      $this->assertFalse( $cond->matches( new \DateTime( '2018-04-22 00:00:00' ) ) );

   }
   public function testGetCondition()
   {

      $this->assertTrue( \is_callable( $this->condition->getCondition() ) );
      $this->assertSame( $this->callback, $this->condition->getCondition() );

   }
   public function testGetAcceptedRegions()
   {

      $this->assertSame( $this->acceptedRegions, $this->condition->getAcceptedRegions() );

   }
   public function testGetMoveDays()
   {

      $this->assertSame( 1, $this->condition->getMoveDays() );

   }
   public function testSetCondition()
   {

      $callback = function ( \DateTime $date ) : bool
      {
         return 4 !== ( (int) $date->format( 'w' ) );
      };
      $cond = MoveCondition::Create( 1, $callback );

      $this->assertSame( $callback, $cond->setCondition( $callback )->getCondition() );

   }
   public function testSetAcceptedRegions()
   {

      $this->assertSame( [ 12 ], $this->condition->setAcceptedRegions( [ 12 ] )->getAcceptedRegions() );

   }
   public function testSetMoveDays()
   {

      $this->assertSame( 3, $this->condition->setMoveDays( 3 )->getMoveDays() );

   }
   public function testMatches()
   {

      $onThursday = function( \DateTimeInterface $date ) : bool { return 4 === ( (int) $date->format( 'w' ) ); };
      $onFriday = function( \DateTimeInterface $date ) : bool
      {
         $weekDay = (int) $date->format( 'w' );
         return 5 === $weekDay;
      };
      $this->assertFalse( MoveCondition::Create( 2, $onThursday )->matches( new \DateTime( '2018-04-18 00:00:00' ) ) );
      $this->assertTrue( MoveCondition::Create( 2, $onThursday )->matches( new \DateTime( '2018-04-19 00:00:00' ) ) );
      $this->assertTrue( MoveCondition::Create( 2, $onThursday )->matches( new \DateTime( '2018-04-19 00:00:00' ), [ 3 ] ) );
      $this->assertFalse( $this->condition->matches( new \DateTime( '2018-04-19 00:00:00' ), [ 16 ] ) );
      $this->assertFalse( MoveCondition::Create( 2, $onFriday )->matches( new \DateTime( '2018-04-19 00:00:00' ) ) );
      $this->assertTrue( MoveCondition::Create( 2, $onFriday )->matches( new \DateTime( '2018-04-20 00:00:00' ) ) );
      $this->assertFalse( MoveCondition::Create( 2, $onFriday )->matches( new \DateTime( '2018-04-21 00:00:00' ) ) );
      $this->assertFalse( ( new MoveCondition() )->matches( new \DateTime( '2018-04-21 00:00:00' ) ) );

   }
   public function testMove()
   {

      $this->assertSame( '2018-04-20', $this->condition->move( new \DateTime( '2018-04-19 14:23:44' ) )->format( 'Y-m-d' ) );
      $this->assertSame( '2018-04-19', $this->condition->setMoveDays( 0 )->move( new \DateTime( '2018-04-19 14:23:44' ) )->format( 'Y-m-d' ) );

   }
   public function testIsValid()
   {

      $this->assertTrue( $this->condition->isValid() );
      $this->assertFalse( ( new MoveCondition() )->isValid() );

   }

}

