<?php

use Niirrty\Holiday\Callbacks\NamedDateCallback;
use Niirrty\Holiday\Callbacks\SeasonDateCallback;
use Niirrty\Holiday\Definition;

return [

    #region // 02-14 Valentine's Day
    Definition::Create( 'Valentine\'s Day' )
        ->setStaticDate( 2, 14 )
        ->setIsRestDay( false ),
    #endregion

    #region // 03-01 Early spring meteorological
    Definition::Create( 'Meteorological Beginning of Spring' )
        ->setStaticDate( 3, 1 )
        ->setIsRestDay( false ),
    #endregion

    #region // Equinox March
    Definition::Create( 'March Equinox' )
        ->setDynamicDateCallback(
            new SeasonDateCallback( SeasonDateCallback::TYPE_SPRING,
                SeasonDateCallback::HEMISPHERE_NORTH ) )
        ->setIsRestDay( false ),
    #endregion

    #region // DST Begin
    Definition::Create( 'Start of Daylight Saving Time' )
        ->setDynamicDateCallback( new NamedDateCallback( 'last sunday of march ' ) )
        ->setIsRestDay( false ),
    #endregion

    #region // 06-01: Summer beginning meteorological
    Definition::Create( 'Meteorological Start of Summer' )
        ->setStaticDate( 6, 1 )
        ->setIsRestDay( false ),
    #endregion

    #region // Summer beginning
    Definition::Create( 'Beginning of Summer' )
        ->setDynamicDateCallback( new SeasonDateCallback(
            SeasonDateCallback::TYPE_SUMMER,
            SeasonDateCallback::HEMISPHERE_NORTH ) )
        ->setIsRestDay( false ),
    #endregion

    #region // 09-01: Autumn beginning meteorological
    Definition::Create( 'Meteorological Beginning of Autumn' )
        ->setStaticDate( 9, 1 )
        ->setIsRestDay( false ),
    #endregion

    #region // Equinox September
    Definition::Create( 'September Equinox' )
        ->setDynamicDateCallback( new SeasonDateCallback(
            SeasonDateCallback::TYPE_AUTUMN,
            SeasonDateCallback::HEMISPHERE_NORTH ) )
        ->setIsRestDay( false ),
    #endregion

    #region // 10-20: Welt-Kindertag - World Children's Day
    Definition::Create( 'World Children\'s Day' )
        ->setStaticDate( 10, 20 )
        ->setIsRestDay( false ),
    #endregion

    #region // DST End
    Definition::Create( 'End of Daylight Saving Time' )
        ->setDynamicDateCallback( new NamedDateCallback( 'last sunday of october' ) )
        ->setIsRestDay( false ),
    #endregion

    #region // 12-01: Winter beginning meteorological
    Definition::Create( 'Meteorological Start of Winter' )
        ->setStaticDate( 12, 1 )
        ->setIsRestDay( false ),
    #endregion

    #region // Winter beginning
    Definition::Create( 'Beginning of Winter' )
        ->setDynamicDateCallback( new SeasonDateCallback(
            SeasonDateCallback::TYPE_WINTER,
            SeasonDateCallback::HEMISPHERE_NORTH ) )
        ->setIsRestDay( false )
    #endregion

];
