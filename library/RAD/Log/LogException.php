<?php
/**
 * @copyright  RAD Consulting GmbH 2017
 * @author     Chris Raidler <c.raidler@rad-consulting.ch>
 * @author     Olivier Dahinden <o.dahinden@rad-consulting.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */
namespace RAD\Log;

use Exception;

/**
 * Class LogException
 */
class LogException extends Exception
{
    /**
     * @var string
     */
    protected $data;

    /**
     * LogException constructor.
     *
     * @param string         $message
     * @param int            $code
     * @param Exception|null $previous
     * @param string|null    $data
     */
    public function __construct($message, $code, Exception $previous = null, $data = null)
    {
        parent::__construct($message, $code, $previous);
        $this->data = $data;
    }

    /**
     * @return null|string
     */
    public function getData()
    {
        return $this->data;
    }
}
