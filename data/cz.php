<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;


return DefinitionCollection::Create( 'Czechia', 'cz', 'cz' )
    ->setRegions( [] )
    ->addRange(

        #region // 01-01 New Year
        Definition::CreateNewYear(),
        #endregion

        #region // Good Friday (Easter sunday - 2 days)
        Definition::CreateEasterDepending( 'Good Friday', -2 )
            ->setValidFromYear( 2016 ),
        #endregion

        #region // Easter Monday (Easter sunday + 1 day)
        Definition::CreateEasterDepending( 'Easter Monday', 1 ),
        #endregion

        #region // 05-01 : Tag der Arbeit - Labor Day
        Definition::Create( 'Labor Day' )
            ->setStaticDate( 5, 1 ),
        #endregion

        #region // 05-08 : Den osvobození - Liberation Day : …-2003
        Definition::Create( 'Liberation Day' )
            ->setStaticDate( 5, 8 )
            ->setValidToYear( 2003 ),
        #endregion

        #region // 05-08 : Den vítězství - Day of the victory : 2004-…
        Definition::Create( 'Day of victory 1945' )
            ->setStaticDate( 5, 8 )
            ->setValidFromYear( 2004 ),
        #endregion

        #region // 07-05 : Den slovanských věrozvěstů Cyrila a Metoděje - Day of Slavic Intelligence by Cyril and Methodius
        Definition::Create( 'Day of Slavic Intelligence by Cyril and Methodius' )
            ->setStaticDate( 7, 5 ),
        #endregion

        #region // 07-06 : Den upálení mistra Jana Husa - Day of the burning of Jan Hus
        Definition::Create( 'Day of the burning of Jan Hus' )
            ->setStaticDate( 7, 6 ),
        #endregion

        #region // 09-28 : Den české státnosti - Day of the Czech statehood
        Definition::Create( 'Day of the Czech statehood' )
            ->setStaticDate( 9, 28 ),
        #endregion

        #region // 10-28 : Den vzniku samostatného československého státu - Day of the emergence of an independent Czechoslovak state
        Definition::Create( 'Day of the emergence of an independent Czechoslovak state' )
            ->setStaticDate( 10, 28 ),
        #endregion

        #region // 11-17 : Den boje za svobodu a demokracii - Day of struggle for freedom and democracy
        Definition::Create( 'Day of struggle for freedom and democracy' )
            ->setStaticDate( 11, 17 ),
        #endregion

        #region // 12-24 : Holy Evening
        Definition::Create( 'Christmas Eve' )
            ->setStaticDate( 12, 24 ),
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

