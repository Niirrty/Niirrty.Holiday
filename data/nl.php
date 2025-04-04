<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Callbacks\NamedDateCallback;
use Niirrty\Holiday\Callbacks\SeasonDateCallback;
use Niirrty\Holiday\DateMove\MoveCondition;
use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;


return DefinitionCollection::Create( 'Nederland', 'nl', 'nl' )
    ->setRegions( [] )
    ->addRange(

        #region // 01-01 Neujahr - New Year
        Definition::CreateNewYear(),
        #endregion

        #region // Good Friday (Easter sunday - 2 days)
        Definition::CreateEasterDepending( 'Good Friday', -2 ),
        #endregion

        #region // Easter Sunday
        Definition::CreateEasterDepending( 'Easter Sunday', 0 ),
        #endregion

        #region // Easter Monday (Easter sunday + 1 day)
        Definition::CreateEasterDepending( 'Easter Monday', 1 ),
        #endregion

        #region // 04-26 : Kings Day
        Definition::Create( 'Kings Day -2013' )
            ->setStaticDate( 4, 26 )
            ->setValidToYear( 2013 ),
        #endregion

        #region // 04-27 : Koningsdag - Kings Day
        Definition::Create( 'Kings Day' )
            ->setStaticDate( 4, 27 )
            ->setValidFromYear( 2014 )
            ->addMoveCondition( MoveCondition::OnSunday( -1 ) ),
        #endregion

        #region // 05-04 : Nationale Dodenherdenking - Commemoration
        Definition::Create( 'Commemoration' )
            ->setStaticDate( 5, 4 ),
        #endregion

        #region // 05-05 : Bevrijdingsdag - Liberation Day
        Definition::Create( 'Liberation Day' )
            ->setStaticDate( 5, 5 ),
        #endregion

        #region // Ascension of Christ (Easter sunday + 39 days)
        Definition::CreateEasterDepending( 'Ascension Day', 39 ),
        #endregion

        #region // Whit Sunday (Easter sunday + 49 days)
        Definition::CreateEasterDepending( 'Pentecost Sunday', 49 ),
        #endregion

        #region // Whit Monday (Easter sunday + 50 days)
        Definition::CreateEasterDepending( 'Pentecost Monday', 50 ),
        #endregion

        #region // Thanksgiving
        Definition::Create( 'Thanksgiving' )
            ->setDynamicDateCallback( new NamedDateCallback( 'first sunday of october ' ) )
            ->setIsRestDay( false ),
        #endregion

        #region // 12-25 : Christmas Day
        Definition::Create( 'Christmas Day' )
            ->setStaticDate( 12, 25 ),
        #endregion

        #region // 12-26 : Boxing Day
        Definition::Create( 'Boxing Day' )
            ->setStaticDate( 12, 26 )
        #endregion

    )
    ->addRangeFromArray(
        include __DIR__ . '/global-norestdays.php'
    );

