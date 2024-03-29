<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\File;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function($router)
        {
            $directory = File::allFiles(app_path().'/Http/Routes');

            foreach($directory as $file)
            {
                require_once $file->getPathName();
            }

            require_once app_path().'/Http/Helpers.php';

        });
    }
}
