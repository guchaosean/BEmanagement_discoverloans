<?php   
$app_id=$_POST['app_id'];
date_default_timezone_set("Australia/Brisbane");
$date=date("d/m/Y");

$veh_year=$_POST['veh_year'];                     $veh_make=$_POST['veh_make'];
$veh_model=$_POST['veh_model'];                   $veh_accessories=$_POST['veh_accessories'];
$veh_dealer=$_POST['veh_dealer'];                 $veh_purchase_price=$_POST['veh_purchase_price'];
$veh_less_cash_dopo=$_POST['veh_less_cash_dopo']; $veh_less_trade_in=$_POST['veh_less_trade_in'];
$veh_sub_total=$_POST['veh_sub_total'];           $veh_compre_ins=$_POST['veh_compre_ins'];
$veh_gap_ins=$_POST['veh_gap_ins'];               $veh_brokerage=$_POST['veh_brokerage'];
$veh_loan_pro=$_POST['veh_loan_pro'];             $veh_warranty=$_POST['veh_warranty'];
$veh_amount=$_POST['veh_amount'];                 $veh_payout=$_POST['veh_payout'];
$veh_equity=$_POST['veh_equity'];                 $veh_term_req=$_POST['veh_term_req'];             
$veh_rate_req=$_POST['veh_rate_req'];             $veh_payment_req=$_POST['veh_payment_req'];        

$per_title_1=$_POST['per_title_1'];                    $per_familyname_1=$_POST['per_familyname_1'];
$per_givenname_1=$_POST['per_givenname_1'];            $per_licence_1=$_POST['per_licence_1'];
$per_licence_Ex_1=$_POST['per_licence_Ex_1'];          $per_birthday_1=$_POST['per_birthday_1'];
$per_age_1=$_POST['per_age_1'];                        $per_title_2=$_POST['per_title_2'];
$per_familyname_2=$_POST['per_familyname_2'];          $per_givenname_2=$_POST['per_givenname_2'];
$per_licence_2=$_POST['per_licence_2'];                $per_licence_Ex_2=$_POST['per_licence_Ex_2'];
$per_birthday_2=$_POST['per_birthday_2'];              $per_age_2=$_POST['per_age_2'];
$per_street_address_1=$_POST['per_street_address_1'];  $per_postcode_1=$_POST['per_postcode_1'];
$per_lived_year_1=$_POST['per_lived_year_1'];          $per_lived_month_1=$_POST['per_lived_month_1'];
$per_home_tele=$_POST['per_home_tele'];                $per_street_address_2=$_POST['per_street_address_2'];
$per_postcode_2=$_POST['per_postcode_2'];              $per_lived_year_2=$_POST['per_lived_year_2'];
$per_lived_month_2=$_POST['per_lived_month_2'];        $per_mobile_1=$_POST['per_mobile_1'];
$per_street_address_3=$_POST['per_street_address_3'];  $per_postcode_3=$_POST['per_postcode_3'];
$per_lived_year_3=$_POST['per_lived_year_3'];          $per_lived_month_3=$_POST['per_lived_month_3'];
$per_mobile_2=$_POST['per_mobile_2'];                  $per_email_address=$_POST['per_email_address'];
$per_isyourhome=$_POST['per_isyourhome'];              $per_rent=$_POST['per_rent'];
$per_landlord=$_POST['per_landlord'];                  $per_landlord_tele=$_POST['per_landlord_tele'];
$per_areyoupresently=$_POST['per_areyoupresently'];    $per_num_of_child=$_POST['per_num_of_child'];
$per_num_share=$_POST['per_num_share'];                $per_child_maintaince=$_POST['per_child_care'];



