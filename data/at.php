<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;
use Niirrty\Holiday\Identifiers;
use Niirrty\Holiday\Callbacks\SeasonDateCallback;
use Niirrty\Holiday\Callbacks\NamedDateCallback;
use Niirrty\Holiday\Callbacks\AdventDateCallback;


return DefinitionCollection::Create( 'Österreich', 'de' )

   ->setRegions(
      [
         'Burgenland',                 // 0
         'Kärnten',                    // 1
         'Niederösterreich',           // 2
         'Oberösterreich',             // 3
         'Land Salzburg',              // 4
         'Steiermark',                 // 5
         'Tirol',                      // 6
         'Vorarlberg',                 // 7
         'Wien'                        // 8
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

      // 01-06 Heilige Drei Könige - Epiphany (Holy 3 kings)
      Definition::Create( Identifiers::EPIPHANY )
                ->setStaticDate( 1, 6 )
                ->setName( 'Heilige Drei Könige' )
                ->setNameTranslations( [
                   'de' => 'Heilige Drei Könige',
                   'en' => 'Epiphany',
                   'fr' => 'Épiphanie',
                   'it' => 'Epifania',
                   'es' => 'Epifanía',
                   'pt' => 'Epifania',
                   'cz' => 'Epiphany',
                   'jp' => 'エピファニー'
                ] ),

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
                                          'jp' => 'カーニバル'
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
                                          'jp' => 'バレンタインデー'
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
                                          'jp' => '早春の気象'
                                       ] )
                ->setIsRestDay( false ),

      // 03-19 : Josef - Joseph of Nazareth
      Definition::Create( 'Joseph of Nazareth' )
                ->setStaticDate( 3, 19 )
                ->setName( 'Josef' )
                ->setDescription( 'Betrifft oft nur Schulen, Ämter und Behörden.' )
                ->setValidRegions( [ 1, 5, 6, 7 ] )
                ->setNameTranslations( [
                   'de' => 'Josef',
                   'en' => 'Joseph of Nazareth',
                   'fr' => 'Joseph de Nazareth',
                   'it' => 'Giuseppe di Nazaret',
                   'es' => 'José de Nazaret',
                   'pt' => 'José de Nazaré',
                   'cz' => 'Joseph z Nazaretu',
                   'jp' => 'ナザレのヨセフ'
                ] ),

      // Tag und Nachtgleiche März - Equinox March
      // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
      Definition::Create( Identifiers::EQUINOX_MARCH )
                ->setName( 'Tag-Nachtgleiche März' )
                ->setDynamicDateCallback(
                   new SeasonDateCallback( SeasonDateCallback::TYPE_SPRING, SeasonDateCallback::HEMISPHERE_NORTH ) )
                ->setNameTranslations( [
                                          'de' => 'Tag-Nachtgleiche März',
                                          'en' => 'Equinox March',
                                          'fr' => 'Equinox Mars',
                                          'it' => 'Equinozio Marzo',
                                          'es' => 'Equinox March',
                                          'pt' => 'Equinócio de março',
                                          'cz' => 'Rovnice března',
                                          'jp' => 'エキノックスマーチ'
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
                                          'jp' => '早春'
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
                                          'jp' => '聖木曜日'
                                       ] )
                ->setIsRestDay( false ),

      // Karfreitag - Good Friday (Easter sunday - 2 days)
      Definition::CreateEasterDepending( Identifiers::GOOD_FRIDAY, -2 )
                ->setName( 'Karfreitag' )
                ->setDescription(
                  'Feiertag nach Arbeitsruhegesetz nur für Angehörige der Evangelischen Kirche A.B., Evangelischen' .
                  'Kirche H.B., der Altkatholischen Kirche und der Evangelisch-methodistischen Kirche.' )
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
      // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
      Definition::CreateEasterDepending( Identifiers::EASTER_SUNDAY, 0 )
                ->setName( 'Ostersonntag' )
                ->setNameTranslations( [
                                          'de' => 'Ostersonntag',
                                          'en' => 'Easter Sunday',
                                          'fr' => 'Dimanche de Pâques',
                                          'it' => 'Domenica di Pasqua',
                                          'es' => 'Domingo de Pascua',
                                          'pt' => 'Domingo de Páscoa',
                                          'cz' => 'Boží hod velikonoční',
                                          'jp' => '復活の主日'
                                       ] )
                ->setIsRestDay( false ),

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

      // Begin Sommerzeit - DST Begin
      // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
      Definition::Create( 'DST Begin' )
                ->setName( 'Begin Sommerzeit' )
                ->setDynamicDateCallback( new NamedDateCallback( 'last sunday of march ' ) )
                ->setNameTranslations( [
                                          'de' => 'Begin Sommerzeit',
                                          'en' => 'DST Begin',
                                          'jp' => '夏時間が始まる'
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
                                          'jp' => 'ヴァルプルギスの夜'
                                       ] )
                ->setIsRestDay( false ),

      // 05-01 : Staatsfeiertag - State day
      Definition::Create( 'State Day' )
                ->setStaticDate( 5, 1 )
                ->setName( 'Staatsfeiertag' )
                ->setNameTranslations( [
                   'de' => 'Staatsfeiertag',
                   'en' => 'National holiday',
                   'fr' => 'Fête nationale',
                   'it' => 'Festa nazionale',
                   'es' => 'Fiesta nacional',
                   'pt' => 'Feriado nacional',
                   'cz' => 'Státní svátek',
                   'jp' => '祭日'
                ] ),

      // 05-04 : Florian - Saint Florian
      Definition::Create( 'Saint Florian' )
                ->setStaticDate( 5, 4 )
                ->setDescription(
                   '(Florian von Lorch) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
                ->setValidRegions( [ 3 ] )
                ->setNameTranslations( [
                   'de' => 'Florian',
                   'en' => 'Saint Florian',
                   'fr' => 'Saint Florian',
                   'it' => 'San Floriano',
                   'es' => 'San Florián',
                   'pt' => 'São Floriano',
                   'cz' => 'Saint Florian',
                   'jp' => '聖フロリアン'
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
                                          'jp' => '母の日'
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
                   'jp' => 'キリストの昇天'
                ] ),

      // Pfingstsonntag - Whit Sunday (Easter sunday + 49 days)
      // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
      Definition::CreateEasterDepending( Identifiers::WHIT_SUNDAY, 49 )
                ->setName( 'Pfingstsonntag' )
                ->setNameTranslations( [
                                          'de' => 'Pfingstsonntag',
                                          'en' => 'Whit Sunday',
                                          'fr' => 'Whitsunday',
                                          'it' => 'Pentecoste',
                                          'es' => 'Domingo de Pentecostés',
                                          'pt' => 'Domingo de Pentecostes',
                                          'cz' => 'Whitsunday',
                                          'jp' => 'ウィットサンデー'
                                       ] )
                ->setNameTranslations( [
                                          'de' => 'Muttertag',
                                          'en' => 'Mother\'s Day',
                                          'fr' => 'Fête des Mères',
                                          'it' => 'Festa della mamma',
                                          'es' => 'Día de la madre',
                                          'pt' => 'Dia das Mães',
                                          'cz' => 'Svátek matek',
                                          'jp' => '母の日'
                                       ] )
                ->setIsRestDay( false ),

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
                                          'jp' => '気象学的な夏の始まり'
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
                                          'jp' => 'こどもの日'
                                       ] )
                ->setIsRestDay( false ),

      // Sommeranfang - Summer beginning
      // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
      Definition::Create( 'Summer beginning' )
                ->setName( 'Sommeranfang' )
                ->setDynamicDateCallback(
                   new SeasonDateCallback( SeasonDateCallback::TYPE_SUMMER, SeasonDateCallback::HEMISPHERE_NORTH ) )
                ->setNameTranslations( [
                                          'de' => 'Sommeranfang',
                                          'en' => 'Summer beginning',
                                          'fr' => 'Été début météorologique',
                                          'it' => 'Inizio d\'estate meteorologico',
                                          'es' => 'Comienzo de verano meteorológico',
                                          'pt' => 'Verão começando meteorológico',
                                          'cz' => 'Léto začíná meteorologické',
                                          'jp' => '気象学的な夏の始まり'
                                       ] )
                ->setIsRestDay( false ),

      // 08-15 : Mariä Himmelfahrt - Assumption Day
      Definition::Create( Identifiers::ASSUMPTION )
                ->setStaticDate( 8, 15 )
                ->setName( 'Mariä Himmelfahrt' )
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
                                          'jp' => '秋に始まる気象'
                                       ] )
                ->setIsRestDay( false ),

      // Tag und Nachtgleiche September - Equinox September
      // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
      Definition::Create( Identifiers::EQUINOX_SEPTEMBER )
                ->setName( 'Tag-Nachtgleiche September' )
                ->setDynamicDateCallback(
                   new SeasonDateCallback( SeasonDateCallback::TYPE_AUTUMN, SeasonDateCallback::HEMISPHERE_NORTH ) )
                ->setNameTranslations( [
                                          'de' => 'Tag-Nachtgleiche September',
                                          'en' => 'Equinox September',
                                          'fr' => 'Equinox Septembre',
                                          'it' => 'Equinozio settembre',
                                          'es' => 'Equinox septiembre',
                                          'pt' => 'Equinócio de setembro',
                                          'cz' => 'Equinox září',
                                          'jp' => 'エキノックス9月号'
                                       ] )
                ->setIsRestDay( false ),

      // 09-24 : Rupert - Rupert of Salzburg
      Definition::Create( 'Rupert of Salzburg' )
                ->setStaticDate( 9, 24 )
                ->setName( 'Rupert' )
                ->setDescription(
                   '(Rupert von Salzburg) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
                ->setValidRegions( [ 4 ] )
                ->setNameTranslations( [
                   'de' => 'Rupert',
                   'en' => 'Rupert of Salzburg',
                   'fr' => 'Rupert de Salzbourg',
                   'it' => 'Rupert di Salisburgo',
                   'es' => 'Ruperto de Salzburgo',
                   'pt' => 'Rupert de Salzburg',
                   'cz' => 'Rupert Salcburku',
                   'jp' => 'ザルツブルクのルパート'
                ] ),

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
                                          'jp' => '感謝祭'
                                       ] )
                ->setIsRestDay( false ),

      // 10-10 : Tag der Volksabstimmung - Day of referendum
      Definition::Create( 'Day of referendum' )
                ->setStaticDate( 10, 10 )
                ->setName( 'Tag der Volksabstimmung' )
                ->setNameTranslations( [
                   'de' => 'Tag der Volksabstimmung',
                   'en' => 'Day of referendum',
                   'fr' => 'Jour de référendum',
                   'it' => 'Giorno del referendum',
                   'es' => 'Día del referéndum',
                   'pt' => 'Dia de referendo',
                   'cz' => 'Den referenda',
                   'jp' => '国民投票の日'
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
                                          'jp' => '世界子どもの日'
                                       ] )
                ->setIsRestDay( false ),

      // 10-26 : Nationalfeiertag - National Day
      Definition::Create( Identifiers::NATIONAL_DAY )
                ->setStaticDate( 10, 26 )
                ->setName( 'Nationalfeiertag' )
                ->setNameTranslations( [
                   'de' => 'Nationalfeiertag',
                   'en' => 'National holiday',
                   'fr' => 'Fête nationale',
                   'it' => 'Festa nazionale',
                   'es' => 'Feriado nacional',
                   'pt' => 'Dia de referendo',
                   'cz' => 'Státní svátek',
                   'jp' => '祭日'
                ] ),

      // 11-01 : Allerheiligen -All Saints' Day
      Definition::Create( Identifiers::ALL_SAINTS )
                ->setStaticDate( 11, 1 )
                ->setName( 'Allerheiligen' )
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

      // 11-11 : Martin - Martin of Tours
      Definition::Create( 'Martin of Tours' )
                ->setStaticDate( 11, 11 )
                ->setName( 'Martin' )
                ->setDescription(
                   '(Martin von Tours) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
                ->setValidRegions( [ 0 ] )
                ->setNameTranslations( [
                   'de' => 'Martin',
                   'en' => 'Martin of Tours',
                   'fr' => 'Martin de Tours',
                   'it' => 'Martino di Tours',
                   'es' => 'Martín de Tours',
                   'pt' => 'Martin de Tours',
                   'cz' => 'Martin z Tours',
                   'jp' => 'トゥールのマルティヌス'
                ] ),

      // Volkstrauertag - Memorial Day (2 Sonntage vor dem ersten Adventssonntag)
      // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
      Definition::Create( 'Memorial Day' )
                ->setName( 'Volkstrauertag' )
                ->setDynamicDateCallback( new AdventDateCallback( 1, -14 ) )
                ->setNameTranslations( [
                                          'de' => 'Volkstrauertag',
                                          'en' => 'Memorial Day',
                                          'cz' => 'Den památníku',
                                          'jp' => '記念日'
                                       ] )
                ->setIsRestDay( false ),

      // 11-15 : Leopold III.
      Definition::Create( 'Leopold III.' )
                ->setStaticDate( 11, 15 )
                ->setName( 'Leopold III.' )
                ->setDescription(
                   '(Leopold III.) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
                ->setValidRegions( [ 2, 8 ] )
                ->setNameTranslations( [
                   'de' => 'Leopold III.',
                   'jp' => 'レオポルドIII。'
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
                                          'jp' => 'デッド日曜日'
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
                                          'jp' => '冬の始まりの気象'
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
                                          'jp' => '第1の大幕'
                                       ] )
                ->setIsRestDay( false ),

      // 12-08 : Mariä Empfängnis - Immaculate conception
      Definition::Create( 'Immaculate conception' )
                ->setStaticDate( 12, 8 )
                ->setName( 'Mariä Empfängnis' )
                ->setDescription(
                  'Wenn der 8. Dezember auf einen Werktag fällt, dürfen Arbeitnehmer zu besonderen Bedingungen in ' .
                  'Verkaufsstellen beschäftigt werden.' )
                ->setNameTranslations( [
                   'de' => 'Mariä Empfängnis',
                   'en' => 'Immaculate conception',
                   'fr' => 'Immaculée conception',
                   'it' => 'Immacolata concezione',
                   'es' => 'Inmaculada concepción',
                   'pt' => 'Concepção imaculada',
                   'cz' => 'Neposkvrněné početí',
                   'jp' => '無原罪懐胎'
                ] ),

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
                                          'jp' => '2番目の大幕'
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
                                          'jp' => 'ニコラス'
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
                                          'jp' => '3番目の大幕'
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
                                          'jp' => '4番目の大幕'
                                       ] )
                ->setIsRestDay( false ),

      // Winteranfang - Winter beginning
      // !-> NICHT ARBEITSFREI! - NOT WORK-FREE!
      Definition::Create( 'Winter beginning' )
                ->setName( 'Winteranfang' )
                ->setDynamicDateCallback(
                   new SeasonDateCallback( SeasonDateCallback::TYPE_WINTER, SeasonDateCallback::HEMISPHERE_NORTH ) )
                ->setNameTranslations( [
                                          'de' => 'Winteranfang',
                                          'en' => 'Winter beginning',
                                          'fr' => 'Début de l\'hiver',
                                          'it' => 'Inizio di inverno',
                                          'es' => 'Comienzo del invierno',
                                          'pt' => 'Começo do inverno',
                                          'cz' => 'Začátek zimy',
                                          'jp' => '立冬'
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
                                          'jp' => '聖なる夕べ'
                                       ] )
                ->setIsRestDay( false ),

      // 12-25 : 1. Weihnachtsfeiertag - Christmas Day
      Definition::Create( Identifiers::CHRISTMAS_DAY )
                ->setStaticDate( 12, 25 )
                ->setName( 'Christtag' )
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
                ->setName( 'Stefanitag' )
                ->setNameTranslations( [
                   'de' => '2. Weihnachtsfeiertag',
                   'en' => 'Boxing Day',
                   'fr' => 'Lendemain de Noël',
                   'it' => 'Santo Stefano',
                   'es' => 'Sant Esteve',
                   'pt' => '2. Dia de Natal',
                   'cz' => '2. svátek vánoční',
                   'jp' => '2.クリスマスの日'
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
                                          'jp' => '大晦日'
                                       ] )
                ->setIsRestDay( false )

   );

