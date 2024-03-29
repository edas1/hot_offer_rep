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
 * @package   core
 * @copyright (C) OXID eSales AG 2003-2012
 * @version OXID eShop CE
 * @version   SVN: $Id: oxattributelist.php 44400 2012-04-25 18:41:04Z vilma $
 */

/**
 * Attribute list manager.
 */
class oxAttributeList extends oxList
{
    /**
     * Class constructor
     *
     * @param string $sObjectsInListName Associated list item object type
     *
     * @return null
     */
    public function __construct( $sObjectsInListName = 'oxattribute')
    {
        parent::__construct( 'oxattribute');
    }

    /**
     * Load all attributes by article Id's
     *
     * @param array $aIds article id's
     *
     * @return array $aAttributes;
     */
    public function loadAttributesByIds( $aIds )
    {
        if (!count($aIds)) {
            return;
        }

        foreach ($aIds as $iKey => $sVal) {
            $aIds[$iKey] = oxDb::getInstance()->escapeString($sVal);
        }

        $sAttrViewName = getViewName( 'oxattribute' );
        $sViewName     = getViewName( 'oxobject2attribute' );

        $sSelect  = "select $sAttrViewName.oxid, $sAttrViewName.oxtitle, {$sViewName}.oxvalue, {$sViewName}.oxobjectid ";
        $sSelect .= "from {$sViewName} left join $sAttrViewName on $sAttrViewName.oxid = {$sViewName}.oxattrid ";
        $sSelect .= "where {$sViewName}.oxobjectid in ( '".implode("','", $aIds)."' ) ";
        $sSelect .= "order by {$sViewName}.oxpos, $sAttrViewName.oxpos";

        return $this->_createAttributeListFromSql( $sSelect);
    }

    /**
     * Fills array with keys and products with value
     *
     * @param string $sSelect SQL select
     *
     * @return array $aAttributes
     */
    protected function _createAttributeListFromSql( $sSelect )
    {
        $aAttributes = array();
        $rs = oxDb::getDb()->select( $sSelect );
        if ($rs != false && $rs->recordCount() > 0) {
            while (!$rs->EOF) {
                if ( !isset( $aAttributes[$rs->fields[0]])) {
                    $aAttributes[$rs->fields[0]] = new stdClass();
                }

                $aAttributes[$rs->fields[0]]->title = $rs->fields[1];
                if ( !isset( $aAttributes[$rs->fields[0]]->aProd[$rs->fields[3]])) {
                    $aAttributes[$rs->fields[0]]->aProd[$rs->fields[3]] = new stdClass();
                }
                $aAttributes[$rs->fields[0]]->aProd[$rs->fields[3]]->value = $rs->fields[2];
                $rs->moveNext();
            }
        }
        return $aAttributes;
    }

    /**
     * Load attributes by article Id
     *
     * @param string $sArtId article ids
     *
     * @return null;
     */
    public function loadAttributes( $sArtId )
    {
        if ( $sArtId ) {

            $sAttrViewName = getViewName( 'oxattribute' );
            $sViewName     = getViewName( 'oxobject2attribute' );

            $sSelect  = "select {$sAttrViewName}.*, o2a.* from {$sViewName} as o2a ";
            $sSelect .= "left join {$sAttrViewName} on {$sAttrViewName}.oxid = o2a.oxattrid ";
            $sSelect .= "where o2a.oxobjectid = '{$sArtId}' and o2a.oxvalue != '' ";
            $sSelect .= "order by o2a.oxpos, {$sAttrViewName}.oxpos";

            $this->selectString( $sSelect );
        }
    }

     /**
     * get category attributes by category Id
     *
     * @param string  $sCategoryId category Id
     * @param integer $iLang       language No
     *
     * @return object;
     */

    public function getCategoryAttributes( $sCategoryId, $iLang )
    {
        $aSessionFilter = oxSession::getVar( 'session_attrfilter' );

        $oArtList = oxNew( "oxarticlelist");
        $oArtList->loadCategoryIDs( $sCategoryId, $aSessionFilter );

        // Only if we have articles
        if (count($oArtList) > 0 ) {
            $oDb = oxDb::getDb();
            $sArtIds = '';
            foreach (array_keys($oArtList->getArray()) as $sId ) {
                if ($sArtIds) {
                    $sArtIds .= ',';
                }
                $sArtIds .= $oDb->quote($sId);
            }

            $sActCatQuoted = $oDb->quote( $sCategoryId );
            $sAttTbl = getViewName( 'oxattribute', $iLang );
            $sO2ATbl = getViewName( 'oxobject2attribute', $iLang );
            $sC2ATbl = getViewName( 'oxcategory2attribute', $iLang );

            $sSelect = "SELECT DISTINCT att.oxid, att.oxtitle, o2a.oxvalue ".
                       "FROM $sAttTbl as att, $sO2ATbl as o2a ,$sC2ATbl as c2a ".
                       "WHERE att.oxid = o2a.oxattrid AND c2a.oxobjectid = $sActCatQuoted AND c2a.oxattrid = att.oxid AND o2a.oxvalue !='' AND o2a.oxobjectid IN ($sArtIds) ".
                       "ORDER BY c2a.oxsort , att.oxpos, att.oxtitle, o2a.oxvalue";

            $rs = $oDb->select( $sSelect );

            if ( $rs != false && $rs->recordCount() > 0 ) {
                while ( !$rs->EOF && list( $sAttId, $sAttTitle, $sAttValue ) = $rs->fields ) {

                    if ( !$this->offsetExists( $sAttId ) ) {

                        $oAttribute = oxNew( "oxattribute" );
                        $oAttribute->setTitle( $sAttTitle );

                        $this->offsetSet( $sAttId, $oAttribute );
                        $iLang = oxLang::getInstance()->getBaseLanguage();
                        if ( isset( $aSessionFilter[$sCategoryId][$iLang][$sAttId] ) ) {
                            $oAttribute->setActiveValue( $aSessionFilter[$sCategoryId][$iLang][$sAttId] );
                        }

                    } else {
                        $oAttribute = $this->offsetGet( $sAttId );
                    }

                    $oAttribute->addValue( $sAttValue );
                    $rs->moveNext();
                }
            }
        }

        return $this;
    }
}
