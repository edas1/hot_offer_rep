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
 * @version   SVN: $Id: oxlocator.php 44342 2012-04-25 10:59:43Z linas.kukulskis $
 */

/**
 * Locator controller for: category, vendor, manufacturers and search lists.
 */
class oxLocator extends oxSuperCfg
{
    /**
     * Locator type
     */
    protected $_sType = "list";

    /**
     * Next product to currently loaded
     */
    protected $_oNextProduct = null;

    /**
     * Previous product to currently loaded
     */
    protected $_oBackProduct = null;

    /**
     * search handle
     */
    protected $_sSearchHandle = null;

    /**
     * error message
     */
    protected $_sErrorMessage = null;

    /**
     * Class constructor - sets locator type and parameters posted or loaded
     * from GET/Session
     *
     * @param string $sType locator type
     */
    public function __construct( $sType = null )
    {
        // setting locator type
        if ( $sType ) {
            $this->_sType = trim( $sType );
        }
    }

    /**
     * Executes locator method according locator type
     *
     * @param oxarticle $oCurrArticle   current article
     * @param oxubase   $oLocatorTarget oxubase object
     *
     * @return null
     */
    public function setLocatorData( $oCurrArticle, $oLocatorTarget )
    {
        $sLocfnc = "_set{$this->_sType}LocatorData";
        $this->$sLocfnc( $oLocatorTarget, $oCurrArticle );

        // passing list type to view
        $oLocatorTarget->setListType( $this->_sType );
    }
    
    /**
     * Sets details locator data for articles that came from regular list.
     *
     * @param oxubase   $oLocatorTarget view object
     * @param oxarticle $oCurrArticle   current article
     *
     * @return null
     */
    protected function _setListLocatorData( $oLocatorTarget, $oCurrArticle )
    {
        // if no active category is loaded - lets check for category passed by post/get
        if ( ( $oCategory = $oLocatorTarget->getActCategory() ) ) {
            $sCatId = $oCategory->getId();

            $sOrderBy = null;
            if ( $oLocatorTarget->showSorting() ) {  
                $aSorting = $oLocatorTarget->getSorting( $sCatId );
                // checking if we have defined sorting parameters in the sessions                              
                if ( !$aSorting && $oCategory->oxcategories__oxdefsort->value ) {
                    // if no sorting parameters are set in the session and the category has default
                    // sorting parameters, we use them instead
                    $sSortBy  = getViewName( 'oxarticles' ) . ".{$oCategory->oxcategories__oxdefsort->value}";
                    $sSortDir = ( $oCategory->oxcategories__oxdefsortmode->value ) ? "desc" : null;                                      
                    $oLocatorTarget->setItemSorting( $sCatId, $sSortBy, $sSortDir );                   
                }
                $oLocatorTarget->prepareSortColumns();
                $sOrderBy = $oLocatorTarget->getSortingSql( $sCatId );                                 
            }
            
            $oIdList = $this->_loadIdsInList( $oCategory, $oCurrArticle, $sOrderBy );

            //page number
            $iPage = $this->_findActPageNumber( $oLocatorTarget->getActPage(), $oIdList, $oCurrArticle );

            // setting product position in list, amount of articles etc
            $oCategory->iCntOfProd  = $oIdList->count();
            $oCategory->iProductPos = $this->_getProductPos( $oCurrArticle, $oIdList, $oLocatorTarget );

            if ( oxUtils::getInstance()->seoIsActive() && $iPage ) {
                $oCategory->toListLink = oxSeoEncoderCategory::getInstance()->getCategoryPageUrl( $oCategory, $iPage );
            } else {
                $oCategory->toListLink  = $this->_makeLink( $oCategory->getLink(), $this->_getPageNumber( $iPage ) );
            }

            $oCategory->nextProductLink = $this->_oNextProduct?$this->_makeLink( $this->_oNextProduct->getLink(), '' ):null;
            $oCategory->prevProductLink = $this->_oBackProduct?$this->_makeLink( $this->_oBackProduct->getLink(), '' ):null;

            // active category
            $oLocatorTarget->setActiveCategory( $oCategory );

            // category path
            if ( ( $oCatTree = $oLocatorTarget->getCategoryTree() ) ) {
                $oLocatorTarget->setCatTreePath( $oCatTree->getPath() );
            }
        }
    }

