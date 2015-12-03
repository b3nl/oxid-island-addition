<?php
/**
 * ./modules/b3nl/IslandAddition/App/Setup/Events.php
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
 * @subpackage App_Setup
 * @version    $id$
 */
class b3nl_IslandAddition_App_Setup_Events
{
    /**
     * Activate-Method.
     * @return bool
     */
    public static function onActivate()
    {
        $bReturn = false;

        try {
            $bReturn = (bool)getDb()->Execute(
                'ALTER TABLE oxdelivery ' .
                'ADD forb3nislandaddition TINYINT( 1 ) NOT NULL DEFAULT "0" ' .
                'COMMENT "Is this delivery used for the island delivery?", ' .
                'ADD INDEX (forb3nislandaddition)'
            );

            if (class_exists('oxDbMetaDataHandler')) {
                oxNew('oxDbMetaDataHandler')->updateViews();
            } // if
        } catch (Exception $oExc) {
            // silent ignore.
        } // catch

        return $bReturn;
    } // function
} // class
