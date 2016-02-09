<?php 
    date_default_timezone_set("Australia/Brisbane");
  
   $data_type=$_POST["data_type"];
    
   if  ($data_type=='from_search'){ 
         $name=$_POST["search_text"];
   }
   else{ 
         $date_search_start= $_POST["search_date_start"];   
         $date_search_end= $_POST["search_date_end"]; 
	    }
   
   //$newDate_start = date("d/m/Y", strtotime($date_search_start));
   //$newDate_end =   date("d/m/Y", strtotime(date_search_end));
     
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
   if ($data_type=='from_search') {
   $sql1 = "SELECT * FROM Application_Status A ,customer_table B where A.application_id=B.application_id and (B.application_id like '%".$name."%' or B.Borrow1_familyname like '%".$name."%' or B.Borrow1_givenname like '%".$name."%' or B.Borrow1_licenceno like '%".$name."%')";
   }
   else{	   
	$sql1 = "SELECT * FROM Application_Status A ,customer_table B where A.application_id=B.application_id and  str_to_date(B.date, '%d/%m/%Y') between '".$date_search_start."' and '".$date_search_end."'";   
   }
 
   $result1 = $conn->query($sql1);
   if ($result1->num_rows > 0) {
	     echo "<table>
    <tr>
     <th>Application ID</th>
     <th>Name</th>
     <th>Driver license Number</th>
     <th>Issue Date</th>
     <th>Car Detail</th>
     <th>Application Status</th>
	 <th>Functions</th>
    </tr>";
	while($row = $result1->fetch_assoc()) {
         echo "<tr><td>".$row["application_id"]."</td><td>".$row["Borrow1_familyname"]."  ".$row["Borrow1_givenname"]."</td><td>".$row["Borrow1_licenceno"]."</td><td>".$row["date"]."</td><td>"."Make:".$row["make"]."<br>Model:".$row["model"]."<br>Year:".$row["year"]."</td><td>".$row["application_status"]."</td><td>"."<a href='http://bemanagement.discoverloans.com.au/view-the-application/?app_id=".$row["application_id"]."'>View</a>"."</td></tr>" ;
    }
      echo "   </table> </div>";
   }
   else{echo "0 results";}
   $conn->close();
?>