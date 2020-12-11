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
                     edit product
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       
                       <li class="active">
                           edit product form
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
                            <h4><i class="icon-reorder"></i> edit product</h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form enctype="multipart/form-data" action="{{ url('/edit-product/'.$product_details->p_id) }}" method="post" name="edit_product" id="edit_product">@csrf
                            
                           
                            <div class="control-group">
                                <label class="control-label">Custom Dropdown</label>
                                <div class="controls">
                                    <select name="id" data-placeholder="Choose a Category" tabindex="1">
                                        
                                        <?php echo $categories_dropdown; ?>
                                    </select>
                                </div>
                            </div>
                           
                            <div class="control-group">

                                <label class="control-label">product Name</label>
                                <div class="controls">
                                  
									<input type="text" class="span6" placeholder="Name" name="product_name" id="product_name" value="{{ $product_details->product_name}}" >
     
                                </div>
                            </div>
							
                            <div class="control-group">

                                <label class="control-label">price</label>
                                <div class="controls">
                                
									<input type="text" class="span6" placeholder="Name" name="price" id="price" value="{{ $product_details->price}}" >
     
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                   
                                    <textarea class="span6 " rows="3" name="description" id="description" id="exampleInputPassword1" placeholder="Description" value="">{{ $product_details->description}}</textarea>
                                </div>
                            </div>
                           
							 
                            <div class="control-group">

                                <label class="control-label">product image</label>
                                <div class="controls">
                               
                                <input type="file" class="span6" placeholder="Name" name="image" id="image" >
                                <input type="hidden" name="current_image"  value="{{ $product_details->image}}">

                                <img  style="width:200px;" src="{{asset('/images/products/large/'.$product_details->image)}}">
                                <a href="{{url('delete-product-image/'.$product_details->p_id )}}">Delete</a>

                                </div>
                            </div>
                            

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Submit</button>
								<button type="reset" class="btn btn-default">Reset</button>
                                <a href='category.php'><button type="button" class="btn">Cancel</button></a>
                            </div>
							
			
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>

    </div>
        
  
@endsection
