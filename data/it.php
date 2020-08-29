<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


// TODO

use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;
use Niirrty\Holiday\Identifiers;


return DefinitionCollection::Create( 'Italia', 'it' )
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
                           ->addRange(

                           // 01-01 Capodanno - New Year
                               Definition::CreateNewYear( 'Capodanno' )
                                         ->setNameTranslations( [
                                                                    'it' => 'Capodanno',
                                                                    'en' => 'New Year',
                                                                    'fr' => 'Jour de l\'An',
                                                                    'de' => 'Neujahr',
                                                                    'es' => 'Año Nuevo',
                                                                    'pt' => 'Mãe de Deus',
                                                                    'cz' => 'Nový rok',
                                                                    'jp' => '元日',
                                                                ] ),

                               // 01-06 Epifania - Epiphany (Holy 3 kings) : …-1977 and 1985-…
                               Definition::Create( Identifiers::EPIPHANY )
                                         ->setName( 'Epifania' )
                                         ->setStaticDate( 1, 6 )
                                         ->setValidToYear( 1977 )
                                         ->setValidFromYear( 1985 )
                                         ->setNameTranslations( [
                                                                    'it' => 'Epifania',
                                                                    'en' => 'Epiphany',
                                                                    'fr' => 'Épiphanie',
                                                                    'de' => 'Heilige drei Könige',
                                                                    'es' => 'Epifanía',
                                                                    'pt' => 'Epifania',
                                                                    'cz' => 'Epiphany',
                                                                    'jp' => 'エピファニー',
                                                                ] ),

                               // Pasquetta - Easter Monday (Easter sunday + 1 day)
                               Definition::CreateEasterDepending( Identifiers::EASTER_MONDAY, 1 )
                                         ->setName( 'Pasquetta' )
                                         ->setNameTranslations( [
                                                                    'it' => 'Pasquetta',
                                                                    'en' => 'Easter Monday',
                                                                    'fr' => 'Lundi de Pâques',
                                                                    'de' => 'Ostermontag',
                                                                    'es' => 'Lunes de Pascua',
                                                                    'pt' => 'Feira de Páscoa',
                                                                    'cz' => 'Velikonoční pondělí',
                                                                    'jp' => '復活の月曜日',
                                                                ] ),

                               // 04-24 : Anniversario della Liberazione - 'Day of the liberation of Italy'
                               Definition::Create( 'Day of the liberation of Italy' )
                                         ->setName( 'Anniversario della Liberazione' )
                                         ->setStaticDate( 4, 24 )
                                         ->setNameTranslations( [
                                                                    'it' => 'Anniversario della Liberazione',
                                                                    'en' => 'Day of the liberation of Italy',
                                                                    'fr' => 'Jour de la libération de l\'Italie',
                                                                    'de' => 'Tag der Befreiung Italiens',
                                                                    'es' => 'Día de la liberación de Italia',
                                                                    'pt' => 'Dia da libertação da Itália',
                                                                    'cz' => 'Den osvobození Itálie',
                                                                    'jp' => 'イタリアの解放の日',
                                                                ] ),

                               // 05-01 : Festa del Lavoro - Labor Day
                               Definition::Create( Identifiers::LABOR_DAY )
                                         ->setName( 'Festa del Lavoro' )
                                         ->setStaticDate( 5, 1 )
                                         ->setNameTranslations( [
                                                                    'it' => 'Festa del Lavoro',
                                                                    'en' => 'Labor Day',
                                                                    'fr' => 'Fête du travail',
                                                                    'de' => 'Tag der Arbeit',
                                                                    'es' => 'Día laboral',
                                                                    'pt' => 'Dia de trabalho',
                                                                    'cz' => 'Svátek práce',
                                                                    'jp' => '労働者の日',
                                                                ] ),

                               // Ascensione di Cristo - Ascension of Christ (Easter sunday + 39 days) : …-1977
                               Definition::CreateEasterDepending( Identifiers::ASCENSION, 39 )
                                         ->setName( 'Ascensione di Cristo' )
                                         ->setValidToYear( 1977 )
                                         ->setNameTranslations( [
                                                                    'it' => 'Ascensione di Cristo',
                                                                    'en' => 'Ascension of Christ',
                                                                    'fr' => 'Ascension du Christ',
                                                                    'de' => 'Christi Himmelfahrt',
                                                                    'es' => 'Ascensión de Cristo',
                                                                    'pt' => 'Ascensão de Cristo',
                                                                    'cz' => 'Ascension of Christ',
                                                                    'jp' => 'キリストの昇天',
                                                                ] ),

                               // Lunedi di Pentecoste - Whit Monday (Easter sunday + 50 days)
                               Definition::CreateEasterDepending( Identifiers::WHIT_MONDAY, 50 )
                                         ->setName( 'Lunedi di Pentecoste' )
                                         ->setNameTranslations( [
                                                                    'it' => 'Lunedi di Pentecoste',
                                                                    'en' => 'Whit Monday',
                                                                    'fr' => 'lundi de Pentecôte',
                                                                    'de' => 'Pfingstmontag',
                                                                    'es' => 'Lunes de Pentecostés',
                                                                    'pt' => 'Whit segunda-feira',
                                                                    'cz' => 'Svatodušní pondělí',
                                                                    'jp' => '聖霊降臨祭の月曜日',
                                                                ] )
                                         ->setValidRegions( [ 15 ] ),

                               // 06-02 Festa della Repubblica - National Day
                               Definition::Create( Identifiers::NATIONAL_DAY )
                                         ->setName( 'Festa della Repubblica' )
                                         ->setStaticDate( 6, 2 )
                                         ->setNameTranslations( [
                                                                    'it' => '',
                                                                    'en' => 'National holiday',
                                                                    'fr' => 'Fête nationale',
                                                                    'de' => 'Nationalfeiertag',
                                                                    'es' => 'Fiesta nacional',
                                                                    'pt' => 'Feriado nacional',
                                                                    'cz' => 'Státní svátek',
                                                                    'jp' => '祝日',
                                                                ] ),

                               // 08-15: Giorno dell'assunzione - Assumption Day
                               Definition::Create( Identifiers::ASSUMPTION )
                                         ->setName( 'Giorno dell\'assunzione' )
                                         ->setStaticDate( 8, 15 )
                                         ->setNameTranslations( [
                                                                    'it' => 'Giorno dell\'assunzione',
                                                                    'en' => 'Assumption Day',
                                                                    'fr' => 'Fête de l\'Assomption',
                                                                    'de' => 'Mariä Himmelfahrt',
                                                                    'es' => 'Día de la Asunción',
                                                                    'pt' => 'Dia da Assunção',
                                                                    'cz' => 'Nanebevzetí Panny Marie',
                                                                    'jp' => '昇天の日',
                                                                ] ),

                               // 11-01 : Ognissanti - All Saints' Day…
                               Definition::Create( Identifiers::ALL_SAINTS )
                                         ->setName( 'Ognissanti' )
                                         ->setStaticDate( 11, 1 )
                                         ->setNameTranslations( [
                                                                    'it' => 'Ognissanti',
                                                                    'en' => 'All Saints\' Day',
                                                                    'fr', 'Fête de la Toussaint',
                                                                    'de', 'Allerheiligen',
                                                                    'es', 'Día de todos los Santos',
                                                                    'pt', 'Dia de Todos os Santos',
                                                                    'cz', 'Svátek Všech svatých',
                                                                    'jp', '諸聖人の祝日',
                                                                ] ),

                               // 12-08: Il concetto di Maria - Immaculate conception
                               Definition::Create( 'Immaculate conception' )
                                         ->setName( 'Il concetto di Maria' )
                                         ->setStaticDate( 12, 8 )
                                         ->setNameTranslations( [
                                                                    'it' => 'Il concetto di Maria',
                                                                    'en' => 'Immaculate conception',
                                                                    'fr' => 'La conception de Marie',
                                                                    'de' => 'Mariä Empfängnis',
                                                                    'es' => 'La concepción de María',
                                                                    'pt' => 'Conceito de Maria',
                                                                    'cz' => 'Mary pojetí',
                                                                    'jp' => 'メアリーの概念',
                                                                ] ),

                               // 12-25 : Natale - 1st Christmas Holiday…
                               Definition::Create( Identifiers::CHRISTMAS_DAY )
                                         ->setName( 'Natale' )
                                         ->setStaticDate( 12, 25 )
                                         ->setNameTranslations( [
                                                                    'it' => 'Natale',
                                                                    'en' => 'Christmas Day',
                                                                    'fr' => 'Noël',
                                                                    'de' => '1. Weihnachtsfeiertag',
                                                                    'es' => 'Navidad',
                                                                    'pt' => 'Natal do Senhor',
                                                                    'cz' => '1. svátek vánoční',
                                                                    'jp' => '1.クリスマス',
                                                                ] ),

                               // 12-26 : Santo Stefano - Boxing Day…
                               Definition::Create( Identifiers::BOXING_DAY )
                                         ->setName( 'Santo Stefano' )
                                         ->setStaticDate( 12, 26 )
                                         ->setNameTranslations( [
                                                                    'it' => 'Santo Stefano',
                                                                    'en' => 'Boxing Day',
                                                                    'fr' => 'Lendemain de Noël',
                                                                    'de' => '2. Weihnachtsfeiertag',
                                                                    'es' => 'Sant Esteve',
                                                                    'pt' => '2. Dia de Natal',
                                                                    'cz' => '2. svátek vánoční',
                                                                    'jp' => '2.クリスマスの日',
                                                                ] )


                           );

