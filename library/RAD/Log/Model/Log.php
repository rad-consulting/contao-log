<?php
/**
 * @copyright  RAD Consulting GmbH 2017
 * @author     Chris Raidler <c.raidler@rad-consulting.ch>
 * @author     Olivier Dahinden <o.dahinden@rad-consulting.ch>
 */
namespace RAD\Log\Model;

use Contao\Database;
use Contao\Model;

/**
 * Class Log
 *
 * @property int    $id
 * @property int    $pid
 * @property int    $tstamp
 * @property string $ptable
 * @property string $message
 * @property string $level
 * @property string $data
 */
class Log extends Model
{
    /**
     * @const int
     */
    const EMERGENCY = 64;
    const ALERT = 32;
    const CRITICAL = 16;
    const ERROR = 8;
    const WARNING = 4;
    const NOTICE = 2;
    const INFO = 1;
    const DEBUG = 0;

    /**
     * @var string
     */
    public static $strTable = 'tl_rad_log';

    /**
     * @param int $days
     * @return int
     */
    public static function deleteByAge($days = 7)
    {
        $stmt = Database::getInstance()->prepare('DELETE FROM ' . static::getTable() . ' WHERE `tstamp` < UNIX_TIMESTAMP() - ?');
        $res = $stmt->execute($days * 24 * 3600);

        return $res->numRows;
    }

    /**
     * @param Model $model
     * @return int
     */
    public static function deleteByModel(Model $model)
    {
        $stmt = Database::getInstance()->prepare('DELETE FROM ' . static::getTable() . ' WHERE `pid` = ? AND `ptable` = ?');
        $res = $stmt->execute($model->id, $model::getTable());

        return $res->numRows;
    }

    /**
     * @param Model       $model
     * @param string      $message
     * @param int         $level
     * @param string|null $data
     * @return static
     */
    public static function factory(Model $model, $message, $level = self::INFO, $data = null)
    {
        $instance = new static();
        $instance->pid = $model->id;
        $instance->ptable = $model::getTable();
        $instance->tstamp = time();
        $instance->message = strip_tags($message);
        $instance->level = $level;
        $instance->data = $data;

        return $instance;
    }
}
