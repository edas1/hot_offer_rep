<?php
/**
 * @copyright C UAB "Net Frequency" 2012
 *
 * This Software is the property of "Net Frequency"
 * and is protected by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * Contact UAB "Net Frequency":
 * E-mail: info@nfq.lt
 * http://www.nfq.lt
 *
 */

class nfq_hotoffer_oxarticlelist extends nfq_hotoffer_oxarticlelist_parent
{
    /**
     * Loads hot offer articles
     *
     * @return null
     */

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

        $this->selectString($sSelect);
    }
}