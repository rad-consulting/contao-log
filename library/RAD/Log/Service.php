<?php
/**
 * @copyright  RAD Consulting GmbH 2017
 * @author     Chris Raidler <c.raidler@rad-consulting.ch>
 * @author     Olivier Dahinden <o.dahinden@rad-consulting.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */
namespace RAD\Log;

use Contao\Config;
use RAD\Log\Model\Log;

/**
 * Class Service
 */
class Service
{
    /**
     * @return void
     */
    public function cleanLog()
    {
        Log::deleteByAge(Config::get('rad_log_age'));
    }
}
