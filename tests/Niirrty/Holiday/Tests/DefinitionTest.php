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
use Niirrty\Holiday\Callbacks\EasterDateCallback;
use Niirrty\Holiday\Callbacks\IDynamicDateCallback;
use Niirrty\Holiday\DateMove\MoveCondition;
use Niirrty\Holiday\Definition;
use Niirrty\Holiday\Holiday;
use Niirrty\Holiday\Tests\Fixtures\MyDynamicDateCallbackCallback;
use PHPUnit\Framework\TestCase;


class DefinitionTest extends TestCase
{


   /** @type \Niirrty\Holiday\Definition */
   private $definitionStatic;
   /** @type \Niirrty\Holiday\Definition */
   private $definitionDynamic;

   public function setUp() : void
   {

      $this->definitionStatic = new Definition( 'My special holiday' );
      $this->definitionStatic->setName( 'Mein spezieller Feiertag' )
                             ->setNameTranslations( [ 'de' => 'Mein spezieller Feiertag',
                                                      'en' => 'My special holiday' ] )
                             ->setDescription( 'Dieser Feiertag gilt nur für mich!' )
                             ->setStaticDate( 6, 24 )
                             ->setValidFromYear( 2016 )
                             ->setValidToYear( 2045 )
                             ->setMoveConditions(
                                MoveCondition::OnSaturday( 2 ),
                                MoveCondition::OnSunday( 1 ) )
                             ->setValidRegions( [ 12 ] );
      $this->definitionDynamic = new Definition( 'A dynamic holiday' );
      $this->definitionDynamic->setName( 'Ein dynamischer Feiertag' )
                              ->setDynamicDateCallback(
                                 new class implements IDynamicDateCallback
                                 {
                                    public function calculate( int $year ) : \DateTime
                                    {
                                       if ( $year < 2016 )
                                       {
                                          return new \DateTime( $year . '-03-28 00:00:00' );
                                       }
                                       return new \DateTime( $year . '-06-24 00:00:00' );
                                    }
                                 } )
                              ->setValidFromYear( 1943 );

      parent::setUp();

   }

   public function testGetIdentifier()
   {

      $this->assertSame( 'My special holiday', $this->definitionStatic->getIdentifier() );
      $this->assertSame( 'A dynamic holiday', $this->definitionDynamic->getIdentifier() );

   }
   public function testGetMonth()
   {

      $this->assertSame( 6, $this->definitionStatic->getMonth() );
      $this->assertNull( $this->definitionDynamic->getMonth() );

   }
   public function testGetDay()
   {

      $this->assertSame( 24, $this->definitionStatic->getDay() );
      $this->assertNull( $this->definitionDynamic->getDay() );

   }
   public function testGetDynamicDateCallback()
   {

      $this->assertNotNull( $this->definitionDynamic->getDynamicDateCallback() );
      $this->assertNull( $this->definitionStatic->getDynamicDateCallback() );

   }
   public function testHasDynamicDateCallback()
   {

      $this->assertFalse( $this->definitionStatic->hasDynamicDateCallback() );
      $this->assertTrue( $this->definitionDynamic->hasDynamicDateCallback() );

   }
   public function testGetName()
   {

      $this->assertSame( 'Mein spezieller Feiertag', $this->definitionStatic->getName() );
      $this->assertSame( 'Ein dynamischer Feiertag', $this->definitionDynamic->getName() );

   }
   public function testGetNameTranslations()
   {

      $this->assertSame( [ 'de' => 'Mein spezieller Feiertag',
                           'en' => 'My special holiday' ], $this->definitionStatic->getNameTranslations() );
      $this->assertSame( [], $this->definitionDynamic->getNameTranslations() );

   }
   public function testGetNameTranslated()
   {

      $this->assertSame( 'Mein spezieller Feiertag', $this->definitionStatic->getNameTranslated( 'de' ) );
      $this->assertSame( 'Mein spezieller Feiertag', $this->definitionStatic->getNameTranslated() );
      $this->assertSame( 'My special holiday', $this->definitionStatic->getNameTranslated( 'en' ) );
      $this->assertSame( 'Mein spezieller Feiertag', $this->definitionStatic->getNameTranslated( 'it' ) );

   }
   public function testGetBaseCallbackName()
   {

      $this->assertNull( $this->definitionStatic->getBaseCallbackName() );

   }
   public function testHasBaseCallbackName()
   {

      $this->assertFalse( $this->definitionStatic->hasBaseCallbackName() );

   }
   public function testGetDescription()
   {

      $this->assertSame( 'Dieser Feiertag gilt nur für mich!', $this->definitionStatic->getDescription() );
      $this->assertNull( $this->definitionDynamic->getDescription() );

   }
   public function testGetValidFromYear()
   {

      $this->assertSame( 2016, $this->definitionStatic->getValidFromYear() );
      $this->assertSame( 1943, $this->definitionDynamic->getValidFromYear() );

   }
   public function testGetValidToYear()
   {

      $this->assertSame( 2045, $this->definitionStatic->getValidToYear() );
      $this->assertNull( $this->definitionDynamic->getValidToYear() );

   }
   public function testGetMoveConditions()
   {

      $this->assertSame( 2, \count( $this->definitionStatic->getMoveConditions() ) );
      $this->assertSame( 0, \count( $this->definitionDynamic->getMoveConditions() ) );

   }
   public function testGetMoveAllMatches()
   {

      $this->assertFalse( $this->definitionStatic->getMoveAllMatches() );

   }
   public function testGetValidationCallback()
   {

      $this->assertNull( $this->definitionDynamic->getValidationCallback() );

   }
   public function testHasValidationCallback()
   {

      $this->assertFalse( $this->definitionDynamic->hasValidationCallback() );

   }
   public function testGetValidRegions()
   {

      $this->assertSame( [ 12 ], $this->definitionStatic->getValidRegions() );
      $this->assertSame( [ -1 ], $this->definitionDynamic->getValidRegions() );

   }
   public function testGetIsRestDay()
   {

      $this->assertSame( true, $this->definitionStatic->getIsRestDay() );

   }

