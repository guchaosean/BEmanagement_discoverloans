<?php 
   $app_id=$_GET['app_id'];
   $servername = "localhost";
   $username = "discov10_sean";
   $password = "19900825";
   $dbname = "discov10_usergenerate";

   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   } 
 
   $sql1 = "SELECT * FROM customer_table where  application_id like '%".$app_id."%'";
 
   $result1 = $conn->query($sql1);
   if ($result1->num_rows > 0) {
	 
	while($row = $result1->fetch_assoc()) {
		if ($row['credit_history']=='no'){
			$credit_his_word='<option value="yes">Yes</option>
			                 <option value="no" selected>No</option>';
		}else{
			$credit_his_word='<option value="yes" selected>Yes</option>
			                  <option value="no" >No</option>';
		}
		if ($row['financial_stress']=='no'){
			$financial_stress_word='<option value="yes">Yes</option>
			                        <option value="no" selected>No</option>	';
		}else{
			$financial_stress_word='<option value="yes" selected>Yes</option>
			                        <option value="no" >No</option>	';
		}
		if ($row['is_your_home']=='your_own'){
			$is_your_home_word='<option value="your_own" selected>Your Own</option>
			  <option value="rented">Rented</option>
			  <option value="mortgaged">Mortgaged</option>
			  <option value="boarding">Boarding</option>
			  <option value="living_with_relatives">Living with relatives</option> ';
		}
		if ($row['is_your_home']=='rented'){
			$is_your_home_word='<option value="your_own" >Your Own</option>
			  <option value="rented" selected>Rented</option>
			  <option value="mortgaged">Mortgaged</option>
			  <option value="boarding">Boarding</option>
			  <option value="living_with_relatives">Living with relatives</option> ';
		}
		if ($row['is_your_home']=='mortgaged'){
			$is_your_home_word='<option value="your_own" >Your Own</option>
			  <option value="rented">Rented</option>
			  <option value="mortgaged" selected>Mortgaged</option>
			  <option value="boarding">Boarding</option>
			  <option value="living_with_relatives">Living with relatives</option> ';
		}
		if ($row['is_your_home']=='boarding'){
			$is_your_home_word='<option value="your_own" >Your Own</option>
			  <option value="rented">Rented</option>
			  <option value="mortgaged">Mortgaged</option>
			  <option value="boarding" selected>Boarding</option>
			  <option value="living_with_relatives">Living with relatives</option> ';
		}
		if ($row['is_your_home']=='living_with_relatives'){
			$is_your_home_word='<option value="your_own" >Your Own</option>
			  <option value="rented">Rented</option>
			  <option value="mortgaged">Mortgaged</option>
			  <option value="boarding">Boarding</option>
			  <option value="living_with_relatives" selected>Living with relatives</option> ';
		}
		if ($row['are_you_presently']=='single'){
			$are_you_presently_word='<option value="single" selected>Single</option>
			  <option value="married">Married</option>
			  <option value="divorced">Divorced</option>
			  <option value="separated">Separated</option>
			  <option value="widowed">Widowed</option> 
			  <option value="defacto">Defacto</option> ';
		}
		if ($row['are_you_presently']=='married'){
			$are_you_presently_word='<option value="single" >Single</option>
			  <option value="married" selected>Married</option>
			  <option value="divorced">Divorced</option>
			  <option value="separated">Separated</option>
			  <option value="widowed">Widowed</option> 
			  <option value="defacto">Defacto</option> ';
		}
		if ($row['are_you_presently']=='divorced'){
			$are_you_presently_word='<option value="single" >Single</option>
			  <option value="married">Married</option>
			  <option value="divorced" selected>Divorced</option>
			  <option value="separated">Separated</option>
			  <option value="widowed">Widowed</option> 
			  <option value="defacto">Defacto</option> ';
		}
		if ($row['are_you_presently']=='separated'){
			$are_you_presently_word='<option value="single" >Single</option>
			  <option value="married">Married</option>
			  <option value="divorced">Divorced</option>
			  <option value="separated" selected>Separated</option>
			  <option value="widowed">Widowed</option> 
			  <option value="defacto">Defacto</option> ';
		}
		if ($row['are_you_presently']=='widowed'){
			$are_you_presently_word='<option value="single" >Single</option>
			  <option value="married">Married</option>
			  <option value="divorced">Divorced</option>
			  <option value="separated">Separated</option>
			  <option value="widowed" selected>Widowed</option> 
			  <option value="defacto">Defacto</option> ';
		}
		if ($row['are_you_presently']=='defacto'){
			$are_you_presently_word='<option value="single" >Single</option>
			  <option value="married">Married</option>
			  <option value="divorced">Divorced</option>
			  <option value="separated">Separated</option>
			  <option value="widowed">Widowed</option> 
			  <option value="defacto" selected>Defacto</option> ';
		}
		
		
?>
    


<html>
<head>
<!-- jQuery --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- jQuery easing plugin --> 
<script src="js/jquery.easing.min.js" type="text/javascript"></script> 
<script src="test.js" type="text/javascript"></script> 
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script>
function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}
$( document ).ready(function() {
      $('#per_birthday_1').blur(function() {
	      var text=$('#per_birthday_1').val();
          var res = text.split("/");
	      var bir1=getAge(res[1]+"/"+res[0]+"/"+res[2]);
		  $('#per_age_1').val(bir1);
 
	  });
	   $('#per_birthday_2').blur(function() {
	      var text=$('#per_birthday_2').val();
          var res = text.split("/");
	      var bir1=getAge(res[1]+"/"+res[0]+"/"+res[2]);
		  $('#per_age_2').val(bir1);
	  });
	  $("input").blur(function(){
	      var sub_total=parseInt($('#veh_sub_total').val())+parseInt($('#veh_compre_ins').val())+parseInt($('#veh_gap_ins').val())+parseInt($('#veh_brokerage').val())+parseInt($('#veh_loan_pro').val())+parseInt($('#veh_warranty').val());
		  var term=$('#veh_term_req').val();
		  var rate=$('#veh_rate_req').val();
		  var rate_n=rate/1200;
		  var term_n=term*12/12;
		  var total=(rate_n*sub_total)/(1-Math.pow((1+rate_n),-term_n));
		  if ((sub_total!='') &&(term!='')&&(rate!='')){
		      $('#veh_payment_req').val(Math.round(total));
		  }
	      if ((sub_total=='') ||(term=='')||(rate=='')){ 
		     $('#veh_payment_req').val('');
		  }
		  var lib_mortgage1=parseInt($('#liaass_firstmortgage_2').val());
		  var lib_mortgage2=parseInt($('#liaass_secondmortgage_2').val());
		  var lib_hirepurchase=parseInt($('#liaass_hirepurchase_2').val());
		  var lib_personalloan=parseInt($('#liaass_personalloan_2').val());
		  var lib_bankoverdraft=parseInt($('#liaass_bankoverdraft_2').val());
		  var lib_otherlib1=parseInt($('#liaass_otherliabities_12').val()); 
		  var lib_otherlib2=parseInt($('#liaass_otherliabities_22').val()); 
		  var lib_otherlib3=parseInt($('#liaass_otherliabities_32').val());  		  
		  $('#liaass_lib_total').val(lib_mortgage1+lib_mortgage2+lib_hirepurchase+lib_personalloan+lib_bankoverdraft+lib_otherlib1+lib_otherlib2+lib_otherlib3);
		  
		  var ass_house=parseInt($('#liaass_house_2').val());
		  var ass_content=parseInt($('#liaass_content_2').val());
		  var ass_car1=parseInt($('#liaass_car_12').val());
		  var ass_car2=parseInt($('#liaass_car_22').val());
		  var ass_bankaccout=parseInt($('#liaass_bankaccount_2').val());
		  var ass_share=parseInt($('#liaass_share_2').val());
		  var ass_other1=parseInt($('#liaass_other_12').val());
		  var ass_other2=parseInt($('#liaass_other_22').val());
		  $('#liaass_asset_total').val(ass_house+ass_content+ass_car1+ass_car2+ass_bankaccout+ass_share+ass_other1+ass_other2 );
		  
	  });
	  
	  $("select[name='lia_loantype_1']").find("option[value="+"<?php echo $row['type_of_loan1'];?>" +"]").prop("selected",true);	
	  $("select[name='lia_loantype_2']").find("option[value="+"<?php echo $row['type_of_loan2'];?>" +"]").prop("selected",true);	
	  $("select[name='lia_loantype_3']").find("option[value="+"<?php echo $row['type_of_loan3'];?>" +"]").prop("selected",true);	
	  $("select[name='lia_loantype_4']").find("option[value="+"<?php echo $row['type_of_loan4'];?>" +"]").prop("selected",true);	
	  
	  
});
</script> 
<style>
/*custom font*/

@import url(http://fonts.googleapis.com/css?family=Montserrat);
/*basic reset*/
* {
margin: 0;
padding: 0;
}
html {
height: 100%;
/*Image only BG fallback*/
background: url('http://thecodeplayer.com/uploads/media/gs.png');
/*background = gradient + image pattern combo*/
background: linear-gradient(rgba(196, 102, 0, 0.2), rgba(155, 89, 182, 0.2)),  url('http://thecodeplayer.com/uploads/media/gs.png');
}
body {
font-family: montserrat, arial, verdana;
}
/*form styles*/
#msform {
width: 1200px;
margin: 50px auto;
text-align: center;
position: relative;
}
#msform fieldset {
background: white;
border: 0 none;
border-radius: 3px;
box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
padding: 20px 30px;
box-sizing: border-box;
width: 80%;
margin: 0 10%;
/*stacking fieldsets above each other*/
position: absolute;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
display: none;
}
/*inputs*/
#msform input, #msform textarea, #msform select {
padding: 15px;
border: 1px solid #ccc;
border-radius: 3px;
margin-bottom: 10px;
width: 100%;
box-sizing: border-box;
font-family: montserrat;
color: #2C3E50;
font-size: 13px;
}
/*buttons*/
#msform .action-button {
width: 100px;
background: #27AE60;
font-weight: bold;
color: white;
border: 0 none;
border-radius: 1px;
cursor: pointer;
padding: 10px 5px;
margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
/*headings*/
.fs-title {
font-size: 15px;
text-transform: uppercase;
color: #2C3E50;
margin-bottom: 10px;
}
.fs-subtitle {
font-weight: normal;
font-size: 13px;
color: #666;
margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
margin-bottom: 30px;
overflow: hidden;
/*CSS counters to number the steps*/
counter-reset: step;
}
#progressbar li {
list-style-type: none;
color: white;
text-transform: uppercase;
font-size: 9px;
width: 33.33%;
float: left;
position: relative;
}
#progressbar li:before {
content: counter(step);
counter-increment: step;
width: 20px;
line-height: 20px;
display: block;
font-size: 10px;
color: #333;
background: white;
border-radius: 3px;
margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
content: '';
width: 100%;
height: 2px;
background: white;
position: absolute;
left: -50%;
top: 9px;
z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
/*connector not needed before the first step*/
content: none;
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before, #progressbar li.active:after {
background: #27AE60;
color: white;
}
</style>
<title>jQuery Multi-Step Form Example</title>
</head>
<body>
 
