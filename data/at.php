<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;
use Niirrty\Holiday\Identifiers;


return DefinitionCollection::Create( 'Österreich', 'de' )

   ->setRegions(
      [
         'Burgenland',                 // 0
         'Kärnten',                    // 1
         'Niederösterreich',           // 2
         'Oberösterreich',             // 3
         'Land Salzburg',              // 4
         'Steiermark',                 // 5
         'Tirol',                      // 6
         'Vorarlberg',                 // 7
         'Wien'                        // 8
      ]
   )

   ->addRange(

      // 01-01 Neujahr - New Year
      Definition::CreateNewYear( 'Neujahr' )
                ->setNameTranslations( [
                   'de' => 'Neujahr',
                   'en' => 'New Year',
                   'fr' => 'Jour de l\'An',
                   'it' => 'Capodanno',
                   'es' => 'Año Nuevo',
                   'pt' => 'Mãe de Deus',
                   'cz' => 'Nový rok',
                   'jp' => '元日'
                ] ),

      // 01-06 Heilige Drei Könige - Epiphany (Holy 3 kings)
      Definition::Create( Identifiers::EPIPHANY )
                ->setStaticDate( 1, 6 )
                ->setName( 'Heilige Drei Könige' )
                ->setNameTranslations( [
                   'de' => 'Heilige Drei Könige',
                   'en' => 'Epiphany',
                   'fr' => 'Épiphanie',
                   'it' => 'Epifania',
                   'es' => 'Epifanía',
                   'pt' => 'Epifania',
                   'cz' => 'Epiphany',
                   'jp' => 'エピファニー'
                ] ),

      // 03-19 : Josef - Joseph of Nazareth
      Definition::Create( 'Joseph of Nazareth' )
                ->setStaticDate( 3, 19 )
                ->setName( 'Josef' )
                ->setDescription( 'Betrifft oft nur Schulen, Ämter und Behörden.' )
                ->setValidRegions( [ 1, 5, 6, 7 ] )
                ->setNameTranslations( [
                   'de' => 'Josef',
                   'en' => 'Joseph of Nazareth',
                   'fr' => 'Joseph de Nazareth',
                   'it' => 'Giuseppe di Nazaret',
                   'es' => 'José de Nazaret',
                   'pt' => 'José de Nazaré',
                   'cz' => 'Joseph z Nazaretu',
                   'jp' => 'ナザレのヨセフ'
                ] ),

      // Karfreitag - Good Friday (Easter sunday - 2 days)
      Definition::CreateEasterDepending( Identifiers::GOOD_FRIDAY, -2 )
                ->setName( 'Karfreitag' )
                ->setDescription(
                  'Feiertag nach Arbeitsruhegesetz nur für Angehörige der Evangelischen Kirche A.B., Evangelischen' .
                  'Kirche H.B., der Altkatholischen Kirche und der Evangelisch-methodistischen Kirche.' )
                ->setNameTranslations( [
                   'de' => 'Karfreitag',
                   'en' => 'Good Friday',
                   'fr' => 'Vendredi Saint',
                   'it' => 'Venerdì Santo',
                   'es' => 'Viernes Santo',
                   'pt' => 'Sexta-feira Santa',
                   'cz' => 'Velký pátek',
                   'jp' => '良い金曜日'
                ] ),

      // Ostermontag - Easter Monday (Easter sunday + 1 day)
      Definition::CreateEasterDepending( Identifiers::EASTER_MONDAY, 1 )
                ->setName( 'Ostermontag' )
                ->setNameTranslations( [
                   'de' => 'Ostermontag',
                   'en' => 'Easter Monday',
                   'fr' => 'Lundi de Pâques',
                   'it' => 'Pasquetta',
                   'es' => 'Lunes de Pascua',
                   'pt' => 'Feira de Páscoa',
                   'cz' => 'Velikonoční pondělí',
                   'jp' => '復活の月曜日'
                ] ),

      // 05-01 : Staatsfeiertag - National Day
      Definition::Create( Identifiers::NATIONAL_DAY )
                ->setStaticDate( 5, 1 )
                ->setName( 'Staatsfeiertag' )
                ->setNameTranslations( [
                   'de' => 'Staatsfeiertag',
                   'en' => 'National holiday',
                   'fr' => 'Fête nationale',
                   'it' => 'Festa nazionale',
                   'es' => 'Fiesta nacional',
                   'pt' => 'Feriado nacional',
                   'cz' => 'Státní svátek',
                   'jp' => '祭日'
                ] ),

      // 05-04 : Florian - Saint Florian
      Definition::Create( 'Saint Florian' )
                ->setStaticDate( 5, 4 )
                ->setDescription(
                   '(Florian von Lorch) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
                ->setValidRegions( [ 3 ] )
                ->setNameTranslations( [
                   'de' => 'Florian',
                   'en' => 'Saint Florian',
                   'fr' => 'Saint Florian',
                   'it' => 'San Floriano',
                   'es' => 'San Florián',
                   'pt' => 'São Floriano',
                   'cz' => 'Saint Florian',
                   'jp' => '聖フロリアン'
                ] ),

      // Christi Himmelfahrt - Ascension of Christ (Easter sunday + 39 days)
      Definition::CreateEasterDepending( Identifiers::ASCENSION, 39 )
                ->setName( 'Christi Himmelfahrt' )
                ->setNameTranslations( [
                   'de' => 'Christi Himmelfahrt',
                   'en' => 'Ascension of Christ',
                   'fr' => 'Ascension du Christ',
                   'it' => 'Ascensione di Cristo',
                   'es' => 'Ascensión de Cristo',
                   'pt' => 'Ascensão de Cristo',
                   'cz' => 'Ascension of Christ',
                   'jp' => 'キリストの昇天'
                ] ),

      // Pfingstmontag - Whit Monday (Easter sunday + 50 days)
      Definition::CreateEasterDepending( Identifiers::WHIT_MONDAY, 50 )
                ->setName( 'Pfingstmontag' )
                ->setNameTranslations( [
                   'de' => 'Pfingstmontag',
                   'en' => 'Whit Monday',
                   'fr' => 'lundi de Pentecôte',
                   'it' => 'Lunedi di Pentecoste',
                   'es' => 'Lunes de Pentecostés',
                   'pt' => 'Whit segunda-feira',
                   'cz' => 'Svatodušní pondělí',
                   'jp' => '聖霊降臨祭の月曜日'
                ] ),

      // Fronleichnam - Corpus Christi (Easter sunday + 60 days)
      Definition::CreateEasterDepending( Identifiers::CORPUS_CHRISTI, 60 )
                ->setName( 'Fronleichnam' )
                ->setNameTranslations( [
                   'de' => 'Fronleichnam',
                   'en' => 'Corpus Christi',
                   'fr' => 'Fête-Dieu',
                   'it' => 'Corpus Domini',
                   'es' => 'Corpus Cristi',
                   'pt' => 'corpo de Deus',
                   'cz' => 'Corpus Christi',
                   'jp' => 'コーパスクリスティ'
                ] ),

      // 08-15 : Mariä Himmelfahrt - Assumption Day
      Definition::Create( Identifiers::ASSUMPTION )
                ->setStaticDate( 8, 15 )
                ->setName( 'Mariä Himmelfahrt' )
                ->setNameTranslations( [
                   'de' => 'Mariä Himmelfahrt',
                   'en' => 'Assumption Day',
                   'fr' => 'fête de l\'Assomption',
                   'it' => 'Giorno dell\'assunzione',
                   'es' => 'Día de la Asunción',
                   'pt' => 'Dia da Assunção',
                   'cz' => 'Nanebevzetí Panny Marie',
                   'jp' => '昇天の日'
                ] ),

      // 09-24 : Rupert - Rupert of Salzburg
      Definition::Create( 'Rupert of Salzburg' )
                ->setStaticDate( 9, 24 )
                ->setName( 'Rupert' )
                ->setDescription(
                   '(Rupert von Salzburg) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
                ->setValidRegions( [ 4 ] )
                ->setNameTranslations( [
                   'de' => 'Rupert',
                   'en' => 'Rupert of Salzburg',
                   'fr' => 'Rupert de Salzbourg',
                   'it' => 'Rupert di Salisburgo',
                   'es' => 'Ruperto de Salzburgo',
                   'pt' => 'Rupert de Salzburg',
                   'cz' => 'Rupert Salcburku',
                   'jp' => 'ザルツブルクのルパート'
                ] ),

      // 10-10 : Tag der Volksabstimmung - Day of referendum
      Definition::Create( 'Day of referendum' )
                ->setStaticDate( 10, 10 )
                ->setName( 'Tag der Volksabstimmung' )
                ->setNameTranslations( [
                   'de' => 'Tag der Volksabstimmung',
                   'en' => 'Day of referendum',
                   'fr' => 'Jour de référendum',
                   'it' => 'Giorno del referendum',
                   'es' => 'Día del referéndum',
                   'pt' => 'Dia de referendo',
                   'cz' => 'Den referenda',
                   'jp' => '国民投票の日'
                ] ),

      // 10-26 : Nationalfeiertag - National Day
      Definition::Create( Identifiers::NATIONAL_DAY )
                ->setStaticDate( 10, 26 )
                ->setName( 'Nationalfeiertag' )
                ->setNameTranslations( [
                   'de' => 'Nationalfeiertag',
                   'en' => 'National holiday',
                   'fr' => 'Fête nationale',
                   'it' => 'Festa nazionale',
                   'es' => 'Feriado nacional',
                   'pt' => 'Dia de referendo',
                   'cz' => 'Státní svátek',
                   'jp' => '祭日'
                ] ),

      // 11-01 : Allerheiligen -All Saints' Day
      Definition::Create( Identifiers::ALL_SAINTS )
                ->setStaticDate( 11, 1 )
                ->setName( 'Allerheiligen' )
                ->setNameTranslations( [
                   'de' => 'Allerheiligen',
                   'en' => 'All Saints\' Day',
                   'fr' => 'Fête de la Toussaint',
                   'it' => 'Ognissanti',
                   'es' => 'Día de todos los Santos',
                   'pt' => 'Dia de Todos os Santos',
                   'cz' => 'Svátek Všech svatých',
                   'jp' => '諸聖人の祝日'
                ] ),

      // 11-11 : Martin - Martin of Tours
      Definition::Create( 'Martin of Tours' )
                ->setStaticDate( 11, 11 )
                ->setName( 'Martin' )
                ->setDescription(
                   '(Martin von Tours) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
                ->setValidRegions( [ 0 ] )
                ->setNameTranslations( [
                   'de' => 'Martin',
                   'en' => 'Martin of Tours',
                   'fr' => 'Martin de Tours',
                   'it' => 'Martino di Tours',
                   'es' => 'Martín de Tours',
                   'pt' => 'Martin de Tours',
                   'cz' => 'Martin z Tours',
                   'jp' => 'トゥールのマルティヌス'
                ] ),

      // 11-15 : Leopold III.
      Definition::Create( 'Leopold III.' )
                ->setStaticDate( 11, 15 )
                ->setName( 'Leopold III.' )
                ->setDescription(
                   '(Leopold III.) Feiertag nach Landesrecht, betrifft oft nur Schulen, Ämter und Behörden.' )
                ->setValidRegions( [ 2, 8 ] )
                ->setNameTranslations( [
                   'de' => 'Leopold III.',
                   'jp' => 'レオポルドIII。'
                ] ),

      // 12-08 : Mariä Empfängnis - Immaculate conception
      Definition::Create( 'Immaculate conception' )
                ->setStaticDate( 12, 8 )
                ->setName( 'Mariä Empfängnis' )
                ->setDescription(
                  'Wenn der 8. Dezember auf einen Werktag fällt, dürfen Arbeitnehmer zu besonderen Bedingungen in ' .
                  'Verkaufsstellen beschäftigt werden.' )
                ->setNameTranslations( [
                   'de' => 'Mariä Empfängnis',
                   'en' => 'Immaculate conception',
                   'fr' => 'Immaculée conception',
                   'it' => 'Immacolata concezione',
                   'es' => 'Inmaculada concepción',
                   'pt' => 'Concepção imaculada',
                   'cz' => 'Neposkvrněné početí',
                   'jp' => '無原罪懐胎'
                ] ),

      // 12-25 : 1. Weihnachtsfeiertag - Christmas Day
      Definition::Create( Identifiers::CHRISTMAS_DAY )
                ->setStaticDate( 12, 25 )
                ->setName( 'Christtag' )
                ->setNameTranslations( [
                   'de' => '1. Weihnachtsfeiertag',
                   'en' => 'Christmas Day',
                   'fr' => 'Noël',
                   'it' => 'Natale',
                   'es' => 'Navidad',
                   'pt' => 'Natal do Senhor',
                   'cz' => '1. svátek vánoční',
                   'jp' => '1.クリスマス'
                ] ),

      // 12-26 : 2. Weihnachtsfeiertag - Boxing Day
      Definition::Create( Identifiers::BOXING_DAY )
                ->setStaticDate( 12, 26 )
                ->setName( 'Stefanitag' )
                ->setNameTranslations( [
                   'de' => '2. Weihnachtsfeiertag',
                   'en' => 'Boxing Day',
                   'fr' => 'Lendemain de Noël',
                   'it' => 'Santo Stefano',
                   'es' => 'Sant Esteve',
                   'pt' => '2. Dia de Natal',
                   'cz' => '2. svátek vánoční',
                   'jp' => '2.クリスマスの日'
                ] )

   );