   public function testSetName()
   {

      $this->assertSame( 'Foo', $this->definitionStatic->setName( 'Foo' )->getName() );

   }
   public function testSetNameTranslations()
   {

      $this->assertSame( [], $this->definitionStatic->setNameTranslations( [] )->getNameTranslations() );

   }
   public function testAddNameTranslation()
   {

      $this->assertSame( [ 'xy' => 'Blub' ], $this->definitionDynamic->addNameTranslation( 'xy', 'Blub' )->getNameTranslations() );

   }
   public function testSetDescription()
   {

      $this->definitionDynamic->toHoliday( 2016, [] );
      $this->assertSame( 'Description…', $this->definitionDynamic->setDescription( 'Description…' )->getDescription() );

   }
   public function testSetStaticDate()
   {

      $this->definitionStatic->toHoliday( 2016, [] );
      $this->definitionStatic->setStaticDate( 2, 5 );
      $this->assertSame( 2, $this->definitionStatic->getMonth() );
      $this->assertSame( 5, $this->definitionStatic->getDay() );

   }
   public function testSetBaseCallbackName()
   {

      $this->definitionDynamic->toHoliday( 2016, [] );
      $this->assertNull( $this->definitionDynamic->setBaseCallbackName()->getBaseCallbackName() );
      $this->assertSame( 'Abc', $this->definitionDynamic->setBaseCallbackName( 'Abc' )->getBaseCallbackName() );
      $this->assertNull( $this->definitionDynamic->setBaseCallbackName( '' )->getBaseCallbackName() );

   }
   public function testSetDynamicDateCallback()
   {

      $this->definitionDynamic->toHoliday( 2016, [] );
      $this->assertInstanceOf(
         IDynamicDateCallback::class,
         $this->definitionDynamic->setDynamicDateCallback( new MyDynamicDateCallbackCallback() )->getDynamicDateCallback()
      );
      $this->assertNull( $this->definitionDynamic->setDynamicDateCallback( null )->getDynamicDateCallback() );

   }
   public function testSetValidFromYear()
   {

      $this->assertSame( 1992, $this->definitionStatic->setValidFromYear( 1992 )->getValidFromYear() );
      $this->assertSame( null, $this->definitionStatic->setValidFromYear()->getValidFromYear() );

   }
   public function testSetValidToYear()
   {

      $this->definitionStatic->toHoliday( 2016, [] );
      $this->assertSame( 1993, $this->definitionStatic->setValidToYear( 1993 )->getValidToYear() );
      $this->assertSame( null, $this->definitionStatic->setValidToYear()->getValidToYear() );

   }
   public function testSetMoveConditions()
   {

      $this->definitionStatic->toHoliday( 2016, [] );
      $this->assertSame( [], $this->definitionStatic->setMoveConditions()->getMoveConditions() );

   }
   public function testClearMoveConditions()
   {

      $this->definitionStatic->toHoliday( 2016, [] );
      $this->assertSame( [], $this->definitionStatic->clearMoveConditions()->getMoveConditions() );

   }
   public function testAddMoveCondition()
   {

      $this->definitionStatic->toHoliday( 2016, [] );
      $this->assertSame( 3, \count( $this->definitionStatic->addMoveCondition( MoveCondition::OnMonday( 2 ) )->getMoveConditions() ) );

   }
   public function testAddMoveConditions()
   {

      $this->definitionStatic->toHoliday( 2016, [] );
      $this->assertSame( 3, \count( $this->definitionStatic->addMoveConditions( MoveCondition::OnMonday( 2 ) )->getMoveConditions() ) );

   }
   public function testSetMoveAllMatches()
   {

      $this->definitionDynamic->toHoliday( 2016, [] );
      $this->assertTrue( $this->definitionDynamic->setMoveAllMatches( true )->getMoveAllMatches() );
      $this->assertFalse( $this->definitionDynamic->setMoveAllMatches()->getMoveAllMatches() );

   }
   public function testSetValidationCallback()
   {

      $this->definitionDynamic->toHoliday( 2016, [] );
      $callback = function( \DateTime $date ) : bool
      {
         return $date > new DateTime( '2016-06-23 23:59:59' );
      };

      $this->assertSame( $callback, $this->definitionDynamic->setValidationCallback( $callback )->getValidationCallback() );

   }
   public function testSetValidRegions()
   {

      $this->definitionStatic->toHoliday( 2016, [] );
      $this->assertSame( [ -1 ], $this->definitionStatic->setValidRegions( [] )->getValidRegions() );
      $this->assertSame( [ -1 ], $this->definitionStatic->setValidRegions( [ -1, 2 ] )->getValidRegions() );

   }
   public function testAddValidRegion()
   {

      $this->definitionDynamic->toHoliday( 2016, [] );
      $this->assertSame( [ 29 ], $this->definitionDynamic->addValidRegion( 29 )->getValidRegions() );
      $this->assertSame( [ -1 ], $this->definitionDynamic->addValidRegion( -1 )->getValidRegions() );

   }
   public function testAddValidRegionsRange()
   {

      $this->definitionDynamic->toHoliday( 2016, [] );
      $this->assertSame( [ 2, 3, 4 ], $this->definitionDynamic->addValidRegionsRange( 2, 4 )->getValidRegions() );

   }
   public function testAddValidRegions()
   {

      $this->definitionDynamic->toHoliday( 2016, [] );
      $this->assertSame( [ 2, 4, 6 ], $this->definitionDynamic->addValidRegions( 2, 4, 6 )->getValidRegions() );

   }
   public function testAddValidRegionsArray()
   {

      $this->definitionDynamic->toHoliday( 2016, [] );
      $this->assertSame( [ 2, 4, 6 ], $this->definitionDynamic->addValidRegionsArray( [ 2, 4, 6 ] )->getValidRegions() );

   }
   public function testSetIsRestDay()
   {

      $this->assertSame( false, $this->definitionStatic->setIsRestDay( false )->getIsRestDay() );

   }

