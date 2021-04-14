<?php

namespace Tests\Feature\Brand;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerBrandTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function an_unauthenticated_user_cannot_see_the_brands_view()
    {
        $this->get(route('brands.index'))
        ->assertStatus(302)
        ->assertRedirect("login");
    }

    /**
     * @return void
     * @test
     */
    public function an_authenticated_user_can_see_the_brand_index_view()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $this
            ->get(route('brands.index'))
            ->assertStatus(200)
            ->assertViewIs("brands.index")
            ->assertViewHas("brands");
    }

    /**
     * @return void
     * @test
     */
    public function an_unauthenticated_user_cannot_see_the_brands_create_view()
    {
        $this->get(route('brands.create'))
        ->assertStatus(302)
        ->assertRedirect("login");
    }

        /**
     * @return void
     * @test
     */
    public function an_authenticated_user_can_see_the_brand_create_view()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $this
            ->get(route('brands.create'))
            ->assertStatus(200)
            ->assertViewIs("brands.create");
    }
}
