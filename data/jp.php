<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Callbacks\NamedDateCallback;
use Niirrty\Holiday\DateMove\MoveCondition;
use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;


return DefinitionCollection::Create( '日本', 'jp', 'jp' )
    ->setRegions( [] )
    ->addRange(

        #region // 01-01 New Year
        Definition::CreateNewYear()
            ->setDescription( 'ganjitsu' )
            // is only valid if is NOT on a sunday => otherwise move to next day
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) ),
        #endregion

        #region // The 2nd monday in january (valid since year 2000) : seijin no hi- 成人の日
        Definition::Create( 'Coming of Age Day' )
            ->setDescription( 'Seijin no Hi' )
            ->setDynamicDateCallback( new NamedDateCallback( 'second monday of january ' ) )
            ->setValidFromYear( 2000 ),
        #endregion

        #region // 01-15 (valid between years 1948 and 1999) : seijin no hi- 成人の日
        Definition::Create( 'Coming of Age Day (1948-1999)' )
            ->setDescription( 'Seijin no Hi' )
            ->setStaticDate( 1, 15 )
            ->setValidFromYear( 1948 )
            ->setValidToYear( 1999 ),
        #endregion

        #region // 02-11 : kenkoku-kinen no hi - 建国記念の日
        Definition::Create( 'Feast day of the founding of the state' )
            ->setDescription( 'kenkoku-kinen no hi' )
            ->setStaticDate( 2, 11 )
            // is only valid if is NOT on a sunday => otherwise move to next day
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
            ->setValidFromYear( 1966 ),
        #endregion

        #region // 03-21 : shunbun no hi - 春分の日
        Definition::Create( 'Early spring' )
            ->setDescription( 'shunbun no hi' )
            ->setStaticDate( 3, 21 )
            // is only valid if is NOT on a sunday => otherwise move to next day
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) ),
        #endregion

        #region // 04-29 : shōwa no hi - 昭和の日 - …-1988 and 2007-…
        Definition::Create( 'Shōwa day' )
            ->setDescription( 'shōwa no hi' )
            ->setStaticDate( 4, 29 )
            ->setValidToYear( 1988 )
            ->setValidFromYear( 2007 )
            // is only valid if is NOT on a sunday => otherwise move to next day
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) ),
        #endregion

        #region // 04-29 : midori no hi - みどりの日 - 1989-2006
        Definition::Create( 'Day of the green (1989-2006)' )
            ->setDescription( 'midori no hi' )
            ->setStaticDate( 4, 29 )
            ->setValidFromYear( 1989 )
            ->setValidToYear( 2006 )
            // is only valid if is NOT on a sunday => otherwise move to next day
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) ),
        #endregion

        #region // 05-03 : kenpō kinenbi - 憲法記念日
        Definition::Create( 'Constitution Memorial Day' )
            ->setDescription( 'kenpō kinenbi' )
            ->setStaticDate( 5, 3 )
            ->setValidFromYear( 1948 )
            // is only valid if is NOT on a sunday => otherwise move to next day
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) ),
        #endregion

        #region // 05-04 | 05-05 : midori no hi - みどりの日 - 2007-…
        Definition::Create( 'Day of the green' )
            ->setDescription( 'midori no hi' )
            ->setStaticDate( 5, 4 )
            ->setValidFromYear( 2007 )
            // is only valid if is NOT on a sunday => otherwise move to next day
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) ),
        #endregion

        #region // 05-05 | 05-06 : Child's day - kodomo no hi - こどもの日
        Definition::Create( 'Child\'s day' )
            ->setStaticDate( 5, 5 )
            // is only valid if is NOT on a sunday => otherwise move to next day
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) ),
        #endregion

        #region // The 3rd monday in july : umi no hi- 海の日
        Definition::Create( 'Day of the sea' )
            ->setDescription( 'umi no hi' )
            ->setDynamicDateCallback( new NamedDateCallback( 'third monday of july ' ) )
            ->setValidFromYear( 1996 ),
        #endregion

        #region // 08-11 : yama no hi - 山の日
        Definition::Create( 'Day of the mountain' )
            ->setStaticDate( 8, 11 )
            ->setDescription( 'yama no hi' )
            ->setValidFromYear( 2016 )
            // is only valid if is NOT on a sunday => otherwise move to next day
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) ),
        #endregion

        #region // The 3rd monday of september beginning with year 2003 : taiiku no hi- 敬老の日
        Definition::Create( 'Day of honor of the ancients' )
            ->setDescription( 'keirō no hi' )
            ->setDynamicDateCallback( new NamedDateCallback( 'third monday of september ' ) )
            ->setValidFromYear( 2003 ),
        #endregion

        #region // 09-15 beginning with year 1966 up to 2002 : taiiku no hi- 敬老の日
        Definition::Create( 'Day of honor of the ancients (1966-2002)' )
            ->setStaticDate( 9, 15 )
            ->setDescription( 'keirō no hi' )
            ->setValidFromYear( 1966 )
            ->setValidToYear( 2002 ),
        #endregion

        #region // 09-22 : 秋分の日 shūbun no hi
        Definition::Create( 'September Equinox' )
            ->setStaticDate( 9, 22 )
            ->setDescription( 'shūbun no hi' )
            // is only valid if is NOT on a sunday => otherwise move to next day
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) ),
        #endregion

        #region // The 2nd monday in october : 体育の日 taiiku no hi : 2000-…
        Definition::Create( 'Day of sports' )
            ->setDescription( 'taiiku no hi' )
            ->setDynamicDateCallback( new NamedDateCallback( 'second monday of october ' ) )
            ->setValidFromYear( 2000 ),
        #endregion

        #region // 10-10 : 体育の日 taiiku no hi : …-1999
        Definition::Create( 'Day of sports (…-1999)' )
            ->setStaticDate( 10, 10 )
            ->setDescription( 'taiiku no hi' )
            ->setValidToYear( 1999 ),
        #endregion

        #region // 11-03 : 体育の日 : 1946-…
        Definition::Create( 'Day of culture' )
            ->setStaticDate( 11, 3 )
            ->setValidFromYear( 1946 )
            // is only valid if is NOT on a sunday => otherwise move to next day
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) ),
        #endregion

        #region // 11-23 : 勤労感謝の日 kinrō kansha no hi : 1948-…
        Definition::Create( 'Labor Thanksgiving Day' )
            ->setStaticDate( 11, 23 )
            ->setDescription( 'kinrō kansha no hi' )
            ->setValidFromYear( 1948 )
            // is only valid if is NOT on a sunday => otherwise move to next day
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) ),
        #endregion

        #region // 12-23 : 天皇誕生日 tennō tanjōbi : 1989-…
        Definition::Create( 'Birthday of the Emperor' )
            ->setStaticDate( 12, 23 )
            ->setDescription( 'tennō tanjōbi' )
            ->setValidFromYear( 1989 )
        #endregion

    );

