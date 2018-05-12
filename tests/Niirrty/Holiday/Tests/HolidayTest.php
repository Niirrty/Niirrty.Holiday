<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @license        MIT
 * @since          2018-04-19
 * @version        0.1.0
 */


namespace Niirrty\Holiday\Tests;


use Niirrty\Holiday\Holiday;
use PHPUnit\Framework\TestCase;


class HolidayTest extends TestCase
{


   /**
    * @type \Niirrty\Holiday\Holiday
    */
   private $holiday;

   public function setUp()
   {

      $this->holiday = new Holiday( 'Foo-Day' );
      $this->holiday->setName( 'My Foo Day' )
                    ->setDate( new \DateTime( '2018-05-01 00:00:00' ) )
                    ->setValidRegions( [ 12 ] )
                    ->setLanguage( 'en' )
                    ->setDescription( 'A holiday destription' )
                    ->setMovedFromDate( new \DateTime( '2018-05-02 00:00:00' ) );
      parent::setUp();

   }

   public function testGetIdentifier()
   {

      $this->assertSame( 'Foo-Day', $this->holiday->getIdentifier() );

   }
   public function testGetName()
   {

      $this->assertSame( 'My Foo Day', $this->holiday->getName() );

   }
   public function testGetDescription()
   {

      $this->assertSame( 'A holiday destription', $this->holiday->getDescription() );

   }
   public function testGetDate()
   {

      $this->assertEquals( new \DateTime( '2018-05-01 00:00:00' ), $this->holiday->getDate() );

   }
   public function testGetValidRegions()
   {

      $this->assertSame( [ 12 ], $this->holiday->getValidRegions() );

   }
   public function testGetLanguage()
   {

      $this->assertSame( 'en', $this->holiday->getLanguage() );

   }
   public function testGetMovedFromDate()
   {

      $this->assertEquals( new \DateTime( '2018-05-02 00:00:00' ), $this->holiday->getMovedFromDate() );

   }
   public function testHasMovedFromDate()
   {

      $this->assertTrue( $this->holiday->hasMovedFromDate() );
      $this->holiday->setMovedFromDate( null );
      $this->assertFalse( $this->holiday->hasMovedFromDate() );

   }
   public function testGetIsRestDay()
   {

      $this->assertSame( true, $this->holiday->getIsRestDay() );

   }

   public function testSetName()
   {

      $this->assertSame( 'Blubb', $this->holiday->setName( 'Blubb' )->getName() );

   }
   public function testSetDescription()
   {

      $this->assertSame( null, $this->holiday->setDescription( null )->getDescription() );
      $this->assertSame( '', $this->holiday->setDescription( '' )->getDescription() );

   }
   public function testSetDate()
   {

      $this->assertEquals(
         new \DateTime( '2017-12-12 00:00:00' ),
         $this->holiday->setDate( new \DateTime( '2017-12-12 00:00:00' ) )->getDate()
      );

   }
   public function testSetValidRegions()
   {

      $this->assertSame( [ 1, 4 ], $this->holiday->setValidRegions( [ 1, 4 ] )->getValidRegions() );

   }
   public function testSetLanguage()
   {

      $this->assertSame( 'fr', $this->holiday->setLanguage( 'fr' )->getLanguage() );

   }
   public function testSetIsRestDay()
   {

      $this->assertSame( false, $this->holiday->setIsRestDay( false )->getIsRestDay() );

   }

}

