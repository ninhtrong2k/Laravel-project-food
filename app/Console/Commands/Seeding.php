<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Seeding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:db-seed {name} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Database Seeding Module';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get the arguments passed to the command
        $name = $this->argument('name');
        $module = $this->argument('module');
        
        // Construct the full namespace for the seeder class
        $namespace = "Modules\\$module\\Seeders\\$name";

        // Call the db:seed command with the specified class
        $this->call("db:seed", [
            'class' => $namespace,
        ]);

        // Return success status
        return 0;
    }
}
