<?php

namespace Tests\Feature\Product;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
