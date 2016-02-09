<?php
require_once(dirname(__FILE__)."/dompdf/dompdf/dompdf_config.inc.php");
date_default_timezone_set('Australia/Melbourne');
$client_name=$_POST['client_name'];
$credit_provider=$_POST['creditprovider'];
$now = new DateTime();
$today_date=$now->format('Y-m-d'); 
$html_start=" <body >
<html style='font-family: verdana,arial,helvetica,sans-serif;  '>";
$credit_guide="
 <style>
   
    h2{font-size:20px;}
    span{font-size:14px;}	
	.page_footer{font-size:10px; position:relative; left:500px;}
 </style>
    <div style='width:700px;'>
	<span style='font-size:18px;'>DATE:".$today_date."</span><br><br><br> 
	<img src='paleso_logo.jpg' style='position: absolute;width: 208px;height: 81px;top: 8px;left: 486px;'></img>
    <span style='font-size:20px;'><b>CREDIT GUIDE</b></span>
    <h2  >What is a credit guide?</h2>
    <span  >A credit guide sets out important information about the services that we provide as a licensed broker, any fees and commission payable to us, our responsible lending obligations and our internal and external dispute resolution procedures and how you can access them.<br><br>
    We are required to provide this Credit Guide to you as soon as practicable after it becomes apparent that we are likely to provide credit assistance to you.<br></span>
    <h2  >What is credit assistance?</h2>
	<span  >We provide credit assistance when we:<br>
	<ul>
<li>Suggest or assist you to apply for a particular credit contract with a particular credit provider; or </li> 
<li>Suggest or assist to apply for an increase to the credit limit of a particular credit contract with a particular credit provider; or</li> 
<li>Suggest you remain in a particular credit contract with a particular credit provider.</li>
  </ul>
  </span> 
  <h2  >Which credit providers do we utilise when providing credit assistance?</h2>
  <span>We source credit products for a limited number of banks, lenders and other credit providers. At present, we can write loans with the following banks, lenders and other credit providers:
<ul type='none'>
<li>---GE MONEY</li>
<li>---ANZ BANKING GROUP (ESANDA)</li>
<li>---LIBERTY FINANCIAL</li>
<li>---CAPITAL FINANCE</li>
<li>---YAMAHA FINANCE</li>
</ul>
</span>
  
  <h2>How will I pay for the credit assistance provided?</h2>
  <span>The actual fee depends on the extent of work we need to undertake on your behalf but will not exceed $990(inc GST). The actual amount will be confirmed in the credit proposal we present to you prior to your acceptance of the credit we have obtained. This fee will be payable at the time the funds are released by the credit provider. No fee is charged if you do no accept the credit proposal. We will provide you with a credit quote containing details of our fees and any payments made to us by credit providers before we provide you with credit assistance.</span><br><br>
  <h2>What information is required to receive credit assistance?</h2>
  <span>Before we provide you with credit assistance, we are required to complete a Preliminary Assessment. This Preliminary assessment makes enquires about: 
  <ul type='none'>
  <li>--- Your requirements and objectives for seeking a credit product; </li>
  <li>--- Your financial and relevant personal situation;</li></span>
  </ul>
 
  <div align='center'>
  <span class='page_footer'>V2.1 Paul Sharkey Consulting Pty Ltd As Agents For Paleso Finance Group - Australian Credit Licence Number - 385787</span>
  </div>
  <br>
  <ul type='none'>
  <li>--- Your repayment capacity.</li>
  </ul>
  <span>We may also request documentation in order to verify the information contained in the preliminary assessment, such as pay slips, letter of employment and bank statements.</span>
  <h2>What information is kept on my credit file and can I examine my file?</h2>
  <span>We maintain a record of your personal profile including details gathered as part of our preliminary assessment. You are entitled to request a copy of our Preliminary Assessment*, and we must give you a copy if requested. There is no charge for requesting or receiving a copy of the Preliminary Assessment: 
<ul type='none'>
  <li>- At any time during the first 2 years - we must provide it within 7 business days; or </li>
  <li>- Between 2 and 7 years after it was conducted - we must provide within 21 business days. </li>
  </ul>
We are committed to implementing and promoting a privacy policy, which will ensure the privacy and security of your personal information. *The Preliminary Assessment is only valid for 90 days and available if credit assistance is actually provided.</span>