    /**
     * Sets details locator data for articles that came from vendor list.
     *
     * @param oxubase   $oLocatorTarget oxubase object
     * @param oxarticle $oCurrArticle   current article
     *
     * @return null
     */
    protected function _setVendorLocatorData( $oLocatorTarget, $oCurrArticle )
    {
        if ( ( $oVendor = $oLocatorTarget->getActVendor() ) ) {
            $sVendorId = $oVendor->getId();
            $myUtils   = oxUtils::getInstance();

            $blSeo = $myUtils->seoIsActive();

            // loading data for article navigation
            $oIdList = oxNew( "oxarticlelist" );
            if ( $oLocatorTarget->showSorting() ) {
                $oLocatorTarget->prepareSortColumns();
                $oIdList->setCustomSorting( $oLocatorTarget->getSortingSql( "$sVendorId:vendor" ) );
            }
            $oIdList->loadVendorIds( $sVendorId );

            //page number
            $iPage = $this->_findActPageNumber( $oLocatorTarget->getActPage(), $oIdList, $oCurrArticle );

            $sAdd = null;
            if ( !$blSeo ) {
                $sAdd = 'listtype=vendor&amp;cnid=v_'.$sVendorId;
            }

            // setting product position in list, amount of articles etc
            $oVendor->iCntOfProd  = $oIdList->count();
            $oVendor->iProductPos = $this->_getProductPos( $oCurrArticle, $oIdList, $oLocatorTarget );

            if ( $blSeo && $iPage ) {
                $oVendor->toListLink = oxSeoEncoderVendor::getInstance()->getVendorPageUrl( $oVendor, $iPage );
            } else {
                $oVendor->toListLink  = $this->_makeLink( $oVendor->getLink(), $this->_getPageNumber( $iPage ) );
            }

            $oVendor->nextProductLink = $this->_oNextProduct?$this->_makeLink( $this->_oNextProduct->getLink(), $sAdd ):null;
            $oVendor->prevProductLink = $this->_oBackProduct?$this->_makeLink( $this->_oBackProduct->getLink(), $sAdd ):null;

            // active vendor
            $oLocatorTarget->setActiveCategory( $oVendor );

            // vendor path
            if ( ( $oVendorTree = $oLocatorTarget->getVendorTree() ) ) {
                $oLocatorTarget->setCatTreePath( $oVendorTree->getPath() );
            }
        }
    }

    /**
     * Sets details locator data for articles that came from Manufacturer list.
     *
     * @param oxubase   $oLocatorTarget oxubase object
     * @param oxarticle $oCurrArticle   current article
     *
     * @return null
     */
    protected function _setManufacturerLocatorData( $oLocatorTarget, $oCurrArticle )
    {
        if ( ( $oManufacturer = $oLocatorTarget->getActManufacturer() ) ) {
            $sManufacturerId = $oManufacturer->getId();
            $myUtils = oxUtils::getInstance();

            $blSeo = $myUtils->seoIsActive();

            // loading data for article navigation
            $oIdList = oxNew( "oxarticlelist" );
            if ( $oLocatorTarget->showSorting() ) {
                $oLocatorTarget->prepareSortColumns();
                $oIdList->setCustomSorting( $oLocatorTarget->getSortingSql( "$sManufacturerId:manufacturer" ) );
            }
            $oIdList->loadManufacturerIds( $sManufacturerId );

            //page number
            $iPage = $this->_findActPageNumber( $oLocatorTarget->getActPage(), $oIdList, $oCurrArticle );

            $sAdd = null;
            if ( !$blSeo ) {
                $sAdd = 'listtype=manufacturer&amp;mnid='.$sManufacturerId;
            }

            // setting product position in list, amount of articles etc
            $oManufacturer->iCntOfProd  = $oIdList->count();
            $oManufacturer->iProductPos = $this->_getProductPos( $oCurrArticle, $oIdList, $oLocatorTarget );

            if ( $blSeo && $iPage ) {
                $oManufacturer->toListLink = oxSeoEncoderManufacturer::getInstance()->getManufacturerPageUrl( $oManufacturer, $iPage );
            } else {
                $oManufacturer->toListLink  = $this->_makeLink( $oManufacturer->getLink(), $this->_getPageNumber( $iPage ) );
            }

            $oManufacturer->nextProductLink = $this->_oNextProduct?$this->_makeLink( $this->_oNextProduct->getLink(), $sAdd ):null;
            $oManufacturer->prevProductLink = $this->_oBackProduct?$this->_makeLink( $this->_oBackProduct->getLink(), $sAdd ):null;

            // active Manufacturer
            $oLocatorTarget->setActiveCategory( $oManufacturer );

            // Manufacturer path
            if ( ( $oManufacturerTree = $oLocatorTarget->getManufacturerTree() ) ) {
                $oLocatorTarget->setCatTreePath( $oManufacturerTree->getPath() );
            }
        }
    }

