@extends('layouts.frontend.front_design')
@section('content')


<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">About <strong>Us</strong></h2>    			    				    				
					
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">The Explorer</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
                        <div class="col-lg-8">
                    <p style=font-size:20px;>Our Mission, and Aim is Providing best products and gears for camping lovers.<br>
                    Who Just love exploring the new places with there family and Friends. <br><br>
                    Here, We Provide all Type of Products with huge range. Our Products are <br>
                    Quality tested and less price than open markets. <br><br>
                    
                    We are available for you 24*7 days.Customer Satisfication is our first <br>
                    priority and we deliver best product to our customer. 
                    
                    </p>
                </div>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p style=font-size:20px;>EX-plorer Inc.</p>
							<p style=font-size:20px;>Naroda, Ahmedabad 382340</p>
							
							<p style=font-size:20px;>Mobile: 07922548454</p>
							
							<p style=font-size:20px;>Email: info@EX-plorer.com</p>
                            <p style=font-size:20px;>Send us your query anytime!</p>
	    				</address>

                        
	    			</div>

    			</div>
                    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->


    <center> <h2>“Home Is Where You Park It”</h2> </center> <br>
	    				

    <div class="gallery-wrapper lf-padding">
     <div class="gallery-area">
         
         <div class="container-fluid">
             <div class="row">
              
                 <div class="">
                     <center><img src="{{ asset('images/frontend_images/home/hiking.jpg')}}" alt="" ></center>
                
             </div>
         </div>
     </div>
 </div> <br>
 <center> <h2>“A bad day camping is still better than a good day of working”</h2> </center>
	

@endsection
