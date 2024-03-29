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
 * @version   SVN: $Id: details.php 44346 2012-04-25 11:01:12Z linas.kukulskis $
 */

/**
 * Article details information page.
 * Collects detailed article information, possible variants, such information
 * as crosselling, similarlist, picture gallery list, etc.
 * OXID eShop -> (Any chosen product).
 * @package main
 */
class Details extends oxUBase
{
    /**
     * List of article variants.
     *
     * @var array
     */
    protected $_aVariantList = null;

    /**
     * Current class default template name.
     *
     * @var string
     */
    protected $_sThisTemplate = 'page/details/details.tpl';

    /**
     * Current product parent article object
     *
     * @var oxarticle
     */
    protected $_oParentProd = null;

    /**
     * Marker if user can rate current product
     *
     * @var bool
     */
    protected $_blCanRate = null;

    /**
     * Marked which defines if current view is sortable or not
     * @var bool
     */
    protected $_blShowSorting = true;

    /**
     * If tags will be changed
     * @var bool
     */
    protected $_blEditTags = null;

    /**
     * If tags can be changed
     * @var bool
     */
    protected $_blCanEditTags = null;

    /**
     * All tags
     * @var array
     */
    protected $_aTags = null;

    /**
     * Returns user recommlist
     * @var array
     */
    protected $_aUserRecommList = null;

    /**
     * Class handling CAPTCHA image.
     * @var object
     */
    protected $_oCaptcha = null;

    /**
     * Media files
     * @var array
     */
    protected $_aMediaFiles = null;

    /**
     * History (last seen) products
     * @var array
     */
    protected $_aLastProducts = null;

    /**
     * Current product's vendor
     * @var oxvendor
     */
    protected $_oVendor = null;

    /**
     * Current product's manufacturer
     * @var oxmanufacturer
     */
    protected $_oManufacturer = null;

    /**
     * Current product's category
     * @var object
     */
    protected $_oCategory = null;

    /**
     * Current product's attributes
     * @var object
     */
    protected $_aAttributes = null;

    /**
     * Parent article name
     * @var string
     */
    protected $_sParentName = null;

    /**
     * Parent article url
     * @var string
     */
    protected $_sParentUrl = null;

    /**
     * Picture gallery
     * @var array
     */
    protected $_aPicGallery = null;

    /**
     * Select lists
     * @var array
     */
    protected $_aSelectLists = null;

    /**
     * Reviews of current article
     * @var array
     */
    protected $_aReviews = null;

    /**
     * CrossSelling articlelist
     * @var object
     */
    protected $_oCrossSelling = null;

    /**
     * Similar products articlelist
     * @var object
     */
    protected $_oSimilarProducts = null;

    /**
     * Similar recommlists
     * @var object
     */
    protected $_oRecommList = null;

    /**
     * Accessoires of current article
     * @var object
     */
    protected $_oAccessoires = null;

    /**
     * List of customer also bought thies products
     * @var object
     */
    protected $_aAlsoBoughtArts = null;

    /**
     * Search title
     * @var string
     */
    protected $_sSearchTitle = null;

    /**
     * Marker if active product was fully initialized before returning it
     * (see details::getProduct())
     * @var bool
     */
    protected $_blIsInitialized = false;

    /**
     * Current view link type
     *
     * @var int
     */
    protected $_iLinkType = null;

    /**
     * Is multidimension variant view?
     *
     * @var bool
     */
    protected $_blMdView = null;

    /**
     * Rating value
     * @var double
     */
    protected $_dRatingValue = null;

    /**
     * Ratng count
     * @var integer
     */
    protected $_iRatingCnt = null;

    /**
     * Sign if to load and show top5articles action
     * @var bool
     */
    protected $_blTop5Action = false;

    /**
     * Bid price.
     * @var string
     */
    protected $_sBidPrice = null;

    /**
     * Price alarm status.
     * @var integer
     */
    protected $_iPriceAlarmStatus = null;

    /**
     * Search parameter for Html
     * @var string
     */
    protected $_sSearchParamForHtml = null;

    /**
     * Returns current product parent article object if it is available
     *
     * @param string $sParentId parent product id
     *
     * @return oxarticle
     */
    protected function _getParentProduct( $sParentId )
    {
        if ( $sParentId && $this->_oParentProd === null ) {
            $this->_oParentProd = false;
            if ( ( $oParent = oxNewArticle( $sParentId ) ) ) {
                $this->_processProduct( $oParent );
                $this->_oParentProd = $oParent;
            }
        }
        return $this->_oParentProd;
    }

    /**
     * loading full list of variants,
     * if we are child and do not have any variants then let's load all parent variants as ours
     *
     * @return null
     */
    public function loadVariantInformation()
    {
        if ( $this->_aVariantList === null ) {
            $oProduct = $this->getProduct();

            //if we are child and do not have any variants then let's load all parent variants as ours
            if ( $oParent = $oProduct->getParentArticle() ) {
                $myConfig = $this->getConfig();

                $oParent->setNoVariantLoading(false);
                $this->_aVariantList = $oParent->getFullVariants( false );

                //lets additionally add parent article if it is sellable
                if ( count( $this->_aVariantList ) && $myConfig->getConfigParam( 'blVariantParentBuyable' ) ) {
                    //#1104S if parent is buyable load selectlists too
                    $oParent->aSelectlist = $oParent->getSelectLists();
                    $this->_aVariantList = array_merge( array( $oParent ), $this->_aVariantList->getArray() );
                }
            } else {
                //loading full list of variants
                $this->_aVariantList = $oProduct->getFullVariants( false );
            }

            // setting link type for variants ..
            foreach ( $this->_aVariantList as $oVariant ) {
                $this->_processProduct( $oVariant );
            }

        }

        return $this->_aVariantList;
    }

    /**
     * In case list type is "search" returns search parameters which will be added to product details link
     *
     * @return string | null
     */
    protected function _getAddUrlParams()
    {
        if ( $this->getListType() == "search" ) {
            return $this->getDynUrlParams();
        }
    }

