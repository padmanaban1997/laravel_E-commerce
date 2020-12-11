<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Auth;
use Session;
use App\category;
use App\product;
use App\productsimage;
use App\User;
use App\deliveryaddress;
use App\order;
use App\ordersproduct;
use DB;

use PDF;



class productscontroller extends Controller
{
    public function addproduct(Request $request)
    {

        if($request->isMethod('post')){
  
           $data = $request->all();

            $tobj = new product();
            $tobj->id = $data['id'];
            $tobj->product_name = $data['product_name'];
            $tobj->price= $data['price'];
            $tobj->description = $data['description'];
           //upload image code

            if($request->hasFile('image')){

                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = rand(111,9999).'.'.$extension;
                        $large_image_path = 'images/products/large/'.$filename;
                        
                        Image::make($image_tmp)->save($large_image_path);
                        // print_r($large_image_path); die;
                        $tobj->image = $filename;

                }



            }
            $tobj->save();
           

        }
       
    

        $categories = category::all();
        $categories_dropdown ="<option selected disabled>select</option>";
        foreach($categories as $cat){

            $categories_dropdown .= "<option value='".$cat->id."'>" .$cat->categoryname. "</option>";
        }

        return view('add_product')->with(compact('categories_dropdown'));
    }

    public function viewproducts(Request $request){
        
        $products = product::get();
        foreach($products as $key => $val){

            $categoryname = category::where(['id'=>$val->id])->first();
            $products[$key]->categoryname = $categoryname->categoryname;
            
        }
        return view('view_products')->with(compact('products'));

    }


    public function editproduct(Request $request ,$id=null){
     

        if($request->isMethod('post')){

            $data = $request->all();

            if($request->hasFile('image')){

                $image_tmp = Input::file('image');
                if( $image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = rand(111,9999).'.'.$extension;
                        $large_image_path = 'images/products/large/'.$filename;
                          Image::make($image_tmp)->save($large_image_path);
                        // print_r($large_image_path); die;
                      //  $tobj->image = $filename;

                       

                }



            }else

            {

                $filename=$data['current_image'];

            }

            if(empty($data['description']))

            {

                $data['description']="";
            }
            product::where(['p_id'=>$id])->update([
            'id'=>$data['id'],
            'product_name'=>$data['product_name'],
            'price'=>$data['price'],
            
            'description'=>$data['description'],
            'image'=>$filename
            
            ]);
            return redirect('/view-products');
        }

        $product_details = product::where(['p_id'=>$id])->first();

       
        $categories = category::all();
        $categories_dropdown ="<option selected disabled>select</option>";
        foreach($categories as $cat){

            if($cat->id == $product_details->id){

                $selected = "selected";

            }else{

                $selected ="  ";



            }

            $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">" .$cat->categoryname. "</option>";
        }

       
        return view('edit_product')->with(compact('product_details','categories_dropdown' ));





    }

    public function deleteproductsimage($id=null){

        product :: where (['p_id'=>$id])->update(['image'=>'']);

    }


    public function deletealtimage($id=null){

        $productimage=productsimage::where(['g_id'=>$id])->first();

        $large_image_path = 'images/products/large/';
        if(file_exists($large_image_path.$productimage->image)){


            unlink( $large_image_path.$productimage->image);
        }
  
        productsimage::where(['g_id'=>$id])->delete();

        return redirect()->back()->with('message','product image delete successfully');
    }

    public function deleteproduct($id=null){

        product :: where (['p_id'=>$id])->delete();
        return redirect('/view-products');

        
    }

    public function product($id=null){

        $categories = category::get();

        $productdetail= product::where('p_id',$id)->first();

        $relatedproducts=product::where('p_id','!=',$id)->where(['id'=> $productdetail->id])->get();


        $productaltimages=productsimage::where(['p_id'=>$id])->get();

        return view ('front.product_detail')->with(compact('productdetail','categories','productaltimages','relatedproducts'));
    }

    public function aboutus(Request $request){

        $categories = category::get();

        return view ('front.about')->with(compact('categories'));
    


    }
   


    public function addimages(Request $request,$id=null){


        $productdetail= product::where('p_id',$id)->first();

        if($request->isMethod('post')){

                //add images

                $data=$request->all();
                if($request->hasFile('image')){

                    $files = $request->file('image');
                    foreach($files as $file){

                        $image = new productsimage;
                
                        $extension =   $file->getClientOriginalExtension();
                         $filename = rand(111,9999).'.'.$extension;
                         $large_image_path = 'images/products/large/'.$filename;
                         Image::make($file)->save($large_image_path);
                         $image->image=$filename;
                         $image->p_id = $data['product_id'];
                         $image->save();   

                    } 
                   
    
                           
    
                    
                }

                return redirect()->back()->with('message','product image added successfully');
    
    
    



        }

        $productsimages = productsimage::where(['p_id'=>$id])->get();


        return view ('add_images')->with(compact('productdetail','productsimages'));
    }

   

    public function addtocart(Request $request){


        $data=$request->all();
      // echo"<pre>"; print_r($data); die;


      if(empty(Auth::user()->email)){


        $data['email']= '';
      }else{

        $data['email']= Auth::user()->email;
      }
      
      $session_id=Session::get('session_id');

      if(empty( $session_id)){
        

      $session_id= str_random(40);

      Session::put('session_id',$session_id); 

      }



       DB::table('cart')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],
       'price'=>$data['price'],'quantity'=>$data['quantity'],'email'=>$data['email'],'session_id'=>$session_id
       ]);

       return redirect('cart')->with('flash_message_success','product has been added in cart!');
       

       
    }


    public function cart()
    {

        
        $categories = category::get();

        if(Auth::check()){

            $user_email = Auth::user()->email;
            $usercart=DB::table('cart')->where(['email'=>$user_email])->get();
        }else{

         $session_id=Session::get('session_id');
         $usercart=DB::table('cart')->where(['session_id'=>$session_id])->get();
        }
         foreach($usercart as $key=>$product){

            $productdetail= product::where('p_id', $product->product_id)->first();

            $usercart[$key]->image = $productdetail->image;
         }

       
        return view('front.cart')->with(compact('categories', 'usercart'));

    }

    public function deletecartproduct($id=null){

        DB::table('cart')->where('c_id',$id)->delete();
        return redirect('cart')->with('flash_message_success','product has been deleted from cart!');
    }
   public function updatecartquantity($id=null,$quantity=null){

          DB::table('cart')->where('c_id',$id)->increment('quantity',$quantity);
          return redirect('cart')->with('flash_message_success','product Quantity  has been updated successfully!');

   }

   public function checkout(Request $request){

    $categories = category::get();
    $user_id = Auth::user()->id;
    $user_email = Auth::user()->email;
    $userdetails= User::find($user_id);

    $shippingcount=deliveryaddress::where('user_id',$user_id)->count();
    if($shippingcount>0){

        $shippingdetail=deliveryaddress::where('user_id',$user_id)->first();
    }

    $session_id=Session::get('session_id');
    DB::table('cart')->where(['session_id'=>$session_id])->update(['email'=>$user_email]);


    if($request->isMethod('post')){

        $data=$request->all();

      if(empty($data['billing_name'] )|| empty($data['billing_address'])|| empty($data['billing_city'])
      || empty($data['billing_pincode'])|| empty($data['billing_contact'])|| empty($data['shipping_name'])
      || empty($data['shipping_address'])|| empty($data['shipping_city'])|| empty($data['shipping_pincode'])
      || empty($data['shipping_contact'])){

        return redirect()->back()->with('flash_message_error','Please fill all the fields to checkout'); 
      }

      //update users details

      User::where('id',$user_id)->update(['name'=>$data['billing_name'],'address'=>$data['billing_address'],
      'city'=>$data['billing_city'],'pincode'=>$data['billing_pincode'],'contact'=>$data['billing_contact'],
      
      
      
      ]);

      if($shippingcount>0){
          //update shipping address
          deliveryaddress::where('user_id',$user_id)->update(['name'=>$data['shipping_name'],'address'=>$data['shipping_address'],
          'city'=>$data['shipping_city'],'pincode'=>$data['shipping_pincode'],'contact'=>$data['shipping_contact'],
 ]);
    

      }else{
            //add address
         $shipping=  new deliveryaddress;
         $shipping->user_id=$user_id;
         $shipping->user_email=$user_email;
         $shipping->name=$data['shipping_name'];
         $shipping->address=$data['shipping_address'];
         $shipping->city=$data['shipping_city'];
         $shipping->pincode=$data['shipping_pincode'];
         $shipping->contact=$data['shipping_contact'];
         $shipping->save();
      }
    return redirect()->action('productscontroller@orderreview');
      
    }



    return view('front.checkout')->with(compact('categories','userdetails','shippingdetail'));
   }

   public function orderreview(){
    $categories = category::get();
    $user_id = Auth::user()->id;
    $user_email = Auth::user()->email;
    $userdetails= User::where('id',$user_id)->first();
    $shippingdetail=deliveryaddress::where('user_id',$user_id)->first();
    $usercart=DB::table('cart')->where(['email'=>$user_email])->get();
    foreach($usercart as $key=>$product){

       $productdetail= product::where('p_id', $product->product_id)->first();

       $usercart[$key]->image = $productdetail->image;
    }

   


    $shippingdetail=json_decode(json_encode($shippingdetail));
   

    return view('front.order_review')->with(compact('categories','userdetails','shippingdetail','usercart'));

   }

   public function placeorder(Request $request){


    if($request->isMethod('post')){

        $data=$request->all();

        $user_id=Auth::user()->id;
        $user_email=Auth::user()->email;

       $shippingdetail=deliveryaddress::where(['user_email'=>$user_email])->first();

       $order= new order;
       $order->user_id=$user_id;
       $order->user_email=$user_email;
       $order->user_email=$user_email;
       $order->name=$shippingdetail->name;
       $order->address=$shippingdetail->address;
       $order->city=$shippingdetail->city;
       $order->pincode=$shippingdetail->pincode;
       $order->contact=$shippingdetail->contact;
       $order->order_status="order delivered";
       $order->payment_method=$data['payment_method'];
       $order->grand_total=$data['grand_total'];
       $order->save();

       $order_id= DB::getPdo()->lastInsertId();

       $cartproducts=DB::table('cart')->where(['email'=>$user_email])->get();

       foreach($cartproducts as $pro){
            $cartpro= new ordersproduct;
            $cartpro->order_id=$order_id; 
            $cartpro->user_id=$user_id;
            $cartpro->product_id=$pro->product_id;
            $cartpro->product_name=$pro->product_name;
            $cartpro->product_price=$pro->price;
            $cartpro->product_qty=$pro->quantity;
             $cartpro->save(); 
            



       }
       Session::put('order_id',$order_id);
       Session::put('grand_total',$data['grand_total']);
       return redirect('/thanks');
       


       
     
    }
   }

   public function thanks(Request $request){
    $categories = category::get();

    $user_email=Auth::user()->email;
    DB::table('cart')->where('email',$user_email)->delete();


    return view('front.thanks')->with(compact('categories'));
   }

   public function userorders(Request $request){

    $categories = category::get();

    $user_id=Auth::user()->id;
    $orderdetail=order::with('orders')->where('user_id',$user_id)->get();
   
     
    return view('front.user_orders')->with(compact('categories','orderdetail'));
   }
     

   public function userorderdetails($order_id){

    $categories = category::get();

    $user_id=Auth::user()->id;
    $orderdetail=order::with('orders')->where('id',$order_id)->first();

  
   
  

    return view('front.user_order_details')->with(compact('categories','orderdetail'));




   }

   public function vieworders(){

    $orders=order::with('orders')->orderBy('id','Desc')->get();


    return view('view_orders')->with(compact('orders'));

   }

   public function vieworderinvoice($order_id){

    $orderdet=order::with('orders')->where('id',$order_id)->first();

    
    $user_id=$orderdet->user_id;
    $userdetails=User::where('id',$user_id)->first();


      // $pdf=PDF::loadView('front.order_invoice',['orderdet'=>$orderdet,'userdetails'=>$userdetails]);
      // return $pdf->stream();
   return view('front.order_invoice')->with(compact('orderdet','userdetails'));
    


   }
   
   public function cancelorders(Request $req, $id = NULL){
    $id = $req->get('id');
    // print_r($id);die;
    $orderid = Order::where('id',$id)->first();
    // print_r($orderid->order_status);die;
    $orderdata = Order::where('order_status','=','order delivered')
            ->where('id',$orderid->id)
            ->update(['order_status'=>'order Cancelled']);
    return ['Success'];
   }

   public function search()
   {
    $categories = category::get();
       $search_text=$_GET['product'];
       $products=product::where('product_name','LIKE','%'. $search_text.'%')->get();

       return view('front.search')->with(compact('products','categories'));
   }

  

  

}
 