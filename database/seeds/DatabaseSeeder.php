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
        $this->call(OptionsTableSeeder::class);
        $this->call(AdvicesTableSeeder::class);
        $modules = Module::all();
        foreach ($modules as $module) {
            $name = $module->get('name');
            $this->call('Modules\\' . $name . '\\Database\\Seeders\\' . $name . 'DatabaseSeeder');
        }
    }
}