    /**
     * Processes product by setting link type and in case list type is search adds search parameters to details link
     *
     * @param object $oProduct product to process
     *
     * @return null
     */
    protected function _processProduct( $oProduct )
    {
        $oProduct->setLinkType( $this->getLinkType() );
        if ( $sAddParams = $this->_getAddUrlParams() ) {
            $oProduct->appendLink( $sAddParams );
        }
    }

    /**
     * Returns prefix ID used by template engine.
     *
     * @return  string  $this->_sViewID view id
     */
    public function getViewId()
    {
        if ( isset( $this->_sViewId )) {
            return $this->_sViewId;
        }

            $sViewId = parent::getViewId().'|'.oxConfig::getParameter( 'anid' ).'|';


        return $this->_sViewId = $sViewId;
    }


    /**
     * If possible loads additional article info (oxarticle::getCrossSelling(),
     * oxarticle::getAccessoires(), oxarticle::getReviews(), oxarticle::GetSimilarProducts(),
     * oxarticle::GetCustomerAlsoBoughtThisProducts()), forms variants details
     * navigation URLs
     * loads selectlists (oxarticle::GetSelectLists()), prerares HTML meta data
     * (details::_convertForMetaTags()). Returns name of template file
     * details::_sThisTemplate
     *
     * @return  string  $this->_sThisTemplate   current template file name
     */
    public function render()
    {
        $myConfig = $this->getConfig();

        $oProduct = $this->getProduct();

        // assign template name
        if ( $oProduct->oxarticles__oxtemplate->value ) {
            $this->_sThisTemplate = $oProduct->oxarticles__oxtemplate->value;
        }

        if ( ( $sTplName = oxConfig::getParameter( 'tpl' ) ) ) {
            $this->_sThisTemplate = 'custom/'.basename ( $sTplName );
        }

        parent::render();

        $sPartial = oxConfig::getParameter('renderPartial');
        $this->addTplParam('sRenderPartial', $sPartial);

        switch ($sPartial) {
            case "productInfo":
                return 'page/details/ajax/fullproductinfo.tpl';
                break;
            case "detailsMain":
                return 'page/details/ajax/productmain.tpl';
                break;
            default:
                // #785A loads and sets locator data
                $oLocator = oxNew( 'oxlocator', $this->getListType() );
                $oLocator->setLocatorData( $oProduct, $this );

                if ($myConfig->getConfigParam( 'bl_rssRecommLists' ) && $this->getSimilarRecommLists()) {
                    $oRss = oxNew('oxrssfeed');
                    $this->addRssFeed($oRss->getRecommListsTitle( $oProduct ), $oRss->getRecommListsUrl( $oProduct ), 'recommlists');
                }

                return $this->_sThisTemplate;
        }
    }

    /**
     * Returns current view meta data
     * If $sMeta parameter comes empty, sets to it article title and description.
     * It happens if current view has no meta data defined in oxcontent table
     *
     * @param string $sMeta     user defined description, description content or empty value
     * @param int    $iLength   max length of result, -1 for no truncation
     * @param bool   $blDescTag if true - performs additional dublicate cleaning
     *
     * @return string
     */
    protected function _prepareMetaDescription( $sMeta, $iLength = 200, $blDescTag = false )
    {
        if ( !$sMeta ) {
            $oProduct = $this->getProduct();

            $sMeta = $oProduct->getLongDescription()->value;
            $sMeta = str_replace( array( '<br>', '<br />', '<br/>' ), "\n", $sMeta );
            $sMeta = $oProduct->oxarticles__oxtitle->value.' - '.$sMeta;
            $sMeta = strip_tags( $sMeta );
        }
        return parent::_prepareMetaDescription( $sMeta, $iLength, $blDescTag );
    }

    /**
     * Returns current view keywords seperated by comma
     * If $sKeywords parameter comes empty, sets to it article title and description.
     * It happens if current view has no meta data defined in oxcontent table
     *
     * @param string $sKeywords               user defined keywords, keywords content or empty value
     * @param bool   $blRemoveDuplicatedWords remove dublicated words
     *
     * @return string
     */
    protected function _prepareMetaKeyword( $sKeywords, $blRemoveDuplicatedWords = true )
    {
        if ( !$sKeywords ) {
            $oProduct = $this->getProduct();
            $sKeywords = trim( $this->getTitle() );

            if ( $oCatTree = $this->getCategoryTree() ) {
                foreach ( $oCatTree->getPath() as $oCat ) {
                    $sKeywords .= ", " . trim( $oCat->oxcategories__oxtitle->value );
                }
            }

            //adding searchkeys info
            if ( $sSearchKeys = trim( $oProduct->oxarticles__oxsearchkeys->value ) ) {
                $sKeywords .= ", ". $sSearchKeys;
            }

            $sKeywords = parent::_prepareMetaKeyword( $sKeywords, $blRemoveDuplicatedWords );
        }

        return $sKeywords;
    }

    /**
     * Checks if rating functionality is active
     *
     * @return bool
     */
    public function ratingIsActive()
    {
        $myConfig = $this->getConfig();

        return $myConfig->getConfigParam( 'bl_perfLoadReviews' );
    }

    /**
     * Checks if rating functionality is on and allowed to user
     *
     * @return bool
     */
    public function canRate()
    {
        if ( $this->_blCanRate === null ) {

            $this->_blCanRate = false;
            $myConfig = $this->getConfig();

            if ( $this->ratingIsActive() && $oUser = $this->getUser() ) {

                $oRating = oxNew( 'oxrating' );
                $this->_blCanRate = $oRating->allowRating( $oUser->getId(), 'oxarticle', $this->getProduct()->getId() );
            }
        }

        return $this->_blCanRate;
    }

    /**
     * Checks if rating runctionality is on and allwed to user
     *
     * @return bool
     */
    public function canChangeTags()
    {
        if ( $oUser = $this->getUser() ) {

            return true;
        }
        return false;
    }

