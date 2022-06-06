<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResources;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){
        return CategoryResources::collection(Category::all());
    }

    public function store(Request $request) {
        $this->authorize('create',Category::class);
        $data = $this->getValidatedData();

        $category = Category::create($data);

        return new CategoryResources($category); 
    }

    public function update(Request $request,Category $category) {
        $this->authorize('update',$category);
        $data = $this->getValidatedData();
        $category->update($data);
        return new CategoryResources($category);
    }

    private function getValidatedData(){
        return request()->validate([
            'name'=>'required|string|min:5|max:255',
            'desc'=>'sometimes|required|string|min:5'
        ]);
    }
}