<h2>Are commissions, fees and other benefits paid to Paleso Finance Group by the credit provider?</h2>
<span>When we provide you with credit assistance, we (our directors and authorized credit representatives) receive commissions for the credit providers involved. We may receive the following commissions when we provide credit assistance to you: 
<ul type='none'>
<li>- Upfront Commission </li>
<li>- Additional Commission depending on the total volume of business we place with the credit provider. </li>
</ul>
We can provide, on request, a reasonable estimate of the commission, fees and benefits and how they are calculated.</span>
<h2>Are commissions paid by - Paleso Finance Group to other parties?</h2>
<span>we may pay a referral fee to people or oganisations that refer clients to us who receive credit assistance from us. All amounts paid to the referrer are from Paleso Finance Group's share of the commission and benefits. You won't pay any additional amount if we pay a referral fee. Paleso Finance Group only pays a referral fee to the referrer on settlement of a loan. We can provide, on request, a reasonable estimate of the commission and how it is calculated.</span>
<h2>What is a suitability assessment?</h2>
<span>By Law, we must not provide you with credit assistance if the credit contract is unsuitable for you.If Unsuitable, we cannot: 
<ul type='none'>
<li>- Suggest or assist you to apply for a particular credit contract with a particular credit provider; or </li>
<li>- Suggest or assist to apply for an increase to the credit limit of a particular credit contract with a particular credit provider; or </li>
<li>- Suggest you remain in a particular credit contract with a particular credit provider</li>
</ul>
</span>
<h2>When is a credit contract unsuitable?</h2>
<span>A credit contract will be unsuitable if:</span><br><br><br><br><br> 
 <div align='center'>
<span class='page_footer'>V2.1 Paul Sharkey Consulting Pty Ltd As Agents For Paleso Finance Group - Australian Credit Licence Number - 385787</span>
 </div>
<br>

<span>
<ul type='none'>
<li>- It is likely that you will be unable to comply with the financial obligations under the credit contract; or </li>
<li>- It is likely that you could only comply with the financial obligations with substantial hardship (such as having to sell your principal place of residence); or </li>
<li>- It is likely that the credit contract will not meet your stated requirements or objectives.</li>
</ul>
We want to ensure that the credit products you select with us are not unsuitable for your needs. Because of this, it is important that you openly and honestly discuss with us your requirements, objectives, preferences, financial situation and repayment capacity.
</span>
<h2>What should I do if I have a complaint about the Credit Licensee?</h2>
<span>If you have a complaint or concern about the service provided to you by the licensee, please contact their Complaints Resolution manger. As part of the Internal Dispute Resolution policy they will investigate the matter and endeavor to address it as quickly as possible.</span>
<br><br>
<span>
<b>Complaints Resolution Manager for Paleso Finance Group: </b>
<br><br>
<b>Patrick Knight</b> <br>
831 Beaudesert Road <br>
Coopers Plains QLD 4108<br>
</span>
<br>

<span>Our aim is to completely resolve any issues you raise. If, despite our best efforts, you believe your complaint has not been satisfactorily dealt with you can refer your complaint to an independent External Dispute Resolution Scheme. We belong to the following external, independent, dispute resolution scheme, which can be contacted as follows :</span>
<br><br>
<span>
<b>Credit Ombudsman Service Ltd <br>
Case Management Team <br>
PO BOX A252 <br>
Sydney South NSW 1235 <br>
Phone : 1800 138 422 <br>
Fax : (02) 92738440 <br>
Web: www.cosl.com.au<br></b>
<br>
<br>
</span>
A copy of COSL's dispute resolution policy is available at www.cosl.com.au or by request to Paleso Finance Group.

<br><br><br><br><br><br><br><br><br><br><br> <br><br> <br><br> 
 <div align='center'>
<span  class='page_footer'>V2.1 Paul Sharkey Consulting Pty Ltd As Agents For Paleso Finance Group - Australian Credit Licence Number - 385787</span>
 </div>
 <br><br> 
 </div>
 ";
$credit_proposal="
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	
}

</style>
<div style='width:700px;'>

<span style='font-size:18px;'>DATE:".$today_date."</span><br><br><br><br>
<img src='paleso_logo.jpg' style='position: absolute;width: 208px;height: 81px;top: 8px;left: 486px;'></img>
<span style='font-size:20px;'><b>Credit Proposal</b></span>
  <br><br>
  <span style='font-size:19px;'> Client¡¯s Names:".$client_name." </span>
  <h2>What is a credit proposal?</h2>
  <span>A credit proposal sets out important information about the particular credit contract that you have selectedor are interested in. <br><br>
  We are required to provide this Credit Proposal to you at the same time that we provide credit assistance to you.</span>
   <h2>What is credit assistance?</h2>
   <span>
   We provide credit assistance when we: 
   <ul>
