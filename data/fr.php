<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


use Niirrty\Holiday\Definition;
use Niirrty\Holiday\DefinitionCollection;


return DefinitionCollection::Create( 'France', 'fr', 'fr' )
    ->setRegions( [
        'Île-de-France',              // 0
        'Auvergne-Rhône-Alpes',       // 1
        'Nouvelle-Aquitaine',         // 2
        'Hauts-de-France',            // 3
        'Provence-Alpes-Côte d’Azur', // 4
        'Bretagne',                   // 5
        'Centre-Val de Loire',        // 6
        'Pays de la Loire',           // 7
        'Grand Est',                  // 8
        'Normandie',                  // 9
        'Bourgogne-Franche-Comté',    // 10
        'Okzitanien',                 // 11
        'Korsika',                    // 12
        'Guadeloupe',                 // 13
        'Martinique',                 // 14
        'Guyane française',           // 15
        'Réunion',                    // 16
        'Mayotte'                     // 17
    ] )
    ->addRange(

        #region // 01-01 New Year
        Definition::CreateNewYear(),
        #endregion

        #region // Good Friday (Easter sunday - 2 days)
        Definition::CreateEasterDepending( 'Good Friday', -2 )
            ->setValidRegions( [ 8, 13, 14 ] ),
        #endregion

        #region // Easter Monday (Easter sunday + 1 day)
        Definition::CreateEasterDepending( 'Easter Monday', 1 ),
        #endregion

        #region // 04-27 : Abolition de l’esclavage - Abolition of slavery
        Definition::Create( 'Abolition of slavery (Mayotte)' )
            ->setStaticDate( 4, 27 )
            ->setValidRegions( [ 17 ] ),
        #endregion

        #region // 05-01 : Tag der Arbeit - Labor Day
        Definition::Create( 'Labor Day' )
            ->setStaticDate( 5, 1 ),
        #endregion

        #region // 05-08 : Victoire 1945 - Day of victory 1945
        Definition::Create( 'Day of victory 1945' )
            ->setStaticDate( 5, 8 ),
        #endregion

        #region // 05-22 : Abolition de l’esclavage - Abolition of slavery
        Definition::Create( 'Abolition of slavery (Martinique)' )
            ->setStaticDate( 5, 22 )
            ->setValidRegions( [ 14 ] ),
        #endregion

        #region // 05-27 : Abolition de l’esclavage - Abolition of slavery
        Definition::Create( 'Abolition of slavery (Guadeloupe)' )
            ->setStaticDate( 5, 27 )
            ->setValidRegions( [ 13 ] ),
        #endregion

        #region // Ascension of Christ (Easter sunday + 39 days)
        Definition::CreateEasterDepending( 'Ascension Day', 39 ),
        #endregion

        #region // Whit Sunday (Easter sunday + 49 days)
        Definition::CreateEasterDepending( 'Pentecost Sunday', 49 ),
        #endregion

        #region // Whit Monday (Easter sunday + 50 days)
        Definition::CreateEasterDepending( 'Pentecost Monday', 50 )
            ->setValidToYear( 2003 )
            ->setValidFromYear( 2008 ),
        #endregion

        #region // 06-10 : Abolition de l’esclavage - Abolition of slavery
        Definition::Create( 'Abolition of slavery (Guyane française)' )
            ->setStaticDate( 6, 10 )
            ->setValidRegions( [ 15 ] ),
        #endregion

        #region // 07-14 : Fête Nationale de la France - French national holiday
        Definition::Create( 'National Day' )
            ->setStaticDate( 7, 14 ),
        #endregion

        #region // 08-15: Mariä Himmelfahrt - Assumption Day
        Definition::Create( 'Assumption of Mary' )
            ->setStaticDate( 8, 15 ),
        #endregion

        #region // 11-01 : Allerheiligen - All Saints' Day
        Definition::Create( 'All Saints\' Day' )
            ->setStaticDate( 11, 1 ),
        #endregion

        #region // 11-11 : Armistice 1918 - Truce of Compiègne
        Definition::Create( 'Truce of Compiègne' )
            ->setStaticDate( 11, 11 ),
        #endregion

        #region // 12-20 : Abolition de l’esclavage - Abolition of slavery
        Definition::Create( 'Abolition of slavery (Réunion)' )
            ->setStaticDate( 12, 20 )
            ->setValidRegions( [ 16 ] ),
        #endregion

        #region // 12-25 : Christmas Day
        Definition::Create( 'Christmas Day' )
            ->setStaticDate( 12, 25 ),
        #endregion

        #region // 12-26 : Boxing Day
        Definition::Create( 'Boxing Day' )
            ->setStaticDate( 12, 26 )
        #endregion

    )
    ->addRangeFromArray(
        include __DIR__ . '/global-norestdays.php'
    );