    /**
     * Saves user ratings and review text (oxreview object)
     *
     * @return null
     */
    public function saveReview()
    {
        if ( $this->canAcceptFormData() &&
             ( $oUser = $this->getUser() ) && ( $oProduct = $this->getProduct() ) ) {

            $dRating = oxConfig::getParameter( 'artrating' );
            if ( $dRating !== null ) {
                $dRating = (int) $dRating;
            }

            //save rating
            if ( $dRating !== null && $dRating >= 1 && $dRating <= 5 ) {
                $oRating = oxNew( 'oxrating' );
                if ( $oRating->allowRating( $oUser->getId(), 'oxarticle', $oProduct->getId() ) ) {
                    $oRating->oxratings__oxuserid   = new oxField( $oUser->getId() );
                    $oRating->oxratings__oxtype     = new oxField( 'oxarticle' );
                    $oRating->oxratings__oxobjectid = new oxField( $oProduct->getId() );
                    $oRating->oxratings__oxrating   = new oxField( $dRating );
                    $oRating->save();
                    $oProduct->addToRatingAverage( $dRating );
                }
            }

            if ( ( $sReviewText = trim( ( string ) oxConfig::getParameter( 'rvw_txt', true ) ) ) ) {
                $oReview = oxNew( 'oxreview' );
                $oReview->oxreviews__oxobjectid = new oxField( $oProduct->getId() );
                $oReview->oxreviews__oxtype     = new oxField( 'oxarticle' );
                $oReview->oxreviews__oxtext     = new oxField( $sReviewText, oxField::T_RAW );
                $oReview->oxreviews__oxlang     = new oxField( oxLang::getInstance()->getBaseLanguage() );
                $oReview->oxreviews__oxuserid   = new oxField( $oUser->getId() );
                $oReview->oxreviews__oxrating   = new oxField( ( $dRating !== null ) ? $dRating : 0);
                $oReview->save();
            }
        }
    }

    /**
     * Adds article to selected recommlist
     *
     * @return null
     */
    public function addToRecomm()
    {
        if (!$this->getViewConfig()->getShowListmania()) {
            return;
        }

        $sRecommText = trim( ( string ) oxConfig::getParameter( 'recomm_txt' ) );
        $sRecommList = oxConfig::getParameter( 'recomm' );
        $sArtId      = $this->getProduct()->getId();

        if ( $sArtId ) {
            $oRecomm = oxNew( 'oxrecommlist' );
            $oRecomm->load( $sRecommList);
            $oRecomm->addArticle( $sArtId, $sRecommText );
        }
    }

    /**
     * Adds tag from parameter
     *
     * @return null;
     */
    public function addTags()
    {
        $sTag  = $this->getConfig()->getParameter('newTags', true );
        $sHighTag  = $this->getConfig()->getParameter( 'highTags', true );
        if ( !$sTag && !$sHighTag) {
            return;
        }
        if ( $sHighTag ) {
            $sTag = getStr()->html_entity_decode( $sHighTag );
        }

        //can tag only once per product and tags
        $aTags = array();
        $oProduct = $this->getProduct();
        $aTaggedProducts = oxSession::getVar("aTaggedProducts");
        if ( $aTaggedProducts ) {
            $aTags = $aTaggedProducts[$oProduct->getId()];
        }
        $blAddedTag = false;
        //Checks if user already tagged it
        if ( $aTags[$sTag] != 1 ) {
            $oProduct->addTag( $sTag );
            $aTags[$sTag] = 1;
            $aTaggedProducts[$oProduct->getId()] = $aTags;
            oxSession::setVar( 'aTaggedProducts', $aTaggedProducts);
            $blAddedTag = true;
        }
        // for ajax call
        if ($this->getConfig()->getParameter('blAjax', true )) {
            oxUtils::getInstance()->showMessageAndExit( $blAddedTag );
        }
    }

    /**
     * Sets tags editing mode
     *
     * @return null
     */
    public function editTags()
    {
        if ( !$this->getUser() ) {
            return;
        }
        $oTagCloud = oxNew("oxTagCloud");
        $this->_aTags = $oTagCloud->getTags( $this->getProduct()->getId() );
        $this->_blEditTags = true;

        // for ajax call
        if ($this->getConfig()->getParameter('blAjax', true )) {
            oxUtils::getInstance()->setHeader( "Content-Type: text/html; charset=".oxLang::getInstance()->translateString( 'charset' ) );
            $oActView = oxNew( 'oxubase' );
            $oSmarty = oxUtilsView::getInstance()->getSmarty();
            $oSmarty->assign('oView', $this );
            $oSmarty->assign('oViewConf', $this->getViewConfig() );
            oxUtils::getInstance()->showMessageAndExit( $oSmarty->fetch( 'page/details/inc/editTags.tpl', $this->getViewId() ) );
        }
    }

    /**
     * Cancels tags editing mode
     *
     * @return null
     */
    public function cancelTags()
    {
        $oTagCloud = oxNew("oxTagCloud");
        $this->_aTags = $oTagCloud->getTags( $this->getProduct()->getId() );
        $this->_blEditTags = false;

        // for ajax call
        if ($this->getConfig()->getParameter('blAjax', true )) {
            oxUtils::getInstance()->setHeader( "Content-Type: text/html; charset=".oxLang::getInstance()->translateString( 'charset' ) );
            $oActView = oxNew( 'oxubase' );
            $oSmarty = oxUtilsView::getInstance()->getSmarty();
            $oSmarty->assign('oView', $this );
            $oSmarty->assign('oViewConf', $this->getViewConfig() );
            oxUtils::getInstance()->showMessageAndExit( $oSmarty->fetch( 'page/details/inc/tags.tpl', $this->getViewId() ) );
        }
    }

    /**
     * Returns active product id to load its seo meta info
     *
     * @return string
     */
    protected function _getSeoObjectId()
    {
        if ( $oProduct = $this->getProduct() ) {
            return $oProduct->getId();
        }
    }

    /**
     * loading full list of attributes
     *
     * @return array $_aAttributes
     */
    public function getAttributes()
    {
        if ( $this->_aAttributes === null ) {
            // all attributes this article has
            $aArtAttributes = $this->getProduct()->getAttributes();

            //making a new array for backward compatibility
            $this->_aAttributes = false;

            if ( count( $aArtAttributes ) ) {
                foreach ( $aArtAttributes as $sKey => $oAttribute ) {
                    $this->_aAttributes[$sKey] = new stdClass();
                    $this->_aAttributes[$sKey]->title = $oAttribute->oxattribute__oxtitle->value;
                    $this->_aAttributes[$sKey]->value = $oAttribute->oxattribute__oxvalue->value;
                }
            }
        }
        return $this->_aAttributes;
    }


