<?php

namespace Topix\Hackademy\LoggableModels\ModelLog;
use Topix\Hackademy\LoggableModels\ModelLog\Model\ModelLog;
use Topix\Hackademy\LoggableModels\ModelLogHandler;

/**
 * Created by PhpStorm.
 * User: gab88slash
 * Date: 27/07/16
 * Time: 14:46
 */
trait ModelLogTrait
{
    use ModelLogConvenienceTrait, ModelLogScopesTrait;
    /**
     * System is unusable.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function emergency($message, array $context = array())
    {
        return $this->log(ModelLogHandler::EMERGENCY,$message,$context);
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function alert($message, array $context = array())
    {
        return $this->log(ModelLogHandler::ALERT,$message,$context);
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function critical($message, array $context = array())
    {
        return $this->log(ModelLogHandler::CRITICAL,$message,$context);
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function error($message, array $context = array())
    {
        return $this->log(ModelLogHandler::ERROR,$message,$context);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function warning($message, array $context = array())
    {
        return $this->log(ModelLogHandler::WARNING,$message,$context);
    }

    /**
     * Normal but significant events.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function notice($message, array $context = array())
    {
        return $this->log(ModelLogHandler::NOTICE,$message,$context);
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function info($message, array $context = array())
    {
        return $this->log(ModelLogHandler::INFO,$message,$context);
    }

    /**
     * Detailed debug information.
     *
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function debug($message, array $context = array())
    {
        return $this->log(ModelLogHandler::DEBUG,$message,$context);
    }


    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     *
     * @return null
     */
    public function log($level, $message, array $context = array()){

        return model_log($this, $level, $message, $context);
        
    }
}