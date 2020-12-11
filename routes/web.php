<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','indexcontroller@index');

 Route::match(['get','post'],'/login','admincontroller@login');
// Auth::routes();
Route::get('/logout','admincontroller@logout');

//about us

Route::get('/about-us','productscontroller@aboutus');



Route::group(['middleware'=>['Adminlogin']],function(){


 
Route::get('/home','admincontroller@dashboard');


  
Route::get('categoryinsert', function () {
  return view('categoryinsert');
});

Route::post('/datasubmit','categorycontroller@store');// when data submit through a form



Route::get('/category','categorycontroller@create');

Route::match(['get','post'],'/categoryedit/{id}','categorycontroller@edit');
Route::get('/deletecategory/{id}','categorycontroller@destroy');

//products routes

Route::match(['get','post'],'/add-product','productscontroller@addproduct');
Route::match(['get','post'],'/edit-product/{p_id}','productscontroller@editproduct');
Route::match(['get','post'],'/add-images/{p_id}','productscontroller@addimages');
Route::get('/delete-product-image/{p_id}','productscontroller@deleteproductsimage');
Route::get('/view-products','productscontroller@viewproducts');
Route::get('/delete-product/{p_id}','productscontroller@deleteproduct');

Route::get('/delete-alt-image/{g_id}','productscontroller@deletealtimage');


Route::get('/search','productscontroller@search');


// admin orders routes


Route::get('/view-orders','productscontroller@vieworders');
// ADMIN order detail route


//user table


Route::get('/view-users','userscontroller@viewuser');


});

//show category in client side

Route::get('/categories/{id}','indexcontroller@showcats');

//product detail page


Route::get('product/{p_id}','productscontroller@product');

//add to cart routes
Route::match(['get','post'],'/add-cart','productscontroller@addtocart');

//cart page

Route::match(['get','post'],'/cart','productscontroller@cart');

//delete product from cart


Route::get('/cart/delete-product/{c_id}','productscontroller@deletecartproduct');


//update product quantity in cart

Route::get('/cart/update-quantity/{c_id}/{quantity}','productscontroller@updatecartquantity');


//Register /login 

Route::get('/login-register','userscontroller@userloginregister');

//users register form submit

Route::post('/user-register','userscontroller@register');




//check email 
Route::match(['get','post'],'/check-email','userscontroller@checkemail');
//user login
Route::post('/user-login','userscontroller@login');

Route::match(['get','post'],'/forgot','userscontroller@userforgot');

//user logout
Route::get('/user-logout','userscontroller@logout');


//search product

Route::post('/search-products','productscontroller@searchproducts');




// all routes after login
Route::group(['middleware'=>['frontlogin']],function(){

    Route::match(['get' ,'post'],'/account','userscontroller@account');


    //check user current password

    Route::post('/check-user-pwd','userscontroller@chkuserpassword');

    //update user password
    Route::post('/update-user-pwd','userscontroller@updatepassword');


    //checkout

    Route::match(['get' ,'post'],'/checkout','productscontroller@checkout');

    //order review page

    Route::match(['get' ,'post'],'/order-review','productscontroller@orderreview');
     //place order page

     Route::match(['get' ,'post'],'/place-order','productscontroller@placeorder');
    // thanks page

    Route::get('/thanks','productscontroller@thanks');

    // users orders page

    Route::get('/orders','productscontroller@userorders');
  // users orders  product page

  Route::get('/orders/{id}','productscontroller@userorderdetails');

  //generate invoice
  
  Route::get('/view-order-invoice/{id}','productscontroller@vieworderinvoice');

  // Ajax Route Cancel Order
  Route::get('/cancel-Orders','productscontroller@cancelorders');
  


  
    

});

