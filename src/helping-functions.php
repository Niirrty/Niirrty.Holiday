<?php


declare( strict_types = 1 );


namespace Niirrty\Holiday;


/**
 * Return if the date is at weekend (saturday or sunday)
 *
 * @param  int $year
 * @param  int $month
 * @param  int $day
 * @return bool
 */
function is_weekend( int $year, int $month, int $day ) : bool
{

   $wDay = \intval( \strftime( '%w', \mktime( 0, 0, 0, $month, $day, $year ) ) );

   return 0 === $wDay || 6 === $wDay;

}

/**
 * Gets if the defined year, month and day is a sunday.
 *
 * @param int $year
 * @param int $month
 * @param int $day
 * @return bool
 */
function is_sunday( int $year, int $month, int $day ) : bool
{

   return 0 === \intval( \strftime( '%w', \mktime( 0, 0, 0, $month, $day, $year ) ) );

}

/**
 * Gets if the defined year, month and day is a saturday.
 *
 * @param int $year
 * @param int $month
 * @param int $day
 * @return bool
 */
function is_saturday( int $year, int $month, int $day ) : bool
{

   return 6 === \intval( \strftime( '%w', \mktime( 0, 0, 0, $month, $day, $year ) ) );

}

