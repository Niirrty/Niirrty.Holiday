<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 * @version        0.1.0alpha (AK47)
 */


use Niirrty\Holiday\Callbacks\NamedDateCallback;
use Niirrty\Holiday\DateMove\MoveCondition;
use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;
use Niirrty\Holiday\Identifiers;


return DefinitionCollection::Create( 'United Kingdom', 'uk' )
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
                           ->addRange(

                           // 01-01 New Year's Day
                               Definition::CreateNewYear( 'New Year\'s Day' )
                                   // move to next day if date is a sunday (England + Wales)
                                         ->addMoveCondition( MoveCondition::OnSunday( 1 )
                                                                          ->setAcceptedRegions( [ 1, 7 ] ) )
                                   // move 2 days in future if date is a saturday (England + Wales)
                                         ->addMoveCondition( MoveCondition::OnSaturday( 2 )
                                                                          ->setAcceptedRegions( [ 1, 7 ] ) )
                                   // Move 01-01 (New Years's Day) holiday to next tuesday if it was on a sunday (Scotland only)
                                         ->addMoveCondition( MoveCondition::OnSunday( 2 )->setAcceptedRegions( [ 6 ] ) )
                                   // Move 01-01 (New Years's Day) holiday to next tuesday if it was on a saturday (Scotland only)
                                         ->addMoveCondition( MoveCondition::OnSaturday( 3 )
                                                                          ->setAcceptedRegions( [ 6 ] ) )
                                         ->setNameTranslations( [
                                                                    'en' => 'New Year\'s Day',
                                                                    'de' => 'Neujahr',
                                                                    'fr' => 'Jour de l\'An',
                                                                    'it' => 'Capodanno',
                                                                    'es' => 'Año Nuevo',
                                                                    'pt' => 'Mãe de Deus',
                                                                    'cz' => 'Nový rok',
                                                                    'jp' => '元日',
                                                                ] ),


                               // 01-02 Scottish New Years's Day
                               Definition::Create( 'Scottish New Years\'s Day' )
                                         ->setStaticDate( 1, 2 )
                                         ->setName( 'Scottish New Years\'s Day' )
                                   // move to next day if date is a sunday
                                         ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                                   // move 2 days in future if date is a saturday
                                         ->addMoveCondition( MoveCondition::OnSaturday( 2 ) )
                                         ->setNameTranslations( [
                                                                    'en' => 'Scottish New Years\'s Day',
                                                                    'de' => 'Schottisches Neujahr',
                                                                    'fr' => 'Écossaise Nouvel an',
                                                                    'it' => 'Scottish nuovo anno',
                                                                    'es' => 'Scottish Año Nuevo',
                                                                    'pt' => 'Scottish Ano Novo',
                                                                    'cz' => 'Scottish Nový rok',
                                                                    'jp' => 'スコットランドの新年',
                                                                ] )
                                         ->setValidRegions( [ 6 ] ), // <- Scotland

                               // 03-17 : Saint Patrick's Day…
                               Definition::Create( Identifiers::SAINT_PATRICKS_DAY )
                                         ->setStaticDate( 3, 17 )
                                         ->setName( 'Saint Patrick\'s Day' )
                                   // move to next day if date is a sunday
                                         ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                                   // move 2 days in future if date is a saturday
                                         ->addMoveCondition( MoveCondition::OnSaturday( 2 ) )
                                         ->setNameTranslations( [
                                                                    'en' => 'Saint Patrick\'s Day',
                                                                    'de' => 'St. Patrick\'s Day',
                                                                    'fr' => 'Le jour de la Saint-Patrick',
                                                                    'it' => 'Giorno di San Patrizio',
                                                                    'es' => 'Día de San Patricio',
                                                                    'pt' => 'Dia de São Patrick',
                                                                    'cz' => 'Den svatého Patrika',
                                                                    'jp' => '聖パトリックの日',
                                                                ] )
                                         ->setValidRegions( [ 5 ] ), // <- North Ireland

                               // Good Friday (Easter sunday - 2 days)
                               Definition::CreateEasterDepending( Identifiers::GOOD_FRIDAY, -2 )
                                         ->setName( 'Good Friday' )
                                         ->setNameTranslations( [
                                                                    'en' => 'Good Friday',
                                                                    'de' => 'Karfreitag',
                                                                    'fr' => 'Vendredi Saint',
                                                                    'it' => 'Venerdì Santo',
                                                                    'es' => 'Viernes Santo',
                                                                    'pt' => 'Sexta-feira Santa',
                                                                    'cz' => 'Velký pátek',
                                                                    'jp' => '良い金曜日',
                                                                ] ),

                               // Easter Monday (Easter sunday + 1 day)
                               Definition::CreateEasterDepending( Identifiers::EASTER_MONDAY, 1 )
                                         ->setName( 'Easter Monday' )
                                         ->setNameTranslations( [
                                                                    'en' => 'Easter Monday',
                                                                    'de' => 'Ostermontag',
                                                                    'fr' => 'Lundi de Pâques',
                                                                    'it' => 'Pasquetta',
                                                                    'es' => 'Lunes de Pascua',
                                                                    'pt' => 'Feira de Páscoa',
                                                                    'cz' => 'Velikonoční pondělí',
                                                                    'jp' => '復活の月曜日',
                                                                ] ),

                               // Early May Bank Holiday - The 1st monday in mai
                               Definition::Create( 'Early May Bank Holiday' )
                                         ->setName( 'Early May Bank Holiday' )
                                         ->setDynamicDateCallback( new NamedDateCallback( 'first monday of may ' ) )
                                         ->setNameTranslations( [
                                                                    'en' => 'Early May Bank Holiday',
                                                                    'jp' => '月上旬バンクホリデー',
                                                                ] ),

                               // 05-09 : Liberation Day
                               Definition::Create( Identifiers::LIBERATION_DAY )
                                         ->setStaticDate( 5, 9 )
                                         ->setName( 'Liberation Day' )
                                         ->setNameTranslations( [
                                                                    'en' => 'Liberation Day',
                                                                    'de' => 'Tag der Befreiung',
                                                                    'fr' => 'Le jour de la libération',
                                                                    'it' => 'Giorno della liberazione',
                                                                    'es' => 'Día de la liberación',
                                                                    'pt' => 'Dia da libertação',
                                                                    'cz' => 'Den osvobození',
                                                                    'jp' => '独立記念日',
                                                                ] )
                                         ->setValidRegions( [ 2, 4 ] ), // <- Guernsey, Jersey


                               // Spring Bank Holiday - The last monday of mai
                               Definition::Create( 'Spring Bank Holiday' )
                                         ->setName( 'Spring Bank Holiday' )
                                         ->setDynamicDateCallback( new NamedDateCallback( 'last monday of may ' ) )
                                         ->setNameTranslations( [
                                                                    'en' => 'Spring Bank Holiday',
                                                                    'jp' => '春のバンクホリデー',
                                                                ] ),

                               // Tourist Trophy Senior Race Day - 2nd friday of june
                               Definition::Create( 'Tourist Trophy Senior Race Day' )
                                         ->setName( 'Tourist Trophy Senior Race Day' )
                                         ->setDynamicDateCallback( new NamedDateCallback( 'second friday of june ' ) )
                                         ->setNameTranslations( [
                                                                    'en' => 'Tourist Trophy Senior Race Day',
                                                                    'jp' => 'ツーリスト・トロフィーシニアレースの日',
                                                                ] )
                                         ->setValidRegions( [ 3 ] ), // <- Isle of Man


                               // 07-05 : Tynwald Day
                               Definition::Create( 'Tynwald Day' )
                                         ->setStaticDate( 7, 5 )
                                         ->setName( 'Tynwald Day' )
                                         ->setNameTranslations( [
                                                                    'en' => 'Tynwald Day',
                                                                    'de' => 'Tynwald Tag',
                                                                    'fr' => 'Jour Tynwald',
                                                                    'it' => 'Tynwald Giorno',
                                                                    'es' => 'Día tynwald',
                                                                    'pt' => 'Dia Tynwald',
                                                                    'cz' => 'Tynwald den',
                                                                    'jp' => 'ティンワルド日',
                                                                ] )
                                         ->setValidRegions( [ 3 ] ), // <- Isle of Man


                               // 07-12 : Battle of the Boyne
                               Definition::Create( 'Battle of the Boyne' )
                                         ->setStaticDate( 7, 12 )
                                         ->setName( 'Battle of the Boyne' )
                                   // move to next day if date is a sunday
                                         ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                                   // move 2 days in future if date is a saturday
                                         ->addMoveCondition( MoveCondition::OnSaturday( 2 ) )
                                         ->setNameTranslations( [
                                                                    'en' => 'Battle of the Boyne',
                                                                    'de' => 'Schlacht am Boyne',
                                                                    'fr' => 'Bataille de la Boyne',
                                                                    'it' => 'Battaglia del Boyne',
                                                                    'es' => 'Batalla del Boyne',
                                                                    'pt' => 'Batalha de Boyne',
                                                                    'cz' => 'Bitva u Boyne',
                                                                    'jp' => 'ボインの戦い',
                                                                ] )
                                         ->setValidRegions( [ 5 ] ), // <- North Ireland

                               // August Bank Holiday - 1st monday of august
                               Definition::Create( 'August Bank Holiday Scotland' )
                                         ->setName( 'August Bank Holiday' )
                                         ->setDynamicDateCallback( new NamedDateCallback( 'first monday of august ' ) )
                                         ->setNameTranslations( [
                                                                    'en' => 'August Bank Holiday',
                                                                    'jp' => '8月バンクホリデー',
                                                                ] )
                                         ->setValidRegions( [ 6 ] ), // <- Scotland


                               // August Bank Holiday - last monday of august
                               Definition::Create( 'August Bank Holiday' )
                                         ->setName( 'August Bank Holiday' )
                                         ->setDynamicDateCallback( new NamedDateCallback( 'last monday of august ' ) )
                                         ->setNameTranslations( [
                                                                    'en' => 'August Bank Holiday',
                                                                    'jp' => '8月バンクホリデー',
                                                                ] )
                                         ->setValidRegions( [ 1, 7 ] ), // <- England, Wales

                               // 12-15 : Homecoming Day
                               Definition::Create( 'Homecoming Day' )
                                         ->setStaticDate( 12, 15 )
                                         ->setName( 'Homecoming Day' )
                                         ->setNameTranslations( [
                                                                    'en' => 'Homecoming Day',
                                                                    'de' => 'Homecoming Day',
                                                                    'fr' => 'Accueil à venir Jour',
                                                                    'it' => 'Ritorno a casa Day',
                                                                    'es' => 'Día de regreso a casa',
                                                                    'pt' => 'Dia regresso a casa',
                                                                    'cz' => 'Home přichází den',
                                                                    'jp' => 'ホームカミングデー',
                                                                ] )
                                         ->setValidRegions( [ 0 ] ), // <- Alderney


                               // 12-25 : Christmas Day…
                               Definition::Create( Identifiers::CHRISTMAS_DAY )
                                         ->setStaticDate( 12, 25 )
                                         ->setName( 'Christmas Day' )
                                         ->addMoveCondition( MoveCondition::OnSunday( 2 ) )
                                         ->addMoveCondition( MoveCondition::OnSaturday( 3 ) )
                                         ->setNameTranslations( [
                                                                    'en' => 'Christmas Day',
                                                                    'de' => '1. Weihnachtsfeiertag',
                                                                    'fr' => 'Noël',
                                                                    'it' => 'Natale',
                                                                    'es' => 'Navidad',
                                                                    'pt' => 'Natal do Senhor',
                                                                    'cz' => '1. svátek vánoční',
                                                                    'jp' => '1.クリスマス',
                                                                ] )
                                         ->setValidRegions( [ 1, 2, 3, 4, 5, 6, 7 ] ),


                               // 12-26 : Boxing Day…
                               Definition::Create( Identifiers::BOXING_DAY )
                                         ->setStaticDate( 12, 26 )
                                         ->setName( 'Boxing Day' )
                                         ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                                         ->addMoveCondition( MoveCondition::OnSaturday( 2 ) )
                                         ->setNameTranslations( [
                                                                    'en' => 'Boxing Day',
                                                                    'de' => '2. Weihnachtsfeiertag',
                                                                    'fr' => 'Lendemain de Noël',
                                                                    'it' => 'Santo Stefano',
                                                                    'es' => 'Sant Esteve',
                                                                    'pt' => '2. Dia de Natal',
                                                                    'cz' => '2. svátek vánoční',
                                                                    'jp' => '2.クリスマスの日',
                                                                ] )


                           );
   

