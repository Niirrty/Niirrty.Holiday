<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @license        MIT
 * @since          2018-05-01
 * @version        1.1.0
 */


declare( strict_types = 1 );


namespace Niirrty\Holiday\Callbacks;


use Niirrty\Date\DateTime;


/**
 * If a date should be calculated by a DateTime modification (modify() method format), it can be defined by this
 * dynamic date callback.
 *
 * @package Niirrty\Holiday\Callbacks
 */
class ModifyDateCallback implements IDynamicDateCallback
{


   /**
    * The base holiday month.
    *
    * @type int
    */
   protected $_month;

   /**
    * The base holiday day of month
    *
    * @type int
    */
   protected $_day;

   /**
    * The modifier string. e.g.: 'last monday'
    *
    * @type string
    */
   protected $_modifier;


   /**
    * ModifyDateCallback constructor.
    *
    * @param int    $month    The base holiday month.
    * @param int    $day      The base holiday day of month
    * @param string $modifier The modifier string. e.g.: 'last monday'
    */
   public function __construct( int $month, int $day, string $modifier )
   {

      $this->_month     = $month;
      $this->_day       = $day;
      $this->_modifier  = $modifier;

   }


   /**
    * Calculate the holiday datetime for defined year and returns it.
    *
    * @param  int $year
    * @return \DateTime
    */
   public function calculate( int $year ) : \DateTime
   {

      return DateTime::Create( $year, $this->_month, $this->_day )->modify( $this->_modifier );

   }


}

