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
<title>Employees</title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
	<div class="row" id="check">
    <div class="col-md-10 col-md-push-2" id="newhead">
    <?php 
			
            $i=1;
            $db = oci_pconnect('alvi','oracle','localhost');	
            
			//$sql="insert into student values(10,'Mr. J')";		
            $sql="select a.oid,a.name from officer a,employee b where a.oid=b.oid"; 
            $result=oci_parse($db,$sql);			                             		                              
            oci_execute($result);
            //echo $result;
			
		     while($row=oci_fetch_array($result))
            {	
				if($i==1){
				 
                 echo "<table class='table table-bordered' style='border:1px solid black'>
				 <tr class='success'><th>Employee Id</th><th>Employee Namee</th></tr>";
				 $i=2;
				 
				 }
				
				echo "<tr class='active'><td>".$row[0]."</td><td><a href='employee_page.php?name=".$row[0]."'>".$row[1]."</td>";
				
            }		
            echo "</table>";
			oci_free_statement($result);
			
            oci_close($db);
	
	?>
	
    </div>
	
	<?php include 'sidebar.php'?>
</div>
<?php include 'footer.php'; ?>

<script type="text/javascript">
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
		
</script>
</body>
</html>
</head>