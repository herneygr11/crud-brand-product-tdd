<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                "name"  => "Apple",
                "slug"  => Str::slug("Apple"),
            ],
            [
                "name"  => "Huawei",
                "slug"  => Str::slug("Huawei"),
            ],
            [
                "name"  => "Samsung",
                "slug"  => Str::slug("Samsung"),
            ],
            [
                "name"  => "Xiaomi",
                "slug"  => Str::slug("Xiaomi"),
            ],
            [
                "name"  => "Honor",
                "slug"  => Str::slug("Honor"),
            ],
        ];

        echo "Creating brands items " . "\n";
        foreach ( $brands as $brand ){
            echo "\t" . "Creating brand " . $brand[ 'name' ] . "\n";
            Brand::updateOrCreate(
                [
                    "slug" => $brand[ 'slug' ],
                ],
                [
                    "name" => $brand[ 'name' ],
                    "slug" => $brand[ 'slug' ],
                ]
            );
            echo "\t" . "Created brand " . $brand[ 'name' ] . "\n";
        }
        echo "Created brands items" . "\n";
    }
}