    /**
     * Returns if tags will be edit
     *
     * @return bool
     */
    public function getEditTags()
    {
        return $this->_blEditTags;
    }

    /**
     * Returns all tags
     *
     * @return array
     */
    public function getTags()
    {
        return $this->_aTags;
    }

    /**
     * Returns tag cloud manager class
     *
     * @return oxTagCloud
     */
    public function getTagCloudManager()
    {
        $oManager = oxNew( "oxTagCloud" );
        $oManager->setExtendedMode( true );
        $oManager->setProductId( $this->getProduct()->getId() );
        return $oManager;
    }

    /**
     * Returns if tags can be changed, if user is loggen in and
     * product exists.
     *
     * @return bool
     */
    public function isEditableTags()
    {
        if ( $this->_blCanEditTags === null ) {
            $this->_blCanEditTags = false;
            if ( $this->getProduct() && $this->getUser()) {
                $this->_blCanEditTags = true;
            }
        }
        return $this->_blCanEditTags;
    }

    /**
     * Returns current product
     *
     * @return oxarticle
     */
    public function getProduct()
    {
        $myConfig = $this->getConfig();
        $myUtils = oxUtils::getInstance();

        if ( $this->_oProduct === null ) {

            //this option is only for lists and we must reset value
            //as blLoadVariants = false affect "ab price" functionality
            $myConfig->setConfigParam( 'blLoadVariants', true );

            $sOxid = oxConfig::getParameter( 'anid' );

            // object is not yet loaded
            $this->_oProduct = oxNew( 'oxarticle' );
            //$this->_oProduct->setSkipAbPrice( true );

            if ( !$this->_oProduct->load( $sOxid ) ) {
                $myUtils->redirect( $myConfig->getShopHomeURL() );
                $myUtils->showMessageAndExit( '' );
            }

            $aVariantSelections = $this->_oProduct->getVariantSelections( oxConfig::getParameter( "varselid" ) );
            if ($aVariantSelections && $aVariantSelections['oActiveVariant'] && $aVariantSelections['blPerfectFit']) {
                $this->_oProduct = $aVariantSelections['oActiveVariant'];
            }
        }

        // additional checks
        if ( !$this->_blIsInitialized ) {

            $blContinue = true;
            if ( !$this->_oProduct->isVisible() ) {
                $blContinue = false;
            } elseif ( $this->_oProduct->oxarticles__oxparentid->value ) {
                $oParent = $this->_getParentProduct( $this->_oProduct->oxarticles__oxparentid->value );
                if ( !$oParent || !$oParent->isVisible() ) {
                    $blContinue = false;
                }
            }

            if ( !$blContinue ) {
                $myUtils->redirect( $myConfig->getShopHomeURL() );
                $myUtils->showMessageAndExit( '' );
            }

            $this->_processProduct( $this->_oProduct );
            $this->_blIsInitialized = true;
        }

        return $this->_oProduct;
    }

    /**
     * Returns current view link type
     *
     * @return int
     */
    public function getLinkType()
    {
        if ( $this->_iLinkType === null ) {
            $sListType = oxConfig::getParameter( 'listtype' );
            if ( 'vendor' == $sListType ) {
                $this->_iLinkType = OXARTICLE_LINKTYPE_VENDOR;
            } elseif ( 'manufacturer' == $sListType ) {
                    $this->_iLinkType = OXARTICLE_LINKTYPE_MANUFACTURER;
            } elseif ( 'tag' == $sListType ) {
                    $this->_iLinkType = OXARTICLE_LINKTYPE_TAG;
            } elseif ( 'recommlist' == $sListType ) {
                    $this->_iLinkType = OXARTICLE_LINKTYPE_RECOMM;
            } else {
                $this->_iLinkType = OXARTICLE_LINKTYPE_CATEGORY;

                // price category has own type..
                if ( ( $oCat = $this->getActCategory() ) && $oCat->isPriceCategory() ) {
                    $this->_iLinkType = OXARTICLE_LINKTYPE_PRICECATEGORY;
                }
            }
        }

        return $this->_iLinkType;
    }

    /**
     * Returns variant lists of current product
     *
     * @return array
     */
    public function getVariantList()
    {
        return $this->loadVariantInformation();
    }

    /**
     * Returns variant lists of current product
     * excludes currently viewed product
     *
     * @return array
     */
    public function getVariantListExceptCurrent()
    {
        $oList = $this->getVariantList();
        if (is_object($oList)) {
            $oList = clone $oList;
        }

        $sOxid = $this->getProduct()->getId();
        if (isset($oList[$sOxid])) {
            unset($oList[$sOxid]);
        }
        return $oList;
    }

    /**
     * Template variable getter. Returns object of handling CAPTCHA image
     *
     * @return object
     */
    public function getCaptcha()
    {
        if ( $this->_oCaptcha === null ) {
            $this->_oCaptcha = oxNew('oxCaptcha');
        }
        return $this->_oCaptcha;
    }

    /**
     * Template variable getter. Returns media files of current product
     *
     * @return array
     */
    public function getMediaFiles()
    {
        if ( $this->_aMediaFiles === null ) {
            $aMediaFiles = $this->getProduct()->getMediaUrls();
            $this->_aMediaFiles = count($aMediaFiles) ? $aMediaFiles : false;
        }
        return $this->_aMediaFiles;
    }

    /**
     * Template variable getter. Returns last seen products
     *
     * @param int $iCnt product count
     *
     * @return array
     */
    public function getLastProducts( $iCnt = 4 )
    {
        if ( $this->_aLastProducts === null ) {
            //last seen products for #768CA
            $oProduct = $this->getProduct();
            $sArtId = $oProduct->oxarticles__oxparentid->value?$oProduct->oxarticles__oxparentid->value:$oProduct->getId();

            $oHistoryArtList = oxNew( 'oxarticlelist' );
            $oHistoryArtList->loadHistoryArticles( $sArtId, $iCnt );
            $this->_aLastProducts = $oHistoryArtList;
        }
        return $this->_aLastProducts;
    }

