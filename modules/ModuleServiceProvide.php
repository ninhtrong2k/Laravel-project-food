<?php
namespace Modules;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\User\Src\Repositories\UserRepository;
use Modules\Product\Src\Repositories\ProductRepository;
use Modules\Category\Src\Repositories\CategoryRepository;
use Modules\User\Src\Repositories\UserRepositoryInterface;
use Modules\Product\Src\Repositories\ProductRepositoryInterface;
use Modules\Category\Src\Repositories\CategoryRepositoryInterface;

class ModuleServiceProvide extends ServiceProvider
{
    private $middlewares = [
        // 'demo' => DemoMiddleware::class
    ];
    private $commands = [
        // TestCommand::class

    ];
    public function bindingRepository()
    {
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->singleton(
           UserRepositoryInterface::class,
           UserRepository::class
        );
        $this->app->singleton(
          CategoryRepositoryInterface::class,
          CategoryRepository::class
        );

    }
    public function boot()
    {
        // Đọc tất cả các file
        $modules = $this->getModules();
        if (!empty($modules)) {
            foreach ($modules as $module) {
                $this->registerModule($module);
            }
        }
        Paginator::useBootstrapFive();
    }
    public function register()
    {
        $modules = $this->getModules();
        if (!empty($modules)) {
            foreach ($modules as $module) {
                $this->registerConfig($module);

            }
        }
        $this->registerMiddlewares();
        $this->commands($this->commands);
        $this->bindingRepository();


    }
    private function getModules()
    {
        $directories = array_map('basename', File::directories(__DIR__));
        return $directories;
    }
    private function registerModule($module)
    {
        $modulePath = __DIR__ . "/{$module}";

        Route::group([
            'namespace' => 'Modules\\' . $module . '\\Src\\Http\\Controller',
            'middleware' => 'web'
        ], function () use ($modulePath) {
            // Khai báo các route
            if (File::exists($modulePath . '/routes/web.php')) {
                $this->loadRoutesFrom($modulePath . '/routes/web.php');
            }
        });
        Route::group([
            'namespace' => 'Modules\\' . $module . '\\Src\\Http\\Controller',
            'middleware' => 'api',
            'prefix' =>'api'
        ], function () use ($modulePath) {
            if (File::exists($modulePath . '/routes/api.php')) {
                $this->loadRoutesFrom($modulePath . '/routes/api.php');
            }
        });

        // Khai báo migrations
        if (File::exists($modulePath . '/migrations')) {
            $this->loadMigrationsFrom($modulePath . '/migrations');
        }
        // Khai báo lang
        if (File::exists($modulePath . '/resources/lang')) {
            $this->loadTranslationsFrom($modulePath . '/resources/lang', strtolower($module));
            $this->loadJsonTranslationsFrom($modulePath . '/resources/lang');
        }
        // Khai báo views
        if (File::exists($modulePath . '/resources/views')) {
            $this->loadViewsFrom($modulePath . '/resources/views', strtolower($module));
        }
        // Khai báo helper
        if (File::exists($modulePath . '/helpers')) {
            $helperList = File::allFiles($modulePath . "/helpers");
            if (!empty($helperList)) {
                foreach ($helperList as $hepper) {
                    $file = $hepper->getPathName();
                    require $file;
                }
            }
        }
    }
    private function registerConfig($module)
    {
        $configPath = __DIR__ . '/' . $module . '/configs';
        if (File::exists($configPath)) {
            $configFiles = array_map('basename', File::allFiles($configPath));
            foreach ($configFiles as $config) {
                $alias = basename($config, '.php');
                $this->mergeConfigFrom($configPath . '/' . $config, $alias);
            }
        }
    }
    private function registerMiddlewares()
    {
        if (!empty($this->middlewares)) {
            foreach ($this->middlewares as $key => $middleware) {
                $this->app['router']->pushMiddlewareToGroup($key, $middleware);
            }
        }
    }
}