<!-- multistep form -->
<form id="msform" method="post" action="save_form_to_db.php">
<input type="hidden" value="<?php echo $_GET['app_id'];?>" name="app_id">
<!-- progressbar -->
<ul id="progressbar">
<li class="active">Car Details</li>
<li>Personal Detail</li>
<li>Employment</li>
<li>Current Credit Liabilities</li>
<li>Liabilities and Asset</li>
<li>Submit</li>
</ul>
<!-- fieldsets -->

<!-------------------------------------------------page1--------------------------------------------------------------->
<fieldset>
<h2 class="fs-title">Car Details</h2>
<div style='display:flex'>  
  <input style='width:50%' type="text" name="veh_year" placeholder="Year" value="<?php echo $row['year'];?>"/>
  <input style='width:50%' type="text" name="veh_make" placeholder="Make" value="<?php echo $row['make'];?>"/>
</div>
<div style='display:flex'>
  <input style='width:50%' type="text" name="veh_model" placeholder="Model" value="<?php echo $row['model'];?>"/>
  <input style='width:50%' type="text" name="veh_accessories" placeholder="Accessories" value="<?php echo $row['accessories'];?>"/>
</div>
<h2 class="fs-title">Trade Details</h2>
<div style='display:flex'>
  <input style='width:50%' type="text" name="veh_dealer" placeholder="Dealer" value="<?php echo $row['dealer'];?>"/>
  <input style='width:50%' type="text" name="veh_purchase_price" placeholder="Purchase Price" value="<?php echo $row['purchase_price'];?>"/>
