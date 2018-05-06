<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;
use Niirrty\Holiday\Identifiers;


return DefinitionCollection::Create( 'France', 'fr' )

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

   ->addRange(

      // 01-01 Jour de l'An - New Year
      Definition::CreateNewYear( 'Jour de l\'An' )
                ->setNameTranslations( [
                   'fr' => 'Jour de l\'An',
                   'en' => 'New Year',
                   'de' => 'Neujahr',
                   'it' => 'Capodanno',
                   'es' => 'Año Nuevo',
                   'pt' => 'Mãe de Deus',
                   'cz' => 'Nový rok',
                   'jp' => '元日'
                ] ),

      // Vendredi Saint - Good Friday (Easter sunday - 2 days)
      Definition::CreateEasterDepending( Identifiers::GOOD_FRIDAY, -2 )
                ->setName( 'Vendredi Saint' )
                ->setNameTranslations( [
                   'fr' => 'Vendredi Saint',
                   'en' => 'Good Friday',
                   'de' => 'Karfreitag',
                   'it' => 'Venerdì Santo',
                   'es' => 'Viernes Santo',
                   'pt' => 'Sexta-feira Santa',
                   'cz' => 'Velký pátek',
                   'jp' => '良い金曜日'
                ] )
                ->setValidRegions( [ 8, 13, 14 ] ),

      // Lundi de Pâques - Easter Monday (Easter sunday + 1 day)
      Definition::CreateEasterDepending( Identifiers::EASTER_MONDAY, 1 )
                ->setName( 'Lundi de Pâques' )
                ->setNameTranslations( [
                   'fr' => 'Lundi de Pâques',
                   'en' => 'Easter Monday',
                   'de' => 'Ostermontag',
                   'it' => 'Pasquetta',
                   'es' => 'Lunes de Pascua',
                   'pt' => 'Feira de Páscoa',
                   'cz' => 'Velikonoční pondělí',
                   'jp' => '復活の月曜日'
                ] ),

      // 04-27 : Abolition de l’esclavage - Abolition of slavery
      Definition::Create( 'Abolition of slavery (Mayotte)' )
                ->setName( 'Abolition de l’esclavage' )
                ->setStaticDate( 4, 27 )
                ->setNameTranslations( [
                   'fr' => 'Abolition de l’esclavage',
                   'en' => 'Abolition of slavery',
                   'de' => 'Abschaffung der Sklaverei',
                   'it' => 'Abolizione della schiavitù',
                   'es' => 'Abolición de la esclavitud',
                   'pt' => 'Abolição da escravidão',
                   'cz' => 'Zrušení otroctví',
                   'jp' => '奴隷制度の廃止'
                ] )
                ->setValidRegions( [ 17 ] ),

      // 05-01 : Fête du travail - Day of work
      Definition::Create( Identifiers::LABOR_DAY )
                ->setName( 'Fête du travail' )
                ->setStaticDate( 5, 1 )
                ->setNameTranslations( [
                   'fr' => 'Fête du travail',
                   'en' => 'Labor Day',
                   'de' => 'Tag der Arbeit',
                   'it' => 'Festa dei lavoratori',
                   'es' => 'Día laboral',
                   'pt' => 'Dia de trabalho',
                   'cz' => 'Svátek práce',
                   'jp' => '労働者の日'
                ] ),

      // 05-08 : Victoire 1945 - Day of victory…
      Definition::Create( Identifiers::DAY_OF_VICTORY )
                ->setName( 'Victoire 1945' )
                ->setStaticDate( 5, 8 )
                ->setNameTranslations( [
                   'fr' => 'Victoire 1945',
                   'en' => 'Day of victory',
                   'de' => 'Tag des Sieges',
                   'it' => 'Giorno della vittoria',
                   'es' => 'Día de la victoria',
                   'pt' => 'Dia da vitória',
                   'cz' => 'Den vítězství',
                   'jp' => '勝利の日'
                ] ),

      // 05-22 : Abolition de l’esclavage - Abolition of slavery
      Definition::Create( 'Abolition of slavery (Martinique)' )
                ->setName( 'Abolition de l’esclavage' )
                ->setStaticDate( 5, 22 )
                ->setNameTranslations( [
                   'fr' => 'Abolition de l’esclavage',
                   'en' => 'Abolition of slavery',
                   'de' => 'Abschaffung der Sklaverei',
                   'it' => 'Abolizione della schiavitù',
                   'es' => 'Abolición de la esclavitud',
                   'pt' => 'Abolição da escravidão',
                   'cz' => 'Zrušení otroctví',
                   'jp' => '奴隷制度の廃止'
                ] )
                ->setValidRegions( [ 14 ] ),

      // 05-27 : Abolition de l’esclavage - Abolition of slavery
      Definition::Create( 'Abolition of slavery (Guadeloupe)' )
                ->setName( 'Abolition de l’esclavage' )
                ->setStaticDate( 5, 27 )
                ->setNameTranslations( [
                   'fr' => 'Abolition de l’esclavage',
                   'en' => 'Abolition of slavery',
                   'de' => 'Abschaffung der Sklaverei',
                   'it' => 'Abolizione della schiavitù',
                   'es' => 'Abolición de la esclavitud',
                   'pt' => 'Abolição da escravidão',
                   'cz' => 'Zrušení otroctví',
                   'jp' => '奴隷制度の廃止'
                ] )
                ->setValidRegions( [ 13 ] ),

      // Ascension du Christ - Ascension of Christ (Easter sunday + 39 days)
      Definition::CreateEasterDepending( Identifiers::ASCENSION, 39 )
                ->setName( 'Ascension du Christ' )
                ->setNameTranslations( [
                   'fr' => 'Ascension du Christ',
                   'en' => 'Ascension of Christ',
                   'de' => 'Christi Himmelfahrt',
                   'it' => 'Ascensione di Cristo',
                   'es' => 'Ascensión de Cristo',
                   'pt' => 'Ascensão de Cristo',
                   'cz' => 'Ascension of Christ',
                   'jp' => 'キリストの昇天'
                ] ),

      // Pentecôte - Whit Sunday (Easter sunday + 49 days)
      Definition::CreateEasterDepending( Identifiers::WHIT_SUNDAY, 49 )
                ->setName( 'Pentecôte' )
                ->setNameTranslations( [
                   'fr' => 'Pentecôte',
                   'en' => 'Whit Sunday',
                   'de' => 'Pfingsten',
                   'it' => 'Pentecoste',
                   'es' => 'Domingo de Pentecostés',
                   'pt' => 'Domingo de Pentecostes',
                   'cz' => 'Whitsunday',
                   'jp' => 'ウィットサンデー'
                ] ),

      // Lundi de Pentecôte - Whit Monday (Easter sunday + 50 days) : …-2003 + 2008-…
      Definition::CreateEasterDepending( Identifiers::WHIT_MONDAY, 50 )
                ->setName( 'Lundi de Pentecôte' )
                ->setValidToYear( 2003 )
                ->setValidFromYear( 2008 )
                ->setNameTranslations( [
                   'fr' => 'Lundi de Pentecôte',
                   'en' => 'Whit Monday',
                   'de' => 'Pfingstmontag',
                   'it' => 'Lunedi di Pentecoste',
                   'es' => 'Lunes de Pentecostés',
                   'pt' => 'Whit segunda-feira',
                   'cz' => 'Svatodušní pondělí',
                   'jp' => '聖霊降臨祭の月曜日'
                ] ),

      // 06-10 : Abolition de l’esclavage - Abolition of slavery
      Definition::Create( 'Abolition of slavery (Guyane française)' )
                ->setName( 'Abolition de l’esclavage' )
                ->setStaticDate( 6, 10 )
                ->setNameTranslations( [
                   'fr' => 'Abolition de l’esclavage',
                   'en' => 'Abolition of slavery',
                   'de' => 'Abschaffung der Sklaverei',
                   'it' => 'Abolizione della schiavitù',
                   'es' => 'Abolición de la esclavitud',
                   'pt' => 'Abolição da escravidão',
                   'cz' => 'Zrušení otroctví',
                   'jp' => '奴隷制度の廃止'
                ] )
                ->setValidRegions( [ 15 ] ),

      // 07-14 : Fête Nationale de la France - French national holiday
      Definition::Create( Identifiers::NATIONAL_DAY )
                ->setName( 'Fête Nationale de la France' )
                ->setStaticDate( 7, 14 )
                ->setNameTranslations( [
                   'fr' => 'Fête Nationale de la France',
                   'en' => 'French national holiday',
                   'de' => 'Französischer Nationalfeiertag',
                   'it' => 'Festa nazionale francese',
                   'es' => 'Fiesta nacional francesa',
                   'pt' => 'Feriado nacional francês',
                   'cz' => 'Francouzský národní svátek',
                   'jp' => 'フランスの祝祭日'
                ] ),

      // 08-15: Assomption - Assumption Day
      Definition::Create( Identifiers::ASSUMPTION )
                ->setName( 'Assomption' )
                ->setStaticDate( 8, 15 )
                ->setNameTranslations( [
                   'fr' => 'Assomption',
                   'en' => 'Assumption Day',
                   'de' => 'Mariä Himmelfahrt',
                   'it' => 'Giorno dell\'assunzione',
                   'es' => 'Día de la Asunción',
                   'pt' => 'Dia da Assunção',
                   'cz' => 'Nanebevzetí Panny Marie',
                   'jp' => '昇天の日'
                ] ),

      // 11-01 : Toussaint - All Saints' Day…
      Definition::Create( Identifiers::ALL_SAINTS )
                ->setName( 'Toussaint' )
                ->setStaticDate( 11, 1 )
                ->setNameTranslations( [
                   'fr' => 'Toussaint',
                   'en' => 'All Saints\' Day',
                   'de' => 'Allerheiligen',
                   'it' => 'Ognissanti',
                   'es' => 'Día de todos los Santos',
                   'pt' => 'Dia de Todos os Santos',
                   'cz' => 'Svátek Všech svatých',
                   'jp' => '諸聖人の祝日'
                ] ),

      // 11-11 : Armistice 1918 - Truce of Compiègne
      Definition::Create( 'Truce of Compiègne' )
                ->setName( 'Armistice 1918' )
                ->setStaticDate( 11, 11 )
                ->setNameTranslations( [
                   'fr' => 'Armistice 1918',
                   'en' => 'Truce of Compiègne',
                   'de' => 'Waffenstillstand von Compiègne',
                   'it' => 'Tregua di Compiègne',
                   'es' => 'Tregua de Compiègne',
                   'pt' => 'Trégua de Compiègne',
                   'cz' => 'Příjem Compiègne',
                   'jp' => 'Compiègneの休戦'
                ] ),

      // 12-20 : Abolition de l’esclavage - Abolition of slavery
      Definition::Create( 'Abolition of slavery (Réunion)' )
                ->setName( 'Abolition de l’esclavage' )
                ->setStaticDate( 12, 20 )
                ->setNameTranslations( [
                   'fr' => 'Abolition de l’esclavage',
                   'en' => 'Abolition of slavery',
                   'de' => 'Abschaffung der Sklaverei',
                   'it' => 'Abolizione della schiavitù',
                   'es' => 'Abolición de la esclavitud',
                   'pt' => 'Abolição da escravidão',
                   'cz' => 'Zrušení otroctví',
                   'jp' => '奴隷制度の廃止'
                ] )
                ->setValidRegions( [ 16 ] ),

      // 12-25 : Noël - 1st Christmas Holiday…
      Definition::Create( Identifiers::CHRISTMAS_DAY )
                ->setName( 'Noël' )
                ->setStaticDate( 12, 25 )
                ->setNameTranslations( [
                   'fr' => 'Noël',
                   'en' => 'Christmas Day',
                   'de' => '1. Weihnachtsfeiertag',
                   'it' => 'Natale',
                   'es' => 'Navidad',
                   'pt' => 'Natal do Senhor',
                   'cz' => '1. svátek vánoční',
                   'jp' => '1.クリスマス'
                ] ),

      // 12-26 : Lendemain de Noël - Boxing Day…
      Definition::Create( Identifiers::BOXING_DAY )
                ->setName( 'Lendemain de Noël' )
                ->setStaticDate( 12, 26 )
                ->setNameTranslations( [
                   'fr' => 'Lendemain de Noël',
                   'en' => 'Boxing Day',
                   'de' => '2. Weihnachtsfeiertag',
                   'it' => 'Santo Stefano',
                   'es' => 'Sant Esteve',
                   'pt' => '2. Dia de Natal',
                   'cz' => '2. svátek vánoční',
                   'jp' => '2.クリスマスの日'
                ] )
                ->setValidRegions( [ 8 ] )

   );

