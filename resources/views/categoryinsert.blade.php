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
                     Category Insert
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       
                       <li class="active">
                           Insert form
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
                            <h4><i class="icon-reorder"></i> Category Insert</h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="/datasubmit" method="post">   @csrf
                            <div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                 
									<input type="text" class="span6" placeholder="Name" name="categoryname" >
     
                                </div>
                            </div>
							
                            
                            
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                 
                                    <textarea class="span6 " rows="3" name="desc"  id="exampleInputPassword1" placeholder="Description"></textarea>
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
