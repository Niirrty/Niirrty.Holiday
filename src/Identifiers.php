<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright      © 2017-2020, Ni Irrty
 * @package        Niirrty\Web
 * @since          2017-12-03
 * @version        1.3.0
 */


namespace Niirrty\Holiday;


/**
 * Define most used known (often christian) holiday names
 *
 * @package Niirrty\Holiday
 */
interface Identifiers
{


    /**
     * The new years day (yyyy-01-01)
     */
    public const string NEW_YEAR = 'New Year';

    /**
     * Epiphany (Holy 3 kings) (yyyy-01-06)
     */
    public const string EPIPHANY = 'Epiphany (Holy 3 kings)';

    /**
     * Good Friday (Easter sunday - 2 days)
     */
    public const string GOOD_FRIDAY = 'Good Friday';

    /**
     * Easter sunday
     */
    public const string EASTER_SUNDAY = 'Easter Sunday';

    /**
     * Easter Monday (Easter sunday + 1 day)
     */
    public const string EASTER_MONDAY = 'Easter Monday';

    /**
     * Labor Day / Day of work
     */
    public const string LABOR_DAY = 'Labor Day';

    /**
     * Ascension of Christ (Easter sunday + 39 days)
     */
    public const string ASCENSION = 'Ascension of Christ';

    /**
     * Whit Sunday (Easter sunday + 49 days)
     */
    public const string WHIT_SUNDAY = 'Whit Sunday';

    /**
     * Whit Monday (Easter sunday + 50 days)
     */
    public const string WHIT_MONDAY = 'Whit Monday';

    /**
     * Corpus Christi (Easter sunday + 60 days)
     */
    public const string CORPUS_CHRISTI = 'Corpus Christi';

    /**
     * Assumption Day (yyyy-08-15)
     */
    public const string ASSUMPTION = 'Assumption Day';

    /**
     * Reformation Day
     */
    public const string REFORMATION_DAY = 'Reformation Day';

    /**
     * All Saints' Day (yyyy-11-01)
     */
    public const string ALL_SAINTS = 'All Saints\' Day';

    /**
     * Repentance Day - The wednesday before 11-23 (min: 11-16, max: 11-22)
     */
    public const string REPENTANCE_DAY = 'Repentance Day';

    /**
     * 12-24 : Holy Evening
     */
    public const string HOLY_EVENING = 'Holy Evening';

    /**
     * 12-25 : Christmas Day
     */
    public const string CHRISTMAS_DAY = 'Christmas Day';

    /**
     * 12-26 : Boxing Day
     */
    public const string BOXING_DAY = 'Boxing Day';

    /**
     * National Day
     */
    public const string NATIONAL_DAY = 'National Day';

    /**
     * Liberation Day
     */
    public const string LIBERATION_DAY = 'Liberation Day';

    /**
     * Day of the victory
     */
    public const string DAY_OF_VICTORY = 'Day of the victory';

    /**
     * The Saint Patrick's Day
     */
    public const string SAINT_PATRICKS_DAY = 'Saint Patrick\'s Day';

    public const string VALENTINES_DAY     = 'Valentine\'s Day';

    public const string CARNIVAL           = 'Carnival';

    public const string EARLY_SPRING_METEO = 'Early spring - meteorological';

    public const string EARLY_SPRING       = 'Early spring';

    public const string EQUINOX_MARCH      = 'Equinox March';

    public const string EQUINOX_SEPTEMBER  = 'Equinox September';


}