$emp_occupation_1=$_POST['emp_occupation_1'];               $emp_occupation_detail_1=$_POST['emp_occupation_detail_1'];
$emp_occupation_year_1=$_POST['emp_occupation_year_1'];     $emp_occupation_month_1=$_POST['emp_occupation_month_1'];
$emp_occupation_gross_1=$_POST['emp_occupation_gross_1'];   $emp_occupation_net_1=$_POST['emp_occupation_net_1'];
$emp_occupation_phone_1=$_POST['emp_occupation_phone_1'];   $emp_occupation_2=$_POST['emp_occupation_2'];
$emp_occupation_detail_2=$_POST['emp_occupation_detail_2']; $emp_occupation_year_2=$_POST['emp_occupation_year_2'];
$emp_occupation_month_2=$_POST['emp_occupation_month_2'];   $emp_occupation_gross_2=$_POST['emp_occupation_gross_2'];
$emp_occupation_net_2=$_POST['emp_occupation_net_2'];       $emp_occupation_phone_2=$_POST['emp_occupation_phone_2'];
$emp_occupation_3=$_POST['emp_occupation_3'];               $emp_occupation_detail_3=$_POST['emp_occupation_detail_3'];
$emp_occupation_year_3=$_POST['emp_occupation_year_3'];     $emp_occupation_month_3=$_POST['emp_occupation_month_3'];
$emp_occupation_gross_3=$_POST['emp_occupation_gross_3'];   $emp_occupation_net_3=$_POST['emp_occupation_net_3'];
$emp_occupation_phone_3=$_POST['emp_occupation_phone_3'];   $emp_occupation_4=$_POST['emp_occupation_4'];
$emp_occupation_detail_4=$_POST['emp_occupation_detail_4']; $emp_occupation_year_4=$_POST['emp_occupation_year_4'];
$emp_occupation_month_4=$_POST['emp_occupation_month_4'];   $emp_occupation_gross_4=$_POST['emp_occupation_gross_4'];
$emp_occupation_net_4=$_POST['emp_occupation_net_4'];       $emp_occupation_phone_4=$_POST['emp_occupation_phone_4'];

$lia_company_1=$_POST['lia_company_1'];       $lia_loantype_1=$_POST['lia_loantype_1'];
$lia_detail_1=$_POST['lia_detail_1'];         $lia_repayment_1=$_POST['lia_repayment_1'];
$lia_balance_1=$_POST['lia_balance_1'];       $lia_limit_1=$_POST['lia_limit_1'];
$lia_company_2=$_POST['lia_company_2'];       $lia_loantype_2=$_POST['lia_loantype_2'];
$lia_detail_2=$_POST['lia_detail_2'];         $lia_repayment_2=$_POST['lia_repayment_2'];
$lia_balance_2=$_POST['lia_balance_2'];       $lia_limit_2=$_POST['lia_limit_2'];
$lia_company_3=$_POST['lia_company_3'];       $lia_loantype_3=$_POST['lia_loantype_3'];
$lia_detail_3=$_POST['lia_detail_3'];         $lia_repayment_3=$_POST['lia_repayment_3'];
$lia_balance_3=$_POST['lia_balance_3'];       $lia_limit_3=$_POST['lia_limit_3'];
$lia_company_4=$_POST['lia_company_4'];       $lia_loantype_4=$_POST['lia_loantype_4'];
$lia_detail_4=$_POST['lia_detail_4'];         $lia_repayment_4=$_POST['lia_repayment_4'];
$lia_balance_4=$_POST['lia_balance_4'];       $lia_limit_4=$_POST['lia_limit_4'];
$lia_bank_detail=$_POST['lia_bank_detail'];   $lia_bank_phone=$_POST['lia_bank_phone'];
$lia_refee_1=$_POST['lia_refee_1'];           $lia_refee__phone_1=$_POST['lia_refee__phone_1'];
$lia_refee_2=$_POST['lia_refee_2'];           $lia_refee__phone_2=$_POST['lia_refee__phone_2'];

