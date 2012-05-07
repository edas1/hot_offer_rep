<?php

class nfq_hotoffer_oxarticlelist extends nfq_hotoffer_oxarticlelist_parent
{
    public function loadHotOffers()
    {
        $myConfig = $this->getConfig();

        if ( !$myConfig->getConfigParam( 'bl_perfLoadPriceForAddList' ) ) {
            $this->getBaseObject()->disablePriceLoad();
        }

        $this->_aArray = array();

        $sArticleTable = getViewName('oxarticles');

        if ( $myConfig->getConfigParam( 'blNewArtByInsert' ) ) {
            $sType = 'oxinsert';
        } else {
            $sType = 'oxtimestamp';
        }

        $sSelect  = "select * from $sArticleTable ";
        $sSelect .= "where oxparentid = '' and ".$this->getBaseObject()->getSqlActiveSnippet()." and oxissearch = 1 AND nfq_hotoffer = 1 order by $sType desc ";
        if (!($iLimit = (int) $iLimit)) {
            $iLimit = $myConfig->getConfigParam( 'iNrofNewcomerArticles' );
        }
        $sSelect .= "limit " . $iLimit;

        $this->selectString($sSelect);

    }
}