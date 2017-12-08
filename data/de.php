<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;
use Niirrty\Holiday\Identifiers;


return DefinitionCollection::Create( 'Deutschland', 'de' )

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

      // 01-01 Neujahr - New Year
      Definition::CreateNewYear( 'Neujahr' )
                ->setNameTranslations( [
                   'de' => 'Neujahr',
                   'en' => 'New Year',
                   'fr' => 'Jour de l\'An',
                   'it' => 'Capodanno',
                   'es' => 'Año Nuevo',
                   'pt' => 'Mãe de Deus',
                   'cz' => 'Nový rok',
                   'jp' => '元日'
                ] ),

      // 01-06 Heilige drei Könige - Epiphany (Holy 3 kings)
      Definition::Create( Identifiers::EPIPHANY )
                ->setName( 'Heilige drei Könige / Erscheinungsfest' )
                ->setStaticDate( 1, 6 )
                ->setValidRegions( [ 0, 1, 46 ] )
                ->setNameTranslations( [
                   'de' => 'Heilige drei Könige',
                   'en' => 'Epiphany',
                   'fr' => 'Épiphanie',
                   'it' => 'Epifania',
                   'es' => 'Epifanía',
                   'pt' => 'Epifania',
                   'cz' => 'Epiphany',
                   'jp' => 'エピファニー'
                ] ),

      // Karfreitag - Good Friday (Easter sunday - 2 days)
      Definition::CreateEasterDepending( Identifiers::GOOD_FRIDAY, -2 )
                ->setName( 'Karfreitag' )
                ->setNameTranslations( [
                   'de' => 'Karfreitag',
                   'en' => 'Good Friday',
                   'fr' => 'Vendredi Saint',
                   'it' => 'Venerdì Santo',
                   'es' => 'Viernes Santo',
                   'pt' => 'Sexta-feira Santa',
                   'cz' => 'Velký pátek',
                   'jp' => '良い金曜日'
                ] ),

      // Ostersonntag - Easter Sunday…
      Definition::CreateEasterDepending( Identifiers::EASTER_SUNDAY, 0 )
                ->setName( 'Ostersonntag' )
                ->setValidRegions( [ 3, 6 ] )
                ->setNameTranslations( [
                   'de' => 'Ostersonntag',
                   'en' => 'Easter Sunday',
                   'fr' => 'Dimanche de Pâques',
                   'it' => 'Domenica di Pasqua',
                   'es' => 'Domingo de Pascua',
                   'pt' => 'Domingo de Páscoa',
                   'cz' => 'Boží hod velikonoční',
                   'jp' => '復活の主日'
                ] ),

      // Ostermontag - Easter Monday (Easter sunday + 1 day)
      Definition::CreateEasterDepending( Identifiers::EASTER_MONDAY, 1 )
                ->setName( 'Ostermontag' )
                ->setNameTranslations( [
                   'de' => 'Ostermontag',
                   'en' => 'Easter Monday',
                   'fr' => 'Lundi de Pâques',
                   'it' => 'Pasquetta',
                   'es' => 'Lunes de Pascua',
                   'pt' => 'Feira de Páscoa',
                   'cz' => 'Velikonoční pondělí',
                   'jp' => '復活の月曜日'
                ] ),

      // 05-01 : Tag der Arbeit - Labor Day
      Definition::Create( Identifiers::LABOR_DAY )
                ->setStaticDate( 5, 1 )
                ->setName( 'Erster Mai / Tag der Arbeit' )
                ->setNameTranslations( [
                   'de' => 'Erster Mai / Tag der Arbeit',
                   'en' => 'Labor Day',
                   'fr' => 'Fête du travail',
                   'it' => 'Festa dei lavoratori',
                   'es' => 'Día laboral',
                   'pt' => 'Dia de trabalho',
                   'cz' => 'Svátek práce',
                   'jp' => '労働者の日'
                ] ),

      // Christi Himmelfahrt - Ascension of Christ (Easter sunday + 39 days)
      Definition::CreateEasterDepending( Identifiers::ASCENSION, 39 )
                ->setName( 'Christi Himmelfahrt' )
                ->setNameTranslations( [
                   'de' => 'Christi Himmelfahrt',
                   'en' => 'Ascension of Christ',
                   'fr' => 'Ascension du Christ',
                   'it' => 'Ascensione di Cristo',
                   'es' => 'Ascensión de Cristo',
                   'pt' => 'Ascensão de Cristo',
                   'cz' => 'Ascension of Christ',
                   'jp' => 'キリストの昇天'
                ] ),

      // Pfingstsonntag - Whit Sunday (Easter sunday + 49 days)
      Definition::CreateEasterDepending( Identifiers::WHIT_SUNDAY, 49 )
                ->setName( 'Pfingstsonntag' )
                ->setValidRegions( [ 3, 6 ] )
                ->setNameTranslations( [
                   'de' => 'Pfingstsonntag',
                   'en' => 'Whit Sunday',
                   'fr' => 'Whitsunday',
                   'it' => 'Pentecoste',
                   'es' => 'Domingo de Pentecostés',
                   'pt' => 'Domingo de Pentecostes',
                   'cz' => 'Whitsunday',
                   'jp' => 'ウィットサンデー'
                ] ),

      // Pfingstmontag - Whit Monday (Easter sunday + 50 days)
      Definition::CreateEasterDepending( Identifiers::WHIT_MONDAY, 50 )
                ->setName( 'Pfingstmontag' )
                ->setNameTranslations( [
                   'de' => 'Pfingstmontag',
                   'en' => 'Whit Monday',
                   'fr' => 'lundi de Pentecôte',
                   'it' => 'Lunedi di Pentecoste',
                   'es' => 'Lunes de Pentecostés',
                   'pt' => 'Whit segunda-feira',
                   'cz' => 'Svatodušní pondělí',
                   'jp' => '聖霊降臨祭の月曜日'
                ] ),

      // Fronleichnam - Corpus Christi (Easter sunday + 60 days)
      Definition::CreateEasterDepending( Identifiers::CORPUS_CHRISTI, 60 )
                ->setName( 'Fronleichnam' )
                ->setValidRegions( [ 6, 9, 10, 11 ] )
                ->addValidRegionsRange( 16, 46 )
                ->setNameTranslations( [
                   'de' => 'Fronleichnam',
                   'en' => 'Corpus Christi',
                   'fr' => 'Fête-Dieu',
                   'it' => 'Corpus Domini',
                   'es' => 'Corpus Cristi',
                   'pt' => 'corpo de Deus',
                   'cz' => 'Corpus Christi',
                   'jp' => 'コーパスクリスティ'
                ] ),

      // 08-08: Augsburger Hohes Friedensfest - Augsburg High Peace Festival
      Definition::Create( 'Augsburg High Peace Festival' )
                ->setStaticDate( 8, 8 )
                ->setName( 'Augsburger Hohes Friedensfest' )
                ->setValidRegions( [ 45 ] )
                ->setNameTranslations( [
                   'de' => 'Augsburger Hohes Friedensfest',
                   'en' => 'Augsburg High Peace Festival',
                   'fr' => 'Augsburg Festival de Haute Paix',
                   'it' => 'Festival High Peace Augsburg',
                   'es' => 'Festival Superior de la Paz de Augsburgo',
                   'pt' => 'Festival alta Paz Augsburg',
                   'cz' => 'Augsburg Festival High Peace',
                   'jp' => 'アウクスブルクハイ平和フェスティバル'
                ] ),

      // 08-15: Mariä Himmelfahrt - Assumption Day
      Definition::Create( Identifiers::ASSUMPTION )
                ->setStaticDate( 8, 15 )
                ->setName( 'Mariä Himmelfahrt' )
                ->setValidRegions( [ 46, 11 ] )
                ->setNameTranslations( [
                   'de' => 'Mariä Himmelfahrt',
                   'en' => 'Assumption Day',
                   'fr' => 'fête de l\'Assomption',
                   'it' => 'Giorno dell\'assunzione',
                   'es' => 'Día de la Asunción',
                   'pt' => 'Dia da Assunção',
                   'cz' => 'Nanebevzetí Panny Marie',
                   'jp' => '昇天の日'
                ] ),

      // 10-03: Tag der Deutschen Einheit - Day of German unity
      Definition::Create( 'Day of German unity' )
                ->setStaticDate( 10, 3 )
                ->setName( 'Tag der Deutschen Einheit' )
                ->setNameTranslations( [
                   'de' => 'Tag der Deutschen Einheit',
                   'en' => 'Day of German unity',
                   'fr' => 'Journée de l\'unité allemande',
                   'it' => 'Giorno dell\'Unità tedesca',
                   'es' => 'Día de la Unidad Alemana',
                   'pt' => 'Dia da Unidade Alemã',
                   'cz' => 'Den německé jednoty',
                   'jp' => 'ドイツ統一の日'
                ] ),

      // 10-31: Reformationstag - Reformation Day
      Definition::Create( Identifiers::REFORMATION_DAY )
                ->setStaticDate( 10, 31 )
                ->setName( 'Reformationstag' )
                ->setValidRegions( [ 0, 3, 6, 7, 9, 11, 12, 13 ] )
                ->addValidRegionsRange( 15, 44 )
                ->setNameTranslations( [
                   'de' => 'Reformationstag',
                   'en' => 'Reformation Day',
                   'fr' => 'Fête de la Réformation',
                   'it' => 'Festa della Riforma',
                   'es' => 'Dia da Reforma',
                   'pt' => 'Día de la Reforma',
                   'cz' => 'Den reformace',
                   'jp' => '宗教改革記念日'
                ] ),

      // 11-01 : Allerheiligen - All Saints' Day
      Definition::Create( Identifiers::ALL_SAINTS )
                ->setStaticDate( 11, 1 )
                ->setName( 'Allerheiligen' )
                ->setValidRegions( [ 0, 1, 9, 10, 11, 45, 46 ] )
                ->setNameTranslations( [
                   'de' => 'Allerheiligen',
                   'en' => 'All Saints\' Day',
                   'fr' => 'Fête de la Toussaint',
                   'it' => 'Ognissanti',
                   'es' => 'Día de todos los Santos',
                   'pt' => 'Dia de Todos os Santos',
                   'cz' => 'Svátek Všech svatých',
                   'jp' => '諸聖人の祝日'
                ] ),

      // Buß- und Bettag - Repentance Day - The wednesday before 11-23 (min: 11-16, max: 11-22)
      Definition::Create( Identifiers::REPENTANCE_DAY )
                ->setName( 'Buß- und Bettag' )
                ->setDynamicDateCallback( function( $year ) {
                   return Niirrty\Date\DateTime::Parse(
                      ( new \DateTime( $year . '-11-23' ) )->modify( 'last wednesday' )
                   );
                } )
                ->setValidRegions( [ 12 ] )
                ->addValidRegionsRange( 16, 31 )
                ->setNameTranslations( [
                   'de' => 'Buß- und Bettag',
                   'en' => 'Repentance Day',
                   'fr' => 'jour repentance',
                   'it' => 'pentimento Giorno',
                   'es' => 'Día arrepentimiento',
                   'pt' => 'Dia arrependimento',
                   'cz' => 'Den pokání',
                   'jp' => '悔い改めの日'
                ] ),

      // 12-25 : 1. . Weihnachtsfeiertag - Christmas Day
      Definition::Create( Identifiers::CHRISTMAS_DAY )
                ->setStaticDate( 12, 25 )
                ->setName( '1. Weihnachtsfeiertag' )
                ->setNameTranslations( [
                   'de' => '1. Weihnachtsfeiertag',
                   'en' => 'Christmas Day',
                   'fr' => 'Noël',
                   'it' => 'Natale',
                   'es' => 'Navidad',
                   'pt' => 'Natal do Senhor',
                   'cz' => '1. svátek vánoční',
                   'jp' => '1.クリスマス'
                ] ),

      // 12-26 : 2. Weihnachtsfeiertag - Boxing Day
      Definition::Create( Identifiers::BOXING_DAY )
                ->setStaticDate( 12, 26 )
                ->setName( '2. Weihnachtsfeiertag' )
                ->setNameTranslations( [
                   'de' => '2. Weihnachtsfeiertag',
                   'en' => 'Boxing Day',
                   'fr' => 'Lendemain de Noël',
                   'it' => 'Santo Stefano',
                   'es' => 'Sant Esteve',
                   'pt' => '2. Dia de Natal',
                   'cz' => '2. svátek vánoční',
                   'jp' => '2.クリスマスの日'
                ] )

   );