<li>Suggest or assist you to apply for a particular credit contract with a particular provider; or </li>
<li>Suggest or assist you to apply for an increase to the credit limit of a particular credit contract with a particular credit provider; or </li>
<li>Suggest you remain in a particular credit contract with a particular credit provider.</li>
   </ul>
   </span>
   <h2>What is a reasonable estimate of the fees and charges payable to the credit provider?</h2>
<span>
The fees and charges payable may vary depending on which credit provider approves your loan. At the time of providing this document we have not received any formal approval for your loan, therefore we can only provide an estimate of fees and charges of the credit provider that Paleso Finance Group believes best suits your needs.
<br><br>

The credit provider we suggest best meets all your requirements is:<b>"."  ".$credit_provider."</b>
<br><br>
We estimate that the following fees and charges will be paid from your loan proceeds on settlement.<br><br>
The list below outlines our top 5 Credit Providers and an indicative estimate of the total fees that applies to their loan products.<br>
 <br><br><br>
<table align='center' style='width:600px;'>
<tr align='center'>
<th>Name of Provider</th>
<th>Estimated Fees Payable</th>
</tr>
<tr align='center'><td>GE MONEY</td><td>$350.00 to $990.00</td></tr>
<tr align='center'><td>ANZ BANKING GROUP(ESANDA)</td><td>$350.00 to $880.00</td></tr>
<tr align='center'><td>LIBERTY FINANCIAL</td><td>$350.00 plus a fee of nil to 10% of amount</td></tr>
<tr align='center'><td>CAPITAL FINANCE</td><td>$360.00 to $780.00</td></tr>
<tr align='center'><td>YAMAHA FINANCE</td><td>$350.00 to $810.00</td></tr>

</table>

</span>
<br><br><br> 
<div align='center'>
<span class='page_footer'>Russell Parker Consulting Pty Ltd ATF The Nosey Trust T/AS Paleso Finance Group - Australian Credit Licence # 376853</span>   
</div>   
   <br> 
   <h2>What fees are payable by you to Paleso Finance Group?</h2>
   <span>In providing you with credit assistance the maximum fee payable to Paleso Finance Group for this Service will is $990.00 including GST. <br><br>
Please refer to the Credit Quote for more information regarding this fee.</span>
<h2>What commissions are payable to Paleso Finance Group regarding my loan?</h2>
<span>
Commission is payable by the credit provider to Paleso Finance Group (or our directors, employees and authorized credit representatives) for assisting you to obtain finance. Commission can include Upfront Commission and Volume Bonus. We estimate that we will receive*: 
<ul>
 <li>An upfront commission ranging from the equivalent of 0% to 10% of the amount financed. (i.e $10000 amount financed, commission payable between $0 - $1000) ? A Volume Bonus ranging between 0% - 3% of the amount financed. (i.e $10000 amount financed, commission payable between $0 - $300) or;  </li>
 <li>A Volume Bonus ranging between 0 - 28% of the upfront commission payable. (ie: $800 upfront commission, volume bonus payable between $0 - $224)  </li>
 <li>The percentage is determined by the credit provider and is subject to review and change  </li>
</ul>
 * Commission is only payable if credit assistance is provided.


</span>
<h2>What commissions are paid by Paleso Finance Group to other parties?</h2>
<span>
We may pay a referral fee to people of organisations that refer clients to us who receive credit assistance from Paleso Finance Group. <br><br>
<i>Referral Fee: as an estimate of the maximum fee payable for your referral, we may pay up to 50% of the upfront commission payable to Paleso Finance Group. (ie: $800 upfront commission received, referral fee payable to your referrer up to $400) </i><br><br>
All amounts paid to the referrer are from Paleso Finance Group's share of the commission and benefits, and only paid to the referrer by Paleso Finance Group on settlement of a loan.


