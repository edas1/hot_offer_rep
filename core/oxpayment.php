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
 * @version   SVN: $Id: oxpayment.php 43743 2012-04-11 07:52:36Z linas.kukulskis $
 */

/**
 * Payment manager.
 * Performs mayment methods, such as assigning to someone, returning value etc.
 * @package core
 */
class oxPayment extends oxI18n
{
    /**
     * Consider for calculation of base sum - Value of all goods in basket
     * @var int
     */
    const PAYMENT_ADDSUMRULE_ALLGOODS = 1;

    /**
     * Consider for calculation of base sum - Discounts
     * @var int
     */
    const PAYMENT_ADDSUMRULE_DISCOUNTS = 2;

    /**
     * Consider for calculation of base sum - Vouchers
     * @var int
     */
    const PAYMENT_ADDSUMRULE_VOUCHERS = 4;

    /**
     * Consider for calculation of base sum - Shipping costs
     * @var int
     */
    const PAYMENT_ADDSUMRULE_SHIPCOSTS = 8;

    /**
     * Consider for calculation of base sum - Gift Wrapping/Greeting Card
     * @var int
     */
    const PAYMENT_ADDSUMRULE_GIFTS = 16;

    /**
     * User groups object (default null).
     *
     * @var object
     */
    protected $_oGroups = null;

    /**
     * Countries assigned to current payment. Value from outside accessible
     * by calling oxpayment::getCountries
     *
     * @var array
     */
    protected $_aCountries = null;

    /**
     * Current class name
     *
     * @var string
     */
    protected $_sClassName = 'oxpayment';

    /**
     * current dyn values
     *
     * @var array
     */
    protected $_aDynValues = null;

    /**
     * payment error type
     *
     * @var int
     */
    protected $_iPaymentError = null;

    /**
     * Payment VAT config
     *
     * @var bool
     */
    protected $_blPaymentVatOnTop = false;

    /**
     * Class constructor, initiates parent constructor (parent::oxI18n()).
     */
    public function __construct()
    {
        $this->setPaymentVatOnTop( $this->getConfig()->getConfigParam( 'blPaymentVatOnTop' ) );
        parent::__construct();
        $this->init( 'oxpayments' );
    }

    /**
     * Payment VAT config setter
     *
     * @param bool $blOnTop Payment vat config
     *
     * @return null
     */
    public function setPaymentVatOnTop( $blOnTop )
    {
        $this->_blPaymentVatOnTop = $blOnTop;
    }

    /**
     * Payment groups getter. Returns groups list
     *
     * @return oxlist
     */
    public function getGroups()
    {
        if ( $this->_oGroups == null && ( $sOxid = $this->getId() ) ) {

            // usergroups
            $this->_oGroups = oxNew( 'oxlist', 'oxgroups' );
            $sViewName = getViewName( "oxgroups", $this->getLanguage() );

            // performance
            $sSelect = "select {$sViewName}.* from {$sViewName}, oxobject2group
                        where oxobject2group.oxobjectid = '{$sOxid}'
                        and oxobject2group.oxgroupsid={$sViewName}.oxid ";
            $this->_oGroups->selectString( $sSelect );
        }

        return $this->_oGroups;
    }

    /**
     * sets the dyn values
     *
     * @param array $aDynValues the array of dy values
     *
     * @return null
     */
    public function setDynValues( $aDynValues )
    {
        $this->_aDynValues = $aDynValues;
    }

    /**
     * sets a single dyn value
     *
     * @param mixed $oKey the key
     * @param mixed $oVal the value
     *
     * @return null
     */
    public function setDynValue( $oKey, $oVal )
    {
        $this->_aDynValues[$oKey] = $oVal;
    }

    /**
     * Returns an array of dyn payment values
     *
     * @return array
     */
    public function getDynValues()
    {
        if ( !$this->_aDynValues ) {
            $sRawDynValue = null;
            if ( is_object($this->oxpayments__oxvaldesc ) ) {
                $sRawDynValue = $this->oxpayments__oxvaldesc->getRawValue();
            }

            $this->_aDynValues = oxUtils::getInstance()->assignValuesFromText( $sRawDynValue );
        }
        return $this->_aDynValues;
    }

    /**
     * Returns additional taxes to base article price.
     *
     * @param double $dBaseprice Base article price
     *
     * @return double
     */
    public function getPaymentValue( $dBaseprice )
    {
        $dRet = 0;

        if ( $this->oxpayments__oxaddsumtype->value == "%") {
            $dRet = $dBaseprice * $this->oxpayments__oxaddsum->value/100;
        } else {
            $oCur = $this->getConfig()->getActShopCurrencyObject();
            $dRet = $this->oxpayments__oxaddsum->value * $oCur->rate;
        }

        if ( ($dRet * -1 ) > $dBaseprice ) {
            $dRet = $dBaseprice;
        }

        return $dRet;
    }

