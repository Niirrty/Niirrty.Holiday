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
use Niirrty\Date\DateTime;


$isSunday = function ( \DateTimeInterface $date ) : bool
{
   return 0 === ( (int) $date->format( 'w' ) );
};


return DefinitionCollection::Create( '日本', 'jp' )

   ->setRegions( [] )

   ->addRange(

      // 01-01 New Year's Day
      Definition::CreateNewYear( '元日' )
                ->setStaticDate( 1, 1 )
                ->setDescription( 'ganjitsu' )
                // is only valid if is NOT on a sunday => otherwise move to next day
                ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                ->setNameTranslations( [
                   'jp' => '元日',
                   'de' => 'Neujahr',
                   'fr' => 'Jour de l\'An',
                   'it' => 'Capodanno',
                   'es' => 'Año Nuevo',
                   'pt' => 'Mãe de Deus',
                   'cz' => 'Nový rok',
                   'en' => 'New Year\'s Day'
                ] ),

      // The 2nd monday in january (valid since year 2000) : seijin no hi- 成人の日
      Definition::Create( 'Coming of Age Day' )
                ->setName( '成人の日' )
                ->setDescription( 'Seijin no Hi' )
                ->setDynamicDateCallback( function( $year ) {
                   return new DateTime( 'second monday of january ' . $year );
                } )
                ->setValidFromYear( 2000 )
                ->setNameTranslations( [
                   'jp' => '成人の日',
                   'de' => 'Tag der Mündigkeitserklärung',
                   'fr' => 'Le jour de l\'accès à la majorité',
                   'it' => 'Giorno di cessazione',
                   'es' => 'Día de terminación',
                   'pt' => 'Dia da rescisão',
                   'cz' => 'Den ukončení',
                   'en' => 'Coming of Age Day'
                ] ),

      // 01-15 (valid between years 1948 and 1999) : seijin no hi- 成人の日
      Definition::Create( 'Coming of Age Day' )
                ->setName( '成人の日' )
                ->setDescription( 'Seijin no Hi' )
                ->setStaticDate( 1, 15 )
                ->setValidFromYear( 1948 )
                ->setValidToYear( 1999 )
                ->setNameTranslations( [
                   'jp' => '成人の日',
                   'de' => 'Tag der Mündigkeitserklärung',
                   'fr' => 'Le jour de l\'accès à la majorité',
                   'it' => 'Giorno di cessazione',
                   'es' => 'Día de terminación',
                   'pt' => 'Dia da rescisão',
                   'cz' => 'Den ukončení',
                   'en' => 'Coming of Age Day'
                ] ),

      // 02-11 : kenkoku-kinen no hi - 建国記念の日
      Definition::Create( 'Feast day of the founding of the state' )
                ->setName( '建国記念の日' )
                ->setDescription( 'kenkoku-kinen no hi' )
                ->setStaticDate( 2, 11 )
                // is only valid if is NOT on a sunday => otherwise move to next day
                ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                ->setValidFromYear( 1966 )
                ->setNameTranslations( [
                   'jp' => '建国記念の日',
                   'de' => 'Gedenktag der Staatsgründung',
                   'fr' => 'Fête de la fondation de l\'Etat',
                   'it' => 'Festa della fondazione dello stato',
                   'es' => 'Fiesta de la fundación del estado',
                   'pt' => 'Festa da fundação do estado',
                   'cz' => 'Svátek byl založen stát',
                   'en' => 'Feast day of the founding of the state'
                ] ),

      // 03-21 : shunbun no hi - 春分の日
      Definition::Create( 'Early spring' )
                ->setName( '春分の日' )
                ->setDescription( 'shunbun no hi' )
                ->setStaticDate( 3, 21 )
                // is only valid if is NOT on a sunday => otherwise move to next day
                ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                ->setNameTranslations( [
                   'jp' => '春分の日',
                   'de' => 'Frühlingsanfang',
                   'fr' => 'Début du printemps',
                   'it' => 'All\'inizio della primavera',
                   'es' => 'Principios de la primavera',
                   'pt' => 'Início da primavera',
                   'cz' => 'Brzy na jaře',
                   'en' => 'Early spring'
                ] ),

      // 04-29 : shōwa no hi - 昭和の日 - …-1988 and 2007-…
      Definition::Create( 'Shōwa day' )
                ->setName( '昭和の日' )
                ->setDescription( 'shōwa no hi' )
                ->setStaticDate( 4, 29 )
                ->setValidToYear( 1988 )
                ->setValidFromYear( 2007 )
                // is only valid if is NOT on a sunday => otherwise move to next day
                ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                ->setNameTranslations( [
                   'jp' => '昭和の日',
                   'de' => 'Shōwa-Tag',
                   'fr' => 'Jour de Shōwa',
                   'it' => 'Shōwa giorno',
                   'es' => 'Día de Showa',
                   'pt' => 'Dia Shōwa',
                   'cz' => 'Shōwa den',
                   'en' => 'Shōwa day'
                ] ),

      // 04-29 : midori no hi - みどりの日 - 1989-2006
      Definition::Create( 'Day of the green' )
                ->setName( 'みどりの日' )
                ->setDescription( 'midori no hi' )
                ->setStaticDate( 4, 29 )
                ->setValidFromYear( 1989 )
                ->setValidToYear( 2006 )
                // is only valid if is NOT on a sunday => otherwise move to next day
                ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                ->setNameTranslations( [
                   'jp' => 'みどりの日',
                   'de' => 'Tag des Grünens',
                   'fr' => 'Jour du vert',
                   'it' => 'Giorno del verde',
                   'es' => 'Día del verde',
                   'pt' => 'Dia do verde',
                   'cz' => 'Den zelených',
                   'en' => 'Day of the green'
                ] ),

      // 05-03 : kenpō kinenbi - 憲法記念日
      Definition::Create( 'Constitution Memorial Day' )
                ->setName( '憲法記念日' )
                ->setDescription( 'kenpō kinenbi' )
                ->setStaticDate( 5, 3 )
                ->setValidFromYear( 1948 )
                // is only valid if is NOT on a sunday => otherwise move to next day
                ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                ->setNameTranslations( [
                   'jp' => '憲法記念日',
                   'de' => 'Verfassungsgedenktag',
                   'fr' => 'Constitution Memorial Day',
                   'it' => 'Costituzione Memorial Day',
                   'es' => 'Memorial Day Constitución',
                   'pt' => 'Constitution Memorial Day',
                   'cz' => 'Constitution Memorial Day',
                   'en' => 'Constitution Memorial Day'
                ] ),

      // 05-04 | 05-05 : midori no hi - みどりの日 - 2007-…
      Definition::Create( 'Day of the green' )
                ->setName( 'みどりの日' )
                ->setDescription( 'midori no hi' )
                ->setStaticDate( 5, 4 )
                ->setValidFromYear( 2007 )
                // is only valid if is NOT on a sunday => otherwise move to next day
                ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                ->setNameTranslations( [
                   'jp' => 'みどりの日',
                   'de' => 'Tag des Grünens',
                   'fr' => 'Jour du vert',
                   'it' => 'Giorno del verde',
                   'es' => 'Día del verde',
                   'pt' => 'Dia do verde',
                   'cz' => 'Den zelených',
                   'en' => 'Day of the green'
                ] ),

      // 05-05 | 05-06 : Child's day - kodomo no hi - こどもの日
      Definition::Create( 'Child\'s day' )
                ->setName( 'こどもの日' )
                ->setDescription( 'kodomo no hi' )
                ->setStaticDate( 5, 5 )
                // is only valid if is NOT on a sunday => otherwise move to next day
                ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                ->setNameTranslations( [
                   'jp' => 'こどもの日',
                   'de' => 'Tag des Kindes',
                   'fr' => 'Jour de l\'enfant',
                   'it' => 'La giornata dei bambini',
                   'es' => 'Día del niño',
                   'pt' => 'Dia da criança',
                   'cz' => 'Den dítěte',
                   'en' => 'Child\'s day'
                ] ),

      // The 3rd monday in july : umi no hi- 海の日
      Definition::Create( 'Day of the sea' )
                ->setName( '海の日' )
                ->setDescription( 'umi no hi' )
                ->setDynamicDateCallback( function( $year ) {
                   return new DateTime( 'third monday of july ' . $year );
                } )
                ->setValidFromYear( 1996 )
                ->setNameTranslations( [
                   'jp' => '海の日',
                   'de' => 'Tag des Meeres',
                   'fr' => 'Jour de la mer',
                   'it' => 'Giorno del mare',
                   'es' => 'Día del mar',
                   'pt' => 'Dia do mar',
                   'cz' => 'Den moře',
                   'en' => 'Day of the sea'
                ] ),

      // 08-11 : yama no hi - 山の日
      Definition::Create( 'Day of the mountain' )
                ->setStaticDate( 8, 11 )
                ->setName( '山の日' )
                ->setDescription( 'yama no hi' )
                ->setValidFromYear( 2016 )
                // is only valid if is NOT on a sunday => otherwise move to next day
                ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                ->setNameTranslations( [
                   'jp' => '山の日',
                   'de' => 'Tag des Berges',
                   'fr' => 'Jour de la montagne',
                   'it' => 'Giorno della montagna',
                   'es' => 'Día de la montaña',
                   'pt' => 'Dia da montanha',
                   'cz' => 'Den hory',
                   'en' => 'Day of the mountain'
                ] ),

      // The 3rd monday of september beginning with year 2003 : taiiku no hi- 敬老の日
      Definition::Create( 'Day of honor of the ancients' )
                ->setName( '敬老の日' )
                ->setDescription( 'keirō no hi' )
                ->setDynamicDateCallback( function( $year ) {
                   return new DateTime( 'third monday of september ' . $year );
                } )
                ->setValidFromYear( 2003 )
                ->setNameTranslations( [
                   'jp' => '敬老の日',
                   'de' => 'Tag der Ehrung der Alten',
                   'fr' => 'Jour d\'honneur des anciens',
                   'it' => 'Giorno d\'onore degli antichi',
                   'es' => 'Día de honor de los antiguos',
                   'pt' => 'Dia de honra dos antigos',
                   'cz' => 'Den cti starších',
                   'en' => 'Day of honor of the ancients'
                ] ),

      // 09-15 beginning with year 1966 up to 2002 : taiiku no hi- 敬老の日
      Definition::Create( 'Day of honor of the ancients' )
                ->setStaticDate( 9, 15 )
                ->setName( '敬老の日' )
                ->setDescription( 'keirō no hi' )
                ->setValidFromYear( 1966 )
                ->setValidToYear( 2002 )
                ->setNameTranslations( [
                   'jp' => '敬老の日',
                   'de' => 'Tag der Ehrung der Alten',
                   'fr' => 'Jour d\'honneur des anciens',
                   'it' => 'Giorno d\'onore degli antichi',
                   'es' => 'Día de honor de los antiguos',
                   'pt' => 'Dia de honra dos antigos',
                   'cz' => 'Den cti starších',
                   'en' => 'Day of honor of the ancients'
                ] ),

      // 09-22 : 秋分の日 shūbun no hi
      Definition::Create( 'Autumn Equinox' )
                ->setStaticDate( 9, 22 )
                ->setName( '秋分の日' )
                ->setDescription( 'shūbun no hi' )
                // is only valid if is NOT on a sunday => otherwise move to next day
                ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                ->setNameTranslations( [
                   'jp' => '秋分の日',
                   'de' => 'Herbstanfang',
                   'fr' => 'Equinoxe d\'automne',
                   'it' => 'Equinozio d\'autunno',
                   'es' => 'Equinoccio de otoño',
                   'pt' => 'Equinócio de outono',
                   'cz' => 'Podzimní rovnodennost',
                   'en' => 'Autumn Equinox'
                ] ),

      // The 2nd monday in october : 体育の日 taiiku no hi : 2000-…
      Definition::Create( 'Day of sports' )
                ->setName( '体育の日' )
                ->setDescription( 'taiiku no hi' )
                ->setDynamicDateCallback( function( $year ) {
                   return new DateTime( 'second monday of october ' . $year );
                } )
                ->setValidFromYear( 2000 )
                ->setNameTranslations( [
                   'jp' => '体育の日',
                   'de' => 'Tag des Sports',
                   'fr' => 'Journée du sport',
                   'it' => 'Giorno dello sport',
                   'es' => 'Día del deporte',
                   'pt' => 'Dia do esporte',
                   'cz' => 'Den sportu',
                   'en' => 'Day of sports'
                ] ),

      // 10-10 : 体育の日 taiiku no hi : …-1999
      Definition::Create( 'Day of sports' )
                ->setStaticDate( 10, 10 )
                ->setName( '体育の日' )
                ->setDescription( 'taiiku no hi' )
                ->setValidToYear( 1999 )
                ->setNameTranslations( [
                   'jp' => '体育の日',
                   'de' => 'Tag des Sports',
                   'fr' => 'Journée du sport',
                   'it' => 'Giorno dello sport',
                   'es' => 'Día del deporte',
                   'pt' => 'Dia do esporte',
                   'cz' => 'Den sportu',
                   'en' => 'Day of sports'
                ] ),

      // 11-03 : 体育の日 : 1946-…
      Definition::Create( 'Day of culture' )
                ->setStaticDate( 11, 3 )
                ->setName( '文化の日' )
                ->setValidFromYear( 1946 )
                // is only valid if is NOT on a sunday => otherwise move to next day
                ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                ->setNameTranslations( [
                   'jp' => '文化の日',
                   'de' => 'Tag der Kultur',
                   'fr' => 'Jour de la culture',
                   'it' => 'Giorno della cultura',
                   'es' => 'Día de la cultura',
                   'pt' => 'Dia da cultura',
                   'cz' => 'Den kultury',
                   'en' => 'Day of culture'
                ] ),

      // 11-23 : 勤労感謝の日 kinrō kansha no hi : 1948-…
      Definition::Create( Identifiers::LABOR_DAY )
                ->setStaticDate( 11, 23 )
                ->setName( '勤労感謝の日' )
                ->setDescription( 'kinrō kansha no hi' )
                ->setValidFromYear( 1948 )
                // is only valid if is NOT on a sunday => otherwise move to next day
                ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                ->setNameTranslations( [
                   'jp' => '勤労感謝の日',
                   'de' => 'Arbeitsdank-Tag',
                   'fr' => 'Fête du Travail Action de grâces',
                   'it' => 'Lavoro Giorno del Ringraziamento',
                   'es' => 'Día de Acción de Gracias del Trabajo',
                   'pt' => 'Dia de Ação de Graças do Trabalho',
                   'cz' => 'Labor Den díkůvzdání',
                   'en' => 'Labor Thanksgiving Day'
                ] ),

      // 12-23 : 天皇誕生日 tennō tanjōbi : 1989-…
      Definition::Create( 'Birthday of the Emperor' )
                ->setStaticDate( 12, 23 )
                ->setName( '天皇誕生日' )
                ->setDescription( 'tennō tanjōbi' )
                ->setValidFromYear( 1989 )
                ->setNameTranslations( [
                   'jp' => '天皇誕生日',
                   'de' => 'Geburtstag des Kaisers',
                   'fr' => 'Anniversaire de l\'empereur',
                   'it' => 'Compleanno dell\'Imperatore',
                   'es' => 'Cumpleaños del Emperador',
                   'pt' => 'Aniversário do Imperador',
                   'cz' => 'Narozeniny císaře',
                   'en' => 'Birthday of the Emperor'
                ] )

   );

