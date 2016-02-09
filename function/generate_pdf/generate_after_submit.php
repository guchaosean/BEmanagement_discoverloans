<?php
require_once(dirname(__FILE__)."/dompdf/dompdf/dompdf_config.inc.php");
date_default_timezone_set('Australia/Melbourne');
 
$now = new DateTime();
$today_date=$now->format('Y-m-d'); 
$html_start=" <body >
<html style='font-family: verdana,arial,helvetica,sans-serif;  '>";
$credit_quote="
 <style>
   
    h2{font-size:20px;}
    span{font-size:14px;}	
	.page_footer{font-size:10px; position:relative; left:500px;}
 </style>
    <div style='width:700px;'>
	<span style='font-size:18px;'>CLIENTS NAMES:".$today_date."</span><br><br><br> 
	<img src='paleso_logo.jpg' style='position: absolute;width: 208px;height: 81px;top: 8px;left: 486px;'></img>
    <span style='font-size:20px;'><b>CREDIT QUOTE</b></span>
    <h2>What is a credit quote?</h2>
    <span>A Credit Quote sets out important information about the credit assistance and other services that we Provide as a broker.<br>We are required to provide this Credit Quote to you, and receive your signed acceptance, before we provide any credit assistance to you.</span> <br> 
    <h2> What is credit assistance?</h2>
	<span>We Provide credit assistance when we: 
<ul>
	<li>Suggest or assist you to apply for a particular credit contract with a particular credit provider; or </li>
    <li>Suggest or assist you to apply for an increase to the credit limit of a particular credit contract with a particular credit provider; or </li>
    <li>Suggest you remain in a particular credit contract with a particular credit provider. </li>
</ul>	
	</span><br>
	<h2>What are the fees and charges for providing me with credit assistance? </h2>
	<span>You have requested that we provide you with the credit assistance and other services. The maximum fee payable to Paleso Finance Group for this service is $990.00 (inc GST). This is a one off fee. The maximum fees and charges that will be payable the licensee to another person on your behalf is unascertainable. The actual amount will be confirmed in the credit proposal we present to you prior to your acceptance of the credit we have obtained. This fee will be payable at the time the funds are released by the credit provider. The maximum amount of fees and charges incurred by Paleso Finance Group for providing Credit Assistance to you is 50% of the income earned providing that Assistance. Included in the maximum amount of 50% are fees or charges incurred by Paleso Finance Group for receiving the referral of the Credit assistance as well as fees or charges incurred for conducting the Credit Assistance with the proposed lender. </span><br>
	<h2>Where can I find out additional information regarding this quote? </h2>
	<span>Should you have any questions about the information contained in this Credit Quote, please contact our head office on (07)49269740 </span><br>
	<h2>What do I do if I am ready to receive credit assistance? </h2>
	<span>To receive credit assistance you simply need to sign below. In doing this you are acknowledging and accepting the maximum fees, charges and commission associated with us providing you with credit assistance. A fully signed copy of this quote will be returned to your for your records. Once you have signed this quote we will conduct a preliminary assessment. This will enable us to determine if there is a suitable loan for you. If there is an suitable loan for you we will prepare a credit proposal for you to review prior to completing any transaction. The credit proposal will contain information on the finalised fees, charges and commissions payable for the Credit Assistance. No fees or charges are payable by any party if no Credit Assistance is provided. Any and all fees payable are one off fees payable upon settlement of the Credit Assistance. Fees payable are relevant to the time required to provide and offer the Credit Assistance.</span><br>
<br><br> <br> 
	<div align='center'>
      <span class='page_footer'>V2.1 Paul Sharkey Consulting Pty Ltd As Agents For Paleso Finance Group - Australian Credit Licence Number - 385787</span>
    </div>
    <br><br>
	<h2>This Credit Assistance this quote covers the following proposal---</h2><br>
    <span>Lender:</span> <br>
	<span>Specific purpose funds are being used for:</span> <br>
	<span>Maximum Amount Payable to Russell Parker Consulting if Credit Assistance is Provided:</span> <br><br>
	<span>If you accept these terms please sign and date the Quote where indicated and return it to Paleso Finance Group</span> <br>
	<br><br><br>
	<table style='width:700px;'>
       <tr>
	      <td>Signature:</td>
		  <td>Signature:</td>
	   </tr>
	   <tr>
	      <td>Name:</td>
		  <td>Name:</td>	   
	   </tr>
	   <tr>
	      <td>Date:</td>
		  <td></td>	   
	   </tr>
	</table>	
	<br><br>
	<span>Signature of Paleso Finance Group Representative</span>
	<br><br>
	<table style='width:700px;'>
       <tr>
	      <td>Signature:</td>
		  
	   </tr>
	   <tr>
	      <td>Name:</td>
		 	   
	   </tr>
	   <tr>
	      <td>Date:</td>
    
	   </tr>
	</table>	
	<br>
	<span>For and on behalf of Paleso Finance Group</span>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<div align='center'>
      <span class='page_footer'>V2.1 Paul Sharkey Consulting Pty Ltd As Agents For Paleso Finance Group - Australian Credit Licence Number - 385787</span>
    </div>
";
 $insurance_discloser="";//don't need it
 $file_checklist="";
 $deal_sheet="";
 $mandatory_disclsure="";
 $tax_invoice="";
 
$the_end="</body></html>";
 
$html=$html_start.$credit_quote.$the_end;
$dompdf = new DOMPDF();
$dompdf->load_html($html);

$dompdf->render();
$dompdf->set_paper("A4", "portrait");
$dompdf->stream("sample.pdf");
?>