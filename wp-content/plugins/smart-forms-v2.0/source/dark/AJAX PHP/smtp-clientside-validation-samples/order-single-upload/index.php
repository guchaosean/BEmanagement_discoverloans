<!DOCTYPE html>
<html lang="en">
  <head>
  	<title> Smart forms - order form </title>
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
            	<h4><i class="fa fa-comments"></i>Make an order</h4>
          </div><!-- end .form-header section -->
            
            <form method="post" action="php/smartprocess.php" id="smart-form" enctype="multipart/form-data">
            	<div class="form-body">
                
                   <div class="spacer-b40">
                    	<div class="tagline"><span>Your Details </span></div><!-- .tagline -->
                    </div>                 
                
                	<div class="frm-row">
                    
                        <div class="section colm colm6">
                            <label for="sendername" class="field prepend-icon">
                                <input type="text" name="sendername" id="sendername" class="gui-input" placeholder="Name / company name">
                                <label for="sendername" class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div><!-- end section --> 
                        
                        <div class="section colm colm6">
                            <label for="senderemail" class="field prepend-icon">
                                <input type="email" name="senderemail" id="senderemail" class="gui-input" placeholder="Enter email address">
                                <label for="senderemail" class="field-icon"><i class="fa fa-envelope"></i></label>  
                            </label>
                        </div><!-- end section -->
                    
                    </div><!-- end frm-row section -->
                    
                    <div class="frm-row">
                    
                        <div class="section colm colm6">
                            <label for="sendertelephone" class="field prepend-icon">
                                <input type="tel" name="sendertelephone" id="sendertelephone" class="gui-input" placeholder="Telephone / mobile">
                                <label for="sendertelephone" class="field-icon"><i class="fa fa-phone-square"></i></label>  
                            </label>
                        </div><!-- end section -->                    
                        
                        <div class="section colm colm6">
                            <label for="senderwebsite" class="field prepend-icon">
                                <input type="url" name="senderwebsite" id="senderwebsite" class="gui-input" placeholder="Website URL">
                                <label for="senderwebsite" class="field-icon"><i class="fa fa-globe"></i></label>  
                            </label>
                        </div><!-- end section -->
                    
                    </div><!-- end frm-row section -->
                    
                    <div class="spacer-t20 spacer-b40">
                    	<div class="tagline"><span> Order Details </span></div><!-- .tagline -->
                    </div>
                    
                    <div class="frm-row">
                    
                             <div class="section colm colm6">
                                <label class="field select">
                                    <select id="orderservices" name="orderservices">
                                        <option value="">Select a service...</option>
                                        <option value="webdesign">Webdesign</option>
                                        <option value="wordpress">Wordpress customization</option>
                                        <option value="identity">Corporate identity</option>
                                        <option value="cms">Custom CMS</option>
                                    </select>
                                    <i class="arrow double"></i>                    
                                </label>  
                            </div><!-- end section -->
                            
                            <div class="section colm colm6">
                                <label class="field select">
                                    <select id="orderbudget" name="orderbudget">
                                        <option value="">Choose a budget</option>
                                        <option value="500-1000"> $500 - $1000 </option>
                                        <option value="1000-2000"> $1000 - $2000 </option>
                                        <option value="2000-4000"> $2000 - $4000 </option>
                                        <option value="5000+"> $5000+ </option>
                                    </select>
                                    <i class="arrow double"></i>                    
                                </label>  
                            </div><!-- end section -->                     
                                      
                    </div><!-- end frm-row section -->
                    
                   <div class="section colm colm6">
                       <label class="field select">
                           <select id="ordertimeframe" name="ordertimeframe">
                               <option value="">Select order timeframe</option>
                               <option value="1week"> 1 Week </option>
                               <option value="2weeks"> 2 Weeks </option>
                               <option value="3weeks"> 3 Weeks </option>
                               <option value="1month"> 1 Month </option>
                               <option value="2month+"> 2 Month </option>
                           </select>
                           <i class="arrow double"></i>                    
                       </label>  
                   </div><!-- end section --> 
                    
                    <div class="section">
                        <label for="orderfiles" class="field prepend-icon file">
                            <span class="button btn-primary"> Choose File </span>
                            <input type="file" class="gui-file" name="orderfiles" id="orderfiles" onChange="document.getElementById('orderupload').value = this.value;">
                            <input type="text" class="gui-input" id="orderupload" placeholder="upload sample files" readonly>
                            <label for="orderfiles" class="field-icon"><i class="fa fa-upload"></i></label>
                        </label>
                        <span class="small-text block spacer-t10 fine-grey"> Allowed file formats jpg : png : pdf - (2MB - MAX) </span> 
                    </div><!-- end  section -->
                    
                	<div class="section">
                    	<label for="sendermessage" class="field prepend-icon">
                        	<textarea class="gui-textarea" id="sendermessage" name="sendermessage" placeholder="Order details"></textarea>
                            <label for="sendermessage" class="field-icon"><i class="fa fa-comments"></i></label>
                            <span class="input-hint"> <strong>NOTE:</strong> Be as detailed as possible for better feedback.</span>   
                        </label>
                    </div><!-- end section -->
                    
                	<div class="section">
                        <div class="smart-widget sm-left sml-80">
                            <label for="securitycode" class="field prepend-icon">
                                <input type="text" name="securitycode" id="securitycode" class="gui-input" placeholder="Solve captcha">
                                <label for="securitycode" class="field-icon"><i class="fa fa-shield"></i></label>  
                            </label>
                            <label for="securitycode" class="button">4 + 12</label>
                        </div><!-- end .smart-widget section --> 
                    </div><!-- end section -->
                    
                    <div class="section progress-section">
                        <div class="progress-bar progress-animated bar-primary">
                            <div class="bar"></div>
                            <div class="percent">0%</div>
                        </div>
                    </div><!-- end progress section -->                     
                    
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
</body>
</html>
