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


return HolidayCollection::Create( 'France', 'fr' )

   // <editor-fold desc="// Define the regions and sub regions, required to handle the different holidays…">
   ->setRegions(
      [
         'Île-de-France',              // 0
         'Auvergne-Rhône-Alpes',       // 1
         'Nouvelle-Aquitaine',         // 2
         'Hauts-de-France',            // 3
         'Provence-Alpes-Côte d’Azur', // 4
         'Bretagne',                   // 5
         'Centre-Val de Loire',        // 6
         'Pays de la Loire',           // 7
         'Grand Est',                  // 8
         'Normandie',                  // 9
         'Bourgogne-Franche-Comté',    // 10
         'Okzitanien',                 // 11
         'Korsika',                    // 12
         'Guadeloupe',                 // 13
         'Martinique',                 // 14
         'Guyane française',           // 15
         'Réunion',                    // 16
         'Mayotte'                     // 17
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

      // <editor-fold desc="// 01-01 Jour de l'An - New Year">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay  ( 1, false ) // 01-01
         ->addNameTranslationsArray( [
            'en' => 'New Year',
            'de' => 'Neujahr',
            'it' => 'Capodanno',
            'es' => 'Año Nuevo',
            'pt' => 'Mãe de Deus',
            'cz' => 'Nový rok',
            'jp' => '元日'
         ] )
         ->addName( HolidayName::Create( 'fr', 'Jour de l\'An' ) ),
      // </editor-fold>

      // <editor-fold desc="// Vendredi Saint - Good Friday (Easter sunday - 2 days)…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
             ->setBaseCallbackName( 'easter_sunday', false )
             ->setDifferenceDays  ( -2, false )
             ->addNameTranslations( [
                'en' => 'Good Friday',
                'de' => 'Karfreitag',
                'it' => 'Venerdì Santo',
                'es' => 'Viernes Santo',
                'pt' => 'Sexta-feira Santa',
                'cz' => 'Velký pátek',
                'jp' => '良い金曜日'
             ] )
             ->addName( HolidayName::Create( 'fr', 'Vendredi Saint' )->setRegions( [ 8, 13, 14 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// Lundi de Pâques - Easter Monday (Easter sunday + 1 day)…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
             ->setBaseCallbackName( 'easter_sunday', false )
             ->setDifferenceDays  ( 1, false )
             ->addNameTranslationsArray( [
                'en' => 'Easter Monday',
                'de' => 'Ostermontag',
                'it' => 'Pasquetta',
                'es' => 'Lunes de Pascua',
                'pt' => 'Feira de Páscoa',
                'cz' => 'Velikonoční pondělí',
                'jp' => '復活の月曜日'
             ] )
             ->addName( HolidayName::Create( 'fr', 'Lundi de Pâques' ) ),
      // </editor-fold>

      // <editor-fold desc="// 04-27 : Abolition de l’esclavage - Abolition of slavery">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 4, false )
             ->setDay  ( 27, false )
             ->addNameTranslationsArray( [
                'en' => 'Abolition of slavery',
                'de' => 'Abschaffung der Sklaverei',
                'it' => 'Abolizione della schiavitù',
                'es' => 'Abolición de la esclavitud',
                'pt' => 'Abolição da escravidão',
                'cz' => 'Zrušení otroctví',
                'jp' => '奴隷制度の廃止'
             ] )
             ->addName( HolidayName::Create( 'fr', 'Abolition de l’esclavage' )->setRegions( [ 17 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 05-01 : Fête du travail - Day of work…">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 5, false )
             ->setDay  ( 1, false )
             ->addNameTranslationsArray( [
                'en' => 'Labor Day',
                'de' => 'Tag der Arbeit',
                'it' => 'Festa dei lavoratori',
                'es' => 'Día laboral',
                'pt' => 'Dia de trabalho',
                'cz' => 'Svátek práce',
                'jp' => '労働者の日'
             ] )
             ->addNames( HolidayName::Create( 'fr', 'Fête du travail' ) ),
      // </editor-fold>

      // <editor-fold desc="// 05-08 : Victoire 1945 - Day of victory…">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 5, false )
             ->setDay  ( 1, false )
             ->addNameTranslationsArray( [
                'en' => 'Day of victory',
                'de' => 'Tag des Sieges',
                'it' => 'Giorno della vittoria',
                'es' => 'Día de la victoria',
                'pt' => 'Dia da vitória',
                'cz' => 'Den vítězství',
                'jp' => '勝利の日'
             ] )
             ->addNames( HolidayName::Create( 'fr', 'Victoire 1945' ) ),
      // </editor-fold>

      // <editor-fold desc="// 05-22 : Abolition de l’esclavage - Abolition of slavery">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 5, false )
             ->setDay  ( 22, false )
             ->addNameTranslationsArray( [
                'en' => 'Abolition of slavery',
                'de' => 'Abschaffung der Sklaverei',
                'it' => 'Abolizione della schiavitù',
                'es' => 'Abolición de la esclavitud',
                'pt' => 'Abolição da escravidão',
                'cz' => 'Zrušení otroctví',
                'jp' => '奴隷制度の廃止'
             ] )
             ->addName( HolidayName::Create( 'fr', 'Abolition de l’esclavage' )->setRegions( [ 14 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 05-27 : Abolition de l’esclavage - Abolition of slavery">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 5, false )
             ->setDay  ( 27, false )
             ->addNameTranslationsArray( [
                'en' => 'Abolition of slavery',
                'de' => 'Abschaffung der Sklaverei',
                'it' => 'Abolizione della schiavitù',
                'es' => 'Abolición de la esclavitud',
                'pt' => 'Abolição da escravidão',
                'cz' => 'Zrušení otroctví',
                'jp' => '奴隷制度の廃止'
             ] )
             ->addName( HolidayName::Create( 'fr', 'Abolition de l’esclavage' )->setRegions( [ 13 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// Ascension du Christ - Ascension of Christ (Easter sunday + 39 days)">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
             ->setBaseCallbackName( 'easter_sunday', false )
             ->setDifferenceDays  ( 39, false )
             ->addNameTranslationsArray( [
                'en' => 'Ascension of Christ',
                'de' => 'Christi Himmelfahrt',
                'it' => 'Ascensione di Cristo',
                'es' => 'Ascensión de Cristo',
                'pt' => 'Ascensão de Cristo',
                'cz' => 'Ascension of Christ',
                'jp' => 'キリストの昇天'
             ] )
             ->addName( HolidayName::Create( 'fr', 'Ascension du Christ' ) ),
      // </editor-fold>

      // <editor-fold desc="// Pentecôte - Whit Sunday (Easter sunday + 49 days)">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
             ->setBaseCallbackName( 'easter_sunday', false )
             ->setDifferenceDays  ( 49, false )
             ->addNameTranslationsArray( [
                'en' => 'Whit Sunday',
                'de' => 'Pfingsten',
                'it' => 'Pentecoste',
                'es' => 'Domingo de Pentecostés',
                'pt' => 'Domingo de Pentecostes',
                'cz' => 'Whitsunday',
                'jp' => 'ウィットサンデー'
             ] )
             ->addName( HolidayName::Create( 'fr', 'Pentecôte' ) ),
      // </editor-fold>

      // <editor-fold desc="// Lundi de Pentecôte - Whit Monday (Easter sunday + 50 days) : …-2003">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
             ->setBaseCallbackName( 'easter_sunday', false )
             ->setDifferenceDays  ( 50, false )
             ->setValidToYear( 2003 )
             ->addNameTranslationsArray( [
                'en' => 'Whit Monday',
                'de' => 'Pfingstmontag',
                'it' => 'Lunedi di Pentecoste',
                'es' => 'Lunes de Pentecostés',
                'pt' => 'Whit segunda-feira',
                'cz' => 'Svatodušní pondělí',
                'jp' => '聖霊降臨祭の月曜日'
             ] )
             ->addName( HolidayName::Create( 'fr', 'Lundi de Pentecôte' ) ),
      // </editor-fold>

      // <editor-fold desc="// Lundi de Pentecôte - Whit Monday (Easter sunday + 50 days) : 2008-…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
             ->setBaseCallbackName( 'easter_sunday', false )
             ->setDifferenceDays  ( 50, false )
             ->setValidFromYear( 2008 )
             ->addNameTranslationsArray( [
                'en' => 'Whit Monday',
                'de' => 'Pfingstmontag',
                'it' => 'Lunedi di Pentecoste',
                'es' => 'Lunes de Pentecostés',
                'pt' => 'Whit segunda-feira',
                'cz' => 'Svatodušní pondělí',
                'jp' => '聖霊降臨祭の月曜日'
             ] )
             ->addName( HolidayName::Create( 'fr', 'Lundi de Pentecôte' ) ),
      // </editor-fold>

      // <editor-fold desc="// 06-10 : Abolition de l’esclavage - Abolition of slavery">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 6, false )
             ->setDay  ( 10, false )
             ->addNameTranslationsArray( [
                'en' => 'Abolition of slavery',
                'de' => 'Abschaffung der Sklaverei',
                'it' => 'Abolizione della schiavitù',
                'es' => 'Abolición de la esclavitud',
                'pt' => 'Abolição da escravidão',
                'cz' => 'Zrušení otroctví',
                'jp' => '奴隷制度の廃止'
             ] )
             ->addName( HolidayName::Create( 'fr', 'Abolition de l’esclavage' )->setRegions( [ 15 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 07-14 : Fête Nationale de la France - French national holiday">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 7, false )
             ->setDay  ( 14, false )
             ->addNameTranslationsArray( [
                'en' => 'French national holiday',
                'de' => 'Französischer Nationalfeiertag',
                'it' => 'Festa nazionale francese',
                'es' => 'Fiesta nacional francesa',
                'pt' => 'Feriado nacional francês',
                'cz' => 'Francouzský národní svátek',
                'jp' => 'フランスの祝祭日'
             ] )
             ->addName( HolidayName::Create( 'fr', 'Fête Nationale de la France' ) ),
      // </editor-fold>

      // <editor-fold desc="// 08-15: Assomption - Assumption Day">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 8, false )
         ->setDay  ( 15, false ) // 08-15
         ->addNameTranslationsArray( [
            'en' => 'Assumption Day',
            'de' => 'Mariä Himmelfahrt',
            'it' => 'Giorno dell\'assunzione',
            'es' => 'Día de la Asunción',
            'pt' => 'Dia da Assunção',
            'cz' => 'Nanebevzetí Panny Marie',
            'jp' => '昇天の日'
         ] )
         ->addName( HolidayName::Create( 'fr', 'Assomption' ) ),
      // </editor-fold>

      // <editor-fold desc="// 11-01 : Toussaint - All Saints' Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 11, false )->setDay  ( 1, false ) // 11-01
         ->addNameTranslationsArray( [
            'en' => 'All Saints\' Day',
            'de' => 'Allerheiligen',
            'it' => 'Ognissanti',
            'es' => 'Día de todos los Santos',
            'pt' => 'Dia de Todos os Santos',
            'cz' => 'Svátek Všech svatých',
            'jp' => '諸聖人の祝日'
         ] )
         ->addName( HolidayName::Create( 'fr', 'Toussaint' ) ),
      // </editor-fold>

      // <editor-fold desc="// 11-11 : Armistice 1918 - Truce of Compiègne">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 11, false )
             ->setDay  ( 11, false )
             ->addNameTranslationsArray( [
                'en' => 'Truce of Compiègne',
                'de' => 'Waffenstillstand von Compiègne',
                'it' => 'Tregua di Compiègne',
                'es' => 'Tregua de Compiègne',
                'pt' => 'Trégua de Compiègne',
                'cz' => 'Příjem Compiègne',
                'jp' => 'Compiègneの休戦'
             ] )
             ->addName( HolidayName::Create( 'fr', 'Armistice 1918' ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-20 : Abolition de l’esclavage - Abolition of slavery">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 12, false )
             ->setDay  ( 20, false )
             ->addNameTranslationsArray( [
                'en' => 'Abolition of slavery',
                'de' => 'Abschaffung der Sklaverei',
                'it' => 'Abolizione della schiavitù',
                'es' => 'Abolición de la esclavitud',
                'pt' => 'Abolição da escravidão',
                'cz' => 'Zrušení otroctví',
                'jp' => '奴隷制度の廃止'
             ] )
             ->addName( HolidayName::Create( 'fr', 'Abolition de l’esclavage' )->setRegions( [ 16 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-25 : Noël - 1st Christmas Holiday…">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 12, false )
             ->setDay  ( 25, false )
             ->addNameTranslationsArray( [
                'en' => 'Christmas Day',
                'de' => '1. Weihnachtsfeiertag',
                'it' => 'Natale',
                'es' => 'Navidad',
                'pt' => 'Natal do Senhor',
                'cz' => '1. svátek vánoční',
                'jp' => '1.クリスマス'
             ] )
             ->addName( HolidayName::Create( 'de', 'Noël' ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-26 : Lendemain de Noël - Boxing Day…">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 12, false )
             ->setDay  ( 26, false )
             ->addNameTranslationsArray( [
                'en' => 'Boxing Day',
                'fr' => '2. Weihnachtsfeiertag',
                'it' => 'Santo Stefano',
                'es' => 'Sant Esteve',
                'pt' => '2. Dia de Natal',
                'cz' => '2. svátek vánoční',
                'jp' => '2.クリスマスの日'
             ] )
             ->addNames( HolidayName::Create( 'fr', 'Lendemain de Noël' )->setRegions( [ 8 ] ) )
      // </editor-fold>

   );

