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
use Niirrty\Holiday\Exception;
use Niirrty\Holiday\Holiday;
use Niirrty\Holiday\HolidayCollection;
use PHPUnit\Framework\TestCase;


class HolidayCollectionTest extends TestCase
{

   /** @type \Niirrty\Holiday\HolidayCollection */
   private $collection;

   public function setUp()
   {

      $this->collection = new HolidayCollection( 2018, 'Ende der Welt', 'ew' );
      $this->collection->addRange(
         ( new Holiday( 'Tag 1' ) )->setValidRegions( [ 1 ] )
                                   ->setName( 'Tag 1 des neuen Jahres' )
                                   ->setDate( new DateTime( '2018-01-01' ) ),
         ( new Holiday( 'Befreiung' ) )
                       ->setName( 'Tag der Befreiung' )
                       ->setDate( new DateTime( '2018-06-24' ) )
      )->setRegions(
         [ 1 => 'Foo', 2 => 'Bar', 3 => 'Baz' ]
      );
      parent::setUp();

   }

   public function testGetIterator()
   {

      $this->assertTrue( \is_iterable( $this->collection ) );
      $this->assertTrue( \is_iterable( $this->collection->getIterator() ) );

   }
   public function testOffsetExists()
   {

      $this->assertTrue( isset( $this->collection[ 'Tag 1' ] ) );
      $this->assertTrue( isset( $this->collection[ 'Befreiung' ] ) );
      $this->assertFalse( isset( $this->collection[ 'Ostern' ] ) );

   }
   public function testOffsetGet()
   {

      $this->assertSame( '2018-01-01',
                         $this->collection[ 'Tag 1' ]->getDate()->format( 'Y-m-d' ) );

   }
   public function testOffsetSet()
   {

      $this->collection[] = ( new Holiday( 'Pflugfest' ) )
         ->setName( 'Tag des Pfluges' )
         ->setDate( new DateTime( '2018-08-12' ) );
      $this->collection[ 'Hirtendank' ] = ( new Holiday( 'Hirtendank' ) )
         ->setName( 'Tag des Hirten' )
         ->setDate( new DateTime( '2018-08-19' ) );

      $this->assertSame( '2018-08-12',
                         $this->collection[ 'Pflugfest' ]->getDate()->format( 'Y-m-d' ) );
      $this->assertSame( '2018-08-19',
                         $this->collection[ 'Hirtendank' ]->getDate()->format( 'Y-m-d' ) );

   }
   public function testOffsetSetException()
   {

      $this->expectException( Exception::class );
      $this->collection[ 'xyz' ] = 12;

   }
   public function testOffsetUnset()
   {

      unset( $this->collection[ 'Tag 1' ] );
      $this->assertSame( 1, $this->collection->count() );

   }
   public function testCount()
   {

      $this->assertSame( 2, \count( $this->collection ) );

   }

