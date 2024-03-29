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
 * @package   smarty_plugins
 * @copyright (C) OXID eSales AG 2003-2012
 * @version OXID eShop CE
 * @version   SVN: $Id: modifier.oxaddparams.php 41698 2012-01-24 09:06:06Z linas.kukulskis $
 */

/**
 * Smarty function
 * -------------------------------------------------------------
 * Purpose: add additional parameters to SEO url
 * add |oxaddparams:"...." to link
 * -------------------------------------------------------------
 *
 * @param string $sUrl       Url
 * @param string $sDynParams Dynamic URL parameters
 *
 * @return string
 */
function smarty_modifier_oxaddparams( $sUrl, $sDynParams )
{
    $oStr = getStr();
    // removing empty parameters
    $sDynParams = $sDynParams?$oStr->preg_replace( array( '/^\?/', '/^\&(amp;)?$/' ), '', $sDynParams ):false;
    if ( $sDynParams ) {
        $sUrl .= ( ( strpos( $sUrl, '?' ) !== false ) ? "&amp;":"?" ) . $sDynParams;
    }
    return oxUtilsUrl::getInstance()->processSeoUrl( $sUrl );
}
