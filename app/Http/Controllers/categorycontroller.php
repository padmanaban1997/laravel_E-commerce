<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class categorycontroller extends Controller
{
    public function store(Request $request)
{
    $this->validate($request,[


        'categoryname'=> 'required',
        'desc'=> 'required',


    ]);
    $tobj = new category();
    $tobj->categoryname = $request->input('categoryname');
    $tobj->desc = $request->input('desc');
    $tobj->save();
    return  redirect('category');

}

public function create()
{
   $cobj = category::get();
   return view('categoryshow',compact('cobj'));
    
}

public function edit(Request $request,$id=''){
    if($request->isMethod('post')){

        $data = $request->all();
        category::where(['id'=>$id])->update([
        'categoryname'=>$data['categoryname'],
        'desc'=>$data['desc']]);
        return redirect('/category');
    }
    $categoryobj= category::where(['id'=>$id])->first();
    return view('categoryupdate')->with(compact('categoryobj'));
}
public function destroy(category $cat3,$id)

{
  $cat3 = $cat3::find($id)->delete();
  return redirect('/category');
    
}



}