    /**
     * Template variable getter. Returns product's vendor
     *
     * @return object
     */
    public function getVendor()
    {
        if ( $this->_oVendor === null ) {
            $this->_oVendor = $this->getProduct()->getVendor( false );
        }
        return $this->_oVendor;
    }

    /**
     * Template variable getter. Returns product's vendor
     *
     * @return object
     */
    public function getManufacturer()
    {
        if ( $this->_oManufacturer === null ) {
            $this->_oManufacturer = $this->getProduct()->getManufacturer( false );
        }
        return $this->_oManufacturer;
    }

    /**
     * Template variable getter. Returns product's root category
     *
     * @return object
     */
    public function getCategory()
    {
        if ( $this->_oCategory === null ) {
            $this->_oCategory = $this->getProduct()->getCategory();
        }
        return $this->_oCategory;
    }

    /**
     * Template variable getter. Returns if draw parent url
     *
     * @return bool
     */
    public function drawParentUrl()
    {
        return $this->getProduct()->isVariant();
    }

    /**
     * Template variable getter. Returns parent article name
     *
     * @return string
     */
    public function getParentName()
    {
        if ( $this->_sParentName === null ) {
            $this->_sParentName = false;
            if ( ( $oParent = $this->_getParentProduct( $this->getProduct()->oxarticles__oxparentid->value ) ) ) {
                $this->_sParentName = $oParent->oxarticles__oxtitle->value;
            }
        }
        return $this->_sParentName;
    }

    /**
     * Template variable getter. Returns parent article name
     *
     * @return string
     */
    public function getParentUrl()
    {
        if ( $this->_sParentUrl === null ) {
            $this->_sParentUrl = false;
            if ( ( $oParent = $this->_getParentProduct( $this->getProduct()->oxarticles__oxparentid->value ) ) ) {
                $this->_sParentUrl = $oParent->getLink();
            }
        }
        return $this->_sParentUrl;
    }

    /**
     * Template variable getter. Returns picture galery of current article
     *
     * @return array
     */
    public function getPictureGallery()
    {
        if ( $this->_aPicGallery === null ) {
            //get picture gallery
            $this->_aPicGallery = $this->getPicturesProduct()->getPictureGallery();
        }
        return $this->_aPicGallery;
    }

    /**
     * Template variable getter. Returns id of active picture
     *
     * @return string
     */
    public function getActPictureId()
    {
        $aPicGallery = $this->getPictureGallery();
        return $aPicGallery['ActPicID'];
    }

    /**
     * Template variable getter. Returns active picture
     *
     * @return object
     */
    public function getActPicture()
    {
        $aPicGallery = $this->getPictureGallery();
        return $aPicGallery['ActPic'];
    }

    /**
     * Template variable getter. Returns true if there more pictures
     *
     * @return bool
     */
    public function morePics()
    {
        $aPicGallery = $this->getPictureGallery();
        return $aPicGallery['MorePics'];
    }

    /**
     * Template variable getter. Returns pictures of current article
     *
     * @return array
     */
    public function getPictures()
    {
        $aPicGallery = $this->getPictureGallery();
        return $aPicGallery['Pics'];
    }

    /**
     * Template variable getter. Returns selected picture
     *
     * @param string $sPicNr picture number
     *
     * @return string
     */
    public function getArtPic( $sPicNr )
    {
        $aPicGallery = $this->getPictureGallery();
        return $aPicGallery['Pics'][$sPicNr];
    }

    /**
     * Template variable getter. Returns icons of current article
     *
     * @return array
     */
    public function getIcons()
    {
        $aPicGallery = $this->getPictureGallery();
        return $aPicGallery['Icons'];
    }

    /**
     * Template variable getter. Returns if to show zoom pictures
     *
     * @return bool
     */
    public function showZoomPics()
    {
        $aPicGallery = $this->getPictureGallery();
        return $aPicGallery['ZoomPic'];
    }

    /**
     * Template variable getter. Returns zoom pictures
     *
     * @return array
     */
    public function getZoomPics()
    {
        $aPicGallery = $this->getPictureGallery();
        return $aPicGallery['ZoomPics'];
    }

    /**
     * Template variable getter. Returns active zoom picture id
     *
     * @return array
     */
    public function getActZoomPic()
    {
        return 1;
    }

    /**
     * Template variable getter. Returns selectlists of current article
     *
     * @return array
     */
    public function getSelectLists()
    {
        if ( $this->_aSelectLists === null ) {
            $this->_aSelectLists = false;
            if ( $this->getConfig()->getConfigParam( 'bl_perfLoadSelectLists' ) ) {
                $this->_aSelectLists = $this->getProduct()->getSelectLists();
            }
        }
        return $this->_aSelectLists;
    }

    /**
     * Template variable getter. Returns reviews of current article
     *
     * @return array
     */
    public function getReviews()
    {
        if ( $this->_aReviews === null ) {
            $this->_aReviews = false;
            if ( $this->getConfig()->getConfigParam( 'bl_perfLoadReviews' ) ) {
                $this->_aReviews = $this->getProduct()->getReviews();
            }
        }
        return $this->_aReviews;
    }

    /**
     * Template variable getter. Returns crosssellings
     *
     * @return object
     */
    public function getCrossSelling()
    {
        if ( $this->_oCrossSelling === null ) {
            $this->_oCrossSelling = false;
            if ( $oProduct = $this->getProduct() ) {
                $this->_oCrossSelling = $oProduct->getCrossSelling();
            }
        }
        return $this->_oCrossSelling;
    }

    /**
     * Template variable getter. Returns similar article list
     *
     * @return object
     */
    public function getSimilarProducts()
    {
        if ( $this->_oSimilarProducts === null ) {
            $this->_oSimilarProducts = false;
            if ( $oProduct = $this->getProduct() ) {
                $this->_oSimilarProducts = $oProduct->getSimilarProducts();
            }
        }
        return $this->_oSimilarProducts;
    }

