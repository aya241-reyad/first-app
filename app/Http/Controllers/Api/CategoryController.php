<?php

namespace App\Http\Controllers\Api;

use App\helpers\helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    private $helper;
    public function __construct()
    {
        $this->helper = new helper();
    }
    
    public function all(){
        $categories = Category::all();
        if(!empty($categories)){
        return  $this->helper->ResponseJson(200,'Get Data Successfully', CategoryResource::collection($categories));
        // new CategoryResource($category);
        }else{
             return  $this->helper->ResponseJson(404,'This is error with data', []);
        }
        // return response()->json($categories);
    }
}
