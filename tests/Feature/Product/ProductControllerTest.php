<?php

namespace Tests\Feature\Product;

use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function an_unauthenticated_user_cannot_see_the_product_view()
    {
        $this->get(route('products.index'))
        ->assertStatus(302)
        ->assertRedirect("login");
    }

    /**
     * @return void
     * @test
     */
    public function an_authenticated_user_can_see_the_product_index_view()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $this
            ->get(route('products.index'))
            ->assertStatus(200)
            ->assertViewIs("products.index")
            ->assertViewHas("products");
    }

    /**
     * @return void
     * @test
     */
    public function an_unauthenticated_user_cannot_see_the_product_create_view()
    {
        $this->get(route('products.create'))
        ->assertStatus(302)
        ->assertRedirect("login");
    }

    /**
     * @return void
     * @test
     */
    public function an_authenticated_user_can_see_the_product_create_view()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $this
            ->get(route('products.create'))
            ->assertStatus(200)
            ->assertViewIs("products.create");
    }

        /**
     * @return void
     * @test
     */
    public function an_unauthenticated_user_cannot_create_products()
    {
        $this->post(route('products.store'), [])
        ->assertStatus(302)
        ->assertRedirect("login");
    }

    /**
     * @return void
     * @test
     */
    public function an_authenticated_user_can_create_products()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $brand = Brand::factory()->create();

        $data = [
            "name"              => "iPhone 11",
            "size"              => "L",
            "observations"      => "El iPhone 11 refleja el compromiso continuo de Apple con el medio ambiente.",
            "stock"             => 10,
            "shipment"          => Date::now(),
            "brand_id"          => $brand->id,
        ];

        $this
            ->post(route('products.store'), $data)
            ->assertStatus(302)
            ->assertRedirect(route("products.index"));

        $this->assertDatabaseHas('products', [
            "name"      => $data["name"],
            "size"      => $data["size"],
            "stock"     => $data["stock"],
        ]);
    }

    /**
     * @return void
     * @test
     */
    public function an_unauthenticated_user_cannot_see_the_product_edit_view()
    {
        $product = Product::factory()->create();

        $this->get(route('products.edit', $product->slug))
        ->assertStatus(302)
        ->assertRedirect("login");
    }

    /**
     * @return void
     * @test
     */
    public function an_authenticated_user_can_see_the_product_edit_view()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();

        $this
            ->get(route('products.edit', $product->slug))
            ->assertStatus(200)
            ->assertViewIs("products.edit");
    }
}