$liaass_firstmortgage_1=$_POST['liaass_firstmortgage_1'];     $liaass_firstmortgage_2=$_POST['liaass_firstmortgage_2'];
$liaass_secondmortgage_1=$_POST['liaass_secondmortgage_1'];   $liaass_secondmortgage_2=$_POST['liaass_secondmortgage_2'];
$liaass_hirepurchase_1=$_POST['liaass_hirepurchase_1'];       $liaass_hirepurchase_2=$_POST['liaass_hirepurchase_2'];
$liaass_personalloan_1=$_POST['liaass_personalloan_1'];       $liaass_personalloan_2=$_POST['liaass_personalloan_2'];
$liaass_bankoverdraft_1=$_POST['liaass_bankoverdraft_1'];     $liaass_bankoverdraft_2=$_POST['liaass_bankoverdraft_2'];
$liaass_otherliabities_11=$_POST['liaass_otherliabities_11']; $liaass_otherliabities_12=$_POST['liaass_otherliabities_12'];
$liaass_otherliabities_21=$_POST['liaass_otherliabities_21']; $liaass_otherliabities_22=$_POST['liaass_otherliabities_22'];
$liaass_otherliabities_31=$_POST['liaass_otherliabities_31']; $liaass_otherliabities_32=$_POST['liaass_otherliabities_32'];
$liaass_lib_total=$_POST['liaass_lib_total']; 

$liaass_house_1=$_POST['liaass_house_1'];                $liaass_house_2=$_POST['liaass_house_2'];
$liaass_content_1=$_POST['liaass_content_1'];            $liaass_content_2=$_POST['liaass_content_2'];
$liaass_car_11=$_POST['liaass_car_11'];                  $liaass_car_12=$_POST['liaass_car_12'];
$liaass_car_21=$_POST['liaass_car_21'];                  $liaass_car_22=$_POST['liaass_car_22'];
$liaass_bankaccount_1=$_POST['liaass_bankaccount_1'];    $liaass_bankaccount_2=$_POST['liaass_bankaccount_2'];
$liaass_share_1=$_POST['liaass_share_1'];                $liaass_share_2=$_POST['liaass_share_2'];
$liaass_other_11=$_POST['liaass_other_11'];              $liaass_other_12=$_POST['liaass_other_12'];
$liaass_other_21=$_POST['liaass_other_21'];              $liaass_other_22=$_POST['liaass_other_22'];
$liaass_asset_total=$_POST['liaass_asset_total']; 
$liaass_salary_1=$_POST['liaass_salary_1'];              $liaass_salary_2=$_POST['liaass_salary_2'];
$liaass_living_expense1=$_POST['liaass_living_expense1'];$liaass_living_expense2=$_POST['liaass_living_expense2'];

$bef_credithistory=$_POST['bef_credithistory'];          $bef_financial_hardship=$_POST['bef_financial_hardship'];
$bef_comment1=$_POST['comment1'];    $bef_comment2=$_POST['comment2']; $bef_comment3=$_POST['comment3'];
 
$per_licence_Ex_1_day_pos=strpos($per_licence_Ex_1,'/',0);  
$per_licence_Ex_1_month_pos=strrpos($per_licence_Ex_1,'/',$per_licence_Ex_1_day_pos+1);   
$per_licence_Ex_1_day=substr($per_licence_Ex_1,0,$per_licence_Ex_1_day_pos);
$per_licence_Ex_1_month=substr($per_licence_Ex_1,$per_licence_Ex_1_day_pos+1,$per_licence_Ex_1_month_pos-$per_licence_Ex_1_day_pos-1);
$per_licence_Ex_1_year=substr($per_licence_Ex_1,$per_licence_Ex_1_month_pos+1);

$per_birthday_1_day_pos=strpos($per_birthday_1,'/',0);  
$per_birthday_1_month_pos=strrpos($per_birthday_1,'/',$per_birthday_1_day_pos+1);   
$per_birthday_1_day=substr($per_birthday_1,0,$per_birthday_1_day_pos);
$per_birthday_1_month=substr($per_birthday_1,$per_birthday_1_day_pos+1,$per_birthday_1_month_pos-$per_birthday_1_day_pos-1);
$per_birthday_1_year=substr($per_birthday_1,$per_birthday_1_month_pos+1);