    /**
     * Sets details locator data for articles that came from search list.
     *
     * @param oxubase   $oLocatorTarget oxubase object
     * @param oxarticle $oCurrArticle   current article
     *
     * @return null
     */
    protected function _setSearchLocatorData( $oLocatorTarget, $oCurrArticle )
    {
        if ( ( $oSearchCat = $oLocatorTarget->getActSearch() ) ) {

            // #1834/1184M - specialchar search
            $sSearchParam = oxConfig::getParameter( 'searchparam', true );
            $sSearchFormParam = oxConfig::getParameter( 'searchparam' );
            $sSearchLinkParam = rawurlencode( $sSearchParam );

            $sSearchCat = oxConfig::getParameter( 'searchcnid' );
            $sSearchCat = $sSearchCat?rawurldecode( $sSearchCat ):$sSearchCat;

            $sSearchVendor = oxConfig::getParameter( 'searchvendor' );
            $sSearchVendor = $sSearchVendor?rawurldecode( $sSearchVendor ):$sSearchVendor;

            $sSearchManufacturer = oxConfig::getParameter( 'searchmanufacturer' );
            $sSearchManufacturer = $sSearchManufacturer?rawurldecode( $sSearchManufacturer ):$sSearchManufacturer;

            // loading data for article navigation
            $oIdList = oxNew( 'oxarticlelist' );
            if ( $oLocatorTarget->showSorting() ) {
                $oLocatorTarget->prepareSortColumns();
                $oIdList->setCustomSorting( $oLocatorTarget->getSortingSql( 'oxsearch' ) );
            }
            $oIdList->loadSearchIds( $sSearchParam, $sSearchCat, $sSearchVendor, $sSearchManufacturer );

            //page number
            $iPage = $this->_findActPageNumber( $oLocatorTarget->getActPage(), $oIdList, $oCurrArticle );

            $sAddSearch = "searchparam={$sSearchLinkParam}";
            $sAddSearch .= '&amp;listtype=search';

            if ( $sSearchCat !== null ) {
                $sAddSearch .= "&amp;searchcnid={$sSearchCat}";
            }

            if ( $sSearchVendor !== null ) {
                $sAddSearch .= "&amp;searchvendor={$sSearchVendor}";
            }

            if ( $sSearchManufacturer !== null ) {
                $sAddSearch .= "&amp;searchmanufacturer={$sSearchManufacturer}";
            }

            // setting product position in list, amount of articles etc
            $oSearchCat->iCntOfProd  = $oIdList->count();
            $oSearchCat->iProductPos = $this->_getProductPos( $oCurrArticle, $oIdList, $oLocatorTarget );

            $sPageNr = $this->_getPageNumber( $iPage );
            $oSearchCat->toListLink  = $this->_makeLink( $oSearchCat->link, $sPageNr.($sPageNr?'&amp;':'').$sAddSearch );
            $oSearchCat->nextProductLink = $this->_oNextProduct?$this->_makeLink( $this->_oNextProduct->getLink(), $sAddSearch ):null;
            $oSearchCat->prevProductLink = $this->_oBackProduct?$this->_makeLink( $this->_oBackProduct->getLink(), $sAddSearch ):null;

            $sFormat = oxLang::getInstance()->translateString( 'searchResult' );
            $oLocatorTarget->setSearchTitle( sprintf( $sFormat, $sSearchFormParam ) );
            $oLocatorTarget->setActiveCategory( $oSearchCat );
        }
    }

