@extends('layouts.frontend.front_design')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li> <a href="{{url('orders')}}">Orders</li>
              <!--    <li class="active">{{$orderdetail->id}}</li>-->
				</ol>
			</div>
		</div>
</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">

                <div class="heading" align="center">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>product_name</th>
                <th>product_price</th>
                <th>product_qty</th>
                
            </tr>
        </thead>
        <tbody>
				@foreach($orderdetail->orders as $pro)
            <tr>
                <td>{{$pro->product_name}}</td>
               
                <td>{{$pro->product_price}}</td>
                <td>{{$pro->product_qty}}</td>
               
            </tr>
				@endforeach 
           
        </tbody>
      
    </table>

 
                </diV>
		</div>
	</section><!--/#do_action-->


@endsection


