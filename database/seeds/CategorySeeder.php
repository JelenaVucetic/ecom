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
            'name'=> 'Urban clothing',
            'image' => '1596109198.jpg',
            'cover_image' => '1596109198second.jpg'
        ]);
        Category::create([
            'id' => 5,
            'name'=> 'Cases',
            'image' => '1596110174.jpg',
            'cover_image' => '1596110174second.jpg'
        ]);
        Category::create([
            'id' => 3,
            'name'=> 'Wall ART',
            'image' => '1596110212.jpg',
            'cover_image' => '1596110212second.jpg'
        ]);
        Category::create([
            'id' => 4,
            'name'=> 'Accesories'
        ]);

        Category::create([
            'id' => 33,
            'name'=> 'Urban Kids'
        ]);

        Category::create([
            'id' => 6,
            'name'=> 'T-Shirts',
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
            'name'=> 'Hoodies & Sweatshirts',
            'parent_id' => 1
        ]);

        Category::create([
            'id' => 10,
            'name'=> 'Samsung Cases',
            'parent_id' => 5
        ]);

        Category::create([
            'id' => 11,
            'name'=> 'Iphone Cases',
            'parent_id' => 5
        ]);

        Category::create([
            'id' => 12,
            'name'=> 'Huawei Cases',
            'parent_id' => 5
        ]);

        Category::create([
            'id' => 13,
            'name'=> 'Custom',
            'parent_id' => 5
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
            'name'=> 'Canvas Art',
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
            'name'=> 'Thermoses',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 20,
            'name'=> 'Mugs',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 21,
            'name'=> 'Tote Bags',
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
            'name'=> 'Gift Bags',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 25,
            'name'=> 'Notebooks',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 26,
            'name'=> 'Magnets',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 27,
            'name'=> 'Towels',
            'parent_id' => 4
        ]);

        Category::create([
            'id' => 28,
            'name'=> 'Kids T-Shirts',
            'parent_id' => 33
        ]);

        Category::create([
            'id' => 29,
            'name'=> 'Kids One-Pieces',
            'parent_id' => 33
        ]);

        Category::create([
            'id' => 30,
            'name'=> 'Kids Clocks',
            'parent_id' => 33
        ]);

        Category::create([
            'id' => 31,
            'name'=> 'Kids Posters',
            'parent_id' => 33
        ]);

        Category::create([
            'id' => 32,
            'name'=> 'Kids Mugs',
            'parent_id' => 33
        ]);


        Category::create([
            'id' => 34,
            'name'=> 'Kids Bibs',
            'parent_id' => 33
        ]);
        Category::create([
            'id' => 35,
            'name'=> 'Puzzles',
            'parent_id' => 4
        ]);
        Category::create([
            'id' => 36,
            'name'=> 'Bottle Openers',
            'parent_id' => 4
        ]);
        Category::create([
            'id' => 2,
            'name'=> 'Masks',
        ]);

    }
}
