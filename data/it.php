<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;


return DefinitionCollection::Create( 'Italia', 'it', 'it' )
    ->setRegions( [
        'Lombardia',             // 0
        'Campania',              // 1
        'Lazio',                 // 2
        'Sicilia',               // 3
        'Veneto',                // 4
        'Piemonte',              // 5
        'Emilia-Romagna',        // 6
        'Puglia',                // 7
        'Toscana',               // 8
        'Calabria',              // 9
        'Sardegna',              // 10
        'Liguria',               // 11
        'Marche',                // 12
        'Abruzzo',               // 13
        'Friuli-Venezia Giulia', // 14
        'Trentino-Alto Adige',   // 15
        'Umbria',                // 16
        'Potenza',               // 17
        'Molise',                // 18
        'Aosta'                  // 19
    ] )
    ->addRange(

        #region // 01-01 New Year
        Definition::CreateNewYear(),
        #endregion

        #region // 01-06 Epiphany (Holy 3 kings)
        Definition::Create( 'Epiphany' )
            ->setStaticDate( 1, 6 )
            ->setValidToYear( 1977 )
            ->setValidFromYear( 1985 ),
        #endregion

        #region // Ostermontag - Easter Monday (Easter sunday + 1 day)
        Definition::CreateEasterDepending( 'Easter Monday', 1 ),
        #endregion

        #region // 04-24 : Anniversario della Liberazione - 'Day of the liberation of Italy'
        Definition::Create( 'Day of the liberation of Italy' )
            ->setStaticDate( 4, 24 ),
        #endregion

        #region // 05-01 : Labor Day
        Definition::Create( 'Labor Day' )
            ->setStaticDate( 5, 1 ),
        #endregion

        #region // Ascension of Christ (Easter sunday + 39 days)
        Definition::CreateEasterDepending( 'Ascension Day', 39 )
            ->setValidToYear( 1977 ),
        #endregion

        #region // Pentecost Monday (Easter sunday + 50 days)
        Definition::CreateEasterDepending( 'Pentecost Monday', 50 )
            ->setValidRegions( [ 15 ] ),
        #endregion

        #region // 06-02 National Day
        Definition::Create( 'National Holiday' )
            ->setStaticDate( 6, 2 ),
        #endregion

        #region // 08-15: Assumption Day
        Definition::Create( 'Assumption of Mary' )
            ->setStaticDate( 8, 15 ),
        #endregion

        #region // 11-01 : Allerheiligen - All Saints' Day
        Definition::Create( 'All Saints\' Day' )
            ->setStaticDate( 11, 1 ),
        #endregion

        #region // 12-08: Il concetto di Maria - Immaculate conception
        Definition::Create( 'Immaculate Conception' )
            ->setStaticDate( 12, 8 ),
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

