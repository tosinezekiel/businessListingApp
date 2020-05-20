<?php

namespace App\Http\Controllers\Api\Business;

use App\Business;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index(){
        $businesses = Business::with('categories')->get();
        return response(['data' => $businesses], 200);
    }

    public function create(){
        $data  = $this->validateBusiness();

    }

    public function show($id){
        $business = Business::with('categories')->whereId($id)->first();
        return response(['data' => $business], 200);
    }

    public function update(){
        
    }

    public function delete(){
        
    }
    private function validateBusiness(){
        return request()->validate([
            'name'    => 'required|string',
            'description' => 'required|string',
            'url' => 'required|string',
            'phone' => 'required|string',
            'category_id'    => 'required|array|min:1',
            'category_id.*'  => 'required|string|distinct|min:3',
        ]);
    }
}