$per_licence_Ex_2_day_pos=strpos($per_licence_Ex_2,'/',0);  
$per_licence_Ex_2_month_pos=strrpos($per_licence_Ex_2,'/',$per_licence_Ex_2_day_pos+1);   
$per_licence_Ex_2_day=substr($per_licence_Ex_2,0,$per_licence_Ex_2_day_pos);
$per_licence_Ex_2_month=substr($per_licence_Ex_2,$per_licence_Ex_2_day_pos+1,$per_licence_Ex_2_month_pos-$per_licence_Ex_2_day_pos-1);
$per_licence_Ex_2_year=substr($per_licence_Ex_2,$per_licence_Ex_2_month_pos+1);

$per_birthday_2_day_pos=strpos($per_birthday_2,'/',0);  
$per_birthday_2_month_pos=strrpos($per_birthday_2,'/',$per_birthday_2_day_pos+1);   
$per_birthday_2_day=substr($per_birthday_2,0,$per_birthday_2_day_pos);
$per_birthday_2_month=substr($per_birthday_2,$per_birthday_2_day_pos+1,$per_birthday_2_month_pos-$per_birthday_2_day_pos-1);
$per_birthday_2_year=substr($per_birthday_2,$per_birthday_2_month_pos+1);

 
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
	 
$sql2="UPDATE customer_table SET            
		Borrow1_title='".$per_title_1."',
		Borrow1_familyname='".$per_familyname_1."',
		Borrow1_givenname='".$per_givenname_1."',
		Borrow1_licenceno='".$per_licence_1."',
		Borrow1_expir_date='".$per_licence_Ex_1_day."',
		Borrow1_expir_month='".$per_licence_Ex_1_month."',
		Borrow1_expir_year='".$per_licence_Ex_1_year."',
		Borrow1_bir_date='".$per_birthday_1_day."',
		Borrow1_bir_month='".$per_birthday_1_month."',
		Borrow1_bir_year='".$per_birthday_1_year."',
		Borrow1_age='".$per_age_1."',
		
		Borrow2_title='".$per_title_2."',
		Borrow2_familyname='".$per_familyname_2."',
		Borrow2_givenname='".$per_givenname_2."',
		Borrow2_licenceno='".$per_licence_2."',
		Borrow2_expir_date='".$per_licence_Ex_2_day."',
		Borrow2_expir_month='".$per_licence_Ex_2_month."',
		Borrow2_expir_year='".$per_licence_Ex_2_year."',
		Borrow2_bir_date='".$per_birthday_2_day."',
		Borrow2_bir_month='".$per_birthday_2_month."',
		Borrow2_bir_year='".$per_birthday_2_year."',
		Borrow2_age='".$per_age_2."',
		
		street_adress='".$per_street_address_1."',
		POSTcode_1_1='".$per_postcode_1[0]."',
		POSTcode_1_2='".$per_postcode_1[1]."',
		POSTcode_1_3='".$per_postcode_1[2]."',
		POSTcode_1_4='".$per_postcode_1[3]."',
		street1_year='".$per_lived_year_1."',
		street1_month='".$per_lived_month_1."',
		home_telephone='".$per_home_tele."',
	    pre_address='".$per_street_address_2."',
		POSTcode_2_1='".$per_postcode_2[0]."',
		POSTcode_2_2='".$per_postcode_2[1]."',
		POSTcode_2_3='".$per_postcode_2[2]."',
		POSTcode_2_4='".$per_postcode_2[3]."',
		streetp1_year='".$per_lived_year_2."',
		streetp1_month='".$per_lived_month_2."',
		borrow1_mobile='".$per_mobile_1."',
		pre_address2='".$per_street_address_3."',
		POSTcode_3_1='".$per_postcode_3[0]."',
	    POSTcode_3_2='".$per_postcode_3[1]."',
		POSTcode_3_3='".$per_postcode_3[2]."',
		POSTcode_3_4='".$per_postcode_3[3]."',
		streetp2_year='".$per_lived_year_3."',
		streetp2_month='".$per_lived_month_3."',
		borrow2_mobile='".$per_mobile_2."',
		Email='".$per_email_address."',		 
		Rent_value='".$per_rent."',
		landlord_name='".$per_landlord."',
		telephone_landlord='".$per_landlord_tele."', 
		is_your_home='".$per_isyourhome."',
		Half_full_rent='".$per_num_share."',
		
		are_you_presently='".$per_areyoupresently."',
		no_of_dependents='".$per_num_of_child."',
		child_maintaince='".$per_child_maintaince."',
		
		borrower1_occupa='".$emp_occupation_1."',
		borrower1_employername='".$emp_occupation_detail_1."',
		borrower1_year='".$emp_occupation_year_1."',
		borrower1_month='".$emp_occupation_month_1."',
		borrower1_gross='".$emp_occupation_gross_1."',
		borrower1_net='".$emp_occupation_net_1."',
		borrower1_business_phone1='".$emp_occupation_phone_1."',
		borrower1_prev_occupa='".$emp_occupation_2."',
		borrower1_prev_employername='".$emp_occupation_detail_2."',
		borrower1_prev_year='".$emp_occupation_year_2."',
		borrower1_prev_month='".$emp_occupation_month_2."',
		borrower1_centrelink='".$emp_occupation_gross_2."',
		borrower1_prev_net='".$emp_occupation_net_2."',
		borrower1_business_phone2='".$emp_occupation_phone_2."',
		borrower2_occupa='".$emp_occupation_3."',
	    borrower2_employername='".$emp_occupation_detail_3."',
		borrower2_year='".$emp_occupation_year_3."',
		borrower2_month='".$emp_occupation_month_3."',
		borrower2_gross='".$emp_occupation_gross_3."',
		borrower2_net='".$emp_occupation_net_3."',
		borrower2_business_phone1='".$emp_occupation_phone_3."',
		borrower2_prev_occupa='".$emp_occupation_4."',
		borrower2_prev_employername='".$emp_occupation_detail_4."',
		borrower2_prev_year='".$emp_occupation_year_4."',
		borrower2_prev_month='".$emp_occupation_month_4."',
		borrower2_centrelink='".$emp_occupation_gross_4."',
		borrower2_prev_net='".$emp_occupation_net_4."',
		borrower2_business_phone2='".$emp_occupation_phone_4."',
		
		make='".$veh_make."',
		model='".$veh_model."',
		year='".$veh_year."',
		accessories='".$veh_accessories."',
		dealer='".$veh_dealer."',
		purchase_price='".$veh_purchase_price."',
		less_cash_deposit='".$veh_less_cash_dopo."',
		less_trade_in='".$veh_less_trade_in."',
		sub_total_dealer='".$veh_sub_total."',
		comprehensive_ins='".$veh_compre_ins."',
		gap_insurance='".$veh_gap_ins."',
		brokerage='".$veh_brokerage."',
		loan_protection='".$veh_loan_pro."',
		warranty='".$veh_warranty."',
		amount='".$veh_amount."',
		payout='".$veh_payout."',
		equity='".$veh_equity."',
		term_requested='".$veh_term_req."',
		rate_requested='".$veh_rate_req."',
		payment_requested='".$veh_payment_req."',
		
		company1='".$lia_company_1."',
		type_of_loan1='".$lia_loantype_1."',
		details1='".$lia_detail_1."',
		repayment1='".$lia_repayment_1."',
		balance1='".$lia_balance_1."',
		limit1='".$lia_limit_1."',
		company2='".$lia_company_2."',
		type_of_loan2='".$lia_loantype_2."',
		details2='".$lia_detail_2."',
		repayment2='".$lia_repayment_2."',
		balance2='".$lia_balance_2."',
		limit2='".$lia_limit_2."',
		company3='".$lia_company_3."',
		type_of_loan3='".$lia_loantype_3."',
		details3='".$lia_detail_3."',
		repayment3='".$lia_repayment_3."',
		balance3='".$lia_balance_3."',
		limit3='".$lia_limit_3."',
		company4='".$lia_company_4."',
		type_of_loan4='".$lia_loantype_4."',
		details4='".$lia_detail_4."',
		repayment4='".$lia_repayment_4."',
		balance4='".$lia_balance_4."',
		limit4='".$lia_limit_4."',
		bank_details='".$lia_bank_detail."',
		bank_phone='".$lia_bank_phone."',
		nearst_rela1='".$lia_refee_1."',
		rela1_phone='".$lia_refee__phone_1."',
		nearst_rela2='".$lia_refee_2."',
		rela2_phone='".$lia_refee__phone_2."',
		
		first_mortgage1='".$liaass_firstmortgage_1."',
		first_mortgage2='".$liaass_firstmortgage_2."',
		second_mortgage1='".$liaass_secondmortgage_1."',
		second_mortgage2='".$liaass_secondmortgage_2."',
		hire_purchases1='".$liaass_hirepurchase_1."',
		hire_purchases2='".$liaass_hirepurchase_2."',
		personal_loan1='".$liaass_personalloan_1."',
		personal_loan2='".$liaass_personalloan_2."',
		bank_overdraft1='".$liaass_bankoverdraft_1."',
		bank_overdraft2='".$liaass_bankoverdraft_2."',
		other_liab11='".$liaass_otherliabities_11."',
		other_liab12='".$liaass_otherliabities_12."',
		other_liab21='".$liaass_otherliabities_21."',
		other_liab22='".$liaass_otherliabities_22."',
		other_liab31='".$liaass_otherliabities_31."',
		other_liab32='".$liaass_otherliabities_32."',
		total_liab='".$liaass_lib_total."',
		
		house_ass1='".$liaass_house_1."',
		house_ass2='".$liaass_house_2."',
		content_ass1='".$liaass_content_1."',
		content_ass2='".$liaass_content_2."',
		car_ass11='".$liaass_car_11."',
		car_ass12='".$liaass_car_12."',
		car_ass21='".$liaass_car_21."',
		car_ass22='".$liaass_car_22."',
		bank_account_ass1='".$liaass_bankaccount_1."',
		bank_account_ass2='".$liaass_bankaccount_2."',
		share_ass1='".$liaass_share_1."',
		share_ass2='".$liaass_share_2."',
		other_ass11='".$liaass_other_11."',
		other_ass12='".$liaass_other_12."',
		other_ass21='".$liaass_other_21."',
		other_ass22='".$liaass_other_22."',
		total_ass='".$liaass_asset_total."',
		salary_gross='".$liaass_salary_1."',
		salary_net='".$liaass_salary_2."',
        share_living_ex1='".$liaass_living_expense1."',
		share_living_ex2='".$liaass_living_expense2."',
		
		credit_history='".$bef_credithistory."',
		financial_stress='".$bef_financial_hardship."',
	    reason1='".$bef_comment1."',
		reason2='".$bef_comment2."',
		final_notes='".$bef_comment3."'
		 WHERE application_id='".$app_id."'";	
	
}else{
	$sql2="INSERT INTO customer_table(application_id, Borrow1_title, Borrow1_familyname, Borrow1_givenname, Borrow1_licenceno, Borrow1_expir_date, Borrow1_expir_month, Borrow1_expir_year, Borrow1_bir_date, Borrow1_bir_month, Borrow1_bir_year, Borrow1_age, Borrow2_title, Borrow2_familyname, Borrow2_givenname, Borrow2_licenceno, Borrow2_expir_date, Borrow2_expir_month, Borrow2_expir_year, Borrow2_bir_date, Borrow2_bir_month, Borrow2_bir_year, Borrow2_age, street_adress, postcode_1_1, postcode_1_2, postcode_1_3, postcode_1_4, street1_year, street1_month, home_telephone, pre_address, postcode_2_1, postcode_2_2, postcode_2_3, postcode_2_4, streetp1_year, streetp1_month, borrow1_mobile, pre_address2, postcode_3_1, postcode_3_2, postcode_3_3, postcode_3_4, streetp2_year, streetp2_month, borrow2_mobile, Email, Rent_value, landlord_name, telephone_landlord, is_your_home, are_you_presently, no_of_dependents,Half_full_rent,child_maintaince, borrower1_occupa, borrower1_employername, borrower1_year, borrower1_month, borrower1_gross, borrower1_net, borrower1_business_phone1, borrower1_prev_occupa, borrower1_prev_employername, borrower1_prev_year, borrower1_prev_month, borrower1_centrelink, borrower1_prev_net, borrower1_business_phone2, borrower2_occupa, borrower2_employername, borrower2_year, borrower2_month, borrower2_gross, borrower2_net, borrower2_business_phone1, borrower2_prev_occupa, borrower2_prev_employername, borrower2_prev_year, borrower2_prev_month, borrower2_centrelink, borrower2_prev_net, borrower2_business_phone2, make, model, year, accessories, dealer, purchase_price, less_cash_deposit, less_trade_in, sub_total_dealer, comprehensive_ins, gap_insurance, brokerage, loan_protection, warranty, amount, payout, equity, term_requested, rate_requested, payment_requested, company1, type_of_loan1, details1, repayment1, balance1, limit1, company2, type_of_loan2, details2, repayment2, balance2, limit2, company3, type_of_loan3, details3, repayment3, balance3, limit3, company4, type_of_loan4, details4, repayment4, balance4, limit4, bank_details, bank_phone, nearst_rela1, rela1_phone, nearst_rela2, rela2_phone, first_mortgage1, first_mortgage2, second_mortgage1, second_mortgage2, hire_purchases1, hire_purchases2, personal_loan1, personal_loan2, bank_overdraft1, bank_overdraft2, other_liab11, other_liab12, other_liab21, other_liab22, other_liab31, other_liab32, total_liab, house_ass1, house_ass2, content_ass1, content_ass2, car_ass11, car_ass12, car_ass21, car_ass22, bank_account_ass1, bank_account_ass2, share_ass1, share_ass2, other_ass11, other_ass12, other_ass21, other_ass22, total_ass, salary_gross, salary_net, share_living_ex1,share_living_ex2,credit_history, financial_stress,reason1,reason2,final_notes,date) VALUES 
	('".$app_id."','".$per_title_1."','".$per_familyname_1."','".$per_givenname_1."','".$per_licence_1."','".$per_licence_Ex_1_day."','".$per_licence_Ex_1_month."','".$per_licence_Ex_1_year."','".$per_birthday_1_day."','".$per_birthday_1_month."','".$per_birthday_1_year."','".$per_age_1."','".$per_title_2."','".$per_familyname_2."','".$per_givenname_2."','".$per_licence_2."','".$per_licence_Ex_2_day."','".$per_licence_Ex_2_month."','".$per_licence_Ex_2_year."','".$per_birthday_2_day."','".$per_birthday_2_month."','".$per_birthday_2_year."','".$per_age_2."','".$per_street_address_1."','".$per_postcode_1[0]."','".$per_postcode_1[1]."','".$per_postcode_1[2]."','".$per_postcode_1[3]."','".$per_lived_year_1."','".$per_lived_month_1."'
	,'".$per_home_tele."','".$per_street_address_2."','".$per_postcode_2[0]."','".$per_postcode_2[1]."','".$per_postcode_2[2]."','".$per_postcode_2[3]."','".$per_lived_year_2."','".$per_lived_month_2."','".$per_mobile_1."','".$per_street_address_3."','".$per_postcode_3[0]."','".$per_postcode_3[1]."','".$per_postcode_3[2]."','".$per_postcode_3[3]."','".$per_lived_year_3."','".$per_lived_month_3."','".$per_mobile_2."','".$per_email_address."','".$per_rent."','".$per_landlord."','".$per_landlord_tele."','".$per_isyourhome."','".$per_areyoupresently."','".$per_num_of_child."','".$per_num_share."','".$per_child_maintaince."','".$emp_occupation_1."','".$emp_occupation_detail_1."','".$emp_occupation_year_1."','".$emp_occupation_month_1."','".$emp_occupation_gross_1."','".$emp_occupation_net_1."'
	,'".$emp_occupation_phone_1."','".$emp_occupation_2."','".$emp_occupation_detail_2."','".$emp_occupation_year_2."','".$emp_occupation_month_2."','".$emp_occupation_gross_2."','".$emp_occupation_net_2."','".$emp_occupation_phone_2."','".$emp_occupation_3."','".$emp_occupation_detail_3."','".$emp_occupation_year_3."','".$emp_occupation_month_3."','".$emp_occupation_gross_3."','".$emp_occupation_net_3."','".$emp_occupation_phone_3."','".$emp_occupation_4."','".$emp_occupation_detail_4."','".$emp_occupation_year_4."','".$emp_occupation_month_4."','".$emp_occupation_gross_4."','".$emp_occupation_net_4."','".$emp_occupation_phone_4."','".$veh_make."','".$veh_model."','".$veh_year."','".$veh_accessories."','".$veh_dealer."','".$veh_purchase_price."','".$veh_less_cash_dopo."','".$veh_less_trade_in."'
	,'".$veh_sub_total."','".$veh_compre_ins."','".$veh_gap_ins."','".$veh_brokerage."','".$veh_loan_pro."','".$veh_warranty."','".$veh_amount."','".$veh_payout."','".$veh_equity."','".$veh_term_req."','".$veh_rate_req."','".$veh_payment_req."','".$lia_company_1."','".$lia_loantype_1."','".$lia_detail_1."','".$lia_repayment_1."','".$lia_balance_1."','".$lia_limit_1."','".$lia_company_2."','".$lia_loantype_2."','".$lia_detail_2."','".$lia_repayment_2."','".$lia_balance_2."','".$lia_limit_2."','".$lia_company_3."','".$lia_loantype_3."','".$lia_detail_3."','".$lia_repayment_3."','".$lia_balance_3."','".$lia_limit_3."'
	,'".$lia_company_4."','".$lia_loantype_4."','".$lia_detail_4."','".$lia_repayment_4."','".$lia_balance_4."','".$lia_limit_4."','".$lia_bank_detail."','".$lia_bank_phone."','".$lia_refee_1."','".$lia_refee__phone_1."','".$lia_refee_2."','".$lia_refee__phone_2."','".$liaass_firstmortgage_1."','".$liaass_firstmortgage_2."','".$liaass_secondmortgage_1."','".$liaass_secondmortgage_2."','".$liaass_hirepurchase_1."','".$liaass_hirepurchase_2."','".$liaass_personalloan_1."','".$liaass_personalloan_2."','".$liaass_bankoverdraft_1."','".$liaass_bankoverdraft_2."','".$liaass_otherliabities_11."','".$liaass_otherliabities_12."','".$liaass_otherliabities_21."','".$liaass_otherliabities_22."','".$liaass_otherliabities_31."','".$liaass_otherliabities_32."','".$liaass_lib_total."','".$liaass_house_1."'
	,'".$liaass_house_2."','".$liaass_content_1."','".$liaass_content_2."','".$liaass_car_11."','".$liaass_car_12."','".$liaass_car_21."','".$liaass_car_22."','".$liaass_bankaccount_1."','".$liaass_bankaccount_2."','".$liaass_share_1."','".$liaass_share_2."','".$liaass_other_11."','".$liaass_other_12."','".$liaass_other_21."','".$liaass_other_22."','".$liaass_asset_total."','".$liaass_salary_1."','".$liaass_salary_2."','".$liaass_living_expense1."','".$liaass_living_expense2."','".$bef_credithistory."','".$bef_financial_hardship."','".$bef_comment1."','".$bef_comment2."','".$bef_comment3."','".$date."')";
	
	$sql3="insert into Application_Status(application_id,application_status)VALUES ('".$app_id."','just_before_submit')";
	 if ($conn->query($sql3) === TRUE) {
     }
	
}
 if ($conn->query($sql2) === TRUE) {
	  
	 header( "Location: http://bemanagement.discoverloans.com.au/view-the-application/?app_id=".$app_id ) ;
 }else{
	 echo "Error updating record: " . $conn->error;
 } 

?>