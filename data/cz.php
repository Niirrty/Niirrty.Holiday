<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */



use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;
use Niirrty\Holiday\Identifiers;


return DefinitionCollection::Create( 'Czechia', 'cz' )
   
   ->setRegions( [] )

   ->addRange(

      // 01-01 Nový rok - New Year
      Definition::CreateNewYear( 'Nový rok' )
                ->setNameTranslations( [
                   'cz' => 'Nový rok',
                   'en' => 'New Year',
                   'fr' => 'Jour de l\'An',
                   'it' => 'Capodanno',
                   'es' => 'Año Nuevo',
                   'pt' => 'Mãe de Deus',
                   'de' => 'Neujahr',
                   'jp' => '元日'
                ] ),

      // Velký pátek - Good Friday (Easter sunday - 2 days)…
      Definition::CreateEasterDepending( Identifiers::GOOD_FRIDAY, -2 )
                ->setName( 'Velký pátek' )
                ->setValidFromYear( 2016 )
                ->setNameTranslations( [
                   'cz' => 'Velký pátek',
                   'en' => 'Good Friday',
                   'fr' => 'Vendredi Saint',
                   'it' => 'Venerdì Santo',
                   'es' => 'Viernes Santo',
                   'pt' => 'Sexta-feira Santa',
                   'de' => 'Karfreitag',
                   'jp' => '良い金曜日'
                ] ),

      // Velikonoční pondělí - Easter Monday (Easter sunday + 1 day)…
      Definition::CreateEasterDepending( Identifiers::EASTER_MONDAY, 1 )
                ->setName( 'Velikonoční pondělí' )
                ->setNameTranslations( [
                   'cz' => 'Velikonoční pondělí',
                   'en' => 'Easter Monday',
                   'fr' => 'Lundi de Pâques',
                   'it' => 'Pasquetta',
                   'es' => 'Lunes de Pascua',
                   'pt' => 'Feira de Páscoa',
                   'de' => 'Ostermontag',
                   'jp' => '復活の月曜日'
                ] ),

      // 05-01 : Svátek práce - Day of work
      Definition::Create( Identifiers::LABOR_DAY )
                ->setStaticDate( 5, 1 )
                ->setName( 'Svátek práce' )
                ->setNameTranslations( [
                   'cz' => 'Svátek práce',
                   'en' => 'Labor Day',
                   'fr' => 'Fête du travail',
                   'it' => 'Festa dei lavoratori',
                   'es' => 'Día laboral',
                   'pt' => 'Dia de trabalho',
                   'de' => 'Tag der Arbeit',
                   'jp' => '労働者の日'
                ] ),

      // 05-08 : Den osvobození - Liberation Day : …-2003
      Definition::Create( Identifiers::LIBERATION_DAY )
                ->setStaticDate( 5, 8 )
                ->setName( 'Den osvobození' )
                ->setValidToYear( 2003 )
                ->setNameTranslations( [
                   'cz' => 'Den osvobození',
                   'en' => 'Liberation Day',
                   'fr' => 'Jour de la Libération',
                   'it' => 'Giorno della liberazione',
                   'es' => 'Día de la Liberación',
                   'pt' => 'Dia da Libertação',
                   'de' => 'Tag der Befreiung',
                   'jp' => '解放の日'
                ] ),

      // 05-08 : Den vítězství - Day of the victory : 2004-…
      Definition::Create( Identifiers::DAY_OF_VICTORY )
                ->setStaticDate( 5, 8 )
                ->setName( 'Den vítězství' )
                ->setValidFromYear( 2004 )
                ->setNameTranslations( [
                   'cz' => 'Den vítězství',
                   'en' => 'Day of the victory',
                   'fr' => 'Jour de la victoire',
                   'it' => 'Giorno della vittoria',
                   'es' => 'Día de la victoria',
                   'pt' => 'Dia da vitória',
                   'de' => 'Tag des Sieges',
                   'jp' => '勝利の日'
                ] ),

      // 07-05 : Den slovanských věrozvěstů Cyrila a Metoděje - Day of Slavic Intelligence by Cyril and Methodius
      Definition::Create( 'Day of Slavic Intelligence by Cyril and Methodius' )
                ->setStaticDate( 7, 5 )
                ->setName( 'Den slovanských věrozvěstů Cyrila a Metoděje' )
                ->setNameTranslations( [
                   'cz' => 'Den slovanských věrozvěstů Cyrila a Metoděje',
                   'en' => 'Day of Slavic Intelligence by Cyril and Methodius',
                   'fr' => 'Le jour de l\'intelligence slave par Cyrille et Méthode',
                   'it' => 'Il giorno dell\'intelligenza slava di Cirillo e Metodio',
                   'es' => 'El día de la inteligencia eslava por Cirilo y Metodio',
                   'pt' => 'Dia da Inteligência Eslava por Cirilo e Metódio',
                   'de' => 'Tag der Slawenapostel Kyrill und Method',
                   'jp' => 'シリルとメトディウスによるスラブ・インテリジェンスの日'
                ] ),

      // 07-06 : Den upálení mistra Jana Husa - Day of the burning of Jan Hus
      Definition::Create( 'Day of the burning of Jan Hus' )
                ->setStaticDate( 7, 6 )
                ->setName( 'Den upálení mistra Jana Husa' )
                ->setNameTranslations( [
                   'cz' => 'Den upálení mistra Jana Husa',
                   'en' => 'Day of the burning of Jan Hus',
                   'fr' => 'Le jour de l\'incendie de Jan Hus',
                   'it' => 'Il giorno dell\'incendio di Jan Hus',
                   'es' => 'Día de la quema de Jan Hus',
                   'pt' => 'Dia da queima de Jan Hus',
                   'de' => 'Tag der Verbrennung von Jan Hus',
                   'jp' => 'Jan Husの燃える日'
                ] ),

      // 09-28 : Den české státnosti - Day of the Czech statehood
      Definition::Create( 'Day of the Czech statehood' )
                ->setStaticDate( 9, 28 )
                ->setName( 'Den české státnosti' )
                ->setNameTranslations( [
                   'cz' => 'Den české státnosti',
                   'en' => 'Day of the Czech statehood',
                   'fr' => 'Jour de l\'Etat tchèque',
                   'it' => 'Giorno della Repubblica Ceca',
                   'es' => 'Día de la estadidad checa',
                   'pt' => 'Dia da comunidade checa',
                   'de' => 'Tag der tschechischen Staatlichkeit',
                   'jp' => 'チェコ国家誕生日'
                ] ),

      // 10-28 : Den vzniku samostatného československého státu - Day of the emergence of an independent Czechoslovak state
      Definition::Create( 'Day of the emergence of an independent Czechoslovak state' )
                ->setStaticDate( 10, 28 )
                ->setName( 'Den vzniku samostatného československého státu' )
                ->setNameTranslations( [
                   'cz' => 'Den vzniku samostatného československého státu',
                   'en' => 'Day of the emergence of an independent Czechoslovak state',
                   'fr' => 'Jour de l\'émergence d\'un Etat tchécoslovaque indépendant',
                   'it' => 'Giorno dell\'emergere di uno stato cecoslovacco indipendente',
                   'es' => 'Día de la emergencia de un estado checoslovaco independiente',
                   'pt' => 'Dia do surgimento de um estado checoslovaco independente',
                   'de' => 'Tag der Entstehung eines selbstständigen tschechoslowakischen Staates',
                   'jp' => '独立したチェコスロバキア国家の出現の日'
                ] ),

      // 11-17 : Den boje za svobodu a demokracii - Day of struggle for freedom and democracy
      Definition::Create( 'Day of struggle for freedom and democracy' )
                ->setStaticDate( 11, 17 )
                ->setName( 'Den boje za svobodu a demokracii' )
                ->setNameTranslations( [
                   'cz' => 'Den boje za svobodu a demokracii',
                   'en' => 'Day of struggle for freedom and democracy',
                   'fr' => 'Journée de lutte pour la liberté et la démocratie',
                   'it' => 'Giorno di lotta per la libertà e la democrazia',
                   'es' => 'Día de lucha por la libertad y la democracia',
                   'pt' => 'Dia de luta pela liberdade e democracia',
                   'de' => 'Tag des Kampfes für Freiheit und Demokratie',
                   'jp' => '自由と民主主義のための闘いの日'
                ] ),

      // 12-24 : Štědrý den - Holy Evening
      Definition::Create( Identifiers::HOLY_EVENING )
                ->setStaticDate( 12, 24 )
                ->setName( 'Štědrý den' )
                ->setNameTranslations( [
                   'cz' => 'Štědrý den',
                   'en' => 'Holy Evening',
                   'fr' => 'Veille de Noël',
                   'it' => 'Vigilia di Natale',
                   'es' => 'Nochebuena',
                   'pt' => 'Noite de Natal',
                   'de' => 'Heiliger Abend',
                   'jp' => 'クリスマスイブ'
                ] ),

      // 12-25 : 1. svátek vánoční - Christmas Day
      Definition::Create( Identifiers::CHRISTMAS_DAY )
                ->setStaticDate( 12, 25 )
                ->setName( '1. svátek vánoční' )
                ->setNameTranslations( [
                   'cz' => '1. svátek vánoční',
                   'en' => 'Christmas Day',
                   'fr' => 'Noël',
                   'it' => 'Natale',
                   'es' => 'Navidad',
                   'pt' => 'Natal do Senhor',
                   'de' => '1. Weihnachtsfeiertag',
                   'jp' => '1.クリスマス'
                ] ),

      // 12-26 : 2. svátek vánoční - Boxing Day
      Definition::Create( Identifiers::BOXING_DAY )
                ->setStaticDate( 12, 26 )
                ->setName( '2. svátek vánoční' )
                ->setNameTranslations( [
                   'cz' => '2. svátek vánoční',
                   'en' => 'Boxing Day',
                   'fr' => 'Lendemain de Noël',
                   'it' => 'Santo Stefano',
                   'es' => 'Sant Esteve',
                   'pt' => '2. Dia de Natal',
                   'de' => '2. Weihnachtsfeiertag',
                   'jp' => '2.クリスマスの日'
                ] )

   );

