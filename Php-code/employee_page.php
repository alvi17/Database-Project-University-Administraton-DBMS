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
			echo "<h4>Employee Info:</h4>";
            $i=1;
            $db = oci_pconnect('alvi','oracle','localhost');	
            $id=$_GET['name'];
			//$sql="insert into student values(10,'Mr. J')";		
            $sql="select a.name,a.universityemail,a.email,a.mobile,a.residantphone,a.oid,a.dependents from officer a,employee b  where a.oid=".$id." and a.oid=b.oid "; 
            $result=oci_parse($db,$sql);			                             		                              
            oci_execute($result);
            //echo $result;
			$x;
		     while($row=oci_fetch_array($result))
            {	
				if($i==1){
                 echo "<table class='table table-bordered' style='border:1px solid black'>
				 <tr class='success'><td>Employee ID</td><td>".$row[5]."</td></tr>";
				 $i=2;
				 
				 }
				echo "<tr class='success'><td>Name</td><td>".$row[0]."</td></tr>";
				echo "<tr class='active'><td>Department </td><td>".$row[1]."</td></tr>";
				echo "<tr class='success'><td>University Email</td><td>".$row[2]."</td></tr>";
				echo "<tr class='success'><td>Email</td><td>".$row[3]."</td></tr>";
				echo "<tr class='active'><td>Mobile </td><td>".$row[4]."</td></tr>";
				
				echo "<tr class='active'><td>Dependents </td><td>".$row[6]."</td></tr>";
				
            }
					
            echo "</table>";
	         oci_free_statement($result);
			 
            oci_close($db);
	?>
	
    </div>
	
	<?php include 'department_sidebar.php'?>
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