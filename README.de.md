# Niirrty.Holiday

Eine erweiterbare internationale Feitertags Bibliothek.

[Show this document in english language](./README.md)

Es ist ziemlich einfach Landesbezogene Feiertage zu definieren die initial nicht vorhanden sind.

Für mehr Informationen kann ein Blick hier nicht schaden: [Landesabhaengige Feiertage definieren](#landesabhaengige-feiertage-definieren) 

## Installation

Dieses Packet kann einfach über composer direkt installiert werden:

```bash
composer require niirrty/niirrty.holiday ^1.3 
```

oder im `require` Bereich der `composer.json`:

```json
{
   "require": {
                "php": ">=7.1",
                "niirrty/niirrty.holiday": "^1.3"
              }
}
```

## Nutzung

```php
<?php

use Niirrty\Holiday\CountryDefinitionsFactory;

// Lade Feiertage für das Land (de == Deutschland)
$holidayDefinitions = CountryDefinitionsFactory::Create( 'de' );

// Die Feiertage für das Jahr 2018 in englischer Sprache aus den Definitionen generieren.
$holidays = $holidayDefinitions->getHolidays( 2018, 'en' );

// Einfache Feiertagsinfos ausgeben
foreach ( $holidays as $holiday )
{
   echo $holiday->getDate()->format( 'Y-m-d' ), ' : ', $holiday->getName(), "\n";
}
```

Die Zurück gegebene Collection in `$holidays`, enthält alle Feiertage des angegebenen Landes Deutschland (de) mit
englischen Feiertagsnamen, für das Jahr `2018`

Jedes Element der Collection ist ein Objekt vom Typ `\Niirrty\Holiday\Holiday`

`CountryDefinitionsFactory::Create(…)` unterstützt auch einen 2. Parameter. Mit diesem kann ein Verzeichnis festgelegt
werden, aus dem die Feiertagsdefinitionen als Ersatz zum integrierten Verzeichnis geladen werden können.

Die HolidayCollection Instanz die von `->getHolidays( … )` zurück gegeben wird enthält weitere hilfreiche Methoden
zum Zugriff auf darin enthaltene Feiertage:

* `startsAt( int $month = 1, int $day = 1 ) : HolidayCollection`: Gibt alle Feiertage zurück die am angegebenen Start
  Tag und Monat oder dahinter liegen.
* `byRegionId( int $regionId ) : HolidayCollection`:  Extrahiert alle Feiertage die für die Region mit der angegebenen
  ID gültig sind. Die Region-ID ist der Index der Region in der Liste der definierten Regionen. Alle definierten
  Regionen erhällst Du wenn Du `$regions = $holidays->extractRegionNames();` aufrufst.
* `byRegionIds( array $regionIds ) : HolidayCollection`: Siehe `byRegionId` nur für mehrere Regionen.
* `byRegionName( string $regionName ) : HolidayCollection` Extrahiert alle Feiertage die für die Region mit dem
  angegebenen Namen gültig sind.
* `byRegionNames( array $regionNames ) : HolidayCollection` Siehe `byRegionName` nur für mehrere Regionen.
* `restDays() : HolidayCollection` Gibt alle arbeitsfreien Feiertage zurück.
* `noRestDays() : HolidayCollection` Gibt alle NICHT arbeitsfreien Feiertage zurück.


## Unterstützte Länder

Momentan werden Feiertage für die folgenden Länder unterstützt:
 
* `'at'` Österreich (arbeitsfreie und nicht arbeitfreie Feiertage)
* `'ch'` Schweiz (nur arbeitsfreie Feiertage)
* `'cz'` Tschechien (nur arbeitsfreie Feiertage)
* `'de'` Deutschland (arbeitsfreie und nicht arbeitfreie Feiertage)
* `'fr'` Frankreich (nur arbeitsfreie Feiertage)
* `'it'` Italien (nur arbeitsfreie Feiertage)
* `'jp'` Japan (nur arbeitsfreie Feiertage)
* `'nl'` Niederlande (nur arbeitsfreie Feiertage)
* `'uk'` Vereinigtes Königreich (nur arbeitsfreie Feiertage)

Man kann auch alle unterstützten Länder mit folgenden Code ermitteln so lange kein Nutzerverzeichnis genutzt wird:

```php
<?php

use Niirrty\Holiday\CountryDefinitionsFactory;

$supportedCountries = CountryDefinitionsFactory::GetSupportedCountries();
```

## Verfügbare Regionen

Nicht alle Länder benötigen und/oder kennen Feiertage, abhängig von Regionen.
Aber wenn benötigt. können alle definierten Regionen wie folgt ermittelt werden:

```php
$holidayDefinitions->getRegions();
```

Die integrierten Länder nutzen die folgenden Regionen:

### 'at'

* 0: Burgenland
* 1: Kärnten
* 2: Niederösterreich
* 3: Oberösterreich
* 4: Land Salzburg
* 5: Steiermark
* 6: Tirol
* 7: Vorarlberg
* 8: Wien

### 'ch'

*  0: Zürich
*  1: Bern
*  2: Luzern
*  3: Uri
*  4: Schwyz
*  5: Obwalden
*  6: Nidwalden
*  7: Glarus
*  8: Zug
*  9: Freiburg
* 10: Solothurn
* 11: Basel-Stadt
* 12: Basel-Landschaft
* 13: Schaffhausen
* 14: Appenzell Ausserrhoden
* 15: Appenzell Innerrhoden
* 16: St. Gallen
* 17: Graubünden
* 18: Aargau
* 19: Thurgau
* 20: Tessin
* 21: Waadt
* 22: Wallis
* 23: Neuburg
* 24: Genf
* 25: Jura

### 'de'

*  0: Baden-Württemberg
*  1: Bayern
*  2: Berlin
*  3: Brandenburg
*  4: Bremen
*  5: Hamburg
*  6: Hessen
*  7: Mecklenburg-Vorpommern
*  8: Niedersachsen
*  9: Nordrhein-Westfalen
* 10: Rheinland-Pfalz
* 11: Saarland
* 12: Sachsen
* 13: Sachsen-Anhalt
* 14: Schleswig-Holstein
* 15: Thüringen
* 16: Sachsen, Bautzen OT Bolbritz
* 17: Sachsen, Bautzen OT Salzenforst
* 18: Sachsen, Crostwitz
* 19: Sachsen, Göda OT Prischwitz
* 20: Sachsen, Großdubrau OT Sdier
* 21: Sachsen, Hoyerswerda OT Dörgenhausen
* 22: Sachsen, Königswartha
* 23: Sachsen, Nebelschütz
* 24: Sachsen, Neschwitz OT Neschwitz
* 25: Sachsen, Neschwitz OT Saritsch
* 26: Sachsen, Panschwitz-Kuckau
* 27: Sachsen, Puschwitz
* 28: Sachsen, Räckelwitz
* 29: Sachsen, Radibor
* 30: Sachsen, Ralbitz-Rosenthal
* 31: Sachsen, Wittichenau
* 32: Landkreis Eichsfeld
* 33: Anrode OT Bickenriede
* 34: Anrode OT Zella
* 35: Brunnhartshausen OT Föhlritz
* 36: Brunnhartshausen OT Steinberg
* 37: Buttlar
* 38: Dünwald OT Beberstedt
* 39: Dünwald OT Hüpstedt
* 40: Geisa
* 41: Rodeberg OT Struth
* 42: Schleid
* 43: Südeichsfeld
* 44: Zella/Rhön
* 45: Stadtgebiet Augsburg
* 46: Bayern, Katholische Gemeinden

### 'fr'

*  0: Île-de-France
*  1: Auvergne-Rhône-Alpes
*  2: Nouvelle-Aquitaine
*  3: Hauts-de-France
*  4: Provence-Alpes-Côte d’Azur
*  5: Bretagne
*  6: Centre-Val de Loire
*  7: Pays de la Loire
*  8: Grand Est
*  9: Normandie
* 10: Bourgogne-Franche-Comté
* 11: Okzitanien
* 12: Korsika
* 13: Guadeloupe
* 14: Martinique
* 15: Guyane française
* 16: Réunion
* 17: Mayotte

### 'it'

*  0: Lombardia
*  1: Campania
*  2: Lazio
*  3: Sicilia
*  4: Veneto
*  5: Piemonte
*  6: Emilia-Romagna
*  7: Puglia
*  8: Toscana
*  9: Calabria
* 10: Sardegna
* 11: Liguria
* 12: Marche
* 13: Abruzzo
* 14: Friuli-Venezia Giulia
* 15: Trentino-Alto Adige
* 16: Umbria
* 17: Potenza
* 18: Molise
* 19: Aosta

### 'uk' oder 'gb'

*  0: Alderney
*  1: England
*  2: Guernsey
*  3: Isle of Man
*  4: Jersey
*  5: North Ireland
*  6: Scotland
*  7: Wales



## Übersetzungen

Alle enthaltenen, initial abgedeckten Länder sollten (nicht müssen) Übersetzungen für den Feiertagsname in den Sprachen
`'de'`, `'en'`, `'fr'`, `'it'`, `'es'`, `'pt'`, `'cz'` und `'jp'`

Andere Sprachen sind natürlich auch gern gesehen! :-)



