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
 * @package   admin
 * @copyright (C) OXID eSales AG 2003-2012
 * @version OXID eShop CE
 * @version   SVN: $Id: article_variant.php 42806 2012-03-13 15:06:49Z linas.kukulskis $
 */

/**
 * Admin article variants manager.
 * Collects and updates article variants data.
 * Admin Menu: Manage Products -> Articles -> Variants.
 * @package admin
 */
class Article_Variant extends oxAdminDetails
{
    /**
     * Variant parent product object
     *
     * @var oxarticle
     */
    protected $_oProductParent = null;

    /**
     * Loads article variants data, passes it to Smarty engine and returns name of
     * template file "article_variant.tpl".
     *
     * @return string
     */
    public function render()
    {
        parent::render();

        $soxId = $this->getEditObjectId();
        $sSLViewName = getViewName('oxselectlist');

        // all selectlists
        $oAllSel = oxNew( "oxlist");
        $oAllSel->init( "oxselectlist");
        $sQ = "select * from $sSLViewName";
        $oAllSel->selectString( $sQ);
        $this->_aViewData["allsel"] = $oAllSel;

        $oArticle = oxNew( "oxarticle");
        $this->_aViewData["edit"] =  $oArticle;

        if ( $soxId != "-1" && isset( $soxId)) {
            // load object
            $oArticle->loadInLang( $this->_iEditLang, $soxId );


            $_POST["language"] = $_GET["language"] = $this->_iEditLang;
            $oVariants = $oArticle->getAdminVariants( $this->_iEditLang);

            $this->_aViewData["mylist"] =  $oVariants;

            // load object in other languages
            $oOtherLang = $oArticle->getAvailableInLangs();
            if (!isset($oOtherLang[ $this->_iEditLang])) {
                // echo "language entry doesn't exist! using: ".key($oOtherLang);
                $oArticle->loadInLang( key($oOtherLang), $soxId );
            }

            foreach ( $oOtherLang as $id => $language) {
                $oLang= new oxStdClass();
                $oLang->sLangDesc = $language;
                $oLang->selected = ($id == $this->_iEditLang);
                $this->_aViewData["otherlang"][$id] =  clone $oLang;
            }

            if ( $oArticle->oxarticles__oxparentid->value) {
                $this->_aViewData["parentarticle"] =  $this->_getProductParent( $oArticle->oxarticles__oxparentid->value );
                $this->_aViewData["oxparentid"]    =  $oArticle->oxarticles__oxparentid->value;
                $this->_aViewData["issubvariant"]  = 1;
                // A. disable variant information editing for variant
                $this->_aViewData["readonly"] = 1;
            }
            $this->_aViewData["editlanguage"] = $this->_iEditLang;

            $aLang = array_diff (oxLang::getInstance()->getLanguageNames(), $oOtherLang);
            if ( count( $aLang))
                $this->_aViewData["posslang"] = $aLang;

            foreach ( $oOtherLang as $id => $language) {
                $oLang= new oxStdClass();
                $oLang->sLangDesc = $language;
                $oLang->selected = ($id == $this->_iEditLang);
                $this->_aViewData["otherlang"][$id] =  $oLang;
            }
        }

        return "article_variant.tpl";
    }

    /**
     * Saves article variant.
     *
     * @param string $sOXID   Object ID
     * @param array  $aParams Parameters
     *
     * @return null
     */
    public function savevariant($sOXID = null, $aParams = null)
    {
        if ( !isset( $sOXID ) && !isset( $aParams ) ) {
            $sOXID   = oxConfig::getParameter( "voxid" );
            $aParams = oxConfig::getParameter( "editval" );
        }

        // checkbox handling
        if ( !isset( $aParams['oxarticles__oxactive'] ) ) {
            $aParams['oxarticles__oxactive'] = 0;
        }

            // shopid
            $aParams['oxarticles__oxshopid'] = oxSession::getVar( "actshop" );

        // varianthandling
        $soxparentId = $this->getEditObjectId();
        if ( isset( $soxparentId) && $soxparentId && $soxparentId != "-1" ) {
            $aParams['oxarticles__oxparentid'] = $soxparentId;
        } else {
            unset( $aParams['oxarticles__oxparentid'] );
        }

        $oArticle = oxNew( "oxarticle");

        /*
        //TODO: solve this from lazy loading point of view
        //acessing main fields for lazy loading mechnism to iniatialise them
        $oArticle->oxarticles__oxvarselect->value;
        $oArticle->oxarticles__oxartnum->value;
        $oArticle->oxarticles__oxprice->value;
        $oArticle->oxarticles__oxstock->value;
        $oArticle->oxarticles__oxshopid->value;
        $oArticle->oxarticles__oxshopincl->value;
        $oArticle->oxarticles__oxshopexcl->value;*/

        if ( $sOXID != "-1" ) {
            $oArticle->loadInLang( $this->_iEditLang, $sOXID );
        }

        $oArticle->setLanguage( 0 );
        $oArticle->assign( $aParams );
        $oArticle->setLanguage( $this->_iEditLang );


        $oArticle->save();
    }

    /**
     * Returns variant parent object
     *
     * @param string $sParentId parent product id
     *
     * @return oxarticle
     */
    protected function _getProductParent( $sParentId )
    {
        if ( $this->_oProductParent === null ||
             ( $this->_oProductParent !== false && $this->_oProductParent->getId() != $sParentId ) ) {
            $this->_oProductParent = false;
            $oProduct = oxNew( "oxarticle" );
            if ( $oProduct->load( $sParentId ) ) {
                $this->_oProductParent = $oProduct;
            }
        }
        return $this->_oProductParent;
    }

    /**
     * Saves all article variants at once.
     *
     * @return null
     */
    public function savevariants()
    {

        $aParams = oxConfig::getParameter( "editval" );
        if ( is_array( $aParams ) ) {
            foreach ( $aParams as $soxId => $aVarParams ) {
                $this->savevariant( $soxId, $aVarParams );
            }
        }

    }

    /**
     * Deletes article variant.
     *
     * @return null
     */
    public function deleteVariant()
    {


        $soxId = oxConfig::getParameter( "voxid" );
        $oDelete = oxNew( "oxarticle" );
        $oDelete->delete( $soxId );
    }

    /**
     * Changes name of variant.
     *
     * @return null
     */
    public function changename()
    {
        $soxId = $this->getEditObjectId();
        $aParams = oxConfig::getParameter( "editval");


            // shopid
            $aParams['oxarticles__oxshopid'] = oxSession::getVar( "actshop" );

        $oArticle = oxNew( "oxarticle" );
        if ( $soxId != "-1") {
            $oArticle->loadInLang( $this->_iEditLang, $soxId );
        }

        $oArticle->setLanguage( 0 );
        $oArticle->assign( $aParams);
        $oArticle->setLanguage( $this->_iEditLang );
        $oArticle->save();
    }


    /**
     * Add selection list
     *
     * @return null
     */
    public function addsel()
    {
        $oArticle = oxNew("oxarticle");
        //#3644
        //$oArticle->setEnableMultilang( false );
        if ( $oArticle->load( $this->getEditObjectId() ) ) {



            if ( $aSels = oxConfig::getParameter( "allsel" ) ) {
                $oVariantHandler = oxNew( "oxVariantHandler" );
                $oVariantHandler->genVariantFromSell( $aSels, $oArticle );
            }
        }
    }
}
