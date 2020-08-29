<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\DateMove\MoveCondition;
use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;
use Niirrty\Holiday\Identifiers;


return DefinitionCollection::Create( 'Nederland', 'nl' )
                           ->setRegions( [] )
                           ->addRange(

                           // 01-01 Nieuwjaar - New Year
                               Definition::CreateNewYear( 'Nieuwjaar' )
                                         ->setNameTranslations( [
                                                                    'nl' => 'Nieuwjaar',
                                                                    'de' => 'Neujahr',
                                                                    'en' => 'New Year',
                                                                    'fr' => 'Jour de l\'An',
                                                                    'it' => 'Capodanno',
                                                                    'es' => 'Año Nuevo',
                                                                    'pt' => 'Mãe de Deus',
                                                                    'cz' => 'Nový rok',
                                                                    'jp' => '元日',
                                                                ] ),

                               // Goede Vrijdag - Good Friday (Easter sunday - 2 days)
                               Definition::CreateEasterDepending( Identifiers::GOOD_FRIDAY, -2 )
                                         ->setName( 'Goede Vrijdag' )
                                         ->setNameTranslations( [
                                                                    'nl' => 'Goede Vrijdag',
                                                                    'de' => 'Karfreitag',
                                                                    'en' => 'Good Friday',
                                                                    'fr' => 'Vendredi Saint',
                                                                    'it' => 'Venerdì Santo',
                                                                    'es' => 'Viernes Santo',
                                                                    'pt' => 'Sexta-feira Santa',
                                                                    'cz' => 'Velký pátek',
                                                                    'jp' => '良い金曜日',
                                                                ] ),

                               // Pasen - Easter Sunday…
                               Definition::CreateEasterDepending( Identifiers::EASTER_SUNDAY, 0 )
                                         ->setName( 'Pasen' )
                                         ->setNameTranslations( [
                                                                    'nl' => 'Pasen',
                                                                    'de' => 'Ostersonntag',
                                                                    'en' => 'Easter Sunday',
                                                                    'fr' => 'Dimanche de Pâques',
                                                                    'it' => 'Domenica di Pasqua',
                                                                    'es' => 'Domingo de Pascua',
                                                                    'pt' => 'Domingo de Páscoa',
                                                                    'cz' => 'Boží hod velikonoční',
                                                                    'jp' => '復活の主日',
                                                                ] ),

                               // Ostern - Easter Monday (Easter sunday + 1 day)
                               Definition::CreateEasterDepending( Identifiers::EASTER_MONDAY, 1 )
                                         ->setName( 'Ostern' )
                                         ->setNameTranslations( [
                                                                    'nl' => 'Ostern',
                                                                    'de' => 'Ostermontag',
                                                                    'en' => 'Easter Monday',
                                                                    'fr' => 'Lundi de Pâques',
                                                                    'it' => 'Pasquetta',
                                                                    'es' => 'Lunes de Pascua',
                                                                    'pt' => 'Feira de Páscoa',
                                                                    'cz' => 'Velikonoční pondělí',
                                                                    'jp' => '復活の月曜日',
                                                                ] ),

                               // 04-26 : Koningsdag - Kings Day
                               Definition::Create( 'Kings Day -2013' )
                                         ->setStaticDate( 4, 26 )
                                         ->setName( 'Koningsdag' )
                                         ->setValidToYear( 2013 )
                                         ->setNameTranslations( [
                                                                    'nl' => 'Koningsdag',
                                                                    'de' => 'Tag des Königs',
                                                                    'en' => 'Kings Day',
                                                                    'fr' => 'Jour du roi',
                                                                    'it' => 'Giorno del re',
                                                                    'es' => 'Día del rey',
                                                                    'pt' => 'Dia do rei',
                                                                    'cz' => 'Den krále',
                                                                    'jp' => '王の日',
                                                                ] ),

                               // 04-27 : Koningsdag - Kings Day
                               Definition::Create( 'Kings Day' )
                                         ->setStaticDate( 4, 27 )
                                         ->setName( 'Koningsdag' )
                                         ->setValidFromYear( 2014 )
                                         ->addMoveCondition( MoveCondition::OnSunday( -1 ) )
                                         ->setNameTranslations( [
                                                                    'nl' => 'Koningsdag',
                                                                    'de' => 'Tag des Königs',
                                                                    'en' => 'Kings Day',
                                                                    'fr' => 'Jour du roi',
                                                                    'it' => 'Giorno del re',
                                                                    'es' => 'Día del rey',
                                                                    'pt' => 'Dia do rei',
                                                                    'cz' => 'Den krále',
                                                                    'jp' => '王の日',
                                                                ] ),

                               // 05-04 : Nationale Dodenherdenking - Commemoration
                               Definition::Create( 'Commemoration' )
                                         ->setStaticDate( 5, 4 )
                                         ->setName( 'Nationale Dodenherdenking' )
                                         ->setNameTranslations( [
                                                                    'nl' => 'Nationale Dodenherdenking',
                                                                    'de' => 'Totengedenken',
                                                                    'en' => 'Commemoration',
                                                                    'fr' => 'Commémoration',
                                                                    'it' => 'Commemorazione',
                                                                    'es' => 'Conmemoración',
                                                                    'pt' => 'Comemoração',
                                                                    'cz' => 'Vzpomínková slavnost',
                                                                    'jp' => '記念',
                                                                ] ),

                               // 05-05 : Bevrijdingsdag - Liberation Day
                               Definition::Create( Identifiers::LIBERATION_DAY )
                                         ->setStaticDate( 5, 5 )
                                         ->setName( 'Bevrijdingsdag' )
                                         ->setNameTranslations( [
                                                                    'nl' => 'Bevrijdingsdag',
                                                                    'de' => 'Befreiungstag',
                                                                    'en' => 'Liberation Day',
                                                                    'fr' => 'Jour de la Libération',
                                                                    'it' => 'Giorno della liberazione',
                                                                    'es' => 'Día de la Liberación',
                                                                    'pt' => 'Dia da Libertação',
                                                                    'cz' => 'Den osvobození',
                                                                    'jp' => '解放の日',
                                                                ] ),

                               // Hemelvaartsdag - Ascension of Christ (Easter sunday + 39 days)
                               Definition::CreateEasterDepending( Identifiers::ASCENSION, 39 )
                                         ->setName( 'Hemelvaartsdag' )
                                         ->setNameTranslations( [
                                                                    'nl' => 'Hemelvaartsdag',
                                                                    'de' => 'Christi Himmelfahrt',
                                                                    'en' => 'Ascension of Christ',
                                                                    'fr' => 'Ascension du Christ',
                                                                    'it' => 'Ascensione di Cristo',
                                                                    'es' => 'Ascensión de Cristo',
                                                                    'pt' => 'Ascensão de Cristo',
                                                                    'cz' => 'Ascension of Christ',
                                                                    'jp' => 'キリストの昇天',
                                                                ] ),

                               // Eerste Pinksterdag - Whit Sunday (Easter sunday + 49 days)
                               Definition::CreateEasterDepending( Identifiers::WHIT_SUNDAY, 49 )
                                         ->setName( 'Eerste Pinksterdag' )
                                         ->setNameTranslations( [
                                                                    'nl' => 'Eerste Pinksterdag',
                                                                    'de' => 'Pfingstsonntag',
                                                                    'en' => 'Whit Sunday',
                                                                    'fr' => 'Whitsunday',
                                                                    'it' => 'Pentecoste',
                                                                    'es' => 'Domingo de Pentecostés',
                                                                    'pt' => 'Domingo de Pentecostes',
                                                                    'cz' => 'Whitsunday',
                                                                    'jp' => 'ウィットサンデー',
                                                                ] ),

                               // Zweede Pinksterdag - Whit Monday (Easter sunday + 50 days)
                               Definition::CreateEasterDepending( Identifiers::WHIT_MONDAY, 50 )
                                         ->setName( 'Zweede Pinksterdag' )
                                         ->setNameTranslations( [
                                                                    'nl' => 'Zweede Pinksterdag',
                                                                    'de' => 'Pfingstmontag',
                                                                    'en' => 'Whit Monday',
                                                                    'fr' => 'lundi de Pentecôte',
                                                                    'it' => 'Lunedi di Pentecoste',
                                                                    'es' => 'Lunes de Pentecostés',
                                                                    'pt' => 'Whit segunda-feira',
                                                                    'cz' => 'Svatodušní pondělí',
                                                                    'jp' => '聖霊降臨祭の月曜日',
                                                                ] ),

                               // 12-25 : 1e kerstvakantie - Christmas Day
                               Definition::Create( Identifiers::CHRISTMAS_DAY )
                                         ->setStaticDate( 12, 25 )
                                         ->setName( '1e kerstvakantie' )
                                         ->setNameTranslations( [
                                                                    'nl' => '1e kerstvakantie',
                                                                    'de' => '1. Weihnachtsfeiertag',
                                                                    'en' => 'Christmas Day',
                                                                    'fr' => 'Noël',
                                                                    'it' => 'Natale',
                                                                    'es' => 'Navidad',
                                                                    'pt' => 'Natal do Senhor',
                                                                    'cz' => '1. svátek vánoční',
                                                                    'jp' => '1.クリスマス',
                                                                ] ),

                               // 12-26 : 2e kerstvakantie - Boxing Day
                               Definition::Create( Identifiers::BOXING_DAY )
                                         ->setStaticDate( 12, 26 )
                                         ->setName( '2e kerstvakantie' )
                                         ->setNameTranslations( [
                                                                    'nl' => '2e kerstvakantie',
                                                                    'de' => '2. Weihnachtsfeiertag',
                                                                    'en' => 'Boxing Day',
                                                                    'fr' => 'Lendemain de Noël',
                                                                    'it' => 'Santo Stefano',
                                                                    'es' => 'Sant Esteve',
                                                                    'pt' => '2. Dia de Natal',
                                                                    'cz' => '2. svátek vánoční',
                                                                    'jp' => '2.クリスマスの日',
                                                                ] )

                           );

