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
 * @copyright (C) OXID eSales AG 2003-2011
 * @version OXID eShop CE
 * @version   SVN: $Id: account_noticelist.php 35786 2011-06-03 07:59:07Z linas.kukulskis $
 */

/**
 * Current user notice list manager.
 * When user is logged in in this manager window he can modify
 * his notice list status - remove articles from notice list or
 * store them to shopping basket, view detail information.
 * OXID eShop -> MY ACCOUNT -> Newsletter.
 */
class Account_Noticelist extends Account
{
    /**
     * Current class template name.
     * @var string
     */
    protected $_sThisTemplate = 'page/account/noticelist.tpl';

    /**
     * Check if there is an product in the noticelist.
     *
     * @var array
     */
    protected $_aNoticeProductList = null;

    /**
     * return the similar prodcuts from the notice list.
     *
     * @var array
     */
    protected $_aSimilarProductList = null;

    /**
     * return the recommlist
     *
     * @var array
     */
    protected $_aRecommList = null;

    /**
     * Current view search engine indexing state
     *
     * @var int
     */
    protected $_iViewIndexState = VIEW_INDEXSTATE_NOINDEXNOFOLLOW;

    /**
     * If user is not logged in - returns name of template
     * Account_Noticelist::_sThisLoginTemplate, or if user is allready
     * logged in - loads notice list articles (articles may be accessed
     * by oxuser::getBasket()), loads similar articles (if available) for
     * the last article in list oxarticle::GetSimilarProducts() and
     * returns name of template to render account_noticelist::_sThisTemplate
     *
     * @return string current template file name
     */
    public function render()
    {
        parent::render();

        // is logged in ?
        $oUser = $this->getUser();
        if ( !$oUser ) {
            return $this->_sThisTemplate = $this->_sThisLoginTemplate;
        }

        return $this->_sThisTemplate;
    }

    /**
     * Template variable getter. Returns an array if there is something in the list
     *
     * @return array
     */
    public function getNoticeProductList()
    {
        if ( $this->_aNoticeProductList === null ) {
            if ( $oUser = $this->getUser() ) {
                $this->_aNoticeProductList = $oUser->getBasket( 'noticelist' )->getArticles();
            }
        }
        return $this->_aNoticeProductList;
    }

    /**
     * Template variable getter. Returns the products which are in the noticelist
     *
     * @return array
     */
    public function getSimilarProducts()
    {
        // similar products list
        if ( $this->_aSimilarProductList === null && count( $this->getNoticeProductList() ) ) {

            // just ensuring that next call will skip this check
            $this->_aSimilarProductList = false;

            // loading similar products
            if ( $oSimilarProd = current( $this->getNoticeProductList() ) ) {
                $this->_aSimilarProductList = $oSimilarProd->getSimilarProducts();
            }
        }

        return $this->_aSimilarProductList;
    }

    /**
     * Template variable getter. Returns the recommlist
     *
     * @return array
     */
    public function getSimilarRecommLists()
    {
        if ( $this->getViewConfig()->getShowListmania() ) {
            // recommlist
            if ( $this->_aRecommList === null ) {

                // just ensuring that next call will skip this check
                $this->_aRecommList = false;

                // loading recomm list
                $aNoticeProdList = $this->getNoticeProductList();
                if ( is_array( $aNoticeProdList ) && count( $aNoticeProdList ) ) {
                    $oRecommList = oxNew('oxrecommlist');
                    $this->_aRecommList = $oRecommList->getRecommListsByIds( array_keys( $aNoticeProdList ));

                }
            }
            return $this->_aRecommList;
        }
    }

    /**
     * Returns Bread Crumb - you are here page1/page2/page3...
     *
     * @return array
     */
    public function getBreadCrumb()
    {
        $aPaths = array();
        $aPath  = array();
        
        $aPath['title'] = oxLang::getInstance()->translateString( 'PAGE_ACCOUNT_MY_ACCOUNT', oxLang::getInstance()->getBaseLanguage(), false );
        $aPath['link']  =  oxSeoEncoder::getInstance()->getStaticUrl( $this->getViewConfig()->getSelfLink() . "cl=account" );
        $aPaths[] = $aPath;

        $aPath['title'] = oxLang::getInstance()->translateString( 'PAGE_ACCOUNT_NOTICELIST_MYWISHLIST', oxLang::getInstance()->getBaseLanguage(), false );
        $aPath['link']  = $this->getLink();
        $aPaths[] = $aPath;

        return $aPaths;
    }
}
