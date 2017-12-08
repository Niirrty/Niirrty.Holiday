<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @package        Niirrty\Web
 * @since          25.11.17
 * @version        0.1.0
 */


namespace Niirrty\Holiday\DateMove;


use Niirrty\IValidStatus;


/**
 * Each conditional date move must implement this interface.
 */
interface IMoveCondition extends IValidStatus
{

   /**
    * Gets the Condition callback. It must accept a single parameter of type {@see \DateTimeInterface},
    * and must return boolean (true if the condition matches the date, false otherwise)
    *
    * @return callable|null
    */
   public function getCondition() : ?callable;

   /**
    * Gets how many days a date should be moved if the condition matches the checked date
    *
    * @return int
    */
   public function getMoveDays() : int;

   /**
    * Gets the indexes of all country regions where this MoveCondition can be used for.
    *
    * A empty array or [ -1 ] means holidays of all regions handle this condition
    *
    * @return array
    */
   public function getAcceptedRegions() : array;

   /**
    * Gets if the current date move implementation condition matches the defined date.
    *
    * @param \Niirrty\Date\DateTime $date
    * @return bool
    */
   public function matches( \Niirrty\Date\DateTime $date ) : bool;

   /**
    * Moves the defined date by current defined amount of days and return the new instance.
    *
    * The check if the date value matches the move condition is not included! You have to call it before.
    *
    * @param \Niirrty\Date\DateTime $date
    * @param  array $regions The optional indexes of all country regions where the holiday is valid for.
    * @return \Niirrty\Date\DateTime
    */
   public function move( \Niirrty\Date\DateTime $date, array $regions = [] ) : \Niirrty\Date\DateTime;

}