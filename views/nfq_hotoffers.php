<?php

class nfq_hotoffers extends Start
{
    protected $_sThisTemplate = 'page/shop/nfq_hotoffers.tpl';

    public function render()
    {
        parent::render();
        return $this->getTemplateName();
    }

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