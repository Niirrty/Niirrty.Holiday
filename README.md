# Niirrty.Holiday

A extendable international holyday library.

## Usage

```php
<?php

use Niirrty\Holiday\HolidayCollectionFactory;

$holidayBuilder = HolidayCollectionFactory::Create( 'de' );

$holidays = $holidayBuilder->getHolidays( 2017, $holidayBuilder->indexOfRegion( 'Sachsen' ), 'en' );
```

The returned array inside `$holidays` contain all holidays of defined country germany (de) for region Sachsen (Saxony)
with english language names

Each array value is a array with values for the following keys
 
* `'date'` The holiday \DateTime instance
* `'name'` The holiday name in defined language, or default language if none is defined
* `'description'` Optional description text.
* `'regions'` The array with the ids of the regions where the holiday is valid for.

## Supported Countries

Currently supported countries are:
 
* `'at'` Austria
* `'ch'` Swizz
* `'cz'` Czech
* `'de'` Germany
* `'it'` Italy
* `'jp'` Nippon
* `'uk'` United Kingdom

You can also get the supported countries programmatically:

```php
<?php

use Niirrty\Holiday\HolidayCollectionFactory;

$supportedCountries = HolidayCollectionFactory::GetSupportedCountries();
```

## Available Regions

Not all countries require the use of region depending holidays, but if required
you can get the available regions by calling:

```php
$holidayBuilder->getRegions();
```

All build in countries supports name translations for languages 'de', 'en', 'fr', 'it', 'es', 'pt', 'cz' and 'jp'
