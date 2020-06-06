<?php

namespace App\Http\Controllers\Api\Business;

use App\Business;
use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index(){
        $businesses = Business::with('categories')->with('images')->with('address')->orderBy('views', 'DESC')->get();
        return response(['data' => $businesses], 200);
    }

    public function create(){
        // return response(request()->all());
        $this->validateBusiness();
        return response(request()->all());
        if(!request()->has('image')){
            //set default file
        }
        
        //set file
        //get request
        //attach category

    }

    public function showSingle($id){
       
        $business = Business::with('categories')->with('images')->with('address')->whereId($id)->first();
        $views = $business->views += 1;
        $business->update(['views' => $views]);
        return response(['data' => $business], 200);
    }

    public function update(){
        
    }
    public function getActiveBusinesses(){
        $businesses = Business::with('categories')->with('images')->with('address')->whereStatus(1)->get();
        return response(['data' => $businesses], 200);
    }

    public function search($search){
        $businesses = Business::with('categories')->with('images')->with('address')->where('name','LIKE','%'.$search.'%')->orWhere('description','LIKE','%'.$search.'%')->get();
        return response(['data' => $businesses], 200);
    }

    public function delete(Business $business){
        $business->delete();
        return response(['message' => 'Enabled', 'status'=>'success']);
    }

    public function addReview(){
        $review = new Review();
        $review->review = request()->review;
        $review->rating = request()->rating;
        $review->business_id = request()->business_id;
        $review->save();
        return response(['message' => 'review has been recieved successfully', 'status'=>'success']);
    }
    public function enable(Business $business){
        $business->update(['status'=>1]);
        return response(['message' => 'Enabled', 'status'=>'success']);
    }
    public function disable(Business $business){
        $business->update(['status'=>0]);
        return response(['message' => 'Disabled', 'status'=>'success']);
    }
    private function validateBusiness(){
        return request()->validate([
            'name'    => 'required|string',
            'description' => 'required|string',
            'url' => 'required|string|url',
            'email' => 'required|string|email',
            'phone' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'myFile' => 'required|file',
            'category_id'    => 'required|array|min:1',
            'category_id.*'  => 'required|string|distinct|min:1',
        ]);
    }

    private function validateReview(){
        return request()->validate([
            'review' => 'required|string',
            'rating' => 'required|numeric'
        ]);
    }
}