</div>
<div style='display:flex'>
  <input style='width:50%' type="text" name="veh_less_cash_dopo" placeholder="Less Cash Deposit" value="<?php echo $row['less_cash_deposit'];?>"/>
  <input style='width:50%' type="text" name="veh_less_trade_in" placeholder="Less Trade-in" value="<?php echo $row['less_trade_in'];?>"/>
</div>
<div style='display:flex'>
  <input style='width:50%' type="text" name="veh_sub_total"  id="veh_sub_total" placeholder="Sub Total" value="<?php echo $row['sub_total_dealer'];?>"/>
  <input style='width:50%' type="text" name="veh_compre_ins" id="veh_compre_ins" placeholder="Comprehensive Ins" value="<?php echo $row['comprehensive_ins'];?>"/>
</div>
<div style='display:flex'>
  <input style='width:50%' type="text" name="veh_gap_ins"   id="veh_gap_ins" placeholder="Gap Insurance" value="<?php echo $row['gap_insurance'];?>"/>
  <input style='width:50%' type="text" name="veh_brokerage" id="veh_brokerage" placeholder="Brokerage" value="<?php echo $row['brokerage'];?>"/>
</div>
<div style='display:flex'>
  <input style='width:50%' type="text" name="veh_loan_pro" id="veh_loan_pro" placeholder="Loan Protection" value="<?php echo $row['loan_protection'];?>"/>
  <input style='width:50%' type="text" name="veh_warranty" id="veh_warranty" placeholder="Warranty" value="<?php echo $row['warranty'];?>"/>
</div>
<h2 class="fs-title">Car Finance Details</h2>
<div style='display:flex'>
  <input style='width:33%' type="text" name="veh_amount" placeholder="Amount" value="<?php echo $row['amount'];?>"/>
  <input style='width:33%' type="text" name="veh_payout" placeholder="Payout" value="<?php echo $row['payout'];?>"/>
  <input style='width:33%' type="text" name="veh_equity" placeholder="Enuity" value="<?php echo $row['equity'];?>"/>
</div>
<div style='display:flex'>
  <input style='width:33%' type="text" name="veh_term_req" id="veh_term_req" placeholder="Term Requested" value="<?php echo $row['term_requested'];?>"/>
  <input style='width:33%' type="text" name="veh_rate_req" id="veh_rate_req" placeholder="Rate Requested" value="<?php echo $row['rate_requested'];?>"/>
  <input style='width:33%' type="text" name="veh_payment_req" id="veh_payment_req" placeholder="Payment Requested" value="<?php echo $row['payment_requested'];?>"/>
</div>
<input type="button" name="next" class="next action-button" value="Next" />
</fieldset>

<!-------------------------------------------------page2--------------------------------------------------------------->

<fieldset>
<h2 class="fs-title">Personal Detail for App 1</h2>
<div style='display:flex'>
  <input style='width:20%' type="text" name="per_title_1" placeholder="Title" value="<?php echo $row['Borrow1_title'];?>"/>
  <input style='width:30%' type="text" name="per_familyname_1" placeholder="Family Name" value="<?php echo $row['Borrow1_familyname'];?>"/>
  <input style='width:30%' type="text" name="per_givenname_1"  placeholder="Given Name" value="<?php echo $row['Borrow1_givenname'];?>"/>
  <input style='width:20%' type="text" name="per_licence_1" placeholder="Licence Number" value="<?php echo $row['Borrow1_licenceno'];?>"/>
</div>
<div style='display:flex'> 
  <input style='width:35%' type="text" name="per_licence_Ex_1"  placeholder="License expiry date:(dd/mm/yyyy)" value="<?php echo $row['Borrow1_expir_date']."/".$row['Borrow1_expir_month']."/".$row['Borrow1_expir_year'];?>"/> 
  <input style='width:35%' type="text" name="per_birthday_1"  id="per_birthday_1" placeholder="Date of birth(dd/mm/yyyy)" value="<?php echo $row['Borrow1_bir_date']."/".$row['Borrow1_bir_month']."/".$row['Borrow1_bir_year'];?>"/>
  <input style='width:30%' type="text" name="per_age_1"  id="per_age_1" placeholder="Age" value="<?php echo $row['Borrow1_age'];?>"/>