   public function testIsValidRegion()
   {

      $this->assertTrue( $this->definitionStatic->isValidRegion( 12 ) );
      $this->assertFalse( $this->definitionStatic->isValidRegion( 11 ) );
      $this->assertFalse( $this->definitionStatic->isValidRegion( 13 ) );
      $this->assertTrue( $this->definitionDynamic->isValidRegion( 12 ) );
      $this->assertTrue( $this->definitionDynamic->isValidRegion( 11 ) );
      $this->assertTrue( $this->definitionDynamic->isValidRegion( 13 ) );

   }
   public function testToHoliday()
   {

      $this->assertNull( $this->definitionStatic->toHoliday( 2015, [], [ 4, 12 ], 'de' ) );
      $this->assertNull( $this->definitionStatic->toHoliday( 2016, [], [ 9 ], 'de' ) );
      $this->assertInstanceOf( Holiday::class, $this->definitionStatic->toHoliday( 2016, [], [ 12 ], 'de' ) );
      $this->assertInstanceOf( Holiday::class, $this->definitionDynamic->toHoliday( 2016, [], [], 'de' ) );
      $this->assertNull( Definition::Create( 'abc' )->toHoliday( 2016, [], [ 9 ], 'de' ) );
      $this->definitionStatic->setValidFromYear( 2017 )->setValidToYear( 2009 );
      $this->assertNull( $this->definitionStatic->toHoliday( 2016, [], [], 'de' ) );
      $this->assertInstanceOf(  Holiday::class, $this->definitionStatic->toHoliday( 2018, [], [], 'de' ) );
      $this->assertInstanceOf(  Holiday::class, $this->definitionStatic->toHoliday( 2008, [], [], 'de' ) );
      $this->assertInstanceOf(  Holiday::class, $this->definitionStatic->toHoliday( 2008, [], [], 'de' ) );

   }

   public function testCreate()
   {

      $this->assertInstanceOf( Definition::class, Definition::Create( 'Foo' ) );

   }
   public function testCreateEasterDepending()
   {

      $globalCallbacks = [ 'easter_sunday' => new EasterDateCallback() ];
      $this->assertSame( '2018-04-16',
                         Definition::CreateEasterDepending( 'Bar', 15 )
                                   ->toHoliday( 2018, $globalCallbacks, [], 'de' )
                                   ->getDate()
                                   ->format( 'Y-m-d' ) );

   }
   public function testCreateNewYear()
   {

      $this->assertSame( '2018-01-01',
                         Definition::CreateNewYear( 'Neujahr' )
                                   ->toHoliday( 2018, [], [], 'de' )
                                   ->getDate()
                                   ->format( 'Y-m-d' ) );

   }

}
