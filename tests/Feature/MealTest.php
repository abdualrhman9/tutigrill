<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MealTest extends TestCase
{

    use RefreshDatabase;

    public $user;
    public $token;
    public $category;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->admin()->create();
        $this->token = $this->user->createToken('test_token')->plainTextToken;
        $this->category = Category::factory()->create();
    
    }

    /** @test */
    public function meal_can_be_added() {
        $this->withoutExceptionHandling();
        $response = $this->post(
            uri: 'api/meals/',
            data: $this->getData(),
            headers: $this->getHeaders()
        );

        $this->assertCount(1,Meal::all());
        $this->assertCount(1,Category::all());
        $response->assertJson([
            'data'=>[
                'name'=>$this->getData()['name'],
                'vegetarian'=>$this->getData()['vegetarian'],
                'desc'=>$this->getData()['desc'],
                'price'=>$this->getData()['price'],
                'category_id'=>$this->getData()['category_id'],
            ]
        ]);

    }

    // /** @test */
    // public function meal_fields_are_validated(){
    //     // $this->withoutExceptionHandling();
    //     $fields = collect([ 'name', 'vegetarian', 'desc', 'price', 'category_id']);
    //     $fields->each(function($field){
    //         $response = $this->post(
    //             uri: 'api/meals',
    //             data: array_merge($this->getData(),[$field=>'']),
    //             headers: $this->getHeaders()
    //         );

    //         $response->assertSessionHasErrorsIn($field);

    //     });
    //     // $this->post('api/',$this->);
    // }

    /** @test */
    public function meal_can_be_updated() {
        $this->withoutExceptionHandling();

        $this->post(
            uri: 'api/meals/',
            data: $this->getData(),
            headers: $this->getHeaders()
        );

        $meal = Meal::first();

        $response = $this->patch(
            uri: 'api/meals/'.$meal->id,
            data: array_merge($this->getData(),['name' => 'name updated']),
            headers: $this->getHeaders()
        );

        $this->assertCount(1,Meal::all());
        $this->assertCount(1,Category::all());
        $response->assertJson([
            'data'=>[
                'name'=>'name updated',
                'vegetarian'=>$this->getData()['vegetarian'],
                'desc'=>$this->getData()['desc'],
                'price'=>$this->getData()['price'],
                'category_id'=>$this->getData()['category_id'],
            ]
        ]);
    }

    

    private function getData() {
        return [
            'name'=> 'Meal 01',
            'vegetarian'=> true,
            'desc'=>'lorem ipsum',
            'price'=>12.99,
            'category_id'=>$this->category->id
        ];
    }

    private function getHeaders() {
        return [
            'accept'=> 'application/json',
            'authorization'=>'Bearer '.$this->token
        ];
    }

}
