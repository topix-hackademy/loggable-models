<?php

namespace Topix\Hackademy\LoggableModels\Model;

/**
 * Created by PhpStorm.
 * User: gab88slash
 * Date: 27/07/16
 * Time: 15:46
 */
use Illuminate\Database\Eloquent\Model as Eloquent;

class ModelLog extends Eloquent
{

    protected $fillable = ['level', 'message', 'context'];

    protected $casts = [
        'context' => 'array',
    ];

    public function modelloggable()
    {
        return $this->morphTo();
    }

    /**
     * @return mixed
     */
    public function scopeOfLevel($query,$level)
    {
        $query->where('level', $level);
    }

}