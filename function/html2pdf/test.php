<?php
$app_id=$_POST["app_id"];
//$app_id="12345";
///$app_id=$_POST["app_id"];
$servername = "localhost";
$username = "discov10_sean";
$password = "19900825";
 date_default_timezone_set("Australia/Brisbane");
$dbname2 = "discov10_usergenerate";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname2);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql ="select * from application_signature where application_id='".$app_id."'";
 $result1 = $conn->query($sql);
   if ($result1->num_rows > 0) {
	   while($row = $result1->fetch_assoc()) {
		   $svg1= $row["signature1_svg"];
		   $fullname1=$row["user1_fullname"];
		   $date1=$row["user1_date"];
		   $svg2= $row["signature2_svg"];
		   $fullname2=$row["user2_fullname"];
		   $date2=$row["user2_date"];
		    $svg3= $row["signature3_svg"];
		   $fullname3=$row["user3_fullname"];
		   $date3=$row["user3_date"];
		    $svg4= $row["signature4_svg"];
		   $fullname4=$row["user4_fullname"];
		   $date4=$row["user4_date"];
		 
		  
		  $pos1=strpos($svg1, "<g ");
		 // echo $pos1."<br>";
		  $pos2=strpos($svg1,"</g>");
		 // echo $pos2."<br>";
		  $alternative=substr($svg1,$pos1-1,$pos2-$pos1);
		  $change1="<draw style='margin: auto; width:70mm; height:40mm;'>". $alternative."</g></g></draw>";
		  
          $pos1=strpos($svg2, "<g ");
		  $pos2=strpos($svg2,"</g>");
          $alternative=substr($svg2,$pos1-1,$pos2-$pos1);
		  $change2="<draw style='margin: auto; width:70mm; height:40mm;'>". $alternative."</g></g></draw>";
 		  
		  $pos1=strpos($svg3, "<g ");
		  $pos2=strpos($svg3,"</g>");
          $alternative=substr($svg3,$pos1-1,$pos2-$pos1);
		  $change3="<draw style='margin: auto; width:70mm; height:40mm;'>". $alternative."</g></g></draw>";
		  
		  $pos1=strpos($svg4, "<g ");
		  $pos2=strpos($svg4,"</g>");
          $alternative=substr($svg4,$pos1-1,$pos2-$pos1);
		  $change4="<draw style='margin: auto; width:70mm; height:40mm;'>". $alternative."</g></g></draw>";
	   }
	   
   } 
    
  
   
   $content_plus="<span style='font-size:17px; ' id='sing1'>First Applicatant Name:    ".$fullname1."<br><br> Date:      ".$date1." <br><br>Signature:".$change1." </span> ";
   if ($fullname2!=""){ $content_plus=$content_plus.  "<span style='font-size:17px; ' id='sing2'>Second Applicatant Name:    ".$fullname2." <br><br>Date:      ".$date2." <br><br>Signature: ".$change2."</span> ";}
    
	if ($fullname3!=""){  $content_plus=$content_plus.  "<span style='font-size:17px; ' id='sing3'>First GUARANTOR Name:    ".$fullname3." <br><br>Date:      ".$date3." <br><br>Signature: ".$change3."</span> ";}
	 if ($fullname4!=""){   $content_plus=$content_plus.   "<span style='font-size:17px; ' id='sing4'>Second GUARANTOR Name:    ".$fullname4." <br><br>Date:      ".$date4." <br><br>Signature: ".$change4."</span> ";}
   
    $content = "<page>
	<h3>PERSONAL AND CREDIT INFORMATION PRIVACY ACT 1988 (AS AMENDED)</h3>
    <h4>AUTHORISATION TO ACT ON BEHALF OF INDIVIDUALS AND MANAGE PERSONAL INFORMATION	</h4>
	<hr> 
	I/We appoint Russell Parker Consulting Pty Ltd ATF The Nosey Trust T/AS Paleso Finance Group (Australian Credit Licence Number 376853) (“Paleso”) and/or DMP Finance Co Pty Ltd ATF THE DMP FINANCE TRUST T/AS Loans4Today (Australian Credit Licence Number 382327) (“L4T”) and it’s associated entities and any independent contractors it has appointed to assist in providing services to me/us to act on my/our behalf to seek access to my/our credit information, to arrange and assist in the management of finance and/or insurance facilities as detailed in Section 5 hereof. I understand and agree that Paleso and L4T and it’s associated Contractors may pay to, or receive from third parties, fees and/or benefits in relation to this appointment and the provision of these services. <br><br>
