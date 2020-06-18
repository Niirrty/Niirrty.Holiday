<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @license        MIT
 * @since          2018-05-09
 * @version        0.1.0
 */


declare( strict_types = 1 );


namespace Niirrty\Holiday\Callbacks;


use Niirrty\Date\DateTime;


/**
 * To calculate an advent related holiday.
 *
 * First, you can get with it the date of a advent holiday (1.-4. Advent)
 * or you can calculate a holiday that depends to it, moved by a day offset.
 *
 * @package Niirrty\Holiday\Callbacks
 */
class AdventDateCallback implements IDynamicDateCallback
{


   /** @type int */
   protected $_adventDay;
   protected $_modifyDays;


   /**
    * AdventDateCallback constructor.
    *
    * @param int $adventDayNumber The number of the advent day. A valid value must be between 1 and 4.
    * @param int $modifyDays      The number of optional offset days used to move the date. For example if a
    *                             Date should be calculated that depends to an advent holiday.
    */
   public function __construct( int $adventDayNumber, int $modifyDays = 0 )
   {

      $this->_adventDay  = \min( 6, \max( 1, $adventDayNumber ) );
      $this->_modifyDays = $modifyDays;

   }


   /**
    * Calculate the holiday datetime for defined year and return it.
    *
    * @param  int $year
    * @return \DateTime
    */
   public function calculate( int $year ) : \DateTime
   {

      $refDate        = new DateTime( $year . '-12-24 00:00:00' );
      $multiplier     = 4 - $this->_adventDay;

      $refDate->modify( '-' . ( $refDate->getDayNumberOfWeek() + ( $multiplier * 7 ) ) . ' days' );

      if ( 0 !== $this->_modifyDays )
      {
         $refDate->modify( ( $this->_modifyDays > 0 ? '+' : '-' ) . \abs( $this->_modifyDays ) . ' days' );
      }

      return $refDate;

   }


}

