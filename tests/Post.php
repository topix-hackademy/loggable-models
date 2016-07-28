<?php
/**
 * Created by PhpStorm.
 * User: gab88slash
 * Date: 28/07/16
 * Time: 10:51
 */

namespace Topix\Hackademy\LoggableModels\Test;


use Illuminate\Database\Eloquent\Model as Eloquent;
use Topix\Hackademy\LoggableModels\ModelLog\ModelLogInterface;
use Topix\Hackademy\LoggableModels\ModelLog\ModelLogTrait;

class Post extends Eloquent implements ModelLogInterface
{
    use ModelLogTrait;


}