</div>
<h2 class="fs-title">Personal Detail for App 2</h2>
<div style='display:flex'>
  <input style='width:20%' type="text" name="per_title_2" placeholder="Title" value="<?php echo $row['Borrow2_title'];?>"/>
  <input style='width:30%' type="text" name="per_familyname_2" placeholder="Family Name" value="<?php echo $row['Borrow2_familyname'];?>"/>
  <input style='width:30%' type="text" name="per_givenname_2"  placeholder="Given Name" value="<?php echo $row['Borrow2_givenname'];?>"/>
  <input style='width:20%' type="text" name="per_licence_2" placeholder="Licence Number" value="<?php echo $row['Borrow2_licenceno'];?>"/>
</div>
<div style='display:flex'> 
  <input style='width:35%' type="text" name="per_licence_Ex_2"  placeholder="License expiry date:(dd/mm/yyyy)" value="<?php echo $row['Borrow2_expir_date']."/".$row['Borrow2_expir_month']."/".$row['Borrow2_expir_year'];?>"/> 
  <input style='width:35%' type="text" name="per_birthday_2"  id="per_birthday_2" placeholder="Date of birth(dd/mm/yyyy)" value="<?php echo $row['Borrow2_bir_date']."/".$row['Borrow2_bir_month']."/".$row['Borrow2_bir_year'];?>"/>
  <input style='width:30%' type="text" name="per_age_2"  id="per_age_2" placeholder="Age" value="<?php echo $row['Borrow2_age'];?>"/>
</div>
<h2 class="fs-title">Street Address( Currently )</h2>
<div style='display:flex'> 
  <input style='width:100%' type="text" name="per_street_address_1"  placeholder="Current Street Address" value="<?php echo $row['street_adress'];?>"/> 
</div>
<div style='display:flex'> 
  <input style='width:30%' type="text" name="per_postcode_1"  placeholder="Postcode" value="<?php echo $row['postcode_1_1'].$row['postcode_1_2'].$row['postcode_1_3'].$row['postcode_1_4'];?>"/>
  <input style='width:25%' type="text" name="per_lived_year_1"  placeholder="Year" value="<?php echo $row['street1_year'];?>"/>
  <input style='width:25%' type="text" name="per_lived_month_1"  placeholder="Month" value="<?php echo $row['street1_month'];?>"/>
  <input style='width:20%' type="text" name="per_home_tele"  placeholder="Home Telephone" value="<?php echo $row['home_telephone'];?>"/>
</div>
<h2 class="fs-title">Previous Address</h2>
<div style='display:flex'> 
  <input style='width:100%' type="text" name="per_street_address_2"  placeholder="Previous Street Address" value="<?php echo $row['pre_address'];?>"/> 
</div>
<div style='display:flex'> 
  <input style='width:30%' type="text" name="per_postcode_2"  placeholder="Postcode" value="<?php echo $row['postcode_2_1'].$row['postcode_2_2'].$row['postcode_2_3'].$row['postcode_2_4'];?>"/>
  <input style='width:25%' type="text" name="per_lived_year_2"  placeholder="Year" value="<?php echo $row['streetp1_year'];?>"/>
  <input style='width:25%' type="text" name="per_lived_month_2"  placeholder="Month" value="<?php echo $row['streetp1_month'];?>"/>
  <input style='width:20%' type="text" name="per_mobile_1"  placeholder="Borrower1 Mobile" value="<?php echo $row['borrow1_mobile'];?>"/>
</div>
<h2 class="fs-title">Second Previous Address</h2>
<div style='display:flex'> 
  <input style='width:100%' type="text" name="per_street_address_3"  placeholder="Second Previous Street Address" value="<?php echo $row['pre_address2'];?>"/> 
</div>
<div style='display:flex'> 
  <input style='width:30%' type="text" name="per_postcode_3"  placeholder="Postcode" value="<?php echo $row['postcode_3_1'].$row['postcode_3_2'].$row['postcode_3_3'].$row['postcode_3_4'];?>"/>
  <input style='width:25%' type="text" name="per_lived_year_3"  placeholder="Year" value="<?php echo $row['streetp2_year'];?>"/>
  <input style='width:25%' type="text" name="per_lived_month_3"  placeholder="Month" value="<?php echo $row['streetp2_month'];?>"/>
  <input style='width:20%' type="text" name="per_mobile_2"  placeholder="Borrower2 Mobile" value="<?php echo $row['borrow2_mobile'];?>"/>
</div>
<h2 class="fs-title">Email Address</h2>
<div style='display:flex'> 
  <input style='width:100%' type="text" name="per_email_address"  placeholder="Email Address" value="<?php echo $row['Email'];?>"/>  
</div>
<h2 class="fs-title">Is your Home?</h2>
<div style='display:flex'> 
        <select style='width:25%'  name="per_isyourhome"  placeholder="Is your Home?">
			  <?php echo $is_your_home_word;?>
         </select>
  <input style='width:25%' type="text" name="per_rent"  placeholder="Rent" value="<?php echo $row['Rent_value'];?>"/>
  <input style='width:25%' type="text" name="per_landlord"  placeholder="Landlord" value="<?php echo $row['landlord_name'];?>"/>
  <input style='width:25%' type="text" name="per_landlord_tele"  placeholder="Telephone" value="<?php echo $row['telephone_landlord'];?>"/>
</div>
<div style='display:flex'> 
   <input style='width:100%' type="text" name="per_num_share"  placeholder="Number of People Share the Rent(if any?)" value="<?php echo $row['Half_full_rent'];?>"/>
