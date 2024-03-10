<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @license        MIT
 * @since          2018-05-01
 * @version        0.1.0
 */


namespace Niirrty\Holiday\Tests;


use Niirrty\Holiday\CountryDefinitionsFactory;
use Niirrty\Holiday\DefinitionCollection;
use Niirrty\Holiday\Identifiers;
use Niirrty\IO\FileFormatException;
use Niirrty\IO\FileNotFoundException;
use PHPUnit\Framework\TestCase;


class CountryDefinitionsFactoryTest extends TestCase
{

   const HOLIDAYS = [
      // Tests for Germany covers now also none work free holidays
      'de' => [
         2016 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ], 'f' => true ],
            Identifiers::EPIPHANY => [ 'm' => 1, 'd' => 6, 'r' => [ 0, 1, 46 ], 'f' => true ],
            'Weiberfastnacht' => [ 'm' => 2, 'd' => 4, 'r' => [ -1 ], 'f' => false ],
            'Carnival Saturday' => [ 'm' => 2, 'd' => 6, 'r' => [ -1 ], 'f' => false ],
            'Carnival Sunday' => [ 'm' => 2, 'd' => 7, 'r' => [ -1 ], 'f' => false ],
            'Rose-Monday' => [ 'm' => 2, 'd' => 8, 'r' => [ -1 ], 'f' => false ],
            Identifiers::CARNIVAL => [ 'm' => 2, 'd' => 9, 'r' => [ -1 ], 'f' => false ],
            'Aschermittwoch' => [ 'm' => 2, 'd' => 10, 'r' => [ -1 ], 'f' => false ],
            Identifiers::VALENTINES_DAY => [ 'm' => 2, 'd' => 14, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EARLY_SPRING_METEO => [ 'm' => 3, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EQUINOX_MARCH => [ 'm' => 3, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            'Palm Sunday' => [ 'm' => 3, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            'Holy Thursday' => [ 'm' => 3, 'd' => 24, 'r' => [ -1 ], 'f' => false ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 3, 'd' => 25, 'r' => [ -1 ], 'f' => true ],
            Identifiers::EASTER_SUNDAY => [ 'm' => 3, 'd' => 27, 'r' => [ 3, 6 ], 'f' => true ],
            Identifiers::EASTER_MONDAY => [ 'm' => 3, 'd' => 28, 'r' => [ -1 ], 'f' => true ],
            'DST Begin' => [ 'm' => 3, 'd' => 27, 'r' => [ -1 ], 'f' => false ],
            'Walpurgis Night' => [ 'm' => 4, 'd' => 30, 'r' => [ -1 ], 'f' => false ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ], 'f' => true ],
            'Mother\'s Day' => [ 'm' => 5, 'd' => 8, 'r' => [ -1 ], 'f' => false ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 5, 'r' => [ -1 ], 'f' => true ],
            Identifiers::WHIT_SUNDAY => [ 'm' => 5, 'd' => 15, 'r' => [ 3, 6 ], 'f' => true ],
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 16, 'r' => [ -1 ], 'f' => true ],
            Identifiers::CORPUS_CHRISTI => [ 'm' => 5, 'd' => 26, 'r' => [ 6, 9, 10, 11, 16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46 ], 'f' => true ],
            'Summer beginning - meteorological' => [ 'm' => 6, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Children\'s Day' => [ 'm' => 6, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Summer beginning' => [ 'm' => 6, 'd' => 21, 'r' => [ -1 ], 'f' => false ],
            'Augsburg High Peace Festival' => [ 'm' => 8, 'd' => 8, 'r' => [ 45 ], 'f' => true ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ 46, 11 ], 'f' => true ],
            'Autumn beginning - meteorological' => [ 'm' => 9, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EQUINOX_SEPTEMBER => [ 'm' => 9, 'd' => 22, 'r' => [ -1 ], 'f' => false ],
            'Thanksgiving' => [ 'm' => 10, 'd' => 2, 'r' => [ -1 ], 'f' => false ],
            'Day of German unity' => [ 'm' => 10, 'd' => 3, 'r' => [ -1 ], 'f' => true ],
            'World Children\'s Day' => [ 'm' => 10, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            Identifiers::REFORMATION_DAY => [ 'm' => 10, 'd' => 31, 'r' => [ 0, 3, 6, 7, 9, 11, 12, 13, 15, 16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44], 'f' => true ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ 0, 1, 9, 10, 11, 45, 46 ], 'f' => true ],
            'All Souls Day' => [ 'm' => 11, 'd' => 2, 'r' => [ -1 ], 'f' => false ],
            'Martinmas' => [ 'm' => 11, 'd' => 11, 'r' => [ -1 ], 'f' => false ],
            'Memorial Day' => [ 'm' => 11, 'd' => 13, 'r' => [ -1 ], 'f' => false ],
            Identifiers::REPENTANCE_DAY => [ 'm' => 11, 'd' => 16, 'r' => [ 12, 16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31 ], 'f' => true ],
            'Dead Sunday' => [ 'm' => 11, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            '1th Advent' => [ 'm' => 11, 'd' => 27, 'r' => [ -1 ], 'f' => false ],
            'Winter beginning - meteorological' => [ 'm' => 12, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            '2nd Advent' => [ 'm' => 12, 'd' => 4, 'r' => [ -1 ], 'f' => false ],
            'Nicholas' => [ 'm' => 12, 'd' => 6, 'r' => [ -1 ], 'f' => false ],
            '3rd Advent' => [ 'm' => 12, 'd' => 11, 'r' => [ -1 ], 'f' => false ],
            '4rd Advent' => [ 'm' => 12, 'd' => 18, 'r' => [ -1 ], 'f' => false ],
            'Winter beginning' => [ 'm' => 12, 'd' => 21, 'r' => [ -1 ], 'f' => false ],
            'Holy Evening' => [ 'm' => 12, 'd' => 24, 'r' => [ -1 ], 'f' => false ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ], 'f' => true ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ], 'f' => true ],
            'New Year\'s Eve' => [ 'm' => 12, 'd' => 31, 'r' => [ -1 ], 'f' => false ]
         ],
         2017 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ], 'f' => true ],
            Identifiers::EPIPHANY => [ 'm' => 1, 'd' => 6, 'r' => [ 0, 1, 46 ], 'f' => true ],
            'Weiberfastnacht' => [ 'm' => 2, 'd' => 23, 'r' => [ -1 ], 'f' => false ],
            'Carnival Saturday' => [ 'm' => 2, 'd' => 25, 'r' => [ -1 ], 'f' => false ],
            'Carnival Sunday' => [ 'm' => 2, 'd' => 26, 'r' => [ -1 ], 'f' => false ],
            'Rose-Monday' => [ 'm' => 2, 'd' => 27, 'r' => [ -1 ], 'f' => false ],
            Identifiers::CARNIVAL => [ 'm' => 2, 'd' => 28, 'r' => [ -1 ], 'f' => false ],
            'Aschermittwoch' => [ 'm' => 3, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            Identifiers::VALENTINES_DAY => [ 'm' => 2, 'd' => 14, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EARLY_SPRING_METEO => [ 'm' => 3, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EQUINOX_MARCH => [ 'm' => 3, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            'Palm Sunday' => [ 'm' => 4, 'd' => 9, 'r' => [ -1 ], 'f' => false ],
            'Holy Thursday' => [ 'm' => 4, 'd' => 13, 'r' => [ -1 ], 'f' => false ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 4, 'd' => 14, 'r' => [ -1 ], 'f' => true ],
            Identifiers::EASTER_SUNDAY => [ 'm' => 4, 'd' => 16, 'r' => [ 3, 6 ], 'f' => true ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 17, 'r' => [ -1 ], 'f' => true ],
            'DST Begin' => [ 'm' => 3, 'd' => 26, 'r' => [ -1 ], 'f' => false ],
            'Walpurgis Night' => [ 'm' => 4, 'd' => 30, 'r' => [ -1 ], 'f' => false ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ], 'f' => true ],
            'Mother\'s Day' => [ 'm' => 5, 'd' => 14, 'r' => [ -1 ], 'f' => false ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 25, 'r' => [ -1 ], 'f' => true ],
            Identifiers::WHIT_SUNDAY => [ 'm' => 6, 'd' => 4, 'r' => [ 3, 6 ], 'f' => true ],
            Identifiers::WHIT_MONDAY => [ 'm' => 6, 'd' => 5, 'r' => [ -1 ], 'f' => true ],
            Identifiers::CORPUS_CHRISTI => [ 'm' => 6, 'd' => 15, 'r' => [ 6, 9, 10, 11, 16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46 ], 'f' => true ],
            'Summer beginning - meteorological' => [ 'm' => 6, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Children\'s Day' => [ 'm' => 6, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Summer beginning' => [ 'm' => 6, 'd' => 21, 'r' => [ -1 ], 'f' => false ],
            'Augsburg High Peace Festival' => [ 'm' => 8, 'd' => 8, 'r' => [ 45 ], 'f' => true ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ 46, 11 ], 'f' => true ],
            'Autumn beginning - meteorological' => [ 'm' => 9, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EQUINOX_SEPTEMBER => [ 'm' => 9, 'd' => 22, 'r' => [ -1 ], 'f' => false ],
            'Thanksgiving' => [ 'm' => 10, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Day of German unity' => [ 'm' => 10, 'd' => 3, 'r' => [ -1 ], 'f' => true ],
            'World Children\'s Day' => [ 'm' => 10, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            Identifiers::REFORMATION_DAY => [ 'm' => 10, 'd' => 31, 'r' => [ 0, 3, 6, 7, 9, 11, 12, 13, 15, 16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44], 'f' => true ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ 0, 1, 9, 10, 11, 45, 46 ], 'f' => true ],
            'All Souls Day' => [ 'm' => 11, 'd' => 2, 'r' => [ -1 ], 'f' => false ],
            'Martinmas' => [ 'm' => 11, 'd' => 11, 'r' => [ -1 ], 'f' => false ],
            'Memorial Day' => [ 'm' => 11, 'd' => 19, 'r' => [ -1 ], 'f' => false ],
            Identifiers::REPENTANCE_DAY => [ 'm' => 11, 'd' => 22, 'r' => [ 12, 16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31 ], 'f' => true ],
            'Dead Sunday' => [ 'm' => 11, 'd' => 26, 'r' => [ -1 ], 'f' => false ],
            '1th Advent' => [ 'm' => 12, 'd' => 3, 'r' => [ -1 ], 'f' => false ],
            'Winter beginning - meteorological' => [ 'm' => 12, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            '2nd Advent' => [ 'm' => 12, 'd' => 10, 'r' => [ -1 ], 'f' => false ],
            'Nicholas' => [ 'm' => 12, 'd' => 6, 'r' => [ -1 ], 'f' => false ],
            '3rd Advent' => [ 'm' => 12, 'd' => 17, 'r' => [ -1 ], 'f' => false ],
            '4rd Advent' => [ 'm' => 12, 'd' => 24, 'r' => [ -1 ], 'f' => false ],
            'Winter beginning' => [ 'm' => 12, 'd' => 21, 'r' => [ -1 ], 'f' => false ],
            'Holy Evening' => [ 'm' => 12, 'd' => 24, 'r' => [ -1 ], 'f' => false ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ], 'f' => true ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ], 'f' => true ],
            'New Year\'s Eve' => [ 'm' => 12, 'd' => 31, 'r' => [ -1 ], 'f' => false ]
         ],
         2018 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ], 'f' => true ],
            Identifiers::EPIPHANY => [ 'm' => 1, 'd' => 6, 'r' => [ 0, 1, 46 ], 'f' => true ],
            'Weiberfastnacht' => [ 'm' => 2, 'd' => 8, 'r' => [ -1 ], 'f' => false ],
            'Carnival Saturday' => [ 'm' => 2, 'd' => 10, 'r' => [ -1 ], 'f' => false ],
            'Carnival Sunday' => [ 'm' => 2, 'd' => 11, 'r' => [ -1 ], 'f' => false ],
            'Rose-Monday' => [ 'm' => 2, 'd' => 12, 'r' => [ -1 ], 'f' => false ],
            Identifiers::CARNIVAL => [ 'm' => 2, 'd' => 13, 'r' => [ -1 ], 'f' => false ],
            'Aschermittwoch' => [ 'm' => 2, 'd' => 14, 'r' => [ -1 ], 'f' => false ],
            Identifiers::VALENTINES_DAY => [ 'm' => 2, 'd' => 14, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EARLY_SPRING_METEO => [ 'm' => 3, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EQUINOX_MARCH => [ 'm' => 3, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            'Palm Sunday' => [ 'm' => 3, 'd' => 25, 'r' => [ -1 ], 'f' => false ],
            'Holy Thursday' => [ 'm' => 3, 'd' => 29, 'r' => [ -1 ], 'f' => false ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 3, 'd' => 30, 'r' => [ -1 ], 'f' => true ],
            Identifiers::EASTER_SUNDAY => [ 'm' => 4, 'd' => 1, 'r' => [ 3, 6 ], 'f' => true ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 2, 'r' => [ -1 ], 'f' => true ],
            'DST Begin' => [ 'm' => 3, 'd' => 25, 'r' => [ -1 ], 'f' => false ],
            'Walpurgis Night' => [ 'm' => 4, 'd' => 30, 'r' => [ -1 ], 'f' => false ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ], 'f' => true ],
            'Mother\'s Day' => [ 'm' => 5, 'd' => 13, 'r' => [ -1 ], 'f' => false ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 10, 'r' => [ -1 ], 'f' => true ],
            Identifiers::WHIT_SUNDAY => [ 'm' => 5, 'd' => 20, 'r' => [ 3, 6 ], 'f' => true ],
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 21, 'r' => [ -1 ], 'f' => true ],
            Identifiers::CORPUS_CHRISTI => [ 'm' => 5, 'd' => 31, 'r' => [ 6, 9, 10, 11, 16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46 ], 'f' => true ],
            'Summer beginning - meteorological' => [ 'm' => 6, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Children\'s Day' => [ 'm' => 6, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Summer beginning' => [ 'm' => 6, 'd' => 21, 'r' => [ -1 ], 'f' => false ],
            'Augsburg High Peace Festival' => [ 'm' => 8, 'd' => 8, 'r' => [ 45 ], 'f' => true ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ 46, 11 ], 'f' => true ],
            'Autumn beginning - meteorological' => [ 'm' => 9, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EQUINOX_SEPTEMBER => [ 'm' => 9, 'd' => 23, 'r' => [ -1 ], 'f' => false ],
            'Thanksgiving' => [ 'm' => 10, 'd' => 7, 'r' => [ -1 ], 'f' => false ],
            'Day of German unity' => [ 'm' => 10, 'd' => 3, 'r' => [ -1 ], 'f' => true ],
            'World Children\'s Day' => [ 'm' => 10, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            Identifiers::REFORMATION_DAY => [ 'm' => 10, 'd' => 31, 'r' => [ 0, 3, 6, 7, 9, 11, 12, 13, 15, 16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44], 'f' => true ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ 0, 1, 9, 10, 11, 45, 46 ], 'f' => true ],
            'All Souls Day' => [ 'm' => 11, 'd' => 2, 'r' => [ -1 ], 'f' => false ],
            'Martinmas' => [ 'm' => 11, 'd' => 11, 'r' => [ -1 ], 'f' => false ],
            'Memorial Day' => [ 'm' => 11, 'd' => 18, 'r' => [ -1 ], 'f' => false ],
            Identifiers::REPENTANCE_DAY => [ 'm' => 11, 'd' => 21, 'r' => [ 12, 16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31 ], 'f' => true ],
            'Dead Sunday' => [ 'm' => 11, 'd' => 25, 'r' => [ -1 ], 'f' => false ],
            '1th Advent' => [ 'm' => 12, 'd' => 2, 'r' => [ -1 ], 'f' => false ],
            'Winter beginning - meteorological' => [ 'm' => 12, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            '2nd Advent' => [ 'm' => 12, 'd' => 9, 'r' => [ -1 ], 'f' => false ],
            'Nicholas' => [ 'm' => 12, 'd' => 6, 'r' => [ -1 ], 'f' => false ],
            '3rd Advent' => [ 'm' => 12, 'd' => 16, 'r' => [ -1 ], 'f' => false ],
            '4rd Advent' => [ 'm' => 12, 'd' => 23, 'r' => [ -1 ], 'f' => false ],
            'Winter beginning' => [ 'm' => 12, 'd' => 21, 'r' => [ -1 ], 'f' => false ],
            'Holy Evening' => [ 'm' => 12, 'd' => 24, 'r' => [ -1 ], 'f' => false ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ], 'f' => true ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ], 'f' => true ],
            'New Year\'s Eve' => [ 'm' => 12, 'd' => 31, 'r' => [ -1 ], 'f' => false ]
         ]
      ],
      // Tests for Austria covers now also none work free holidays
      'at' => [
         2016 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ], 'f' => true ],
            Identifiers::EPIPHANY => [ 'm' => 1, 'd' => 6, 'r' => [ -1 ], 'f' => true ],
            Identifiers::CARNIVAL => [ 'm' => 2, 'd' => 9, 'r' => [ -1 ], 'f' => false ],
            Identifiers::VALENTINES_DAY => [ 'm' => 2, 'd' => 14, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EARLY_SPRING_METEO => [ 'm' => 3, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Joseph of Nazareth' => [ 'm' => 3, 'd' => 19, 'r' => [ 1, 5, 6, 7 ], 'f' => true ],
            Identifiers::EQUINOX_MARCH => [ 'm' => 3, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            'Palm Sunday' => [ 'm' => 3, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            'Holy Thursday' => [ 'm' => 3, 'd' => 24, 'r' => [ -1 ], 'f' => false ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 3, 'd' => 25, 'r' => [ -1 ], 'f' => true ],
            Identifiers::EASTER_SUNDAY => [ 'm' => 3, 'd' => 27, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EASTER_MONDAY => [ 'm' => 3, 'd' => 28, 'r' => [ -1 ], 'f' => true ],
            'DST Begin' => [ 'm' => 3, 'd' => 27, 'r' => [ -1 ], 'f' => false ],
            'Walpurgis Night' => [ 'm' => 4, 'd' => 30, 'r' => [ -1 ], 'f' => false ],
            'State Day' => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ], 'f' => true ],
            'Saint Florian' => [ 'm' => 5, 'd' => 4, 'r' => [ 3 ], 'f' => true ],
            'Mother\'s Day' => [ 'm' => 5, 'd' => 8, 'r' => [ -1 ], 'f' => false ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 5, 'r' => [ -1 ], 'f' => true ],
            Identifiers::WHIT_SUNDAY => [ 'm' => 5, 'd' => 15, 'r' => [ -1 ], 'f' => false ],
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 16, 'r' => [ -1 ], 'f' => true ],
            Identifiers::CORPUS_CHRISTI => [ 'm' => 5, 'd' => 26, 'r' => [ -1 ], 'f' => true ],
            'Summer beginning - meteorological' => [ 'm' => 6, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Children\'s Day' => [ 'm' => 6, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Summer beginning' => [ 'm' => 6, 'd' => 21, 'r' => [ -1 ], 'f' => false ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ -1 ], 'f' => true ],
            'Autumn beginning - meteorological' => [ 'm' => 9, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EQUINOX_SEPTEMBER => [ 'm' => 9, 'd' => 22, 'r' => [ -1 ], 'f' => false ],
            'Rupert of Salzburg' => [ 'm' => 9, 'd' => 24, 'r' => [ 4 ], 'f' => true ],
            'Thanksgiving' => [ 'm' => 10, 'd' => 2, 'r' => [ -1 ], 'f' => false ],
            'Day of referendum' => [ 'm' => 10, 'd' => 10, 'r' => [ -1 ], 'f' => true ],
            'World Children\'s Day' => [ 'm' => 10, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            Identifiers::NATIONAL_DAY => [ 'm' => 10, 'd' => 26, 'r' => [ -1 ], 'f' => true ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ -1 ], 'f' => true ],
            'Martin of Tours' => [ 'm' => 11, 'd' => 11, 'r' => [ 0 ], 'f' => true ],
            'Memorial Day' => [ 'm' => 11, 'd' => 13, 'r' => [ -1 ], 'f' => false ],
            'Leopold III.' => [ 'm' => 11, 'd' => 15, 'r' => [ 2, 8 ], 'f' => true ],
            'Dead Sunday' => [ 'm' => 11, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            '1th Advent' => [ 'm' => 11, 'd' => 27, 'r' => [ -1 ], 'f' => false ],
            'Immaculate conception' => [ 'm' => 12, 'd' => 8, 'r' => [ -1 ], 'f' => true ],
            'Winter beginning - meteorological' => [ 'm' => 12, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            '2nd Advent' => [ 'm' => 12, 'd' => 4, 'r' => [ -1 ], 'f' => false ],
            'Nicholas' => [ 'm' => 12, 'd' => 6, 'r' => [ -1 ], 'f' => false ],
            '3rd Advent' => [ 'm' => 12, 'd' => 11, 'r' => [ -1 ], 'f' => false ],
            '4rd Advent' => [ 'm' => 12, 'd' => 18, 'r' => [ -1 ], 'f' => false ],
            'Winter beginning' => [ 'm' => 12, 'd' => 21, 'r' => [ -1 ], 'f' => false ],
            'Holy Evening' => [ 'm' => 12, 'd' => 24, 'r' => [ -1 ], 'f' => false ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ], 'f' => true ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ], 'f' => true ],
            'New Year\'s Eve' => [ 'm' => 12, 'd' => 31, 'r' => [ -1 ], 'f' => false ]
         ],
         2017 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ], 'f' => true ],
            Identifiers::EPIPHANY => [ 'm' => 1, 'd' => 6, 'r' => [ -1 ], 'f' => true ],
            Identifiers::CARNIVAL => [ 'm' => 2, 'd' => 28, 'r' => [ -1 ], 'f' => false ],
            Identifiers::VALENTINES_DAY => [ 'm' => 2, 'd' => 14, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EARLY_SPRING_METEO => [ 'm' => 3, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Joseph of Nazareth' => [ 'm' => 3, 'd' => 19, 'r' => [ 1, 5, 6, 7 ], 'f' => true ],
            Identifiers::EQUINOX_MARCH => [ 'm' => 3, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            'Palm Sunday' => [ 'm' => 4, 'd' => 9, 'r' => [ -1 ], 'f' => false ],
            'Holy Thursday' => [ 'm' => 4, 'd' => 13, 'r' => [ -1 ], 'f' => false ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 4, 'd' => 14, 'r' => [ -1 ], 'f' => true ],
            Identifiers::EASTER_SUNDAY => [ 'm' => 4, 'd' => 16, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 17, 'r' => [ -1 ] ],
            'DST Begin' => [ 'm' => 3, 'd' => 26, 'r' => [ -1 ], 'f' => false ],
            'Walpurgis Night' => [ 'm' => 4, 'd' => 30, 'r' => [ -1 ], 'f' => false ],
            'State Day' => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            'Saint Florian' => [ 'm' => 5, 'd' => 4, 'r' => [ 3 ] ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 25, 'r' => [ -1 ] ],
            'Mother\'s Day' => [ 'm' => 5, 'd' => 14, 'r' => [ -1 ], 'f' => false ],
            Identifiers::WHIT_SUNDAY => [ 'm' => 6, 'd' => 4, 'r' => [ -1 ], 'f' => true ],
            Identifiers::WHIT_MONDAY => [ 'm' => 6, 'd' => 5, 'r' => [ -1 ] ],
            Identifiers::CORPUS_CHRISTI => [ 'm' => 6, 'd' => 15, 'r' => [ -1 ] ],
            'Summer beginning - meteorological' => [ 'm' => 6, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Children\'s Day' => [ 'm' => 6, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Summer beginning' => [ 'm' => 6, 'd' => 21, 'r' => [ -1 ], 'f' => false ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ -1 ] ],
            'Autumn beginning - meteorological' => [ 'm' => 9, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EQUINOX_SEPTEMBER => [ 'm' => 9, 'd' => 22, 'r' => [ -1 ], 'f' => false ],
            'Rupert of Salzburg' => [ 'm' => 9, 'd' => 24, 'r' => [ 4 ] ],
            'Thanksgiving' => [ 'm' => 10, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Day of referendum' => [ 'm' => 10, 'd' => 10, 'r' => [ -1 ] ],
            'World Children\'s Day' => [ 'm' => 10, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            Identifiers::NATIONAL_DAY => [ 'm' => 10, 'd' => 26, 'r' => [ -1 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ -1 ] ],
            'Martin of Tours' => [ 'm' => 11, 'd' => 11, 'r' => [ 0 ] ],
            'Memorial Day' => [ 'm' => 11, 'd' => 19, 'r' => [ -1 ], 'f' => false ],
            'Leopold III.' => [ 'm' => 11, 'd' => 15, 'r' => [ 2, 8 ] ],
            'Dead Sunday' => [ 'm' => 11, 'd' => 26, 'r' => [ -1 ], 'f' => false ],
            '1th Advent' => [ 'm' => 12, 'd' => 3, 'r' => [ -1 ], 'f' => false ],
            'Immaculate conception' => [ 'm' => 12, 'd' => 8, 'r' => [ -1 ] ],
            'Winter beginning - meteorological' => [ 'm' => 12, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            '2nd Advent' => [ 'm' => 12, 'd' => 10, 'r' => [ -1 ], 'f' => false ],
            'Nicholas' => [ 'm' => 12, 'd' => 6, 'r' => [ -1 ], 'f' => false ],
            '3rd Advent' => [ 'm' => 12, 'd' => 17, 'r' => [ -1 ], 'f' => false ],
            '4rd Advent' => [ 'm' => 12, 'd' => 24, 'r' => [ -1 ], 'f' => false ],
            'Winter beginning' => [ 'm' => 12, 'd' => 21, 'r' => [ -1 ], 'f' => false ],
            'Holy Evening' => [ 'm' => 12, 'd' => 24, 'r' => [ -1 ], 'f' => false ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ],
            'New Year\'s Eve' => [ 'm' => 12, 'd' => 31, 'r' => [ -1 ], 'f' => false ]
         ],
         2018 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::EPIPHANY => [ 'm' => 1, 'd' => 6, 'r' => [ -1 ] ],
            Identifiers::CARNIVAL => [ 'm' => 2, 'd' => 13, 'r' => [ -1 ], 'f' => false ],
            Identifiers::VALENTINES_DAY => [ 'm' => 2, 'd' => 14, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EARLY_SPRING_METEO => [ 'm' => 3, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Joseph of Nazareth' => [ 'm' => 3, 'd' => 19, 'r' => [ 1, 5, 6, 7 ] ],
            Identifiers::EQUINOX_MARCH => [ 'm' => 3, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            'Palm Sunday' => [ 'm' => 3, 'd' => 25, 'r' => [ -1 ], 'f' => false ],
            'Holy Thursday' => [ 'm' => 3, 'd' => 29, 'r' => [ -1 ], 'f' => false ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 3, 'd' => 30, 'r' => [ -1 ] ],
            Identifiers::EASTER_SUNDAY => [ 'm' => 4, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 2, 'r' => [ -1 ] ],
            'DST Begin' => [ 'm' => 3, 'd' => 25, 'r' => [ -1 ], 'f' => false ],
            'Walpurgis Night' => [ 'm' => 4, 'd' => 30, 'r' => [ -1 ], 'f' => false ],
            'State Day' => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            'Saint Florian' => [ 'm' => 5, 'd' => 4, 'r' => [ 3 ] ],
            'Mother\'s Day' => [ 'm' => 5, 'd' => 13, 'r' => [ -1 ], 'f' => false ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 10, 'r' => [ -1 ] ],
            Identifiers::WHIT_SUNDAY => [ 'm' => 5, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 21, 'r' => [ -1 ] ],
            Identifiers::CORPUS_CHRISTI => [ 'm' => 5, 'd' => 31, 'r' => [ -1 ] ],
            'Summer beginning - meteorological' => [ 'm' => 6, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Children\'s Day' => [ 'm' => 6, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            'Summer beginning' => [ 'm' => 6, 'd' => 21, 'r' => [ -1 ], 'f' => false ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ -1 ] ],
            'Autumn beginning - meteorological' => [ 'm' => 9, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            Identifiers::EQUINOX_SEPTEMBER => [ 'm' => 9, 'd' => 23, 'r' => [ -1 ], 'f' => false ],
            'Rupert of Salzburg' => [ 'm' => 9, 'd' => 24, 'r' => [ 4 ] ],
            'Thanksgiving' => [ 'm' => 10, 'd' => 7, 'r' => [ -1 ], 'f' => false ],
            'Day of referendum' => [ 'm' => 10, 'd' => 10, 'r' => [ -1 ] ],
            'World Children\'s Day' => [ 'm' => 10, 'd' => 20, 'r' => [ -1 ], 'f' => false ],
            Identifiers::NATIONAL_DAY => [ 'm' => 10, 'd' => 26, 'r' => [ -1 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ -1 ] ],
            'Martin of Tours' => [ 'm' => 11, 'd' => 11, 'r' => [ 0 ] ],
            'Memorial Day' => [ 'm' => 11, 'd' => 18, 'r' => [ -1 ], 'f' => false ],
            'Leopold III.' => [ 'm' => 11, 'd' => 15, 'r' => [ 2, 8 ] ],
            'Immaculate conception' => [ 'm' => 12, 'd' => 8, 'r' => [ -1 ] ],
            'Dead Sunday' => [ 'm' => 11, 'd' => 25, 'r' => [ -1 ], 'f' => false ],
            '1th Advent' => [ 'm' => 12, 'd' => 2, 'r' => [ -1 ], 'f' => false ],
            'Winter beginning - meteorological' => [ 'm' => 12, 'd' => 1, 'r' => [ -1 ], 'f' => false ],
            '2nd Advent' => [ 'm' => 12, 'd' => 9, 'r' => [ -1 ], 'f' => false ],
            'Nicholas' => [ 'm' => 12, 'd' => 6, 'r' => [ -1 ], 'f' => false ],
            '3rd Advent' => [ 'm' => 12, 'd' => 16, 'r' => [ -1 ], 'f' => false ],
            '4rd Advent' => [ 'm' => 12, 'd' => 23, 'r' => [ -1 ], 'f' => false ],
            'Winter beginning' => [ 'm' => 12, 'd' => 21, 'r' => [ -1 ], 'f' => false ],
            'Holy Evening' => [ 'm' => 12, 'd' => 24, 'r' => [ -1 ], 'f' => false ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ],
            'New Year\'s Eve' => [ 'm' => 12, 'd' => 31, 'r' => [ -1 ], 'f' => false ]
         ]
      ],
      'ch' => [
         2016 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ], 'f' => true ],
            'Berchtold' => [ 'm' => 1, 'd' => 2, 'r' => [ 0, 1, 2, 5, 7, 8, 9, 10, 13, 17, 19, 21, 23, 24, 25 ], 'f' => true ],
            Identifiers::EPIPHANY => [ 'm' => 1, 'd' => 6, 'r' => [ 3, 4, 17, 20 ], 'f' => true ],
            'St. Joseph\'s' => [ 'm' => 3, 'd' => 19, 'r' => [ 2, 3, 4, 6, 8, 17, 20, 22 ], 'f' => true ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 3, 'd' => 25, 'r' => [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,21,23,24,25 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 3, 'd' => 28, 'r' => [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,23,24,25 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ 0, 9, 10, 11, 12, 13, 18, 19, 20, 23, 25 ] ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 5, 'r' => [ -1 ] ],
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 16, 'r' => [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,23,24,25 ] ],
            Identifiers::CORPUS_CHRISTI => [ 'm' => 5, 'd' => 26, 'r' => [ 2, 3, 4, 5, 6, 8, 9, 10, 12, 15, 17, 18, 20, 22, 23, 25 ] ],
            Identifiers::NATIONAL_DAY => [ 'm' => 8, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ 2, 3, 4, 5, 6, 8, 9, 10, 12, 15, 17, 18, 20, 22, 25 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ 2, 3, 4, 5, 6, 7, 8, 9, 10, 15, 16, 17, 18, 20, 22, 25 ] ],
            'Immaculate conception' => [ 'm' => 12, 'd' => 8, 'r' => [ 2, 3, 4, 5, 6, 8, 9, 10, 15, 17, 18, 20, 22 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20 ] ]
         ],
         2017 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            'Berchtold' => [ 'm' => 1, 'd' => 2, 'r' => [ 0, 1, 2, 5, 7, 8, 9, 10, 13, 17, 19, 21, 23, 24, 25 ] ],
            Identifiers::EPIPHANY => [ 'm' => 1, 'd' => 6, 'r' => [ 3, 4, 17, 20 ] ],
            'St. Joseph\'s' => [ 'm' => 3, 'd' => 19, 'r' => [ 2, 3, 4, 6, 8, 17, 20, 22 ] ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 4, 'd' => 14, 'r' => [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,21,23,24,25 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 17, 'r' => [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,23,24,25 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ 0, 9, 10, 11, 12, 13, 18, 19, 20, 23, 25 ] ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::WHIT_MONDAY => [ 'm' => 6, 'd' => 5, 'r' => [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,23,24,25 ] ],
            Identifiers::CORPUS_CHRISTI => [ 'm' => 6, 'd' => 15, 'r' => [ 2, 3, 4, 5, 6, 8, 9, 10, 12, 15, 17, 18, 20, 22, 23, 25 ] ],
            Identifiers::NATIONAL_DAY => [ 'm' => 8, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ 2, 3, 4, 5, 6, 8, 9, 10, 12, 15, 17, 18, 20, 22, 25 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ 2, 3, 4, 5, 6, 7, 8, 9, 10, 15, 16, 17, 18, 20, 22, 25 ] ],
            'Immaculate conception' => [ 'm' => 12, 'd' => 8, 'r' => [ 2, 3, 4, 5, 6, 8, 9, 10, 15, 17, 18, 20, 22 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20 ] ]
         ],
         2018 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            'Berchtold' => [ 'm' => 1, 'd' => 2, 'r' => [ 0, 1, 2, 5, 7, 8, 9, 10, 13, 17, 19, 21, 23, 24, 25 ] ],
            Identifiers::EPIPHANY => [ 'm' => 1, 'd' => 6, 'r' => [ 3, 4, 17, 20 ] ],
            'St. Joseph\'s' => [ 'm' => 3, 'd' => 19, 'r' => [ 2, 3, 4, 6, 8, 17, 20, 22 ] ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 3, 'd' => 30, 'r' => [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,21,23,24,25 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 2, 'r' => [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,23,24,25 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ 0, 9, 10, 11, 12, 13, 18, 19, 20, 23, 25 ] ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 10, 'r' => [ -1 ] ],
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 21, 'r' => [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,23,24,25 ] ],
            Identifiers::CORPUS_CHRISTI => [ 'm' => 5, 'd' => 31, 'r' => [ 2, 3, 4, 5, 6, 8, 9, 10, 12, 15, 17, 18, 20, 22, 23, 25 ] ],
            Identifiers::NATIONAL_DAY => [ 'm' => 8, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ 2, 3, 4, 5, 6, 8, 9, 10, 12, 15, 17, 18, 20, 22, 25 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ 2, 3, 4, 5, 6, 7, 8, 9, 10, 15, 16, 17, 18, 20, 22, 25 ] ],
            'Immaculate conception' => [ 'm' => 12, 'd' => 8, 'r' => [ 2, 3, 4, 5, 6, 8, 9, 10, 15, 17, 18, 20, 22 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20 ] ]
         ]
      ],
      'cz' => [
         2003 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 21, 'r' => [ -1 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::LIBERATION_DAY => [ 'm' => 5, 'd' => 8, 'r' => [ -1 ] ],
            'Day of Slavic Intelligence by Cyril and Methodius' => [ 'm' => 7, 'd' => 5, 'r' => [ -1 ] ],
            'Day of the burning of Jan Hus' => [ 'm' => 7, 'd' => 6, 'r' => [ -1 ] ],
            'Day of the Czech statehood' => [ 'm' => 9, 'd' => 28, 'r' => [ -1 ] ],
            'Day of the emergence of an independent Czechoslovak state' => [ 'm' => 10, 'd' => 28, 'r' => [ -1 ] ],
            'Day of struggle for freedom and democracy' => [ 'm' => 11, 'd' => 17, 'r' => [ -1 ] ],
            Identifiers::HOLY_EVENING => [ 'm' => 12, 'd' => 24, 'r' => [ -1 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ]
         ],
         2015 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 6, 'r' => [ -1 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::DAY_OF_VICTORY => [ 'm' => 5, 'd' => 8, 'r' => [ -1 ] ],
            'Day of Slavic Intelligence by Cyril and Methodius' => [ 'm' => 7, 'd' => 5, 'r' => [ -1 ] ],
            'Day of the burning of Jan Hus' => [ 'm' => 7, 'd' => 6, 'r' => [ -1 ] ],
            'Day of the Czech statehood' => [ 'm' => 9, 'd' => 28, 'r' => [ -1 ] ],
            'Day of the emergence of an independent Czechoslovak state' => [ 'm' => 10, 'd' => 28, 'r' => [ -1 ] ],
            'Day of struggle for freedom and democracy' => [ 'm' => 11, 'd' => 17, 'r' => [ -1 ] ],
            Identifiers::HOLY_EVENING => [ 'm' => 12, 'd' => 24, 'r' => [ -1 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ]
         ],
         2016 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 3, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 3, 'd' => 28, 'r' => [ -1 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::DAY_OF_VICTORY => [ 'm' => 5, 'd' => 8, 'r' => [ -1 ] ],
            'Day of Slavic Intelligence by Cyril and Methodius' => [ 'm' => 7, 'd' => 5, 'r' => [ -1 ] ],
            'Day of the burning of Jan Hus' => [ 'm' => 7, 'd' => 6, 'r' => [ -1 ] ],
            'Day of the Czech statehood' => [ 'm' => 9, 'd' => 28, 'r' => [ -1 ] ],
            'Day of the emergence of an independent Czechoslovak state' => [ 'm' => 10, 'd' => 28, 'r' => [ -1 ] ],
            'Day of struggle for freedom and democracy' => [ 'm' => 11, 'd' => 17, 'r' => [ -1 ] ],
            Identifiers::HOLY_EVENING => [ 'm' => 12, 'd' => 24, 'r' => [ -1 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ]
         ],
         2017 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 4, 'd' => 14, 'r' => [ -1 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 17, 'r' => [ -1 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::DAY_OF_VICTORY => [ 'm' => 5, 'd' => 8, 'r' => [ -1 ] ],
            'Day of Slavic Intelligence by Cyril and Methodius' => [ 'm' => 7, 'd' => 5, 'r' => [ -1 ] ],
            'Day of the burning of Jan Hus' => [ 'm' => 7, 'd' => 6, 'r' => [ -1 ] ],
            'Day of the Czech statehood' => [ 'm' => 9, 'd' => 28, 'r' => [ -1 ] ],
            'Day of the emergence of an independent Czechoslovak state' => [ 'm' => 10, 'd' => 28, 'r' => [ -1 ] ],
            'Day of struggle for freedom and democracy' => [ 'm' => 11, 'd' => 17, 'r' => [ -1 ] ],
            Identifiers::HOLY_EVENING => [ 'm' => 12, 'd' => 24, 'r' => [ -1 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ]
         ],
         2018 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 3, 'd' => 30, 'r' => [ -1 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 2, 'r' => [ -1 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::DAY_OF_VICTORY => [ 'm' => 5, 'd' => 8, 'r' => [ -1 ] ],
            'Day of Slavic Intelligence by Cyril and Methodius' => [ 'm' => 7, 'd' => 5, 'r' => [ -1 ] ],
            'Day of the burning of Jan Hus' => [ 'm' => 7, 'd' => 6, 'r' => [ -1 ] ],
            'Day of the Czech statehood' => [ 'm' => 9, 'd' => 28, 'r' => [ -1 ] ],
            'Day of the emergence of an independent Czechoslovak state' => [ 'm' => 10, 'd' => 28, 'r' => [ -1 ] ],
            'Day of struggle for freedom and democracy' => [ 'm' => 11, 'd' => 17, 'r' => [ -1 ] ],
            Identifiers::HOLY_EVENING => [ 'm' => 12, 'd' => 24, 'r' => [ -1 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ]
         ]
      ],
      'fr' => [
         2002 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 3, 'd' => 29, 'r' => [ 8, 13, 14 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 1, 'r' => [ -1 ] ],
            'Abolition of slavery (Mayotte)' => [ 'm' => 4, 'd' => 27, 'r' => [ 17 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::DAY_OF_VICTORY => [ 'm' => 5, 'd' => 8, 'r' => [ -1 ] ],
            'Abolition of slavery (Martinique)' => [ 'm' => 5, 'd' => 22, 'r' => [ 14 ] ],
            'Abolition of slavery (Guadeloupe)' => [ 'm' => 5, 'd' => 27, 'r' => [ 13 ] ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 9, 'r' => [ -1 ] ],
            Identifiers::WHIT_SUNDAY => [ 'm' => 5, 'd' => 19, 'r' => [ -1 ] ],
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 20, 'r' => [ -1 ] ],
            'Abolition of slavery (Guyane française)' => [ 'm' => 6, 'd' => 10, 'r' => [ 15 ] ],
            Identifiers::NATIONAL_DAY => [ 'm' => 7, 'd' => 14, 'r' => [ -1 ] ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ -1 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ -1 ] ],
            'Truce of Compiègne' => [ 'm' => 11, 'd' => 11, 'r' => [ -1 ] ],
            'Abolition of slavery (Réunion)' => [ 'm' => 12, 'd' => 20, 'r' => [ 16 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ 8 ] ]
         ],
         2004 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 4, 'd' => 9, 'r' => [ 8, 13, 14 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 12, 'r' => [ -1 ] ],
            'Abolition of slavery (Mayotte)' => [ 'm' => 4, 'd' => 27, 'r' => [ 17 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::DAY_OF_VICTORY => [ 'm' => 5, 'd' => 8, 'r' => [ -1 ] ],
            'Abolition of slavery (Martinique)' => [ 'm' => 5, 'd' => 22, 'r' => [ 14 ] ],
            'Abolition of slavery (Guadeloupe)' => [ 'm' => 5, 'd' => 27, 'r' => [ 13 ] ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 20, 'r' => [ -1 ] ],
            Identifiers::WHIT_SUNDAY => [ 'm' => 5, 'd' => 30, 'r' => [ -1 ] ],
            'Abolition of slavery (Guyane française)' => [ 'm' => 6, 'd' => 10, 'r' => [ 15 ] ],
            Identifiers::NATIONAL_DAY => [ 'm' => 7, 'd' => 14, 'r' => [ -1 ] ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ -1 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ -1 ] ],
            'Truce of Compiègne' => [ 'm' => 11, 'd' => 11, 'r' => [ -1 ] ],
            'Abolition of slavery (Réunion)' => [ 'm' => 12, 'd' => 20, 'r' => [ 16 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ 8 ] ]
         ],
         2016 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 3, 'd' => 25, 'r' => [ 8, 13, 14 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 3, 'd' => 28, 'r' => [ -1 ] ],
            'Abolition of slavery (Mayotte)' => [ 'm' => 4, 'd' => 27, 'r' => [ 17 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::DAY_OF_VICTORY => [ 'm' => 5, 'd' => 8, 'r' => [ -1 ] ],
            'Abolition of slavery (Martinique)' => [ 'm' => 5, 'd' => 22, 'r' => [ 14 ] ],
            'Abolition of slavery (Guadeloupe)' => [ 'm' => 5, 'd' => 27, 'r' => [ 13 ] ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 5, 'r' => [ -1 ] ],
            Identifiers::WHIT_SUNDAY => [ 'm' => 5, 'd' => 15, 'r' => [ -1 ] ],
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 16, 'r' => [ -1 ] ],
            'Abolition of slavery (Guyane française)' => [ 'm' => 6, 'd' => 10, 'r' => [ 15 ] ],
            Identifiers::NATIONAL_DAY => [ 'm' => 7, 'd' => 14, 'r' => [ -1 ] ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ -1 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ -1 ] ],
            'Truce of Compiègne' => [ 'm' => 11, 'd' => 11, 'r' => [ -1 ] ],
            'Abolition of slavery (Réunion)' => [ 'm' => 12, 'd' => 20, 'r' => [ 16 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ 8 ] ]
         ],
         2017 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 4, 'd' => 14, 'r' => [ 8, 13, 14 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 17, 'r' => [ -1 ] ],
            'Abolition of slavery (Mayotte)' => [ 'm' => 4, 'd' => 27, 'r' => [ 17 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::DAY_OF_VICTORY => [ 'm' => 5, 'd' => 8, 'r' => [ -1 ] ],
            'Abolition of slavery (Martinique)' => [ 'm' => 5, 'd' => 22, 'r' => [ 14 ] ],
            'Abolition of slavery (Guadeloupe)' => [ 'm' => 5, 'd' => 27, 'r' => [ 13 ] ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::WHIT_SUNDAY => [ 'm' => 6, 'd' => 4, 'r' => [ -1 ] ],
            Identifiers::WHIT_MONDAY => [ 'm' => 6, 'd' => 5, 'r' => [ -1 ] ],
            'Abolition of slavery (Guyane française)' => [ 'm' => 6, 'd' => 10, 'r' => [ 15 ] ],
            Identifiers::NATIONAL_DAY => [ 'm' => 7, 'd' => 14, 'r' => [ -1 ] ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ -1 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ -1 ] ],
            'Truce of Compiègne' => [ 'm' => 11, 'd' => 11, 'r' => [ -1 ] ],
            'Abolition of slavery (Réunion)' => [ 'm' => 12, 'd' => 20, 'r' => [ 16 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ 8 ] ]
         ],
         2018 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 3, 'd' => 30, 'r' => [ 8, 13, 14 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 2, 'r' => [ -1 ] ],
            'Abolition of slavery (Mayotte)' => [ 'm' => 4, 'd' => 27, 'r' => [ 17 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::DAY_OF_VICTORY => [ 'm' => 5, 'd' => 8, 'r' => [ -1 ] ],
            'Abolition of slavery (Martinique)' => [ 'm' => 5, 'd' => 22, 'r' => [ 14 ] ],
            'Abolition of slavery (Guadeloupe)' => [ 'm' => 5, 'd' => 27, 'r' => [ 13 ] ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 10, 'r' => [ -1 ] ],
            Identifiers::WHIT_SUNDAY => [ 'm' => 5, 'd' => 20, 'r' => [ -1 ] ],
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 21, 'r' => [ -1 ] ],
            'Abolition of slavery (Guyane française)' => [ 'm' => 6, 'd' => 10, 'r' => [ 15 ] ],
            Identifiers::NATIONAL_DAY => [ 'm' => 7, 'd' => 14, 'r' => [ -1 ] ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ -1 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ -1 ] ],
            'Truce of Compiègne' => [ 'm' => 11, 'd' => 11, 'r' => [ -1 ] ],
            'Abolition of slavery (Réunion)' => [ 'm' => 12, 'd' => 20, 'r' => [ 16 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ 8 ] ]
         ]
      ],
      'it' => [
         1977 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::EPIPHANY => [ 'm' => 1, 'd' => 6, 'r' => [ -1 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 10, 'r' => [ -1 ] ],
            'Day of the liberation of Italy' => [ 'm' => 4, 'd' => 24, 'r' => [ -1 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 18, 'r' => [ -1 ] ], //valid …-1977
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 29, 'r' => [ 15 ] ],
            Identifiers::NATIONAL_DAY => [ 'm' => 6, 'd' => 2, 'r' => [ -1 ] ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ -1 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ -1 ] ],
            'Immaculate conception' => [ 'm' => 12, 'd' => 8, 'r' => [ -1 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ]
         ],
         2002 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::EPIPHANY => [ 'm' => 1, 'd' => 6, 'r' => [ -1 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 1, 'r' => [ -1 ] ],
            'Day of the liberation of Italy' => [ 'm' => 4, 'd' => 24, 'r' => [ -1 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            // Identifiers::ASCENSION => [ 'm' => 5, 'd' => 9, 'r' => [ -1 ] ], valid …-1977
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 20, 'r' => [ 15 ] ],
            Identifiers::NATIONAL_DAY => [ 'm' => 6, 'd' => 2, 'r' => [ -1 ] ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ -1 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ -1 ] ],
            'Immaculate conception' => [ 'm' => 12, 'd' => 8, 'r' => [ -1 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ]
         ],
         2016 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::EPIPHANY => [ 'm' => 1, 'd' => 6, 'r' => [ -1 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 3, 'd' => 28, 'r' => [ -1 ] ],
            'Day of the liberation of Italy' => [ 'm' => 4, 'd' => 24, 'r' => [ -1 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            // Identifiers::ASCENSION => [ 'm' => 5, 'd' => 9, 'r' => [ -1 ] ], valid …-1977
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 16, 'r' => [ 15 ] ],
            Identifiers::NATIONAL_DAY => [ 'm' => 6, 'd' => 2, 'r' => [ -1 ] ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ -1 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ -1 ] ],
            'Immaculate conception' => [ 'm' => 12, 'd' => 8, 'r' => [ -1 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ]
         ],
         2017 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::EPIPHANY => [ 'm' => 1, 'd' => 6, 'r' => [ -1 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 17, 'r' => [ -1 ] ],
            'Day of the liberation of Italy' => [ 'm' => 4, 'd' => 24, 'r' => [ -1 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            // Identifiers::ASCENSION => [ 'm' => 5, 'd' => 9, 'r' => [ -1 ] ], valid …-1977
            Identifiers::WHIT_MONDAY => [ 'm' => 6, 'd' => 5, 'r' => [ 15 ] ],
            Identifiers::NATIONAL_DAY => [ 'm' => 6, 'd' => 2, 'r' => [ -1 ] ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ -1 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ -1 ] ],
            'Immaculate conception' => [ 'm' => 12, 'd' => 8, 'r' => [ -1 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ]
         ],
         2018 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::EPIPHANY => [ 'm' => 1, 'd' => 6, 'r' => [ -1 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 2, 'r' => [ -1 ] ],
            'Day of the liberation of Italy' => [ 'm' => 4, 'd' => 24, 'r' => [ -1 ] ],
            Identifiers::LABOR_DAY => [ 'm' => 5, 'd' => 1, 'r' => [ -1 ] ],
            // Identifiers::ASCENSION => [ 'm' => 5, 'd' => 9, 'r' => [ -1 ] ], valid …-1977
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 21, 'r' => [ 15 ] ],
            Identifiers::NATIONAL_DAY => [ 'm' => 6, 'd' => 2, 'r' => [ -1 ] ],
            Identifiers::ASSUMPTION => [ 'm' => 8, 'd' => 15, 'r' => [ -1 ] ],
            Identifiers::ALL_SAINTS => [ 'm' => 11, 'd' => 1, 'r' => [ -1 ] ],
            'Immaculate conception' => [ 'm' => 12, 'd' => 8, 'r' => [ -1 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ]
         ]
      ],
      'jp' => [
         2016 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            'Coming of Age Day' => [ 'm' => 1, 'd' => 11, 'r' => [ -1 ] ], // (-Sun Dyn "second monday of january")
            //'Coming of Age Day (1948-1999)' => [ 'm' => 1, 'd' => 15, 'r' => [ -1 ] ], // Valid 1948-1999
            'Feast day of the founding of the state' => [ 'm' => 2, 'd' => 11, 'r' => [ -1 ] ], // Valid 1966-… (-Sun)
            'Early spring' => [ 'm' => 3, 'd' => 21, 'r' => [ -1 ] ], // (-Sun)
            'Shōwa day' => [ 'm' => 4, 'd' => 29, 'r' => [ -1 ] ], // Valid …-1988 and 2007-… (-Sun)
            //'Day of the green (1989-2006)' => [ 'm' => 4, 'd' => 29, 'r' => [ -1 ] ], // Valid 1989-2006 (-Sun)
            'Constitution Memorial Day' => [ 'm' => 5, 'd' => 3, 'r' => [ -1 ] ], // 1948-… (-Sun)
            'Day of the green' => [ 'm' => 5, 'd' => 4, 'r' => [ -1 ] ], // Valid 2007-… (-Sun)
            'Child\'s day' => [ 'm' => 5, 'd' => 5, 'r' => [ -1 ] ], // (-Sun)
            'Day of the sea' => [ 'm' => 7, 'd' => 18, 'r' => [ -1 ] ], // 1996-… (Dyn "third monday of july")
            'Day of the mountain' => [ 'm' => 8, 'd' => 11, 'r' => [ -1 ] ], // 2016-… (-Sun)
            'Day of honor of the ancients' => [ 'm' => 9, 'd' => 19, 'r' => [ -1 ] ], // 2003-… (Dyn "third monday of september")
            //'Day of honor of the ancients (1966-2002)' => [ 'm' => 9, 'd' => 15, 'r' => [ -1 ] ], // 1966-2002
            'Autumn Equinox' => [ 'm' => 9, 'd' => 22, 'r' => [ -1 ] ], // (-Sun)
            'Day of sports' => [ 'm' => 10, 'd' => 10, 'r' => [ -1 ] ], // 2000-… (Dyn "second monday of october")
            //'Day of sports (…-1999)' => [ 'm' => 10, 'd' => 10, 'r' => [ -1 ] ], // …-1999
            'Day of culture' => [ 'm' => 11, 'd' => 3, 'r' => [ -1 ] ], // 1946-… (-Sun)
            Identifiers::LABOR_DAY => [ 'm' => 11, 'd' => 23, 'r' => [ -1 ] ], // 1948-… (-Sun)
            'Birthday of the Emperor' => [ 'm' => 12, 'd' => 23, 'r' => [ -1 ] ] // 1989-…
         ],
         2017 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 2, 'r' => [ -1 ] ],
            'Coming of Age Day' => [ 'm' => 1, 'd' => 9, 'r' => [ -1 ] ], // (Dyn "second monday of january")
            //'Coming of Age Day (1948-1999)' => [ 'm' => 1, 'd' => 15, 'r' => [ -1 ] ], // Valid 1948-1999
            'Feast day of the founding of the state' => [ 'm' => 2, 'd' => 11, 'r' => [ -1 ] ], // Valid 1966-… (-Sun)
            'Early spring' => [ 'm' => 3, 'd' => 21, 'r' => [ -1 ] ], // (-Sun)
            'Shōwa day' => [ 'm' => 4, 'd' => 29, 'r' => [ -1 ] ], // Valid …-1988 and 2007-… (-Sun)
            //'Day of the green (1989-2006)' => [ 'm' => 4, 'd' => 29, 'r' => [ -1 ] ], // Valid 1989-2006 (-Sun)
            'Constitution Memorial Day' => [ 'm' => 5, 'd' => 3, 'r' => [ -1 ] ], // 1948-… (-Sun)
            'Day of the green' => [ 'm' => 5, 'd' => 4, 'r' => [ -1 ] ], // Valid 2007-… (-Sun)
            'Child\'s day' => [ 'm' => 5, 'd' => 5, 'r' => [ -1 ] ], // (-Sun)
            'Day of the sea' => [ 'm' => 7, 'd' => 17, 'r' => [ -1 ] ], // 1996-… (Dyn "third monday of july")
            'Day of the mountain' => [ 'm' => 8, 'd' => 11, 'r' => [ -1 ] ], // 2016-… (-Sun)
            'Day of honor of the ancients' => [ 'm' => 9, 'd' => 18, 'r' => [ -1 ] ], // 2003-… (Dyn "third monday of september")
            //'Day of honor of the ancients (1966-2002)' => [ 'm' => 9, 'd' => 15, 'r' => [ -1 ] ], // 1966-2002
            'Autumn Equinox' => [ 'm' => 9, 'd' => 22, 'r' => [ -1 ] ], // (-Sun)
            'Day of sports' => [ 'm' => 10, 'd' => 9, 'r' => [ -1 ] ], // 2000-… (Dyn "second monday of october")
            //'Day of sports (…-1999)' => [ 'm' => 10, 'd' => 10, 'r' => [ -1 ] ], // …-1999
            'Day of culture' => [ 'm' => 11, 'd' => 3, 'r' => [ -1 ] ], // 1946-… (-Sun)
            Identifiers::LABOR_DAY => [ 'm' => 11, 'd' => 23, 'r' => [ -1 ] ], // 1948-… (-Sun)
            'Birthday of the Emperor' => [ 'm' => 12, 'd' => 23, 'r' => [ -1 ] ] // 1989-…
         ],
         2018 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            'Coming of Age Day' => [ 'm' => 1, 'd' => 8, 'r' => [ -1 ] ], // (Dyn "second monday of january")
            //'Coming of Age Day (1948-1999)' => [ 'm' => 1, 'd' => 15, 'r' => [ -1 ] ], // Valid 1948-1999
            'Feast day of the founding of the state' => [ 'm' => 2, 'd' => 12, 'r' => [ -1 ] ], // Valid 1966-… (+SUN)
            'Early spring' => [ 'm' => 3, 'd' => 21, 'r' => [ -1 ] ], // (-Sun)
            'Shōwa day' => [ 'm' => 4, 'd' => 30, 'r' => [ -1 ] ], // Valid …-1988 and 2007-… (+SUN)
            //'Day of the green(1989-2006)' => [ 'm' => 4, 'd' => 29, 'r' => [ -1 ] ], // Valid 1989-2006 (-Sun)
            'Constitution Memorial Day' => [ 'm' => 5, 'd' => 3, 'r' => [ -1 ] ], // 1948-… (-Sun)
            'Day of the green' => [ 'm' => 5, 'd' => 4, 'r' => [ -1 ] ], // Valid 2007-… (-Sun)
            'Child\'s day' => [ 'm' => 5, 'd' => 5, 'r' => [ -1 ] ], // (-Sun)
            'Day of the sea' => [ 'm' => 7, 'd' => 16, 'r' => [ -1 ] ], // 1996-… (Dyn "third monday of july")
            'Day of the mountain' => [ 'm' => 8, 'd' => 11, 'r' => [ -1 ] ], // 2016-… (-Sun)
            'Day of honor of the ancients' => [ 'm' => 9, 'd' => 17, 'r' => [ -1 ] ], // 2003-… (Dyn "third monday of september")
            //'Day of honor of the ancients (1966-2002)' => [ 'm' => 9, 'd' => 15, 'r' => [ -1 ] ], // 1966-2002
            'Autumn Equinox' => [ 'm' => 9, 'd' => 22, 'r' => [ -1 ] ], // (-Sun)
            'Day of sports' => [ 'm' => 10, 'd' => 8, 'r' => [ -1 ] ], // 2000-… (Dyn "second monday of october")
            //'Day of sports (…-1999)' => [ 'm' => 10, 'd' => 10, 'r' => [ -1 ] ], // …-1999
            'Day of culture' => [ 'm' => 11, 'd' => 3, 'r' => [ -1 ] ], // 1946-… (-Sun)
            Identifiers::LABOR_DAY => [ 'm' => 11, 'd' => 23, 'r' => [ -1 ] ], // 1948-… (-Sun)
            'Birthday of the Emperor' => [ 'm' => 12, 'd' => 23, 'r' => [ -1 ] ] // 1989-…
         ]
      ],
      'nl' => [
         2016 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 3, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::EASTER_SUNDAY => [ 'm' => 3, 'd' => 27, 'r' => [ -1 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 3, 'd' => 28, 'r' => [ -1 ] ],
            //'Kings Day -2013' => [ 'm' => 4, 'd' => 26, 'r' => [ -1 ] ], // …-2013
            'Kings Day' => [ 'm' => 4, 'd' => 27, 'r' => [ -1 ] ], // 2014-… (-sun)
            'Commemoration' => [ 'm' => 5, 'd' => 4, 'r' => [ -1 ] ],
            Identifiers::LIBERATION_DAY => [ 'm' => 5, 'd' => 5, 'r' => [ -1 ] ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 5, 'r' => [ -1 ] ],
            Identifiers::WHIT_SUNDAY => [ 'm' => 5, 'd' => 15, 'r' => [ -1 ] ],
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 16, 'r' => [ -1 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ]
         ],
         2017 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 4, 'd' => 14, 'r' => [ -1 ] ],
            Identifiers::EASTER_SUNDAY => [ 'm' => 4, 'd' => 16, 'r' => [ -1 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 17, 'r' => [ -1 ] ],
            //'Kings Day -2013' => [ 'm' => 4, 'd' => 26, 'r' => [ -1 ] ], // …-2013
            'Kings Day' => [ 'm' => 4, 'd' => 27, 'r' => [ -1 ] ], // 2014-… (-sun)
            'Commemoration' => [ 'm' => 5, 'd' => 4, 'r' => [ -1 ] ],
            Identifiers::LIBERATION_DAY => [ 'm' => 5, 'd' => 5, 'r' => [ -1 ] ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::WHIT_SUNDAY => [ 'm' => 6, 'd' => 4, 'r' => [ -1 ] ],
            Identifiers::WHIT_MONDAY => [ 'm' => 6, 'd' => 5, 'r' => [ -1 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ]
         ],
         2018 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 3, 'd' => 30, 'r' => [ -1 ] ],
            Identifiers::EASTER_SUNDAY => [ 'm' => 4, 'd' => 1, 'r' => [ -1 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 4, 'd' => 2, 'r' => [ -1 ] ],
            //'Kings Day -2013' => [ 'm' => 4, 'd' => 26, 'r' => [ -1 ] ], // …-2013
            'Kings Day' => [ 'm' => 4, 'd' => 27, 'r' => [ -1 ] ], // 2014-… (-sun)
            'Commemoration' => [ 'm' => 5, 'd' => 4, 'r' => [ -1 ] ],
            Identifiers::LIBERATION_DAY => [ 'm' => 5, 'd' => 5, 'r' => [ -1 ] ],
            Identifiers::ASCENSION => [ 'm' => 5, 'd' => 10, 'r' => [ -1 ] ],
            Identifiers::WHIT_SUNDAY => [ 'm' => 5, 'd' => 20, 'r' => [ -1 ] ],
            Identifiers::WHIT_MONDAY => [ 'm' => 5, 'd' => 21, 'r' => [ -1 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ]
         ]
      ],
      'uk' => [
         2016 => [
            Identifiers::NEW_YEAR => [ 'm' => 1, 'd' => 1, 'r' => [ -1 ] ],
            'Scottish New Years\'s Day' => [ 'm' => 1, 'd' => 4, 'r' => [ 6 ] ],
            Identifiers::SAINT_PATRICKS_DAY => [ 'm' => 3, 'd' => 17, 'r' => [ 5 ] ],
            Identifiers::GOOD_FRIDAY => [ 'm' => 3, 'd' => 25, 'r' => [ -1 ] ],
            Identifiers::EASTER_MONDAY => [ 'm' => 3, 'd' => 28, 'r' => [ -1 ] ],
            'Early May Bank Holiday' => [ 'm' => 5, 'd' => 2, 'r' => [ -1 ] ], // Dyn "first monday of may"
            Identifiers::LIBERATION_DAY => [ 'm' => 5, 'd' => 9, 'r' => [ 2, 4 ] ],
            'Spring Bank Holiday' => [ 'm' => 5, 'd' => 30, 'r' => [ -1 ] ], // Dyn "last monday of may"
            'Tourist Trophy Senior Race Day' => [ 'm' => 6, 'd' => 10, 'r' => [ 3 ] ], // Dyn "second friday of june"
            'Tynwald Day' => [ 'm' => 7, 'd' => 5, 'r' => [ 3 ] ],
            'Battle of the Boyne' => [ 'm' => 7, 'd' => 12, 'r' => [ 5 ] ], // (-sun -sat)
            'August Bank Holiday Scotland' => [ 'm' => 8, 'd' => 1, 'r' => [ 6 ] ], // Dyn "first monday of august"
            'August Bank Holiday' => [ 'm' => 8, 'd' => 29, 'r' => [ 1, 7 ] ], // Dyn "last monday of august"
            'Homecoming Day' => [ 'm' => 12, 'd' => 15, 'r' => [ 0 ] ],
            Identifiers::CHRISTMAS_DAY => [ 'm' => 12, 'd' => 27, 'r' => [ 1, 2, 3, 4, 5, 6, 7 ] ],
            Identifiers::BOXING_DAY => [ 'm' => 12, 'd' => 26, 'r' => [ -1 ] ]
         ]
      ]
   ];

   public function testCreate()
   {

      foreach ( self::HOLIDAYS as $countryId => $countryData )
      {

         $definitions = CountryDefinitionsFactory::Create( $countryId );
         $this->assertInstanceOf( DefinitionCollection::class, $definitions );

         foreach ( $countryData as $year => $yearData )
         {

            $holidays   = $definitions->getHolidays( $year, $countryId );

            $holidayCount = \count( $yearData );

            $this->assertSame(
               $holidayCount,
               \count( $holidays ),
               'Year ' . $year . ' (' . $countryId . ') defines a invalid amount of holidays!'
            );

            foreach ( $holidays as $holiday )
            {
               $this->assertTrue(
                  isset( $yearData[ $holiday->getIdentifier() ] ),
                  'Year ' . $year . ' not define the "' . $holiday->getIdentifier() . '"(' . $countryId . ') holiday!' );
               $this->assertSame(
                  $yearData[ $holiday->getIdentifier() ][ 'm' ],
                  (int) $holiday->getDate()->format( 'm' ),
                  'Year ' . $year . ' "' . $holiday->getIdentifier() . '"(' . $countryId . ') holiday MONTH is invalid! (' . $holiday->getDate()->format( 'Y-m-d' ) . ')'
               );
               $this->assertSame(
                  $yearData[ $holiday->getIdentifier() ][ 'd' ],
                  (int) $holiday->getDate()->format( 'd' ),
                  'Year ' . $year . ' "' . $holiday->getIdentifier() . '"(' . $countryId . ') holiday DAY is invalid!'
               );
               $this->assertSame(
                  $yearData[ $holiday->getIdentifier() ][ 'r' ],
                  $holiday->getValidRegions(),
                  'Year ' . $year . ' "' . $holiday->getIdentifier() . '"(' . $countryId . ') holiday REGIONS are invalid!'
               );
            }
         }
      }

   }

   public function testCreateException1()
   {

      $this->expectException( FileNotFoundException::class );

      CountryDefinitionsFactory::Create( 'de', __DIR__ . '/bad-data' );

   }

   public function testCreateException2()
   {

      $this->expectException( FileFormatException::class );

      CountryDefinitionsFactory::Create( 'ml', __DIR__ . '/bad-data' );

   }

   public function testCreateException3()
   {

      $this->expectException( FileFormatException::class );

      CountryDefinitionsFactory::Create( 'bg', __DIR__ . '/bad-data' );

   }

   public function testGetSupportedCountries()
   {

      $this->assertSame( [ 'at', 'ch', 'cz', 'de', 'fr', 'gb', 'it', 'jp', 'nl', 'uk' ],
                         CountryDefinitionsFactory::GetSupportedCountries() );

   }

}