</span>
<h2>Will I receive additional information once my loan is approved?</h2>
<span>On finalisation of your credit proposal we will provide you with the Paleso Finance Group Services Summary for your review and acceptance.</span>
   <h2>Where can I find out more information regarding this proposal?</h2>
   <span>Should you have any questions about the information contained in this Credit Proposal, please contact Kerrod Casey on (07) 49269740</span>
   <br><br><br><br><br><br><br>
   <div align='center'>
   <span class='page_footer'>Russell Parker Consulting Pty Ltd ATF The Nosey Trust T/AS Paleso Finance Group ¨C Australian Credit Licence # 376853</span>
   </div>
   </div>
 <br> <br> <br> <br>  
"; 
 $income_pretest="
 <div align='center'>
<span style='font-size:20px;'>PALESO FINANCE GROUP PRELIMINARY TEST</span>
</div> 
 <br><br>
  <span>Date:".$today_date."</span>
  <br><br>
  <span>Client¡¯s Names:".$client_name."</span>
  <br><br>
  <span>Broker:"." ".$_POST['broker_name']."</span>
  <br><br>
  <span>Loan Purpose:"." ".$_POST['loan_purpose']."</span>
    <br><br><br><br>
  <table> 
  <tr>
    <td>Capacity:</td>
	<td></td>
	<td></td>
	<td></td>
  </tr>
 <tr>
    <td></td>
	<td>Borrower 1 NET monthly income</td>
	<td>"."$".$_POST['inputincome1']."</td>
	<td></td>
  </tr> 
  <tr>
    <td></td>
	<td>Borrower 2 NET monthly income</td>
	<td>"."$".$_POST['inputincome2']."</td>
	<td></td>
  </tr>   
  <tr>
    <td>  </td>
	<td>Other Income(Include CentreLink Income)</td>
	<td>"."$".$_POST['inputincome3']." </td>
	<td>  </td>
  </tr>
  <tr>
    <td></td>
	<td>Total Monthly Income</td>
	<td>"."$".$_POST['inputincomesum']."</td>
	<td></td>
  </tr>
  <tr>
    <td>Expenses:</td>
	<td> </td>
	<td></td>
	<td></td>
  </tr>
  <tr>
    <td> </td>
	<td>Mortgage Monthly </td>
	<td>"."$".$_POST['inputmortgage_monthly']."</td>
	<td></td>
  </tr>
   <tr>
    <td> </td>
	<td>Rent/Board Monthly </td>
	<td>"."$".$_POST['inputrent_monthly']."</td>
	<td>Minimum amount $400 P/MTH</td>
  </tr>
   <tr>
    <td> </td>
	<td>Living Expenses </td>
	<td>"."$".$_POST['inputliving_expenses']."</td>
	<td>Single $1150;Married/Defacto $1600/ Child $225</td>
  </tr>
   <tr>
    <td> </td>
	<td>Credit Cards </td>
	<td>"."$".$_POST['inputcredit_card']."</td>
	<td>Min 3% of Limit or $75 if no Credit Card</td>
  </tr>
   <tr>
    <td> </td>
	<td>Other Finance </td>
	<td> "."$".$_POST['inputother_finance']."  </td>
	<td></td>
  </tr>
  <tr>
    <td> </td>
	<td>Other Expenses </td>
	<td>"."$".$_POST['inputother_expenses']." </td>
	<td></td>
  </tr>
  <tr>
    <td> </td>
	<td>Other Expenses</td>
	<td>"."$".$_POST['inputthis_commitment']." </td>
	<td>THIS COMMITMENT</td>
  </tr>
  <tr>
    <td> </td>
	<td>Total Expenses</td>
	<td>"."$".$_POST['inputtotal_expenses']." </td>
	<td></td>
  </tr>
   <tr>
    <td>      &nbsp;      </td>
	<td>     &nbsp;      </td>
	<td>      &nbsp;     </td>
	<td>     &nbsp;       </td>
  </tr>
  <tr>
    <td> </td>
	<td>Surplus/Deficit</td>
	<td>"."$".$_POST['inputSurplus']." </td>
	<td></td>
  </tr>
  
  </table> 
   <br>
   <span>I confirm the information input in this assessment is accurate based on the information I have been provided.</span>
   <br><br><br><br>
   <canvas id='myCanvas' width='300' height='150' style='border:solid'></canvas>
   <br>
   <span>Broker Signature</span>


";
 
 
$the_end="</body></html>";
 
$html=$html_start.$credit_guide.$credit_proposal.$income_pretest.$the_end;
$dompdf = new DOMPDF();
$dompdf->load_html($html);

$dompdf->render();
$dompdf->set_paper("A4", "portrait");
$dompdf->stream("sample.pdf");
?>