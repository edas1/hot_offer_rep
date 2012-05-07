<?php

class Nfq_Article_Hotoffer extends oxAdminDetails
{
    public function render()
    {
        parent::render();
        $oArticle = oxNew( 'oxbase' );
        $oArticle->init( 'oxarticles' );
        $oArticle->load( $this->getEditObjectId() );
        $this->_aViewData['edit'] = $oArticle;
        return 'nfq_article_hotoffer.tpl';
    }

    public function save()
    {
        parent::save();
        $aParams = oxConfig::getParameter( "editval");
        $oArticle = oxNew( 'oxbase' );
        $oArticle->init( 'oxarticles' );
        $oArticle->load( $this->getEditObjectId() );
        $oArticle->assign( array(
            'oxarticles__nfq_hotoffer' => isset($aParams['oxarticles__nfq_hotoffer'])?'1':'0'
        ) );
        $oArticle->save();
    }

}