    /**
     * Template variable getter. Returns recommlists
     *
     * @return object
     */
    public function getSimilarRecommLists()
    {
        if (!$this->getViewConfig()->getShowListmania()) {
            return false;
        }

        if ( $this->_oRecommList === null ) {
            $this->_oRecommList = false;
            if ( $oProduct = $this->getProduct() ) {
                $oRecommList = oxNew('oxrecommlist');
                $this->_oRecommList = $oRecommList->getRecommListsByIds( array( $oProduct->getId() ) );
            }
        }
        return $this->_oRecommList;
    }

    /**
     * Template variable getter. Returns accessoires of article
     *
     * @return object
     */
    public function getAccessoires()
    {
        if ( $this->_oAccessoires === null ) {
            $this->_oAccessoires = false;
            if ( $oProduct = $this->getProduct() ) {
                $this->_oAccessoires = $oProduct->getAccessoires();
            }
        }
        return $this->_oAccessoires;
    }

    /**
     * Template variable getter. Returns list of customer also bought thies products
     *
     * @return object
     */
    public function getAlsoBoughtTheseProducts()
    {
        if ( $this->_aAlsoBoughtArts === null ) {
            $this->_aAlsoBoughtArts = false;
            if ( $oProduct = $this->getProduct() ) {
                $this->_aAlsoBoughtArts = $oProduct->getCustomerAlsoBoughtThisProducts();
            }
        }
        return $this->_aAlsoBoughtArts;
    }

    /**
     * Template variable getter. Returns if pricealarm is disabled
     *
     * @return object
     */
    public function isPriceAlarm()
    {
        // #419 disabling pricealarm if article has fixed price
        $oProduct = $this->getProduct();
        if ( isset( $oProduct->oxarticles__oxblfixedprice->value ) && $oProduct->oxarticles__oxblfixedprice->value ) {
            return 0;
        }
        return 1;
    }

    /**
     * returns object, assosiated with current view.
     * (the object that is shown in frontend)
     *
     * @param int $iLang language id
     *
     * @return object
     */
    protected function _getSubject( $iLang )
    {
        return $this->getProduct();
    }

    /**
     * Returns search title. It will be setted in oxlocator
     *
     * @return string
     */
    public function getSearchTitle()
    {
        return $this->_sSearchTitle;
    }

    /**
     * Returns search title setter
     *
     * @param string $sTitle search title
     *
     * @return null
     */
    public function setSearchTitle( $sTitle )
    {
        $this->_sSearchTitle = $sTitle;
    }

    /**
     * active category path setter
     *
     * @param string $sActCatPath category tree path
     *
     * @return string
     */
    public function setCatTreePath( $sActCatPath )
    {
        $this->_sCatTreePath = $sActCatPath;
    }

    /**
     * If product details are accessed by vendor url
     * view must not be indexable
     *
     * @return int
     */
    public function noIndex()
    {
        $sListType = oxConfig::getParameter( 'listtype' );
        if ( $sListType && ( 'vendor' == $sListType || 'manufacturer' == $sListType ) ) {
            return $this->_iViewIndexState = VIEW_INDEXSTATE_NOINDEXFOLLOW;
        }
        return parent::noIndex();
    }

    /**
     * Returns current view title. Default is null
     *
     * @return null
     */
    public function getTitle()
    {
        if ( $oProduct = $this->getProduct() ) {
            return $oProduct->oxarticles__oxtitle->value . ( $oProduct->oxarticles__oxvarselect->value ? ' ' . $oProduct->oxarticles__oxvarselect->value : '' );
        }
    }


    /**
     * Template variable getter. Returns current tag
     *
     * @return string
     */
    public function getTag()
    {
        return oxConfig::getParameter("searchtag", 1);
    }

    /**
     * Returns view canonical url
     *
     * @return string
     */
    public function getCanonicalUrl()
    {
        if ( ( $oProduct = $this->getProduct() ) ) {
            if ( $oProduct->oxarticles__oxparentid->value ) {
                $oProduct = $this->_getParentProduct( $oProduct->oxarticles__oxparentid->value );
            }

            $oUtils = oxUtilsUrl::getInstance();
            if ( oxUtils::getInstance()->seoIsActive() ) {
                $sUrl = $oUtils->prepareCanonicalUrl( $oProduct->getBaseSeoLink( $oProduct->getLanguage(), true ) );
            } else {
                $sUrl = $oUtils->prepareCanonicalUrl( $oProduct->getBaseStdLink( $oProduct->getLanguage() ) );
            }
            return $sUrl;
        }
    }

    /**
     * Should we show MD variant selection? - Not for 1 dimension variants.
     *
     * @return bool
     */
    public function isMdVariantView()
    {
        if ( $this->_blMdView === null ) {
            $this->_blMdView = false;
            if ( $this->getConfig()->getConfigParam( 'blUseMultidimensionVariants' ) ) {
                $iMaxMdDepth = $this->getProduct()->getMdVariants()->getMaxDepth();
                $this->_blMdView = ($iMaxMdDepth > 1);
            }
        }

        return $this->_blMdView;
    }

    /**
     * Checks should persistent parametere input field be displayed
     *
     * @return bool
     */
    public function isPersParam()
    {
        $oProduct = $this->getProduct();
        return $oProduct->oxarticles__oxisconfigurable->value;
    }

    /**
     * Returns tag separator
     *
     * @return string
     */
    public function getTagSeparator()
    {
        $sSepartor = $this->getConfig()->getConfigParam("sTagSeparator");
        return $sSepartor;
    }

    /**
     * Template variable getter. Returns rating value
     *
     * @return double
     */
    public function getRatingValue()
    {

        if ( $this->_dRatingValue === null ) {
            $this->_dRatingValue = (double) 0;
            if ( $this->isReviewActive() && ( $oDetailsProduct = $this->getProduct() ) ) {
                $this->_dRatingValue = round( $oDetailsProduct->getArticleRatingAverage( $this->getConfig()->getConfigParam( 'blShowVariantReviews' ) ), 1);
            }
        }

        return (double) $this->_dRatingValue;
    }

    /**
     * Template variable getter. Returns if review module is on
     *
     * @return bool
     */
    public function isReviewActive()
    {
        return $this->getConfig()->getConfigParam( 'bl_perfLoadReviews' );
    }

