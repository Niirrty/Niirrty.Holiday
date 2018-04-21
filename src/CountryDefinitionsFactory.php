<?php
/** * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @since          2017-11-21
 */


declare( strict_types = 1 );


namespace Niirrty\Holiday;


use Niirrty\IO\File;
use Niirrty\IO\Folder;


/**
 * A country depending holiday definition collection factory
 */
class CountryDefinitionsFactory
{


   // <editor-fold desc="= = =   P U B L I C   S T A T I C   M E T H O D S   = = = = = = = = = = = = = = = = = =">

   /**
    * Gets the holiday definitions of defined country
    *
    * @param  string $countryId The 2 char ISO ISO-3166-1 country ID in lower case (e.g.: 'de', 'uk', etc.)
    * @return \Niirrty\Holiday\DefinitionCollection|null
    */
   public static function Create( string $countryId ) : ?DefinitionCollection
   {

      $file = \dirname( __DIR__ ) . '/data/' . $countryId . '.php';

      if ( ! \file_exists( $file ) )
      {
         return null;
      }

      /** @noinspection PhpIncludeInspection */
      return include $file;

   }

   /**
    * Gets the 2 char ISO ISO-3166-1 country IDs of the currently supported countries with known holidays
    *
    * @return array
    */
   public static function GetSupportedCountries() : array
   {

      $countryIDs = [];

      foreach ( Folder::ListFilteredFiles( \dirname( __DIR__ ) . '/data', '~[a-z]{2}\.php$~', false ) as $countryFile )
      {
         $lowerCID = \strtolower( File::GetNameWithoutExtension( $countryFile ) );
         if ( 2 === \strlen( $lowerCID ) )
         {
            $countryIDs[] = $lowerCID;
         }
      }

      return \array_unique( $countryIDs );

   }

   // </editor-fold>


}
