<?php
/**
 * Created by PhpStorm.
 * User: gab88slash
 * Date: 27/07/16
 * Time: 19:07
 */

namespace Topix\Hackademy\LoggableModels\ModelLog;


use Topix\Hackademy\LoggableModels\ModelLogHandler;

trait ModelLogScopesTrait
{

    /**
     * @return mixed
     */
    public function scopeHasLogByLevel($query, $level)
    {
        return $query->whereHas('logs', function ($query) use ($level) {
            $query->where('level', $level);
        });
    }
    /**
     * @return mixed
     */
    public function scopeHasEmergencies($query)
    {
        return $query->hasLogByLevel(ModelLogHandler::EMERGENCY);
    }

    /**
     * @return mixed
     */
    public function scopeHasAlerts($query)
    {
        return $query->hasLogByLevel(ModelLogHandler::ALERT);
    }

    /**
     * @return mixed
     */
    public function scopeHasCriticals($query)
    {
        return $query->hasLogByLevel(ModelLogHandler::CRITICAL);
    }

    /**
     * @return mixed
     */
    public function scopeHasErrors($query)
    {
        return $query->hasLogByLevel(ModelLogHandler::ERROR);
    }

    /**
     * @return mixed
     */
    public function scopeHasWarnings($query)
    {
        return $query->hasLogByLevel(ModelLogHandler::WARNING);
    }


    /**
     * @return mixed
     */
    public function scopeHasNotices($query)
    {
        return $query->hasLogByLevel(ModelLogHandler::NOTICE);
    }


    /**
     * @return mixed
     */
    public function scopeHasInfos($query)
    {
        return $query->hasLogByLevel(ModelLogHandler::INFO);
    }


    /**
     * @return mixed
     */
    public function scopeHasDebugs($query)
    {
        return $query->hasLogByLevel(ModelLogHandler::DEBUG);
    }
}