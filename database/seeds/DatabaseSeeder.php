<?php

use Illuminate\Database\Seeder;
use Nwidart\Modules\Facades\Module;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $modules = Module::all();
        foreach ($modules as $module) {
            $name = $module->get('name');
            if (file_exists('Modules\\' . $name . '\\Database\\Seeders\\DatabaseSeeder.php')) {
                $this->call('Modules\\' . $name . '\\Database\\Seeders\\DatabaseSeeder');
            }
        }
    }
}
