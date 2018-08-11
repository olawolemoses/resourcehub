<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoriesTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function a_user_can_browse_home()
    {
        $category = factory('App\Models\Category')->create();
        $response = $this->get('/categories');
        $response->assertSee($category->category_name);
    }

    /** @test */
    public function a_user_can_browse_categories()
    {
        $category = factory('App\Models\Category')->create();
        $response = $this->get('/categories/' . $categories->id);
        $response->assertSee($category->category_name);
    }
}
