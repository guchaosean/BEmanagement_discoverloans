<!DOCTYPE html>
<html lang="en">
  <head>
  	<title> Smart forms - contact form </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css"  href="css/smart-forms.css">
    <link rel="stylesheet" type="text/css"  href="css/font-awesome.min.css">
 
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
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
            	<h4><i class="fa fa-comments"></i>Contact us</h4>
          </div><!-- end .form-header section -->
            
            <form method="post" action="php/smartprocess.php" id="smart-form">
            	<div class="form-body">
                
                	<div class="section">
                    	<label class="field prepend-icon">
                        	<input type="text" name="sendername" id="sendername" class="gui-input" placeholder="Enter name...">
                            <label class="field-icon"><i class="fa fa-user"></i></label>  
                        </label>
                    </div><!-- end section -->
                    
                	<div class="section">
                    	<label class="field prepend-icon">
                        	<input type="email" name="senderemail" id="senderemail" class="gui-input" placeholder="Enter Email...">
                            <label class="field-icon"><i class="fa fa-envelope"></i></label>  
                        </label>
                    </div><!-- end section -->
                    
                	<div class="section">
                    	<label class="field prepend-icon">
                        	<input type="text" name="sendersubject" id="sendersubject" class="gui-input" placeholder="Enter subject...">
                            <label class="field-icon"><i class="fa fa-lightbulb-o"></i></label>  
                        </label>
                    </div><!-- end section -->
                    
                	<div class="section">
                    	<label class="field prepend-icon">
                        	<textarea class="gui-textarea" id="sendermessage" name="sendermessage" placeholder="Enter message..."></textarea>
                            <label class="field-icon"><i class="fa fa-comments"></i></label>
                            <span class="input-hint"> <strong>Hint:</strong> Please enter between 80 - 300 characters.</span>   
                        </label>
                    </div><!-- end section -->
                    
                	<div class="section">
                        <div class="smart-widget sm-left sml-80">
                            <label class="field prepend-icon">
                                <input type="text" name="securitycode" id="securitycode" class="gui-input" placeholder="Answer?">
                                <label class="field-icon"><i class="fa fa-shield"></i></label>  
                            </label>
                            <label for="securitycode" class="button">4 + 12</label>
                        </div><!-- end .smart-widget section --> 
                    </div><!-- end section -->
                    
                    <div class="result">
                    	<!-- ajax success or error message loads here -->
                    </div><!-- end .result  section -->  
                                                                                                                
                </div><!-- end .form-body section -->
                <div class="form-footer">
                	<button type="submit" class="button btn-primary">Submit</button>
                </div><!-- end .form-footer section -->
            </form>
            
        </div><!-- end .smart-forms section -->
    </div><!-- end .smart-wrap section -->
    
    <div></div><!-- end section -->

</body>
</html>
