<?php 
    
   $name=$_POST["search_content"];
   $data_type=$_POST["data_type"];
   $data_want=$_POST["data_want"];
    
   
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
   if ($data_type=='from_search'){
   $sql1 = "SELECT * FROM customer_table where Borrow1_familyname like '%".$name."%' OR Borrow1_givenname like '%".$name."%' OR application_id='".$name."'";
     
   }
   else{
      if ($data_want=='all'){  $sql1 = "SELECT * FROM customer_table "; }	   
      else{                    $sql1 = "SELECT * FROM customer_table where Borrow1_familyname like '".$data_want."%' ";}
	   
   }
   $result1 = $conn->query($sql1);
   if ($result1->num_rows > 0) {
	     
	echo"<script type='text/javascript'>
function add(value,value1,value2)
{
    document.getElementById('id_hidden').value = value;
	document.getElementById('id_hidden_2').value = value1+'  '+value2;
    document.getElementById('argform').submit();
   
}
</script>";
 
	echo "<form action='http://bemanagement.discoverloans.com.au/customer-search-result/' method='post' name='argform' id='argform' target='_blank'>
            <input type='hidden' name='id' id='id_hidden' value=''/>
            <input type='hidden' name='custom_name'  id='id_hidden_2' value=''/>    
            <input type='submit' name='argsubmit' style='display:none'/>
            </form>";
 
	//echo "<table><tr><th>Search results</th></tr>";  
	echo "<p>Search Results</p>";
	echo "<table style='width:900px'><tr><th>Application ID</th><th>Customer Name</th><th>Drive Licence</th><th>Car Detail</th></tr>";   
	$num=0;
	while($row = $result1->fetch_assoc()) {
        //$num=$num+1; 
        //if ($num==1)             {echo "<tr><td><a href='javascript:add(&quot;".$row["application_id"]."&quot;,&quot;".$row["Borrow1_familyname"]."&quot;,&quot;".$row["Borrow1_givenname"]."&quot;);'>".$row["Borrow1_familyname"]." ".$row["Borrow1_givenname"]. "</a></td>  ";  }		
	    //if (($num<=3)&&($num>1)) {echo "    <td><a href='javascript:add(&quot;".$row["application_id"]."&quot;,&quot;".$row["Borrow1_familyname"]."&quot;,&quot;".$row["Borrow1_givenname"]."&quot;);'>".$row["Borrow1_familyname"]." ".$row["Borrow1_givenname"]. "</a></td>  ";  }
		//if ($num==4)     {$num=0; echo "    <td><a href='javascript:add(&quot;".$row["application_id"]."&quot;,&quot;".$row["Borrow1_familyname"]."&quot;,&quot;".$row["Borrow1_givenname"]."&quot;);'>".$row["Borrow1_familyname"]." ".$row["Borrow1_givenname"]. "</a></td> </tr>" ;}   
		echo "<tr><td><a href='http://bemanagement.discoverloans.com.au/view-the-application/?app_id=".$row["application_id"]."'>".$row["application_id"]."</a></td><td>".$row["Borrow1_familyname"]." ".$row["Borrow1_givenname"]."</td><td>".$row['Borrow1_licenceno']."</td><td>"."Make:".$row["make"]."<br>Model:".$row["model"]."<br>Year:".$row["year"]."</td></tr>";
		
		//echo "<tr><td><a href='javascript:add(&quot;".$row["application_id"]."&quot;);'>".$row["Borrow1_familyname"]." ".$row["Borrow1_givenname"]. "</a></td> </tr>";
		//echo "<tr><td><a href='javascript:add(&quot;".$row["application_id"]."&quot;);'>".$row["Borrow1_familyname"]." ".$row["Borrow1_givenname"]. "</td><td> <input type='button' value='edit' onclick='add(&quot;".$row["application_id"]."&quot;);' /> </td></tr>";
    }
	  echo "</table>";  
	  
   }
   else{echo "0 results";}
   $conn->close();
?>