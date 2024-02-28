# Niirrty.Holiday

A extendable international holiday library.

[Dieses Dokument in Deutscher Sprache anzeigen](./README.de.md)

Its realy easy to define holidays for other countries than initially supported. For mor information see
[Define country depending on holidays](#define-country-depending-holidays) 

## Installation

This is a package available via composer:

```bash
composer require niirrty/niirrty.holiday ^1.3 
```

or inside the `require` area of the `composer.json`:

```json
{
   "require": {
                "php": ">=8.1",
                "niirrty/niirrty.holiday": "^1.3"
              }
}
```

## Usage

```php
<?php

use Niirrty\Holiday\CountryDefinitionsFactory;

// Load the country depending ('de' == 'Germany') holiday definitions
$holidayDefinitions = CountryDefinitionsFactory::Create( 'de' );

// Get the german holidays for year 2018 in english language
$holidays = $holidayDefinitions->getHolidays( 2018, 'en' );

// Output small info about the holidays
foreach ( $holidays as $holiday )
{
   echo $holiday->getDate()->format( 'Y-m-d' ), ' : ', $holiday->getName(), "\n";
}
```

The returned collection inside `$holidays` contain all holidays of defined country germany (de) with english
language names (en) for used year `2018`

Each collection item is a Object of type `\Niirrty\Holiday\Holiday`

`CountryDefinitionsFactory::Create(…)` also supports a 2nd parameter. With it you can define a folder that replaces
the default, library depending folder with your own, to get holiday definition data from.

The HolidayCollection instance returned by `->getHolidays( … )` above also give you the methods:

* `startsAt( int $month = 1, int $day = 1 ) : HolidayCollection`: This method return all holidays, starting at, or after
  the defined month and day
* `byRegionId( int $regionId ) : HolidayCollection`:  Extracts all holidays for the region with defined ID. Region ID
  means the index of the region within the list of defined regions. You can get the indexes and associates Region names
  by calling `$regions = $holidays->extractRegionNames();`The keys are the IDs/indexes and the values the names.
* `byRegionIds( array $regionIds ) : HolidayCollection`: Same than `byRegionId` but for multiple regions.
* `byRegionName( string $regionName ) : HolidayCollection` Extracts all holidays for the region with defined name.
* `byRegionNames( array $regionNames ) : HolidayCollection` Extracts all holidays for the region with defined names.
* `restDays() : HolidayCollection` Gets all work free, rest day holidays
* `noRestDays() : HolidayCollection` Gets all none work free, no rest day holidays


## Supported Countries

Currently supported countries are:
 
* `'at'` Austria (rest-days and no-rest-days)
* `'ch'` Swizz (only rest-days)
* `'cz'` Czech (only rest-days)
* `'de'` Germany (rest-days and no-rest-days)
* `'fr'` France (only rest-days)
* `'it'` Italy (only rest-days)
* `'jp'` Nippon (only rest-days)
* `'nl'` Netherlands (only rest-days)
* `'uk'` United Kingdom (only rest-days)

You can also get the supported countries programmatically:

```php
<?php

use Niirrty\Holiday\CountryDefinitionsFactory;

$supportedCountries = CountryDefinitionsFactory::GetSupportedCountries();
```

## Available Regions

Not all countries require the use of region depending holidays, but if required
you can get the available regions by calling:

```php
$holidayDefinitions->getRegions();
```

All build in countries should (not must) support name translations for languages 'de', 'en', 'fr', 'it', 'es', 'pt',
'cz' and 'jp'

If the country uses other languages it can also been defined.


## Define country depending holidays

Each country define all usable holidays by using the `\Niirrty\Holiday\Definition` and
`\Niirrty\Holiday\DefinitionCollection` classes, inside a separate PHP file in folder `data`

### File naming convention

``` 
{COUNTRY-ID}.php
```

The file name must start with the 2 char ISO country ID (lower case) of the country where the holidays are for.

The file must use the PHP file name extension `.php` must contains valid PHP code and must return the new 
`\Niirrty\Holiday\DefinitionCollection` instance that define all country depending holiday definitions.

### File structure

The base structure looks like:

```php
<?php


use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;
use Niirrty\Holiday\Identifiers;

return DefinitionCollection::Create( 'United Kingdom', 'uk' )

   ->setRegions(
      [
         // TODO 1: If required, define the list of region names here like
         // Also notice the indexes of the names after each name for easier associate the indexes with the names
         // because: If you define a holiday, only valid for one or more regions you have to use the indexes.
         'Alderney',         // 0
         'England',          // 1
         'Guernsey',         // 2
         'Isle of Man',      // 3
         'Jersey',           // 4
         'North Ireland',    // 5
         'Scotland',         // 6
         'Wales'             // 7
   ] )

   ->addRange(
      
      // TODO 2: Here all holidays must be defined comma separated
      
   );

```

Now you must get some information about the holidays (wikipedia is a good start point)

### Required holiday information

* The holiday `name` with all supported languages.
* A unique Holiday `identifier` string if not defined by `Niirrty\Holiday\Identifiers`::* class constants.
* The holiday `day` and `month`, if static, or the callback that calculate the dynamic year depending day and month on demand.
* The optional `year range(s)` (start- and/or end date) where the holiday is valid.
* Optional `conditions` for moving the holiday if the condition matches.
* Optional `regions` where the holiday is only valid for.
* Information if the holiday is a work free holiday or not

Now if you have all holiday information the holidays can be defined by replacing the `TODO 2` comment

### Holiday definition

The simplest holiday is a holiday with a static date

```php
<?php

            // 03-17 : Saint Patrick's Day…
            Definition::Create( Identifiers::SAINT_PATRICKS_DAY )
                      ->setStaticDate( 3, 17 )
                      ->setName( 'Saint Patrick\'s Day' )
                      ->setNameTranslations( [
                         'en' => 'Saint Patrick\'s Day',
                         'de' => 'St. Patrick\'s Day',
                         'fr' => 'Le jour de la Saint-Patrick',
                         'it' => 'Giorno di San Patrizio',
                         'es' => 'Día de San Patricio',
                         'pt' => 'Dia de São Patrick',
                         'cz' => 'Den svatého Patrika',
                         'jp' => '聖パトリックの日'
                      ] )
``` 

The Identifier must be always unique. If the holiday is often used by many countries it is maybe defined by a
constant inside `Niirrty\Holiday\Identifiers`

`setName( '…' )` sets the country main language depending holiday name

### Conditional holiday movements

But this holiday (and other in UK and many other countries) is only valid at march 17. if its not a saturday or sunday
In both cases the holiday is moved to next monday.
 
This can be solved by extending the definition with MoveConditions

```php
<?php

            // 03-17 : Saint Patrick's Day…
            Definition::Create( Identifiers::SAINT_PATRICKS_DAY )
                      ->setStaticDate( 3, 17 )
                      ->setName( 'Saint Patrick\'s Day' )
                      
                      // move to next day (monday) if date is a sunday
                      ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                      // move 2 days in future (monday) if date is a saturday
                      ->addMoveCondition( MoveCondition::OnSaturday( 2 ) )
                      
                      ->setNameTranslations( [
                         'en' => 'Saint Patrick\'s Day',
                         'de' => 'St. Patrick\'s Day',
                         'fr' => 'Le jour de la Saint-Patrick',
                         'it' => 'Giorno di San Patrizio',
                         'es' => 'Día de San Patricio',
                         'pt' => 'Dia de São Patrick',
                         'cz' => 'Den svatého Patrika',
                         'jp' => '聖パトリックの日'
                      ] )
```

MoveCondition can also initiated with a own callback that checks if the condition matches

```php
<?php

            // 03-17 : Saint Patrick's Day…
            Definition::Create( Identifiers::SAINT_PATRICKS_DAY )
                      ->setStaticDate( 3, 17 )
                      ->setName( 'Saint Patrick\'s Day' )
                      
                      // move to next day (monday) if date is a sunday
                      ->addMoveCondition( MoveCondition::Create(
                         1,
                         function ( \DateTime $date ) : bool
                         {
                            return 0 === ( (int) $date->format( 'w' ) );
                         } ) )
                      // move 2 days in future (monday) if date is a saturday
                      ->addMoveCondition( MoveCondition::Create(
                         1,
                         function ( \DateTime $date ) : bool
                         {
                            return 6 === ( (int) $date->format( 'w' ) );
                         } ) )
                      
                      ->setNameTranslations( [
                         'en' => 'Saint Patrick\'s Day',
                         'de' => 'St. Patrick\'s Day',
                         'fr' => 'Le jour de la Saint-Patrick',
                         'it' => 'Giorno di San Patrizio',
                         'es' => 'Día de San Patricio',
                         'pt' => 'Dia de São Patrick',
                         'cz' => 'Den svatého Patrika',
                         'jp' => '聖パトリックの日'
                      ] )
```

The conditions before does the same

### Region depending holidays

If a holiday is only valid for one or more specific regions it can be declared by `setValidRegions( [ … ] )`

```php
<?php

            // 03-17 : Saint Patrick's Day…
            Definition::Create( Identifiers::SAINT_PATRICKS_DAY )
                      ->setStaticDate( 3, 17 )
                      ->setName( 'Saint Patrick\'s Day' )
                      ->setNameTranslations( [
                         'en' => 'Saint Patrick\'s Day',
                         'de' => 'St. Patrick\'s Day',
                         'fr' => 'Le jour de la Saint-Patrick',
                         'it' => 'Giorno di San Patrizio',
                         'es' => 'Día de San Patricio',
                         'pt' => 'Dia de São Patrick',
                         'cz' => 'Den svatého Patrika',
                         'jp' => '聖パトリックの日'
                      ] )
                      
                      // Holiday is valid for regions England (1) and Wales (7)
                      ->setValidRegions( [ 1, 7 ] )
```

### Holidays with dynamic dates

You have to define a callback that calculate the dynamic holiday depending to a year and return it.
Its done by calling `setDynamicDateCallback( … )`

Here you have to pass a implementation of `Niirrty\Holiday\Callbacks\IDynamicDateCallback`

```php
<?php

            // Early May Bank Holiday - The 1st monday in mai
            Definition::Create( 'Early May Bank Holiday' )
                      ->setName( 'Early May Bank Holiday' )
                      ->setDynamicDateCallback(
                         new \Niirrty\Holiday\Callbacks\NamedDateCallback( 'first monday of may ' ) )
                      ->setNameTranslations( [
                         'en' => 'Early May Bank Holiday',
                         'jp' => '月上旬バンクホリデー'
                      ] )
```

Other currently known callbacks are:

* `\Niirrty\Holiday\Callbacks\ModifyDateCallback`: If a date should be calculated by a DateTime modification
  (modify() method format), it can be defined by this dynamic date callback.
* `\Niirrty\Holiday\Callbacks\EasterDateCallback`: Calculates the christian easter sunday
* `\Niirrty\Holiday\Callbacks\NamedDateCallback`: If a date should be build by a named date time string. For example
  `'last monday of january'` will result in `'last monday of january ' . $year`
* `\Niirrty\Holiday\Callbacks\AdventDateCallback`: For dates, depending to the dynamic christian advent days calculation
* `\Niirrty\Holiday\Callbacks\EasterDateCallback`: Calculates the 4 season start dates spring, summer, autumn and winter
  for north or south hemispheres.

But its really simple to implement your own:

```php
<?php

declare( strict_types = 1 );

namespace My\Callbacks;

use Niirrty\Holiday\Callbacks\IDynamicDateCallback;
use Niirrty\Date\DateTime;


class MyDynamicDateCallback implements IDynamicDateCallback
{
   
   public function calculate( int $year ) : \DateTime
   {
   
      return ( 0 === $year % 2 )
         ? DateTime::Create( $year, 5, 1 )
         : DateTime::Create( $year, 5, 2 );
   
   }
   
}

``` 

#### Special case - Easter depending holidays

Easter depending holidays (dynamic base date) can be easy created by using `CreateEasterDepening( … )`

```php
<?php

            // Good Friday (Easter sunday - 2 days)
            Definition::CreateEasterDepending( Identifiers::GOOD_FRIDAY, -2 )
                      ->setName( 'Good Friday' )
                      ->setNameTranslations( [
                         'en' => 'Good Friday',
                         'de' => 'Karfreitag',
                         'fr' => 'Vendredi Saint',
                         'it' => 'Venerdì Santo',
                         'es' => 'Viernes Santo',
                         'pt' => 'Sexta-feira Santa',
                         'cz' => 'Velký pátek',
                         'jp' => '良い金曜日'
                      ] ),
```

### Holiday valid for a year range

You can use `setValidFromYear( … )` to set a year where the holiday starts to be valid. If not defined the lowest
usable date is the default value.

You can use `setValidToYear( … )` to set a year where the holiday ends to be valid. If not defined there is no limit.

If `ValidToYear` is before `ValidFromYear` it means the holiday ends to be valid at `ValidToYear` and newly becomes the
valid state at year `ValidFromYear`

If there are more ranges you must define the holiday multiple times but ATTENTION: NEVER USE THE SAME IDENTIFIER!

### Rest day holidays

Holidays are initially all "rest day" (work-free) holidays. If a "no rest day" Holiday should be defined you can do it
by add `->setIsRestDay( false )` to the definition declaration.

The End…