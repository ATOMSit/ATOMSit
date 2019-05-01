<?php


use Illuminate\Database\Seeder;
use App\Option;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options_name = [
            'Blog'
        ];
        foreach ($options_name as $option_name) {
            $option = Option::where("name", $option_name)
                ->first();
            if ($option === null) {
                $option = new Option([
                    'name' => $option_name
                ]);
                $option->save();
            }
        }
    }
}