<?php
/**
 * Created by PhpStorm.
 * User: gab88slash
 * Date: 27/07/16
 * Time: 19:00
 */

namespace Topix\Hackademy\LoggableModels\ModelLog;

use Topix\Hackademy\LoggableModels\Model\ModelLog;
use Topix\Hackademy\LoggableModels\ModelLogHandler;

trait ModelLogConvenienceTrait
{

    /**
     * @return mixed
     */
    public function logs()
    {
        return $this->morphMany(ModelLog::class, 'modelloggable');

    }

    /**
     * @return mixed
     */
    public function getLogsByLevel($level)
    {
        return $this->logs()->ofLevel($level)->get();

    }

    /**
     * @return mixed
     */
    public function emergencies()
    {
        return $this->getLogsByLevel(ModelLogHandler::EMERGENCY);
    }

    /**
     * @return mixed
     */
    public function alerts()
    {
        return $this->getLogsByLevel(ModelLogHandler::ALERT);
    }

    /**
     * @return mixed
     */
    public function criticals()
    {
        return $this->getLogsByLevel(ModelLogHandler::CRITICAL);

    }

    /**
     * @return mixed
     */
    public function errors()
    {
        return $this->getLogsByLevel(ModelLogHandler::ERROR);

    }

    /**
     * @return mixed
     */
    public function warnings()
    {
        return $this->getLogsByLevel(ModelLogHandler::WARNING);

    }


    /**
     * @return mixed
     */
    public function notices()
    {
        return $this->getLogsByLevel(ModelLogHandler::NOTICE);
    }


    /**
     * @return mixed
     */
    public function infos()
    {
        return $this->getLogsByLevel(ModelLogHandler::INFO);
    }


    /**
     * @return mixed
     */
    public function debugs()
    {
        return $this->getLogsByLevel(ModelLogHandler::DEBUG);
    }
}
