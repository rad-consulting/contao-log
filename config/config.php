<?php
/**
 * @copyright  RAD Consulting GmbH 2017
 * @author     Chris Raidler <c.raidler@rad-consulting.ch>
 * @author     Olivier Dahinden <o.dahinden@rad-consulting.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */

// Models
$GLOBALS['TL_MODELS'][\RAD\Log\Model\Log::getTable()] = 'RAD\\Log\\Model\\Log';

// Backend stylesheet
if ('BE' == TL_MODE) {
    $GLOBALS['TL_CSS'][] = 'system/modules/rad-log/assets/css/be.css|screen';
}

