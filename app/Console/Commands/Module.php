<?php

namespace App\Console\Commands;

use Illuminate\Cache\Repository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Module extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create module CLI';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        if (File::exists(base_path('modules/' . $name))) {
            $this->error("Module already exists");
        } else {
            File::makeDirectory(base_path('modules/' . $name), 0775, true, true);
            // config
            $configFolder = base_path('modules/' . $name . '/config');

            if (!File::exists($configFolder)) {
                File::makeDirectory($configFolder, 0775, true, true);
            }

            // helper
            $helperFolder = base_path('modules/' . $name . '/helpers');
            if (!File::exists($helperFolder)) {
                File::makeDirectory($helperFolder, 0775, true, true);
            }

            // routes
            $routeFolder = base_path('modules/' . $name . '/routes');
            if (!File::exists($routeFolder)) {
                File::makeDirectory($routeFolder, 0775, true, true);
                // Tạo file web .php 
                $routesWebFile = base_path('modules/' . $name . '/routes/web.php');
                if (!File::exists($routesWebFile)) {
                    $routeContent = File::get(app_path('Console/Commands/Templates/Route.txt'));
                    $routeContent = str_replace('{module}',strtolower($name),$routeContent);
                    File::put($routesWebFile, $routeContent);
                }
                // Tạo file api .php 
                $routesApiFile = base_path('modules/' . $name . '/routes/api.php');
                if (!File::exists($routesApiFile)) {
                    $routeContent = File::get(app_path('Console/Commands/Templates/Route.txt'));
                    $routeContent = str_replace('{module}',strtolower($name),$routeContent);
                    File::put($routesApiFile, $routeContent);
                }
            }
            // migrations
            $migrationFolder = base_path('modules/' . $name . '/migrations');
            if (!File::exists($migrationFolder)) {
                File::makeDirectory($migrationFolder, 0775, true, true);
            }

            // resources
            $resourceFolder = base_path('modules/' . $name . '/resources');
            if (!File::exists($resourceFolder)) {
                File::makeDirectory($resourceFolder, 0775, true, true);

                //lang
                $langFolder = base_path('modules/' . $name . '/resources/lang');
                if (!File::exists($langFolder)) {
                    File::makeDirectory($langFolder, 0775, true, true);
                }

                //view
                $viewFolder = base_path('modules/' . $name . '/resources/views');
                if (!File::exists($viewFolder)) {
                    File::makeDirectory($viewFolder, 0775, true, true);
                }
            }

            // Src
            $srcFolder = base_path('modules/' . $name . '/src');
            if (!File::exists($srcFolder)) {
                File::makeDirectory($srcFolder, 0775, true, true);
                // Commands
                $commandsFolder = base_path('modules/' . $name . '/src/Commands');
                if (!File::exists($commandsFolder)) {
                    File::makeDirectory($commandsFolder, 0775, true, true);
                }
                //Http
                $httpFolder = base_path('modules/' . $name . '/src/Http');
                if (!File::exists($httpFolder)) {
                    File::makeDirectory($httpFolder, 0775, true, true);
                    // Controller
                    $controllerFolder = base_path('modules/' . $name . '/src/Http/Controller');
                    if (!File::exists($controllerFolder)) {
                        File::makeDirectory($controllerFolder, 0775, true, true);
                    }
                    // Middlewares
                    $middlewareFolder = base_path('modules/' . $name . '/src/Http/Middlewares');
                    if (!File::exists($middlewareFolder)) {
                        File::makeDirectory($middlewareFolder, 0775, true, true);
                    }

                }
                // Model
                $modelFolder = base_path('modules/' . $name . '/src/Models');
                if (!File::exists($modelFolder)) {
                    File::makeDirectory($modelFolder, 0775, true, true);
                }
                // Repositories
                $repositoriesFolder = base_path('modules/' . $name . '/src/Repositories');
                if (!File::exists($repositoriesFolder)) {
                    File::makeDirectory($repositoriesFolder, 0775, true, true);
                    // Module Repository 
                    $moduleRepositoriesFile = base_path('modules/' . $name . '/src/Repositories/' . $name . 'Repository.php');
                    if (!File::exists($moduleRepositoriesFile)) {
                        $moduleRepositoriesFileContent = file_get_contents(app_path('Console/Commands/Templates/ModuleRepository.txt')); // Fixed namespace backslashes
                        $moduleRepositoriesFileContent = str_replace('{module}', $name, $moduleRepositoriesFileContent);
                        File::put($moduleRepositoriesFile, $moduleRepositoriesFileContent);
                    }
                    // RepositoryInterface
                    $moduleRepositoriesInterfaceFile = base_path('modules/' . $name . '/src/Repositories/' . $name . 'RepositoryInterface.php');
                    if (!File::exists($moduleRepositoriesInterfaceFile)) {
                        $moduleRepositoriesInterfaceFileContent = file_get_contents(app_path('Console/Commands/Templates/ModuleRepositoryInterface.txt'));
                        $moduleRepositoriesInterfaceFileContent = str_replace('{module}', $name, $moduleRepositoriesInterfaceFileContent);
                        File::put($moduleRepositoriesInterfaceFile, $moduleRepositoriesInterfaceFileContent);
                    }
                }
            }


            $this->info('Module created successfully');
        }

    }
}
