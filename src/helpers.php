<?php

if (! function_exists('model_log')) {

    function model_log(\Topix\Hackademy\LoggableModels\ModelLog\ModelLogInterface $model, $level, $message, array $context = array())
    {
        return app('loggable-models')->with($model)->log($level,$message,$context);
    }
}