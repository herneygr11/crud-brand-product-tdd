<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();

        return [
            "name"              => $name,
            "size"              => "L",
            "observations"      => $this->faker->sentence(),
            "stock"             => $this->faker->numberBetween(1, 200),
            "slug"              => Str::slug($name),
            "shipment"          => Date::now(),
            "brand_id"          => Brand::factory()->create()->id,
        ];
    }
}
