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
 * @version   SVN: $Id: oxfb.php 25467 2010-02-01 14:14:26Z alfonsas $
 */


try {
    include_once getShopBasePath() . "core/facebook/facebook.php";
} catch ( Exception $oEx ) {
    // skipping class includion if curl or json is not active
    oxConfig::getInstance()->setConfigParam( "bl_showFbConnect", false );
    return;
}

//error_reporting($iOldErrorReproting);

/**
 * Facebook API
 *
 * @package core
 */
class oxFb extends Facebook
{
    /**
     * oxUtils class instance.
     *
     * @var oxutils
     */
    private static $_instance = null;

    /**
     * oxUtils class instance.
     *
     * @var oxutils
     */
    protected $_blIsConnected = null;

    /**
     * Sets default application parameters - FB application ID,
     * secure key and cookie support.
     *
     * @return null
     */
    public function __construct()
    {
        $oConfig = oxConfig::getInstance();

        $aFbConfig["appId"]  = $oConfig->getConfigParam( "sFbAppId" );
        $aFbConfig["secret"] = $oConfig->getConfigParam( "sFbSecretKey" );
        $aFbConfig["cookie"] = true;

        BaseFacebook::__construct( $aFbConfig );
    }

    /**
     * Returns object instance
     *
     * @return oxPictureHandler
     */
    public static function getInstance()
    {
        // disable caching for test modules
        if ( defined( 'OXID_PHP_UNIT' ) ) {
            self::$_instance = modInstances::getMod( __CLASS__ );
        }

        if ( !self::$_instance instanceof oxFb ) {

            self::$_instance = oxNew( 'oxFb' );
            if ( defined( 'OXID_PHP_UNIT' ) ) {
                modInstances::addMod( __CLASS__, self::$_instance);
            }
        }
        return self::$_instance;
    }

    /**
     * Checks is user is connected using Facebook connect.
     *
     * @return bool
     */
    public function isConnected()
    {
        $oConfig = oxConfig::getInstance();

        if ( !$oConfig->getConfigParam( "bl_showFbConnect" ) ) {
            return false;
        }

        if ( $this->_blIsConnected !== null ) {
            return $this->_blIsConnected;
        }

        $this->_blIsConnected = false;
        $oUser = $this->getUser();

        if (!$oUser) {
            $this->_blIsConnected = false;
            return $this->_blIsConnected;
        }

        $this->_blIsConnected = true;
        try {
            $this->api('/me');
        } catch (FacebookApiException $e) {
            $this->_blIsConnected = false;
        }

        return $this->_blIsConnected;
    }

    /**
     * Provides the implementations of the inherited abstract
     * methods.  The implementation uses PHP sessions to maintain
     * a store for authorization codes, user ids, CSRF states, and
     * access tokens.
     *
     * @param string $key   Session key
     * @param string $value Session value
     *
     * @return null
     */
    protected function setPersistentData($key, $value)
    {
        if (!in_array($key, self::$kSupportedKeys)) {
            self::errorLog('Unsupported key passed to setPersistentData.');
            return;
        }

        $sSessionVarName = $this->constructSessionVariableName($key);
        oxSession::getInstance()->setVar($sSessionVarName, $value);
    }

    /**
     * GET session value
     *
     * @param string $key     Session key
     * @param boot   $default Default value, if session key not found
     *
     * @return string Session value / default
     */
    protected function getPersistentData($key, $default = false)
    {
        if (!in_array($key, self::$kSupportedKeys)) {
            self::errorLog('Unsupported key passed to getPersistentData.');
            return $default;
        }

        $sSessionVarName = $this->constructSessionVariableName($key);
        return (oxSession::getInstance()->hasVar($sSessionVarName) ?
            oxSession::getInstance()->getVar($sSessionVarName) : $default);
    }

    /**
     * Remove session parameter
     *
     * @param string $key Session param key
     *
     * @return null
     */
    protected function clearPersistentData($key)
    {
        if (!in_array($key, self::$kSupportedKeys)) {
            self::errorLog('Unsupported key passed to clearPersistentData.');
            return;
        }

        $sSessionVarName = $this->constructSessionVariableName($key);
        oxSession::getInstance()->deleteVar($sSessionVarName);
    }
}
