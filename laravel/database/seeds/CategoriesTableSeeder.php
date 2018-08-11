<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\CsvImport;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename = public_path('file/categories.csv');
        $categoriesArr = CsvImport::csv_parse($filename, $options = array());
        //print_r($categoriesArr );

        //$categoriesArr = CsvImport::csvToArray($file);
        $faker = Faker\Factory::create();
        for ($i = 0; $i < count($categoriesArr); $i++) 
        {
            $category = Category::create($categoriesArr[$i]);
            $services = [];
            for ($j = 0; $j < 5; $j++) 
            {
                $service = new App\Models\Service([
                    'service_name' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
                    'service_description' => $faker->sentence($nbWords = 15),
                    'tags' => join(',', ['criminal law', 'counselling', 'human right', 'administration', 'corporate finance', 'copyright', 'divorce', 'property']),
                    'merchant_id' => $faker->randomElement(range(1, 50)),
                    'category_id' => $faker->randomElement(range(1, 51)),
                    'price' => $faker->randomNumber(4),
                    'service_photo_image' => $faker->randomElement(['vendor4.png', 'vendor5.png', 'vendor1.png', 'vendor3.png', 'vendor2.png']),
                ]);
                $services[$j] = $service;
            }
            $category->services()->saveMany( $services );
            $services = $category->services();
            //dd( $services );
            $services->each(function ($service) {
                //print_r( $service );
                factory(App\Models\Review::class, 10)->create(['service_id' => $service->id]);
            });
        }
    }
}