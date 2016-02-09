<?php 
    date_default_timezone_set("Australia/Brisbane");
  
   $data_type=$_POST["data_type"];
   $data_want=$_POST["data_want"];
   if  ($data_type=='from_search'){ $name=$_POST["search_content"];}
   else{ $date_search= $_POST["search_date"];}
   $newDate = date("d/m/Y", strtotime($date_search));
    
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
   $sql1 = "SELECT * FROM customer_table where  application_id like '%".$name."%'";
   }
   else{	   
	$sql1 = "SELECT * FROM customer_table where date='".$newDate."'";   
   }
 
   $result1 = $conn->query($sql1);
   if ($result1->num_rows > 0) {
	 
	while($row = $result1->fetch_assoc()) {
         echo "<a href='http://bemanagement.discoverloans.com.au/view-the-application?app_id=".$row['application_id']."'>".$row['Borrow1_familyname']."  ".$row['Borrow1_givenname']."->".$row['application_id']."</a>";
    }
  
   }
   else{echo "0 results";}
   $conn->close();
?>