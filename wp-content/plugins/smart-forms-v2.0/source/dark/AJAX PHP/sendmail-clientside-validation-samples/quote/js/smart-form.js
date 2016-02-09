	$(function() {
			   

				/* @custom validation method (smartCaptcha) 
				------------------------------------------------------------------ */
				$.validator.methods.smartCaptcha = function(value, element, param) {
						return value == param;
				};
				
				/* @budget slider
				------------------------------------------- */
				function createSlider(){
					
					$( "#budget-slider" ).slider({
						range: "min",
						value: 15000,
						min: 1000,
						max: 50000,
						step: 500,
						slide: function(event, ui) {
							$("#budget").val("$" + ui.value);
						}
					});
					
					$("#budget").val("$" + $("#budget-slider").slider("value"));
				}
				
				createSlider();
						
				$( "#smart-form" ).validate({
				
						/* @validation states + elements 
						------------------------------------------- */
						errorClass: "state-error",
						validClass: "state-success",
						errorElement: "em",
						
						/* @validation rules 
						------------------------------------------ */
						rules: {
								sendername: {
										required: true,
										minlength: 2
								},		
								senderemail: {
										required: true,
										email: true
								},
								services: {
										required: true
								},
								budget: {
										required: true
								},								
								details: {
										required: true,
										minlength: 10
								},
								securitycode:{
										required:true,
										smartCaptcha:16	
								}
						},
						
						/* @validation error messages 
						---------------------------------------------- */
							
						messages:{
								sendername: {
										required: 'Enter your name',
										minlength: 'Name is too short, at least 2 characters'
								},				
								senderemail: {
										required: 'Enter your email address',
										email: 'Enter a VALID email address'
								},
								services: {
										required: 'Please select a service'
								},
								budget: {
										required: 'Choose your budget range'
								},																
								details: {
										required: 'Oops you forgot your message',
										minlength: 'Message must be at least 10 characters'
								},															
								securitycode:{
										required: 'Please enter security code',
										smartCaptcha: 'Enter a correct security code'
								}
						},

						/* @validation highlighting + error placement  
						---------------------------------------------------- */	
						
						highlight: function(element, errorClass, validClass) {
								$(element).closest('.field').addClass(errorClass).removeClass(validClass);
						},
						unhighlight: function(element, errorClass, validClass) {
								$(element).closest('.field').removeClass(errorClass).addClass(validClass);
						},
						errorPlacement: function(error, element) {
						   if (element.is(":radio") || element.is(":checkbox")) {
									element.closest('.option-group').after(error);
						   } else {
									error.insertAfter(element.parent());
						   }
						},
						
						/* @ajax form submition 
						---------------------------------------------------- */						
						submitHandler:function(form) {
							$(form).ajaxSubmit({
									target:'.result',		   
									beforeSubmit:function(){ 
											$('.form-footer').addClass('progress');
									},								
									error:function(){
											$('.form-footer').removeClass('progress');
									},
									 success:function(){	
											$('.form-footer').removeClass('progress');
											$('.field').removeClass("state-error, state-success");
											$( "#budget-slider" ).slider( "destroy" );
											$('#smart-form').resetForm();
											createSlider();
									 }
							  });
						}
						// end ajaxSubmit:
				});		
		
	});				
    