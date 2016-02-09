<?php 

    session_start(); 
	
	// Enter your name or company name below
	$receiver_name = "Hello";
	
	// Enter email address below for receiving the form
	// All order messages will be sent there
	$receiver_email = "address@example.com";
	
	// Enter email subject below
	// This will be your message subject
	$msg_subject = "New Order";	
	
	$sendername = strip_tags(trim($_POST["sendername"]));	
	$senderemail = strip_tags(trim($_POST["senderemail"]));
	$sendertelephone = strip_tags(trim($_POST["sendertelephone"]));
	$senderwebsite = strip_tags(trim($_POST["senderwebsite"]));
	$orderservices = strip_tags(trim($_POST["orderservices"]));
	$orderbudget = strip_tags(trim($_POST["orderbudget"]));
	$ordertimeframe = strip_tags(trim($_POST["ordertimeframe"]));
	$sendermessage = strip_tags(trim($_POST["sendermessage"]));
    $securitycode = strip_tags(trim($_POST["securitycode"]));
	
    $order_file1 = uniqid();
	$order_file2 = uniqid();
	$order_file3 = uniqid();
    $order_upload1 = $order_file1.$_FILES['orderfile1']['name'];
	$order_upload2 = $order_file2.$_FILES['orderfile2']['name'];
	$order_upload3 = $order_file3.$_FILES['orderfile3']['name'];
		
    if ($_FILES['orderfile1']['error'] == 0 || $_FILES['orderfile2']['error'] == 0 || $_FILES['orderfile3']['error'] == 0) {
		move_uploaded_file($_FILES['orderfile1']['tmp_name'], '../smuploads/' .$order_upload1);
		move_uploaded_file($_FILES['orderfile2']['tmp_name'], '../smuploads/' .$order_upload2);
	    move_uploaded_file($_FILES['orderfile3']['tmp_name'], '../smuploads/' .$order_upload3);			
	
    require "PHPMailerAutoload.php";
    require "smartmessage.php";
		
    $mail = new PHPMailer();
	$mail->isSendmail();
	$mail->IsHTML(true);
	$mail->From = $senderemail;
	$mail->CharSet = "UTF-8";
	$mail->FromName = $sendername;
	$mail->Encoding = "base64";
	$mail->Timeout = 200;
	$mail->ContentType = "text/html";
	$mail->addAddress($receiver_email, $receiver_name);
	$mail->Subject = $msg_subject;
	$mail->AddAttachment('../smuploads/'.$order_upload1);
	$mail->AddAttachment('../smuploads/'.$order_upload2);
	$mail->AddAttachment('../smuploads/'.$order_upload3);
	$mail->Body = $message;
	$mail->AltBody = "Use an HTML compatible email client";
			
	// For multiple email recepients from the form 
	// Simply change recepients from false to true
	// Then enter the recipients email addresses
	// echo $message;
	$recipients = false;
	if($recipients == true){
		$recipients = array(
			"address@example.com" => "Recipient Name",
			"address@example.com" => "Recipient Name",
		);
		
		foreach($recipients as $email => $name){
			$mail->AddBCC($email, $name);
		}	
	}
	
	if(!$mail->Send()) {
	  echo '<div class="alert notification alert-error">Oops! An error occurred!</div>'; 
	} 
	else {
	  echo '<div class="alert notification alert-success">Congs! Message sent successfully </div>';
	  
		// start delete function 
		// automatically deletes files from the smuploads folder after successful sending
		// you can remove this function if you want to keep uploads on your server
		$files = glob('../smuploads/*'); 
		foreach($files as $file){ 
		  if(is_file($file))
			unlink($file); 
		} 
		// end delete function
	  
	}
}		

?>