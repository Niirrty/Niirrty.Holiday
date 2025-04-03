# Niirrty.Holiday

A extendable international holiday library.

It is real easy to define holidays for other countries than initially supported. For mor information see
[Define country depending holidays](#define-country-depending-holidays) 

## Installation

This is a package available via composer:

```bash
composer require niirrty/niirrty.holiday ^2.0
```

or inside the `require` area of the `composer.json`:

```json
{
   "require": {
                "php": ">=8.3",
                "niirrty/niirrty.holiday": "^2.0"
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

// Sort holidays by date
$holidays->sort();

// Output small info about the holidays
foreach ( $holidays as $holiday )
{
   echo $holiday->getDate()->format( 'Y-m-d' ), ' : ', $holiday->getName(), "\n";
}
```

The returned collection inside `$holidays` contain all holidays of defined country germany (de) with english
language names (en) for used year `2018`

Each collection item is an Object of type `\Niirrty\Holiday\Holiday`

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
 
* `'at'` Austria
* `'ch'` Swizz
* `'cz'` Czech
* `'de'` Germany
* `'dk'` Denmark
* `'fr'` France
* `'it'` Italy
* `'jp'` Japan
* `'nl'` Netherlands
* `'pl'` Poland
* `'sv'` Sweden
* `'uk'` United Kingdom

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

All country holidays MUST support name translations for languages cz, de, dk, en, es, fi, fr, is, it, jp, nl, no, pl,
pt and sv


## Define country depending holidays

Each country define all usable holidays by using the `\Niirrty\Holiday\Definition` and
`\Niirrty\Holiday\DefinitionCollection` classes, inside a separate PHP file in folder `data`

### File naming convention

``` 
{COUNTRY-ID}.php
```

The file name must start with the 2 char ISO country ID (lower case) of the country where the holidays are for.

The file must use the PHP file name extension `.php` must contain valid PHP code and must return the new 
`\Niirrty\Holiday\DefinitionCollection` instance that define all country depending holiday definitions.

### Translations

All holiday name translations are defined separate in PHP files. Each PHP file uses the file name format:

``` 
{LANGUAGE-ID}.php
```

The file name must start with the 2 char ISO language ID (lower case).

The file must use the PHP file name extension `.php` must contain valid PHP code and must return an associative 1-dim.
array. The keys are the unique identifiers, the values are the translated holiday names.

### File structure

The base structure looks like:

```php
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
* A unique Holiday `identifier` string.
* The holiday `day` and `month`, if static, or the callback that calculate the dynamic year depending day and month on demand.
* The optional `year range(s)` (start- and/or end date) where the holiday is valid.
* Optional `conditions` for moving the holiday if the condition matches.
* Optional `regions` where the holiday is only valid for.
* Information if the holiday is a work free holiday or not

Now if you have all holiday information the holidays can be defined by replacing the `TODO 2` comment

### Holiday definition

The simplest holiday is a holiday with a static date

```php
        // 03-17 : Saint Patrick's Day…
        Definition::Create( 'Saint Patrick\'s Day' )
            ->setStaticDate( 3, 17 )
        )
``` 

The Identifier must be always unique.

### Conditional holiday movements

But this holiday (and other in UK and many other countries) is only valid at march 17. if its not a saturday or sunday
In both cases the holiday is moved to next monday.
 
This can be solved by extending the definition with MoveConditions

```php
        // 03-17 : Saint Patrick's Day…
        Definition::Create( 'Saint Patrick\'s Day' )
            ->setStaticDate( 3, 17 )
            // move to next day (monday) if date is a sunday
            ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
            // move 2 days in future (monday) if date is a saturday
            ->addMoveCondition( MoveCondition::OnSaturday( 2 ) )
        )
```

MoveCondition can also be used with an own callback that checks if the condition matches

```php
        // 03-17 : Saint Patrick's Day…
        Definition::Create( 'Saint Patrick\'s Day' )
            ->setStaticDate( 3, 17 )
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
        )
```

The conditions before does the same

### Region depending holidays

If a holiday is only valid for one or more specific regions it can be declared by `setValidRegions( [ … ] )`

```php
        // 03-17 : Saint Patrick's Day…
        Definition::Create( 'Saint Patrick\'s Day' )
            ->setStaticDate( 3, 17 )
            // Holiday is valid for regions England (1) and Wales (7)
            ->setValidRegions( [ 1, 7 ] )
```

### Holidays with dynamic dates

You have to define a callback that calculate the dynamic holiday depending on a year and return it.
It is done by calling `setDynamicDateCallback( … )`

Here you have to pass an implementation of `Niirrty\Holiday\Callbacks\IDynamicDateCallback`

```php
        // Early May Bank Holiday - The 1st monday in may
        Definition::Create( 'Early May Bank Holiday' )
            ->setDynamicDateCallback(
                new \Niirrty\Holiday\Callbacks\NamedDateCallback( 'first monday of may ' ) )
        )
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
        // Good Friday (Easter sunday - 2 days)
        Definition::CreateEasterDepending( 'Good Friday', -2 )
```

### Holiday valid for a year range

You can use `setValidFromYear( … )` to set a year when the holiday starts to be valid. If not defined the lowest
usable date is the default value.

You can use `setValidToYear( … )` to set a year when the holiday ends to be valid. If not defined there is no limit.

If `ValidToYear` is before `ValidFromYear` it means the holiday ends to be valid at `ValidToYear` and newly becomes the
valid state at year `ValidFromYear`

If there are more ranges you must define the holiday multiple times but ATTENTION: NEVER USE THE SAME IDENTIFIER!

### Rest day holidays

Holidays are initially all "rest day" (work-free) holidays. If a "no rest day" Holiday should be defined you can do it
by add `->setIsRestDay( false )` to the definition declaration.

The End…