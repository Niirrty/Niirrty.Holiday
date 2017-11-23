<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Holiday;
use Niirrty\Holiday\HolidayCollection;
use Niirrty\Holiday\HolidayType;
use Niirrty\Holiday\HolidayName;


return HolidayCollection::Create( 'Deutschland', 'de' )

   // <editor-fold desc="// Define the regions and sub regions, required to handle the different holidays…">
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
   // </editor-fold>

   // <editor-fold desc="// Register the callback function that calculate the easter date of a year…">
   ->registerGlobalCallback(
      'easter_sunday',
      function( $year )
      {
         return ( new \DateTime() )->setTimestamp( \easter_date( $year ) );
      }
   )
   // </editor-fold>

   ->addRange(

      // <editor-fold desc="// 01-01 Neujahr - New Year">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay  ( 1, false ) // 01-01
         ->addNameTranslationsArray( [
            'en' => 'New Year',
            'fr' => 'Jour de l\'An',
            'it' => 'Capodanno',
            'es' => 'Año Nuevo',
            'pt' => 'Mãe de Deus',
            'cz' => 'Nový rok',
            'jp' => '元日'
         ] )
         ->addNames(
            HolidayName::Create( 'de', 'Neujahr' )->addRegions( 0, 1 ),
            HolidayName::Create( 'de', 'Neujahrstag' )->setRegions( \range( 2, 46 ) )
         ),
      // </editor-fold>

      // <editor-fold desc="// 01-06 Heilige drei Könige - Epiphany (Holy 3 kings)">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay( 6, false ) // 01-06
         ->addNameTranslationsArray( [
            'en' => 'Epiphany',
            'fr' => 'Épiphanie',
            'it' => 'Epifania',
            'es' => 'Epifanía',
            'pt' => 'Epifania',
            'cz' => 'Epiphany',
            'jp' => 'エピファニー'
         ] )
         ->addNames(
            HolidayName::Create( 'de', 'Heilige drei Könige' ) ->addRegions( 1, 46 ),
            HolidayName::Create( 'de', 'Erscheinungsfest' ) ->addRegions( 0 )
         ),
      // </editor-fold>

      // <editor-fold desc="// Karfreitag - Good Friday (Easter sunday - 2 days)…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( -2, false )
         ->addNameTranslations( [
            'en' => 'Good Friday',
            'fr' => 'Vendredi Saint',
            'it' => 'Venerdì Santo',
            'es' => 'Viernes Santo',
            'pt' => 'Sexta-feira Santa',
            'cz' => 'Velký pátek',
            'jp' => '良い金曜日'
         ] )
         ->addName( HolidayName::Create( 'de', 'Karfreitag' ) ),
      // </editor-fold>

      // <editor-fold desc="// Ostersonntag - Easter Sunday…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 0, false )
         ->addNameTranslationsArray( [
            'en' => 'Easter Sunday',
            'fr' => 'Dimanche de Pâques',
            'it' => 'Domenica di Pasqua',
            'es' => 'Domingo de Pascua',
            'pt' => 'Domingo de Páscoa',
            'cz' => 'Boží hod velikonoční',
            'jp' => '復活の主日'
         ] )
         ->addName( HolidayName::Create( 'de', 'Ostersonntag' ) ->addRegions( 3, 6 ) ),
      // </editor-fold>

      // <editor-fold desc="// Ostermontag - Easter Monday (Easter sunday + 1 day)…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 1, false )
         ->addNameTranslationsArray( [
            'en' => 'Easter Monday',
            'fr' => 'Lundi de Pâques',
            'it' => 'Pasquetta',
            'es' => 'Lunes de Pascua',
            'pt' => 'Feira de Páscoa',
            'cz' => 'Velikonoční pondělí',
            'jp' => '復活の月曜日'
         ] )
         ->addName( HolidayName::Create( 'de', 'Ostermontag' ) ),
      // </editor-fold>

      // <editor-fold desc="// 05-01 : Tag der Arbeit - Day of work…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 5, false )
         ->setDay  ( 1, false )
         ->addNameTranslationsArray( [
            'en' => 'Labor Day',
            'fr' => 'Fête du travail',
            'it' => 'Festa dei lavoratori',
            'es' => 'Día laboral',
            'pt' => 'Dia de trabalho',
            'cz' => 'Svátek práce',
            'jp' => '労働者の日'
         ] )
         ->addNames(
            HolidayName::Create( 'de', 'Erster Mai' )
               ->setRegions( [ 0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 13, 14, 15 ] )
               ->addRegionsArray( \range( 32, 44 ) ),
            HolidayName::Create( 'de', 'Tag der Arbeit' )
               ->setRegions( [ 1, 12, 35, 36 ] )
               ->addRegionsArray( \range( 16, 31 ) ) ),
      // </editor-fold>

      // <editor-fold desc="// Christi Himmelfahrt - Ascension of Christ (Easter sunday + 39 days)">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 39, false )
         ->addNameTranslationsArray( [
            'en' => 'Ascension of Christ',
            'fr' => 'Ascension du Christ',
            'it' => 'Ascensione di Cristo',
            'es' => 'Ascensión de Cristo',
            'pt' => 'Ascensão de Cristo',
            'cz' => 'Ascension of Christ',
            'jp' => 'キリストの昇天'
         ] )
         ->addNames(
            HolidayName::Create( 'de', 'Christi Himmelfahrt' )
               ->setRegions( [ 0, 1, 10, 11, 12, 13 ] )->addRegionsArray( \range( 15, 46 ) ),
            HolidayName::Create( 'de', 'Christi Himmelfahrtstag' )->addRegion( 3 ),
            HolidayName::Create( 'de', 'Christi-Himmelfahrtstag' )->addRegion( 7 ),
            HolidayName::Create( 'de', 'Christi-Himmelfahrts-Tag' )->addRegion( 9 ),
            HolidayName::Create( 'de', 'Himmelfahrtstag' )->setRegions( [ 2, 4, 5, 6, 8, 14 ] )
         ),
      // </editor-fold>

      // <editor-fold desc="Pfingstsonntag - Whit Sunday (Easter sunday + 49 days)">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 49, false )
         ->addNameTranslationsArray( [
            'en' => 'Whit Sunday',
            'fr' => 'Whitsunday',
            'it' => 'Pentecoste',
            'es' => 'Domingo de Pentecostés',
            'pt' => 'Domingo de Pentecostes',
            'cz' => 'Whitsunday',
            'jp' => 'ウィットサンデー'
         ] )
         ->addName( HolidayName::Create( 'de', 'Pfingstsonntag' )->setRegions( [ 3, 6 ] ) ),
      // </editor-fold>

      // <editor-fold desc="Pfingstmontag - Whit Monday (Easter sunday + 50 days)">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 50, false )
         ->addNameTranslationsArray( [
            'en' => 'Whit Monday',
            'fr' => 'lundi de Pentecôte',
            'it' => 'Lunedi di Pentecoste',
            'es' => 'Lunes de Pentecostés',
            'pt' => 'Whit segunda-feira',
            'cz' => 'Svatodušní pondělí',
            'jp' => '聖霊降臨祭の月曜日'
         ] )
         ->addName( HolidayName::Create( 'de', 'Pfingstmontag' ) ),
      // </editor-fold>

      // <editor-fold desc="Fronleichnam - Corpus Christi (Easter sunday + 60 days)">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 60, false )
         ->addNameTranslationsArray( [
            'en' => 'Corpus Christi',
            'fr' => 'Fête-Dieu',
            'it' => 'Corpus Domini',
            'es' => 'Corpus Cristi',
            'pt' => 'corpo de Deus',
            'cz' => 'Corpus Christi',
            'jp' => 'コーパスクリスティ'
         ] )
         ->addNames(
            HolidayName::Create( 'de', 'Fronleichnam' )->setRegions( [ 0, 1 ] )->addRegionsArray( range( 16, 46 ) ),
            HolidayName::Create( 'de', 'Fronleichnamstag' )->setRegions( [ 6, 9, 10, 11 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 08-08: Augsburger Hohes Friedensfest - Augsburg High Peace Festival">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 8, false )->setDay  ( 8, false ) // 08-08
         ->addNameTranslationsArray( [
            'en' => 'Augsburg High Peace Festival',
            'fr' => 'Augsburg Festival de Haute Paix',
            'it' => 'Festival High Peace Augsburg',
            'es' => 'Festival Superior de la Paz de Augsburgo',
            'pt' => 'Festival alta Paz Augsburg',
            'cz' => 'Augsburg Festival High Peace',
            'jp' => 'アウクスブルクハイ平和フェスティバル'
         ] )
         ->addName( HolidayName::Create( 'de', 'Augsburger Hohes Friedensfest' )->setRegions( [ 45 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 08-15: Mariä Himmelfahrt - Assumption Day">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 8, false )->setDay  ( 15, false ) // 08-15
         ->addNameTranslationsArray( [
            'en' => 'Assumption Day',
            'fr' => 'fête de l\'Assomption',
            'it' => 'Giorno dell\'assunzione',
            'es' => 'Día de la Asunción',
            'pt' => 'Dia da Assunção',
            'cz' => 'Nanebevzetí Panny Marie',
            'jp' => '昇天の日'
         ] )
         ->addNames(
            HolidayName::Create( 'de', 'Mariä Himmelfahrt' )->setRegions( [ 46 ] ),
            HolidayName::Create( 'de', 'Maria Himmelfahrtstag' )->setRegions( [ 11 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 10-03: Tag der Deutschen Einheit - Day of German unity…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 10, false )->setDay( 3, false ) // 10-03
         ->addNameTranslationsArray( [
            'en' => 'Day of German unity',
            'fr' => 'Journée de l\'unité allemande',
            'it' => 'Giorno dell\'Unità tedesca',
            'es' => 'Día de la Unidad Alemana',
            'pt' => 'Dia da Unidade Alemã',
            'cz' => 'Den německé jednoty',
            'jp' => 'ドイツ統一の日'
         ] )
         ->addName( HolidayName::Create( 'de', 'Tag der Deutschen Einheit' ) ),
      // </editor-fold>

      // <editor-fold desc="// 10-31: Reformationstag - Reformation Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 10, false )->setDay( 31, false ) // 10-31
         ->addNameTranslationsArray( [
            'en' => 'Reformation Day',
            'fr' => 'Fête de la Réformation',
            'it' => 'Festa della Riforma',
            'es' => 'Dia da Reforma',
            'pt' => 'Día de la Reforma',
            'cz' => 'Den reformace',
            'jp' => '宗教改革記念日'
         ] )
         ->addNames(
            HolidayName::Create( 'de', 'Reformationstag' )
               ->setRegions( [ 6, 7, 9, 11, 13, 15 ] )->addRegionsArray( \range( 32, 44 ) ),
            HolidayName::Create( 'de', 'Reformationsfest' )
               ->setRegions( [ 0, 3, 12 ] )->addRegionsArray( \range( 16, 31 ) ) ),
      // </editor-fold>

      // <editor-fold desc="// 11-01 : Allerheiligen - All Saints' Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 11, false )->setDay  ( 1, false ) // 11-01
         ->addNameTranslationsArray( [
            'en' => 'All Saints\' Day',
            'fr', 'Fête de la Toussaint',
            'it', 'Ognissanti',
            'es', 'Día de todos los Santos',
            'pt', 'Dia de Todos os Santos',
            'cz', 'Svátek Všech svatých',
            'jp', '諸聖人の祝日'
         ] )
         ->addNames(
            HolidayName::Create( 'de', 'Allerheiligen' )->setRegions( [ 0, 1, 45, 46 ] ),
            HolidayName::Create( 'de', 'Allerheiligentag' )->setRegions( [ 9, 10, 11 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// Buß- und Bettag - Repentance Day - The wednesday before 11-23 (min: 11-16, max: 11-22)">
      Holiday::Create( HolidayType::DYNAMIC )
         ->setDynamicCallback(
            function( $year )
            {
               return ( new DateTime( $year . '-11-23' ) )->modify( 'last wednesday' );
            },
            false
         )
         ->addNameTranslationsArray( [
            'en' => 'Repentance Day',
            'fr' => 'jour repentance',
            'it' => 'pentimento Giorno',
            'es' => 'Día arrepentimiento',
            'pt' => 'Dia arrependimento',
            'cz' => 'Den pokání',
            'jp' => '悔い改めの日'
         ] )
         ->addName( HolidayName::Create( 'de', 'Buß- und Bettag' )
                               ->setRegions( [ 12 ] )
                               ->addRegionsArray( \range( 16, 31 ) ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-25 : 1. Weihnachtsfeiertag - 1st Christmas Holiday…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )
         ->setDay  ( 25, false )
         ->addNameTranslationsArray( [
            'en' => 'Christmas Day',
            'fr' => 'Noël',
            'it' => 'Natale',
            'es' => 'Navidad',
            'pt' => 'Natal do Senhor',
            'cz' => '1. svátek vánoční',
            'jp' => '1.クリスマス'
         ] )
         ->addNames(
            HolidayName::Create( 'de', '1. Weihnachtstag'          )
                       ->setRegions( [ 4, 5, 6, 7, 8, 9, 10, 11, 12, 14 ] )
                       ->addRegionsArray( \range( 16, 31 ) ),
            HolidayName::Create( 'de', 'Erster Weihnachtstag'      )->setRegions( [ 0, 1, 2, 45, 46 ] ),
            HolidayName::Create( 'de', '1. Weihnachtsfeiertag'     )->setRegions( [ 3, 13 ] ),
            HolidayName::Create( 'de', 'Erster Weihnachtsfeiertag' )
                       ->setRegions( [ 15 ] )
                       ->addRegionsArray( \range( 32, 44 ) ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-26 : 2. Weihnachtsfeiertag - Boxing Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )
         ->setDay  ( 26, false )
         ->addNameTranslationsArray( [
            'en' => 'Boxing Day',
            'fr' => 'Lendemain de Noël',
            'it' => 'Santo Stefano',
            'es' => 'Sant Esteve',
            'pt' => '2. Dia de Natal',
            'cz' => '2. svátek vánoční',
            'jp' => '2.クリスマスの日'
         ] )
         ->addNames(
            HolidayName::Create( 'de', '2. Weihnachtstag'          )
                       ->setRegions( [ 4, 5, 6, 7, 8, 9, 10, 11, 12, 14 ] )
                       ->addRegionsArray( \range( 16, 31 ) ),
            HolidayName::Create( 'de', 'Zweiter Weihnachtstag'     )->setRegions( [ 0, 1, 2, 45, 46 ] ),
            HolidayName::Create( 'de', '2. Weihnachtsfeiertag'     )->setRegions( [ 3, 13 ] ),
            HolidayName::Create( 'de', 'Zweiter Weihnachtsfeiertag')
                       ->setRegions( [ 15 ] )
                       ->addRegionsArray( \range( 32, 44 ) ) )
      // </editor-fold>

   );
   // </editor-fold>

