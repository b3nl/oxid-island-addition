<?php
/**
 * ./modules/b3nl/IslandAddition/App/Model/b3IslandDelivery.php
 * @author     blange <code@b3nl.de>
 * @category   modules
 * @package    b3nl_IslandAddition
 * @subpackage App_Model
 * @version    $id$
 */

/**
 * Delivery-Module for the island addition.
 * @author     blange <code@b3nl.de>
 * @category   modules
 * @package    b3nl_IslandAddition
 * @subpackage App_Model
 * @version    $id$
 */
class b3IslandDelivery extends b3IslandDelivery_parent
{
    /**
     * Checks if delivery fits for current basket
     * @param oxBasket $oBasket shop basket
     * @return bool
     */
    public function isForBasket($oBasket)
    {
        return parent::isForBasket($oBasket) &&
        (!$this->oxdelivery__forb3nislandaddition->value || ($this->isForB3NIsland($oBasket)));
    } // function

    /**
     * Returns true if this user wishes the delivery on an german island.
     * @param oxBasket $oBasket
     * @return bool
     */
    protected function isForB3NIsland(oxBasket $oBasket)
    {
        $oUser = $oBasket->getBasketUser();
        $sZip = $oUser->oxuser__oxzip->value;

        if (($oUser->getSelectedAddressId()) && ($oAddr = $oUser->getSelectedAddress())) {
            $sZip = $oAddr->oxaddress__oxzip->value;
        } // if

        return $sZip && in_array($sZip, $this->getConfig()->getConfigParam('aB3NGermanIslandZips') ?: array());
    } // function
} // class
