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

class Nfq_Article_Hotoffer extends oxAdminDetails
{

    /**
     * Loads article parameters and passes them to Smarty engine, returns
     * name of template file "nfq_article_hotoffer.tpl".
     *
     * @return string
     */
    public function render()
    {
        parent::render();
        $oArticle = oxNew( "oxarticle");
        $oArticle->load( $this->getEditObjectId() );
        $this->_aViewData['edit'] = $oArticle;
        return 'nfq_article_hotoffer.tpl';
    }

    /**
     * Saves changes of article parameters.
     *
     * @return null
     */
    public function save()
    {
        parent::save();
        $aParams = oxConfig::getParameter( "editval");
        $oArticle = oxNew( "oxarticle");
        $oArticle->load( $this->getEditObjectId() );
        $oArticle->assign( array(
            'oxarticles__nfq_hotoffer' => isset($aParams['oxarticles__nfq_hotoffer'])?'1':'0'
        ) );
        $oArticle->save();
    }

}
