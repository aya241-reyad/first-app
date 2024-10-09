<?php

namespace App\Http\Controllers\Api;

use App\helpers\helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

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

    //add

    public function add(Request $request){
         $validator = validator()->make($request->all(), [
        'name'=>'required|string',
        'description'=>'required|string',
        'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'parent_id'=>'sometimes'
        ]);
        if ($validator->fails()) {
            return $this->helper->ResponseJson(0, $validator->errors()->first(), $validator->errors());
        }


        $category = Category::create($request->all());

        return  $this->helper->ResponseJson(200,'added Successfully', new CategoryResource($category));
    }

//show

    public function show($id){
    $category = Category::where('id',$id)->first();
    return  $this->helper->ResponseJson(200,'return Successfully', new CategoryResource($category));

    }

    //update

public function edit(Request $request,$id){
 $category = Category::where('id',$id)->first();
 if($category){
    $category->update($request->all());
    return  $this->helper->ResponseJson(200,'updated Successfully', new CategoryResource($category));
 }else{
    return  $this->helper->ResponseJson(404,'This is no category with this id', []);
 }
}


//
public function destroy($id){
$category = Category::where('id',$id)->first();

if($category){
    $category->delete();
    return  $this->helper->ResponseJson(200,'deleted Successfully', []);
 }else{
    return  $this->helper->ResponseJson(404,'This is no category with this id', []);
 }



}








}