    /**
     * Template variable getter. Returns rating count
     *
     * @return integer
     */
    public function getRatingCount()
    {
        if ( $this->_iRatingCnt === null ) {
            $this->_iRatingCnt = false;
            if ( $this->isReviewActive() && ( $oDetailsProduct = $this->getProduct() ) ) {
                $this->_iRatingCnt = $oDetailsProduct->getArticleRatingCount( $this->getConfig()->getConfigParam( 'blShowVariantReviews' ) );
            }
        }
        return $this->_iRatingCnt;
    }

    /**
     * Returns Bread Crumb - you are here page1/page2/page3...
     *
     * @return array
     */
    public function getBreadCrumb()
    {
        $aPaths = array();

        if ( 'search' == oxConfig::getParameter( 'listtype' ) ) {
            $sSearchParam = $this->getSearchParamForHtml();

            $aCatPath = array();
            $aCatPath['title'] = sprintf( oxLang::getInstance()->translateString( 'searchResult', oxLang::getInstance()->getBaseLanguage(), false ), $sSearchParam );
            $aCatPath['link']  = $this->getViewConfig()->getSelfLink() . 'stoken=' . oxSession::getVar('sess_stoken') . "&amp;cl=search&amp;searchparam=" . $sSearchParam;

            $aPaths[] = $aCatPath;

        } elseif ( 'tag' == oxConfig::getParameter( 'listtype' ) ) {

            $aCatPath = array();

            $aCatPath['title'] = oxLang::getInstance()->translateString( 'TAGS', oxLang::getInstance()->getBaseLanguage(), false );
            $aCatPath['link']  = oxSeoEncoder::getInstance()->getStaticUrl( $this->getViewConfig()->getSelfLink() . 'cl=tags' );
            $aPaths[] = $aCatPath;

            $oStr = getStr();
            $aCatPath['title'] = $oStr->ucfirst(oxConfig::getParameter( 'searchtag' ));
            $aCatPath['link']  = oxSeoEncoderTag::getInstance()->getTagUrl( oxConfig::getParameter( 'searchtag' ) );
            $aPaths[] = $aCatPath;

        } elseif ( 'recommlist' == oxConfig::getParameter( 'listtype' ) ) {

            $aCatPath = array();
            $aCatPath['title'] = oxLang::getInstance()->translateString( 'PAGE_RECOMMENDATIONS_PRODUCTS_TITLE', oxLang::getInstance()->getBaseLanguage(), false );
            $aPaths[] = $aCatPath;
        } else {

            $oCatTree = $this->getCatTreePath();

            if ( $oCatTree ) {

                foreach ( $oCatTree as $oCat ) {
                    $aCatPath = array();

                    $aCatPath['link'] = $oCat->getLink();
                    $aCatPath['title'] = $oCat->oxcategories__oxtitle->value;

                    $aPaths[] = $aCatPath;
                }
            }
        }

        return $aPaths;
    }

    /**
     * Validates email
     * address. If email is wrong - returns false and exits. If email
     * address is OK - creates prcealarm object and saves it
     * (oxpricealarm::save()). Sends pricealarm notification mail
     * to shop owner.
     *
     * @return  bool    false on error
     */
    public function addme()
    {
        $myConfig = $this->getConfig();
        $myUtils  = oxUtils::getInstance();

        //control captcha
        $sMac     = oxConfig::getParameter( 'c_mac' );
        $sMacHash = oxConfig::getParameter( 'c_mach' );
        $oCaptcha = $this->getCaptcha();
        if ( !$oCaptcha->pass( $sMac, $sMacHash ) ) {
            $this->_iPriceAlarmStatus = 2;
            return;
        }

        $aParams = oxConfig::getParameter( 'pa' );
        if ( !isset( $aParams['email'] ) || !$myUtils->isValidEmail( $aParams['email'] ) ) {
            $this->_iPriceAlarmStatus = 0;
            return;
        }
        $aParams['aid'] = $this->getProduct()->getId();
        $oCur = $myConfig->getActShopCurrencyObject();
        // convert currency to default
        $dPrice = $myUtils->currency2Float( $aParams['price'] );

        $oAlarm = oxNew( "oxpricealarm" );
        $oAlarm->oxpricealarm__oxuserid = new oxField( oxSession::getVar( 'usr' ));
        $oAlarm->oxpricealarm__oxemail  = new oxField( $aParams['email']);
        $oAlarm->oxpricealarm__oxartid  = new oxField( $aParams['aid']);
        $oAlarm->oxpricealarm__oxprice  = new oxField( $myUtils->fRound( $dPrice, $oCur ));
        $oAlarm->oxpricealarm__oxshopid = new oxField( $myConfig->getShopId());
        $oAlarm->oxpricealarm__oxcurrency = new oxField( $oCur->name);

        $oAlarm->oxpricealarm__oxlang = new oxField(oxLang::getInstance()->getBaseLanguage());

        $oAlarm->save();

        // Send Email
        $oEmail = oxNew( 'oxemail' );
        $this->_iPriceAlarmStatus = (int) $oEmail->sendPricealarmNotification( $aParams, $oAlarm );
    }

    /**
     * Return pricealarm status (if it was send)
     *
     * @return integer
     */
    public function getPriceAlarmStatus()
    {
        return $this->_iPriceAlarmStatus;
    }

    /**
     * Template variable getter. Returns bid price
     *
     * @return string
     */
    public function getBidPrice()
    {
        if ( $this->_sBidPrice === null ) {
            $this->_sBidPrice = false;

            $aParams = oxConfig::getParameter( 'pa' );
            $oCur = $this->getConfig()->getActShopCurrencyObject();
            $iPrice = oxUtils::getInstance()->currency2Float( $aParams['price'] );
            $this->_sBidPrice = oxLang::getInstance()->formatCurrency( $iPrice, $oCur );
        }
        return $this->_sBidPrice;
    }

