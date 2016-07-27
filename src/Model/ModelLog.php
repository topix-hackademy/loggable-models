<?php

namespace Topix\Hackademy\LoggableModels\ModelLog\Model;

/**
 * Created by PhpStorm.
 * User: gab88slash
 * Date: 27/07/16
 * Time: 15:46
 */
use Illuminate\Database\Eloquent\Model as Eloquent;

class ModelLog extends Eloquent
{

    public function modelloggable()
    {
        return $this->morphTo();
    }

}