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


return HolidayCollection::Create( 'Österreich', 'de' )

   // <editor-fold desc="// Define the regions, required to handle the different holidays…">
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

      // <editor-fold desc="// 01-01 Neujahr - New Year">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay  ( 1, false ) // 01-01
         ->addNameTranslations(
            'en', 'New Year',             'fr', 'Jour de l\'An',           'it', 'Capodanno',
            'es', 'Año Nuevo',            'pt', 'Mãe de Deus',             'cz', 'Nový rok',
            'jp', '元日' )
         ->addName( HolidayName::Create( 'de', 'Neujahr' ) ),
      // </editor-fold>

      // <editor-fold desc="// 01-06 Heilige Drei Könige - Epiphany (Holy 3 kings)">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay  ( 6, false ) // 01-06
         ->addNameTranslations(
            'en', 'Epiphany',             'fr', 'Épiphanie',               'it', 'Epifania',
            'es', 'Epifanía',             'pt', 'Epifania',                'cz', 'Epiphany',
            'jp', 'エピファニー' )
         ->addName( HolidayName::Create( 'de', 'Heilige Drei Könige' ) )
      // </editor-fold>

   )
   // </editor-fold>

   // <editor-fold desc="// Holidays of month march or april…">
   ->addRange(

      // <editor-fold desc="// 03-19 : Josef - Joseph of Nazareth…">
      Holiday::Create( HolidayType::STATIC )
         ->setDescription(
            '(Josef von Nazaret) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
         ->setMonth( 3, false )->setDay  ( 19, false ) // 03-19
         ->addNameTranslations(
            'en', 'Joseph of Nazareth',   'fr', 'Joseph de Nazareth',      'it', 'Giuseppe di Nazaret',
            'es', 'José de Nazaret',      'pt', 'José de Nazaré',          'cz', 'Joseph z Nazaretu',
            'jp', 'ナザレのヨセフ' )
         ->addName( HolidayName::Create( 'de', 'Josef' )->setRegions( [ 1, 5, 6, 7 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// Karfreitag - Good Friday (Easter sunday - 2 days)…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setDescription(
            'Feiertag nach Arbeitsruhegesetz nur für Angehörige der Evangelischen Kirche A.B., Evangelischen Kirche'
            .' H.B., der Altkatholischen Kirche und der Evangelisch-methodistischen Kirche.' )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( -2, false )
         ->addNameTranslations(
            'en', 'Good Friday',          'fr', 'Vendredi Saint',          'it', 'Venerdì Santo',
            'es', 'Viernes Santo',        'pt', 'Sexta-feira Santa',       'cz', 'Velký pátek',
            'jp', '良い金曜日' )
         ->addName( HolidayName::Create( 'de', 'Karfreitag Drei Könige' ) ),
      // </editor-fold>

      // <editor-fold desc="// Ostermontag - Easter Monday (Easter sunday + 1 day)…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 1, false )
         ->addNameTranslations(
            'en', 'Easter Monday',        'fr', 'Lundi de Pâques',         'it', 'Pasquetta',
            'es', 'Lunes de Pascua',      'pt', 'Feira de Páscoa',         'cz', 'Velikonoční pondělí',
            'jp', '復活の月曜日' )
         ->addName( HolidayName::Create( 'de', 'Ostermontag' ) )
      // </editor-fold>

   )
   // </editor-fold>

   // <editor-fold desc="// Holidays of month mai…">
   ->addRange(

      // <editor-fold desc="// 05-01 : Staatsfeiertag - National holiday…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 5, false )->setDay  ( 1, false ) // 05-01
         ->addNameTranslations(
            'en', 'National holiday',     'fr', 'Fête nationale',          'it', 'Festa nazionale',
            'es', 'Fiesta nacional',      'pt', 'Feriado nacional',        'cz', 'Státní svátek',
            'jp', '祭日' )
         ->addName( HolidayName::Create( 'de', 'Staatsfeiertag' ) ),
      // </editor-fold>

      // <editor-fold desc="// 05-04 : Florian - Saint Florian…">
      Holiday::Create( HolidayType::STATIC )
         ->setDescription( '(Florian von Lorch) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
         ->setMonth( 5, false )
         ->setDay  ( 4, false )
         ->addNameTranslations(
            'en', 'Saint Florian',        'fr', 'Saint Florian',           'it', 'San Floriano',
            'es', 'San Florián',          'pt', 'São Floriano',            'cz', 'Saint Florian',
            'jp', '聖フロリアン' )
         ->addName( HolidayName::Create( 'de', 'Florian' )->addRegion( 3 ) )
      // </editor-fold>

   )
   // </editor-fold>

   // <editor-fold desc="// Holidays of month mai or june…">
   ->addRange(

      // <editor-fold desc="// Christi Himmelfahrt - Ascension of Christ (Easter sunday + 39 days)…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 39, false )
         ->addNameTranslations(
            'en', 'Ascension of Christ',  'fr', 'Ascension du Christ',     'it', 'Ascensione di Cristo',
            'es', 'Ascensión de Cristo',  'pt', 'Ascensão de Cristo',      'cz', 'Ascension of Christ',
            'jp', 'キリストの昇天' )
         ->addName( HolidayName::Create( 'de', 'Christi Himmelfahrt' ) ),
      // </editor-fold>

      // <editor-fold desc="// Pfingstmontag - Whit Monday (Easter sunday + 50 days)…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 50, false )
         ->addNameTranslations(
            'en', 'Whit Monday',          'fr', 'lundi de Pentecôte',      'it', 'Lunedi di Pentecoste',
            'es', 'Lunes de Pentecostés', 'pt', 'Whit segunda-feira',      'cz', 'Svatodušní pondělí',
            'jp', '聖霊降臨祭の月曜日' )
         ->addName( HolidayName::Create( 'de', 'Pfingstmontag' ) ),
      // </editor-fold>

      // <editor-fold desc="// Fronleichnam - Corpus Christi (Easter sunday + 60 days)…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 60, false )
         ->addNameTranslations(
            'en', 'Corpus Christi',       'fr', 'Fête-Dieu',               'it', 'Corpus Domini',
            'es', 'Corpus Cristi',        'pt', 'corpo de Deus',           'cz', 'Corpus Christi',
            'jp', 'コーパスクリスティ' )
         ->addName( HolidayName::Create( 'de', 'Fronleichnam' ) )
      // </editor-fold>

   )
   // </editor-fold>

   // <editor-fold desc="// Holidays of month august and september…">
   ->addRange(

      // <editor-fold desc="// 08-15 : Mariä Himmelfahrt - Assumption Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 8, false )->setDay  ( 15, false )
         ->addNameTranslations(
            'en', 'Assumption Day',       'fr', 'fête de l\'Assomption',   'it', 'Giorno dell\'assunzione',
            'es', 'Día de la Asunción',   'pt', 'Dia da Assunção',         'cz', 'Nanebevzetí Panny Marie',
            'jp', '昇天の日' )
         ->addName( HolidayName::Create( 'de', 'Mariä Himmelfahrt' ) ),
      // </editor-fold>

      // <editor-fold desc="// 09-24 : Rupert - Rupert of Salzburg…">
      Holiday::Create( HolidayType::STATIC )
         ->setDescription( '(Rupert von Salzburg) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
         ->setMonth( 9, false )
         ->setDay  ( 24, false )
         ->addNameTranslations(
            'en', 'Rupert of Salzburg',   'fr', 'Rupert de Salzbourg',     'it', 'Rupert di Salisburgo',
            'es', 'Ruperto de Salzburgo', 'pt', 'Rupert de Salzburg',      'cz', 'Rupert Salcburku',
            'jp', 'ザルツブルクのルパート' )
         ->addName( HolidayName::Create( 'de', 'Rupert' )->addRegion( 4 ) )
      // </editor-fold>

   )
   // </editor-fold>

   // <editor-fold desc="// Holidays of month october…">
   ->addRange(

      // <editor-fold desc="// 10-10 : Tag der Volksabstimmung - Day of referendum…">
      Holiday::Create( HolidayType::STATIC )
         ->setDescription( 'Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
         ->setMonth( 10, false )->setDay  ( 10, false ) // 10-10
         ->addNameTranslations(
            'en', 'Day of referendum',    'fr', 'Jour de référendum',      'it', 'Giorno del referendum',
            'es', 'Día del referéndum',   'pt', 'Dia de referendo',        'cz', 'Den referenda',
            'jp', '国民投票の日' )
         ->addName( HolidayName::Create( 'de', 'Tag der Volksabstimmung' ) ),
      // </editor-fold>

      // <editor-fold desc="// 10-26 : Nationalfeiertag - National holiday…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 10, false )->setDay  ( 26, false ) // 10-26
         ->addNameTranslations(
            'en', 'National holiday',     'fr', 'Fête nationale',          'it', 'Festa nazionale',
            'es', 'Feriado nacional',     'pt', 'Dia de referendo',        'cz', 'Státní svátek',
            'jp', '祭日' )
         ->addName( HolidayName::Create( 'de', 'Nationalfeiertag' ) )
      // </editor-fold>

   )
   // </editor-fold>

   // <editor-fold desc="// Holidays of month november…">
   ->addRange(

      // <editor-fold desc="// 11-01 : Allerheiligen -All Saints' Day …">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 11, false )->setDay  ( 1, false ) // 11-01
         ->addNameTranslations(
            'en', 'All Saints\' Day',        'fr', 'Fête de la Toussaint',    'it', 'Ognissanti',
            'es', 'Día de todos los Santos', 'pt', 'Dia de Todos os Santos',  'cz', 'Svátek Všech svatých',
            'jp', '諸聖人の祝日' )
         ->addName( HolidayName::Create( 'de', 'Allerheiligen' ) ),
      // </editor-fold>

      // <editor-fold desc="// 11-11 : Martin - Martin of Tours…">
      Holiday::Create( HolidayType::STATIC )
         ->setDescription( '(Martin von Tours) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
         ->setMonth( 11, false )->setDay  ( 11, false ) // 11-11
         ->addNameTranslations(
            'en', 'Martin of Tours',      'fr', 'Martin de Tours',         'it', 'Martino di Tours',
            'es', 'Martín de Tours',      'pt', 'Martin de Tours',         'cz', 'Martin z Tours',
            'jp', 'トゥールのマルティヌス' )
         ->addName( HolidayName::Create( 'de', 'Martin' )->addRegion( 0 ) ),
      // </editor-fold>

      // <editor-fold desc="// 11-15 : Leopold III.…">
      Holiday::Create( HolidayType::STATIC )
         ->setDescription( '(Leopold III.) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
         ->setMonth( 11, false )->setDay  ( 15, false ) // 11-15
         ->addNameTranslations(
            'en', 'Leopold III.',         'fr', 'Leopold III.',            'it', 'Leopold III.',
            'es', 'Leopold III.',         'pt', 'Leopold III.',            'cz', 'Leopold III.',
            'jp', 'レオポルドIII。' )
         ->addName( HolidayName::Create( 'de', 'Leopold' )->addRegions( 2, 8 ) )
      // </editor-fold>

   )
   // </editor-fold>

   // <editor-fold desc="// Holidays of month december…">
   ->addRange(

      // <editor-fold desc="// 12-08 : Mariä Empfängnis - Immaculate conception…">
      Holiday::Create( HolidayType::STATIC )
         ->setDescription(
            'Wenn der 8. Dezember auf einen Werktag fällt, dürfen Arbeitnehmer zu besonderen Bedingungen in '
            . 'Verkaufsstellen beschäftigt werden.' )
         ->setMonth( 12, false )->setDay  ( 8, false ) // 12-08
         ->addNameTranslations(
            'en', 'Immaculate conception',   'fr', 'Immaculée conception',    'it', 'Immacolata concezione',
            'es', 'Inmaculada concepción',   'pt', 'Concepção imaculada',     'cz', 'Neposkvrněné početí',
            'jp', '無原罪懐胎' )
         ->setNames( [ 'Mariä Empfängnis' => -1 ] ),
      // </editor-fold>

      // <editor-fold desc="// 12-25 : Christtag - Christmas Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )->setDay  ( 25, false ) // 12-25
         ->addNameTranslations(
            'en', 'Christmas Day',           'fr', 'Noël',   'it', 'Natale',
            'es', 'Navidad',       'pt', 'Natal do Senhor',      'cz', '1. svátek vánoční',
            'jp', '1.クリスマス' )
         ->addName( HolidayName::Create( 'de', 'Christtag' ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-26 : Stefanitag - Boxing Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )->setDay  ( 26, false ) // 12-26
         ->addNameTranslations(
            'en', 'Boxing Day',   'fr', 'Lendemain de Noël',   'it', 'Santo Stefano',
            'es', 'Sant Esteve',       'pt', '2. Dia de Natal',      'cz', '2. svátek vánoční',
            'jp', '2.クリスマスの日' )
         ->addName( HolidayName::Create( 'de', 'Stefanitag' ) )
      // </editor-fold>

   );
   // </editor-fold>

