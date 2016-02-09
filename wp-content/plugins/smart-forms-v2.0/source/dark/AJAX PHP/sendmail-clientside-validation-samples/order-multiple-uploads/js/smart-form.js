	$(function() {
			   
				var bar = $('.bar');
				var percent = $('.percent');
		
				/* @custom validation method (smartCaptcha) 
				------------------------------------------------------------------ */
					
				$.validator.methods.smartCaptcha = function(value, element, param) {
						return value == param;
				};
						
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
								orderservices: {
										required: true
								},
								orderbudget: {
										required: true
								},
								orderfile1:{
										required:true,
										extension:"jpg|png|pdf"
								},
								orderfile2:{
										required:true,
										extension:"jpg|png|pdf"
								},
								orderfile3:{
										required:true,
										extension:"jpg|png|pdf"
								},								
								sendermessage: {
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
										minlength: 'Name must be at least 2 characters'
								},				
								senderemail: {
										required: 'Enter your email address',
										email: 'Enter a VALID email address'
								},
								orderservices: {
										required: 'Please select a service'
								},
								orderbudget: {
										required: 'Choose your budget range'
								},								
								orderfile1:{
										required:'Browse to add some order files',
										extension:'Sorry, file format not supported'
								},
								orderfile2:{
										required:'Browse to add some order files',
										extension:'Sorry, file format not supported'
								},
								orderfile3:{
										required:'Browse to add some order files',
										extension:'Sorry, file format not supported'
								},								
								sendermessage: {
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
											var percentVal = '0%';
											bar.width(percentVal);
											percent.html(percentVal);
											$( ".progress-section" ).show( "slow" );
											$('.form-footer').addClass('progress');
									},
									uploadProgress: function(event, position, total, percentComplete) {
											var percentVal = percentComplete + '%';
											bar.width(percentVal);
											percent.html(percentVal);
									},								
									error:function(){
											$( ".progress-section" ).hide(1000);
											$('.form-footer').removeClass('progress');
									},
									 success:function(){
											$( ".progress-section" ).show().delay(5000).fadeOut();
											var percentVal = '100%';
											bar.width(percentVal);
											percent.html(percentVal);
											$('.form-msg').show().delay(10000).fadeOut();	
											$('.form-footer').removeClass('progress');
											$('.field').removeClass("state-error, state-success");
											$('#smart-form').resetForm();
									 }
							  });
						}
						
				});		
		
	});				
    