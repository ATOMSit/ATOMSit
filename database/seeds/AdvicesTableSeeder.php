<?php


use Illuminate\Database\Seeder;
use App\Advice;

class AdvicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advices = array(
            array("name" => "blog_1", "body" => "Bonjour"),
            array("name" => "blog_2", "body" => "Bonjour 2")
        );

        $option = \App\Option::where('name', 'Blog')
            ->first();
        foreach ($advices as $advice) {
            $db = Advice::where("name", $advice)
                ->first();
            if ($db === null) {
                $db = new Advice([
                    "name" => $advice['name'],
                    "body" => $advice['body']
                ]);
                $option->advices()->save($db);
            } elseif ($db !== null) {
                $db->update([
                    "name" => $advice['name'],
                    "body" => $advice['body']
                ]);
                $db->save();
            }
        }
    }
}