## Landesabhaengige Feiertage definieren

Jedes Land definiert alle seine Feiertage über die Klassen `\Niirrty\Holiday\Definition` und
`\Niirrty\Holiday\DefinitionCollection`, jeweils in einer separaten PHP-Datei im `data` Verzeichnis oder im
Nutzerdefinierten Verzeichnis.

### Datei-Namenskonventionen

``` 
{COUNTRY-ID}.php
```

Der Dateiname muss mit der 2-stelligien Landeskennung beginnen die für das Land steht für das die darin enthaltenen
Feiertage gelten, gefolgt von der Datei-Namenserweiterung '.php'.

Die Datei muss gültigen PHP-Code enthalten und eine `\Niirrty\Holiday\DefinitionCollection` Instanz zurüch geben, die
alle bekannten Feiertage definiert.

### Datei-Struktur

Die Basis-Dateistruktur sieht so aus:

```php
<?php


use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;
use Niirrty\Holiday\Identifiers;

return DefinitionCollection::Create( 'United Kingdom', 'uk' )

   ->setRegions(
      [
         // TODO 1: Wenn es für das Land nötig ist werden hier die Regionen festgelegt für die Feiertage gelten können
         // Als Beispiel hier mal die für uk
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
      
      // TODO 2: Hier kommen alle Feiertagsdefinitionen als kommagetrennte `\Niirrty\Holiday\Definition` Instanzen rein
      // Definition::Create( … )->…(),
      // Definition::Create( … )->…()
      
   );

```

