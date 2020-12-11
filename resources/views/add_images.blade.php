@extends('layouts.backend.design')
@section('content')  
 
    <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     add image product
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       
                       <li class="active">
                           add product image
                       </li>
                    
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
        </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> add product image</h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form enctype="multipart/form-data" action="{{ url('/add-images/'.$productdetail->p_id) }}" method="post" name="edit_product" id="edit_product">
                            
                            <input type="hidden" name="product_id" value="{{ $productdetail->p_id}}" >
                    
                           
                            <div class="control-group">

                                <label class="control-label">product Name</label>
                                <div class="controls">
                                    @csrf
									<input type="text" class="span6" placeholder="Name" name="product_name" id="product_name" value="{{ $productdetail->product_name}}" >
     
                                </div>
                            </div>
							
                            <div class="control-group">

                                <label class="control-label">price</label>
                                <div class="controls">
                                    @csrf
									<input type="text" class="span6" placeholder="Name" name="price" id="price" value="{{ $productdetail->price}}" >
     
                                </div>
                            </div>
                            
                           
                           
							 
                            <div class="control-group">

                                <label class="control-label">product image</label>
                                <div class="controls">
                                @csrf
                                <input type="file" class="span6" placeholder="Name" name="image[]" id="image" multiple="multiple" >
                               
                                
                                
                                </div>
                            </div>
                            

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">submit</button>
								
                            </div>
							
			
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>


        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
           
            <!-- END PAGE HEADER-->
            <!-- BEGIN EDITABLE TABLE widget-->
             <div class="row-fluid">
                 <div class="span12">
                     <!-- BEGIN EXAMPLE TABLE widget-->
                     <div class="widget purple">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i> show all images</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                         </div>
                         <div class="widget-body">
                             <div>
                                 
                                 <div class="space15"></div>
                                 <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                     <thead>
                                     <tr>
                                     <th>image id</th>

                                     <th>Product id</th>

                                   

                                   

                                     <th>Image </th>

                                      <th >Action</th>
                                     </tr>
                                      @foreach($productsimages as $image)

                                     <tr>
                                          <td>{{$image->g_id}}  </td>
                                          <td>{{$image->p_id}}  </td> 
                                         <td><img width="200px" src= "{{ asset('images/products/large/' .$image->image)}}"></td>
                                         <td><a href="/delete-alt-image/{{$image->g_id}}">delete</td>
                                      </tr>  
                                      @endforeach    
                                     </thead>
                                     <tbody>
                                    
                                     
                                     
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
   </div>
 
         <!-- BEGIN PAGE CONTAINER-->
        
@endsection
