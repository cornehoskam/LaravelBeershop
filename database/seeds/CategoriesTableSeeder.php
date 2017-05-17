c<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $tables = array(
            array (
                'id' => 1,
                'name' => "Pilsener"
            ),
            array (
                'id' => 2,
                'name' => "IPA"
            ),
            array (
                'id' => 3,
                'name' => "Bock"
            ),
            array (
                'id' => 4,
                'name' => "Ale"
            ),
            array (
                'id' => 5,
                'name' => "Lager"
            ),
            array (
                'id' => 6,
                'name' => "Stout"
            ),
        );

        DB::table('categories')->insert($tables);
    }
}
