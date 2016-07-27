<?php
/**
 * Created by PhpStorm.
 * User: gab88slash
 * Date: 27/07/16
 * Time: 14:48
 */

namespace Topix\Hackademy\LoggableModels\ModelLog;


use Monolog\Handler\PsrHandler;
use Psr\Log\LoggerInterface;

interface ModelLogInterface extends LoggerInterface
{

    public function logs();

}