<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Holiday;
use Niirrty\Holiday\HolidayCollection;
use Niirrty\Holiday\HolidayType;
use Niirrty\Holiday\HolidayName;


return HolidayCollection::Create( '日本', 'jp' )

   // <editor-fold desc="// Define the regions (there are no for Nippon)">
   ->setRegions( [] )
   // </editor-fold>

   ->addRange(

      // <editor-fold desc="// 01-01 New Year's Day">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay  ( 1, false ) // 01-01
         ->addName( HolidayName::Create( 'jp', '元日' ) )
         ->setDescription( 'ganjitsu' )
         // is only valid if 01-01 is NOT on a sunday
         ->setConditionCallback( function( $year ) { return ! \Niirrty\Holiday\is_sunday( $year, 1, 1 ); }, false )
         ->addNameTranslationsArray( [
               'de' => 'Neujahr',
               'fr' => 'Jour de l\'An',
               'it' => 'Capodanno',
               'es' => 'Año Nuevo',
               'pt' => 'Mãe de Deus',
               'cz' => 'Nový rok',
               'en' => 'New Year\'s Day'
            ] ),
      // </editor-fold>

      // <editor-fold desc="// 01-02 Move 01-01 (New Years's Day) holiday to next monday if it was on a sunday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay( 2, false ) // 01-02
         ->addName( HolidayName::Create( 'jp', '振（り）替（え）休日' ) )
         ->setDescription( 'Furikae kyūjitsu' )
         // is only valid if 01-01 was on a sunday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 1, 1 ); }, false )
         ->addNameTranslationsArray( [
               'de' => 'Verschobener Feiertag - Neujahr',
               'fr' => 'Vacances Motion - Jour de l\'An',
               'it' => 'Spostato vacanze - Capodanno',
               'es' => 'Movido vacaciones - Año Nuevo',
               'pt' => 'Feriado moveu - Mãe de Deus',
               'cz' => 'Přesunuta dovolená - Nový rok',
               'en' => 'Moved holiday - New Year\'s Day'
            ] ),
      // </editor-fold>

      // <editor-fold desc="// The 2nd monday in january (valid since year 2000) : seijin no hi- 成人の日">
      Holiday::Create( HolidayType::DYNAMIC )
         // 2nd monday in january
         ->setDynamicCallback( function($year) { return new DateTime( 'second monday of january ' . $year ); }, false )
         ->addName( HolidayName::Create( 'jp', '成人の日' ) )
         ->setDescription( 'Seijin no Hi' )
         ->setValidFromYear( 2000, false )
         ->addNameTranslationsArray( [
               'de' => 'Tag der Mündigkeitserklärung',
               'fr' => 'Le jour de l\'accès à la majorité',
               'it' => 'Giorno di cessazione',
               'es' => 'Día de terminación',
               'pt' => 'Dia da rescisão',
               'cz' => 'Den ukončení',
               'en' => 'Coming of Age Day'
            ] ),
      // </editor-fold>

      // <editor-fold desc="// 01-15 (valid between years 1948 and 1999) : seijin no hi- 成人の日">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay( 15, false ) // 01-15
         ->addName( HolidayName::Create( 'jp', '成人の日' ) )
         ->setDescription( 'seijin no hi' )
         ->setValidFromYear( 1948, false )
         ->setValidToYear( 1999, false )
         ->addNameTranslationsArray( [
            'de' => 'Tag der Mündigkeitserklärung',
            'fr' => 'Le jour de l\'accès à la majorité',
            'it' => 'Giorno di cessazione',
            'es' => 'Día de terminación',
            'pt' => 'Dia da rescisão',
            'cz' => 'Den ukončení',
            'en' => 'Coming of Age Day'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 02-11 : kenkoku-kinen no hi - 建国記念の日">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 2 )->setDay( 11 ) // 02-11
         ->addName( HolidayName::Create( 'jp', '建国記念の日' ) )
         ->setDescription( 'kenkoku-kinen no hi' )
         // is only valid if 02-11 is NOT on a sunday
         ->setConditionCallback( function( $year ) { return ! \Niirrty\Holiday\is_sunday( $year, 2, 11 ); }, false )
         ->setValidFromYear( 1966 )
         ->addNameTranslationsArray( [
            'de' => 'Gedenktag der Staatsgründung',
            'fr' => 'Fête de la fondation de l\'Etat',
            'it' => 'Festa della fondazione dello stato',
            'es' => 'Fiesta de la fundación del estado',
            'pt' => 'Festa da fundação do estado',
            'cz' => 'Svátek byl založen stát',
            'en' => 'Feast day of the founding of the state'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 02-12 Move 02-11 holiday to next monday if it was on a sunday">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 1, false )->setDay( 2, false ) // 02-12
         ->addName( HolidayName::Create( 'jp', '建国記念の日' ) )
         ->setDescription( 'kenkoku-kinen no hi' )
         // is only valid if 02-11 was on a sunday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 2, 11 ); }, false )
         ->addNameTranslationsArray( [
            'de' => 'Gedenktag der Staatsgründung',
            'fr' => 'Fête de la fondation de l\'Etat',
            'it' => 'Festa della fondazione dello stato',
            'es' => 'Fiesta de la fundación del estado',
            'pt' => 'Festa da fundação do estado',
            'cz' => 'Svátek byl založen stát',
            'en' => 'Feast day of the founding of the state'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 03-21 : shunbun no hi - 春分の日">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 3 )->setDay( 21 ) // 03-21
         ->addName( HolidayName::Create( 'jp', '春分の日' ) )
         ->setDescription( 'shunbun no hi' )
         // is only valid if 03-21 was not on a sunday
         ->setConditionCallback( function( $year ) { return ! \Niirrty\Holiday\is_sunday( $year, 3, 21 ); }, false )
         ->addNameTranslationsArray( [
            'de' => 'Frühlingsanfang',
            'fr' => 'Début du printemps',
            'it' => 'All\'inizio della primavera',
            'es' => 'Principios de la primavera',
            'pt' => 'Início da primavera',
            'cz' => 'Brzy na jaře',
            'en' => 'Early spring'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 03-22 : If the holiday before is an sunday - 春分の日">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 3 )->setDay( 22 ) // 03-22
         ->addName( HolidayName::Create( 'jp', '春分の日' ) )
         ->setDescription( 'shunbun no hi' )
         // is only valid if 03-21 was not on a sunday
         ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 3, 21 ); }, false )
         ->addNameTranslationsArray( [
            'de' => 'Frühlingsanfang',
            'fr' => 'Début du printemps',
            'it' => 'All\'inizio della primavera',
            'es' => 'Principios de la primavera',
            'pt' => 'Início da primavera',
            'cz' => 'Brzy na jaře',
            'en' => 'Early spring'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 04-29 : shōwa no hi - 昭和の日 - …-1988">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
         ->setMonth( 4 )->setDay( 29 ) // 04-29
         ->addName( HolidayName::Create( 'jp', '昭和の日' ) )
         ->setDescription( 'shōwa no hi' )
         ->setValidToYear( 1988, false )
         // is only valid if 04-29 is not on a sunday
         ->setConditionCallback( function( $year ) { return ! \Niirrty\Holiday\is_sunday( $year, 4, 29 ); }, false )
         ->addNameTranslationsArray( [
            'de' => 'Shōwa-Tag',
            'fr' => 'Jour de Shōwa',
            'it' => 'Shōwa giorno',
            'es' => 'Día de Showa',
            'pt' => 'Dia Shōwa',
            'cz' => 'Shōwa den',
            'en' => 'Shōwa day'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 04-29 : midori no hi - みどりの日 - 1989-2006">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
             ->setMonth( 4 )->setDay( 29 ) // 04-29
             ->addName( HolidayName::Create( 'jp', 'みどりの日' ) )
             ->setDescription( 'midori no hi' )
             ->setValidFromYear( 1989, false )
             ->setValidToYear( 2006, false )
             // is only valid if 04-29 is not on a sunday
             ->setConditionCallback( function( $year ) { return ! \Niirrty\Holiday\is_sunday( $year, 4, 29 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Tag des Grünens',
                'fr' => 'Jour du vert',
                'it' => 'Giorno del verde',
                'es' => 'Día del verde',
                'pt' => 'Dia do verde',
                'cz' => 'Den zelených',
                'en' => 'Day of the green'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 04-29 : shōwa no hi - 昭和の日 - 2007-…">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 4 )->setDay( 29 ) // 04-29
             ->addName( HolidayName::Create( 'jp', '昭和の日' ) )
             ->setDescription( 'shōwa no hi' )
             ->setValidFromYear( 2007, false )
             // is only valid if 04-29 is not on a sunday
             ->setConditionCallback( function( $year ) { return ! \Niirrty\Holiday\is_sunday( $year, 4, 29 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Shōwa-Tag',
                'fr' => 'Jour de Shōwa',
                'it' => 'Shōwa giorno',
                'es' => 'Día de Showa',
                'pt' => 'Dia Shōwa',
                'cz' => 'Shōwa den',
                'en' => 'Shōwa day'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 04-30 : If the holiday before is an sunday - shōwa no hi - 昭和の日 - …-1988">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 4 )->setDay( 30 ) // 04-30
             ->addName( HolidayName::Create( 'jp', '昭和の日' ) )
             ->setDescription( 'shōwa no hi' )
             ->setValidToYear( 1988, false )
             // is only valid if 04-29 is a sunday
             ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 4, 29 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Shōwa-Tag',
                'fr' => 'Jour de Shōwa',
                'it' => 'Shōwa giorno',
                'es' => 'Día de Showa',
                'pt' => 'Dia Shōwa',
                'cz' => 'Shōwa den',
                'en' => 'Shōwa day'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 04-30 : If the holiday before is an sunday - midori no hi - みどりの日 - 1989-2006">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
             ->setMonth( 4 )->setDay( 30 ) // 04-30
             ->addName( HolidayName::Create( 'jp', 'みどりの日' ) )
             ->setDescription( 'midori no hi' )
             ->setValidFromYear( 1989, false )
             ->setValidToYear( 2006, false )
             // is only valid if 04-29 is on a sunday
             ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 4, 29 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Tag des Grünens',
                'fr' => 'Jour du vert',
                'it' => 'Giorno del verde',
                'es' => 'Día del verde',
                'pt' => 'Dia do verde',
                'cz' => 'Den zelených',
                'en' => 'Day of the green'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 04-30 : If the holiday before is an sunday - shōwa no hi - 昭和の日 - 2007-…">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 4 )->setDay( 30 ) // 04-30
             ->addName( HolidayName::Create( 'jp', '昭和の日' ) )
             ->setDescription( 'shōwa no hi' )
             ->setValidFromYear( 2007, false )
             // is only valid if 04-29 is on a sunday
             ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 4, 29 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Shōwa-Tag',
                'fr' => 'Jour de Shōwa',
                'it' => 'Shōwa giorno',
                'es' => 'Día de Showa',
                'pt' => 'Dia Shōwa',
                'cz' => 'Shōwa den',
                'en' => 'Shōwa day'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 05-03 : kenpō kinenbi - 憲法記念日">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 5 )->setDay( 3 ) // 05-03
             ->addName( HolidayName::Create( 'jp', '憲法記念日' ) )
             ->setDescription( 'kenpō kinenbi' )
             ->setValidFromYear( 1948, false )
             // is only valid if 05-03 is not on a sunday
             ->setConditionCallback( function( $year ) { return ! \Niirrty\Holiday\is_sunday( $year, 5, 3 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Verfassungsgedenktag',
                'fr' => 'Constitution Memorial Day',
                'it' => 'Costituzione Memorial Day',
                'es' => 'Memorial Day Constitución',
                'pt' => 'Constitution Memorial Day',
                'cz' => 'Constitution Memorial Day',
                'en' => 'Constitution Memorial Day'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 05-04 : If the holiday before is an sunday - kenpō kinenbi - 憲法記念日">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 5 )->setDay( 4 ) // 05-04
             ->addName( HolidayName::Create( 'jp', '憲法記念日' ) )
             ->setDescription( 'kenpō kinenbi' )
             ->setValidFromYear( 1948, false )
             // is only valid if 05-03 is on a sunday
             ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 5, 3 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Verfassungsgedenktag',
                'fr' => 'Constitution Memorial Day',
                'it' => 'Costituzione Memorial Day',
                'es' => 'Memorial Day Constitución',
                'pt' => 'Constitution Memorial Day',
                'cz' => 'Constitution Memorial Day',
                'en' => 'Constitution Memorial Day'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 05-04 : midori no hi - みどりの日 - 2007-…">
      Holiday::Create( HolidayType::DYNAMIC_BASE )
             ->setMonth( 5 )->setDay( 4 ) // 05-04
             ->addName( HolidayName::Create( 'jp', 'みどりの日' ) )
             ->setDescription( 'midori no hi' )
             ->setValidFromYear( 2007, false )
             // is only valid if 05-03 is not on a sunday
             ->setConditionCallback( function( $year ) { return ! \Niirrty\Holiday\is_sunday( $year, 5, 3 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Tag des Grünens',
                'fr' => 'Jour du vert',
                'it' => 'Giorno del verde',
                'es' => 'Día del verde',
                'pt' => 'Dia do verde',
                'cz' => 'Den zelených',
                'en' => 'Day of the green'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 05-05 : kodomo no hi - こどもの日">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 5 )->setDay( 5 ) // 05-05
             ->addName( HolidayName::Create( 'jp', 'こどもの日' ) )
             ->setDescription( 'kodomo no hi' )
             // is only valid if 05-05 is not on a sunday
             ->setConditionCallback( function( $year ) { return ! \Niirrty\Holiday\is_sunday( $year, 5, 5 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Tag des Kindes',
                'fr' => 'Jour de l\'enfant',
                'it' => 'La giornata dei bambini',
                'es' => 'Día del niño',
                'pt' => 'Dia da criança',
                'cz' => 'Den dítěte',
                'en' => 'Child\'s day'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 05-06 : If the holiday before is an sunday - kodomo no hi - こどもの日">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 5 )->setDay( 6 ) // 05-06
             ->addName( HolidayName::Create( 'jp', 'こどもの日' ) )
             ->setDescription( 'kodomo no hi' )
             // is only valid if 05-05 is on a sunday
             ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 5, 5 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Tag des Kindes',
                'fr' => 'Jour de l\'enfant',
                'it' => 'La giornata dei bambini',
                'es' => 'Día del niño',
                'pt' => 'Dia da criança',
                'cz' => 'Den dítěte',
                'en' => 'Child\'s day'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// The 3rd monday in july : umi no hi- 海の日">
      Holiday::Create( HolidayType::DYNAMIC )
         ->setDynamicCallback( function($year) { return new DateTime( 'third monday of july ' . $year ); } )
         ->addName( HolidayName::Create( 'jp', '海の日' ) )
         ->setDescription( 'umi no hi' )
         ->setValidFromYear( 1996, false )
         ->addNameTranslationsArray( [
            'de' => 'Tag des Meeres',
            'fr' => 'Jour de la mer',
            'it' => 'Giorno del mare',
            'es' => 'Día del mar',
            'pt' => 'Dia do mar',
            'cz' => 'Den moře',
            'en' => 'Day of the sea'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 08-11 : yama no hi - 山の日">
      Holiday::Create( HolidayType::STATIC )
         ->setMonth( 8 )->setDay( 11 ) // 08-11
         ->addName( HolidayName::Create( 'jp', '山の日' ) )
         ->setDescription( 'yama no hi' )
         ->setValidFromYear( 2016, false )
         // is only valid if 08-11 is not on a sunday
         ->setConditionCallback( function( $year ) { return ! \Niirrty\Holiday\is_sunday( $year, 8, 11 ); }, false )
         ->addNameTranslationsArray( [
            'de' => 'Tag des Berges',
            'fr' => 'Jour de la montagne',
            'it' => 'Giorno della montagna',
            'es' => 'Día de la montaña',
            'pt' => 'Dia da montanha',
            'cz' => 'Den hory',
            'en' => 'Day of the mountain'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 08-12 : If the holiday before is an sunday - yama no hi - 山の日">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 8 )->setDay( 12 ) // 08-12
             ->addName( HolidayName::Create( 'jp', '山の日' ) )
             ->setDescription( 'yama no hi' )
             ->setValidFromYear( 2016, false )
             // is only valid if 08-11 is on a sunday
             ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 8, 11 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Tag des Berges',
                'fr' => 'Jour de la montagne',
                'it' => 'Giorno della montagna',
                'es' => 'Día de la montaña',
                'pt' => 'Dia da montanha',
                'cz' => 'Den hory',
                'en' => 'Day of the mountain'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// The 3rd monday of september beginning with year 2003 : taiiku no hi- 敬老の日">
      Holiday::Create( HolidayType::DYNAMIC )
         ->setDynamicCallback( function($year) { return new DateTime( 'third monday of september ' . $year ); }, false )
         ->addName( HolidayName::Create( 'jp', '敬老の日' ) )
         ->setDescription( 'keirō no hi' )
         ->setValidFromYear( 2003 )
         ->addNameTranslationsArray( [
            'de' => 'Tag der Ehrung der Alten',
            'fr' => 'Jour d\'honneur des anciens',
            'it' => 'Giorno d\'onore degli antichi',
            'es' => 'Día de honor de los antiguos',
            'pt' => 'Dia de honra dos antigos',
            'cz' => 'Den cti starších',
            'en' => 'Day of honor of the ancients'
         ] ),
      // </editor-fold>

      // <editor-fold desc="// 09-15 beginning with year 1966 up to 2002 : taiiku no hi- 敬老の日">
      Holiday::Create( HolidayType::DYNAMIC )
             ->setMonth( 9 )->setDay( 15 )
             ->addName( HolidayName::Create( 'jp', '敬老の日' ) )
             ->setDescription( 'keirō no hi' )
             ->setValidFromYear( 1966 )
             ->setValidToYear( 2002 )
             ->addNameTranslationsArray( [
                'de' => 'Tag der Ehrung der Alten',
                'fr' => 'Jour d\'honneur des anciens',
                'it' => 'Giorno d\'onore degli antichi',
                'es' => 'Día de honor de los antiguos',
                'pt' => 'Dia de honra dos antigos',
                'cz' => 'Den cti starších',
                'en' => 'Day of honor of the ancients'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 09-22 : 秋分の日 shūbun no hi">
      Holiday::Create( HolidayType::DYNAMIC )
             ->setMonth( 9 )->setDay( 22 )
             ->addName( HolidayName::Create( 'jp', '秋分の日' ) )
             ->setDescription( 'shūbun no hi' )
             // is only valid if 09-22 is not on a sunday
             ->setConditionCallback( function( $year ) { return ! \Niirrty\Holiday\is_sunday( $year, 9, 22 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Herbstanfang',
                'fr' => 'Equinoxe d\'automne',
                'it' => 'Equinozio d\'autunno',
                'es' => 'Equinoccio de otoño',
                'pt' => 'Equinócio de outono',
                'cz' => 'Podzimní rovnodennost',
                'en' => 'Autumn Equinox'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 09-23 : If the holiday before is an sunday - 秋分の日 shūbun no hi">
      Holiday::Create( HolidayType::DYNAMIC )
             ->setMonth( 9 )->setDay( 23 )
             ->addName( HolidayName::Create( 'jp', '秋分の日' ) )
             ->setDescription( 'shūbun no hi' )
             // is only valid if 09-22 is on a sunday
             ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 9, 22 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Herbstanfang',
                'fr' => 'Equinoxe d\'automne',
                'it' => 'Equinozio d\'autunno',
                'es' => 'Equinoccio de otoño',
                'pt' => 'Equinócio de outono',
                'cz' => 'Podzimní rovnodennost',
                'en' => 'Autumn Equinox'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// The 2nd monday in october : 体育の日 taiiku no hi : 2000-…">
      Holiday::Create( HolidayType::DYNAMIC )
             ->setDynamicCallback( function($year) { return new DateTime( 'second monday of october ' . $year ); } )
             ->addName( HolidayName::Create( 'jp', '体育の日' ) )
             ->setDescription( 'taiiku no hi' )
             ->setValidFromYear( 2000, false )
             ->addNameTranslationsArray( [
                'de' => 'Tag des Sports',
                'fr' => 'Journée du sport',
                'it' => 'Giorno dello sport',
                'es' => 'Día del deporte',
                'pt' => 'Dia do esporte',
                'cz' => 'Den sportu',
                'en' => 'Day of sports'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 10-10 : 体育の日 taiiku no hi : …-1999">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 10 )->setDay( 10 )
             ->addName( HolidayName::Create( 'jp', '体育の日' ) )
             ->setDescription( 'taiiku no hi' )
             ->setValidToYear( 1999, false )
             ->addNameTranslationsArray( [
                'de' => 'Tag des Sports',
                'fr' => 'Journée du sport',
                'it' => 'Giorno dello sport',
                'es' => 'Día del deporte',
                'pt' => 'Dia do esporte',
                'cz' => 'Den sportu',
                'en' => 'Day of sports'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 11-03 : 体育の日 taiiku no hi : 1946-…">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 11 )->setDay( 3 )
             ->addName( HolidayName::Create( 'jp', '文化の日' ) )
             ->setDescription( 'taiiku no hi' )
             ->setValidFromYear( 1946, false )
             // is only valid if 11-03 is not on a sunday
             ->setConditionCallback( function( $year ) { return ! \Niirrty\Holiday\is_sunday( $year, 11, 3 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Tag der Kultur',
                'fr' => 'Jour de la culture',
                'it' => 'Giorno della cultura',
                'es' => 'Día de la cultura',
                'pt' => 'Dia da cultura',
                'cz' => 'Den kultury',
                'en' => 'Day of culture'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 11-04 : If the holiday before is an sunday - 体育の日 taiiku no hi : 1946-…">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 11 )->setDay( 4 )
             ->addName( HolidayName::Create( 'jp', '文化の日' ) )
             ->setDescription( 'taiiku no hi' )
             ->setValidFromYear( 1946, false )
             // is only valid if 11-03 is on a sunday
             ->setConditionCallback( function( $year ) { return \Niirrty\Holiday\is_sunday( $year, 11, 3 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Tag der Kultur',
                'fr' => 'Jour de la culture',
                'it' => 'Giorno della cultura',
                'es' => 'Día de la cultura',
                'pt' => 'Dia da cultura',
                'cz' => 'Den kultury',
                'en' => 'Day of culture'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 11-23 : 勤労感謝の日 kinrō kansha no hi : 1948-…">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 11 )->setDay( 23 )
             ->addName( HolidayName::Create( 'jp', '勤労感謝の日' ) )
             ->setDescription( 'kinrō kansha no hi' )
             ->setValidFromYear( 1948, false )
             // is only valid if 11-23 is not on a sunday
             ->setConditionCallback( function($year) { return ! \Niirrty\Holiday\is_sunday( $year, 11, 23 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Arbeitsdank-Tag',
                'fr' => 'Fête du Travail Action de grâces',
                'it' => 'Lavoro Giorno del Ringraziamento',
                'es' => 'Día de Acción de Gracias del Trabajo',
                'pt' => 'Dia de Ação de Graças do Trabalho',
                'cz' => 'Labor Den díkůvzdání',
                'en' => 'Labor Thanksgiving Day'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 11-24 : If the holiday before is an sunday - 勤労感謝の日 kinrō kansha no hi : 1948-…">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 11 )->setDay( 24 )
             ->addName( HolidayName::Create( 'jp', '勤労感謝の日' ) )
             ->setDescription( 'kinrō kansha no hi' )
             ->setValidFromYear( 1948, false )
             // is only valid if 11-23 is on a sunday
             ->setConditionCallback( function($year) { return \Niirrty\Holiday\is_sunday( $year, 11, 23 ); }, false )
             ->addNameTranslationsArray( [
                'de' => 'Arbeitsdank-Tag',
                'fr' => 'Fête du Travail Action de grâces',
                'it' => 'Lavoro Giorno del Ringraziamento',
                'es' => 'Día de Acción de Gracias del Trabajo',
                'pt' => 'Dia de Ação de Graças do Trabalho',
                'cz' => 'Labor Den díkůvzdání',
                'en' => 'Labor Thanksgiving Day'
             ] ),
      // </editor-fold>

      // <editor-fold desc="// 12-23 : 天皇誕生日 tennō tanjōbi : 1989-…">
      Holiday::Create( HolidayType::STATIC )
             ->setMonth( 12 )->setDay( 23 )
             ->addName( HolidayName::Create( 'jp', '天皇誕生日' ) )
             ->setDescription( 'tennō tanjōbi' )
             ->setValidFromYear( 1989, false )
             ->addNameTranslationsArray( [
                'de' => 'Geburtstag des Kaisers',
                'fr' => 'Anniversaire de l\'empereur',
                'it' => 'Compleanno dell\'Imperatore',
                'es' => 'Cumpleaños del Emperador',
                'pt' => 'Aniversário do Imperador',
                'cz' => 'Narozeniny císaře',
                'en' => 'Birthday of the Emperor'
             ] )
      // </editor-fold>

   );

