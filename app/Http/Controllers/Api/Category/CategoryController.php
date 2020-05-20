<?php

namespace App\Http\Controllers\Api\Category;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        $this->validateBusiness();
        if(Category::whereName(request()->name)->exists()){
            return response(['message' => 'category with specified name already exist', 'status'=>'error'], 400);
        }
        Category::create(['name'=>request()->name]);
        return response(['message'=>'category created successfully', 'status'=>'success'], 201);
    }

    private function validateCategory(){
        return request()->validate([
            'name' => 'required|string'
        ]);
    }
}
