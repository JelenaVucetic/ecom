<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Category::truncate();

        Category::create([
            'id' => 1,
            'name'=> 'Urban clothing'
        ]);
        Category::create([
            'id' => 2,
            'name'=> 'Cases'
        ]);
        Category::create([
            'id' => 3,
            'name'=> 'Wall ART'
        ]);
        Category::create([
            'id' => 4,
            'name'=> 'Accesories'
        ]);
        Category::create([
            'id' => 5,
            'name'=> 'Gifts'
        ]);

        Category::create([
            'id' => 6,
            'name'=> 'T-shirts',
            'parent_id' => 1
        ]);

        Category::create([
            'id' => 7,
            'name'=> 'Polo Shirts',
            'parent_id' => 1
        ]);

        Category::create([
            'id' => 8,
            'name'=> 'Tank Tops',
            'parent_id' => 1
        ]);

        Category::create([
            'id' => 9,
            'name'=> 'Hoodie & Sweatshirts',
            'parent_id' => 1
        ]);

        Category::create([
            'id' => 10,
            'name'=> 'Samsung Cases',
            'parent_id' => 2
        ]);

        Category::create([
            'id' => 11,
            'name'=> 'Iphone Cases',
            'parent_id' => 2
        ]);

        Category::create([
            'id' => 12,
            'name'=> 'Huawei Cases',
            'parent_id' => 2
        ]);

        Category::create([
            'id' => 13,
            'name'=> 'Custom',
            'parent_id' => 2
        ]);

        Category::create([
            'id' => 14,
            'name'=> 'Posters',
            'parent_id' => 3
        ]);

        Category::create([
            'id' => 15,
            'name'=> 'Wallpapers',
            'parent_id' => 3
        ]);

        Category::create([
            'id' => 16,
            'name'=> 'Pictures',
            'parent_id' => 3
        ]);

        Category::create([
            'id' => 17,
            'name'=> 'Makeup Bags',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 18,
            'name'=> 'Coasters',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 19,
            'name'=> 'Thermos',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 20,
            'name'=> 'Mugs',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 21,
            'name'=> 'Bags',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 22,
            'name'=> 'Backpacks',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 23,
            'name'=> 'Clocks',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 24,
            'name'=> 'Sacks',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 25,
            'name'=> 'Notes',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 26,
            'name'=> 'Magnets',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 27,
            'name'=> 'Gifts For Him',
            'parent_id' => 5
        ]);

        Category::create([
            'id' => 28,
            'name'=> 'Gifts For Her',
            'parent_id' => 5
        ]);
    }
}
