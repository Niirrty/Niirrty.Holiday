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


return HolidayCollection::Create( 'Schweiz', 'de' )

   // <editor-fold desc="// Define the regions, required to handle the different holidays…">
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

      // <editor-fold desc="// 01-01 Neujahrstag - New Year">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay  ( 1, false ) // 01-01
         ->addName( HolidayName::Create( 'de', 'Neujahrstag' ) )
         ->addNameTranslationsArray( [
            'en' => 'New Year',
            'fr' => 'Jour de l\'An',
            'it' => 'Capodanno',
            'es' => 'Año Nuevo',
            'pt' => 'Mãe de Deus',
            'cz' => 'Nový rok',
            'jp' => '元日'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 01-02 Berchtoldstag - Berchtold">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay( 2, false ) // 01-02
         ->addName(
            HolidayName::Create( 'de', 'Berchtoldstag' )
                       ->addRegions( 0, 1, 2, 5, 7, 8, 9, 10, 13, 17, 19, 21, 23, 24, 25 ) )
         ->addNameTranslationsArray( [
            'en' => 'Berchtold',
            'fr' => 'Berchtold',
            'it' => 'Berchtold',
            'es' => 'Berchtold',
            'pt' => 'Berchtold',
            'cz' => 'Berchtold',
            'jp' => 'ベルヒトルト'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 01-06 Heilige drei Könige - Epiphany (Holy 3 kings)">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay( 6, false ) // 01-06
         ->addName(
            HolidayName::Create( 'de', 'Heilige drei Könige' )
                       ->addRegions( 3, 4, 17, 20 ) )
         ->addNameTranslationsArray( [
            'en' => 'Epiphany',
            'fr' => 'Épiphanie',
            'it' => 'Epifania',
            'es' => 'Epifanía',
            'pt' => 'Epifania',
            'cz' => 'Epiphany',
            'jp' => 'エピファニー'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 03-19 Josefstag - St. Joseph's">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 3, false )->setDay( 19, false ) // 03-19
         ->addName(
            HolidayName::Create( 'de', 'Josefstag' )
                       ->addRegions( 2, 3, 4, 6, 8, 17, 20, 22 ) )
         ->addNameTranslationsArray( [
            'en' => 'St. Joseph\'s',
            'fr' => 'Saint-Joseph',
            'it' => 'San Giuseppe',
            'es' => 'San José',
            'pt' => 'São José',
            'cz' => 'St. Joseph je',
            'jp' => 'セントジョセフ'
         ] ),
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
         ->addName( HolidayName::Create( 'de', 'Karfreitag' )
                               ->addRegionsArray( range( 0, 19 ) )
                               ->addRegions( 21, 23, 24, 25 ) ),
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
         ->addName( HolidayName::Create( 'de', 'Ostermontag' )
                               ->addRegionsArray( range( 0, 21 ) )
                               ->addRegions( 23, 24, 25 ) ),
   // </editor-fold>

      // <editor-fold desc="// 05-01 : Tag der Arbeit - Day of work…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 5, false )->setDay( 1, false )
         ->addNameTranslationsArray( [
            'en' => 'Labor Day',
            'fr' => 'Fête du travail',
            'it' => 'Festa dei lavoratori',
            'es' => 'Día laboral',
            'pt' => 'Dia de trabalho',
            'cz' => 'Svátek práce',
            'jp' => '労働者の日'
         ] )
         ->addName(
            HolidayName::Create( 'de', 'Tag der Arbeit' )->setRegions( [ 0, 9, 10, 11, 12, 13, 18, 19, 20, 23, 25 ] )
         ),
      // </editor-fold>

      // <editor-fold desc="// Auffahrt - Ascension of Christ (Easter sunday + 39 days)">
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
         ->addName( HolidayName::Create( 'de', 'Auffahrt' ) ),
      // </editor-fold>

      // <editor-fold desc="// Pfingstmontag - Whit Monday (Easter sunday + 50 days)">
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
         ->addName( HolidayName::Create( 'de', 'Pfingstmontag' )
                               ->setRegions( \range( 0, 21 ) )
                               ->addRegions( 23, 24, 25 ) ),
      // </editor-fold>

      // <editor-fold desc="// Fronleichnam - Corpus Christi (Easter sunday + 60 days)">
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
         ->addName( HolidayName::Create( 'de', 'Fronleichnam' )
                               ->setRegions( [ 2, 3, 4, 5, 6, 8, 9, 10, 12, 15, 17, 18, 20, 22, 23, 25 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 08-01 Bundesfeier - National Day celebration">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 8, false )->setDay  ( 1, false ) // 08-01
             ->addName( HolidayName::Create( 'de', 'Bundesfeier' ) )
             ->addNameTranslationsArray( [
                'en' => 'National Day celebration',
                'fr' => 'Fête nationale',
                'it' => 'Giornata nazionale celebrazione',
                'es' => 'Celebración del Día nacional',
                'pt' => 'Celebração do Dia nacional',
                'cz' => 'Národní den oslavy',
                'jp' => 'ナショナルデーのお祝い'
             ] ),
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
         ->addNames( HolidayName::Create( 'de', 'Mariä Himmelfahrt' )
                                ->setRegions( [ 2, 3, 4, 5, 6, 8, 9, 10, 12, 15, 17, 18, 20, 22, 25 ] ) ),
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
         ->addName( HolidayName::Create( 'de', 'Allerheiligen' )
                               ->setRegions( [ 2, 3, 4, 5, 6, 7, 8, 9, 10, 15, 16, 17, 18, 20, 22, 25 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-08: Mariä Empfängnis - Immaculate conception">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )->setDay  ( 8, false ) // 12-08
         ->addNameTranslationsArray( [
            'en' => 'Immaculate conception',
            'fr' => 'La conception de Marie',
            'it' => 'Il concetto di Maria',
            'es' => 'La concepción de María',
            'pt' => 'Conceito de Maria',
            'cz' => 'Mary pojetí',
            'jp' => 'メアリーの概念'
         ] )
         ->addNames( HolidayName::Create( 'de', 'Mariä Empfängnis' )
                                ->setRegions( [ 2, 3, 4, 5, 6, 8, 9, 10, 15, 17, 18, 20, 22 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-25 : Weihnachtstag - 1st Christmas Holiday…">
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
             ->addName( HolidayName::Create( 'de', 'Weihnachtstag') ),
      // </editor-fold>

      // <editor-fold desc="// 12-26 : Stephanstag - Boxing Day…">
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
             ->addName( HolidayName::Create( 'de', 'Stephanstag' )
                                   ->setRegions( \range( 0, 20 ) ) )
      // </editor-fold>

   );

