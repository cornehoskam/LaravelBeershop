<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        $tables = array(
            array (
                'id' => 1,
                'parent_category' => 1,
                'parent_sub_category' => null,
                'name' => "Jupiler",
                'description' => 'Men know why',
                'price' => 0.50,
                'alcohol_contents' => 5,
                'contents_ml' => 250,
                'image_url' => 'jupiler.png'
            ),
            array (
                'id' => 2,
                'parent_category' => 1,
                'parent_sub_category' => null,
                'name' => "Brand",
                'description' => 'Brewed using ancient traditions',
                'price' => 0.45,
                'alcohol_contents' => 5,
                'contents_ml' => 330,
                'image_url' => 'brand.png'
            ),
            array (
                'id' => 3,
                'parent_category' => 5,
                'parent_sub_category' => null,
                'name' => "Budweiser",
                'description' => 'American style premium lager',
                'price' => 0.40,
                'alcohol_contents' => 5,
                'contents_ml' => 330,
                'image_url' => 'budweiser.png'
            ),
            array (
                'id' => 4,
                'parent_category' => 2,
                'parent_sub_category' => null,
                'name' => "Alexander Keith's India Pale Ale",
                'description' => 'Alexander Keith\'s',
                'price' => 0.60,
                'alcohol_contents' => 5,
                'contents_ml' => 330,
                'image_url' => 'keiths.png'
            ),
            array (
                'id' => 5,
                'parent_category' => 3,
                'parent_sub_category' => null,
                'name' => "Erdinger Bock",
                'description' => 'Privatebrewery since 1886',
                'price' => 0.55,
                'alcohol_contents' => 6,
                'contents_ml' => 330,
                'image_url' => 'erdinger.png'
            ),
            array (
                'id' => 6,
                'parent_category' => 4,
                'parent_sub_category' => null,
                'name' => "Richard's Red",
                'description' => 'The pride of nova scotia',
                'price' => 0.60,
                'alcohol_contents' => 6,
                'contents_ml' => 330,
                'image_url' => 'richards.png'
            ),
        );

        DB::table('products')->insert($tables);
    }
}
