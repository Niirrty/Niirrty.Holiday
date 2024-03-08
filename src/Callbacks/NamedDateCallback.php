<?php
/**
 * @author         Ni Irrty <niirrty+code@gmail.com>
 * @copyright      © 2017-2020, Ni Irrty
 * @license        MIT
 * @since          2018-05-01
 * @version        1.3.0
 */


declare( strict_types=1 );


namespace Niirrty\Holiday\Callbacks;


/**
 * If a date should be built by a named date time string.
 *
 * For example 'last monday of january ' . $year
 *
 * so 'last monday of january ' is the prefix. Appendix is not required in this case
 *
 * @package Niirrty\Holiday\Callbacks
 */
class NamedDateCallback implements IDynamicDateCallback
{


    /**
     * The named date string prefix (year is pointed after it).
     *
     * @type string|null
     */
    protected ?string $_prefix;

    /**
     * The named date string appendix (year is pointed before it).
     *
     * @type string|null
     */
    protected ?string $_appendix;


    /**
     * NamedDateCallback constructor.
     *
     * @param string|null $prefix   The date string prefix (year is pointed after it).
     * @param string|null $appendix The date string appendix (year is pointed before it).
     */
    public function __construct( ?string $prefix, ?string $appendix = null )
    {

        $this->_prefix = ( null !== $prefix ) ? ( \rtrim( $prefix, " \t\r\n" ) . ' ' ) : $prefix;
        $this->_appendix = ( null !== $appendix ) ? ( \rtrim( $appendix, " \t\r\n" ) . ' ' ) : $appendix;

    }


    /**
     * Calculate the holiday datetime for defined year and returns it.
     *
     * @param int $year
     *
     * @return \DateTime
     * @throws \Exception
     */
    public function calculate( int $year ): \DateTime
    {

        $dateString = ( ! empty( $this->_prefix ) ? $this->_prefix : '' )
                    . $year
                    . ( ! empty( $this->_appendix ) ? $this->_appendix : '' );

        return new \DateTime( $dateString );

    }


}

