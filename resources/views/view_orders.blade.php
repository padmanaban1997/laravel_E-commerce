@extends('layouts.backend.design')
@section('content')
<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
             <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     product Table
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Orders</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Order Table
                       </li>
                      
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN EDITABLE TABLE widget-->
             <div class="row-fluid">
                 <div class="span12">
                     <!-- BEGIN EXAMPLE TABLE widget-->
                     <div class="widget purple">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i> Order Table</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                         </div>
                         <div class="widget-body">
                             <div>
                                 <div class="clearfix">
                                    
                                    
                                 </div>
                                 <div class="space15"></div>
                                 <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                     <thead>
                                     <tr>
                                     <th>Order ID</th>

                                     <th>Order Date</th>

                                     <th>Customer Name</th>

                                     <th>Customer Email</th>

                                     <th>Ordered products </th>
                                     <th>Order Amount</th>

                                    <th>Order Status</th>
                                    <th>Payment Method</th>
                                   
                                     </tr>
                                     </thead>
                                     <tbody>
                                     <tr class="">
                                     @foreach ($orders as $order)
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->user_email}}</td>
                                        <td>		@foreach($order->orders as $pro)
				                    	<a href="{{url('/orders/'.$order->id)}}">{{$pro->product_name}}
                                        
                                        
                                        ({{$pro->product_qty}})</a><br>
					                    @endforeach</td>
                                        <td>{{$order->grand_total}}</td>
                                        
                                        <td>{{$order->order_status}}</td>
                                        <td>{{$order->payment_method}}</td>
                                      
                                       
                                        
                                        
                                     </tr>
                                     @endforeach
                                     
                                     
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                     <!-- END EXAMPLE TABLE widget-->
                 </div>
             </div>

            <!-- END EDITABLE TABLE widget-->
        </div>
         <!-- END PAGE CONTAINER-->
</div>
 @endsection
<!-- Mirrored from thevectorlab.net/metrolab/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2010], Mon, 30 Oct 2017 07:00:47 GMT -->
