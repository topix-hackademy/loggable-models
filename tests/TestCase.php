<?php
/**
 * Created by PhpStorm.
 * User: gab88slash
 * Date: 28/07/16
 * Time: 09:55
 */

namespace Topix\Hackademy\LoggableModels\Test;


use App\Console\Kernel;
use Illuminate\Filesystem\ClassFinder;
use Illuminate\Filesystem\Filesystem;
use Topix\Hackademy\LoggableModels\Laravel\ServiceProvider;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function setUp()
    {
        parent::setUp();

        $this->app = $this->createApplication();

        $this->app['config']->set('database.default','sqlite');
        $this->app['config']->set('database.connections.sqlite.database', ':memory:');

        $this->migrate();
    }


    public function migrate()
    {
        $fileSystem = new Filesystem;
        $classFinder = new ClassFinder;

        foreach($fileSystem->files(__DIR__ . "/../src/database/migrations") as $file)
        {
            $fileSystem->requireOnce($file);
            $migrationClass = $classFinder->findClass($file);

            (new $migrationClass)->up();
        }

        foreach($fileSystem->files(__DIR__ . "/migrations") as $file)
        {
            $fileSystem->requireOnce($file);
            $migrationClass = $classFinder->findClass($file);

            (new $migrationClass)->up();
        }
    }

    /**
     * Boots the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../vendor/laravel/laravel/bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        $app->register(ServiceProvider::class);

        return $app;
    }

    protected function makePost()
    {
        $post = new Post();
        $post->text = 'Some title';
        $post->save();
        return $post;
    }

}