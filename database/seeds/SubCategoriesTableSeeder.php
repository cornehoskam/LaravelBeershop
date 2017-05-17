<?php

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->delete();

        $tables = array(
            array (
                'id' => 1,
                'parent_category' => 1,
                'name' => "Radler"
            ),
        );

        DB::table('sub_categories')->insert($tables);
    }
}
