<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.css" />
<link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap-theme.css" />
<link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="main.css" />
<script src="jquery.js"></script>

<script src="bootstrap-3.1.1-dist/js/bootstrap.js"></script>
<script src="bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
<title>Faculties</title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
	<div class="row">
	<div class="col-md-10 col-md-push-2">
	
	<div class="row">
	<?php
		$db = oci_pconnect('alvi','oracle','localhost');	
			//$sql="insert into student values(10,'Mr. J')";		
             
			$sql1="select * from Faculty";        
			$result1=oci_parse($db,$sql1);			
			oci_execute($result1);
            //echo $result;
            while($row1=oci_fetch_array($result1)){
			echo "<h3>".$row1[1]."</h3>";
			$sql="select  a.D_name from Departments a where a.F_id=".$row1[0];
			$result=oci_parse($db,$sql);
			oci_execute($result);
			echo "<ul class='list-group'>";
            while($row=oci_fetch_array($result))
            {	
                echo 
				"<a href='#'><li  class='list-group-item'>".
				$row[0]."</li></a>";			  
            }		
            echo "</ul>";
			oci_free_statement($result);
			}				
			oci_free_statement($result1);
            oci_close($db);
	
	?>
	</div>
    </div>
	<?php include 'facultysidebar.php'?>
</div>
<?php include 'footer.php'; ?>

</body>
</html>
</head>