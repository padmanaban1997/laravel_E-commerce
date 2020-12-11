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
                    Dashboard
                  </h3>
                  <ul class="breadcrumb">
                      <li>
                          <a href="#">Home</a>
                          <span class="divider">/</span>
                      </li>
                      <li>
                          <a href="#">Metro Lab</a>
                          <span class="divider">/</span>
                      </li>
                      <li class="active">
                          Dashboard
                      </li>
                      <li class="pull-right search-wrap">
                          <form action="http://thevectorlab.net/metrolab/search_result.html" class="hidden-phone">
                              <div class="input-append search-input-area">
                                  <input class="" id="appendedInputButton" type="text">
                                  <button class="btn" type="button"><i class="icon-search"></i> </button>
                              </div>
                          </form>
                      </li>
                  </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
              </div>
           </div>
           <!-- END PAGE HEADER-->
           <!-- BEGIN PAGE CONTENT-->
           <div class="row-fluid">
               <!--BEGIN METRO STATES-->
               <div class="metro-nav">

              

                   <div class="metro-nav-block nav-block-orange">
                       <a data-original-title="" href="#">
                           <i class="icon-user"></i>
                           <?php
                             $users=DB::table('users')->count();

                             ?>

                         
                           <div class="info"><?php echo $users ?></div>
                           <div class="status">Total users</div>
                       </a>
                   </div>
                   <div class="metro-nav-block nav-olive">
                       <a data-original-title="" href="#">
                           <i class="icon-tags"></i>

                           <?php
                             $orders=DB::table('orders')->count();

                             ?>

                           <div class="info"><?php echo $orders ?></div>
                           <div class="status">Total orders</div>
                       </a>
                   </div>
                  
                   

    
               <!--END METRO STATES-->
           </div>
           

          
         
              
              
           </div>

           <!-- END PAGE CONTENT-->         
        </div>
        <!-- END PAGE CONTAINER-->
     </div>
     <!-- END PAGE -->  

@endsection