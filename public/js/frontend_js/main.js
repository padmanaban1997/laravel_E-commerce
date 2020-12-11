/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});

		$(".changeimage").click(function(){

			var image=$(this).attr('src');
			$(".mainimage").attr('src',image);

		});

		var $easyzoom = $('.easyzoom').easyZoom();

		// Setup thumbnails example
		var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

		$('.thumbnails').on('click', 'a', function(e) {
			var $this = $(this);

			e.preventDefault();

			// Use EasyZoom's `swap` method
			api1.swap($this.data('standard'), $this.attr('href'));
		});

		// Setup toggles example
		var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

		$('.toggle').on('click', function() {
			var $this = $(this);

			if ($this.data("active") === true) {
				$this.text("Switch on").data("active", false);
				api2.teardown();
			} else {
				$this.text("Switch off").data("active", true);
				api2._init();
			}
		});
	});
});


$().ready(function(){

	$("#registerform").validate({

		rules:{

				name:{

					required:true,
					minlength:2,
					accept: "[a-zA-Z]+"


				},

				password:{

					required:true,
					 minlength:6

				},

				email:{
					required:true,
					email:true,
					remote:"/check-email"


				}

		},
		messages:{
				name:{

				required:"please Enter your Name",
				minlength:"your name must be atleast 2 characters",
				accept: "your name must be contain letters only"

				},
				password:{

					required:"please Enter your password",
					minlength:"your password must be atleast 6 characters"
				},

				email:{

					required:"please Enter your Email",
					email:"please enter a valid Email",
					remote:"Email already Exists!"


				}



		}


	});

	$("#loginform").validate({

		rules:{

			email:{
				required:true,
				email:true,
			},


				

				password:{

					required:true	
					
				},

			
		},
		messages:{


			email:{

				required:"please Enter your Email",
				email:"please enter a valid Email"
			


			},

			
				password:{

					required:"please Enter your password"
					
				}

				


		}


	});
	$("#accountform").validate({

		rules:{

			name:{
				required:true,
				
			},


				

			address:{

					required:true,
					
				},

			
			city:{

					required:true,
					
				},
				
			pincode:{

					required:true,
					
				},	

			contact:{

					required:true,
					minlength:10,
					
				},	

			
		},
		messages:{


			name:{

				required:"Please Enter your name",
				


			},

			
				address:{

					required:"Please Enter your address",
					
				},
				city:{

					required:"Please Enter your City",
					
				},

				pincode:{

					required:"Please Enter your pincode",
					
				},
				contact:{

					required:"please Enter your contact number",
					
				}



				


				


		}


	});

	$("#passwordform").validate({

		rules:{

			current_pwd:{
				required:true,
				minlength:7,
				maxlength:20
			},


				

			new_pwd:{

					required:true,
					minlength:7,
					maxlength:20	
					
				},
				confirm_pwd:{

					required:true,
					minlength:7,
					maxlength:20,
					equalTo:"#new_pwd"	
					
				}
		},

		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element,errorClass,validClass){
			$(element).parents('.control-group').addClass('error');
			
		}
	

	});

  $('#current_pwd').keyup(function(){
		var current_pwd= $(this).val();
		$.ajax({

				headers:{
					'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')

				},
				type:'post',
				url:'/check-user-pwd',
				data:{current_pwd:current_pwd},
				success:function(resp){

					//alert(resp);

					if(resp=="false"){
						$("#chkpwd").html("<font color='red'>Current password is incorrect!");
					}else 
					if(resp=="true"){
						$("#chkpwd").html("<font color='green'>Current password is correct!");
					}  

				},error:function(){

					alert("Error");
				}


		});
  });





	$(document).ready(function($) {
        $('#myPassword').passtrength({
          minChars: 4,
          passwordToggle: true,
		  tooltip: true,
		  eyeImg :"/images/frontend_images/eye.svg" 
        });
	  });
	  

	  $("#billtoship").click(function(){

		if(this.checked){

			$("#shipping_name").val($("#billing_name").val());
			$("#shipping_address").val($("#billing_address").val());
			$("#shipping_city").val($("#billing_city").val());
			$("#shipping_pincode").val($("#billing_pincode").val());
			$("#shipping_contact").val($("#billing_contact").val());
		}

		else{
			$("#shipping_name").val('');
			$("#shipping_address").val('');
			$("#shipping_city").val('');
			$("#shipping_pincode").val('');
			$("#shipping_contact").val('');
  
		}
		

	  });



});

function selectPaymentMethod(){

	if($(' #cod').is(' :checked')){
	
	}else{

		alert("please select payment method");
		return false;

	}
	

	
}