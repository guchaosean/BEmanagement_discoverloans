<?php 
    
   $name=$_POST["search_content"];
   
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
    
   $sql1 = "SELECT * FROM application_signature where user1_fullname like '%".$name."%' OR user2_fullname like '%".$name."%'";
     
   
    
   $result1 = $conn->query($sql1);
   if ($result1->num_rows > 0) {
	echo"<script type='text/javascript'>
function add(value)
{
    document.getElementById('id_hidden').value = value;
    document.getElementById('argform').submit();
   
}
</script>";
 
	echo "<form action='../functions/html2pdf/test.php' method='post' name='argform' id='argform' target='_blank'>
            <input type='hidden' name='app_id' id='id_hidden' value=''/>
                  
            <input type='submit' name='argsubmit' style='display:none'/>
            </form>";
 
	//echo "<table><tr><th>Search results</th></tr>";  
	echo "<p>Search Results</p>";
	echo "<table style='width:900px'><tr><th></th><th></th><th></th><th></th></tr>";   
	$num=0;
	while($row = $result1->fetch_assoc()) {
        $num=$num+1; 
        if ($num==1)             {echo "<tr><td><a href='javascript:add(&quot;".$row["application_id"]."&quot;);'>".$row["user1_fullname"]. "</a></td>  ";  }		
	    if (($num<=3)&&($num>1)) {echo "    <td><a href='javascript:add(&quot;".$row["application_id"]."&quot;);'>".$row["user1_fullname"]. "</a></td>  ";  }
		if ($num==4)     {$num=0; echo "    <td><a href='javascript:add(&quot;".$row["application_id"]."&quot;);'>".$row["user1_fullname"]. "</a></td> </tr>" ;}   
		//echo "<tr><td><a href='javascript:add(&quot;".$row["application_id"]."&quot;);'>".$row["Borrow1_familyname"]." ".$row["Borrow1_givenname"]. "</a></td> </tr>";
		//echo "<tr><td><a href='javascript:add(&quot;".$row["application_id"]."&quot;);'>".$row["Borrow1_familyname"]." ".$row["Borrow1_givenname"]. "</td><td> <input type='button' value='edit' onclick='add(&quot;".$row["application_id"]."&quot;);' /> </td></tr>";
    }
	  echo "</table>";  
	  
   }
   else{echo "0 results";}
   $conn->close();
?>