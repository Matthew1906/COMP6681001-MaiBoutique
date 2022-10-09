<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("products")->insert(
            Arr::map(array(
                "baseball-hat", "fedora-hat",
                "black-shirt", "blue-shirt",
                "black-skirt", "blue-skirt",
                "black-shoes", "brown-shoes",
                "blue-sweater", "gray-sweater",
                "brown-pants", "gray-pants",
                "brown-tshirt", "red-tshirt",
                "green-dress", "orange-dress",
                "green-socks", "red-socks",
                "white-hoodie", "yellow-hoodie"
            ), function(string $filename){
                $image = file_get_contents(resource_path("images/".$filename.".jpg"));
                return  [
                    "name"=>Str::title(Str::of($filename)->replace("-", " ")),
                    "image"=>base64_encode($image),
                    "description"=>"High quality ".Str::title(Str::of($filename)->replace("-", " "))." , Size ".fake()->randomElement(['S', 'M', 'L', 'XL']),
                    "price"=>1000*fake()->numberBetween(2, 400),
                    "stock"=>fake()->numberBetween(1, 100),
                    'created_at'=> Carbon::now()->toDateTimeString(),
                    'updated_at'=> Carbon::now()->toDateTimeString()
                ];
            })
        );
    }
}
