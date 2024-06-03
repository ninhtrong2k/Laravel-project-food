<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Seeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-seeder {name} {module}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Seeder Module';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $module = $this->argument('module');
    
        // Check if the module exists
        if (!File::exists(base_path('modules/' . $module))) {
            return $this->error("Module does not exist");
        }
        
        $seederPath = base_path('modules/' . $module . '/Seeders');
    
        // Create the seeder directory if it doesn't exist
        if (!File::exists($seederPath)) {
            File::makeDirectory($seederPath, 0775, true, true);
        }
    
        $seederFile = app_path('Console/Commands/Templates/Seeder.txt');
    
        // Check if the template seeder file exists
        if (!File::exists($seederFile)) {
            return $this->error("Seeder template file does not exist");
        }
    
        // Get the content of the seeder template file
        $seederContent = File::get($seederFile);
    
        // Replace the placeholder with the actual seeder name (excluding 'Seeder')
        $seederContent = str_replace('{name}', $name, $seederContent);
        $seederContent = str_replace('{module}', $module, $seederContent);
    
        // Define the new seeder file path (ensure it ends with 'Seeder.php')
        $newSeederFilePath = $seederPath . '/' . $name . '.php';
    
        // Create the new seeder file if it doesn't exist
        if (!File::exists($newSeederFilePath)) {
            File::put($newSeederFilePath, $seederContent);
            return $this->info("Seeder: $name in Module: $module created successfully");
        } else {
            return $this->error("Seeder already exists");
        }
    }
    
    
    
}
