<!DOCTYPE html>
<html lang="en">
  <head>
  	<title> Smart Forms - Booking Form </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css"  href="css/smart-forms.css">
    <link rel="stylesheet" type="text/css"  href="css/font-awesome.min.css">
    
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="js/jquery.form.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/additional-methods.min.js"></script>
    <script type="text/javascript" src="js/smart-form.js"></script>    
    
    <!--[if lte IE 9]>   
        <script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
    <![endif]-->    
    
    <!--[if lte IE 8]>
        <link type="text/css" rel="stylesheet" href="css/smart-forms-ie8.css">
    <![endif]-->

       
</head>

<body class="woodbg">

	<div class="smart-wrap">
    	<div class="smart-forms smart-container wrap-2">
        
        	<div class="form-header header-primary">
            	<h4><i class="fa fa-calendar"></i> Booking </h4>
            </div><!-- end .form-header section -->
            
            <form method="post" action="php/smartprocess.php" id="smart-form">
            
            	<div class="form-body">
                
                    <div class="section">
                    	<label for="guestname" class="field-label">Your Names</label>
                        <label class="field prepend-icon">
                            <input type="text" name="guestname" id="guestname" class="gui-input" placeholder="Your name...">
                            <label class="field-icon"><i class="fa fa-user"></i></label>  
                        </label>
                    </div><!-- end section --> 
                                                
                	<div class="frm-row">
                        <div class="section colm colm6">
                            <label for="guestemail" class="field-label">Email Address</label>
                            <label class="field prepend-icon">
                                <input type="email" name="guestemail" id="guestemail" class="gui-input" placeholder="Email address">
                                <label class="field-icon"><i class="fa fa-envelope"></i></label>  
                            </label>
                        </div><!-- end section -->
                        
                        <div class="section colm colm6">
                            <label for="guestelephone" class="field-label">Telephone / Mobile</label>
                            <label class="field prepend-icon">
                                <input type="tel" name="guestelephone" id="guestelephone" class="gui-input" placeholder="Telephone / moble number">
                                <label class="field-icon"><i class="fa fa-phone-square"></i></label>  
                            </label>
                        </div><!-- end section -->
                    </div><!-- end .frm-row section --> 
                    
                    <div class="frm-row">
                        <div class="section colm colm6">
                        	<label for="adults" class="field-label">Adult Guests</label>
                            <label class="field prepend-icon">
                            	<input type="text" id="adults" name="adults" class="gui-input" placeholder="Number of adults">
                                <label class="field-icon"><i class="fa fa-male"></i></label>  
                            </label>
                        </div><!-- end section -->
                        
                        <div class="section colm colm6">
                        	<label for="children" class="field-label">Child Guests</label>
                            <label class="field prepend-icon">
                            	<input type="text" id="children" name="children" class="gui-input" placeholder="Number of children">
                                <label class="field-icon"><i class="fa fa-female"></i></label>  
                            </label>
                        </div><!-- end section -->
                    </div><!-- end .frm-row section -->                                   
                
                    <div class="frm-row">
                        <div class="section colm colm6">
                        	<label for="checkin" class="field-label">Check-in Date</label>
                            <label class="field prepend-icon">
                            	<input type="text" id="checkin" name="checkin" class="gui-input" placeholder="mm/dd/yyyy">
                                <label class="field-icon"><i class="fa fa-calendar"></i></label>  
                            </label>
                        </div><!-- end section -->
                        
                        <div class="section colm colm6">
                        	<label for="checkout" class="field-label">Check-out Date</label>
                            <label class="field prepend-icon">
                            	<input type="text" id="checkout" name="checkout" class="gui-input" placeholder="mm/dd/yyyy">
                                <label class="field-icon"><i class="fa fa-calendar"></i></label>  
                            </label>
                        </div><!-- end section -->
                    </div><!-- end .frm-row section -->
                    
                	<div class="section">
                    	<label for="comment" class="field-label"> Questions &amp; Comments </label>
                    	<label class="field prepend-icon">
                        	<textarea class="gui-textarea" id="comment" name="comment" placeholder="Your question or comment"></textarea>
                            <label class="field-icon"><i class="fa fa-comments"></i></label>
                            <span class="input-hint"> 
                            	<strong>Please:</strong> Be as descriptive as possible
                            </span>   
                        </label>
                    </div><!-- end section -->
                    
                    <div class="result">
                    	<!-- ajax success or error message loads here -->
                    </div><!-- end .result  section -->
                    
                </div><!-- end .form-body section -->
                <div class="form-footer">
                	<button type="submit" class="button btn-primary"> Submit Booking </button>
                    <button type="reset" class="button"> Cancel </button>
                </div><!-- end .form-footer section -->
            </form>
            
        </div><!-- end .smart-forms section -->
    </div><!-- end .smart-wrap section -->

</body>
</html>
