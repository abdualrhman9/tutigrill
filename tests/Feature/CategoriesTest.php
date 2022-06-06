<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
{

    use RefreshDatabase;
    public $user;
    public $token;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->admin()->create();
        $this->token = $this->user->createToken('test_token')->plainTextToken;
    }

    /** @test */
    public function only_admin_users_can_add_category() {
        $this->withoutExceptionHandling();
        $response = $this->post('api/categories',$this->getData(),$this->getHeaders());
        $this->assertCount(1,Category::all());
        $response->assertJson([
            'data'=> [
                'name'=>$this->getData()['name'],
                'desc'=>$this->getData()['desc'],
            ]
        ]);
    }

    /** @test */
    public function only_admin_users_can_updated_categories() {
        $this->withoutExceptionHandling();
        
        $response = $this->post('api/categories',$this->getData(),$this->getHeaders());

        $category = Category::first();

        $response = $this->patch(
            uri: 'api/categories/'.$category->id,
            data: array_merge($this->getData(),['name'=>'updated name']),
            headers: $this->getHeaders(),
        );

        $category = $category->fresh();

        $this->assertCount(1,Category::all());
        $response->assertJson([
            'data'=>[
                'name'=>$category->name,
                'desc'=>$this->getData()['desc'],
            ]
        ]);
    } 

    /** @test */
    public function list_of_categories_can_be_fetch(){
        $this->withoutExceptionHandling();
        
        $category = Category::factory()->create();

        $response = $this->get('api/categories');
        
        $response->assertJson([
            'data'=>[         
                [
                    'name'=>$category->name,
                    'desc'=>$category->desc
                ]
            ]
        ]);
    }

    /** @test */
    public function categories_load_with_meals() {
        $this->withoutExceptionHandling();
        
        $category = Category::factory()->create();


        $this->assertCount(0,$category->meals);


        $category->meals()->create([
            'name' => 'test name',
            'price' => 22.99,
            'desc' => 'lorem ipsum',
            'vegetarian' => true
        ]);

        $category->fresh();

        $this->assertCount(1,Meal::all());


    }

    private function getData() {
        return [
            'name'=>'breakfast',
            'desc'=>'Lorem ipsum dolor sit amet consectetur',
        ];
    }

    private function getHeaders() {
        return [
            'accept'=> 'application/json',
            'authorization'=>'Bearer '.$this->token
        ];
    }
}