Jetzt must Du Dir zu allen Feiertagen des Landes die einige Infos besorgen (Wikipedia ist kein schlechter Start)

### Benötigte Feiertagsinfos

* Der `Name` des Feiertages in allen unterstützten Sprachen.
* Eindeutige `Kennung` für den Feiertag, falls nicht bereits duch die `Niirrty\Holiday\Identifiers`::* Konstanten definiert.
* Der Feiertags `Tag` und `Monat`, wenn das Feiertagsdatum statisch ist oder ein Callback mit dem das Feiertagsdatum dynamisch für ein Jahr berechnet wird.
* Das optionale `Startjahr` und `Endjahr` wo der Feiertag gültig ist.
* Optionale `Bedingungen` unter denen sich ein Feiertag auf einen anderen Tag verschiebt.
* Optionale `Regionen` für die ein Feiertag gültig ist (default=gültig für alle Regionen)
* Information ob der Feiertag ein arbeitsfreier oder nicht arbeitsfreier Feiertag ist.

Wenn Du all diese Infos gesammelt hast, kannst Du anfangen die Feiertage da zu definieren (Kommagetrennt) wo `TODO 2` steht.

### Feiertags-Definition

Der einfachste Typ eines Feiertages ist der mit einem statischen, fixen Tag und Monat:

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

