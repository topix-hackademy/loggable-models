<?php
/**
 * Created by PhpStorm.
 * User: gab88slash
 * Date: 27/07/16
 * Time: 14:46
 */

namespace Topix\Hackademy\LoggableModels;


use Psr\Log\LoggerInterface;
use Topix\Hackademy\LoggableModels\ModelLog\ModelLogInterface;

class ModelLogHandler implements LoggerInterface
{
    /**
     * Detailed debug information
     */
    const DEBUG = 100;
    /**
     * Interesting events
     *
     * Examples: User logs in, SQL logs.
     */
    const INFO = 200;
    /**
     * Uncommon events
     */
    const NOTICE = 250;
    /**
     * Exceptional occurrences that are not errors
     *
     * Examples: Use of deprecated APIs, poor use of an API,
     * undesirable things that are not necessarily wrong.
     */
    const WARNING = 300;
    /**
     * Runtime errors
     */
    const ERROR = 400;
    /**
     * Critical conditions
     *
     * Example: Application component unavailable, unexpected exception.
     */
    const CRITICAL = 500;
    /**
     * Action must be taken immediately
     *
     * Example: Entire website down, database unavailable, etc.
     * This should trigger the SMS alerts and wake you up.
     */
    const ALERT = 550;
    /**
     * Urgent alert.
     */
    const EMERGENCY = 600;



    protected $levelMapping = [

        self::DEBUG => 'debug',
        self::INFO => 'info',
        self::NOTICE => 'notice',
        self::WARNING => 'warning',
        self::ERROR => 'error',
        self::CRITICAL => 'critical',
        self::ALERT => 'alert',
        self::EMERGENCY => 'emergency'
        ];

    /**
     * @var ModelLogInterface
     */
    protected $model;

    /**
     * @param ModelLogInterface $model
     * @return $this
     */
    public function with(ModelLogInterface $model)
    {
        $this->model = $model;
        return $this;
    }

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
        return $this->log(static::EMERGENCY,$message,$context);
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
        return $this->log(static::ALERT,$message,$context);
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
        return $this->log(static::CRITICAL,$message,$context);
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
        return $this->log(static::ERROR,$message,$context);
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
        return $this->log(static::WARNING,$message,$context);
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
        return $this->log(static::NOTICE,$message,$context);
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
        return $this->log(static::INFO,$message,$context);
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
        return $this->log(static::DEBUG,$message,$context);
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function log($level, $message, array $context = array())
    {

        app('log')->log($this->getPrintableLevel($level), $message, $context);

        $this->model->logs()->create( [
            'level' => $level,
            'message' => $message,
            'context' => $context
        ]);
        return $this;
    }

    /**
     * Returns the printable version of the level
     * @param $level
     * @return mixed
     */
    public function getPrintableLevel($level)
    {
        return $this->levelMapping[$level];
    }
}