</div>
<h2 class="fs-title">Are you Presently?</h2>
<div style='display:flex'> 
        <select style='width:50%'  name="per_areyoupresently"  placeholder="Are you Presently?">
			  <?php echo $are_you_presently_word;?>
         </select>
   <input style='width:25%' type="text" name="per_num_of_child"  placeholder="No. of Dependents"     value="<?php echo $row['no_of_dependents'];?>"/>   
   <input style='width:25%' type="text" name="per_child_care"    placeholder="Child's Maintaince($)" value="<?php echo $row['child_maintaince'];?>"/>   
   
</div>

<input type="button" name="previous" class="previous action-button" value="Previous" />
<input type="button" name="next" class="next action-button" value="Next" />
</fieldset>

<!-------------------------------------------------page3--------------------------------------------------------------->

<fieldset>
<h2 class="fs-title">Borrower1 Occupation</h2>
<div style='display:flex'> 
  <input style='width:30%' type="text" name="emp_occupation_1"  placeholder="Borrower1 Occupation" value="<?php echo $row['borrower1_occupa'];?>"/>
  <input style='width:70%' type="text" name="emp_occupation_detail_1"  placeholder="Employer's Name and Address" value="<?php echo $row['borrower1_employername'];?>"/>
</div>
<div style='display:flex'>
  <input style='width:33.3%' type="text" name="emp_occupation_year_1"  placeholder="Year" value="<?php echo $row['borrower1_year'];?>"/>
  <input style='width:33.3%' type="text" name="emp_occupation_month_1"  placeholder="Month" value="<?php echo $row['borrower1_month'];?>"/>
   <input style='width:33.3%' type="text" name="emp_occupation_phone_1"  placeholder="Business Phone" value="<?php echo $row['borrower1_business_phone1'];?>"/>
</div>  
<div style='display:flex'>  
  <input style='width:25%' type="text" name="emp_occupation_gross_1"  placeholder="Gross" value="<?php echo $row['borrower1_gross'];?>"/>
  <input style='width:25%' type="text" name="emp_occupation_net_1"  placeholder="Net" value="<?php echo $row['borrower1_net'];?>"/>
  <input style='width:25%' type="text" name="emp_occupation_gross_2"  placeholder="Cenerlink Income(If Any)" value="<?php echo $row['borrower1_centrelink'];?>"/>
  <input style='width:25%' type="text" name="emp_occupation_net_2"  placeholder="Other Income(If Any)" value="<?php echo $row['borrower1_prev_net'];?>"/>
</div>  
<h2 class="fs-title">Borrower1 Pre Occupation</h2>
<div style='display:flex'> 
  <input style='width:30%' type="text" name="emp_occupation_2"  placeholder="Borrower1 Pre Occupation" value="<?php echo $row['borrower1_prev_occupa'];?>"/>
  <input style='width:70%' type="text" name="emp_occupation_detail_2"  placeholder="Previous Employer's Name and Address" value="<?php echo $row['borrower1_prev_employername'];?>"/>
</div>
<div style='display:flex'>
  <input style='width:33.3%' type="text" name="emp_occupation_year_2"  placeholder="Year" value="<?php echo $row['borrower1_prev_year'];?>"/>
  <input style='width:33.3%' type="text" name="emp_occupation_month_2"  placeholder="Month" value="<?php echo $row['borrower1_prev_month'];?>"/>

  <input style='width:33.3%' type="text" name="emp_occupation_phone_2"  placeholder="Business Phone" value="<?php echo $row['borrower1_business_phone2'];?>"/>
</div>
<h2 class="fs-title">Borrower2 Occupation</h2>
<div style='display:flex'> 
  <input style='width:30%' type="text" name="emp_occupation_3"  placeholder="Borrower2 Occupation" value="<?php echo $row['borrower2_occupa'];?>"/>
  <input style='width:70%' type="text" name="emp_occupation_detail_3"  placeholder="Employer's Name and Address" value="<?php echo $row['borrower2_employername'];?>"/>
</div>
<div style='display:flex'>
  <input style='width:33.3%' type="text" name="emp_occupation_year_3"  placeholder="Year" value="<?php echo $row['borrower2_year'];?>"/>
  <input style='width:33.3%' type="text" name="emp_occupation_month_3"  placeholder="Month" value="<?php echo $row['borrower2_month'];?>"/>
  <input style='width:33.3%' type="text" name="emp_occupation_phone_3"  placeholder="Business Phone" value="<?php echo $row['borrower2_business_phone1'];?>"/>
</div>
<div style='display:flex'>
  <input style='width:25%' type="text" name="emp_occupation_gross_3"  placeholder="Gross" value="<?php echo $row['borrower2_gross'];?>"/>
  <input style='width:25%' type="text" name="emp_occupation_net_3"  placeholder="Net" value="<?php echo $row['borrower2_net'];?>"/>
  <input style='width:25%' type="text" name="emp_occupation_gross_4"  placeholder="Cenerlink Income(If Any)" value="<?php echo $row['borrower2_centrelink'];?>"/>
  <input style='width:25%' type="text" name="emp_occupation_net_4"  placeholder="Other Income(If Any)" value="<?php echo $row['borrower2_prev_net'];?>"/>
</div>
<h2 class="fs-title">Borrower2 Pre Occupation</h2>
<div style='display:flex'> 
  <input style='width:30%' type="text" name="emp_occupation_4"  placeholder="Borrower2 Pre Occupation" value="<?php echo $row['borrower2_prev_occupa'];?>"/>
  <input style='width:70%' type="text" name="emp_occupation_detail_4"  placeholder="Previous Employer's Name and Address" value="<?php echo $row['borrower2_prev_employername'];?>"/>
