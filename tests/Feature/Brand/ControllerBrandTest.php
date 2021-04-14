<?php

namespace Tests\Feature\Brand;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerBrandTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function an_authenticated_user_can_see_the_brand_index_view()
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('brands.index'));
        $response->assertStatus(200);
    }
}