In this document:<br><br>
• The term “associated entities” refers to but is not limited to the following: Paleso, L4T and/or any Authorised Credit Representatives (ACR’s) we choose to appoint as a part of our licensing conditions and operation.<br> 
• The term “finance” refers to any form of financial accommodation including, but not limited to: Loans, Leases, Rentals, Hire Purchases or Hiring.<br> 
• The term “insurance” refers to any form of insurance facility including, but not limited to: Motor Vehicle Comprehensive, Loan Protection, Equity Protection (“Gap”), Title, Mechanical Breakdown Warranty, Extended New Car Warranties and Protection Plus Insurances.<br><br>
    If the purpose of the application is to arrange insurance facilities only, then sections 1,2 and 3 will not apply.<br><br>
	
	<b>1. ACKNOWLEDGEMENT OF DISCLOSURE OF CREDIT INFORMATION TO A CREDIT REPORTING AGENCY</b><br><br>
I/We agree that under Section 18E(8)(c) of the Privacy Act, a Credit Provider which Paleso and L4T and its Contractors may approach in arranging my/our finance (hereinafter an “Approached Credit Provider”), may give a credit reporting agency certain personal information about my/our application for finance.<br><br>
The information which may be given to an agency is covered by Section 18E(1) of the Act and includes:<br><br>
• Such permitted particulars about me/us which allow me/us to be identified;<br> 
• The fact that I/we have applied for finance and the amount;<br> 
• The fact that the Credit Provider is a current credit provider to me/us;<br> 
• Payments which become overdue more than 60 days, and for which collection action has commenced;<br> 
• Advice that payments are no longer overdue;<br> 
• Certain cheques drawn by me/us which have been dishonoured more than once;<br> 
• In specific circumstances, that in the opinion of the Credit Provider, I/we have committed a serious credit infringement;<br> 
• That finance provided to me/us by the Credit Provider has been paid or otherwise discharged.<br> <br> 
By virtue of this declaration, I/we understand that Paleso and L4T and/or its Contractors have informed me/us of the disclosure policy to a credit reporting agency of information about me/us by Approached Credit Providers and so authorise such disclosures.<br> 
   
   <b>2. AGREEMENT / AUTHORITY FOR AN APPROACHED CREDIT PROVIDER TO PERFORM CERTAIN PERMITTED ACTIONS CONCERNING A FINANCE APPLICATION OR TRANSACTION </b><br><br>
   
  I/We agree that, if it is considered relevant in assessing my/our application for personal credit, Paleso/L4T or it’s Contractors or an Approached Credit Provider may obtain a report about my/our personal or commercial activities or personal or commercial credit worthiness from a business which provides information about the commercial credit worthiness of persons.<br> <br> 
 I/We agree that, if it is considered relevant in assessing my/our application for commercial credit, Paleso/L4T or it’s Contractors or an Approached Credit Provider may obtain from a credit reporting agency a credit report containing personal credit information about me/us.<br><br>
 I/We agree that Paleso/L4t or its Contractors or an Approached Credit Provider may give to and seek information from any credit providers that may be named in a personal or commercial credit report issued by a credit reporting agency or commercial credit reporting agency respectively, information about my/our personal or commercial credit arrangements. <br><br>
 I/We understand that this information can include any information about me/our credit worthiness, credit standing, credit history or credit capacity that credit providers are allowed to give or receive from each other under the Privacy Act 1988 (as Amended).<br><br>
 
 <b>3. AUTHORISATION TO ACT ON BEHALF OF INDIVIDUALS</b> <br><br>
For the purpose of arranging the finance which is the subject of my/our application, the details of which appear below, I/we authorise Paleso, L4T and its Contractors to obtain, on my/our behalf, a report about my/our consumer and commercial credit worthiness from a credit reporting agency or a commercial credit reporting business or from a credit provider named in my/our application or referred to in such reports or on the application provided by my/us.<br><br>
I/We authorise Paleso, L4T and its Contractors to pass on the above obtained reports to such Approached Credit Providers as are appropriate for their consideration of this application<br><br>
 <b>4. INDIVIDUALS ORIGINALLY DOMICILED IN NEW ZEALAND - (NEW ZEALAND PRIVACY ACT 1993) </b><br><br>
I/We understand that Paleso, L4T and or its associated entities and Contractors are asking me for personal information about me so as to use Veda’s credit reporting service to credit check me. I/We understand that:<br><br>
• Veda will give you information about me for that purpose.<br> 
• You will give my personal information to Veda and that Veda will hold that information on their systems and use it to provide their reporting service.<br> 
• When other Veda customers use the Veda credit reporting service, Veda may give the information to those customers.<br> 
This section is only relevant to those applicants who have previously been domiciled in New Zealand.<br><br>

