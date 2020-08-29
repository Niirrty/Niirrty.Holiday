<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright      © 2017-2020, Ni Irrty
 * @package        Niirrty\Web
 * @since          2017-12-03
 * @version        1.3.0
 */


declare( strict_types=1 );


namespace Niirrty\Holiday;


use Niirrty\IO\File;
use Niirrty\IO\FileFormatException;
use Niirrty\IO\FileNotFoundException;
use Niirrty\IO\Folder;
use Throwable;
use function array_unique;
use function dirname;
use function file_exists;
use function rtrim;
use function sort;
use function strlen;
use function strtolower;
use const DIRECTORY_SEPARATOR;


/**
 * A country depending holiday definition collection factory
 */
class CountryDefinitionsFactory
{


    // <editor-fold desc="= = =   P U B L I C   S T A T I C   M E T H O D S   = = = = = = = = = = = = = = = = = =">


    /**
     * Gets the holiday definitions of defined country
     *
     * @param string      $countryId         The 2 char ISO ISO-3166-1 country ID in lower case (e.g.: 'de', 'uk',
     *                                       etc.)
     * @param string|null $definitionsFolder Optional definitions folder if its different from the build in data folder
     *
     * @return DefinitionCollection
     * @throws FileNotFoundException If the required holiday definitions file not exist
     * @throws FileFormatException   If the country depending holidays file is not valid PHP or not a valid
     *                                           collection
     */
    public static function Create( string $countryId, ?string $definitionsFolder = null ): DefinitionCollection
    {

        if ( empty( $definitionsFolder ) )
        {
            $definitionsFolder = dirname( __DIR__ ) . '/data';
        }
        else
        {
            $definitionsFolder = rtrim( $definitionsFolder, '/\\' );
        }

        $file = $definitionsFolder . DIRECTORY_SEPARATOR . $countryId . '.php';

        if ( !file_exists( $file ) )
        {
            throw new FileNotFoundException( $file, 'Can not get holidays for country "' . $countryId . '".' );
        }

        try
        {
            /** @noinspection PhpIncludeInspection */
            $collection = include $file;
        }
        catch ( Throwable $ex )
        {
            throw new FileFormatException(
                $file,
                'Invalid country "' . $countryId . '" holiday definitions file. Include fails!',
                256,
                $ex
            );
        }

        if ( !( $collection instanceof DefinitionCollection ) )
        {
            throw new FileFormatException(
                $file,
                'Invalid country "' . $countryId . '" holiday definitions file. It not defines a "DefinitionCollection"!'
            );
        }

        return $collection;

    }

    /**
     * Gets the 2 char ISO ISO-3166-1 country IDs of the currently supported countries with known holidays
     *
     * @return array
     */
    public static function GetSupportedCountries(): array
    {

        $countryIDs = [];

        foreach ( Folder::ListFilteredFiles( dirname( __DIR__ ) . '/data', '~[a-z]{2}\.php$~',
                                             false ) as $countryFile )
        {
            $lowerCID = strtolower( File::GetNameWithoutExtension( $countryFile ) );
            if ( 2 === strlen( $lowerCID ) )
            {
                $countryIDs[] = $lowerCID;
            }
        }

        $countryIDs = array_unique( $countryIDs );
        sort( $countryIDs );

        return $countryIDs;

    }


    // </editor-fold>


}

