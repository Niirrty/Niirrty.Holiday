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
 * If a date should be build by a named date time string.
 *
 * For example 'last monday of january ' . $year
 *
 * so 'last monday of january ' is the prefix. Appendix is not required in this case
 *
 * @package Niirrty\Holiday\Callbacks
 */
class NamedDateCallback implements IDynamicDateCallback
{


   /**
    * The base holiday month.
    *
    * @type int
    */
   protected $_prefix;

   /**
    * The base holiday day of month
    *
    * @type int
    */
   protected $_appendix;


   /**
    * NamedDateCallback constructor.
    *
    * @param string|null $prefix   The date string prefix (year is pointed after it).
    * @param string|null $appendix The date string appendix (year is pointed before it).
    */
   public function __construct( ?string $prefix, ?string $appendix = null )
   {

      $this->_prefix   = $prefix;
      $this->_appendix = $appendix;

   }


   /**
    * Calculate the holiday datetime for defined year and returns it.
    *
    * @param  int $year
    * @return \DateTime
    */
   public function calculate( int $year ) : \DateTime
   {

      $dateString = ( ! empty( $this->_prefix ) ? $this->_prefix : '' )
                  . $year
                  . ( ! empty( $this->_appendix ) ? $this->_appendix : '' );

      return new DateTime( $dateString );

   }


}

