<?php


namespace Topix\Hackademy\LoggableModels\Test;

use Topix\Hackademy\LoggableModels\Model\ModelLog;
use Topix\Hackademy\LoggableModels\ModelLogHandler;

class ModelLogHandlerTest extends TestCase
{
    /**
     * @test
     */
    public function should_create_a_model_log()
    {
        $post = $this->makePost();

        $message = "Tutto rotto";

        $post->alert($message);

        $this->assertContainsOnlyInstancesOf(ModelLog::class, $post->alerts());
    }
}
