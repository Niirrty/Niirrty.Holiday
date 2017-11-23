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


return HolidayCollection::Create( 'Czechia', 'cz' )

   // <editor-fold desc="// The are no regions required to handle the different holidays…">
   ->setRegions( [] )
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

      // <editor-fold desc="// 01-01 Nový rok - New Year">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay  ( 1, false ) // 01-01
         ->addName( HolidayName::Create( 'cz', 'Nový rok' ) )
         ->addNameTranslationsArray( [
            'en' => 'New Year',
            'fr' => 'Jour de l\'An',
            'it' => 'Capodanno',
            'es' => 'Año Nuevo',
            'pt' => 'Mãe de Deus',
            'de' => 'Neujahr',
            'jp' => '元日'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// Velký pátek - Good Friday (Easter sunday - 2 days)…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( -2, false )
         ->addName( HolidayName::Create( 'cz', 'Velký pátek' ) )
         ->setValidFromYear( 2016, false )
         ->addNameTranslationsArray( [
            'en' => 'Good Friday',
            'fr' => 'Vendredi Saint',
            'it' => 'Venerdì Santo',
            'es' => 'Viernes Santo',
            'pt' => 'Sexta-feira Santa',
            'de' => 'Karfreitag',
            'jp' => '良い金曜日'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// Velikonoční pondělí - Easter Monday (Easter sunday + 1 day)…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setBaseCallbackName( 'easter_sunday', false )
         ->setDifferenceDays  ( 1, false )
         ->addName( HolidayName::Create( 'cz', 'Velikonoční pondělí' ) )
         ->addNameTranslationsArray( [
            'en' => 'Easter Monday',
            'fr' => 'Lundi de Pâques',
            'it' => 'Pasquetta',
            'es' => 'Lunes de Pascua',
            'pt' => 'Feira de Páscoa',
            'de' => 'Ostermontag',
            'jp' => '復活の月曜日'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 05-01 : Svátek práce - Day of work…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 5, false )->setDay( 1, false )
         ->addName( HolidayName::Create( 'cz', 'Svátek práce' ) )
         ->addNameTranslationsArray( [
            'en' => 'Labor Day',
            'fr' => 'Fête du travail',
            'it' => 'Festa dei lavoratori',
            'es' => 'Día laboral',
            'pt' => 'Dia de trabalho',
            'de' => 'Tag der Arbeit',
            'jp' => '労働者の日'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 05-08 : Den osvobození - Liberation Day : …-2003">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 5, false )->setDay( 8, false )
             ->addName( HolidayName::Create( 'cz', 'Den osvobození' ) )
             ->setValidToYear( 2003 )
             ->addNameTranslationsArray( [
                'en' => 'Liberation Day',
                'fr' => 'Jour de la Libération',
                'it' => 'Giorno della liberazione',
                'es' => 'Día de la Liberación',
                'pt' => 'Dia da Libertação',
                'de' => 'Tag der Befreiung',
                'jp' => '解放の日'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 05-08 : Den vítězství - Day of the victory : 2004-…">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 5, false )->setDay( 8, false )
             ->addName( HolidayName::Create( 'cz', 'Den vítězství' ) )
             ->setValidFromYear( 2004 )
             ->addNameTranslationsArray( [
                'en' => 'Day of the victory',
                'fr' => 'Jour de la victoire',
                'it' => 'Giorno della vittoria',
                'es' => 'Día de la victoria',
                'pt' => 'Dia da vitória',
                'de' => 'Tag des Sieges',
                'jp' => '勝利の日'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 07-05 : Den slovanských věrozvěstů Cyrila a Metoděje - Day of Slavic Intelligence by Cyril and Methodius">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 7, false )->setDay( 5, false ) // 07-05
         ->addName( HolidayName::Create( 'cz', 'Den slovanských věrozvěstů Cyrila a Metoděje' ) )
         ->addNameTranslationsArray( [
            'en', 'Day of Slavic Intelligence by Cyril and Methodius',
            'fr', 'Le jour de l\'intelligence slave par Cyrille et Méthode',
            'it', 'Il giorno dell\'intelligenza slava di Cirillo e Metodio',
            'es', 'El día de la inteligencia eslava por Cirilo y Metodio',
            'pt', 'Dia da Inteligência Eslava por Cirilo e Metódio',
            'de', 'Tag der Slawenapostel Kyrill und Method',
            'jp', 'シリルとメトディウスによるスラブ・インテリジェンスの日'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 07-06 : Den upálení mistra Jana Husa - Day of the burning of Jan Hus">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 7, false )->setDay( 6, false ) // 07-06
         ->addName( HolidayName::Create( 'cz', 'Den upálení mistra Jana Husa' ) )
         ->addNameTranslationsArray( [
            'en', 'Day of the burning of Jan Hus',
            'fr', 'Le jour de l\'incendie de Jan Hus',
            'it', 'Il giorno dell\'incendio di Jan Hus',
            'es', 'Día de la quema de Jan Hus',
            'pt', 'Dia da queima de Jan Hus',
            'de', 'Tag der Verbrennung von Jan Hus',
            'jp', 'Jan Husの燃える日'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 09-28 : Den české státnosti - Day of the Czech statehood">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 9, false )->setDay( 28, false ) // 09-28
         ->addName( HolidayName::Create( 'cz', 'Den české státnosti' ) )
         ->addNameTranslationsArray( [
            'en', 'Day of the Czech statehood',
            'fr', 'Jour de l\'Etat tchèque',
            'it', 'Giorno della Repubblica Ceca',
            'es', 'Día de la estadidad checa',
            'pt', 'Dia da comunidade checa',
            'de', 'Tag der tschechischen Staatlichkeit',
            'jp', 'チェコ国家誕生日'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 10-28 : Den vzniku samostatného československého státu - Day of the emergence of an independent Czechoslovak state">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 10, false )->setDay( 28, false ) // 10-28
         ->addName( HolidayName::Create( 'cz', 'Den vzniku samostatného československého státu' ) )
         ->addNameTranslationsArray( [
            'en', 'Day of the emergence of an independent Czechoslovak state',
            'fr', 'Jour de l\'émergence d\'un Etat tchécoslovaque indépendant',
            'it', 'Giorno dell\'emergere di uno stato cecoslovacco indipendente',
            'es', 'Día de la emergencia de un estado checoslovaco independiente',
            'pt', 'Dia do surgimento de um estado checoslovaco independente',
            'de', 'Tag der Entstehung eines selbstständigen tschechoslowakischen Staates',
            'jp', '独立したチェコスロバキア国家の出現の日'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 11-17 : Den boje za svobodu a demokracii - Day of struggle for freedom and democracy">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 11, false )->setDay( 17, false ) // 11-17
         ->addName( HolidayName::Create( 'cz', 'Den boje za svobodu a demokracii' ) )
         ->addNameTranslationsArray( [
            'en', 'Day of struggle for freedom and democracy',
            'fr', 'Journée de lutte pour la liberté et la démocratie',
            'it', 'Giorno di lotta per la libertà e la democrazia',
            'es', 'Día de lucha por la libertad y la democracia',
            'pt', 'Dia de luta pela liberdade e democracia',
            'de', 'Tag des Kampfes für Freiheit und Demokratie',
            'jp', '自由と民主主義のための闘いの日'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 12-24 : Štědrý den - Holy Evening">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )->setDay( 24, false ) // 12-24
         ->addName( HolidayName::Create( 'cz', 'Štědrý den' ) )
         ->addNameTranslationsArray( [
            'en', 'Holy Evening',
            'fr', 'Veille de Noël',
            'it', 'Vigilia di Natale',
            'es', 'Nochebuena',
            'pt', 'Noite de Natal',
            'de', 'Heiliger Abend',
            'jp', 'クリスマスイブ'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 12-25 : 1. svátek vánoční - 1st Christmas Holiday…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )->setDay( 25, false ) // 12-25
         ->addName( HolidayName::Create( 'cz', '1. svátek vánoční' ) )
         ->addNameTranslationsArray( [
            'en' => 'Christmas Day',
            'fr' => 'Noël',
            'it' => 'Natale',
            'es' => 'Navidad',
            'pt' => 'Natal do Senhor',
            'de' => '1. Weihnachtsfeiertag',
            'jp' => '1.クリスマス'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 12-26 : 2. svátek vánoční - Boxing Day…">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 12, false )->setDay( 26, false )
         ->addName( HolidayName::Create( 'cz', '2. svátek vánoční' ) )
         ->addNameTranslationsArray( [
            'en' => 'Boxing Day',
            'fr' => 'Lendemain de Noël',
            'it' => 'Santo Stefano',
            'es' => 'Sant Esteve',
            'pt' => '2. Dia de Natal',
            'de' => '2. Weihnachtsfeiertag',
            'jp' => '2.クリスマスの日'
         ] )
      // </editor-fold>

   );

