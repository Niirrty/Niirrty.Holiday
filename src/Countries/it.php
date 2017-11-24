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


return HolidayCollection::Create( 'Italia', 'it' )

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

      // <editor-fold desc="// 01-01 Capodanno - New Year">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay  ( 1, false ) // 01-01
         ->addNameTranslationsArray( [
            'en' => 'New Year',
            'fr' => 'Jour de l\'An',
            'de' => 'Neujahr',
            'es' => 'Año Nuevo',
            'pt' => 'Mãe de Deus',
            'cz' => 'Nový rok',
            'jp' => '元日'
         ] )
         ->addName( HolidayName::Create( 'it', 'Capodanno' ) ),
      // </editor-fold>

      // <editor-fold desc="// 01-06 Epifania - Epiphany (Holy 3 kings) : …-1977">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay( 6, false ) // 01-06
         ->setValidToYear( 1977 )
         ->addNameTranslationsArray( [
            'en' => 'Epiphany',
            'fr' => 'Épiphanie',
            'de' => 'Heilige drei Könige',
            'es' => 'Epifanía',
            'pt' => 'Epifania',
            'cz' => 'Epiphany',
            'jp' => 'エピファニー'
         ] )
         ->addName( HolidayName::Create( 'it', 'Epifania' ) ),
      // </editor-fold>

      // <editor-fold desc="// 01-06 Epifania - Epiphany (Holy 3 kings) : 1985-…">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 1, false )->setDay( 6, false ) // 01-06
             ->setValidToYear( 1977 )
             ->addNameTranslationsArray( [
                'en' => 'Epiphany',
                'fr' => 'Épiphanie',
                'de' => 'Heilige drei Könige',
                'es' => 'Epifanía',
                'pt' => 'Epifania',
                'cz' => 'Epiphany',
                'jp' => 'エピファニー'
             ] )
             ->addName( HolidayName::Create( 'it', 'Epifania' ) ),
      // </editor-fold>

      // <editor-fold desc="// Pasquetta - Easter Monday (Easter sunday + 1 day)…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 1, false )
         ->addNameTranslationsArray( [
            'en' => 'Easter Monday',
            'fr' => 'Lundi de Pâques',
            'de' => 'Ostermontag',
            'es' => 'Lunes de Pascua',
            'pt' => 'Feira de Páscoa',
            'cz' => 'Velikonoční pondělí',
            'jp' => '復活の月曜日'
         ] )
         ->addName( HolidayName::Create( 'it', 'Pasquetta' ) ),
      // </editor-fold>

      // <editor-fold desc="// 04-24 : Anniversario della Liberazione - Day of work…">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 4, false )->setDay( 24, false )
             ->addNameTranslationsArray( [
                'en' => 'Day of the liberation of Italy',
                'fr' => 'Jour de la libération de l\'Italie',
                'de' => 'Tag der Befreiung Italiens',
                'es' => 'Día de la liberación de Italia',
                'pt' => 'Dia da libertação da Itália',
                'cz' => 'Den osvobození Itálie',
                'jp' => 'イタリアの解放の日'
             ] )
             ->addNames( HolidayName::Create( 'it', 'Anniversario della Liberazione' ) ),
      // </editor-fold>

      // <editor-fold desc="// 05-01 : Festa del Lavoro - Day of work…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 5, false )->setDay( 1, false )
         ->addNameTranslationsArray( [
            'en' => 'Labor Day',
            'fr' => 'Fête du travail',
            'de' => 'Tag der Arbeit',
            'es' => 'Día laboral',
            'pt' => 'Dia de trabalho',
            'cz' => 'Svátek práce',
            'jp' => '労働者の日'
         ] )
         ->addNames( HolidayName::Create( 'it', 'Festa del Lavoro' ) ),
      // </editor-fold>

      // <editor-fold desc="// Ascensione di Cristo - Ascension of Christ (Easter sunday + 39 days) : …-1977">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 39, false )
         ->setValidToYear( 1977 )
         ->addNameTranslationsArray( [
            'en' => 'Ascension of Christ',
            'fr' => 'Ascension du Christ',
            'de' => 'Christi Himmelfahrt',
            'es' => 'Ascensión de Cristo',
            'pt' => 'Ascensão de Cristo',
            'cz' => 'Ascension of Christ',
            'jp' => 'キリストの昇天'
         ] )
         ->addName( HolidayName::Create( 'it', 'Ascensione di Cristo' ) ),
      // </editor-fold>

      // <editor-fold desc="// Lunedi di Pentecoste - Whit Monday (Easter sunday + 50 days)">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 50, false )
         ->addNameTranslationsArray( [
            'en' => 'Whit Monday',
            'fr' => 'lundi de Pentecôte',
            'de' => 'Pfingstmontag',
            'es' => 'Lunes de Pentecostés',
            'pt' => 'Whit segunda-feira',
            'cz' => 'Svatodušní pondělí',
            'jp' => '聖霊降臨祭の月曜日'
         ] )
         ->addName( HolidayName::Create( 'it', 'Lunedi di Pentecoste' )->setRegions( [ 15 ] ) ),
      // </editor-fold>

      // <editor-fold desc="// 06-02 Festa della Repubblica - National holiday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 6, false )
         ->setDay( 2, false )
         ->addName( HolidayName::Create( 'it', 'Festa della Repubblica' ) )
         ->addNameTranslationsArray( [
            'en' => 'National holiday',
            'fr' => 'Fête nationale',
            'de' => 'Nationalfeiertag',
            'es' => 'Fiesta nacional',
            'pt' => 'Feriado nacional',
            'cz' => 'Státní svátek',
            'jp' => '祝日'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 08-15: Giorno dell'assunzione - Assumption Day">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 8, false )
         ->setDay  ( 15, false ) // 08-15
         ->addNameTranslationsArray( [
            'en' => 'Assumption Day',
            'fr' => 'Fête de l\'Assomption',
            'de' => 'Mariä Himmelfahrt',
            'es' => 'Día de la Asunción',
            'pt' => 'Dia da Assunção',
            'cz' => 'Nanebevzetí Panny Marie',
            'jp' => '昇天の日'
         ] )
         ->addName( HolidayName::Create( 'it', 'Giorno dell\'assunzione' ) ),
      // </editor-fold>

      // <editor-fold desc="// 11-01 : Ognissanti - All Saints' Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 11, false )->setDay  ( 1, false ) // 11-01
         ->addNameTranslationsArray( [
            'en' => 'All Saints\' Day',
            'fr', 'Fête de la Toussaint',
            'de', 'Allerheiligen',
            'es', 'Día de todos los Santos',
            'pt', 'Dia de Todos os Santos',
            'cz', 'Svátek Všech svatých',
            'jp', '諸聖人の祝日'
         ] )
         ->addName( HolidayName::Create( 'it', 'Ognissanti' ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-08: Il concetto di Maria - Immaculate conception">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )
         ->setDay  ( 8, false ) // 12-08
         ->addNameTranslationsArray( [
            'en' => 'Immaculate conception',
            'fr' => 'La conception de Marie',
            'de' => 'Mariä Empfängnis',
            'es' => 'La concepción de María',
            'pt' => 'Conceito de Maria',
            'cz' => 'Mary pojetí',
            'jp' => 'メアリーの概念'
         ] )
         ->addNames( HolidayName::Create( 'it', 'Il concetto di Maria' ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-25 : Natale - 1st Christmas Holiday…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )
         ->setDay  ( 25, false )
         ->addNameTranslationsArray( [
            'en' => 'Christmas Day',
            'fr' => 'Noël',
            'de' => '1. Weihnachtsfeiertag',
            'es' => 'Navidad',
            'pt' => 'Natal do Senhor',
            'cz' => '1. svátek vánoční',
            'jp' => '1.クリスマス'
         ] )
         ->addName( HolidayName::Create( 'it', 'Natale' ) ),
      // </editor-fold>

      // <editor-fold desc="// 12-26 : Santo Stefano - Boxing Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )
         ->setDay  ( 26, false )
         ->addNameTranslationsArray( [
            'en' => 'Boxing Day',
            'fr' => 'Lendemain de Noël',
            'de' => '2. Weihnachtsfeiertag',
            'es' => 'Sant Esteve',
            'pt' => '2. Dia de Natal',
            'cz' => '2. svátek vánoční',
            'jp' => '2.クリスマスの日'
         ] )
         ->addName( HolidayName::Create( 'it', 'Santo Stefano' ) )
      // </editor-fold>

   );

