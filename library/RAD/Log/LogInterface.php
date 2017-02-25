<?php
/**
 * @copyright  RAD Consulting GmbH 2017
 * @author     Chris Raidler <c.raidler@rad-consulting.ch>
 * @author     Olivier Dahinden <o.dahinden@rad-consulting.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */
namespace RAD\Log;

use RAD\Log\Model\LogModel as Log;

/**
 * Interface LogInterface
 */
interface LogInterface
{
    /**
     * @param string      $message
     * @param int         $level
     * @param string|null $data
     * @return $this
     */
    public function log($message, $level = Log::INFO, $data = null);
}
