<?php
/**
 * Includes now also none work free holidays
 *
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Callbacks\AdventDateCallback;
use Niirrty\Holiday\Callbacks\ModifyDateCallback;
use Niirrty\Holiday\Callbacks\NamedDateCallback;
use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;

return DefinitionCollection::Create( 'Deutschland', 'de', 'de' )
    ->setRegions(
        [
            'Baden-Württemberg',                      // 0
            'Bayern',                                 // 1
            'Berlin',                                 // 2
            'Brandenburg',                            // 3
            'Bremen',                                 // 4
            'Hamburg',                                // 5
            'Hessen',                                 // 6
            'Mecklenburg-Vorpommern',                 // 7
            'Niedersachsen',                          // 8
            'Nordrhein-Westfalen',                    // 9
            'Rheinland-Pfalz',                        // 10
            'Saarland',                               // 11
            'Sachsen',                                // 12
            'Sachsen-Anhalt',                         // 13
            'Schleswig-Holstein',                     // 14
            'Thüringen',                              // 15
            'Sachsen, Bautzen OT Bolbritz',           // 16 <A3>
            'Sachsen, Bautzen OT Salzenforst',        // 17
            'Sachsen, Crostwitz',                     // 18
            'Sachsen, Göda OT Prischwitz',            // 19
            'Sachsen, Großdubrau OT Sdier',           // 20
            'Sachsen, Hoyerswerda OT Dörgenhausen',   // 21
            'Sachsen, Königswartha',                  // 22
            'Sachsen, Nebelschütz',                   // 23
            'Sachsen, Neschwitz OT Neschwitz',        // 24
            'Sachsen, Neschwitz OT Saritsch',         // 25
            'Sachsen, Panschwitz-Kuckau',             // 26
            'Sachsen, Puschwitz',                     // 27
            'Sachsen, Räckelwitz',                    // 28
            'Sachsen, Radibor',                       // 29
            'Sachsen, Ralbitz-Rosenthal',             // 30
            'Sachsen, Wittichenau',                   // 31
            'Landkreis Eichsfeld',                    // 32 <A4>
            'Anrode OT Bickenriede',                  // 33
            'Anrode OT Zella',                        // 34
            'Brunnhartshausen OT Föhlritz',           // 35
            'Brunnhartshausen OT Steinberg',          // 36
            'Buttlar',                                // 37
            'Dünwald OT Beberstedt',                  // 38
            'Dünwald OT Hüpstedt',                    // 39
            'Geisa',                                  // 40
            'Rodeberg OT Struth',                     // 41
            'Schleid',                                // 42
            'Südeichsfeld',                           // 43
            'Zella/Rhön',                             // 44
            'Stadtgebiet Augsburg',                   // 45 <A5>
            'Bayern, Katholische Gemeinden'           // 46 <A6>
        ]
    )
    ->addRange(

        #region // * 01-01 New Year
        Definition::CreateNewYear(),
        #endregion

        #region // * 01-06 Heilige drei Könige - Epiphany (Holy 3 kings)
        Definition::Create( 'Epiphany' )
            ->setStaticDate( 1, 6 )
            ->setValidRegions( [ 0, 1, 46 ] ),
        #endregion

        #region // Weiberfastnacht (Easter sunday - 52 days)
        Definition::CreateEasterDepending( 'Women\'s Carnival Day', -52 )
            ->setIsRestDay( false ),
        #endregion

        #region // Carnival Saturday (Easter sunday - 50 days)
        Definition::CreateEasterDepending( 'Carnival Saturday', -50 )
            ->setIsRestDay( false ),
        #endregion

        #region // Carnival Sunday (Easter sunday - 49 days)
        Definition::CreateEasterDepending( 'Carnival Sunday', -49 )
            ->setIsRestDay( false ),
        #endregion

        #region // Rose-Monday (Easter sunday - 48 days)
        Definition::CreateEasterDepending( 'Rose-Monday', -48 )
            ->setIsRestDay( false ),
        #endregion

        #region // Carnival (Easter sunday - 47 days)
        Definition::CreateEasterDepending( 'Carnival', -47 )
            ->setIsRestDay( false ),
        #endregion

        #region // Aschermittwoch (Easter sunday - 46 days)
        Definition::CreateEasterDepending( 'Ash Wednesday', -46 )
            ->setIsRestDay( false ),
        #endregion

        #region // * 03-08 Internationaler Frauentag - International Womans day
        Definition::Create( 'International Women\'s Day' )
            ->setStaticDate( 3, 8 )
            ->setValidFromYear( 2023 )
            ->setValidRegions( [ 2, 7 ] )
            ->setExtension(
                Definition::Create( 'International Women\'s Day' )
                    ->setStaticDate( 3, 8 )
                    ->setValidFromYear( 2019 )
                    ->setValidRegions( [ 2 ] )
            ),
        #endregion

        #region // Palmsonntag - Palm Sunday (Easter sunday - 7 days)
        Definition::CreateEasterDepending( 'Palm Sunday', -7 )
            ->setIsRestDay( false ),
        #endregion

        #region // Gründonnerstag - Holy Thursday (Easter sunday - 3 days)
        Definition::CreateEasterDepending( 'Maundy Thursday', -3 )
            ->setIsRestDay( false ),
        #endregion

        #region // * Karfreitag - Good Friday (Easter sunday - 2 days)
        Definition::CreateEasterDepending( 'Good Friday', -2 ),
        #endregion

        #region // * Ostersonntag - Easter Sunday…
        Definition::CreateEasterDepending( 'Easter Sunday', 0 )
            ->setValidRegions( [ 3, 6 ] ),
        #endregion

        #region // * Ostermontag - Easter Monday (Easter sunday + 1 day)
        Definition::CreateEasterDepending( 'Easter Monday', 1 ),
        #endregion

        #region // 04-30: Walpurgisnacht - Walpurgis Night
        Definition::Create( 'Walpurgis Night' )
            ->setStaticDate( 4, 30 )
            ->setIsRestDay( false ),
        #endregion

        #region // * 05-01 : Tag der Arbeit - Labor Day
        Definition::Create( 'Labor Day' )
            ->setStaticDate( 5, 1 ),
        #endregion

        #region // Muttertag - Mother's Day
        Definition::Create( 'Mother\'s Day' )
            ->setDynamicDateCallback( new NamedDateCallback( 'second sunday of may ' ) )
            ->setIsRestDay( false ),
        #endregion

        #region // * Christi Himmelfahrt - Ascension of Christ (Easter sunday + 39 days)
        Definition::CreateEasterDepending( 'Ascension Day', 39 ),
        #endregion

        #region // * Pfingstsonntag - Whit Sunday (Easter sunday + 49 days)
        Definition::CreateEasterDepending( 'Pentecost Sunday', 49 )
            ->setValidRegions( [ 3, 6 ] ),
        #endregion

        #region // * Pfingstmontag - Whit Monday (Easter sunday + 50 days)
        Definition::CreateEasterDepending( 'Pentecost Monday', 50 ),
        #endregion

        #region // * Fronleichnam - Corpus Christi (Easter sunday + 60 days)
        Definition::CreateEasterDepending( 'Corpus Christi', 60 )
            ->setValidRegions( [ 6, 9, 10, 11 ] )
            ->addValidRegionsRange( 16, 46 ),
        #endregion

        #region // 06-01: Kindertag - Children's Day
        Definition::Create( 'Children\'s Day' )
            ->setStaticDate( 6, 1 )
            ->setIsRestDay( false ),
        #endregion

        #region // * 06-17: 17. Juni 1953 - June 17. 1953 …-1989
        Definition::Create( 'June 17. 1953' )
            ->setStaticDate( 6, 17 )
            ->setValidFromYear( 1954 )
            ->setValidToYear( 1989 ),
        #endregion

        #region // * 08-08: Augsburger Hohes Friedensfest - Augsburg High Peace Festival
        Definition::Create( 'Augsburg High Peace Festival' )
            ->setStaticDate( 8, 8 )
            ->setValidRegions( [ 45 ] ),
        #endregion

        #region // * 08-15: Mariä Himmelfahrt - Assumption Day
        Definition::Create( 'Assumption of Mary' )
            ->setStaticDate( 8, 15 )
            ->setValidRegions( [ 46, 11 ] ),
        #endregion

        #region // Entedankfest - Thanksgiving
        Definition::Create( 'Thanksgiving' )
            ->setDynamicDateCallback( new NamedDateCallback( 'first sunday of october ' ) )
            ->setIsRestDay( false ),
        #endregion

        #region // * 10-03: Tag der Deutschen Einheit - Day of German unity  1991-…
        Definition::Create( 'German Unity Day' )
            ->setStaticDate( 10, 3 )
            ->setValidFromYear( 1990 ),
        #endregion

        #region // * 10-31: Reformationstag - Reformation Day
        Definition::Create( 'Reformation Day' )
            ->setStaticDate( 10, 31 )
            ->setValidRegions( [ 0, 3, 6, 7, 9, 11, 12, 13 ] )
            ->addValidRegionsRange( 15, 44 ),
        #endregion

        #region // * 11-01 : Allerheiligen - All Saints' Day
        Definition::Create( 'All Saints\' Day' )
            ->setStaticDate( 11, 1 )
            ->setValidRegions( [ 0, 1, 9, 10, 11, 45, 46 ] ),
        #endregion

        #region // 11-02 :  Allerseelen - All Souls Day
        Definition::Create( 'All Souls\' Day' )
            ->setStaticDate( 11, 2 )
            ->setIsRestDay( false ),
        #endregion

        #region // 11-11 :  Martinstag - Martinmas
        Definition::Create( 'St. Martin\'s Day' )
            ->setStaticDate( 11, 11 )
            ->setIsRestDay( false ),
        #endregion

        #region // Volkstrauertag - Memorial Day (2 Sonntage vor dem ersten Adventssonntag)
        Definition::Create( 'National Day of Mourning' )
            ->setDynamicDateCallback( new AdventDateCallback( 1, -14 ) )
            ->setIsRestDay( false ),
        #endregion

        #region // * Buß- und Bettag - Repentance Day - The wednesday before 11-23 (min: 11-16, max: 11-22)
        Definition::Create( 'Day of Repentance and Prayer' )
            ->setDynamicDateCallback( new ModifyDateCallback( 11, 23, 'last wednesday' ) )
            ->setValidRegions( [ 12 ] )
            ->addValidRegionsRange( 16, 31 ),
        #endregion

        #region // Totensonntag - Dead Sunday (1 Sonntag vor dem 1. Adventssonntag)
        Definition::Create( 'Sunday of the Dead' )
            ->setDynamicDateCallback( new AdventDateCallback( 1, -7 ) )
            ->setIsRestDay( false ),
        #endregion

        #region // 1. Advent - 1th Advent
        Definition::Create( 'First Advent' )
            ->setDynamicDateCallback( new AdventDateCallback( 1 ) )
            ->setIsRestDay( false ),
        #endregion

        #region // 2. Advent - 2nd Advent
        Definition::Create( 'Second Advent' )
            ->setDynamicDateCallback( new AdventDateCallback( 2 ) )
            ->setIsRestDay( false ),
        #endregion

        #region // 12-06: Nikolaus - Nicholas
        Definition::Create( 'St. Nicholas Day' )
            ->setStaticDate( 12, 6 )
            ->setIsRestDay( false ),
        #endregion

        #region // 3. Advent - 3rd Advent
        Definition::Create( 'Third Advent' )
            ->setDynamicDateCallback( new AdventDateCallback( 3 ) )
            ->setIsRestDay( false ),
        #endregion

        #region // 4. Advent
        Definition::Create( 'Fourth Advent' )
            ->setDynamicDateCallback( new AdventDateCallback( 4 ) )
            ->setIsRestDay( false ),
        #endregion

        #region // 12-24 : Heilig Abend - Holy Evening
        Definition::Create( 'Christmas Eve' )
            ->setStaticDate( 12, 24 )
            ->setIsRestDay( false ),
        #endregion

        #region // * 12-25 : 1. Weihnachtsfeiertag - Christmas Day
        Definition::Create( 'Christmas Day' )
            ->setStaticDate( 12, 25 ),
        #endregion

        #region // * 12-26 : 2. Weihnachtsfeiertag - Boxing Day
        Definition::Create( 'Boxing Day' )
            ->setStaticDate( 12, 26 ),
        #endregion

        #region // 12-31 : Silvester - New Year's Eve
        Definition::Create( 'New Year\'s Eve' )
            ->setStaticDate( 12, 31 )
            ->setIsRestDay( false )
        #endregion

    )
    ->addRangeFromArray(
        include __DIR__ . '/global-norestdays.php'
    );

