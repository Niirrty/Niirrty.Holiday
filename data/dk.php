<?php
/**
 * Includes now also none work free holidays
 *
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2025-03-11
 */


use Niirrty\Holiday\Callbacks\NamedDateCallback;
use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;


return DefinitionCollection::Create( 'Danmark', 'dk', 'dk' )
    ->setRegions( [] )
    ->addRange(

        #region // 01-01 New Year
        Definition::CreateNewYear(),
        #endregion

        #region // Rose-Monday (Easter sunday - 48 days)
        Definition::CreateEasterDepending( 'Carnival', -48 )
            ->setIsRestDay( false ),
        #endregion

        #region // Holy Thursday (Easter sunday - 3 days)
        Definition::CreateEasterDepending( 'Maundy Thursday', -3 ),
        #endregion

        #region // Good Friday (Easter sunday - 2 days)
        Definition::CreateEasterDepending( 'Good Friday', -2 ),
        #endregion

        #region // Easter Sunday…
        Definition::CreateEasterDepending( 'Easter Sunday', 0 ),
        #endregion

        #region // Easter Monday (Easter sunday + 1 day)
        Definition::CreateEasterDepending( 'Easter Monday', 1 ),
        #endregion

        #region // 05-01 : Labor Day
        Definition::Create( 'Labor Day' )
            ->setStaticDate( 5, 1 ),
        #endregion

        #region // Day of Repentance and Prayer (Easter sunday + 26 days)
        Definition::CreateEasterDepending( 'Day of Repentance and Prayer', 26 ),
        #endregion

        #region // Ascension of Christ (Easter sunday + 39 days)
        Definition::CreateEasterDepending( 'Ascension Day', 39 ),
        #endregion

        #region // Pentecost Sunday (Easter sunday + 49 days)
        Definition::CreateEasterDepending( 'Pentecost Sunday', 49 ),
        #endregion

        #region // Pentecost Monday (Easter sunday + 50 days)
        Definition::CreateEasterDepending( 'Pentecost Monday', 50 ),
        #endregion

        #region // Entedankfest - Thanksgiving
        Definition::Create( 'Thanksgiving' )
            ->setDynamicDateCallback( new NamedDateCallback( 'first sunday of october ' ) )
            ->setIsRestDay( false ),
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

