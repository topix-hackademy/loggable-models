# Loggable Models

This package provide a easy way to add a log for a Eloquent entity.

## Installation

`composer require topix-hackademy/loggable-models`

in config/app.php

    'providers' => [
        ..
        Topix\Hackademy\LoggableModels\Laravel\ServiceProvider::class,
        ..
         ]

then launch 
    
    php artisan vendor:publish

everything is ready.


## Usage

Set the model you want to log like this


    class Post extends Eloquent implements ModelLogInterface
    {
        use ModelLogTrait;
    
    
    }
    
    
Now on an instance of that model you can use any log method in the logger interface

    $post->alert($message);

    public function emergency($message, array $context = array());
    public function alert($message, array $context = array());
    public function critical($message, array $context = array());
    public function error($message, array $context = array());
    public function warning($message, array $context = array());
    public function notice($message, array $context = array());
    public function info($message, array $context = array());
    public function debug($message, array $context = array());
    
    
to retrieve the logs you can use the plural form of those methods as get:

    $post->alerts()
    
as well as there are the scopes for easy quering the database for every level.

    scopeHasEmergencies()
    ...
     
    Post::hasEmergencies()->get()