    /**
     * Sets details locator data for articles that came from tag list.
     *
     * @param oxubase   $oLocatorTarget oxubase object
     * @param oxarticle $oCurrArticle   current article
     *
     * @return null
     */
    protected function _setTagLocatorData( $oLocatorTarget, $oCurrArticle )
    {
        if ( ( $oTag = $oLocatorTarget->getActTag() ) ) {

            $myUtils = oxUtils::getInstance();

            // loading data for article navigation
            $oIdList = oxNew( 'oxarticlelist' );
            $oLang = oxLang::getInstance();

            if ( $oLocatorTarget->showSorting() ) {
                $oLocatorTarget->prepareSortColumns();
                $oIdList->setCustomSorting( $oLocatorTarget->getSortingSql( 'oxtags' ) );
            }

            $oIdList->getTagArticleIds( $oTag->sTag, $oLang->getBaseLanguage() );

            //page number
            $iPage = $this->_findActPageNumber( $oLocatorTarget->getActPage(), $oIdList, $oCurrArticle );

            // setting product position in list, amount of articles etc
            $oTag->iCntOfProd  = $oIdList->count();
            $oTag->iProductPos = $this->_getProductPos( $oCurrArticle, $oIdList, $oLocatorTarget );

            if ( oxUtils::getInstance()->seoIsActive() ) {
                $oTag->toListLink  = oxSeoEncoderTag::getInstance()->getTagPageUrl( $oTag->sTag, $iPage );
            } else {
                $sPageNr = $this->_getPageNumber( $iPage );
                $oTag->toListLink  = $this->_makeLink( $oTag->link, $sPageNr );
            }

            $sAddSearch = '';
            // setting parameters when seo is Off
            if ( !$myUtils->seoIsActive() ) {
                $sAddSearch  = 'searchtag='.rawurlencode( oxConfig::getParameter( 'searchtag', 1 ) );
                $sAddSearch .= '&amp;listtype=tag';
            }

            $oTag->nextProductLink = $this->_oNextProduct?$this->_makeLink( $this->_oNextProduct->getLink(), $sAddSearch ):null;
            $oTag->prevProductLink = $this->_oBackProduct?$this->_makeLink( $this->_oBackProduct->getLink(), $sAddSearch ):null;
            $oStr = getStr();
            $oLocatorTarget->setSearchTitle( $oLang->translateString('TAGS').' / '.$oStr->htmlspecialchars( $oStr->ucfirst( $oTag->sTag ) ) );
            $oLocatorTarget->setActiveCategory( $oTag );
        }
    }

    /**
     * Sets details locator data for articles that came from recommlist.
     *
     * Template variables:
     * <b>sSearchTitle</b>, <b>searchparamforhtml</b>
     *
     * @param oxubase   $oLocatorTarget oxubase object
     * @param oxarticle $oCurrArticle   current article
     *
     * @return null
     */
    protected function _setRecommlistLocatorData( $oLocatorTarget, $oCurrArticle )
    {
        if ( ( $oRecommList = $oLocatorTarget->getActiveRecommList() ) ) {

            // loading data for article navigation
            $oIdList = oxNew( 'oxarticlelist' );
            $oIdList->loadRecommArticleIds( $oRecommList->getId(), null );

            //page number
            $iPage = $this->_findActPageNumber( $oLocatorTarget->getActPage(), $oIdList, $oCurrArticle );

            $sSearchRecomm = oxConfig::getParameter( 'searchrecomm', true );

            if ( $sSearchRecomm !== null ) {
                $sSearchFormRecomm = oxConfig::getParameter( 'searchrecomm' );
                $sSearchLinkRecomm = rawurlencode( $sSearchRecomm );
                $sAddSearch = 'searchrecomm='.$sSearchLinkRecomm;
            }

            // setting product position in list, amount of articles etc
            $oRecommList->iCntOfProd  = $oIdList->count();
            $oRecommList->iProductPos = $this->_getProductPos( $oCurrArticle, $oIdList, $oLocatorTarget );
            $blSeo = oxUtils::getInstance()->seoIsActive();

            if ( $blSeo && $iPage ) {
                $oRecommList->toListLink = oxSeoEncoderRecomm::getInstance()->getRecommPageUrl( $oRecommList, $iPage );
            } else {
                $oRecommList->toListLink  = $this->_makeLink( $oRecommList->getLink(), $this->_getPageNumber( $iPage ) );
            }
            $oRecommList->toListLink  = $this->_makeLink( $oRecommList->toListLink, $sAddSearch );

            $sAdd = '';
            if ( !$blSeo ) {
                $sAdd = 'recommid='.$oRecommList->getId().'&amp;listtype=recommlist'.($sAddSearch?'&amp;':'');
            }
            $sAdd .= $sAddSearch;
            $oRecommList->nextProductLink = $this->_oNextProduct?$this->_makeLink( $this->_oNextProduct->getLink(), $sAdd ):null;
            $oRecommList->prevProductLink = $this->_oBackProduct?$this->_makeLink( $this->_oBackProduct->getLink(), $sAdd ):null;

            $oLang  = oxLang::getInstance();
            $sTitle = $oLang->translateString('RECOMMLIST');
            if ( $sSearchRecomm !== null ) {
                $sTitle .= " / ".$oLang->translateString('RECOMMLIST_SEARCH').' "'.$sSearchFormRecomm.'"';
            }
            $oLocatorTarget->setSearchTitle( $sTitle );
            $oLocatorTarget->setActiveCategory( $oRecommList );
        }
    }

