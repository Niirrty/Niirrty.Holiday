<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;


return DefinitionCollection::Create( 'Poland', 'pl', 'pl' )
    ->setRegions( [] )
    ->addRange(

        #region // 01-01 New Year
        Definition::CreateNewYear(),
        #endregion

        #region // 01-06 Epiphany (Holy 3 kings)
        Definition::Create( 'Epiphany' )
            ->setStaticDate( 1, 6 ),
        #endregion

        #region // 03-01 National Day of Remembrance for the Cursed Soldiers
        Definition::Create( 'National Day of Remembrance for the Cursed Soldiers' )
            ->setStaticDate( 3, 1 )
            ->setValidFromYear( 2011 )
            ->setIsRestDay( false ),
        #endregion

        #region // Easter Sunday…
        Definition::CreateEasterDepending( 'Easter Sunday', 0 ),
        #endregion

        #region // Easter Monday (Easter sunday + 1 day)
        Definition::CreateEasterDepending( 'Easter Monday', 1 ),
        #endregion

        #region // 04-13 Memorial Day for the Victims of the Katyn Massacre
        Definition::Create( 'Memorial Day for the Victims of the Katyn Massacre' )
            ->setStaticDate( 4, 13 )
            ->setIsRestDay( false ),
        #endregion

        #region // 05-01 : Tag der Arbeit - Labor Day
        Definition::Create( 'Labor Day' )
            ->setStaticDate( 5, 1 ),
        #endregion

        #region // 05-03 : Święto Narodowe Trzeciego Maja - Constitution Day
        Definition::Create( 'Constitution Day' )
            ->setStaticDate( 5, 3 ),
        #endregion

        #region // 05-09 : National Memorial Day of Victory over the Third Reich : 1945-…
        Definition::Create( 'National Memorial Day of Victory over the Third Reich' )
            ->setStaticDate( 5, 9 )
            ->setValidFromYear( 1945 )
            ->setIsRestDay( false ),
        #endregion

        #region // Pfingstsonntag - Whit Sunday (Easter sunday + 49 days)
        Definition::CreateEasterDepending( 'Pentecost Sunday', 49 ),
        #endregion

        #region // Corpus Christi (Easter sunday + 60 days)
        Definition::CreateEasterDepending( 'Corpus Christi', 60 ),
        #endregion

        #region // 08-15: Assumption Day
        Definition::Create( 'Assumption of Mary' )
            ->setStaticDate( 8, 15 ),
        #endregion

        #region // 08-31 : Dzień Solidarności i Wolności - Day of Solidarity and Freedom
        Definition::Create( 'Day of Solidarity and Freedom' )
            ->setStaticDate( 8, 31 )
            ->setValidFromYear( 1981 )
            ->setIsRestDay( false ),
        #endregion

        #region // 10-14 : Dzień Edukacji Narodowej - National Education Day
        Definition::Create( 'National Education Day' )
            ->setStaticDate( 10, 14 )
            ->setIsRestDay( false ),
        #endregion

        #region // 10-16 : Dzień Papieża Jana Pawła II - Pope John Paul II Day
        Definition::Create( 'Pope John Paul II Day' )
            ->setStaticDate( 10, 16 )
            ->setIsRestDay( false )
            ->setValidFromYear( 2005 ),
        #endregion

        #region // 11-01 : All Saints' Day
        Definition::Create( 'All Saints\' Day' )
            ->setStaticDate( 11, 1 ),
        #endregion

        #region // 11-11 : Narodowe Święto Niepodległości - Independence Day
        Definition::Create( 'Independence Day' )
            ->setStaticDate( 11, 11 )
            ->setValidToYear( 2017 )
            ->setValidFromYear( 2019 ),
        #endregion

        #region // 2018-11-12 : Narodowe Święto Niepodległości - Independence Day
        Definition::Create( 'Independence Day 2018' )
            ->setStaticDate( 11, 12 )
            ->setValidFromYear( 2018 )
            ->setValidToYear( 2018 ),
        #endregion

        #region // 12-24 : Holy Evening
        Definition::Create( 'Christmas Eve' )
            ->setStaticDate( 12, 24 ),
        #endregion

        #region // 12-25 : Christmas Day
        Definition::Create( 'Christmas Day' )
            ->setStaticDate( 12, 25 ),
        #endregion

        #region // 12-26 : Boxing Day
        Definition::Create( 'Boxing Day' )
            ->setStaticDate( 12, 26 ),
        #endregion

        #region // 12-27 : Commemoration Day of the Greater Poland Uprising
        Definition::Create( 'Commemoration Day of the Greater Poland Uprising' )
            ->setStaticDate( 12, 27 )
            ->setIsRestDay( false )
            ->setValidFromYear( 2021 )
        #endregion

    )
    ->addRangeFromArray(
        include __DIR__ . '/global-norestdays.php'
    );

