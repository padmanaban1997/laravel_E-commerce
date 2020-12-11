<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;



class indexcontroller extends Controller
{
    public function index(){
        $productsall = product :: get();
       
        $categories = category::get();
      
        return view('front.index')->with(compact('productsall','categories'));


    } 

    public function showcats($id){

        $categories = category::get();

        $category_products = product::where('id',$id)->get();
        $id_=$id;
        return view('front.category_list_pro')->with(compact('category_products','categories',$id_));
    }
}