<b>5. COLLECTION AND MANAGEMENT OF PERSONAL INFORMATION</b><br><br>
I/We acknowledge and agree that:<br><br>
a) It is necessary for Paleso, L4T and its Contractors to collect personal information regarding me/us from both
ourselves and other parties, to enable Paleso, L4T and its Contractors to assess and verify if it is appropriate
to offer me/us Credit Assistance and subsequently apply on my/our behalf for the finance and insurance
facilities requested. I/We understand if I/we do not provide the information requested then my/our request for
Credit Assistance will not be able to be proceeded with any further.<br><br>
b) The information collected may be disclosed to, and used by, Paleso and L4T, its Contractors, Approached
Credit Providers and Insurers, current or previous Employers, current or previous Landlords to the degree that
each entity considers reasonable and necessary in considering and arranging requested facilities.<br><br>
c) Paleso, L4T, its Contractors, Approached Credit Providers and Insurers may provide information disclosed
and collected as above to any parties (such as but not limited to referees, employers, landlords, previous
Credit Providers or Insurers) named in the application or collected otherwise by me/us to the extent they deem
necessary to assist in assessing and arranging the requested facilities.<br><br>
d) I/We by way of this form, consent to my/our current and previous Landlords and my/our current and previous
Employers to disclose information regarding my tenure, wage, conduct and history as requested and deemed
necessary in assessing our application for Credit Assistance.<br><br>
e) Paleso, L4T, it’s associated Contractors and Approached Credit Providers may disclose allowed parts of
my/our personal information to third parties it engages, to assist in the provision of its Services to me/us
including mailing houses and IT Services in line with the Privacy Act 1988 (As Amended).<br><br>
f) The appointment provided herein is an ongoing one and if an Approached Credit Provider or insurer has, as a
result of an application on my/our behalf by Paleso, L4T or its Contractors, provided facilities to me/us then
that Credit Provider or Insurer is authorised to provide information to Paleso, L4T or its Contractors from time
to time relating to the subsequent conduct, status and any other information deemed appropriate in relation to
the facility assisted with upon request.<br><br>
g) I/We can gain access to the personal information I/we have provided or obtain more information on the Paleso
and L4T Privacy Policy by contacting Paleso Finance Group at 1/248 Musgrave Street, North Rockhampton or
accessing on our website – http://paleso.com.au/paleso-privacy-policy.html<br><br>
h) Paleso and L4T may retain the information obtained and, at its discretion provide to me/us, from time to time,
information about Paleso and L4T’s products and services. The provision of this information may be by
telephone, mail or electronic media (such as e-mail).<br><br>
i) Paleso may in particular, disclose information through an application process to Secure Funding Ltd (Liberty
Financial).<br><br>

<b>6. FACILITIES SOUGHT </b><br><br>
Purpose: To arrange Finance and/or Insurance Facilities.<br><br>
<b>7. EXECUTION</b><br><br>
a) APPLICANT/S CONSENT - I/we acknowledge that I/we have read and fully understand the contents of this
document. I/We also warrant that the personal information provided by me/us in our application is true and
correct and understand that Paleso and L4T and its Contractors will be relying on the same integrity in
seeking to arrange the facilities required.<br><br>
b) FURTHER CONSENTS – THESE CONSENTS ARE ONLY OPERATIVE WHEN COMPLETED AND SIGNED BY
ALL PARTIES. I/We agree that Paleso, L4T and its Contractors may also disclose to the under-mentioned third
party personal information, which it has received about me/us relating to the process and ultimate decision by
the Approached Credit Provider and/or Insurance Provider/s on my finance and/or insurance application.<br>
Such information may include:<br>
• The type of facilities that are being considered and/or offered by the Approached Credit and or
Insurance Providers.<br>
• The actual decision on the application/s by the Approached Credit and/or Insurance Providers.<br>
• The reasons supporting any decisions made by the Approached Credit and/or Insurance Providers,
including such personal information that may have been obtained by Paleso, L4T and its Contractors
that has in the opinion of Paleso, L4T and its Contractors had any influence on the decision made by
the Providers.<br><br>
In providing this authority, I/we acknowledge that Paleso, L4T and its Contractors have no control over the personal
information once it is passed on to the approved third party, and consequently cannot be held responsible or liable in
any way for the use or misuse of that information by the third party. Any third party which receives your information
should have a Privacy Policy in place which is consistent with the requirements of the Privacy Act 1988 (As Amended).
This consent extends to employees, servants and agents of the after mentioned nominated Third Party.<br><br>

 
<b>GUARANTOR PARTIES AGREEMENT</b><br><br>
I/We agree that the Approached Credit Provider may seek a credit report concerning me/us from a Credit Reporting
Agency to assess whether to access me/us as a Guarantor of the finance commitment for the above-named Applicant
Parties (Section 18K(1)c)). I/We also agree to Paleso, L4T, its Contractors, Approached Credit Providers and Insurers
collecting, retaining, disclosing and using my/our personal information to the degree and for the purposes described in
the paragraphs above. I/We understand that I/We can obtain access to the personal information I/we have provided as
described in Paragraph 5 above.<br><br>

".$content_plus."	
</page>";


 






    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
 
//      require_once(dirname(__FILE__).'/html2pdf.class.php');

   $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);
   $html2pdf->Output('exemple.pdf');
?>
