<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;


return DefinitionCollection::Create( 'Schweiz', 'ch', 'de' )
    ->setRegions(
        [
            'Zürich',                  // 0
            'Bern',                    // 1
            'Luzern',                  // 2
            'Uri',                     // 3
            'Schwyz',                  // 4
            'Obwalden',                // 5
            'Nidwalden',               // 6
            'Glarus',                  // 7
            'Zug',                     // 8
            'Freiburg',                // 9
            'Solothurn',               // 10
            'Basel-Stadt',             // 11
            'Basel-Landschaft',        // 12
            'Schaffhausen',            // 13
            'Appenzell Ausserrhoden',  // 14
            'Appenzell Innerrhoden',   // 15
            'St. Gallen',              // 16
            'Graubünden',              // 17
            'Aargau',                  // 18
            'Thurgau',                 // 19
            'Tessin',                  // 20
            'Waadt',                   // 21
            'Wallis',                  // 22
            'Neuburg',                 // 23
            'Genf',                    // 24
            'Jura'                     // 25
        ]
    )
    ->addRange(

        #region // 01-01 Neujahr - New Year
        Definition::CreateNewYear(),
        #endregion

        #region // 01-02 Berchtoldstag - Berchtold
        Definition::Create( 'Berchtold\'s Day' )
            ->setStaticDate( 1, 2 )
            ->setValidRegions( [ 0, 1, 2, 5, 7, 8, 9, 10, 13, 17, 19, 21, 23, 24, 25 ] ),
        #endregion

        #region // 01-06 Heilige drei Könige - Epiphany (Holy 3 kings)
        Definition::Create( 'Epiphany' )
            ->setStaticDate( 1, 6 )
            ->setValidRegions( [ 3, 4, 17, 20 ] ),
        #endregion

        #region // 02-14 Valentinstag - Valentine's Day
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::Create( 'Valentine\'s Day' )
            ->setStaticDate( 2, 14 )
            ->setIsRestDay( false ),
        #endregion

        #region // 03-19 : Josef - Joseph of Nazareth
        Definition::Create( 'Joseph of Nazareth' )
            ->setStaticDate( 3, 19 )
            ->setValidRegions( [ 2, 3, 4, 6, 8, 17, 20, 22 ] ),
        #endregion

        #region // Karfreitag - Good Friday (Easter sunday - 2 days)
        Definition::CreateEasterDepending( 'Good Friday', -2 )
            ->setValidRegions( range( 0, 19 ) )
            ->addValidRegions( 21, 23, 24, 25 ),
        #endregion

        #region // Ostermontag - Easter Monday (Easter sunday + 1 day)
        Definition::CreateEasterDepending( 'Easter Monday', 1 )
            ->setValidRegions( range( 0, 21 ) )
            ->addValidRegions( 23, 24, 25 ),
        #endregion

        #region // 05-01 : Tag der Arbeit - Labor Day
        Definition::Create( 'Labor Day' )
            ->setStaticDate( 5, 1 )
            ->setValidRegions( [ 0, 9, 10, 11, 12, 13, 18, 19, 20, 23, 25 ] ),
        #endregion

        #region // Christi Himmelfahrt - Ascension of Christ (Easter sunday + 39 days)
        Definition::CreateEasterDepending( 'Ascension Day', 39 ),
        #endregion

        #region // Pfingstmontag - Whit Monday (Easter sunday + 50 days)
        Definition::CreateEasterDepending( 'Pentecost Monday', 50 )
            ->setValidRegions( range( 0, 21 ) )
            ->addValidRegions( 23, 24, 25 ),
        #endregion

        #region // Fronleichnam - Corpus Christi (Easter sunday + 60 days)
        Definition::CreateEasterDepending( 'Corpus Christi', 60 )
            ->setValidRegions( [ 2, 3, 4, 5, 6, 8, 9, 10, 12, 15, 17, 18, 20, 22, 23, 25 ] ),
        #endregion

        #region // 08-01 Bundesfeier - Swiss National Day
        Definition::Create( 'Swiss National Day' )
            ->setStaticDate( 8, 1 ),
        #endregion

        #region // 08-15: Mariä Himmelfahrt - Assumption Day
        Definition::Create( 'Assumption of Mary' )
            ->setStaticDate( 8, 15 )
            ->setValidRegions( [ 2, 3, 4, 5, 6, 8, 9, 10, 12, 15, 17, 18, 20, 22, 25 ] ),
        #endregion

        #region // 11-01 : Allerheiligen - All Saints' Day
        Definition::Create( 'All Saints\' Day' )
            ->setStaticDate( 11, 1 )
            ->setValidRegions( [ 2, 3, 4, 5, 6, 7, 8, 9, 10, 15, 16, 17, 18, 20, 22, 25 ] ),
        #endregion

        #region // 12-08 : Mariä Empfängnis - Immaculate conception
        Definition::Create( 'Immaculate Conception' )
            ->setStaticDate( 12, 8 )
            ->setValidRegions( [ 2, 3, 4, 5, 6, 8, 9, 10, 15, 17, 18, 20, 22 ] )
            ->setDescription(
                'Wenn der 8. Dezember auf einen Werktag fällt, dürfen Arbeitnehmer zu besonderen Bedingungen' .
                ' in Verkaufsstellen beschäftigt werden.' ),
        #endregion

        #region // 12-25 : 1. Weihnachtsfeiertag - Christmas Day
        Definition::Create( 'Christmas Day' )
            ->setStaticDate( 12, 25 ),
        #endregion

        #region // 12-26 : 2. Weihnachtsfeiertag - Boxing Day
        Definition::Create( 'Boxing Day' )
            ->setStaticDate( 12, 26 )
            ->setValidRegions( range( 0, 20 ) ),
        #endregion

    )
    ->addRangeFromArray(
        include __DIR__ . '/global-norestdays.php'
    );

