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
 * @version   SVN: $Id: function.oxscript.php 44021 2012-04-18 09:30:55Z linas.kukulskis $
 */

/**
 * Smarty plugin
 * -------------------------------------------------------------
 * File: function.oxscript.php
 * Type: string, html
 * Name: oxscript
 * Purpose: Collect given javascript includes/calls, but include/call them at the bottom of the page.
 *
 * Add [{oxscript add="oxid.popup.load();" }] to add stript call.
 * Add [{oxscript include="oxid.js"}] to include local javascript file.
 * Add [{oxscript include="oxid.js?20120413"}] to include local javascript file with query string part.
 * Add [{oxscript include="http://www.oxid-esales.com/oxid.js"}] to include externall javascript file.
 *
 * IMPORTANT!
 * Do not forget to add plain [{oxscript}] tag before blosing body tag, to output all collected script includes and calls.
 * -------------------------------------------------------------
 *
 * @param array  $params  params
 * @param Smarty &$smarty clever simulation of a method
 *
 * @return string
 */
function smarty_function_oxscript($params, &$smarty)
{
    $myConfig  = oxConfig::getInstance();
    $sSufix    = ($smarty->_tpl_vars["__oxid_include_dynamic"])?'_dynamic':'';
    $sIncludes = 'includes'.$sSufix;
    $sScripts  = 'scripts'.$sSufix;
    $iPriority = ($params['priority'])?$params['priority']:3;

    $aScript  = (array) $myConfig->getGlobalParameter($sScripts);
    $aInclude = (array) $myConfig->getGlobalParameter($sIncludes);
    $sOutput  = '';

    if ( $params['add'] ) {
        $sScript = trim( $params['add'] );
        if ( !in_array($sScript, $aScript)) {
            $aScript[] = $sScript;
        }
        $myConfig->setGlobalParameter($sScripts, $aScript);

    } elseif ( $params['include'] ) {
        $sScript = $params['include'];
        if (!preg_match('#^https?://#', $sScript)) {
            // Separate query part #3305.
            $aScript = explode('?', $sScript);
            $sScript = $myConfig->getResourceUrl($aScript[0], $myConfig->isAdmin());

            // Append query part if still needed #3305.
            if ($sScript && count($aScript) > 1) {
                $sScript .= '?'.$aScript[1];
            }
        }

        // File not found ?
        if (!$sScript) {
            if ($myConfig->getConfigParam( 'iDebug' ) != 0) {
                $sError = "{oxscript} resource not found: ".htmlspecialchars($params['include']);
                trigger_error($sError, E_USER_WARNING);
            }
            return;
        } else {
            $aInclude[$iPriority][] = $sScript;
            $aInclude[$iPriority]   = array_unique($aInclude[$iPriority]);
            $myConfig->setGlobalParameter($sIncludes, $aInclude);
        }
    } else {
        // Sort by priority.
        ksort( $aInclude );
        $aUsedSrc = array();
        foreach ($aInclude as $aPriority) {
            foreach ($aPriority as $sSrc) {
                // Check for duplicated lower priority resources #3062.
                if (!in_array($sSrc, $aUsedSrc)) {
                    $sOutput .= '<script type="text/javascript" src="'.$sSrc.'"></script>'.PHP_EOL;
                }
                $aUsedSrc[] = $sSrc;
            }
        }
        $myConfig->setGlobalParameter($sIncludes, null);

        if (count($aScript)) {
            $sOutput .= '<script type="text/javascript">' . "\n";
            foreach ($aScript as $sScriptToken) {
                $sOutput .= $sScriptToken. "\n";
            }
            $sOutput .= '</script>' . PHP_EOL;

            $myConfig->setGlobalParameter($sScripts, null);
        }

    }

    return $sOutput;
}
