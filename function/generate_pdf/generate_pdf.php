<?php  
require_once(dirname(__FILE__)."/dompdf/dompdf/dompdf_config.inc.php");
date_default_timezone_set("Australia/Brisbane");
$date=date("d/m/Y");
$app_id=$_GET['app_id'];

$servername = "localhost";
$username = "discov10_sean";       
$password1 = "19900825";         
$dbname = "discov10_usergenerate";
// Create connection
$conn = new mysqli($servername, $username, $password1, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql1 = "SELECT * FROM customer_table where application_id='".$app_id."'";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
		$mortgage=0;
		$rents=0;
		$hp_pl_commitments=0;
		$living_expense=0;
		if ($row['type_of_loan1']=='car_loan'){$type_of_loan1='Car Loan'; $hp_pl_commitments=$hp_pl_commitments+$row['repayment1'];}
		if ($row['type_of_loan1']=='credit_card'){$type_of_loan1='Credit Card'; $hp_pl_commitments=$hp_pl_commitments+$row['repayment1'];}
		if ($row['type_of_loan1']=='personal_loan'){$type_of_loan1='Personal Loan'; $hp_pl_commitments=$hp_pl_commitments+$row['repayment1'];}
		if ($row['type_of_loan1']=='investment_mortgage'){$type_of_loan1='Investment Mortgage'; $hp_pl_commitments=$hp_pl_commitments+$row['repayment1'];}
		if ($row['type_of_loan1']=='mortgage'){$type_of_loan1='Mortgage'; $mortgage=$mortgage+$row['repayment1'];}
		if ($row['type_of_loan1']=='overdraft'){$type_of_loan1='Overdraft'; $hp_pl_commitments=$hp_pl_commitments+$row['repayment1'];}
		if ($row['type_of_loan1']=='pay_day_loan'){$type_of_loan1='Pay Day Loan'; $hp_pl_commitments=$hp_pl_commitments+$row['repayment1'];}
		if ($row['type_of_loan1']=='white_good_rental'){$type_of_loan1='White Good Rental'; $hp_pl_commitments=$hp_pl_commitments+$row['repayment1'];}
		if ($row['type_of_loan1']=='salary_sacrafice'){$type_of_loan1='Salary Sacrafice'; $hp_pl_commitments=$hp_pl_commitments+$row['repayment1'];}
		if ($row['type_of_loan1']=='novated_lease'){$type_of_loan1='Novated Lease'; $hp_pl_commitments=$hp_pl_commitments+$row['repayment1'];}
		if ($row['type_of_loan1']=='chp'){$type_of_loan1='CHP';}
		
		if ($row['type_of_loan2']=='car_loan'){         $type_of_loan2='Car Loan';$hp_pl_commitments=$hp_pl_commitments+$row['repayment2'];}
		if ($row['type_of_loan2']=='credit_card'){      $type_of_loan2='Credit Card';$hp_pl_commitments=$hp_pl_commitments+$row['repayment2'];}
		if ($row['type_of_loan2']=='personal_loan'){    $type_of_loan2='Personal Loan';$hp_pl_commitments=$hp_pl_commitments+$row['repayment2'];}
		if ($row['type_of_loan2']=='investment_mortgage'){$type_of_loan2='Investment Mortgage';$hp_pl_commitments=$hp_pl_commitments+$row['repayment2'];}
		if ($row['type_of_loan2']=='mortgage'){         $type_of_loan2='Mortgage'; $mortgage=$mortgage+$row['repayment2'];}
		if ($row['type_of_loan2']=='overdraft'){        $type_of_loan2='Overdraft';$hp_pl_commitments=$hp_pl_commitments+$row['repayment2'];}
		if ($row['type_of_loan2']=='pay_day_loan'){     $type_of_loan2='Pay Day Loan';$hp_pl_commitments=$hp_pl_commitments+$row['repayment2'];}
		if ($row['type_of_loan2']=='white_good_rental'){$type_of_loan2='White Good Rental';$hp_pl_commitments=$hp_pl_commitments+$row['repayment2'];}
		if ($row['type_of_loan2']=='salary_sacrafice'){ $type_of_loan2='Salary Sacrafice';$hp_pl_commitments=$hp_pl_commitments+$row['repayment2'];}
		if ($row['type_of_loan2']=='novated_lease'){    $type_of_loan2='Novated Lease';$hp_pl_commitments=$hp_pl_commitments+$row['repayment2'];}
		if ($row['type_of_loan2']=='chp'){              $type_of_loan2='CHP';$hp_pl_commitments=$hp_pl_commitments+$row['repayment2'];}
		
		if ($row['type_of_loan3']=='car_loan'){         $type_of_loan3='Car Loan';$hp_pl_commitments=$hp_pl_commitments+$row['repayment3'];}
		if ($row['type_of_loan3']=='credit_card'){      $type_of_loan3='Credit Card';$hp_pl_commitments=$hp_pl_commitments+$row['repayment3'];}
		if ($row['type_of_loan3']=='personal_loan'){    $type_of_loan3='Personal Loan';$hp_pl_commitments=$hp_pl_commitments+$row['repayment3'];}
		if ($row['type_of_loan3']=='investment_mortgage'){$type_of_loan3='Investment Mortgage';$hp_pl_commitments=$hp_pl_commitments+$row['repayment3'];}
		if ($row['type_of_loan3']=='mortgage'){         $type_of_loan3='Mortgage';$mortgage=$mortgage+$row['repayment3'];}
		if ($row['type_of_loan3']=='overdraft'){        $type_of_loan3='Overdraft';$hp_pl_commitments=$hp_pl_commitments+$row['repayment3'];}
		if ($row['type_of_loan3']=='pay_day_loan'){     $type_of_loan3='Pay Day Loan';$hp_pl_commitments=$hp_pl_commitments+$row['repayment3'];}
		if ($row['type_of_loan3']=='white_good_rental'){$type_of_loan3='White Good Rental';$hp_pl_commitments=$hp_pl_commitments+$row['repayment3'];}
		if ($row['type_of_loan3']=='salary_sacrafice'){ $type_of_loan3='Salary Sacrafice';$hp_pl_commitments=$hp_pl_commitments+$row['repayment3'];}
		if ($row['type_of_loan3']=='novated_lease'){    $type_of_loan3='Novated Lease';$hp_pl_commitments=$hp_pl_commitments+$row['repayment3'];}
		if ($row['type_of_loan3']=='chp'){              $type_of_loan3='CHP';$hp_pl_commitments=$hp_pl_commitments+$row['repayment3'];}
		
		if ($row['type_of_loan4']=='car_loan'){         $type_of_loan4='Car Loan';$hp_pl_commitments=$hp_pl_commitments+$row['repayment4'];}
		if ($row['type_of_loan4']=='credit_card'){      $type_of_loan4='Credit Card';$hp_pl_commitments=$hp_pl_commitments+$row['repayment4'];}
		if ($row['type_of_loan4']=='personal_loan'){    $type_of_loan4='Personal Loan';$hp_pl_commitments=$hp_pl_commitments+$row['repayment4'];}
		if ($row['type_of_loan4']=='investment_mortgage'){$type_of_loan4='Investment Mortgage';$hp_pl_commitments=$hp_pl_commitments+$row['repayment4'];}
		if ($row['type_of_loan4']=='mortgage'){         $type_of_loan4='Mortgage';$mortgage=$mortgage+$row['repayment4'];}
		if ($row['type_of_loan4']=='overdraft'){        $type_of_loan4='Overdraft';$hp_pl_commitments=$hp_pl_commitments+$row['repayment4'];}
		if ($row['type_of_loan4']=='pay_day_loan'){     $type_of_loan4='Pay Day Loan';$hp_pl_commitments=$hp_pl_commitments+$row['repayment4'];}
		if ($row['type_of_loan4']=='white_good_rental'){$type_of_loan4='White Good Rental';$hp_pl_commitments=$hp_pl_commitments+$row['repayment4'];}
		if ($row['type_of_loan4']=='salary_sacrafice'){ $type_of_loan4='Salary Sacrafice';$hp_pl_commitments=$hp_pl_commitments+$row['repayment4'];}
		if ($row['type_of_loan4']=='novated_lease'){    $type_of_loan4='Novated Lease';$hp_pl_commitments=$hp_pl_commitments+$row['repayment4'];}
		if ($row['type_of_loan4']=='chp'){              $type_of_loan4='CHP';$hp_pl_commitments=$hp_pl_commitments+$row['repayment4'];}
		
        if ($row['are_you_presently']=='single'){
			$are_you_pre='Single';
			$living_expense=$living_expense+1150;
		}
		if ($row['are_you_presently']=='married'){
			$are_you_pre='Married';
			$living_expense=$living_expense+1600;
		}
		if ($row['are_you_presently']=='divorced'){
			$are_you_pre='Divorced';
			$living_expense=$living_expense+1150;
		}
		if ($row['are_you_presently']=='separated'){
			$are_you_pre='Separated';
			$living_expense=$living_expense+1150;
		}
		if ($row['are_you_presently']=='widowed'){
			$are_you_pre='Widowed';
			$living_expense=$living_expense+1150;
		}
		if ($row['are_you_presently']=='defacto'){
			$are_you_pre='Defacto';
			$living_expense=$living_expense+1600;
		}
		if ($row['is_your_home']=='your_own'){
			$is_you_home='You Own';
		}
		if ($row['is_your_home']=='rented'){
			$is_you_home='Rented';
			$rents=$rents+$row['Rent_value'];	
                 if (($row['Half_full_rent']!='')||($row['Half_full_rent']!='0')){
                               $rents=round($rents/$row['Half_full_rent']);
                           } 
			
		}
		if ($row['is_your_home']=='mortgaged'){
			$is_you_home='Mortgaged';
			$mortgage=$mortgage+$row['Rent_value'];
		}
		if ($row['is_your_home']=='boarding'){
			$is_you_home='Boarding';
		}
		if ($row['is_your_home']=='living_with_relatives'){
			$is_you_home='Living With Relatives';
		}
		if ($row['no_of_dependents']>0){  $living_expense=$living_expense+$row['no_of_dependents']*225;  }
		IF ($row['credit_history']=='yes'){
		  $credit_history_word=' <p style="width:100px; position:absolute; top:470px;   left:600px;   font-size:15px; ">-------->Yes</p>';				
		}
		IF ($row['credit_history']=='no'){
		  $credit_history_word=' <p style="width:100px; position:absolute; top:470px;   left:600px;   font-size:15px; ">-------->No</p>';		
		}
		IF ($row['financial_stress']=='yes'){
		  $financial_stress_word=' <p style="width:100px; position:absolute; top:525px;   left:600px;   font-size:15px; ">-------->Yes</p>';				
		}
		IF ($row['financial_stress']=='no'){
		  $financial_stress_word=' <p style="width:100px; position:absolute; top:525px;   left:600px;   font-size:15px; ">-------->No</p>';		
		}
		
$html =
  '
  <style>
 
  .with_border table, td, th {
    border: 1px solid black;
	text-align:left
	margin:0px;
}
  </style>
  <html>
  <body style=" margin: 0px; font-size:11px;  "> 
  <div align="center" style="font-size:20px;"><p>PALESO APPLICATION</p></div> 
   
   <div style="width:450px; position:absolute; top:50px; left:10px;"><span>AUTHORITY TO PROCEED - (read to customer prior to taking application) - Over and above any brokerage fee we charge you for
our services, we may receive commissions from the lenders.  If you have been referred to us, you agree that out of our income, the 
referer may be paid.<br>
DECLARATION OF AUTHORITY - (read to customer prior to taking application) - You hereby give Paleso Finance Group authority
to proceed with the loan application to a final decision by the lenders it has relationships with based on all the information provided and agree
to sign this authority at a later stage, but prior to entering into an credit contract.<br>
YES  /  NO       Date: _____ / _____ / _____       Signed by Authorised Rep : _________________________   </span></div> 
   
   <table style="width:250px; position:absolute; top:30px; left:470px;" class= "with_border">
	   <tr>
	     <td>Date:</td>
		 <td>'.$date.'</td>
	   </tr>
	   <tr>
	     <td>Dealer:</td>
		 <td>'.$row['dealer'].'</td>
	   </tr>
	   <tr>
	     <td>Purchase Price:</td>
		 <td>'.$row['purchase_price'].'</td>
	   </tr>
	   <tr>
	     <td>Less Cash Deposit:</td>
		 <td>'.$row['less_cash_deposit'].'</td>
	   </tr>
	   <tr>
	     <td>Less Trade-In:</td>
		 <td>'.$row['less_trade_in'].'</td>
	   </tr>
	   <tr>
	     <td>Sub Total:</td>
		 <td>'.$row['sub_total_dealer'].'</td>
	   </tr>
	   <tr>
	     <td>Comprehensive Ins:</td>
		 <td>'.$row['comprehensive_ins'].'</td>
	   </tr>
	   <tr>
	     <td>Gap Insurance:</td>
		 <td>'.$row['gap_insurance'].'</td>
	   </tr>
	   <tr>
	     <td>Brokerage:</td>
		 <td>'.$row['brokerage'].'</td>
	   </tr>
	   <tr>
	     <td>Loan Protection:</td>
		 <td>'.$row['loan_protection'].'</td>
	   </tr>
	    <tr>
	     <td>Warrantly:</td>
		 <td>'.$row['warranty'].'</td>
	   </tr>
	    <tr>
	     <td>Term Requested:</td>
		 <td>'.$row['term_requested'].'</td>
	   </tr>
	    <tr>
	     <td>Rate Requested:</td>
		 <td>'.$row['rate_requested'].'%'.'</td>
	   </tr>
	    <tr>
	     <td>Payment Requested:</td>
		 <td>'.$row['payment_requested'].'</td>
	   </tr>
     </table>
	 <table style="width:450px;  position:absolute; top:160px; left:10px;" >
     <tr>
	     <td>Make:</td>
		 <td>'.$row['make'].'</td>
	 </tr>
     <tr>
	     <td>Model:</td>
		 <td>'.$row['model'].'</td>
	   </tr>
	   <tr>
	     <td>Accessories:</td>
		 <td>'.$row['accessories'].'Km'.'</td>
	   </tr>
  </table>  
  <p style=" position:absolute;  font-size:15px; top:209px; left:10px;"><b>Trade Details</b></p>  
  <table style="width:200px; position:absolute;   top:245px; left:10px;" >
     <tr>
	     <td>Year:</td>
		 <td>'.$row['year'].'</td>
	 </tr>
     <tr>
	     <td>Make</td>
		 <td></td>
	   </tr>
	   <tr>
	     <td>Model:</td>
		 <td></td>
	   </tr>
  </table>  
  <table style="width:200px; position:absolute;   top:245px; left:220px;" >
     <tr>
	     <td>Amount:$</td>
		 <td>'.$row['amount'].'</td>
	 </tr>
     <tr>
	     <td>Payout:$</td>
		 <td>'.$row['payout'].'</td>
	   </tr>
	   <tr>
	     <td>Equity:$</td>
		 <td>'.$row['equity'].'</td>
	   </tr>
  </table>  
  <div align="center">
  <p style="width:700px; position:absolute; height:16px; top:295px; left:10px; background: #AFACAC; font-size:15px; "><b>Personal Details</b></p>
  </div>	 
  <table style="width:700px; position:absolute; top:325px; left:10px;">
	 <tr>
	   <th>Title</th>
	   <th>Family Name</th>
	   <th>Given Name</th>
	   <th>Licence No.</th>
	   <th>Expires</th>
	   <th>Date of Birth</th>
       <th>Age</th>   
	 </tr>
	 <tr>
	    <td>'.$row['Borrow1_title'].'</td>
		<td>'.$row['Borrow1_familyname'].'</td>
		<td>'.$row['Borrow1_givenname'].'</td>
		<td>'.$row['Borrow1_licenceno'].'</td>
		<td>'.$row['Borrow1_expir_date'].'/'.$row['Borrow1_expir_month'].'/'.$row['Borrow1_expir_year'].'</td>
		<td>'.$row['Borrow1_bir_date'].'/'.$row['Borrow1_bir_month'].'/'.$row['Borrow1_bir_year'].'</td>
		<td>'.$row['Borrow1_age'].'</td>
		
	 </tr>	 
    </table> 
	 <table style="width:700px; position:absolute; top:368px; left:10px;">
	 <tr>
	   <th>Title</th>
	   <th>Family Name</th>
	   <th>Given Name</th>
	   <th>Licence No.</th>
	   <th>Expires</th>
	   <th>Date of Birth</th>
       <th>Age</th>   
	 </tr>
	 <tr>
	    <td>'.$row['Borrow2_title'].'</td>
		<td>'.$row['Borrow2_familyname'].'</td>
		<td>'.$row['Borrow2_givenname'].'</td>
		<td>'.$row['Borrow2_licenceno'].'</td>
		<td>'.$row['Borrow2_expir_date'].'/'.$row['Borrow2_expir_month'].'/'.$row['Borrow2_expir_year'].'</td>
		<td>'.$row['Borrow2_bir_date'].'/'.$row['Borrow2_bir_month'].'/'.$row['Borrow2_bir_year'].'</td>
		<td>'.$row['Borrow2_age'].'</td>
		
	 </tr>	 
    </table>
    <table style="width:700px; position:absolute; top:408px; left:10px;">
	 <tr>
	   <th style="width:445px;">Street Address</th>
	   <th style="width:45px;">Postcode</th>
	   <th style="width:25px;">Yrs</th>
	   <th style="width:25px;">Mths</th>
	   <th style="width:85px;">Home Telephone</th>
	      
	 </tr>
	 <tr>
	    <td>'.'&nbsp;'.$row['street_adress'].'</td>
		<td>'.$row['postcode_1_1'].$row['postcode_1_2'].$row['postcode_1_3'].$row['postcode_1_4'].'</td>
		<td>'.$row['street1_year'].'</td>
		<td>'.$row['street1_month'].'</td>
		<td>'.$row['home_telephone'].'</td>
 	
	 </tr>	 
    </table>
	<table style="width:700px; position:absolute; top:448px; left:10px;">
	 <tr>
	   <th style="width:445px;">Previous Address</th>
	   <th style="width:45px;">Postcode</th>
	   <th style="width:25px;">Yrs</th>
	   <th style="width:25px;">Mths</th>
	   <th style="width:85px;">Borrower1 Mobile</th>
	      
	 </tr>
	 <tr>
	    <td>'.'&nbsp;'.$row['pre_address'].'</td>
		<td>'.$row['postcode_2_1'].$row['postcode_2_2'].$row['postcode_2_3'].$row['postcode_2_4'].'</td>
		<td>'.$row['streetp1_year'].'</td>
		<td>'.$row['streetp1_month'].'</td>
		<td>'.$row['borrow1_mobile'].'</td>
		 
		
	 </tr>	 
    </table>
	<table style="width:700px; position:absolute; top:488px; left:10px;">
	 <tr>
	   <th style="width:445px;">Second Previous Address</th>
	   <th style="width:45px;">Postcode</th>
	   <th style="width:25px;">Yrs</th>
	   <th style="width:25px;">Mths</th>
	   <th style="width:85px;">Borrower2 Mobile</th>
	      
	 </tr>
	 <tr>
	    <td>'.'&nbsp;'.$row['pre_address2'].'</td>
		<td>'.$row['postcode_3_1'].$row['postcode_3_2'].$row['postcode_3_3'].$row['postcode_3_4'].'</td>
		<td>'.$row['streetp2_year'].'</td>
		<td>'.$row['streetp2_month'].'</td>
		<td>'.$row['borrow2_mobile'].'</td>
		 
		
	 </tr>	 
    </table>
	<table style="width:700px; position:absolute; top:528px; left:10px;">
	 <tr>
	   <th>Email:</th>
	   <th>Marriage Status</th>
	   <th>Number Of Dependents:</th>
	   <th>Children Maintaince</th>
	  
	 </tr>
	 <tr>
	  
	   <td>'.$row['Email'].'</td>
       <td>'.$are_you_pre.'</td>   
	   <td>'.$row['no_of_dependents'].'</td>   
 	   <td>'.'$'.$row['child_maintaince'].'</td>  
	 </tr>
 
    </table>
 
	<table style="width:700px; position:absolute; top:568px; left:10px;">
	  <tr>
	   <th>Residential Status</th>
	   <th>Rent</th>
	   <th>Landlord</th>
	   <th>Telephone</th>
	   <th>Number of People Share the Rent</th>
	      
	 </tr>
	 <tr>
	    <td>'.$is_you_home.'</td>
	    <td>'.$row['Rent_value'].'</td>
		<td>'.$row['landlord_name'].'</td>
		<td>'.$row['telephone_landlord'].'</td>
		<td>'.$row['Half_full_rent'].'</td>
		 
		
	 </tr>	 
    </table>
	
	
	
	<div align="center">
      <p style="width:700px; position:absolute; top:598px; left:10px; background: #AFACAC; font-size:15px; "><b>Employement</b></p>
    </div>
	
	<table style="width:700px; position:absolute; top:630px; left:10px;">
	  <tr>
	   <th style="width:150px;">Borrower1 (Previous) Occupation</th>
	   <th style="width:315px;">Employer Name&Address</th>
	   <th style="width:25px;">Yrs</th>
	   <th style="width:25px;">Mths</th>
	   <th style="width:85px;">Business Phone</th>
   
	 </tr>
	 <tr>
	    <td>'.'&nbsp;'.$row['borrower1_occupa'].'</td>
		<td>'.$row['borrower1_employername'].'</td>
		<td>'.$row['borrower1_year'].'</td>
		<td>'.$row['borrower1_month'].'</td>		
		<td>'.$row['borrower1_business_phone1'].'</td>
 	
	 </tr>	
     <tr>
	    <td>'.'&nbsp;'.$row['borrower1_prev_occupa'].'</td>
		<td>'.$row['borrower1_prev_employername'].'</td>
		<td>'.$row['borrower1_prev_year'].'</td>
		<td>'.$row['borrower1_prev_month'].'</td>	
		<td>'.$row['borrower1_business_phone2'].'</td>
 	
	 </tr>
</table>
<table style="width:700px; position:absolute; top:700px; left:10px;">
    <tr> 
	   <th>Gross</th>
	   <th>Net</th>
	   <th>Centerlink Income</th>
	   <th>Other Income</th>
	</tr>
    <tr>
	    <td>'.'$'.$row['borrower1_gross'].'</td>
		<td>'.'$'.$row['borrower1_net'].'</td>
		<td>'.'$'.$row['borrower1_centrelink'].'</td>
		<td>'.'$'.$row['borrower1_prev_net'].'</td>
	</tr>
</table>

<table style="width:700px; position:absolute; top:740px; left:10px;">
	  <tr>
	   <th style="width:150px;">Borrower2 (Previous) Occupation</th>
	   <th style="width:315px;">Employer Name&Address</th>
	   <th style="width:25px;">Yrs</th>
	   <th style="width:25px;">Mths</th>
	   <th style="width:85px;">Business Phone</th>
   
	 </tr> 
<tr>
	    <td>'.'&nbsp;'.$row['borrower2_occupa'].'</td>
		<td>'.$row['borrower2_employername'].'</td>
		<td>'.$row['borrower2_year'].'</td>
		<td>'.$row['borrower2_month'].'</td>		
		<td>'.$row['borrower2_business_phone1'].'</td>
 	
	 </tr>
<tr>
	    <td>'.'&nbsp;'.$row['borrower2_prev_occupa'].'</td>
		<td>'.$row['borrower2_prev_employername'].'</td>
		<td>'.$row['borrower2_prev_year'].'</td>
		<td>'.$row['borrower2_prev_month'].'</td>		
		<td>'.$row['borrower2_business_phone2'].'</td>	
	 </tr>	 
</table>
<table style="width:700px; position:absolute; top:800px; left:10px;">
    <tr> 
	   <th>Gross</th>
	   <th>Net</th>
	   <th>Centerlink Income</th>
	   <th>Other Income</th>
	</tr>
    <tr>
	    <td>'.'$'.$row['borrower2_gross'].'</td>
		<td>'.'$'.$row['borrower2_net'].'</td>
		<td>'.'$'.$row['borrower2_centrelink'].'</td>
		<td>'.'$'.$row['borrower2_prev_net'].'</td>
	</tr>
</table>
	<div align="center">
      <p style="width:700px; position:absolute; top:830px; left:10px; background: #AFACAC; font-size:15px; "><b>Credit Liabilities</b></p>
    </div>
	<table style="width:700px; position:absolute; top:865px; left:10px;">
	  <tr>
	   <th style="width:75px;">Company</th>
	   <th style="width:100px;">Type of Loan</th>
	   <th style="width:300px;">Details</th>
	   <th style="width:65px;">Repayment</th>
	   <th style="width:65px;">Balance</th>
	   <th style="width:65px;">Limit</th>
	 </tr>
	  <tr>
	    <td>'.'&nbsp;'.$row['company1'].'</td>
	    <td>'.$type_of_loan1.'</td>
	    <td>'.$row['details1'].'</td>
	    <td>'.'$'.$row['repayment1'].'</td>
	    <td>'.$row['balance1'].'</td>
	    <td>'.$row['limit1'].'</td>
	  </tr>
	  <tr>
	    <td>'.'&nbsp;'.$row['company2'].'</td>
	    <td>'.$type_of_loan2.'</td>
	    <td>'.$row['details2'].'</td>
	    <td>'.'$'.$row['repayment2'].'</td>
	    <td>'.$row['balance2'].'</td>
	    <td>'.$row['limit2'].'</td>
	  </tr>
	  <tr>
	    <td>'.'&nbsp;'.$row['company3'].'</td>
	    <td>'.$type_of_loan3.'</td>
	    <td>'.$row['details3'].'</td>
	    <td>'.'$'.$row['repayment3'].'</td>
	    <td>'.$row['balance3'].'</td>
	    <td>'.$row['limit3'].'</td>
	  </tr>
	  <tr>
	    <td>'.'&nbsp;'.$row['company4'].'</td>
	    <td>'.$type_of_loan4.'</td>
	    <td>'.$row['details4'].'</td>
	    <td>'.'$'.$row['repayment4'].'</td>
	    <td>'.$row['balance4'].'</td>
	    <td>'.$row['limit4'].'</td>
	  </tr>
	 
	 
	 </table>
	
	
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  
	
	<div align="center">
      <p style="width:300px; position:absolute;  height:20px; left:10px; background: #AFACAC; font-size:15px; "><b>Liabilities</b></p>
    </div>
    <table style="width:300px; position:absolute; left:10px; top:25px; ">
	  <tr>
	    <td>First Mortgage</td>
	    <td>'.$row['first_mortgage1'].'</td>	
        <td>'.'$'.$row['first_mortgage2'].'</td>		
	  </tr>
	  <tr>
	    <td>Second Mortgage</td>
	    <td>'.$row['second_mortgage1'].' </td>	
        <td>'.'$'.$row['second_mortgage2'].' </td>		    
	  </tr>
	  <tr>
	    <td>Hire Purchase</td>
	    <td>'.$row['hire_purchases1'].' </td>	
        <td>'.'$'.$row['hire_purchases2'].' </td>		    
	  </tr>
	  <tr>
	    <td>Personal Loan/s</td>
	    <td>'.$row['personal_loan1'].' </td>	
        <td>'.'$'.$row['personal_loan2'].' </td>		    
	  </tr>
	  <tr>
	    <td>Bank Overdraft</td>
	    <td>'.$row['bank_overdraft1'].' </td>	
        <td>'.'$'.$row['bank_overdraft2'].' </td>		    
	  </tr>
	  <tr>
	    <td>Other Liabilities</td>
	    <td>'.$row['other_liab11'].' </td>	
        <td>'.'$'.$row['other_liab12'].' </td>		    
	  </tr>
	  <tr>
	    <td>Other Liabilities</td>
	    <td>'.$row['other_liab21'].' </td>	
        <td>'.'$'.$row['other_liab22'].' </td>		    
	  </tr>
	  <tr>
	    <td>Other Liabilities</td>
	    <td>'.$row['other_liab31'].' </td>	
        <td>'.'$'.$row['other_liab32'].' </td>		    
	  </tr>
	  <tr>
	    <td>Total</td>
	    <td></td>	
        <td>'.'$'.$row['total_liab'].' </td>		    
	  </tr>
	</table>
	
	<div align="center">
      <p style="width:300px; position:absolute;  height:20px; left:400px; background: #AFACAC; font-size:15px; "><b>Assets</b></p>
    </div>
    <table style="width:300px; position:absolute; left:400px; top:25px; ">
	  <tr>
	    <td>House</td>
	    <td>'.$row['house_ass1'].' </td>	
        <td>'.'$'.$row['house_ass2'].' </td>		
	  </tr>
	  <tr>
	    <td>Contents</td>
	    <td>'.$row['content_ass1'].' </td>	
        <td>'.'$'.$row['content_ass2'].' </td>		    
	  </tr>
	  <tr>
	    <td>Car</td>
	    <td>'.$row['car_ass11'].' </td>	
        <td>'.'$'.$row['car_ass12'].' </td>		    
	  </tr>
	  <tr>
	    <td>Car</td>
	    <td>'.$row['car_ass21'].' </td>	
        <td>'.'$'.$row['car_ass22'].' </td>		    
	  </tr>
	  <tr>
	    <td>Bank Accounts</td>
	    <td>'.$row['bank_account_ass1'].' </td>	
        <td>'.'$'.$row['bank_account_ass2'].' </td>		    
	  </tr>
	  <tr>
	    <td>Shares</td>
	    <td>'.$row['share_ass1'].' </td>	
        <td>'.'$'.$row['share_ass2'].' </td>		    
	  </tr>
	  <tr>
	    <td>Other</td>
	    <td>'.$row['other_ass11'].' </td>	
        <td>'.'$'.$row['other_ass12'].' </td>		    
	  </tr>
	  <tr>
	    <td>Total</td>
	    <td></td>	
        <td>'.'$'.$row['total_ass'].' </td>		    
	  </tr>
	</table>
	
	<div align="center">
      <p style="width:300px; position:absolute; top:180px; height:20px;  left:10px; background: #AFACAC; font-size:15px; "><b>Monthly Expenditure</b></p>
    </div>
    <table style="width:300px; position:absolute;top:220px;  left:10px; ">
	  <tr>
	    <th>Debt</th>
	    <th>Details</th>	
        <th>Amount</th>		
	  </tr>
	  <tr>
	    <td>Mortgage Repayments</td>
	    <td> </td>	
        <td>$'.$mortgage.'</td>		
	  </tr>
	  <tr>
	    <td>Rent/Rates/etc</td>
	    <td>  </td>	
        <td>$'.$rents.'</td>		    
	  </tr>
	  <tr>
	    <td>Medical Insurance</td>
	    <td>  </td>	
        <td>$ </td>		    
	  </tr>
	  <tr>
	    <td>HP and PL Commitments</td>
	    <td>  </td>	
        <td>$'.$hp_pl_commitments.'</td>		    
	  </tr>
	  <tr>
	    <td>Living Expenses</td>
	    <td>  </td>	
        <td>$'.$living_expense.' </td>		    
	  </tr>
	  
	  <tr>
	    <td>Total</td>
	    <td></td>	
        <td>$'.($mortgage+$rents+$hp_pl_commitments+$living_expense).'</td>		    
	  </tr>
	</table>
	
	<div align="center">
      <p style="width:300px; position:absolute; top:180px; height:20px;  left:400px; background: #AFACAC; font-size:15px; "><b>Monthly Income</b></p>
    </div>
    <table style="width:300px; position:absolute;top:220px;  left:400px; ">
	  <tr>
	    <th>Income</th>
	    <th>Gross</th>	
        <th>Net</th>		
	  </tr>
	  <tr>
	    <td>Borrow1 Salary</td>
	    <td>'.'$'.$row['borrower1_gross'].' </td>	
        <td>'.'$'.$row['borrower1_net'].' </td>		
	  </tr>
	  <tr>
	    <td>Borrow2 Salary</td>
	    <td>'.'$'.$row['borrower2_gross'].' </td>	
        <td>'.'$'.$row['borrower2_net'].' </td>		    
	  </tr>
	  <tr>
	    <td>Borrow1 CenterLink</td>
	    <td>  </td>	
        <td>'.'$'.$row['borrower1_centrelink'].' </td>		    
	  </tr>
	  <tr>
	    <td>Borrow2 CenterLink</td>
	    <td>  </td>	
        <td>'.'$'.$row['borrower2_centrelink'].' </td>		    
	  </tr>
	  <tr>
	    <td>Other Income</td>
	    <td>  </td>	
        <td>'.'$'.($row['borrower1_prev_net']+$row['borrower2_prev_net']).' </td>		    
	  </tr>
	  
	  <tr>
	    <td>Total</td>
	    <td></td>	
        <td>'.'$'.($row['borrower1_net']+$row['borrower2_net']+$row['borrower1_centrelink']+$row['borrower2_centrelink']+$row['borrower1_prev_net']+$row['borrower2_prev_net']).' </td>		    
	  </tr>
	</table>
    <table style="width:700px; position:absolute; top:360px; left:10px;">
	<tr>
      <th>Living Expenses--Application 1</th>
	  <th>Living Expenses--Application 2</th>
	</tr>
	<tr>
      <td>$'.$row['share_living_ex1'].'</td>
	  <td>$'.$row['share_living_ex2'].'</td>
	</tr>
	</table>
	<table style="width:700px; position:absolute; top:405px; left:10px;">
	  <tr>
	    <td>Bank Detail</td>
	    <td>'.$row['bank_details'].'</td>
        <td>Phone No.</td>
	    <td> '.$row['bank_phone'].'</td>		    
	  </tr> 
	  <tr>
	    <td>Nearest Rela 1</td>
		<td>'.$row['nearst_rela1'].'</td>
	    <td>Phone No.</td>
	    <td>'.$row['rela1_phone'].'</td>	    
	  </tr>
	  <tr>
	    <td>Nearest Rela 2</td>
		<td>'.$row['nearst_rela2'].'</td>
	    <td>Phone No.</td>
	    <td> '.$row['rela2_phone'].'</td>	    
	  </tr>
	</table>
	 <p style="width:550px; position:absolute; top:470px;   left:10px;   font-size:15px; "><b>Is there anything in your credit history that would stop you from getting a loan?</b></p>
    
	 '.$credit_history_word.'
     <p style="width:550px; position:absolute; top:470px;   left:10px;   font-size:11px; ">If Yes,Please Explain:</p>
	 <p style="width:550px; position:absolute; top:485px;   left:10px;   font-size:11px; ">'.$row['reason1'].'</p>
	 
	 <p style="width:550px; position:absolute; top:525px;   left:10px;   font-size:15px; "><b>Are you experiencing financial stress or hardship?</b></p>
    
	 '.$financial_stress_word.'
     <p style="width:550px; position:absolute; top:545px;   left:10px;   font-size:11px; ">If Yes,Please Explain:</p>
	 <p style="width:550px; position:absolute; top:560px;   left:10px;   font-size:11px; ">'.$row['reason2'].'</p>
	 
	 <p style="width:550px; position:absolute; top:600px;   left:10px;   font-size:15px; "><b>Notes:</b></p>
	 <p style="width:550px; position:absolute; top:615px;   left:10px;   font-size:11px; ">'.$row['final_notes'].'</p>
	 
	 <div align="center">
      <p style="width:700px; position:absolute; top:670px; height:20px;  left:10px; background: #AFACAC; font-size:15px; "><b>Disclaimer</b></p>
    </div>
	<p style="width:700px; position:absolute; top:710px;   left:10px;   font-size:12px; ">The information relating to this application has been provided by the applicant of this agent.
We have not verified its authenticity nor formed any view of the financial condition or the affairs of the Borrower. We take no responsibility for any errors or omissions. The finance provider should make its own assessment of the financial condition and of the affairs of the Borrower.</p>
   
   <table style="width:700px; height:200px; position:absolute; top:760px;   left:10px; font-size:12px;" >
   <tr>
   <th colspan="2"> 
    <span  >I/We am/are over the age of 18 years and I/We am/are not an undercharged bankrupt. I/We hereby authorize you to make any enquiries relating to this application. I/We declare that the information given here is true and correct.</span>
       <div  style="width:700px; position:relative; top:0px;   left:10px; font-size:12px;">
         <table    style="  width: 700px;">
		   <tr>
		      <td style=" border: 0px solid black;">
			     <p>Signature_____________________________   </p>
                 <p>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      _____________________________		</p>	
                 <p>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      _____________________________		</p>		 
			  </td >
			  <td style=" border: 0px solid black;">
			  <p>Signature_____________________________   </p>
                 <p>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      _____________________________		</p>	
                 <p>Date&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     _____________________________		</p>	
			  </td>
		   </tr>
		</table>
	   </div>
   
   </th>
      
   </tr>
   <tr  >
   <td>
   
      A.V.2.1.-.MARCH.2012 <br> 
	  Paul Sharkey Consulting Pty Ltd ATF The P&C Sharkey Family Trust --- ABN: 93955416870 --- AUSTRALIAN.CREDIT.LICENCE.#.385787 <br>
	   
   
   </td>
   <td>
   Paleso Finance Group  <br> 831 Beaudesert Road, Coopers Plains , QLD, 4108 <br>  (04) 07695162 --- Phone (1300) 878488 <br>  paul.sharkey@paleso.com.au 
   
   </td>
   </tr>
   
   </table>
 </body></html>';
 
	}		
}
$dompdf = new DOMPDF();
$dompdf->load_html($html);

$dompdf->render();
$dompdf->set_paper("A4", "portrait");
$dompdf->stream("sample.pdf");


?>