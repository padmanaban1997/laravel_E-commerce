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
                     category Table
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">category</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           category Table
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
                             <h4><i class="icon-reorder"></i> category Table</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                         </div>
                         <div class="widget-body">
                             <div>
                                 <div class="clearfix">
                                     <div class="btn-group">
                                     <a href='{!! url('/categoryinsert'); !!}'> <button id="editable-sample_new" class="btn green">
                                             Add New <i class="icon-plus"></i>
                                         </button></a>
                                     </div>
                                    
                                 </div>
                                 <div class="space15"></div>
                                 <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                     <thead>
                                     <tr>
                                     <th>Category Name</th>


                                        <th>Description</th>
                                        <th >Action</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                                     <tr class="">
                                     @foreach ($cobj as $item)
                                        <td>{{$item->categoryname}}</td>
                                        <td>{{$item->desc}}</td>
                                        <td><a href="/categoryedit/{{$item->id}}"> <button type="button" class="btn btn-success">edit</button></td>
                                        <td><a href="/deletecategory/{{$item->id}}"><button class="btn btn-small btn-danger" type="button">delete</button></td>
                                        
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
