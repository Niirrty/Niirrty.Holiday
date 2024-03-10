<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @license        MIT
 * @since          2018-04-19
 * @version        0.1.0
 */


namespace Niirrty\Holiday\Tests;


use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;
use Niirrty\Holiday\Exception;
use Niirrty\Holiday\Tests\Fixtures\MyDynamicDateCallbackCallback;
use PHPUnit\Framework\TestCase;


class DefinitionCollectionTest extends TestCase
{


   /** @type \Niirrty\Holiday\DefinitionCollection */
   private $collection;

   public function setUp() : void
   {

      $this->collection = new DefinitionCollection( 'Deutschland', 'de' );
      $this->collection->add( Definition::Create( 'Neujahr' )->setStaticDate( 1, 1 ) );
      $this->collection->add( Definition::Create( 'Foo' )->setStaticDate( 1, 2 )->setValidToYear( 2017 ) );

      parent::setUp();

   }

   public function testGetIterator()
   {

      $this->assertTrue( \is_iterable( $this->collection ) );
      $this->assertTrue( \is_iterable( $this->collection->getIterator() ) );

   }
   public function testOffsetExists()
   {

      $this->assertTrue( isset( $this->collection[ 'Neujahr' ] ) );
      $this->assertFalse( isset( $this->collection[ 'Windfest' ] ) );

   }
   public function testOffsetGet()
   {

      $this->assertSame( '2018-01-01',
                         $this->collection[ 'Neujahr' ]->toHoliday( 2018, [] )->getDate()->format( 'Y-m-d' ) );

   }
   public function testOffsetSet()
   {

      $this->collection[ 'Pflugfest' ] = Definition::Create( 'Pflugfest' )->setStaticDate( 3, 11 );
      $this->collection[] = Definition::Create( 'Winterschalte' )->setStaticDate( 3, 14 );

      $this->assertSame( '2018-03-11',
                         $this->collection[ 'Pflugfest' ]->toHoliday( 2018, [] )->getDate()->format( 'Y-m-d' ) );

      $this->assertSame( '2018-03-14',
                         $this->collection[ 'Winterschalte' ]->toHoliday( 2018, [] )->getDate()->format( 'Y-m-d' ) );

   }
   public function testOffsetSetException()
   {

      $this->expectException( Exception::class );
      $this->collection[ 'xyz' ] = 12;

   }
   public function testOffsetUnset()
   {

      unset( $this->collection[ 'Neujahr' ] );
      $this->assertSame( 1, $this->collection->count() );

   }
   public function testCount()
   {

      $this->assertSame( 2, \count( $this->collection ) );
      $this->collection[] = Definition::Create( 'Winterschalte' )->setStaticDate( 3, 14 );
      $this->assertSame( 3, \count( $this->collection ) );

   }
   public function testGetRegions()
   {

      $this->assertSame( [], $this->collection->getRegions() );

   }
   public function testGetCountryName()
   {

      $this->assertSame( 'Deutschland', $this->collection->getCountryName() );

   }
   public function testGetCountryId()
   {

      $this->assertSame( 'de', $this->collection->getCountryId() );

   }
   public function testGetGlobalCallbackNames()
   {

      $this->assertSame( [ 'easter_sunday' ], $this->collection->getGlobalCallbackNames() );

   }
   public function testGetHolidays()
   {

      $this->assertSame( 1, \count( $this->collection->getHolidays( 2018, 'de' ) ) );

   }
   public function testSetRegions()
   {

      $this->assertSame( [ 1 => 'Reg. 1', 3 => 'Reg. 3', 4 => 'Reg. 4' ],
                         $this->collection->setRegions( [ 1 => 'Reg. 1', 3 => 'Reg. 3', 4 => 'Reg. 4' ] )
                                          ->getRegions() );

   }
   public function testExtractRegionNames()
   {

      $this->assertSame( [], $this->collection->extractRegionNames( [ 1, 4 ] ) );
      $this->assertSame( [], $this->collection->extractRegionNames( [ -1 ] ) );
      $this->assertSame( [], $this->collection->extractRegionNames( [] ) );
      $this->collection->setRegions( [ 1 => 'Reg. 1', 3 => 'Reg. 3', 4 => 'Reg. 4' ] );
      $this->assertSame( [ 1 => 'Reg. 1', 4 => 'Reg. 4' ], $this->collection->extractRegionNames( [ 1, 4 ] ) );
      $this->assertSame( [ 1 => 'Reg. 1', 3 => 'Reg. 3', 4 => 'Reg. 4' ], $this->collection->extractRegionNames( [] ) );

   }
   public function testHasRegion()
   {

      $this->assertFalse( $this->collection->hasRegion( 1 ) );

      $this->collection->setRegions( [ 1 => 'Reg. 1', 4 => 'Reg. 4' ] );

      $this->assertTrue( $this->collection->hasRegion( 1 ) );
      $this->assertTrue( $this->collection->hasRegion( 4 ) );
      $this->assertTrue( $this->collection->hasRegion( 'Reg. 1' ) );
      $this->assertTrue( $this->collection->hasRegion( 'Reg. 4' ) );
      $this->assertFalse( $this->collection->hasRegion( 2 ) );
      $this->assertFalse( $this->collection->hasRegion( 'Reg. 2' ) );

   }
   public function testIndexOfRegion()
   {

      $this->assertFalse( $this->collection->indexOfRegion( 'Reg. 1' ) );

      $this->collection->setRegions( [ 1 => 'Reg. 1', 4 => 'Reg. 4' ] );

      $this->assertSame( 1, $this->collection->indexOfRegion( 'Reg. 1' ) );
      $this->assertSame( 4, $this->collection->indexOfRegion( 'Reg. 4' ) );
      $this->assertFalse( $this->collection->indexOfRegion( 'Reg. 3' ) );

   }
   public function testHasRegions()
   {

      $this->assertFalse( $this->collection->hasRegions() );

      $this->collection->setRegions( [ 1 => 'Reg. 1', 4 => 'Reg. 4' ] );

      $this->assertTrue( $this->collection->hasRegions() );

   }
   public function testRegisterGlobalCallback()
   {

      $this->collection->registerGlobalCallback( 'foo', new MyDynamicDateCallbackCallback() );
      $this->assertSame( [ 'easter_sunday', 'foo' ], $this->collection->getGlobalCallbackNames() );

   }
   public function testRemoveGlobalCallback()
   {

      $this->collection->registerGlobalCallback( 'foo', new MyDynamicDateCallbackCallback() );

      $this->assertSame( [ 'easter_sunday' ], $this->collection->removeGlobalCallback( 'foo' )
                                                               ->getGlobalCallbackNames() );

      $this->collection->registerGlobalCallback( 'foo', new MyDynamicDateCallbackCallback() );
      $this->collection->registerGlobalCallback( 'bar', new MyDynamicDateCallbackCallback() );

      $this->assertSame( [ 'easter_sunday' ], $this->collection->removeGlobalCallback()
                                                               ->getGlobalCallbackNames() );

   }
   public function testRemoveGlobalCallbackException()
   {

      $this->expectException( Exception::class );
      $this->collection->removeGlobalCallback( 'easter_sunday' );

   }
   public function testAdd()
   {

      $this->assertFalse( isset( $this->collection[ 'Wacholderbusch Feuerfest' ] ) );

      $this->assertInstanceOf(
         DefinitionCollection::class,
         $this->collection->add( Definition::CreateEasterDepending( 'Wacholderbusch Feuerfest', 44 ) ) );

      $this->assertTrue( isset( $this->collection[ 'Wacholderbusch Feuerfest' ] ) );

   }
   public function testAddRange()
   {

      $this->assertFalse( isset( $this->collection[ 'Wacholderbusch Feuerfest' ] ) );
      $this->assertFalse( isset( $this->collection[ 'Wacholderbusch Feuerfest Abgesang' ] ) );

      $this->assertInstanceOf(
         DefinitionCollection::class,
         $this->collection->addRange(
            Definition::CreateEasterDepending( 'Wacholderbusch Feuerfest', 44 ),
            Definition::CreateEasterDepending( 'Wacholderbusch Feuerfest Abgesang', 45 )
         ) );

      $this->assertTrue( isset( $this->collection[ 'Wacholderbusch Feuerfest' ] ) );
      $this->assertTrue( isset( $this->collection[ 'Wacholderbusch Feuerfest Abgesang' ] ) );
      $this->assertTrue( \is_iterable( $this->collection->getIterator() ) );

   }
   public function testCreate()
   {

      $this->assertInstanceOf( DefinitionCollection::class, DefinitionCollection::Create( 'Germany', 'de' ) );

   }
   #public function test() { $this->assertSame( '', '' ); }

}