</div>
<div style='display:flex'>
  <input style='width:33.3%' type="text" name="emp_occupation_year_4"  placeholder="Year" value="<?php echo $row['borrower2_prev_year'];?>"/>
  <input style='width:33.3%' type="text" name="emp_occupation_month_4"  placeholder="Month" value="<?php echo $row['borrower2_prev_month'];?>"/>  
  <input style='width:33.3%' type="text" name="emp_occupation_phone_4"  placeholder="Business Phone" value="<?php echo $row['borrower2_business_phone2'];?>"/>
</div>
<input type="button" name="previous" class="previous action-button" value="Previous" />
<input type="button" name="next" class="next action-button" value="Next" />
</fieldset>

<!-------------------------------------------------page4--------------------------------------------------------------->

<fieldset>
<h2 class="fs-title">Current Liabilities 1</h2>
<div style='display:flex'> 
  <input style='width:30%' type="text" name="lia_company_1"  placeholder="Company"  value="<?php echo $row['company1'];?>"/>
        <select style='width:30%'  name="lia_loantype_1"  placeholder="Type of Loan">
			  <option value="car_loan">Car Loan</option>
			  <option value="credit_card">Credit Card</option>
			  <option value="personal_loan">Personal Loan</option>
			  <option value="investment_mortgage">Investment Mortgage</option>
			  <option value="mortgage">Mortgage</option> 
			  <option value="overdraft">Overdraft</option>
              <option value="pay_day_loan">Pay Day Loan</option>
              <option value="white_good_rental">White Good Rental</option>
			  <option value="salary_sacrafice">Salary Sacrafice</option>
			  <option value="novated_lease">Novated Lease</option>
			  <option value="chp">CHP</option>
         </select>
  <input style='width:40%' type="text" name="lia_detail_1"  placeholder="Details"  value="<?php echo $row['details1'];?>"/>
</div>
<div style='display:flex'> 
  <input style='width:33%' type="text" name="lia_repayment_1"  placeholder="Repayment"  value="<?php echo $row['repayment1'];?>"/>
  <input style='width:33%' type="text" name="lia_balance_1"  placeholder="Balance"  value="<?php echo $row['balance1'];?>"/>
  <input style='width:33%' type="text" name="lia_limit_1"  placeholder="Limit"  value="<?php echo $row['limit1'];?>"/>
</div>
<h2 class="fs-title">Current Liabilities 2</h2>
<div style='display:flex'> 
  <input style='width:30%' type="text" name="lia_company_2"  placeholder="Company"  value="<?php echo $row['company2'];?>"/>
  <select style='width:30%'  name="lia_loantype_2"  placeholder="Type of Loan">
			  <option value="car_loan">Car Loan</option>
			  <option value="credit_card">Credit Card</option>
			  <option value="personal_loan">Personal Loan</option>
			  <option value="investment_mortgage">Investment Mortgage</option>
			  <option value="mortgage">Mortgage</option> 
			  <option value="overdraft">Overdraft</option>
              <option value="pay_day_loan">Pay Day Loan</option>
              <option value="white_good_rental">White Good Rental</option>
			  <option value="salary_sacrafice">Salary Sacrafice</option>
			  <option value="novated_lease">Novated Lease</option>
			  <option value="chp">CHP</option>
         </select>
  <input style='width:40%' type="text" name="lia_detail_2"  placeholder="Details"  value="<?php echo $row['details2'];?>"/>
</div>
<div style='display:flex'> 
  <input style='width:33%' type="text" name="lia_repayment_2"  placeholder="Repayment"  value="<?php echo $row['repayment2'];?>"/>
  <input style='width:33%' type="text" name="lia_balance_2"  placeholder="Balance"  value="<?php echo $row['balance2'];?>"/>
  <input style='width:33%' type="text" name="lia_limit_2"  placeholder="Limit"  value="<?php echo $row['limit2'];?>"/>
</div>
<h2 class="fs-title">Current Liabilities 3</h2>
<div style='display:flex'> 
  <input style='width:30%' type="text" name="lia_company_3"  placeholder="Company"  value="<?php echo $row['company3'];?>"/>
  <select style='width:30%'  name="lia_loantype_3"  placeholder="Type of Loan">
			  <option value="car_loan">Car Loan</option>
			  <option value="credit_card">Credit Card</option>
			  <option value="personal_loan">Personal Loan</option>
			  <option value="investment_mortgage">Investment Mortgage</option>
			  <option value="mortgage">Mortgage</option> 
			  <option value="overdraft">Overdraft</option>
              <option value="pay_day_loan">Pay Day Loan</option>
              <option value="white_good_rental">White Good Rental</option>
			  <option value="salary_sacrafice">Salary Sacrafice</option>
			  <option value="novated_lease">Novated Lease</option>
			  <option value="chp">CHP</option>
         </select>
  <input style='width:40%' type="text" name="lia_detail_3"  placeholder="Details"  value="<?php echo $row['details3'];?>"/>
</div>
<div style='display:flex'> 
  <input style='width:33%' type="text" name="lia_repayment_3"  placeholder="Repayment"  value="<?php echo $row['repayment3'];?>"/>
  <input style='width:33%' type="text" name="lia_balance_3"  placeholder="Balance"  value="<?php echo $row['balance3'];?>"/>
  <input style='width:33%' type="text" name="lia_limit_3"  placeholder="Limit"  value="<?php echo $row['limit3'];?>"/>
