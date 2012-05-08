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

class nfq_hotoffers extends Start
{
    protected $_sThisTemplate = 'page/shop/nfq_hotoffers.tpl';

    /**
     * Executes parent::render().
     *
     * @return  string  cuurent template file name
     */
    public function render()
    {
        parent::render();
        return $this->getTemplateName();
    }

    /**
     * Template variable getter.
     *
     * @return array hot offers list
     */
    public function getHotOfferArticles()
    {
        if ( $this->_aHotOfferArticeList === null ) {
            $this->_aHotOfferArticeList = array();
            if ( $this->_getLoadActionsParam() ) {
                $oArtList = oxNew( 'nfq_hotoffer_oxarticlelist' );
                $oArtList->loadHotOffers();
                if ( $oArtList->count() ) {
                    $this->_aHotOfferArticeList = $oArtList;
                }
            }
        }
        return $this->_aHotOfferArticeList;
    }
}