   public function test_getRegions()
   {

      $this->assertSame( [ 1 => 'Foo', 2 => 'Bar', 3 => 'Baz' ], $this->collection->getRegions() );

   }
   public function test_getCountryId()
   {

      $this->assertSame( 'ew', $this->collection->getCountryId() );

   }
   public function test_getCountryName()
   {

      $this->assertSame( 'Ende der Welt', $this->collection->getCountryName() );

   }
   public function test_getYear()
   {

      $this->assertSame( 2018, $this->collection->getYear() );

   }
   public function test_getHolidays()
   {

      $this->assertSame( 2, \count( $this->collection->getHolidays() ) );

   }
   public function test_hasRegion()
   {

      $this->assertTrue( $this->collection->hasRegion( 1 ) );
      $this->assertTrue( $this->collection->hasRegion( 'Bar' ) );
      $this->assertTrue( $this->collection->hasRegion( 'Baz' ) );
      $this->assertFalse( $this->collection->hasRegion( 'Blub' ) );
      $this->assertFalse( $this->collection->hasRegion( 4 ) );

   }
   public function test_hasRegions()
   {

      $this->assertTrue( $this->collection->hasRegions() );

   }
   public function test_has()
   {

      $this->assertTrue( $this->collection->has( 'Tag 1' ) );
      $this->assertTrue( $this->collection->has( 'Befreiung' ) );
      $this->assertFalse( $this->collection->has( 'Ostern' ) );

   }
   public function test_get()
   {

      $this->assertInstanceOf( Holiday::class, $this->collection->get( 'Tag 1' ) );
      $this->assertInstanceOf( Holiday::class, $this->collection->get( 'Befreiung' ) );
      $this->assertNull( $this->collection->get( 'Ostern' ) );

   }
   public function test_getIdentifiers()
   {

      $this->assertSame( [ 'Tag 1', 'Befreiung' ], $this->collection->getIdentifiers() );

   }
   public function test_setRegions()
   {

      $this->assertSame( [], $this->collection->setRegions( [] )->getRegions() );
      $this->assertSame( [ 4 => 'Blubb' ], $this->collection->setRegions( [ 4 => 'Blubb' ] )->getRegions() );

   }
   public function test_add()
   {

      $this->assertSame(
         3,
         $this->collection->add(
            ( new Holiday( 'Waldläufer' ) )
               ->setName( 'Tag des Waldläufers' )
               ->setDate( new DateTime( '2018-09-07' ) )
         )->count()
      );

   }
   public function test_addRange()
   {

      $this->assertSame(
         4,
         $this->collection->addRange(
            ( new Holiday( 'Waldläufer' ) )
               ->setName( 'Tag des Waldläufers' )
               ->setDate( new DateTime( '2018-09-07' ) ),
            ( new Holiday( 'Wanderfalken Krönung' ) )
               ->setName( 'Tag der Wanderfalken Krönung' )
               ->setDate( new DateTime( '2018-10-11' ) )
         )->count()
      );

   }
   public function test_extractRegionNames()
   {

      $this->assertSame( [ 1 => 'Foo', 3 => 'Baz' ], $this->collection->extractRegionNames( [ 1, 9, 3 ] ) );
      $this->assertSame( [ 1 => 'Foo', 2 => 'Bar', 3 => 'Baz' ], $this->collection->extractRegionNames( [] ) );

   }
   public function test_indexOfRegion()
   {

      $this->assertSame( 2, $this->collection->indexOfRegion( 'Bar' ) );
      $this->assertFalse( $this->collection->indexOfRegion( 'Blub' ) );

   }
   public function test_containsDate()
   {

      $this->assertTrue( $this->collection->containsDate( new DateTime( '2018-01-01' ), $foundId ) );
      $this->assertSame( 'Tag 1', $foundId );
      $this->assertTrue( $this->collection->containsDate( new DateTime( '2017-01-01' ), $foundId ) );
      $this->assertSame( 'Tag 1', $foundId );
      $this->assertFalse( $this->collection->containsDate( new DateTime( '2018-02-01' ), $foundId ) );
      $this->assertTrue( $this->collection->containsDate( '2018-06-24', $foundId ) );
      $this->assertFalse( $this->collection->containsDate( new \stdClass(), $foundId ) );

   }
   public function test_containsDay()
   {

      $this->assertTrue( $this->collection->containsDay( 1, 1, $foundId ) );
      $this->assertSame( 'Tag 1', $foundId );
      $this->assertTrue( $this->collection->containsDay( 6, 24, $foundId ) );
      $this->assertSame( 'Befreiung', $foundId );
      $this->assertFalse( $this->collection->containsDay( 6, 25, $foundId ) );

   }
   public function test_startsAt()
   {

      $this->assertSame( 1, $this->collection->startsAt( 5 )->count() );

   }
   #public function test_Create() { $this->assertSame( '', '' ); }

}

