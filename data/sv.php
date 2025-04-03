<?php
/**
 * Includes now also none work free holidays
 *
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Callbacks\ModifyDateCallback;
use Niirrty\Holiday\Callbacks\NamedDateCallback;
use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;

return DefinitionCollection::Create( 'Sverige', 'sv', 'sv' )
    ->setRegions( [] )
    ->addRange(

        #region // 01-01 New Year
        Definition::CreateNewYear(),
        #endregion

        #region // 01-06 Epiphany (Holy 3 kings)
        Definition::Create( 'Epiphany' )
            ->setStaticDate( 1, 6 ),
        #endregion

        #region // Good Friday (Easter sunday - 2 days)
        Definition::CreateEasterDepending( 'Good Friday', -2 ),
        #endregion

        #region // Easter Monday (Easter sunday + 1 day)
        Definition::CreateEasterDepending( 'Easter Monday', 1 ),
        #endregion

        #region // 05-01 : Labor Day
        Definition::Create( 'Labor Day' )
            ->setStaticDate( 5, 1 ),
        #endregion

        #region // Christi Himmelfahrt - Ascension of Christ (Easter sunday + 39 days)
        Definition::CreateEasterDepending( 'Ascension Day', 39 ),
        #endregion

        #region // 06-06: National Holiday
        Definition::Create( 'National Holiday' )
            ->setStaticDate( 6, 6 ),
        #endregion

        #region // Midsommar / Summer solstice (saturday between june 20 and june 26)
        Definition::Create( 'Summer solstice' )
            ->setDynamicDateCallback( new ModifyDateCallback( 6, 19, 'next saturday' ) ),
        #endregion

        #region // Thanksgiving
        Definition::Create( 'Thanksgiving' )
            ->setDynamicDateCallback( new NamedDateCallback( 'first sunday of october ' ) )
            ->setIsRestDay( false ),
        #endregion

        #region // All Saints' Day (saturday between october 31 and november 06)
        Definition::Create( 'All Saints\' Day' )
            ->setDynamicDateCallback( new ModifyDateCallback( 10, 30, 'next saturday' ) ),
        #endregion

        #region // 12-24 : Holy Evening
        Definition::Create( 'Christmas Eve' )
            ->setStaticDate( 12, 24 )
            ->setIsRestDay( false ),
        #endregion

        #region // 12-25 : Christmas Day
        Definition::Create( 'Christmas Day' )
            ->setStaticDate( 12, 25 ),
        #endregion

        #region // 12-26 : Boxing Day
        Definition::Create( 'Boxing Day' )
            ->setStaticDate( 12, 26 ),
        #endregion

        #region // 12-31 : New Year's Eve
        Definition::Create( 'New Year\'s Eve' )
            ->setStaticDate( 12, 31 )
            ->setIsRestDay( false )
        #endregion

    )
    ->addRangeFromArray(
        include __DIR__ . '/global-norestdays.php'
    );