    /**
     * Setting product position in list, amount of articles etc
     *
     * @param oxcategory $oCategory    active category id
     * @param object     $oCurrArticle current article
     * @param string     $sOrderBy     order by fields
     *
     * @return object
     */
    protected function _loadIdsInList( $oCategory, $oCurrArticle, $sOrderBy = null )
    {
        $oIdList = oxNew( 'oxarticlelist' );
        $oIdList->setCustomSorting( $sOrderBy ) ;

        // additionally check if this category is loaded and is price category ?
        if ( $oCategory->isPriceCategory() ) {
            $oIdList->loadPriceIds( $oCategory->oxcategories__oxpricefrom->value, $oCategory->oxcategories__oxpriceto->value );
        } else {
            $sActCat = $oCategory->getId();
            $oIdList->loadCategoryIDs( $sActCat, oxSession::getVar( 'session_attrfilter' ) );
            // if not found - reloading with empty filter
            if ( !isset( $oIdList[$oCurrArticle->getId()] ) ) {
                $oIdList->loadCategoryIDs( $sActCat, null );
            }
        }

        return $oIdList;
    }

    /**
     * Appends urs with currently passed parameters
     *
     * @param string $sLink   url to add parameters
     * @param string $sParams parameters to add to url
     *
     * @return string
     */
    protected function _makeLink( $sLink, $sParams )
    {
        if ( $sParams ) {
            $sLink .= ( ( strpos( $sLink, '?' ) !== false ) ? '&amp;' : '?' ) . $sParams;
        }
        return $sLink;
    }

    /**
     * If page number is not passed trying to fetch it from list of ids. To search
     * for position in list, article ids list and current article id must be passed
     *
     * @param int       $iPageNr  current page number (user defined or passed by request)
     * @param oxlist    $oIdList  list of article ids (optional)
     * @param oxarticle $oArticle active article id (optional)
     *
     * @return int
     */
    protected function _findActPageNumber( $iPageNr, $oIdList = null, $oArticle = null )
    {
        //page number
        $iPageNr = (int) $iPageNr;

        // maybe there is no page number passed, but we still can find the position in id's list
        if ( !$iPageNr && $oIdList && $oArticle ) {
            $iNrofCatArticles = (int) $this->getConfig()->getConfigParam( 'iNrofCatArticles' );
            $iNrofCatArticles = $iNrofCatArticles?$iNrofCatArticles:1;

            $sArticleId = $oArticle->oxarticles__oxparentid->value ? $oArticle->oxarticles__oxparentid->value : $oArticle->getId();
            $iPos = array_search( $sArticleId, $oIdList->arrayKeys() );
            $iPageNr = floor( $iPos / $iNrofCatArticles );
        }

        return $iPageNr;
    }

    /**
     * Gets current page number.
     *
     * @param int $iPageNr page number
     *
     * @return string $sPageNum
     */
    protected function _getPageNumber( $iPageNr )
    {
        //page number
        $iPageNr = (int) $iPageNr;
        return ( ($iPageNr > 0 )?"pgNr=$iPageNr":'' );
    }

    /**
     * Searches for current article in article list and sets previous/next product ids
     *
     * @param oxarticle $oArticle       current Article
     * @param object    $oIdList        articles list containing only fake article objects !!!
     * @param oxubase   $oLocatorTarget oxubase object
     *
     * @return integer
     */
    protected function _getProductPos( $oArticle, $oIdList, $oLocatorTarget )
    {
        $iCnt = 1;
        $iPos = 0;

        // variant handling
        $sOxid = $oArticle->oxarticles__oxparentid->value?$oArticle->oxarticles__oxparentid->value:$oArticle->getId();
        if ( $oIdList->count() && isset( $oIdList[$sOxid] ) ) {

            $aIds = $oIdList->arrayKeys();
            $iPos = array_search( $sOxid, $aIds );

            if ( array_key_exists( $iPos-1, $aIds ) ) {
                $oBackProduct = oxNew( 'oxarticle' );
                $oBackProduct->modifyCacheKey('_locator');
                $oBackProduct->setNoVariantLoading( true );
                if ( $oBackProduct->load( $aIds[$iPos-1] ) ) {
                    $oBackProduct->setLinkType( $oLocatorTarget->getLinkType() );
                    $this->_oBackProduct = $oBackProduct;
                }
            }

            if ( array_key_exists( $iPos+1, $aIds ) ) {
                $oNextProduct = oxNew( 'oxarticle' );
                $oNextProduct->modifyCacheKey('_locator');
                $oNextProduct->setNoVariantLoading( true );
                if ( $oNextProduct->load( $aIds[$iPos+1] ) ) {
                    $oNextProduct->setLinkType( $oLocatorTarget->getLinkType() );
                    $this->_oNextProduct = $oNextProduct;
                }
            }
            return $iPos+1;
        }
        return 0;
    }

    /**
     * Template variable getter. Returns error message
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->_sErrorMessage;
    }
}
