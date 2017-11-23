<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 * @version        0.1.0alpha (AK47)
 */


use Niirrty\Holiday\Holiday;
use Niirrty\Holiday\HolidayCollection;
use Niirrty\Holiday\HolidayType;
use Niirrty\Holiday\HolidayName;


return HolidayCollection::Create( 'United Kingdom', 'en' )

   // <editor-fold desc="// Define the regions and sub regions, required to handle the different holidays…">
   ->setRegions(
      [
         'Alderney',         // 0
         'England',          // 1
         'Guernsey',         // 2
         'Isle of Man',      // 3
         'Jersey',           // 4
         'North Ireland',    // 5
         'Scotland',         // 6
         'Wales'             // 7
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

   // <editor-fold desc="// Holidays of month january…">
   ->addRange(

      // <editor-fold desc="// 01-01 New Year's Day">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay  ( 1, false ) // 01-01
         ->addNameTranslationsArray( [
            'de' => 'Neujahr',
            'fr' => 'Jour de l\'An',
            'it' => 'Capodanno',
            'es' => 'Año Nuevo',
            'pt' => 'Mãe de Deus',
            'cz' => 'Nový rok',
            'jp' => '元日'
         ] )
         ->addName( HolidayName::Create( 'en', 'New Year\'s Day' ) ),
      // </editor-fold>

      // <editor-fold desc="// 01-02 Move 01-01 (New Years's Day) holiday to next monday if it was on a sunday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay( 2, false ) // 01-02
         // is only valid if 01-01 was on a sunday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 1, 1 ); }, false )
         ->addNameTranslationsArray( [
            'de' => 'Verschobener Feiertag - Neujahr',
            'fr' => 'Vacances Motion - Jour de l\'An',
            'it' => 'Spostato vacanze - Capodanno',
            'es' => 'Movido vacaciones - Año Nuevo',
            'pt' => 'Feriado moveu - Mãe de Deus',
            'cz' => 'Přesunuta dovolená - Nový rok',
            'jp' => '振（り）替（え）休日 - 元日'
         ] )
         ->addName( HolidayName::Create( 'en', 'Moved holiday - New Year\'s Day' )->setRegions( [ 1, 7 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 01-03 Move 01-01 (New Years's Day) holiday to next monday if it was on a saturday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay( 3, false ) // 01-03
         // is only valid if 01-01 was on a sunday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_saturday( $year, 1, 1 ); }, false )
         ->addNameTranslationsArray( [
            'de' => 'Verschobener Feiertag - Neujahr',
            'fr' => 'Vacances Motion - Jour de l\'An',
            'it' => 'Spostato vacanze - Capodanno',
            'es' => 'Movido vacaciones - Año Nuevo',
            'pt' => 'Feriado moveu - Mãe de Deus',
            'cz' => 'Přesunuta dovolená - Nový rok',
            'jp' => '振（り）替（え）休日 - 元日'
         ] )
         ->addName( HolidayName::Create( 'en', 'Moved holiday - New Year\'s Day' )->setRegions( [ 1, 7 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 01-03 Move 01-01 (New Years's Day) holiday to next tuesday if it was on a sunday (Scotland only)">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay( 3, false ) // 01-03
         // is only valid if 01-01 was on a sunday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 1, 1 ); }, false )
         ->addNameTranslationsArray( [
            'de' => 'Verschobener Feiertag - Neujahr',
            'fr' => 'Vacances Motion - Jour de l\'An',
            'it' => 'Spostato vacanze - Capodanno',
            'es' => 'Movido vacaciones - Año Nuevo',
            'pt' => 'Feriado moveu - Mãe de Deus',
            'cz' => 'Přesunuta dovolená - Nový rok',
            'jp' => '振（り）替（え）休日 - 元日'
         ] )
         ->addName( HolidayName::Create( 'en', 'Moved holiday - New Year\'s Day' )->setRegions( [ 6 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 01-04 Move 01-01 (New Years's Day) holiday to next tuesday if it was on a saturday (Scotland only)">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay( 4, false ) // 01-04
         // is only valid if 01-01 was on a sunday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_saturday( $year, 1, 1 ); }, false )
         ->addNameTranslationsArray( [
            'de' => 'Verschobener Feiertag - Neujahr',
            'fr' => 'Vacances Motion - Jour de l\'An',
            'it' => 'Spostato vacanze - Capodanno',
            'es' => 'Movido vacaciones - Año Nuevo',
            'pt' => 'Feriado moveu - Mãe de Deus',
            'cz' => 'Přesunuta dovolená - Nový rok',
            'jp' => '振（り）替（え）休日 - 元日'
         ] )
         ->addName( HolidayName::Create( 'en', 'Moved holiday - New Year\'s Day' )->setRegions( [ 6 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 01-02 Scottish New Years's Day">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay( 2, false ) // 01-02
         ->addNameTranslationsArray( [
            'de' => 'Schottisches Neujahr',
            'fr' => 'Écossaise Nouvel an',
            'it' => 'Scottish nuovo anno',
            'es' => 'Scottish Año Nuevo',
            'pt' => 'Scottish Ano Novo',
            'cz' => 'Scottish Nový rok',
            'jp' => 'スコットランドの新年'
         ] )
         ->addName( HolidayName::Create( 'en', 'Scottish New Year\'s Day' )->setRegions( [ 6 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 01-03 Moved 01-02 (Scottish New Years's Day) holiday to next monday if it was on a sunday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay( 3, false ) // 01-03
         // is only valid if 01-02 was on a sunday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 1, 2 ); }, false )
         ->addNameTranslationsArray( [
            'de' => 'Verschobener Feiertag - Schottisches Neujahr',
            'fr' => 'Vacances Motion - Écossaise Nouvel an',
            'it' => 'Spostato vacanze - Scottish nuovo anno',
            'es' => 'Movido vacaciones - Scottish Año Nuevo',
            'pt' => 'Feriado moveu - Scottish Ano Novo',
            'cz' => 'Přesunuta dovolená - Scottish Nový rok',
            'jp' => '振（り）替（え）休日 - スコットランドの新年'
         ] )
         ->addName( HolidayName::Create( 'en', 'Moved holiday - Scottish New Year\'s Day' )->setRegions( [ 6 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 01-04 Moved 01-02 (Scottish New Years's Day) holiday to next monday if it was on a saturday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay( 4, false ) // 01-04
         // is only valid if 01-02 was on a saturday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_saturday( $year, 1, 2 ); }, false )
         ->addNameTranslationsArray( [
            'de' => 'Verschobener Feiertag - Schottisches Neujahr',
            'fr' => 'Vacances Motion - Écossaise Nouvel an',
            'it' => 'Spostato vacanze - Scottish nuovo anno',
            'es' => 'Movido vacaciones - Scottish Año Nuevo',
            'pt' => 'Feriado moveu - Scottish Ano Novo',
            'cz' => 'Přesunuta dovolená - Scottish Nový rok',
            'jp' => '振（り）替（え）休日 - スコットランドの新年'
         ] )
         ->addName( HolidayName::Create( 'en', 'Moved holiday - Scottish New Year\'s Day' )->setRegions( [ 6 ] ) )
      // </editor-fold>

   )
   // </editor-fold>

   // <editor-fold desc="// Holidays of month march…">
   ->addRange(

      // <editor-fold desc="// 03-17 : Saint Patrick's Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 3, false )->setDay( 17, false ) // 03-17
         ->addNameTranslationsArray( [
            'de' => 'St. Patrick\'s Day',
            'fr' => 'Le jour de la Saint-Patrick',
            'it' => 'Giorno di San Patrizio',
            'es' => 'Día de San Patricio',
            'pt' => 'Dia de São Patrick',
            'cz' => 'Den svatého Patrika',
            'jp' => '聖パトリックの日'
         ] )
         ->addName( HolidayName::Create( 'en', 'Saint Patrick\'s Day' )->setRegions( [ 5 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 03-18 Move 03-17 (Saint Patrick's Day) holiday to next monday if it was on a sunday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 3, false )->setDay( 18, false ) // 03-18
         // is only valid if 03-17 was on a sunday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 3, 17 ); }, false )
         ->addNameTranslationsArray( [
            'de' => 'Verschobener Feiertag - St. Patrick\'s Day',
            'fr' => 'Vacances Motion - Le jour de la Saint-Patrick',
            'it' => 'Spostato vacanze - Giorno di San Patrizio',
            'es' => 'Movido vacaciones - Día de San Patricio',
            'pt' => 'Feriado moveu - Dia de São Patrick',
            'cz' => 'Přesunuta dovolená - Den svatého Patrika',
            'jp' => '振（り）替（え）休日 - 聖パトリックの日'
         ] )
         ->addName( HolidayName::Create( 'en', 'Moved holiday - Saint Patrick\'s Day' )->setRegions( [ 5 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 03-19 Move 03-17 (Saint Patrick's Day) holiday to next monday if it was on a saturday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 3, false )->setDay( 19, false ) // 03-19
         // is only valid if 03-17 was on a sunday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_saturday( $year, 3, 17 ); }, false )
         ->addNameTranslationsArray( [
            'de' => 'Verschobener Feiertag - St. Patrick\'s Day',
            'fr' => 'Vacances Motion - Le jour de la Saint-Patrick',
            'it' => 'Spostato vacanze - Giorno di San Patrizio',
            'es' => 'Movido vacaciones - Día de San Patricio',
            'pt' => 'Feriado moveu - Dia de São Patrick',
            'cz' => 'Přesunuta dovolená - Den svatého Patrika',
            'jp' => '振（り）替（え）休日 - 聖パトリックの日'
         ] )
         ->addName( HolidayName::Create( 'en', 'Moved holiday - Saint Patrick\'s Day' )->setRegions( [ 5 ] ) )
      // </editor-fold>

   )
   // </editor-fold>

   // <editor-fold desc="// All easter depending holydays (march or april)…">
   ->addRange(

      // <editor-fold desc="// Good Friday (Easter sunday - 2 days)…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( -2, false )
         ->addNameTranslationsArray( [
            'de' => 'Karfreitag',
            'fr' => 'Vendredi Saint',
            'it' => 'Venerdì Santo',
            'es' => 'Viernes Santo',
            'pt' => 'Sexta-feira Santa',
            'cz' => 'Velký pátek',
            'jp' => '良い金曜日'
         ] )
         ->addName( HolidayName::Create( 'en', 'Good Friday' ) ),
      // </editor-fold>

      // <editor-fold desc="// Easter Monday (Easter sunday + 1 day)…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 1, false )
         ->addNameTranslationsArray( [
            'de' => 'Ostermontag',
            'fr' => 'Lundi de Pâques',
            'it' => 'Pasquetta',
            'es' => 'Lunes de Pascua',
            'pt' => 'Feira de Páscoa',
            'cz' => 'Velikonoční pondělí',
            'jp' => '復活の月曜日'
         ] )
         ->addName( HolidayName::Create( 'en', 'Easter Monday' ) )
      // </editor-fold>

   )
   // </editor-fold>

   // <editor-fold desc="// Holidays of month mai…">
   ->addRange(

      // <editor-fold desc="// Early May Bank Holiday - The 1st monday in mai">
      Holiday::Create( HolidayType::DYNAMIC )
         ->setDynamicCallback(
            function( $year )
            {
               return ( new DateTime() )->modify( 'first monday of mai ' . $year );
            }
         )
         ->addNameTranslations( 'jp', '月上旬バンクホリデー' )
         ->addName( HolidayName::Create( 'en', 'Early May Bank Holiday' ) ),
      // </editor-fold>

      // <editor-fold desc="// 05-09 : Liberation Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 5, false )
         ->setDay  ( 9, false )
         ->addNameTranslations(
            'de', 'Tag der Befreiung',
            'fr', 'Le jour de la libération',
            'it', 'Giorno della liberazione',
            'es', 'Día de la liberación',
            'pt', 'Dia da libertação',
            'cz', 'Den osvobození',
            'jp', '独立記念日'
         )
         ->addName( HolidayName::Create( 'en', 'Liberation Day' )->setRegions( [ 2, 4 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// Spring Bank Holiday - The last monday of mai">
      Holiday::Create( HolidayType::DYNAMIC )
         ->setDynamicCallback(
            function( $year )
            {
               return ( new DateTime() )->modify( 'last monday of mai ' . $year );
            }
         )
         ->addNameTranslations( 'jp', '春のバンクホリデー' )
         ->addName( HolidayName::Create( 'en', 'Spring Bank Holiday' ) )
      // </editor-fold>

   )
   // </editor-fold>

   // <editor-fold desc="// Holidays of month june and july…">
   ->addRange(

      // <editor-fold desc="Tourist Trophy Senior Race Day - 2nd friday of june">
      Holiday::Create( HolidayType::DYNAMIC )
         ->setDynamicCallback(
            function( $year )
            {
               return ( new DateTime() )->modify( 'second friday of june ' . $year );
            }
         )
         ->addNameTranslations( 'jp', 'ツーリスト・トロフィーシニアレースの日' )
         ->addName( HolidayName::Create( 'en', 'Tourist Trophy Senior Race Day' )->setRegions( [ 3 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 07-05 : Tynwald Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 7, false )->setDay( 5, false ) // 07-05
         ->addNameTranslations(
            'de', 'Tynwald Tag',
            'fr', 'Jour Tynwald',
            'it', 'Tynwald Giorno',
            'es', 'Día tynwald',
            'pt', 'Dia Tynwald',
            'cz', 'Tynwald den',
            'jp', 'ティンワルド日'
         )
         ->addName( HolidayName::Create( 'en', 'Tynwald Day' )->setRegions( [ 3 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 07-12 : Battle of the Boyne…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 7, false )->setDay( 12, false ) // 07-12
         ->addNameTranslations(
            'de', 'Schlacht am Boyne',
            'fr', 'Bataille de la Boyne',
            'it', 'Battaglia del Boyne',
            'es', 'Batalla del Boyne',
            'pt', 'Batalha de Boyne',
            'cz', 'Bitva u Boyne',
            'jp', 'ボインの戦い'
         )
         ->addName( HolidayName::Create( 'en', 'Battle of the Boyne' )->setRegions( [ 5 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 07-13 : Move 07-12 (Battle of the Boyne) holiday to next monday if it was on a sunday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 7, false )->setDay( 13, false ) // 07-13
         // is only valid if 07-12 was on a sunday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 7, 12 ); }, false )
         ->addNameTranslations(
            'de', 'Verschobener Feiertag - Schlacht am Boyne',
            'fr', 'Vacances Motion - Bataille de la Boyne',
            'it', 'Spostato vacanze - Battaglia del Boyne',
            'es', 'Movido vacaciones - Batalla del Boyne',
            'pt', 'Feriado moveu - Batalha de Boyne',
            'cz', 'Přesunuta dovolená - Bitva u Boyne',
            'jp', '振（り）替（え）休日 - ボインの戦い'
         )
         ->addName( HolidayName::Create( 'en', 'Moved holiday - Battle of the Boyne' )->setRegions( [ 5 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 07-14 : Move 07-12 (Battle of the Boyne) holiday to next monday if it was on a saturday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 7, false )->setDay( 14, false ) // 07-14
         // is only valid if 07-14 was on a saturday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_saturday( $year, 7, 12 ); }, false )
         ->addNameTranslations(
            'de', 'Verschobener Feiertag - Schlacht am Boyne',
            'fr', 'Vacances Motion - Bataille de la Boyne',
            'it', 'Spostato vacanze - Battaglia del Boyne',
            'es', 'Movido vacaciones - Batalla del Boyne',
            'pt', 'Feriado moveu - Batalha de Boyne',
            'cz', 'Přesunuta dovolená - Bitva u Boyne',
            'jp', '振（り）替（え）休日 - ボインの戦い'
         )
         ->addName( HolidayName::Create( 'en', 'Moved holiday - Battle of the Boyne' )->setRegions( [ 5 ] ) )
      // </editor-fold>

   )
   // </editor-fold>

   // <editor-fold desc="// Holidays of month august…">
   ->addRange(

      // <editor-fold desc="August Bank Holiday - 1st monday of august">
      Holiday::Create( HolidayType::DYNAMIC )
         ->setDynamicCallback(
            function( $year )
            {
               return ( new DateTime() )->modify( 'first monday of august ' . $year );
            }
         )
         ->addNameTranslations( 'jp', '8月バンクホリデー' )
         ->addName( HolidayName::Create( 'en', 'August Bank Holiday' )->setRegions( [ 6 ] ) ),
      // </editor-fold>

      // <editor-fold desc="August Bank Holiday - last monday of august">
      Holiday::Create( HolidayType::DYNAMIC )
         ->setDynamicCallback(
            function( $year )
            {
               return ( new DateTime() )->modify( 'last monday of august ' . $year );
            }
         )
         ->addNameTranslations( 'jp', '8月バンクホリデー' )
         ->addName( HolidayName::Create( 'en', 'August Bank Holiday' )->setRegions( [ 1, 7 ] ) )
      // </editor-fold>

   )
   // </editor-fold>

   // <editor-fold desc="// Holidays of month december…">
   ->addRange(

      // <editor-fold desc="// 12-15 : Homecoming Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )->setDay( 15, false ) // 12-15
         ->addNameTranslations(
            'de', 'Homecoming Day',
            'fr', 'Accueil à venir Jour',
            'it', 'Ritorno a casa Day',
            'es', 'Día de regreso a casa',
            'pt', 'Dia regresso a casa',
            'cz', 'Home přichází den',
            'jp', 'ホームカミングデー'
         )
         ->addName( HolidayName::Create( 'en', 'Homecoming Day' )->setRegions( [ 0 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-25 : Christmas Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )->setDay( 25, false )
         ->addNameTranslations(
            'de', '1. Weihnachtsfeiertag',
            'fr', 'Noël',
            'it', 'Natale',
            'es', 'Navidad',
            'pt', 'Natal do Senhor',
            'cz', '1. svátek vánoční',
            'jp', '1.クリスマス'
         )
         ->addName( HolidayName::Create( 'en', 'Christmas Day') ),
      // </editor-fold>

      // <editor-fold desc="// 12-26 : Boxing Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )->setDay( 26, false )
         ->addNameTranslations(
            'de', '2. Weihnachtstag',
            'fr', 'Lendemain de Noël',
            'it', 'Santo Stefano',
            'es', 'Sant Esteve',
            'pt', '2. Dia de Natal',
            'cz', '2. svátek vánoční',
            'jp', '2.クリスマスの日'
         )
         ->addNames( HolidayName::Create( 'en', 'Boxing Day' )  ),
      // </editor-fold>

      // <editor-fold desc="// 12-27 : Move 12-26 (Boxing Day) holiday to next monday if it was on a sunday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )->setDay( 27, false ) // 12-27
         // is only valid if 12-26 was on a sunday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 12, 26 ); }, false )
         ->addNameTranslations(
            'de', 'Verschobener Feiertag - 2. Weihnachtstag',
            'fr', 'Vacances Motion - Lendemain de Noël',
            'it', 'Spostato vacanze - Santo Stefano',
            'es', 'Movido vacaciones - Sant Esteve',
            'pt', 'Feriado moveu - 2. Dia de Natal',
            'cz', 'Přesunuta dovolená - 2. svátek vánoční',
            'jp', '振（り）替（え）休日 - 2.クリスマスの日'
         )
         ->addName( HolidayName::Create( 'en', 'Moved holiday - Boxing Dayy' ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-28 : Move 12-26 (Boxing Day) holiday to next monday if it was on a saturday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )->setDay( 28, false ) // 12-28
         // is only valid if 12-26 was on a saturday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_saturday( $year, 12, 26 ); }, false )
         ->addNameTranslations(
            'de', 'Verschobener Feiertag - 2. Weihnachtstag',
            'fr', 'Vacances Motion - Lendemain de Noël',
            'it', 'Spostato vacanze - Santo Stefano',
            'es', 'Movido vacaciones - Sant Esteve',
            'pt', 'Feriado moveu - 2. Dia de Natal',
            'cz', 'Přesunuta dovolená - 2. svátek vánoční',
            'jp', '振（り）替（え）休日 - 2.クリスマスの日'
         )
         ->addName( HolidayName::Create( 'en', 'Moved holiday - Boxing Day' ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-27 : Move 12-25 (Christmas Day) holiday to next tuesday if it was on a sunday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )->setDay( 27, false ) // 12-27
         // is only valid if 12-25 was on a sunday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 12, 25 ); }, false )
         ->addNameTranslations(
            'de', 'Verschobener Feiertag - 1. Weihnachtstag',
            'fr', 'Vacances Motion - Noël',
            'it', 'Spostato vacanze - Natale',
            'es', 'Movido vacaciones - Navidad',
            'pt', 'Feriado moveu - Natal do Senhor',
            'cz', 'Přesunuta dovolená - 1. svátek vánoční',
            'jp', '振（り）替（え）休日 - 1.クリスマス'
         )
         ->addName( HolidayName::Create( 'en', 'Moved holiday - Christmas Day' ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-28 : Move 12-25 (Christmas Day) holiday to next tuesday if it was on a saturday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )->setDay( 28, false ) // 12-28
         // is only valid if 12-25 was on a saturday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_saturday( $year, 12, 25 ); }, false )
         ->addNameTranslations(
            'de', 'Verschobener Feiertag - 1. Weihnachtstag',
            'fr', 'Vacances Motion - Noël',
            'it', 'Spostato vacanze - Natale',
            'es', 'Movido vacaciones - Navidad',
            'pt', 'Feriado moveu - Natal do Senhor',
            'cz', 'Přesunuta dovolená - 1. svátek vánoční',
            'jp', '振（り）替（え）休日 - 1.クリスマス'
         )
         ->addName( HolidayName::Create( 'en', 'Moved holiday - Christmas Day' ) )
      // </editor-fold>

   );
   // </editor-fold>

