<?php
/**
 * Metadata for the island addition module.
 * @author     blange <code@b3nl.de>
 * @category   modules
 * @package    b3nl_IslandAddition
 * @version    $id$
 */
$sMetadataVersion = '1.1';
$aB3NIslandAdditionClasses = [
    'oxdelivery' => 'b3nl/IslandAddition/App/Model/b3IslandDelivery',
];
$aB3NIslandAdditionFiles = [
    'b3nl_IslandAddition_App_Setup_Events' => 'b3nl/IslandAddition/App/Setup/Events.php'
];

foreach ($aB3NIslandAdditionClasses as $sClass) {
    // OXID needs the slash
    $aB3NIslandAdditionFiles[$sClass] = $sClass;
} // foreach

foreach ($aB3NIslandAdditionFiles as &$sFile) {
    $sFile = str_replace('_', '/', $sFile);

    if (!strpos($sFile, '.php')) {
        $sFile .= '.php';
    } // if
} // foreach

$aModule = array(
    'author' => 'Björn Lange',
    'blocks' => array(
        array(
            'block' => 'admin_delivery_main_form',
            'file' => 'views/blocks/admin_delivery_main_form.tpl',
            'template' => 'delivery_main.tpl'
        )
    ),
    'description' => array(
        'de' => 'Modul um einen Zuschlag f&uuml;r deutsche Inseln hinzuzuf&uuml;gen',
        'en' => 'Modul to add special delivery costs for german islands'
    ),
    'email' => 'code@b3nl.de',
    'extend' => $aB3NIslandAdditionClasses,
    'events' => array(
        'onActivate' => 'b3nl_IslandAddition_App_Setup_Events::onActivate'
    ),
    'files' => $aB3NIslandAdditionFiles,
    'id' => 'b3nl_IslandAddition',
    'settings' => array(
        array(
            'group' => 'B3N_ISLANDADDITION',
            'name' => 'aB3NGermanIslandZips',
            'type' => 'arr',
            'value' => array(
                '26579',
                '26757',
                '26571',
                '26465',
                '26548',
                '26474',
                '26486',
                '25946',
                '25938',
                '25869',
                '25859',
                '25863',
                '25845',
                '25849',
                '25890',
                '27498',
                '27499',
                '18565'
            )
        )
    ),
    'title' => 'b3nl IslandAddition',
    'url' => 'http://b3nl.de',
    'version' => '1.0.0'
);
