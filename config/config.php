<?php
/**
 * @copyright  RAD Consulting GmbH 2017
 * @author     Chris Raidler <c.raidler@rad-consulting.ch>
 * @author     Olivier Dahinden <o.dahinden@rad-consulting.ch>
 */

// Models
$GLOBALS['TL_MODELS'][\RAD\Log\Model\Log::getTable()] = 'RAD\\Log\\Model\\Log';

// Entities registered
$GLOBALS['RAD_LOG_ENTITIES'] = array();

// Cron
$GLOBALS['TL_CRON']['daily'][] = array('RAD\\Log\\Service', 'cleanLog');

// Backend stylesheet
if ('BE' == TL_MODE) {
    $GLOBALS['TL_CSS'][] = 'system/modules/rad-log/assets/css/be.css|screen';
}

