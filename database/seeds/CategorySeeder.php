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
            'name'=> 'Urban Kids'
        ]);

        Category::create([
            'id' => 7,
            'name'=> 'T-Shirts',
            'parent_id' => 1
        ]);

        Category::create([
            'id' => 8,
            'name'=> 'Polo Shirts',
            'parent_id' => 1
        ]);

        Category::create([
            'id' => 9,
            'name'=> 'Tank Tops',
            'parent_id' => 1
        ]);

        Category::create([
            'id' => 10,
            'name'=> 'Hoodie & Sweatshirts',
            'parent_id' => 1
        ]);

        Category::create([
            'id' => 11,
            'name'=> 'Samsung Cases',
            'parent_id' => 2
        ]);

        Category::create([
            'id' => 12,
            'name'=> 'Iphone Cases',
            'parent_id' => 2
        ]);

        Category::create([
            'id' => 13,
            'name'=> 'Huawei Cases',
            'parent_id' => 2
        ]);

        Category::create([
            'id' => 14,
            'name'=> 'Custom',
            'parent_id' => 2
        ]);

        Category::create([
            'id' => 15,
            'name'=> 'Posters',
            'parent_id' => 3
        ]);

        Category::create([
            'id' => 16,
            'name'=> 'Wallpapers',
            'parent_id' => 3
        ]);

        Category::create([
            'id' => 17,
            'name'=> 'Pictures',
            'parent_id' => 3
        ]);

        Category::create([
            'id' => 18,
            'name'=> 'Makeup Bags',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 19,
            'name'=> 'Coasters',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 20,
            'name'=> 'Thermos',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 21,
            'name'=> 'Mugs',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 22,
            'name'=> 'Bags',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 23,
            'name'=> 'Backpacks',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 24,
            'name'=> 'Clocks',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 25,
            'name'=> 'Sacks',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 26,
            'name'=> 'Notebooks',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 27,
            'name'=> 'Magnets',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 28,
            'name'=> 'Gifts For Him',
            'parent_id' => 5
        ]);

        Category::create([
            'id' => 29,
            'name'=> 'Gifts For Her',
            'parent_id' => 5
        ]);

        Category::create([
            'id' => 30,
            'name'=> 'Kids T-Shirts',
            'parent_id' => 6
        ]);

        Category::create([
            'id' => 31,
            'name'=> 'Kids One-Pieces',
            'parent_id' => 6
        ]);

        Category::create([
            'id' => 32,
            'name'=> 'Kids Clocks',
            'parent_id' => 6
        ]);

        Category::create([
            'id' => 33,
            'name'=> 'Kids Posters',
            'parent_id' => 6
        ]);

        Category::create([
            'id' => 34,
            'name'=> 'Kids Mugs',
            'parent_id' => 6
        ]);

        Category::create([
            'id' => 35,
            'name'=> 'Kids Kits',
            'parent_id' => 6
        ]);

        Category::create([
            'id' => 36,
            'name'=> 'Kids Bibs',
            'parent_id' => 6
        ]);
    }
}
