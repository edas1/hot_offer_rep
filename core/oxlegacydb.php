<?php
/**
 *    This file is part of OXID eShop Community Edition.
 *
 *    OXID eShop Community Edition is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    OXID eShop Community Edition is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @package   core
 * @copyright (C) OXID eSales AG 2003-2012
 * @version OXID eShop CE
 * @version   SVN: $Id: oxlegacydb.php 43410 2012-03-30 14:54:00Z linas.kukulskis $
 */


/**
 * Database connection class
 */
class oxLegacyDb extends oxSuperCfg
{

    /**
     * Database connection object
     *
     * @var object
     */
    protected $_oDb = null;



     /**
     * Set slave connect
     *
     * @param object $oConnection Connection
     *
     * @return null
     */
    public function setConnection( $oConnection )
    {
        $this->_oDb = $oConnection;
    }

    /**
     * Set fetch mode to connection
     *
     * @param int $iFetchMode Fetch mode
     *
     * @return null
     */
    public function setFetchMode ( $iFetchMode )
    {
        $this->_oDb->setFetchMode( $iFetchMode );

    }

     /**
     * Return conection to db
     *
     * @param bool $blType - connection type
     *
     * @return object
     */
    public function getDb( $blType = true )
    {

            return $this->_oDb;
    }

    /**
     * Get value
     *
     * @param string $sSql    Query
     * @param array  $aParams Array of parameters
     * @param bool   $blType  connection type
     *
     * @return string
     */
    public function getOne( $sSql, $aParams = false, $blType = true )
    {
        return $this->getDb( $blType )->getOne( $sSql, $aParams );
    }

    /**
     * Get value
     *
     * @param string $sSql    Query
     * @param array  $aParams Array of parameters
     * @param bool   $blType  connection type
     *
     * @return string
     */
    public function getArray( $sSql, $aParams = false, $blType = true )
    {
        return $this->getDb( $blType )->getArray( $sSql, $aParams );
    }

    /**
     * Get value
     *
     * @param string $sSql    Query
     * @param array  $aParams Array of parameters
     * @param bool   $blType  connection type
     *
     * @return string
     */
    public function getRow( $sSql, $aParams = false, $blType = true )
    {
        return $this->getDb( $blType )->getRow( $sSql, $aParams );
    }

    /**
     * Get value
     *
     * @param string $sSql    Query
     * @param array  $aParams Array of parameters
     * @param bool   $blType  connection type
     *
     * @return array
     */
    public function getAll( $sSql, $aParams = false, $blType = true )
    {

        return $this->getDb( $blType )->getAll( $sSql, $aParams );
    }

    /**
     * Get value
     *
     * @param string $sSql    Query
     * @param array  $aParams Array of parameters
     * @param bool   $blType  connection type
     *
     * @return object
     */
    public function select( $sSql, $aParams = false, $blType = true )
    {
        return $this->getDb( $blType )->execute( $sSql, $aParams );
    }

    /**
     * Get value
     *
     * @param string $sSql    Query
     * @param array  $aParams Array of parameters
     * @param bool   $blType  connection type
     *
     * @return object
     */
    public function getAssoc( $sSql, $aParams = false, $blType = true )
    {
        return $this->getDb( $blType )->getAssoc( $sSql, $aParams );
    }

    /**
     * Get column value
     *
     * @param string $sSql    Query
     * @param array  $aParams Array of parameters
     * @param bool   $blType  connection type
     *
     * @return object
     */
    public function getCol( $sSql, $aParams = false, $blType = true )
    {
        return $this->getDb( $blType )->getCol( $sSql, $aParams );
    }

    /**
     * Get array
     *
     * @param string $sSql    Query
     * @param int    $iRows   Rows
     * @param int    $iOffset Offset
     * @param array  $aParams Array of parameters
     * @param bool   $blType  connection type
     *
     * @return object
     */
    public function selectLimit( $sSql, $iRows=-1, $iOffset=-1, $aParams = false, $blType = true )
    {
        return $this->getDb( $blType )->SelectLimit( $sSql, $iRows, $iOffset, $aParams );
    }

    /**
     * Execute query
     *
     * @param string $sSql    Query
     * @param array  $aParams Array of parameters
     *
     * @return object
     */
    public function execute( $sSql, $aParams = false )
    {
        return $this->getDb( false )->execute( $sSql, $aParams );
    }

    /**
     * Execute query
     *
     * @param string $sSql    Query
     * @param array  $aParams Array of parameters
     *
     * @return object
     */
    public function query( $sSql, $aParams = false )
    {
        return $this->getDb( false )->Query( $sSql, $aParams );
    }

    /**
     * Return count effected values
     *
     * @return int
     */
    public function Affected_Rows()
    {
        return $this->getDb( false )->Affected_Rows();
    }

     /**
     * Return error number
     *
     * @return int
     */
    public function errorNo()
    {
        return $this->getDb( false )->ErrorNo();
    }

    /**
     * Return error message
     *
     * @return int
     */
    public function errorMsg()
    {
        return $this->getDb( false )->ErrorMsg();
    }

    /**
     * Quote string
     *
     * @param string $sValue value
     *
     * @return object
     */
    public function qstr( $sValue )
    {
        return $this->getDb()->qstr( $sValue );
    }

    /**
     * Quote string
     *
     * @param string $sValue value
     *
     * @return object
     */
    public function quote( $sValue )
    {
        return $this->getDb()->quote( $sValue );
    }

    /**
     * return meta data
     *
     * @param string $sTable Table name
     *
     * @return object
     */
    public function metaColumns( $sTable )
    {
        return $this->getDb()->MetaColumns( $sTable );
    }

    /**
     * return meta data
     *
     * @param string $sTable       Table name
     * @param bool   $blNumIndexes Numeric indexes
     *
     * @return object
     */
    public function metaColumnNames( $sTable, $blNumIndexes=false )
    {
        return $this->getDb()->MetaColumnNames( $sTable, $numIndexes );
    }

    /**
     * Start mysql transaction
     *
     * @return null
     */
    public function startTransaction()
    {
        return $this->getDb( false )->execute( 'START TRANSACTION' );
    }

    /**
     * Commit mysql transaction
     *
     * @return null
     */
    public function commitTransaction()
    {
        return $this->getDb( false )->execute( 'COMMIT' );
    }

    /**
     * RollBack mysql transaction
     *
     * @return null
     */
    public function rollbackTransaction()
    {
        return $this->getDb( false )->execute( 'ROLLBACK' );
    }

    /**
     * Set transaction isolation level
     * Allowed values READ UNCOMMITTED, READ COMMITTED, REPEATABLE READ, SERIALIZABLE
     *
     * @param string $sLevel level
     *
     * @return null
     */
    public function setTransactionIsolationLevel( $sLevel = null )
    {
        $aLevels = array( 'READ UNCOMMITTED', 'READ COMMITTED', 'REPEATABLE READ', 'SERIALIZABLE' );
        if ( in_array( strtoupper( $sLevel ), $aLevels ) ) {
            return $this->getDb( false )->execute( 'SET TRANSACTION ISOLATION LEVEL ' . $sLevel );
        }
    }

}
