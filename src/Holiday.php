<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright  (c) 2017, Ni Irrty
 * @package        Niirrty\Web
 * @since          01.12.17
 * @version        0.1.0
 */


declare( strict_types = 1 );


namespace Niirrty\Holiday;


use Niirrty\Date\DateTime;


class Holiday
{


   // <editor-fold desc="// –––––––   P R O T E C T E D   F I E L D S   ––––––––––––––––––––––––––––––––––">

   /**
    * The country wide, unique, holiday identifier. A good idea is to use the english holiday name here. So most people
    * know what holiday means.
    *
    * @type string
    */
   protected $_identifier;

   /**
    * The holiday name.
    *
    * @type string
    */
   protected $_name;

   /**
    * An optional holiday description.
    *
    * @type string|null
    */
   protected $_description;

   /**
    * The holiday date
    *
    * @type \Niirrty\Date\DateTime|null
    */
   protected $_date;

   /**
    * The indexes of all country depending regions where the holiday is valid or [ -1 ] if valid for all regions or if
    * there are no regions
    *
    * @type array
    */
   protected $_regions;

   /**
    * The 2 char ISO language ID of the holiday name.
    *
    * @type string|null
    */
   protected $_languageId;

   // </editor-fold>


   // <editor-fold desc="// –––––––   C O N S T R U C T O R   A N D / O R   D E S T R U C T O R   ––––––––">

   /**
    * Holiday constructor.
    *
    * @param string $identifier The country wide, unique, holiday identifier. A good idea is to use the english holiday
    *                           name here. So most people know what holiday means.
    */
   public function __construct( string $identifier )
   {

      $this->_identifier         = $identifier;
      $this->_description        = null;
      $this->_date               = null;
      $this->_name               = $identifier;
      $this->_regions            = [ -1 ];
      $this->_languageId         = null;

   }

   // </editor-fold>


   // <editor-fold desc="// –––––––   P U B L I C   M E T H O D S   ––––––––––––––––––––––––––––––––––––––">


   // <editor-fold desc="// – – – –   G E T T E R   – – – – – – – – – – –">

   /**
    * Gets the country wide, unique, holiday identifier. A good idea is to use the english holiday name here. So
    * most people know what holiday means.
    *
    * @return string
    */
   public function getIdentifier() : string
   {

      return $this->_identifier;

   }

   /**
    * Gets the country home language holiday name.
    *
    * @return string
    */
   public function getName() : string
   {

      return $this->_name;

   }

   /**
    * Gets an optional holiday description.
    *
    * @return string|null
    */
   public function getDescription() : ?string
   {

      return $this->_description;

   }

   /**
    * Gets the holiday date.
    *
    * @return \DateTime|null
    */
   public function getDate() : ?\DateTime
   {

      return $this->_date;

   }

   /**
    * Gets the indexes of all country depending regions where the holiday is valid or [ -1 ] if valid for all regions or if
    * there are no regions
    *
    * @return array
    */
   public function getValidRegions() : array
   {

      return $this->_regions;

   }

   /**
    * Gets the 2 char ISO language ID of the holiday name or NULL if default language name is used.
    *
    * @return null|string
    */
   public function getLanguage() : ?string
   {

      return $this->_languageId;

   }

   // </editor-fold>


   // <editor-fold desc="// – – – –   S E T T E R   – – – – – – – – – – –">

   /**
    * Sets the country home language holiday name.
    *
    * @param  string $name
    * @return \Niirrty\Holiday\Holiday
    */
   public function setName( string $name ) : Holiday
   {

      $this->_name = $name;

      return $this;

   }

   /**
    * Sets an optional holiday description.
    *
    * @param  string $description
    * @return \Niirrty\Holiday\Holiday
    */
   public function setDescription( ?string $description ) : Holiday
   {

      $this->_description = $description;

      return $this;

   }

   /**
    * Sets the holiday date.
    *
    * @param  \DateTime $date
    * @return \Niirrty\Holiday\Holiday
    */
   public function setDate( \DateTime $date ) : Holiday
   {

      $this->_date = $date;

      return $this;

   }

   /**
    * Sets the indexes of the valid holiday regions.
    *
    * @param  array $regions
    * @return \Niirrty\Holiday\Holiday
    */
   public function setValidRegions( array $regions ) : Holiday
   {

      $this->_regions = $regions;

      if ( \in_array( -1, $this->_regions, true ) || 0 === \count( $this->_regions ) )
      {
         $this->_regions = [ -1 ];
      }

      return $this;

   }

   /**
    * Gets the 2 char ISO language ID of the holiday name or NULL if default language name is used.
    *
    * @param  string|null $languageId
    * @return \Niirrty\Holiday\Holiday
    */
   public function setLanguage( ?string $languageId ) : Holiday
   {

      $this->_languageId = $languageId;

      return $this;

   }

   // </editor-fold>


   // </editor-fold>


}

