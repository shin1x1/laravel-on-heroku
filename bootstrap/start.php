<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

use Illuminate\Cache\MemcachedConnector;
use Illuminate\Cache\MemcachedStore;
use Illuminate\Cache\Repository;
use Illuminate\Session\CacheBasedSessionHandler;

$app = new Illuminate\Foundation\Application;

/*
|--------------------------------------------------------------------------
| Detect The Application Environment
|--------------------------------------------------------------------------
|
| Laravel takes a dead simple approach to your application environments
| so you can just specify a machine name for the host that matches a
| given environment, then we will automatically detect it for you.
|
*/

$env = $app->detectEnvironment(function() {
    return getenv('LARAVEL_ENV') ?: 'local';
});

/*
|--------------------------------------------------------------------------
| Bind Paths
|--------------------------------------------------------------------------
|
| Here we are binding the paths configured in paths.php to the app. You
| should not be changing these here. If you need to change these you
| may do so within the paths.php file and they will be bound here.
|
*/

$app->bindInstallPaths(require __DIR__ . '/paths.php');

/*
|--------------------------------------------------------------------------
| Load The Application
|--------------------------------------------------------------------------
|
| Here we will load this Illuminate application. We will keep this in a
| separate location so we can isolate the creation of an application
| from the actual running of the application with a given request.
|
*/

$framework = $app['path.base'] .
    '/vendor/laravel/framework/src';

require $framework . '/Illuminate/Foundation/start.php';

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/
// for memcachier
class MemcachedWithSaslConnector extends MemcachedConnector
{
    /**
     * @return Memcached
     */
    protected function getMemcached()
    {
        $memcached = parent::getMemcached();

        $memcached->setOption(Memcached::OPT_BINARY_PROTOCOL, true);
        $memcached->setSaslAuthData(getenv('MEMCACHIER_USERNAME'), getenv('MEMCACHIER_PASSWORD'));

        return $memcached;
    }
}

Cache::extend('MemcachedWithSasl', function($app) {
    $servers = $app['config']['cache.memcached'];

    $memcached = (new MemcachedWithSaslConnector())->connect($servers);

    return new Repository(new MemcachedStore($memcached, $app['config']['cache.prefix']));
});

Session::extend('MemcachedWithSasl', function($app) {
    $minutes = $app['config']['session.lifetime'];
//        var_dump($this->app['cache']->driver($driver));exit;

    return new CacheBasedSessionHandler($app['cache']->driver('MemcachedWithSasl'), $minutes);
});

return $app;
