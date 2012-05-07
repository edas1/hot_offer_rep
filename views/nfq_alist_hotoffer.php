<?php

class nfq_alist_hotoffer extends oxUBase
{
    protected $_sThisTemplate = 'page/list/list.tpl';

    public function render()
    {
/*
        $myConfig = $this->getConfig();

        //$oCategory  = null;
        $blContinue = true;
        ///$this->_blIsCat = false;

        // A. checking for fake "more" category
        if ( 'oxmore' == oxConfig::getParameter( 'cnid' ) ) {
            // overriding some standard value and parameters
            $this->_sThisTemplate = $this->_sThisMoreTemplate;
            $oCategory = oxNew( 'oxcategory' );
            $oCategory->oxcategories__oxactive = new oxField( 1, oxField::T_RAW );
            $this->setActCategory( $oCategory );

            $this->_blShowTagCloud = true;

        } elseif ( ( $oCategory = $this->getActCategory() ) ) {
            $blContinue = ( bool ) $oCategory->oxcategories__oxactive->value;
            $this->_blIsCat = true;
            $this->_blBargainAction = true;
        }*/




        /*$oCat = $this->getActCategory();
        if ($oCat && $myConfig->getConfigParam( 'bl_rssCategories' )) {
            $oRss = oxNew('oxrssfeed');
            $this->addRssFeed($oRss->getCategoryArticlesTitle($oCat), $oRss->getCategoryArticlesUrl($oCat), 'activeCategory');
        } */

        //checking if actual pages count does not exceed real articles page count


        //$this->getArticleList();

        /*if ( $this->_blIsCat ) {
            $this->_checkRequestedPage();
        }*/

        // processing list articles
        //$this->_processListArticles();

        parent::render();

        return $this->getTemplateName();
    }
}
