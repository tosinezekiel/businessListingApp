<?php

namespace App\Http\Controllers\Api\Category;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return response($categories);
    }

    public function create(){
        $this->validateCategory();
        if(Category::whereName(request()->name)->exists()){
            return response(['message' => 'category with specified name already exist', 'status'=>'error']);
        }
        Category::create(['name'=>request()->name]);
        return response(['message'=>'category created successfully', 'status'=>'success'], 201);
    }

    public function delete(Category $category){
        $category->delete();
        return response(['message' => 'category deleted successfully', 'status'=>'success']);
    }
    private function validateCategory(){
        return request()->validate([
            'name' => 'required|string'
        ]);
    }
}
