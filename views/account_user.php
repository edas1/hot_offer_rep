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
 * @package   views
 * @copyright (C) OXID eSales AG 2003-2012
 * @version OXID eShop CE
 * @version   SVN: $Id: account_user.php 43728 2012-04-11 07:35:22Z vaidas.matulevicius $
 */

/**
 * Current user Data Maintenance form.
 * When user is logged in he may change his Billing and Shipping
 * information (this is important for ordering purposes).
 * Information as email, password, greeting, name, company, address
 * etc. Some fields must be entered. OXID eShop -> MY ACCOUNT
 * -> Update your billing and delivery settings.
 */
class Account_User extends Account
{
    /**
     * Current class template name.
     *
     * @var string
     */
    protected $_sThisTemplate = 'page/account/user.tpl';

    /**
     * If user is not logged in - returns name of template account_user::_sThisLoginTemplate,
     * or if user is allready logged in additionally loads user delivery address
     * info and forms country list. Returns name of template account_user::_sThisTemplate
     *
     * @return  string  $_sThisTemplate current template file name
     */
    public function render()
    {

        parent::render();

        // is logged in ?
        if ( !( $this->getUser() ) ) {
            return $this->_sThisTemplate = $this->_sThisLoginTemplate;
        }

        return $this->_sThisTemplate;
    }

    /**
     * Template variable getter. Checks to show or not shipping address entry form
     *
     * @return bool
     */
    public function showShipAddress()
    {
        return oxSession::getVar( 'blshowshipaddress' );
    }

    /**
     * Return country list
     *
     * @deprecated will be removed in future: use oxViewConfig::getCountryList()
     *
     * @return oxcountrylist
     */
    public function getCountryList()
    {
        if ( $this->_oCountryList === null ) {
            // passing country list
            $this->_oCountryList = oxNew( 'oxcountrylist' );
            $this->_oCountryList->loadActiveCountries();
        }
        return $this->_oCountryList;
    }

    /**
     * Returns Bread Crumb - you are here page1/page2/page3...
     *
     * @return array
     */
    public function getBreadCrumb()
    {
        $aPaths = array();
        $aPath = array();

        $aPath['title'] = oxLang::getInstance()->translateString( 'PAGE_ACCOUNT_MY_ACCOUNT', oxLang::getInstance()->getBaseLanguage(), false );
        $aPath['link']  = oxSeoEncoder::getInstance()->getStaticUrl( $this->getViewConfig()->getSelfLink() . 'cl=account' );
        $aPaths[] = $aPath;

        $aPath['title'] = oxLang::getInstance()->translateString( 'BILLING_SHIPPING_SETTINGS', oxLang::getInstance()->getBaseLanguage(), false );
        $aPath['link']  = $this->getLink();
        $aPaths[] = $aPath;

        return $aPaths;
    }
}
