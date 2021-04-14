<?php

namespace Tests\Feature\Brand;

use App\Models\Brand;
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

    /**
     * @return void
     * @test
     */
    public function an_unauthenticated_user_cannot_create_brands()
    {
        $this->post(route('brands.store'), [])
        ->assertStatus(302)
        ->assertRedirect("login");
    }

    /**
     * @return void
     * @test
     */
    public function an_authenticated_user_can_create_brands()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            "name"  => "Apple",
            "slug"  => "apple"
        ];

        $this
            ->post(route('brands.store'), $data)
            ->assertStatus(302)
            ->assertRedirect(route("brands.index"));

            $this->assertDatabaseHas('brands', $data);
    }

        /**
     * @return void
     * @test
     */
    public function an_unauthenticated_user_cannot_see_the_brands_edit_view()
    {
        $brand = Brand::factory()->create();

        $this->get(route('brands.edit', $brand->slug))
        ->assertStatus(302)
        ->assertRedirect("login");
    }

    /**
     * @return void
     * @test
     */
    public function an_authenticated_user_can_see_the_brand_edit_view()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $brand = Brand::factory()->create();

        $this
            ->get(route('brands.edit', $brand->slug))
            ->assertStatus(200)
            ->assertViewIs("brands.edit");
    }
}
