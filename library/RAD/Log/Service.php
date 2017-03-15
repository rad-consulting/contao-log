<?php
/**
 * @copyright  RAD Consulting GmbH 2017
 * @author     Chris Raidler <c.raidler@rad-consulting.ch>
 * @author     Olivier Dahinden <o.dahinden@rad-consulting.ch>
 */
namespace RAD\Log;

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
        Log::deleteByAge(7);
    }
}
