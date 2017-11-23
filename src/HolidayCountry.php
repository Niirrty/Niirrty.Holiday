<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


declare( strict_types = 1 );


namespace Niirrty\Holiday;


/**
 * Defines all countries with known holidays.
 *
 * @package Niirrty\Holiday
 */
interface HolidayCountry
{


   /**
    * Germany
    */
   public const GERMANY = 'germany';

   /**
    * Austria
    */
   public const AUSTRIA = 'austria';

   /**
    * United kingdom
    */
   public const UNITED_KINGDOM = 'uk';

   /**
    * Defines all known countries.
    *
    * @type array
    */
   public const KNOWN_COUNTRIES = [ self::GERMANY, self::AUSTRIA ];

}

