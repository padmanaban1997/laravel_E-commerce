<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

@extends('layouts.frontend.front_design')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Orders</li>
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
                <th>Order ID</th>
                <th>Ordered products</th>
                <th>Payment Method</th>
                <th>Grand Total</th>
                <th>Created on</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
				@foreach($orderdetail as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>
					@foreach($order->orders as $pro)
					<a href="{{url('/orders/'.$order->id)}}">{{$pro->product_name}}</a><br>
					@endforeach
				</td>
                <td>{{$order->payment_method}}</td>
                <td>{{$order->grand_total}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                  <a href="/view-order-invoice/{{$order->id}}">Invoice</a>
                  <!-- <div class="mt-20"><a rel="{{$order->id}}" rel1="delete-orders" class="btn btn-primary deleteOrder">Cancel Order</a></div> -->
                  @if($order->order_status == "order Cancelled")
                    <label for="">Order Cancelled</label>
                  @else
                  <a onclick="deleteOrder({{$order->id}});" class="delete" data-confirm="Are you sure to Cancel this this item?">Cancel Order</a>
                  @endif
                </td>
            </tr>
				@endforeach 
           
        </tbody>
      
    </table>

 
                </diV>
		</div>
	</section><!--/#do_action-->


@endsection

<script>
  function deleteOrder(id){
    // alert(id);
    $.ajax({
      type: "GET",
      url:"/cancel-Orders",
      data:{id:id},
      success: function(data){
        if(data=="Success")
        {
          location.reload();
        }
      }
    });
  }
</script>

