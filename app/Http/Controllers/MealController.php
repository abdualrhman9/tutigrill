<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealResources;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index(){
        return MealResources::collection(Meal::all());
    }

    public function store(Request $request) {
        
        $this->authorize('create',Meal::class);
        
        $data = $this->getValidatedData();
    
        return new MealResources(Meal::create($data));
    }

    public function update(Request $request, Meal $meal) {

        $this->authorize('create',$meal);

        $data = $this->getValidatedData();
        
        $meal->update($data);

        return new MealResources($meal);
    }

    private function getValidatedData(){
        return request()->validate([
            'name'=>'required|string|min:5|max:255',
            'price'=>'required|numeric',
            'desc'=>'sometimes|required|string|min:5|max:255',
            'vegetarian'=>'required',
            'category_id'=>'required|exists:App\Models\Category,id'
        ]);
    }
}
