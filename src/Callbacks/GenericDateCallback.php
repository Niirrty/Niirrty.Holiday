<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @license        MIT
 * @since          2018-05-08
 * @version        0.1.0
 */


declare( strict_types = 1 );


namespace Niirrty\Holiday\Callbacks;


use Niirrty\ArgumentException;
use Niirrty\Date\DateTime;


/**
 * Simple generic method to calculate a date by a callback function/method.
 *
 * @package Niirrty\Holiday\Callbacks
 */
class GenericDateCallback implements IDynamicDateCallback
{


   /**
    * The callback must accept a single parameter (the year, required to calculate the date) and must
    * return the calculated \DateTime value.
    *
    * @type callable
    */
   protected $_callback;


   /**
    * GenericDateCallback constructor.
    *
    * @param callable $callback
    */
   public function __construct( callable $callback )
   {

      $this->_callback = $callback;

   }


   /**
    * Calculate the holiday datetime for defined year and returns it.
    *
    * @param  int $year
    * @return \DateTime
    */
   public function calculate( int $year ) : \DateTime
   {

      return \call_user_func( $this->_callback, $year );

   }

}