</div>
<h2 class="fs-title">Current Liabilities 4</h2>
<div style='display:flex'> 
  <input style='width:30%' type="text" name="lia_company_4"  placeholder="Company"  value="<?php echo $row['company4'];?>"/>
  <select style='width:30%'  name="lia_loantype_4"  placeholder="Type of Loan">
			  <option value="car_loan">Car Loan</option>
			  <option value="credit_card">Credit Card</option>
			  <option value="personal_loan">Personal Loan</option>
			  <option value="investment_mortgage">Investment Mortgage</option>
			  <option value="mortgage">Mortgage</option> 
			  <option value="overdraft">Overdraft</option>
              <option value="pay_day_loan">Pay Day Loan</option>
              <option value="white_good_rental">White Good Rental</option>
			  <option value="salary_sacrafice">Salary Sacrafice</option>
			  <option value="novated_lease">Novated Lease</option>
			  <option value="chp">CHP</option>
         </select>
  <input style='width:40%' type="text" name="lia_detail_4"  placeholder="Details"  value="<?php echo $row['details4'];?>"/>
</div>
<div style='display:flex'> 
  <input style='width:33%' type="text" name="lia_repayment_4"  placeholder="Repayment"  value="<?php echo $row['repayment4'];?>"/>
  <input style='width:33%' type="text" name="lia_balance_4"  placeholder="Balance"  value="<?php echo $row['balance4'];?>"/>
  <input style='width:33%' type="text" name="lia_limit_4"  placeholder="Limit"  value="<?php echo $row['limit4'];?>"/>
</div>
<h2 class="fs-title">Bank Details</h2>
<div style='display:flex'> 
  <input style='width:50%' type="text" name="lia_bank_detail"  placeholder="Bank Detail"   value="<?php echo $row['bank_details'];?>"/>
  <input style='width:50%' type="text" name="lia_bank_phone"  placeholder="Phone"  value="<?php echo $row['bank_phone'];?>"/>
</div>
<div style='display:flex'> 
  <input style='width:50%' type="text" name="lia_refee_1"  placeholder="Nearest Relative Not Living With You"  value="<?php echo $row['nearst_rela1'];?>"/>
  <input style='width:50%' type="text" name="lia_refee__phone_1"  placeholder="Phone"  value="<?php echo $row['rela1_phone'];?>"/>
</div>
 <div style='display:flex'> 
  <input style='width:50%' type="text" name="lia_refee_2"  placeholder="Nearest Relative Not Living With You"  value="<?php echo $row['nearst_rela2'];?>"/>
  <input style='width:50%' type="text" name="lia_refee__phone_2"  placeholder="Phone"  value="<?php echo $row['rela2_phone'];?>"/>
</div>
<input type="button" name="previous" class="previous action-button" value="Previous" />
<input type="button" name="next" class="next action-button" value="Next" />
</fieldset>

<!-------------------------------------------------page5--------------------------------------------------------------->

<fieldset>
<h2 class="fs-title">Liabilities</h2> 
<table style='width:100%'> 
  <tr> 
  <td>First Mortgage</td>
  <td><input style='width:100%' type="text" name="liaass_firstmortgage_1"   placeholder="" value="<?php echo $row['first_mortgage1'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_firstmortgage_2"  id="liaass_firstmortgage_2" placeholder="$" value="<?php echo $row['first_mortgage2'];?>"/></td>
  </tr>
   <tr> 
  <td>Second Mortgage</td>
  <td><input style='width:100%' type="text" name="liaass_secondmortgage_1"  placeholder="" value="<?php echo $row['second_mortgage1'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_secondmortgage_2" id="liaass_secondmortgage_2" placeholder="$" value="<?php echo $row['second_mortgage2'];?>"/></td>
  </tr>
   <tr> 
  <td>Hire Purchases</td>
  <td><input style='width:100%' type="text" name="liaass_hirepurchase_1"  placeholder="" value="<?php echo $row['hire_purchases1'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_hirepurchase_2"  id="liaass_hirepurchase_2" placeholder="$" value="<?php echo $row['hire_purchases2'];?>"/></td>
  </tr>
   <tr> 
  <td>Personal Loans</td>
  <td><input style='width:100%' type="text" name="liaass_personalloan_1"  placeholder="" value="<?php echo $row['personal_loan1'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_personalloan_2"  id="liaass_personalloan_2" placeholder="$" value="<?php echo $row['personal_loan2'];?>"/></td>
  </tr>
   <tr> 
  <td>Bank Overdraft</td>
  <td><input style='width:100%' type="text" name="liaass_bankoverdraft_1"  placeholder="" value="<?php echo $row['bank_overdraft1'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_bankoverdraft_2"  id="liaass_bankoverdraft_2" placeholder="$" value="<?php echo $row['bank_overdraft2'];?>"/></td>
  </tr>
   <tr> 
  <td>Other Liabilities1</td>
  <td><input style='width:100%' type="text" name="liaass_otherliabities_11"  placeholder="" value="<?php echo $row['other_liab11'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_otherliabities_12" id="liaass_otherliabities_12" placeholder="$" value="<?php echo $row['other_liab12'];?>"/></td>
  </tr>
   <tr> 
  <td>Other Liabilities2</td>
  <td><input style='width:100%' type="text" name="liaass_otherliabities_21"  placeholder="" value="<?php echo $row['other_liab21'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_otherliabities_22"  id="liaass_otherliabities_22" placeholder="$" value="<?php echo $row['other_liab22'];?>"/></td>
  </tr>
   <tr> 
  <td>Other Liabilities3</td>
  <td><input style='width:100%' type="text" name="liaass_otherliabities_31"  placeholder="" value="<?php echo $row['other_liab31'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_otherliabities_32"  id="liaass_otherliabities_32" placeholder="$" value="<?php echo $row['other_liab32'];?>"/></td>
  </tr>
   <tr> 
  <td>Total</td>
  <td> </td>
  <td><input style='width:100%' type="text" name="liaass_lib_total" id="liaass_lib_total" placeholder="$" value="<?php echo $row['total_liab'];?>"/></td>
  </tr>
