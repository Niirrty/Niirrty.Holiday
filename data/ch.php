<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;
use Niirrty\Holiday\Identifiers;


return DefinitionCollection::Create( 'Schweiz', 'de' )
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
                           ->addRange(

                           // 01-01 Neujahrstag - New Year
                               Definition::CreateNewYear( 'Neujahrstag' )
                                         ->setNameTranslations( [
                                                                    'de' => 'Neujahrstag',
                                                                    'en' => 'New Year',
                                                                    'fr' => 'Jour de l\'An',
                                                                    'it' => 'Capodanno',
                                                                    'es' => 'Año Nuevo',
                                                                    'pt' => 'Mãe de Deus',
                                                                    'cz' => 'Nový rok',
                                                                    'jp' => '元日',
                                                                ] ),

                               // 01-02 Berchtoldstag - Berchtold
                               Definition::Create( 'Berchtold' )
                                         ->setStaticDate( 1, 2 )
                                         ->setName( 'Berchtoldstag' )
                                         ->setValidRegions( [ 0, 1, 2, 5, 7, 8, 9, 10, 13, 17, 19, 21, 23, 24, 25 ] )
                                         ->setNameTranslations( [
                                                                    'de' => 'Berchtoldstag',
                                                                    'jp' => 'ベルヒトルト',
                                                                ] ),

                               // 01-06 Heilige drei Könige - Epiphany (Holy 3 kings)
                               Definition::Create( Identifiers::EPIPHANY )
                                         ->setStaticDate( 1, 6 )
                                         ->setName( 'Heilige drei Könige' )
                                         ->setValidRegions( [ 3, 4, 17, 20 ] )
                                         ->setNameTranslations( [
                                                                    'de' => 'Heilige drei Könige',
                                                                    'en' => 'Epiphany',
                                                                    'fr' => 'Épiphanie',
                                                                    'it' => 'Epifania',
                                                                    'es' => 'Epifanía',
                                                                    'pt' => 'Epifania',
                                                                    'cz' => 'Epiphany',
                                                                    'jp' => 'エピファニー',
                                                                ] ),

                               // 03-19 Josefstag - St. Joseph's
                               Definition::Create( 'St. Joseph\'s' )
                                         ->setStaticDate( 3, 19 )
                                         ->setName( 'Josefstag' )
                                         ->setValidRegions( [ 2, 3, 4, 6, 8, 17, 20, 22 ] )
                                         ->setNameTranslations( [
                                                                    'de' => 'Josefstag',
                                                                    'en' => 'St. Joseph\'s',
                                                                    'fr' => 'Saint-Joseph',
                                                                    'it' => 'San Giuseppe',
                                                                    'es' => 'San José',
                                                                    'pt' => 'São José',
                                                                    'cz' => 'St. Joseph je',
                                                                    'jp' => 'セントジョセフ',
                                                                ] ),

                               // Karfreitag - Good Friday (Easter sunday - 2 days)
                               Definition::CreateEasterDepending( Identifiers::GOOD_FRIDAY, -2 )
                                         ->setName( 'Karfreitag' )
                                         ->setValidRegions( range( 0, 19 ) )
                                         ->addValidRegions( 21, 23, 24, 25 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Karfreitag',
                                                                    'en' => 'Good Friday',
                                                                    'fr' => 'Vendredi Saint',
                                                                    'it' => 'Venerdì Santo',
                                                                    'es' => 'Viernes Santo',
                                                                    'pt' => 'Sexta-feira Santa',
                                                                    'cz' => 'Velký pátek',
                                                                    'jp' => '良い金曜日',
                                                                ] ),

                               // Ostermontag - Easter Monday (Easter sunday + 1 day)
                               Definition::CreateEasterDepending( Identifiers::EASTER_MONDAY, 1 )
                                         ->setName( 'Ostermontag' )
                                         ->setValidRegions( range( 0, 21 ) )
                                         ->addValidRegions( 23, 24, 25 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Ostermontag',
                                                                    'en' => 'Easter Monday',
                                                                    'fr' => 'Lundi de Pâques',
                                                                    'it' => 'Pasquetta',
                                                                    'es' => 'Lunes de Pascua',
                                                                    'pt' => 'Feira de Páscoa',
                                                                    'cz' => 'Velikonoční pondělí',
                                                                    'jp' => '復活の月曜日',
                                                                ] ),

                               // 05-01 : Tag der Arbeit - Day of work…
                               Definition::Create( Identifiers::LABOR_DAY )
                                         ->setStaticDate( 5, 1 )
                                         ->setName( 'Tag der Arbeit' )
                                         ->setValidRegions( [ 0, 9, 10, 11, 12, 13, 18, 19, 20, 23, 25 ] )
                                         ->setNameTranslations( [
                                                                    'de' => 'Tag der Arbeit',
                                                                    'en' => 'Labor Day',
                                                                    'fr' => 'Fête du travail',
                                                                    'it' => 'Festa dei lavoratori',
                                                                    'es' => 'Día laboral',
                                                                    'pt' => 'Dia de trabalho',
                                                                    'cz' => 'Svátek práce',
                                                                    'jp' => '労働者の日',
                                                                ] ),

                               // Auffahrt - Ascension of Christ (Easter sunday + 39 days)
                               Definition::CreateEasterDepending( Identifiers::ASCENSION, 39 )
                                         ->setName( 'Auffahrt' )
                                         ->setNameTranslations( [
                                                                    'de' => 'Auffahrt',
                                                                    'en' => 'Ascension of Christ',
                                                                    'fr' => 'Ascension du Christ',
                                                                    'it' => 'Ascensione di Cristo',
                                                                    'es' => 'Ascensión de Cristo',
                                                                    'pt' => 'Ascensão de Cristo',
                                                                    'cz' => 'Ascension of Christ',
                                                                    'jp' => 'キリストの昇天',
                                                                ] ),

                               // Pfingstmontag - Whit Monday (Easter sunday + 50 days)
                               Definition::CreateEasterDepending( Identifiers::WHIT_MONDAY, 50 )
                                         ->setName( 'Pfingstmontag' )
                                         ->setValidRegions( range( 0, 21 ) )
                                         ->addValidRegions( 23, 24, 25 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Pfingstmontag',
                                                                    'en' => 'Whit Monday',
                                                                    'fr' => 'lundi de Pentecôte',
                                                                    'it' => 'Lunedi di Pentecoste',
                                                                    'es' => 'Lunes de Pentecostés',
                                                                    'pt' => 'Whit segunda-feira',
                                                                    'cz' => 'Svatodušní pondělí',
                                                                    'jp' => '聖霊降臨祭の月曜日',
                                                                ] ),

                               // Fronleichnam - Corpus Christi (Easter sunday + 60 days)
                               Definition::CreateEasterDepending( Identifiers::CORPUS_CHRISTI, 60 )
                                         ->setName( 'Fronleichnam' )
                                         ->setValidRegions( [ 2, 3, 4, 5, 6, 8, 9, 10, 12, 15, 17, 18, 20, 22, 23, 25 ] )
                                         ->setNameTranslations( [
                                                                    'de' => 'Fronleichnam',
                                                                    'en' => 'Corpus Christi',
                                                                    'fr' => 'Fête-Dieu',
                                                                    'it' => 'Corpus Domini',
                                                                    'es' => 'Corpus Cristi',
                                                                    'pt' => 'corpo de Deus',
                                                                    'cz' => 'Corpus Christi',
                                                                    'jp' => 'コーパスクリスティ',
                                                                ] ),

                               // 08-01 Bundesfeier - National Day celebration
                               Definition::Create( Identifiers::NATIONAL_DAY )
                                         ->setStaticDate( 8, 1 )
                                         ->setName( 'Bundesfeier' )
                                         ->setNameTranslations( [
                                                                    'de' => 'Bundesfeier',
                                                                    'en' => 'National Day celebration',
                                                                    'fr' => 'Fête nationale',
                                                                    'it' => 'Giornata nazionale celebrazione',
                                                                    'es' => 'Celebración del Día nacional',
                                                                    'pt' => 'Celebração do Dia nacional',
                                                                    'cz' => 'Národní den oslavy',
                                                                    'jp' => 'ナショナルデーのお祝い',
                                                                ] ),

                               // 08-15: Mariä Himmelfahrt - Assumption Day
                               Definition::Create( Identifiers::ASSUMPTION )
                                         ->setStaticDate( 8, 15 )
                                         ->setName( 'Mariä Himmelfahrt' )
                                         ->setValidRegions( [ 2, 3, 4, 5, 6, 8, 9, 10, 12, 15, 17, 18, 20, 22, 25 ] )
                                         ->setNameTranslations( [
                                                                    'de' => 'Mariä Himmelfahrt',
                                                                    'en' => 'Assumption Day',
                                                                    'fr' => 'fête de l\'Assomption',
                                                                    'it' => 'Giorno dell\'assunzione',
                                                                    'es' => 'Día de la Asunción',
                                                                    'pt' => 'Dia da Assunção',
                                                                    'cz' => 'Nanebevzetí Panny Marie',
                                                                    'jp' => '昇天の日',
                                                                ] ),

                               // 11-01 : Allerheiligen - All Saints' Day
                               Definition::Create( Identifiers::ALL_SAINTS )
                                         ->setStaticDate( 11, 1 )
                                         ->setName( 'Allerheiligen' )
                                         ->setValidRegions( [ 2, 3, 4, 5, 6, 7, 8, 9, 10, 15, 16, 17, 18, 20, 22, 25 ] )
                                         ->setNameTranslations( [
                                                                    'de' => 'Allerheiligen',
                                                                    'en' => 'All Saints\' Day',
                                                                    'fr', 'Fête de la Toussaint',
                                                                    'it', 'Ognissanti',
                                                                    'es', 'Día de todos los Santos',
                                                                    'pt', 'Dia de Todos os Santos',
                                                                    'cz', 'Svátek Všech svatých',
                                                                    'jp', '諸聖人の祝日',
                                                                ] ),

                               // 12-08: Mariä Empfängnis - Immaculate conception
                               Definition::Create( 'Immaculate conception' )
                                         ->setStaticDate( 12, 8 )
                                         ->setName( 'Mariä Empfängnis' )
                                         ->setValidRegions( [ 2, 3, 4, 5, 6, 8, 9, 10, 15, 17, 18, 20, 22 ] )
                                         ->setNameTranslations( [
                                                                    'de' => 'Mariä Empfängnis',
                                                                    'en' => 'Immaculate conception',
                                                                    'fr' => 'La conception de Marie',
                                                                    'it' => 'Il concetto di Maria',
                                                                    'es' => 'La concepción de María',
                                                                    'pt' => 'Conceito de Maria',
                                                                    'cz' => 'Mary pojetí',
                                                                    'jp' => 'メアリーの概念',
                                                                ] ),

                               // 12-25 : Weihnachtstag - 1st Christmas Day
                               Definition::Create( Identifiers::CHRISTMAS_DAY )
                                         ->setStaticDate( 12, 25 )
                                         ->setName( 'Weihnachtstag' )
                                         ->setNameTranslations( [
                                                                    'de' => 'Weihnachtstag',
                                                                    'en' => 'Christmas Day',
                                                                    'fr' => 'Noël',
                                                                    'it' => 'Natale',
                                                                    'es' => 'Navidad',
                                                                    'pt' => 'Natal do Senhor',
                                                                    'cz' => '1. svátek vánoční',
                                                                    'jp' => '1.クリスマス',
                                                                ] ),

                               // 12-26 : Stephanstag - Boxing Day
                               Definition::Create( Identifiers::BOXING_DAY )
                                         ->setStaticDate( 12, 26 )
                                         ->setName( 'Stephanstag' )
                                         ->setValidRegions( range( 0, 20 ) )
                                         ->setNameTranslations( [
                                                                    'de' => 'Stephanstag',
                                                                    'en' => 'Boxing Day',
                                                                    'fr' => 'Lendemain de Noël',
                                                                    'it' => 'Santo Stefano',
                                                                    'es' => 'Sant Esteve',
                                                                    'pt' => '2. Dia de Natal',
                                                                    'cz' => '2. svátek vánoční',
                                                                    'jp' => '2.クリスマスの日',
                                                                ] )

                           );

