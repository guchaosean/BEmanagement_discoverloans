<?php
	require "dataprocess.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Smart Forms - CSV Viewer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="http://cdn.datatables.net/1.10.0/css/jquery.dataTables.css" />
    <link type="text/css" rel="stylesheet" href="../css/csv-viewer/css/tables.custom.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#sfTable').dataTable();						
        });
    </script>    
</head>
<body>
    <div class="sftables">
    	<div class="dwnload"><a href="smartcsv.csv?v=v1"> CSV Download </a></div>
    	<div class="sftable-wrap">
        	<?php echo csvTable(); ?>
        </div>        
    </div>    
</body>
</html>