</table >
<h2 class="fs-title">Assets</h2> 
<table  style='width:100%'> 
  <tr> 
  <td>House</td>
  <td><input style='width:100%' type="text" name="liaass_house_1"  placeholder="" value="<?php echo $row['house_ass1'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_house_2"  id="liaass_house_2" placeholder="$" value="<?php echo $row['house_ass2'];?>"/></td>
  </tr>
   <tr> 
  <td>Content</td>
  <td><input style='width:100%' type="text" name="liaass_content_1"  placeholder="" value="<?php echo $row['content_ass1'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_content_2"  id="liaass_content_2" placeholder="$" value="<?php echo $row['content_ass2'];?>"/></td>
  </tr>
  <td>Car 1</td>
  <td><input style='width:100%' type="text" name="liaass_car_11"  placeholder="" value="<?php echo $row['car_ass11'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_car_12" id="liaass_car_12" placeholder="$" value="<?php echo $row['car_ass12'];?>"/></td>
  </tr>
   <tr> 
  <td>Car 2</td>
  <td><input style='width:100%' type="text" name="liaass_car_21"  placeholder="" value="<?php echo $row['car_ass21'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_car_22"  id="liaass_car_22" placeholder="$" value="<?php echo $row['car_ass22'];?>"/></td>
  </tr>
   <tr> 
  <td>Bank Accounts</td>
  <td><input style='width:100%' type="text" name="liaass_bankaccount_1"  placeholder="" value="<?php echo $row['bank_account_ass1'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_bankaccount_2" id="liaass_bankaccount_2" placeholder="$" value="<?php echo $row['bank_account_ass2'];?>"/></td>
  </tr>
   <tr> 
  <td>Share</td>
  <td><input style='width:100%' type="text" name="liaass_share_1"  placeholder="" value="<?php echo $row['share_ass1'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_share_2"  id="liaass_share_2" placeholder="$" value="<?php echo $row['share_ass2'];?>"/></td>
  </tr>
   <tr> 
  <td>Other 1</td>
  <td><input style='width:100%' type="text" name="liaass_other_11"  placeholder="" value="<?php echo $row['other_ass11'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_other_12"  id="liaass_other_12" placeholder="$" value="<?php echo $row['other_ass12'];?>"/></td>
  </tr>
   <tr> 
  <td>Other 2</td>
  <td><input style='width:100%' type="text" name="liaass_other_21"  placeholder="" value="<?php echo $row['other_ass21'];?>"/></td>
  <td><input style='width:100%' type="text" name="liaass_other_22"  id="liaass_other_22" placeholder="$" value="<?php echo $row['other_ass22'];?>"/></td>
  </tr>
   <tr> 
  <td>Total</td>
  <td> </td>
  <td><input style='width:100%' type="text" name="liaass_asset_total" id="liaass_asset_total" placeholder="$" value="<?php echo $row['total_ass'];?>"/></td>
  </tr>
</table> 
 <h2 class="fs-title">Living Expenses</h2>
<table style='width:100%'> 
<tr>
   <td><input style='width:100%' type="text" name="liaass_living_expense1"  placeholder="Living Expenses 1" value="<?php echo $row['share_living_ex1']?>" /></td>
   <td><input style='width:100%' type="text" name="liaass_living_expense2"  placeholder="Living Expenses 2" value="<?php echo $row['share_living_ex2']?>" /></td>
   <td><input style='width:100%' type="hidden" name="liaass_salary_1"  placeholder="Gross" value="<?php echo $row['salary_gross'];?>"/></td>
   <td><input style='width:100%' type="hidden" name="liaass_salary_2"  placeholder="Net" value="<?php echo $row['salary_net'];?>"/></td>
</tr>
</table>
<input type="button" name="previous" class="previous action-button" value="Previous" />
<input type="button" name="next" class="next action-button" value="Next" />
</fieldset>

<!-------------------------------------------------page6--------------------------------------------------------------->

<fieldset>
<h2 class="fs-title">Before Submit</h2> 

<div style="position:relative;height:200px; width:900px;">
   <label>Is there anything in your credit history that would stop you from getting a loan?</label>
    <select style='width:100%'  name="bef_credithistory"  placeholder="">
	<?php echo $credit_his_word; ?>	  
	 </select>
   <div style="position:absolute;bottom:2px;left:2px;right:2px;">
       <textarea rows="4" cols="50" name="comment1" placeholder="The Reason..." form="msform"  > <?php echo $row['reason1'];?> </textarea>  
   </div>
</div>
<div style="position:relative;height:200px; width:900px;">
   <label>Are you experiencing financial stress or hardship?</label>
   <select style='width:100%'  name="bef_financial_hardship"  placeholder="">
	 <?php echo $financial_stress_word; ?>	
	 </select>
   <div style="position:absolute;bottom:2px;left:2px;right:2px;">
       <textarea rows="4" cols="50" name="comment2" placeholder="The Reason..." form="msform"  > <?php echo $row['reason2'];?> </textarea>  
   </div>
</div>
<div style="position:relative;height:200px; width:900px;">
   <label>Notes:</label>
   <div style="position:absolute;bottom:2px;left:2px;right:2px;">
       <textarea rows="4" cols="50" name="comment3" placeholder="Notes..." form="msform"  >  <?php echo $row['final_notes'];?> </textarea>  
   </div>
</div>
 
<input type="button" name="previous" class="previous action-button" value="Previous" />
<input type="submit" name="submit" class="submit action-button" value="Submit" />
</fieldset>
</form>


</body>
</html>
<?
}
  
   }
   else{echo "0 results";}
   $conn->close();


?>