Die Kennung (Identifier) muss für jede Definition eindeutig sein! Wenn der Feiertag oft genutzt wird macht es Sinn
das evtl mal in die Klasse `Niirrty\Holiday\Identifiers` aufzunehmen.

`setName( '…' )` setzt Den Name des Feiertags in der Hauptsprache des Landes.

### Bedingtes Verschieben von Feiertagen

Aber dieser oben gezeigte Feiertag ist z.B. in UK und anderen Ländern nur gültig wenn er nicht auf einen Samstag oder
Sonntag fällt. Ansonsten wird der Feiertag auf den nächsten Montag verschoben

Das bedeuted folgende Bedingungen + Aktionen müssen definiert werden

* `Feiertag fällt auf einen Sonntag` => um 1 Tag auf Montag verschieben
* `Feiertag fällt auf einen Samstag` => um 2 Tage auf Montag verschieben

Das kann einfach erledigt werden indem bereits fertige Bedingungen (`\Niirrty\Holiday\DateMove\MoveCondition`) genutzt werden:

```php
<?php

            // 03-17 : Saint Patrick's Day…
            Definition::Create( Identifiers::SAINT_PATRICKS_DAY )
                      ->setStaticDate( 3, 17 )
                      ->setName( 'Saint Patrick\'s Day' )
                      
                      // Feiertag zum nächsten Tag (Montag) verschieben wenn Feiertag am Sonntag stattfindet
                      ->addMoveCondition( MoveCondition::OnSunday( 1 ) )
                      // Feiertag 2 Tage (Montag) verschieben wenn Feiertag am Samstag stattfindet
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

Allerdings kann eine Bedingung auch mit einem eigenen Callback definiert werden:

```php
<?php

            // 03-17 : Saint Patrick's Day…
            Definition::Create( Identifiers::SAINT_PATRICKS_DAY )
                      ->setStaticDate( 3, 17 )
                      ->setName( 'Saint Patrick\'s Day' )
                      
                      // Feiertag zum nächsten Tag (Montag) verschieben wenn Feiertag am Sonntag stattfindet
                      ->addMoveCondition( MoveCondition::Create(
                         1,
                         function ( \DateTime $date ) : bool
                         {
                            return 0 === ( (int) $date->format( 'w' ) );
                         } ) )
                      // Feiertag 2 Tage (Montag) verschieben wenn Feiertag am Samstag stattfindet
                      ->addMoveCondition( MoveCondition::Create(
                         2,
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

### Regionsabhängige Feiertage

Wenn ein Feiertag nur für eine oder mehrere Regionen gültig sein soll, kann das über `->setValidRegions( [ … ] )`
definiert werden.

```php

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

### Dynamische Feiertage

Es gibt sehr viele Feiertage die dynamisch berechnet werden. Um das zu ermöglichen wird eine Klasse genutzt, die die
Schnittstelle `Niirrty\Holiday\Callbacks\IDynamicDateCallback` implementiert:

```php

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

Hier eine Lister der momentan verfügbaren Callbacks

#### `\Niirrty\Holiday\Callbacks\ModifyDateCallback`

Wenn ein Datum anhand einer Datums-Modifizierung berechnet werden soll.

Das bedeuted es wird ein statischer Tag und Monat festgelegt, und eine Zeichenkette die `\DateTime::modify(…)` versteht,
mit der definiert wird wohin verschoben werden soll.

z.B.:

```php
new ModifyDateCallback( 11, 23, 'last wednesday' )
```

Mein z.B. ausgehend von 23.1. eines jeweiweiligen Jahres, der letzte Montag oder halt der 23.11 wenn es ein Montag ist.

#### `\Niirrty\Holiday\Callbacks\EasterDateCallback`

Für Feiertage deren Zeitpunkt vom Ostersonntag abhängig ist.

Es braucht hier nur die Differenz in Tagen angegeben werden (positiv oder negativ) um die der Feiertag im Vergleich
zum Ostersonntag verschoben werden soll.

```php
new EasterDateCallback( -2 )
```

Im Beispiel wird der Karfreitag berechnet (Ostersonntag - 2 Tage)

#### `\Niirrty\Holiday\Callbacks\NamedDateCallback`

Datum wird "namentlich" benannt in Kombination mit dem jeweils genutzten Jahr.

Mal angenommen der Feiertag findet jeden letzten Montag im Monat Januar stat.

Die für PHPs DateTime Klasse dazu nötige Zeichenkette ist für 2018 dann z.B.

```php
'last monday of january 2018'
```

Da das Jahr dynamisch gesetzt wird wird nur `'last monday of january'` als Prefix benötigt.

```php
new NamedDateCallback( 'last monday of january' )
```

#### `\Niirrty\Holiday\Callbacks\AdventDateCallback`

Für Feiertage deren Berechnung abhängig von einem Adventsfeiertagsdatum sind (z.B. Totensonntag, 1.-4. Advent)

Es ist hier die Nummer des Adventsfeiertages anzugeben und eine optionale Verschiebung in Tagen.

```php
new AdventDateCallback( 1, -7 )
```

Das Beispiel zeigt den Totensonntag (1. Advent - 7 Tage)

#### `\Niirrty\Holiday\Callbacks\SeasonDateCallback`

Zur Berechnung des Begins der 4 Jahreszeiten (Tag-Nacht-Gleichen und Sonnenwenden) für die nördliche oder südliche Hemisphäre.

```php
new SeasonDateCallback( SeasonDateCallback::TYPE_SPRING, SeasonDateCallback::HEMISPHERE_NORTH )
```

#### `\Niirrty\Holiday\Callbacks\GenericDateCallback`

Dies ist die unversellste Implementierung eines Callback. Der Callback ist dabei ein klassisches callable Element
das von der Klasse im Hintergrund genutzt wird.

```php
new GenericDateCallback( function( int $year ) : \DateTime
   {
      return ( 0 === $year % 2 )
               ? \Niirrty\Date\DateTime::Create( $year, 5, 1 )
               : \Niirrty\Date\DateTime::Create( $year, 5, 2 );
   }
);
```

Aber den generischen Callback bitte nur nutzen wenn es sich dabei um einzelne benötigte Callbacks handelt.

Sonst lieber eine eigene Implementierung von `\Niirrty\Holiday\Callbacks\IDynamicDateCallback`

#### `\Niirrty\Holiday\Callbacks\IDynamicDateCallback` implementieren

Es ist einfach einen eigenen Callback zu implementieren.

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

#### Feiertage abhängig von Ostern

Definitionen zur Feiertagen die bezogen auf Ostern sind können einfacher wie folgt initialisiert werden:

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

### Feiertage gültig für einen Jahres-Bereich

Du kannst `->setValidFromYear( … )` nutzen um zu sagen ab welchen Jahr ein Feiertag gültig ist.

Und Du kannst `->setValidToYear( … )` nutzen um zu sagen bis zu welchen Jahr ein Feiertag gültig ist.

Wenn `ValidToYear` vor `ValidFromYear` liegt bedeutet das das der Feiertag im Jahr `ValidToYear` das letzte mal
gültig ist und dann ab dem Jahr `ValidFromYear` erneut wieder gültig wird.

Wenn es sich um mehr Bereich handelt muss der Feiertag mehrfach angelegt werden.

Aber ACHTUNG: IMMER UNTERSCHIEDLICHE FEIERTAGS-KENNUNGEN (IDENTIFIER) NUTZEN!


### Arbeitsfreie Feiertage

Es gibt die Möglichkeit Feiertage zwischen arbeitsfreien und nicht arbeitsfreien zu unterscheiden.

Mit `->setIsRestDay( true|false )` kann man das in der Declaration festlegen.

Ende…