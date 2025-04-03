<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Callbacks\AdventDateCallback;
use Niirrty\Holiday\Callbacks\NamedDateCallback;
use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;


return DefinitionCollection::Create( 'Österreich', 'at', 'de' )
    ->setRegions(
        [
            'Burgenland',                 // 0
            'Kärnten',                    // 1
            'Niederösterreich',           // 2
            'Oberösterreich',             // 3
            'Land Salzburg',              // 4
            'Steiermark',                 // 5
            'Tirol',                      // 6
            'Vorarlberg',                 // 7
            'Wien'                        // 8
        ]
    )
    ->addRange(

        #region // 01-01 Neujahr - New Year
        Definition::CreateNewYear(),
        #endregion

        #region // 01-06 Heilige drei Könige - Epiphany (Holy 3 kings)
        Definition::Create( 'Epiphany' )
            ->setStaticDate( 1, 6 ),
        #endregion

        #region // Carnival (Easter sunday - 47 days)
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::CreateEasterDepending( 'Carnival', -47 )
            ->setIsRestDay( false ),
        #endregion

        #region // 03-19 : Josef - Joseph of Nazareth
        Definition::Create( 'Joseph of Nazareth' )
            ->setStaticDate( 3, 19 )
            ->setDescription( 'Betrifft oft nur Schulen, Ämter und Behörden.' )
            ->setValidRegions( [ 1, 5, 6, 7 ] ),
        #endregion

        #region // Palmsonntag - Palm Sunday (Easter sunday - 7 days)
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::CreateEasterDepending( 'Palm Sunday', -7 )
            ->setIsRestDay( false ),
        #endregion

        #region // Gründonnerstag - Holy Thursday (Easter sunday - 3 days)
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::CreateEasterDepending( 'Maundy Thursday', -3 )
            ->setIsRestDay( false ),
        #endregion

        #region // Karfreitag - Good Friday (Easter sunday - 2 days)
        Definition::CreateEasterDepending( 'Good Friday', -2 )
            ->setDescription(
                'Feiertag nach Arbeitsruhegesetz nur für Angehörige der Evangelischen Kirche A.B., Evange' .
                'lischen Kirche H.B., der Altkatholischen Kirche und der Evangelisch-methodistischen Kirche.' ),
        #endregion

        #region // Ostersonntag - Easter Sunday…
        Definition::CreateEasterDepending( 'Easter Sunday', 0 )
            ->setValidRegions( [ 3, 6 ] ),
        #endregion

        #region // Ostermontag - Easter Monday (Easter sunday + 1 day)
        Definition::CreateEasterDepending( 'Easter Monday', 1 ),
        #endregion

        #region // 04-30: Walpurgisnacht - Walpurgis Night
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::Create( 'Walpurgis Night' )
            ->setStaticDate( 4, 30 )
            ->setIsRestDay( false ),
        #endregion

        #region // 05-01 : Staatsfeiertag - State day
        Definition::Create( 'National Holiday' )
            ->setStaticDate( 5, 1 ),
        #endregion

        #region // 05-04 : Florian - Saint Florian
        Definition::Create( 'Saint Florian' )
            ->setStaticDate( 5, 4 )
            ->setDescription(
                '(Florian von Lorch) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
            ->setValidRegions( [ 3 ] ),
        #endregion

        #region // Muttertag - Mother's Day
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::Create( 'Mother\'s Day' )
            ->setDynamicDateCallback( new NamedDateCallback( 'second sunday of may ' ) )
            ->setIsRestDay( false ),
        #endregion

        #region // Christi Himmelfahrt - Ascension of Christ (Easter sunday + 39 days)
        Definition::CreateEasterDepending( 'Ascension Day', 39 ),
        #endregion

        #region // Pfingstsonntag - Whit Sunday (Easter sunday + 49 days)
        Definition::CreateEasterDepending( 'Pentecost Sunday', 49 )
            ->setIsRestDay( false ),
        #endregion

        #region // Pfingstmontag - Whit Monday (Easter sunday + 50 days)
        Definition::CreateEasterDepending( 'Pentecost Monday', 50 ),
        #endregion

        #region // Fronleichnam - Corpus Christi (Easter sunday + 60 days)
        Definition::CreateEasterDepending( 'Corpus Christi', 60 ),
        #endregion

        #region // 06-01: Kindertag - Children's Day
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::Create( 'Children\'s Day' )
            ->setStaticDate( 6, 1 )
            ->setIsRestDay( false ),
        #endregion

        #region // 08-15: Mariä Himmelfahrt - Assumption Day
        Definition::Create( 'Assumption of Mary' )
            ->setStaticDate( 8, 15 ),
        #endregion

        #region // 09-24 : Rupert - Rupert of Salzburg
        Definition::Create( 'Rupert\'s Day' )
            ->setStaticDate( 9, 24 )
            ->setDescription(
                '(Rupert von Salzburg) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
            ->setValidRegions( [ 4 ] ),
        #endregion

        #region // Entedankfest - Thanksgiving
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::Create( 'Thanksgiving' )
            ->setDynamicDateCallback( new NamedDateCallback( 'first sunday of october ' ) )
            ->setIsRestDay( false ),
        #endregion

        #region // 10-10 : Tag der Volksabstimmung - Day of referendum
        Definition::Create( 'Referendum Day' )
            ->setStaticDate( 10, 10 ),
        #endregion

        #region // 10-26 : Nationalfeiertag - National Day
        Definition::Create( 'National Day' )
            ->setStaticDate( 10, 26 ),
        #endregion

        #region // 11-01 : Allerheiligen - All Saints' Day
        Definition::Create( 'All Saints\' Day' )
            ->setStaticDate( 11, 1 ),
        #endregion

        #region // 11-11 : Martin - Martin of Tours
        Definition::Create( 'St. Martin\'s Day' )
            ->setStaticDate( 11, 11 )
            ->setDescription(
                '(Martin von Tours) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
            ->setValidRegions( [ 0 ] ),
        #endregion

        #region // Volkstrauertag - Memorial Day (2 Sonntage vor dem ersten Adventssonntag)
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::Create( 'National Day of Mourning' )
            ->setDynamicDateCallback( new AdventDateCallback( 1, -14 ) )
            ->setIsRestDay( false ),
        #endregion

        #region // 11-15 : Leopold III.
        Definition::Create( 'Leopold III\'s Day' )
            ->setStaticDate( 11, 15 )
            ->setDescription(
                '(Leopold III.) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
            ->setValidRegions( [ 2, 8 ] ),
        #endregion

        #region // Totensonntag - Dead Sunday (1 Sonntag vor dem 1. Adventssonntag)
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::Create( 'Sunday of the Dead' )
            ->setDynamicDateCallback( new AdventDateCallback( 1, -7 ) )
            ->setIsRestDay( false ),
        #endregion

        #region // 1. Advent - 1th Advent
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::Create( 'First Advent' )
            ->setDynamicDateCallback( new AdventDateCallback( 1 ) )
            ->setIsRestDay( false ),
        #endregion

        #region // 12-08 : Mariä Empfängnis - Immaculate conception
        Definition::Create( 'Immaculate Conception' )
            ->setStaticDate( 12, 8 )
            ->setDescription(
                'Wenn der 8. Dezember auf einen Werktag fällt, dürfen Arbeitnehmer zu besonderen Bedingungen' .
                ' in Verkaufsstellen beschäftigt werden.' ),
        #endregion

        #region // 2. Advent - 2nd Advent
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::Create( 'Second Advent' )
            ->setDynamicDateCallback( new AdventDateCallback( 2 ) )
            ->setIsRestDay( false ),
        #endregion

        #region // 12-06: Nikolaus - Nicholas
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::Create( 'St. Nicholas Day' )
            ->setStaticDate( 12, 6 )
            ->setIsRestDay( false ),
        #endregion

        #region // 3. Advent - 3rd Advent
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::Create( 'Third Advent' )
            ->setDynamicDateCallback( new AdventDateCallback( 3 ) )
            ->setIsRestDay( false ),
        #endregion

        #region // 4. Advent - 4rd Advent
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::Create( '4rd Advent' )
            ->setDynamicDateCallback( new AdventDateCallback( 4 ) )
            ->setIsRestDay( false ),
        #endregion

        #region // 12-24 : Heilig Abend - Holy Evening
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::Create( 'Christmas Eve' )
            ->setStaticDate( 12, 24 )
            ->setIsRestDay( false ),
        #endregion

        #region // 12-25 : 1. Weihnachtsfeiertag - Christmas Day
        Definition::Create( 'Christmas Day' )
            ->setStaticDate( 12, 25 ),
        #endregion

        #region // 12-26 : 2. Weihnachtsfeiertag - Boxing Day
        Definition::Create( 'Boxing Day' )
            ->setStaticDate( 12, 26 ),
        #endregion

        #region // 12-31 : Silvester - New Year's Eve
        // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
        Definition::Create( 'New Year\'s Eve' )
            ->setStaticDate( 12, 31 )
            ->setIsRestDay( false )
        #endregion

    )
    ->addRangeFromArray(
        include __DIR__ . '/global-norestdays.php'
    );

