<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright      © 2017-2020, Ni Irrty
 * @license        MIT
 * @since          2018-05-01
 * @version        1.3.0
 */


namespace Niirrty\Holiday\DateMove;


use DateTime;
use DateTimeInterface;
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
    public function getCondition(): ?callable;

    /**
     * Gets how many days a date should be moved if the condition matches the checked date
     *
     * @return int
     */
    public function getMoveDays(): int;

    /**
     * Gets the indexes of all country regions where this MoveCondition can be used for.
     *
     * A empty array or [ -1 ] means holidays of all regions handle this condition
     *
     * @return array
     */
    public function getAcceptedRegions(): array;

    /**
     * Gets if the current date move implementation condition matches the defined date.
     *
     * @param DateTimeInterface $date
     *
     * @return bool
     */
    public function matches( DateTimeInterface $date ): bool;

    /**
     * Moves the defined date by current defined amount of days and return the new instance.
     *
     * The check if the date value matches the move condition is not included! You have to call it before.
     *
     * @param DateTime $date
     *
     * @return DateTime
     */
    public function move( DateTime $date ): DateTime;


}
