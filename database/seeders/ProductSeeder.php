<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
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
        $products = [
            [
                "name"              => "iApple 11",
                "size"              => "L",
                "observations"      => "El iPhone 11 refleja el compromiso continuo de Apple con el medio ambiente.",
                "stock"             => 10,
                "slug"              => Str::slug("iApple"),
                "shipment"          => Date::now(),
                "brand_id"          => 1,
            ]
        ];

        echo "Creating products items " . "\n";
        foreach ( $products as $product ){
            echo "\t" . "Creating product " . $product[ 'name' ] . "\n";
            Product::updateOrCreate(
                [
                    "name" => $product[ 'name' ],
                    "slug" => $product[ 'slug' ],
                ],
                [
                    "name"              => $product[ 'name' ],
                    "size"              => $product[ 'size' ],
                    "observations"      => $product[ 'observations' ],
                    "stock"             => $product[ 'stock' ],
                    "slug"              => $product[ 'slug' ],
                    "shipment"          => $product[ 'shipment' ],
                    "brand_id"          => $product[ 'brand_id' ],
                ]
            );
            echo "\t" . "Created product " . $product[ 'name' ] . "\n";
        }
        echo "Created products items" . "\n";
    }
}