    /**
     * Returns variant selection
     *
     * @return oxVariantSelectList
     */
    public function getVariantSelections()
    {
        // finding parent
        $oProduct = $this->getProduct();
        if ( ( $oParent = $this->_getParentProduct( $oProduct->oxarticles__oxparentid->value ) ) ) {
            return $oParent->getVariantSelections( oxConfig::getParameter( "varselid" ), $oProduct->getId() );
        }

        return $oProduct->getVariantSelections( oxConfig::getParameter( "varselid" ) );
    }

    /**
     * Returns pictures product object
     *
     * @return oxarticle
     */
    public function getPicturesProduct()
    {
        $aVariantSelections = $this->getVariantSelections();
        if ($aVariantSelections && $aVariantSelections['oActiveVariant'] && !$aVariantSelections['blPerfectFit']) {
            return $aVariantSelections['oActiveVariant'];
        }
        return $this->getProduct();
    }


     /**
     * Should "More tags" link be visible.
     *
     * @return bool
     */
    public function isMoreTagsVisible()
    {
        return true;
    }

     /**
     * Template variable getter. Returns search parameter for Html
     *
     * @return string
     */
    public function getSearchParamForHtml()
    {
        if ( $this->_sSearchParamForHtml === null ) {
            $this->_sSearchParamForHtml = oxConfig::getParameter( 'searchparam' );
        }
        return $this->_sSearchParamForHtml;
    }

    /**
     * Returns if page has rdfa
     *
     * @return bool
     */
    public function showRdfa()
    {
        return $this->getConfig()->getConfigParam( 'blRDFaEmbedding' );
    }

    /**
     * Sets normalized rating
     *
     * @return array
     */
    public function getRDFaNormalizedRating()
    {
        $myConfig = $this->getConfig();
        $iMin = $myConfig->getConfigParam("iRDFaMinRating");
        $iMax = $myConfig->getConfigParam("iRDFaMaxRating");

        $oProduct = $this->getProduct();
        $iCount = $oProduct->oxarticles__oxratingcnt->value;
        if ( isset($iMin) && isset($iMax) && $iMax != '' && $iMin != '' && $iCount > 0 ) {
            $aNomalizedRating = array();
            $iValue = ((4*($oProduct->oxarticles__oxrating->value - $iMin)/($iMax - $iMin)))+1;
            $aNomalizedRating["count"] = $iCount;
            $aNomalizedRating["value"] = round($iValue, 2);
            return $aNomalizedRating;
        }
        return false;
    }

    /**
     * Sets and returns validity period of given object
     *
     * @param string $sShopConfVar object name
     *
     * @return array
     */
    public function getRDFaValidityPeriod($sShopConfVar)
    {
        if ( $sShopConfVar ) {
            $aValidity = array();
            $iDays = $this->getConfig()->getConfigParam($sShopConfVar);
            $iFrom = oxUtilsDate::getInstance()->getTime();

            $iThrough = $iFrom + ($iDays * 24 * 60 * 60);
            $aValidity["from"] = date('Y-m-d\TH:i:s', $iFrom)."Z";
            $aValidity["through"] = date('Y-m-d\TH:i:s', $iThrough)."Z";

            return $aValidity;
        }
        return false;
    }

    /**
     * Gets business function of the gr:Offering
     *
     * @return string
     */
    public function getRDFaBusinessFnc()
    {
        return $this->getConfig()->getConfigParam("sRDFaBusinessFnc");
    }

    /**
     * Gets the types of customers for which the given gr:Offering is valid
     *
     * @return array
     */
    public function getRDFaCustomers()
    {
        return $this->getConfig()->getConfigParam("aRDFaCustomers");
    }

    /**
     * Gets information whether prices include vat
     *
     * @return int
     */
    public function getRDFaVAT()
    {
        return $this->getConfig()->getConfigParam("iRDFaVAT");
    }

    /**
     * Gets a generic description of product condition
     *
     * @return string
     */
    public function getRDFaGenericCondition()
    {
        return $this->getConfig()->getConfigParam("iRDFaCondition");
    }

    /**
     * Returns bundle product
     *
     * @return object
     */
    public function getBundleArticle()
    {
        $oProduct = $this->getProduct();
        if ( $oProduct && $oProduct->oxarticles__oxbundleid->value ) {
            $oArticle = oxNew("oxarticle");
            $oArticle->load($oProduct->oxarticles__oxbundleid->value);
            return $oArticle;
        }
        return false;
    }

    /**
     * Gets accepted payment methods
     *
     * @return array
     */
    public function getRDFaPaymentMethods()
    {
        $iPrice = $this->getProduct()->getPrice()->getBruttoPrice();
        $oPayments = oxNew("oxpaymentlist");
        $oPayments->loadRDFaPaymentList($iPrice);
        return $oPayments;
    }

    /**
     * Returns delivery methods with assigned deliverysets.
     *
     * @return object
     */
    public function getRDFaDeliverySetMethods()
    {
        $oDelSets = oxNew("oxdeliverysetlist");
        $oDelSets->loadRDFaDeliverySetList();
        return $oDelSets;
    }

    /**
     * Template variable getter. Returns delivery list for current product
     *
     * @return object
     */
    public function getProductsDeliveryList()
    {
        $oProduct = $this->getProduct();
        $oDelList = oxNew( "oxDeliveryList" );
        $oDelList->loadDeliveryListForProduct( $oProduct );
        return $oDelList;
    }

    /**
     * Gets content id of delivery information page
     *
     * @return string
     */
    public function getRDFaDeliveryChargeSpecLoc()
    {
        return $this->getConfig()->getConfigParam("sRDFaDeliveryChargeSpecLoc");
    }

    /**
     * Gets content id of payments
     *
     * @return string
     */
    public function getRDFaPaymentChargeSpecLoc()
    {
        return $this->getConfig()->getConfigParam("sRDFaPaymentChargeSpecLoc");
    }

    /**
     * Gets content id of company info page (About Us)
     *
     * @return string
     */
    public function getRDFaBusinessEntityLoc()
    {
        return $this->getConfig()->getConfigParam("sRDFaBusinessEntityLoc");
    }

    /**
     * Returns if to show products left stock
     *
     * @return string
     */
    public function showRDFaProductStock()
    {
        return $this->getConfig()->getConfigParam("blShowRDFaProductStock");
    }

}
