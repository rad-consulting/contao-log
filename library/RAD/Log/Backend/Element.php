<?php
/**
 * @copyright  RAD Consulting GmbH 2017
 * @author     Chris Raidler <c.raidler@rad-consulting.ch>
 * @author     Olivier Dahinden <o.dahinden@rad-consulting.ch>
 */
namespace RAD\Log\Backend;

use Contao\Backend;
use Contao\Config;
use Contao\System;
use RAD\Log\Model\LogModel as Log;

/**
 * Class Element
 */
class Element extends Backend
{
    /**
     * @param array $row
     * @return string
     */
    public function showLog(array &$row)
    {
        System::loadLanguageFile('tl_rad_log');

        $class = 'limit_height';

        if (!Config::get('doNotCollapse')) {
            $class .= ' h64';
        }

        if (empty($row['data'])) {
            return implode('', array(
                '<div>' . date('Y-m-d H:i:s', $row['tstamp']) . ' - ' . $GLOBALS['TL_LANG']['tl_rad_log']['level'][$row['level']] . '</div>',
                '<div class="rad_log"><p class="level_' . $row['level'] . '"><strong>' . $row['message'] . '</strong></p></div>',
            ));
        }

        return implode('', array(
            '<div>' . date('Y-m-d H:i:s', $row['tstamp']) . ' - ' . $GLOBALS['TL_LANG']['tl_rad_log']['level'][$row['level']] . '</div>',
            '<div class="' . trim($class) . ' rad_log"><p class="level_' . $row['level'] . '"><strong>' . $row['message'] . '</strong></p><pre>' . htmlentities($row['data']) . '</pre></div>',
        ));
    }
}