    /**
     * Returns base basket price for payment cost calculations. Price depends on
     * payment setup (payment administration)
     *
     * @param oxbasket $oBasket oxbasket object
     *
     * @return double
     */
    public function getBaseBasketPriceForPaymentCostCalc( $oBasket )
    {
        $dBasketPrice = 0;
        $iRules = $this->oxpayments__oxaddsumrules->value;

        // products brutto price
        if ( !$iRules || ( $iRules & self::PAYMENT_ADDSUMRULE_ALLGOODS ) ) {
            $dBasketPrice += $oBasket->getProductsPrice()->getBruttoSum();
        }

        // discounts
        if ( ( !$iRules || ( $iRules & self::PAYMENT_ADDSUMRULE_DISCOUNTS ) ) &&
             ( $oCosts = $oBasket->getTotalDiscount() ) ) {
            $dBasketPrice -= $oCosts->getBruttoPrice();
        }

        // vouchers
        if ( !$iRules || ( $iRules & self::PAYMENT_ADDSUMRULE_VOUCHERS ) ) {
            $dBasketPrice -= $oBasket->getVoucherDiscValue();
        }

        // delivery
        if ( ( !$iRules || ( $iRules & self::PAYMENT_ADDSUMRULE_SHIPCOSTS ) ) &&
             ( $oCosts = $oBasket->getCosts( 'oxdelivery' ) ) ) {
            $dBasketPrice += $oCosts->getBruttoPrice();
        }

            // wrapping
        if ( ( $iRules & self::PAYMENT_ADDSUMRULE_GIFTS ) &&
             ( $oCosts = $oBasket->getCosts( 'oxwrapping' ) ) ) {
            $dBasketPrice += $oCosts->getBruttoPrice();
        }

        return $dBasketPrice;
    }

    /**
     * Returns price object for current payment applied on basket
     *
     * @param oxuserbasket $oBasket session basket
     *
     * @return oxprice
     */
    public function getPaymentPrice( $oBasket )
    {
        //getting basket price with applied discounts and vouchers
        $dPrice = $this->getPaymentValue( $this->getBaseBasketPriceForPaymentCostCalc( $oBasket ) );

        // calculating total price
        $oPrice = oxNew( 'oxPrice' );
        if ( !$this->_blPaymentVatOnTop ) {
            $oPrice->setBruttoPriceMode();
        } else {
            $oPrice->setNettoPriceMode();
        }

        $oPrice->setPrice( $dPrice );

        // VAT will be always calculated(#3757)
        // blCalcVATForPayCharge option is @deprecated since 2012-03-23 in version 4.6
        // blShowVATForPayCharge option will be used only for displaying
        if ( $dPrice > 0 ) {
            $oPrice->setVat( $oBasket->getMostUsedVatPercent() );
        }

        return $oPrice;
    }

    /**
     * Returns array of country Ids which are assigned to current payment
     *
     * @return array
     */
    public function getCountries()
    {
        if ( $this->_aCountries === null ) {
            $oDb = oxDb::getDb();
            $this->_aCountries = array();
            $sSelect = 'select oxobjectid from oxobject2payment where oxpaymentid='.$oDb->quote( $this->getId() ).' and oxtype = "oxcountry" ';
            $rs = $oDb->select( $sSelect );
            if ( $rs && $rs->recordCount()) {
                while ( !$rs->EOF ) {
                    $this->_aCountries[] = $rs->fields[0];
                    $rs->moveNext();
                }
            }
        }
        return $this->_aCountries;
    }

    /**
     * Delete this object from the database, returns true on success.
     *
     * @param string $sOXID Object ID(default null)
     *
     * @return bool
     */
    public function delete( $sOXID = null )
    {
        if ( parent::delete( $sOXID ) ) {

            $sOXID = $sOXID?$sOXID:$this->getId();
            $oDb = oxDb::getDb();

            // deleting payment related data
            $rs = $oDb->execute( "delete from oxobject2payment where oxpaymentid = ".$oDb->quote( $sOXID ) );
            return $rs->EOF;
        }

        return false;
    }

    /**
     * Function checks if loaded payment is valid to current basket
     *
     * @param array  $aDynvalue    dynamical value (in this case oxidcreditcard and oxiddebitnote are checked only)
     * @param string $sShopId      id of current shop
     * @param oxuser $oUser        the current user
     * @param double $dBasketPrice the current basket price (oBasket->dprice)
     * @param string $sShipSetId   the current ship set
     *
     * @return bool true if payment is valid
     */
    public function isValidPayment( $aDynvalue, $sShopId, $oUser, $dBasketPrice, $sShipSetId )
    {
        $myConfig = $this->getConfig();
        if ( $this->oxpayments__oxid->value == 'oxempty' ) {
            // inactive or blOtherCountryOrder is off
            if ( !$this->oxpayments__oxactive->value || !$myConfig->getConfigParam( "blOtherCountryOrder" ) ) {
                $this->_iPaymentError = -2;
                return false;
            }
            if (count(oxDeliverySetList::getInstance()
                            ->getDeliverySetList(
                                        $oUser,
                                        $oUser->getActiveCountry()
                                )
                    )) {
                $this->_iPaymentError = -3;
                return false;
            }
            return true;
        }

        if ( !oxInputValidator::getInstance()->validatePaymentInputData( $this->oxpayments__oxid->value, $aDynvalue ) ) {
            $this->_iPaymentError = 1;
            return false;
        }

        $oCur = $myConfig->getActShopCurrencyObject();
        $dBasketPrice = $dBasketPrice / $oCur->rate;

        if ( $sShipSetId ) {
            $aPaymentList = oxPaymentList::getInstance()->getPaymentList( $sShipSetId, $dBasketPrice, $oUser );

            if ( !array_key_exists( $this->getId(), $aPaymentList ) ) {
                $this->_iPaymentError = -3;
                return false;
            }
        } else {
            $this->_iPaymentError = -2;
            return false;
        }

        return true;
    }

    /**
     * Payment error number getter
     *
     * @return int
     */
    public function getPaymentErrorNumber()
    {
        return $this->_iPaymentError;
    }

}
