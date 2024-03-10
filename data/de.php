<?php
/**
 * Includes now also none work free holidays
 *
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Callbacks\AdventDateCallback;
use Niirrty\Holiday\Callbacks\ModifyDateCallback;
use Niirrty\Holiday\Callbacks\NamedDateCallback;
use Niirrty\Holiday\Callbacks\SeasonDateCallback;
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
                                                                ] ),

                               // Weiberfastnacht (Easter sunday - 52 days)
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::CreateEasterDepending( 'Weiberfastnacht', -52 )
                                         ->setName( 'Weiberfastnacht' )
                                         ->setNameTranslations( [
                                                                    'de' => 'Weiberfastnacht',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // Carnival Saturday (Easter sunday - 50 days)
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::CreateEasterDepending( 'Carnival Saturday', -50 )
                                         ->setName( 'Fastnachtssamstag' )
                                         ->setNameTranslations( [
                                                                    'de' => 'Fastnachtssamstag',
                                                                    'en' => 'Carnival Saturday',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // Carnival Sunday (Easter sunday - 49 days)
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::CreateEasterDepending( 'Carnival Sunday', -49 )
                                         ->setName( 'Fastnachtssonntag' )
                                         ->setNameTranslations( [
                                                                    'de' => 'Fastnachtssonntag',
                                                                    'en' => 'Carnival Sunday',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // Rose-Monday (Easter sunday - 48 days)
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::CreateEasterDepending( 'Rose-Monday', -48 )
                                         ->setName( 'Rosenmontag' )
                                         ->setNameTranslations( [
                                                                    'de' => 'Rosenmontag',
                                                                    'en' => 'Rose-Monday',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // Carnival (Easter sunday - 47 days)
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::CreateEasterDepending( Identifiers::CARNIVAL, -47 )
                                         ->setName( 'Fastnacht' )
                                         ->setNameTranslations( [
                                                                    'de' => 'Fastnacht',
                                                                    'en' => 'Carnival',
                                                                    'fr' => 'Carnaval',
                                                                    'it' => 'Carnevale',
                                                                    'es' => 'Carnaval',
                                                                    'pt' => 'Carnaval',
                                                                    'cz' => 'Karneval',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // Aschermittwoch (Easter sunday - 46 days)
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::CreateEasterDepending( 'Aschermittwoch', -46 )
                                         ->setName( 'Aschermittwoch' )
                                         ->setNameTranslations( [
                                                                    'de' => 'Aschermittwoch',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 02-14 Valentinstag - Valentine's Day
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( Identifiers::VALENTINES_DAY )
                                         ->setName( 'Valentinstag' )
                                         ->setStaticDate( 2, 14 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Valentinstag',
                                                                    'en' => 'Valentine\'s Day',
                                                                    'fr' => 'Saint Valentin',
                                                                    'it' => 'San Valentino',
                                                                    'es' => 'Día de San valentín',
                                                                    'pt' => 'Dia dos Namorados',
                                                                    'cz' => 'Valentýna',
                                                                    'jp' => 'バレンタインデー',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 03-01 Frühlingsanfang meteorologisch - Early spring meteorological
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( Identifiers::EARLY_SPRING_METEO )
                                         ->setName( 'Frühlingsanfang meteorologisch' )
                                         ->setStaticDate( 3, 1 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Frühlingsanfang meteorologisch',
                                                                    'en' => 'Early spring meteorological',
                                                                    'fr' => 'Météorologie au début du printemps',
                                                                    'it' => 'All\'inizio della primavera meteorologica',
                                                                    'es' => 'Principios de la primavera meteorológica',
                                                                    'pt' => 'Início da primavera meteorológica',
                                                                    'cz' => 'Brzy jarní meteorologické',
                                                                    'jp' => '早春の気象',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 03-08 Internationaler Frauentag (Berlin) - International Womans day (Berlin)
                               // !-> ARBEITSFREI! - WORK-FREE!
                               Definition::Create( 'Woman\'s Day' )
                                         ->setName( 'Internationaler Frauentag' )
                                         ->setStaticDate( 3, 8 )
                                         ->setValidFromYear( 2019 )
                                         ->setValidRegions( [ 2 ] ) // "Berlin" only
                                         ->setNameTranslations( [
                                                                    'de' => 'Internationaler Frauentag',
                                                                    'en' => 'International Women\'s Day',
                                                                    'fr' => 'Journée internationale de la femme',
                                                                    'it' => 'Giornata internazionale della donna',
                                                                    'es' => 'Día Internacional de la Mujer',
                                                                    'pt' => 'Dia Internacional da Mulher',
                                                                    'cz' => 'Mezinárodní den žen',
                                                                    'jp' => '国際婦人デー',
                                                                ] )
                                         ->setIsRestDay( true ),


                               // 03-08 Internationaler Frauentag (MVP) - International Womans day (MVP)
                               // !-> ARBEITSFREI! - WORK-FREE!
                               Definition::Create( 'Woman\'s Day MVP' )
                                         ->setName( 'Internationaler Frauentag' )
                                         ->setStaticDate( 3, 8 )
                                         ->setValidFromYear( 2023 )
                                         ->setValidRegions( [ 7 ] ) // "Mecklenburg Vorpommern" only
                                         ->setNameTranslations( [
                                                                    'de' => 'Internationaler Frauentag',
                                                                    'en' => 'International Women\'s Day',
                                                                    'fr' => 'Journée internationale de la femme',
                                                                    'it' => 'Giornata internazionale della donna',
                                                                    'es' => 'Día Internacional de la Mujer',
                                                                    'pt' => 'Dia Internacional da Mulher',
                                                                    'cz' => 'Mezinárodní den žen',
                                                                    'jp' => '国際婦人デー',
                                                                ] )
                                         ->setIsRestDay( true ),

                               // Tag und Nachtgleiche März - Equinox March
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( Identifiers::EQUINOX_MARCH )
                                         ->setName( 'Tag-Nachtgleiche März' )
                                         ->setDynamicDateCallback(
                                             new SeasonDateCallback( SeasonDateCallback::TYPE_SPRING,
                                                                     SeasonDateCallback::HEMISPHERE_NORTH ) )
                                         ->setNameTranslations( [
                                                                    'de' => 'Tag-Nachtgleiche März',
                                                                    'en' => 'Equinox March',
                                                                    'fr' => 'Equinox Mars',
                                                                    'it' => 'Equinozio Marzo',
                                                                    'es' => 'Equinox March',
                                                                    'pt' => 'Equinócio de março',
                                                                    'cz' => 'Rovnice března',
                                                                    'jp' => 'エキノックスマーチ',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // Palmsonntag - Palm Sunday (Easter sunday - 7 days)
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::CreateEasterDepending( 'Palm Sunday', -7 )
                                         ->setName( 'Palmsonntag' )
                                         ->setNameTranslations( [
                                                                    'de' => 'Palmsonntag',
                                                                    'en' => 'Palm Sunday',
                                                                    'fr' => 'Dimanche des rameaux',
                                                                    'it' => 'Domenica delle Palme',
                                                                    'es' => 'Domingo de ramos',
                                                                    'pt' => 'Domingo de ramos',
                                                                    'cz' => 'Květná neděle',
                                                                    'jp' => '早春',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // Gründonnerstag - Holy Thursday (Easter sunday - 3 days)
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::CreateEasterDepending( 'Holy Thursday', -3 )
                                         ->setName( 'Gründonnerstag' )
                                         ->setNameTranslations( [
                                                                    'de' => 'Gründonnerstag',
                                                                    'en' => 'Holy Thursday',
                                                                    'fr' => 'jeudi Saint',
                                                                    'it' => 'Giovedi Santo',
                                                                    'es' => 'Jueves Santo',
                                                                    'pt' => 'Quinta-feira Santa',
                                                                    'cz' => 'Zelený čtvrtek',
                                                                    'jp' => '聖木曜日',
                                                                ] )
                                         ->setIsRestDay( false ),

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
                                                                    'jp' => '良い金曜日',
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
                                                                    'jp' => '復活の主日',
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
                                                                    'jp' => '復活の月曜日',
                                                                ] ),

                               // Begin Sommerzeit - DST Begin
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'DST Begin' )
                                         ->setName( 'Begin Sommerzeit' )
                                         ->setDynamicDateCallback( new NamedDateCallback( 'last sunday of march ' ) )
                                         ->setNameTranslations( [
                                                                    'de' => 'Begin Sommerzeit',
                                                                    'en' => 'DST Begin',
                                                                    'jp' => '夏時間が始まる',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 04-30: Walpurgisnacht - Walpurgis Night
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'Walpurgis Night' )
                                         ->setName( 'Walpurgisnacht' )
                                         ->setStaticDate( 4, 30 )
                                         ->setNameTranslations( [

                                                                    'de' => 'Walpurgisnacht',
                                                                    'en' => 'Walpurgis Night',
                                                                    'fr' => 'Nuit de Walpurgis',
                                                                    'it' => 'Notte di Valpurga',
                                                                    'es' => 'La noche de Walpurgis',
                                                                    'pt' => 'Noite de Walpurgis',
                                                                    'cz' => 'Pálení čarodějnic',
                                                                    'jp' => 'ヴァルプルギスの夜',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 05-01 : Tag der Arbeit - Labor 30
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
                                                                    'jp' => '労働者の日',
                                                                ] ),

                               // Muttertag - Mother's Day
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'Mother\'s Day' )
                                         ->setName( 'Muttertag' )
                                         ->setDynamicDateCallback( new NamedDateCallback( 'second sunday of may ' ) )
                                         ->setNameTranslations( [
                                                                    'de' => 'Muttertag',
                                                                    'en' => 'Mother\'s Day',
                                                                    'fr' => 'Fête des Mères',
                                                                    'it' => 'Festa della mamma',
                                                                    'es' => 'Día de la madre',
                                                                    'pt' => 'Dia das Mães',
                                                                    'cz' => 'Svátek matek',
                                                                    'jp' => '母の日',
                                                                ] )
                                         ->setIsRestDay( false ),

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
                                                                    'jp' => 'キリストの昇天',
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
                                                                    'jp' => 'ウィットサンデー',
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
                                                                    'jp' => '聖霊降臨祭の月曜日',
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
                                                                    'jp' => 'コーパスクリスティ',
                                                                ] ),

                               // 06-01: Sommeranfang meteorologisch - Summer beginning meteorological
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'Summer beginning - meteorological' )
                                         ->setName( 'Sommeranfang meteorologisch' )
                                         ->setStaticDate( 6, 1 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Sommeranfang meteorologisch',
                                                                    'en' => 'Summer beginning meteorological',
                                                                    'fr' => 'Été début météorologique',
                                                                    'it' => 'Inizio d\'estate meteorologico',
                                                                    'es' => 'Comienzo de verano meteorológico',
                                                                    'pt' => 'Verão começando meteorológico',
                                                                    'cz' => 'Léto začíná meteorologické',
                                                                    'jp' => '気象学的な夏の始まり',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 06-01: Kindertag - Children's Day
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'Children\'s Day' )
                                         ->setName( 'Kindertag' )
                                         ->setStaticDate( 6, 1 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Kindertag',
                                                                    'en' => 'Children\'s Day',
                                                                    'fr' => 'Journée des enfants',
                                                                    'it' => 'Giornata dei bambini',
                                                                    'es' => 'Día de los niños',
                                                                    'pt' => 'Dia das crianças',
                                                                    'cz' => 'Dětský den',
                                                                    'jp' => 'こどもの日',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 06-17: 17. Juni 1953 - June 17. 1953 …-1989
                               Definition::Create( 'June 17. 1953' )
                                         ->setName( '17. Juni 1953' )
                                         ->setStaticDate( 6, 17 )
                                         ->setValidFromYear( 1954 )
                                         ->setValidToYear( 1989 )
                                         ->setDescription( 'War früher in der BRD der "Tag der deutschen Einheit".' )
                                         ->setNameTranslations( [
                                                                    'de' => '17. Juni 1953',
                                                                    'en' => 'June 17. 1953',
                                                                    'fr' => '17 juin 1953',
                                                                    'it' => '17 giugno 1953',
                                                                    'es' => '17 de junio de 1953',
                                                                    'pt' => '17 de junho de 1953',
                                                                    'cz' => '17. června 1953',
                                                                    'jp' => '1953年6月17日',
                                                                ] ),

                               // Sommeranfang - Summer beginning
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'Summer beginning' )
                                         ->setName( 'Sommeranfang' )
                                         ->setDynamicDateCallback(
                                             new SeasonDateCallback( SeasonDateCallback::TYPE_SUMMER,
                                                                     SeasonDateCallback::HEMISPHERE_NORTH ) )
                                         ->setNameTranslations( [
                                                                    'de' => 'Sommeranfang',
                                                                    'en' => 'Summer beginning',
                                                                    'fr' => 'Été début météorologique',
                                                                    'it' => 'Inizio d\'estate meteorologico',
                                                                    'es' => 'Comienzo de verano meteorológico',
                                                                    'pt' => 'Verão começando meteorológico',
                                                                    'cz' => 'Léto začíná meteorologické',
                                                                    'jp' => '気象学的な夏の始まり',
                                                                ] )
                                         ->setIsRestDay( false ),

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
                                                                    'jp' => 'アウクスブルクハイ平和フェスティバル',
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
                                                                    'jp' => '昇天の日',
                                                                ] ),

                               // 09-01: Herbstanfang metereologisch - Autumn beginning meteorological
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'Autumn beginning - meteorological' )
                                         ->setName( 'Herbstanfang meteorologisch' )
                                         ->setStaticDate( 9, 1 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Herbstanfang meteorologisch',
                                                                    'en' => 'Autumn beginning meteorological',
                                                                    'fr' => 'Automne début météorologique',
                                                                    'it' => 'Autunno d\'inizio meteorologico',
                                                                    'es' => 'Otoño comienzo meteorológico',
                                                                    'pt' => 'Outono começando meteorológico',
                                                                    'cz' => 'Podzimní začátek meteorologické',
                                                                    'jp' => '秋に始まる気象',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // Tag und Nachtgleiche September - Equinox September
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( Identifiers::EQUINOX_SEPTEMBER )
                                         ->setName( 'Tag-Nachtgleiche September' )
                                         ->setDynamicDateCallback(
                                             new SeasonDateCallback( SeasonDateCallback::TYPE_AUTUMN,
                                                                     SeasonDateCallback::HEMISPHERE_NORTH ) )
                                         ->setNameTranslations( [
                                                                    'de' => 'Tag-Nachtgleiche September',
                                                                    'en' => 'Equinox September',
                                                                    'fr' => 'Equinox Septembre',
                                                                    'it' => 'Equinozio settembre',
                                                                    'es' => 'Equinox septiembre',
                                                                    'pt' => 'Equinócio de setembro',
                                                                    'cz' => 'Equinox září',
                                                                    'jp' => 'エキノックス9月号',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // Entedankfest - Thanksgiving
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'Thanksgiving' )
                                         ->setName( 'Entedankfest' )
                                         ->setDynamicDateCallback( new NamedDateCallback( 'first sunday of october ' ) )
                                         ->setNameTranslations( [
                                                                    'de' => 'Entedankfest',
                                                                    'en' => 'Thanksgiving',
                                                                    'fr' => 'Action de grâces',
                                                                    'it' => 'Ringraziamento',
                                                                    'es' => 'Acción de gracias',
                                                                    'pt' => 'Ação de graças',
                                                                    'cz' => 'Díkůvzdání',
                                                                    'jp' => '感謝祭',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 10-03: Tag der Deutschen Einheit - Day of German unity  1991-…
                               Definition::Create( 'Day of German unity' )
                                         ->setStaticDate( 10, 3 )
                                         ->setName( 'Tag der Deutschen Einheit' )
                                         ->setValidFromYear( 1990 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Tag der Deutschen Einheit',
                                                                    'en' => 'Day of German unity',
                                                                    'fr' => 'Journée de l\'unité allemande',
                                                                    'it' => 'Giorno dell\'Unità tedesca',
                                                                    'es' => 'Día de la Unidad Alemana',
                                                                    'pt' => 'Dia da Unidade Alemã',
                                                                    'cz' => 'Den německé jednoty',
                                                                    'jp' => 'ドイツ統一の日',
                                                                ] ),

                               // 10-20: Welt-Kindertag - World Children's Day
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'World Children\'s Day' )
                                         ->setName( 'Welt-Kindertag' )
                                         ->setStaticDate( 10, 20 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Welt-Kindertag',
                                                                    'en' => 'World Children\'s Day',
                                                                    'fr' => 'Journée mondiale des enfants',
                                                                    'it' => 'Giornata dei bambini del mondo',
                                                                    'es' => 'Día Mundial del Niño',
                                                                    'pt' => 'Dia Mundial da Criança',
                                                                    'cz' => 'Světový den dětí',
                                                                    'jp' => '世界子どもの日',
                                                                ] )
                                         ->setIsRestDay( false ),

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
                                                                    'jp' => '宗教改革記念日',
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
                                                                    'jp' => '諸聖人の祝日',
                                                                ] ),

                               // 11-02 :  Allerseelen - All Souls Day
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'All Souls Day' )
                                         ->setName( 'Allerseelen' )
                                         ->setStaticDate( 11, 2 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Allerseelen',
                                                                    'en' => 'All Souls Day',
                                                                    'fr' => 'La Toussaint',
                                                                    'it' => 'Giorno dei morti',
                                                                    'es' => 'Todo el día de almas',
                                                                    'pt' => 'Dia de todas as Almas',
                                                                    'cz' => 'Den duší',
                                                                    'jp' => 'すべての魂の日',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 11-11 :  Martinstag - Martinmas
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'Martinmas' )
                                         ->setName( 'Martinstag' )
                                         ->setStaticDate( 11, 11 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Martinstag',
                                                                    'en' => 'Martinmas',
                                                                    'fr' => 'Saint-Martin',
                                                                    'it' => 'Giorno di S. Martino',
                                                                    'es' => 'Día de San Martín',
                                                                    'pt' => 'Dia de São Martinho',
                                                                    'cz' => 'Svatého Martina',
                                                                    'jp' => 'すべての魂の日',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // Volkstrauertag - Memorial Day (2 Sonntage vor dem ersten Adventssonntag)
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'Memorial Day' )
                                         ->setName( 'Volkstrauertag' )
                                         ->setDynamicDateCallback( new AdventDateCallback( 1, -14 ) )
                                         ->setNameTranslations( [
                                                                    'de' => 'Volkstrauertag',
                                                                    'en' => 'Memorial Day',
                                                                    'cz' => 'Den památníku',
                                                                    'jp' => '記念日',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // Buß- und Bettag - Repentance Day - The wednesday before 11-23 (min: 11-16, max: 11-22)
                               Definition::Create( Identifiers::REPENTANCE_DAY )
                                         ->setName( 'Buß- und Bettag' )
                                         ->setDynamicDateCallback( new ModifyDateCallback( 11, 23, 'last wednesday' ) )
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
                                                                    'jp' => '悔い改めの日',
                                                                ] ),

                               // Totensonntag - Dead Sunday (1 Sonntag vor dem 1. Adventssonntag)
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'Dead Sunday' )
                                         ->setName( 'Totensonntag' )
                                         ->setDynamicDateCallback( new AdventDateCallback( 1, -7 ) )
                                         ->setNameTranslations( [
                                                                    'de' => 'Totensonntag',
                                                                    'en' => 'Dead Sunday',
                                                                    'fr' => 'Dimanche morts',
                                                                    'it' => 'Domenica Morto',
                                                                    'es' => 'Muerto el domingo',
                                                                    'pt' => 'Morto domingo',
                                                                    'cz' => 'Mrtvý neděli',
                                                                    'jp' => 'デッド日曜日',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 1. Advent - 1th Advent
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( '1th Advent' )
                                         ->setName( '1. Advent' )
                                         ->setDynamicDateCallback( new AdventDateCallback( 1 ) )
                                         ->setNameTranslations( [
                                                                    'de' => '1. Advent',
                                                                    'en' => '1th Advent',
                                                                    'fr' => '1er Avent',
                                                                    'it' => '1 ° Avvento',
                                                                    'pt' => '1º advento',
                                                                    'jp' => '第1の大幕',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 12-01: Winteranfang metereologisch - Winter beginning meteorological
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'Winter beginning - meteorological' )
                                         ->setName( 'Winteranfang meteorologisch' )
                                         ->setStaticDate( 12, 1 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Winteranfang meteorologisch',
                                                                    'en' => 'Winter beginning meteorological',
                                                                    'fr' => 'Hiver début météorologique',
                                                                    'it' => 'Inizio d\'inverno meteorologico',
                                                                    'es' => 'Invierno comenzando meteorológico',
                                                                    'pt' => 'Inverno começando meteorológico',
                                                                    'cz' => 'Zima začíná meteorologická',
                                                                    'jp' => '冬の始まりの気象',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 2. Advent - 2nd Advent
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( '2nd Advent' )
                                         ->setName( '2. Advent' )
                                         ->setDynamicDateCallback( new AdventDateCallback( 2 ) )
                                         ->setNameTranslations( [
                                                                    'de' => '2. Advent',
                                                                    'en' => '2th Advent',
                                                                    'fr' => '2er Avent',
                                                                    'it' => '2 ° Avvento',
                                                                    'pt' => '2º advento',
                                                                    'jp' => '2番目の大幕',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 12-06: Nikolaus - Nicholas
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'Nicholas' )
                                         ->setName( 'Nikolaus' )
                                         ->setStaticDate( 12, 6 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Nikolaus',
                                                                    'en' => 'Nicholas',
                                                                    'fr' => 'Nicholas',
                                                                    'jp' => 'ニコラス',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 3. Advent - 3rd Advent
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( '3rd Advent' )
                                         ->setName( '3. Advent' )
                                         ->setDynamicDateCallback( new AdventDateCallback( 3 ) )
                                         ->setNameTranslations( [
                                                                    'de' => '3. Advent',
                                                                    'en' => '3rd Advent',
                                                                    'fr' => '3er Avent',
                                                                    'it' => '3 ° Avvento',
                                                                    'pt' => '3º advento',
                                                                    'jp' => '3番目の大幕',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 4. Advent - 4rd Advent
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( '4rd Advent' )
                                         ->setName( '4. Advent' )
                                         ->setDynamicDateCallback( new AdventDateCallback( 4 ) )
                                         ->setNameTranslations( [
                                                                    'de' => '4. Advent',
                                                                    'en' => '4rd Advent',
                                                                    'fr' => '4er Avent',
                                                                    'it' => '4 ° Avvento',
                                                                    'pt' => '4º advento',
                                                                    'jp' => '4番目の大幕',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // Winteranfang - Winter beginning
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'Winter beginning' )
                                         ->setName( 'Winteranfang' )
                                         ->setDynamicDateCallback(
                                             new SeasonDateCallback( SeasonDateCallback::TYPE_WINTER,
                                                                     SeasonDateCallback::HEMISPHERE_NORTH ) )
                                         ->setNameTranslations( [
                                                                    'de' => 'Winteranfang',
                                                                    'en' => 'Winter beginning',
                                                                    'fr' => 'Début de l\'hiver',
                                                                    'it' => 'Inizio di inverno',
                                                                    'es' => 'Comienzo del invierno',
                                                                    'pt' => 'Começo do inverno',
                                                                    'cz' => 'Začátek zimy',
                                                                    'jp' => '立冬',
                                                                ] )
                                         ->setIsRestDay( false ),

                               // 12-24 : Heilig Abend - Holy Evening
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'Holy Evening' )
                                         ->setName( 'Heilig Abend' )
                                         ->setStaticDate( 12, 24 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Heilig Abend',
                                                                    'en' => 'Holy Evening',
                                                                    'fr' => 'Sainte soirée',
                                                                    'it' => 'Santa Sera',
                                                                    'es' => 'Noche Santa',
                                                                    'pt' => 'Noite santa',
                                                                    'cz' => 'Svatý večer',
                                                                    'jp' => '聖なる夕べ',
                                                                ] )
                                         ->setIsRestDay( false ),

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
                                                                    'jp' => '1.クリスマス',
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
                                                                    'jp' => '2.クリスマスの日',
                                                                ] ),

                               // 12-31 : Silvester - New Year's Eve
                               // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
                               Definition::Create( 'New Year\'s Eve' )
                                         ->setName( 'Silvester' )
                                         ->setStaticDate( 12, 31 )
                                         ->setNameTranslations( [
                                                                    'de' => 'Silvester',
                                                                    'en' => 'New Year\'s Eve',
                                                                    'fr' => 'Réveillon de Nouvel an',
                                                                    'it' => 'Vigilia di Capodanno',
                                                                    'es' => 'Vispera de Año Nuevo',
                                                                    'pt' => 'Véspera de Ano Novo',
                                                                    'cz' => 'Nový Rok',
                                                                    'jp' => '大晦日',
                                                                ] )
                                         ->setIsRestDay( false )

                           );

