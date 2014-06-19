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
<title>Teachers</title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
	<div class="row" id="check">
    <div class="col-md-10 col-md-push-2" id="newhead">
    <?php 
			echo "<h4>Teacher Info:</h4>";
            $i=1;
            $db = oci_pconnect('alvi','oracle','localhost');	
            $id=$_GET['name'];
			//$sql="insert into student values(10,'Mr. J')";		
            $sql="select a.name,c.D_name,a.universityemail,a.email,a.mobile,a.residantphone,b.office_telephone,b.T_roomno,b.Joining_date,b.Retiring_date,
			b.status,a.salarybase,a.dependents,a.oid from officer a,teacher b,Departments c where a.oid=".$id." and a.oid=b.t_id and b.d_id=c.d_id"; 
            $result=oci_parse($db,$sql);			                             		                              
            oci_execute($result);
            //echo $result;
			$x;
		     while($row=oci_fetch_array($result))
            {	
				if($i==1){
                 echo "<table class='table table-bordered' style='border:1px solid black'>
				 <tr class='success'><td>Teacher ID</td><td>".$row[13]."</td></tr>";
				 $i=2;
				 
				 }
				echo "<tr class='success'><td>Name</td><td>".$row[0]."</td></tr>";
				echo "<tr class='active'><td>Department </td><td>".$row[1]."</td></tr>";
				echo "<tr class='success'><td>University Email</td><td>".$row[2]."</td></tr>";
				echo "<tr class='success'><td>Email</td><td>".$row[3]."</td></tr>";
				echo "<tr class='active'><td>Mobile </td><td>".$row[4]."</td></tr>";
				echo "<tr class='success'><td>Resident Phone</td><td>".$row[5]."</td></tr>";
				echo "<tr class='active'><td>Office Telephone </td><td>".$row[6]."</td></tr>";
				echo "<tr class='success'><td>Office Room No</td><td>".$row[7]."</td></tr>";
				echo "<tr class='active'><td>Joining Date </td><td>".$row[8]."</td></tr>";
				echo "<tr class='success'><td>Retiring Date</td><td>".$row[9]."</td></tr>";
				echo "<tr class='active'><td>Status </td><td>".$row[10]."</td></tr>";
				echo "<tr class='success'><td>SalaryBase</td><td>".$row[11]."</td></tr>";
				
				
				echo "<tr class='active'><td>Dependents </td><td>".$row[12]."</td></tr>";
				$x=$row[13];
            }
			$sql1="select c.designation from working a,officer b,designation c where a.oid=".$x." 
			 and a.oid=b.oid and a.enddate is null and a.designationid=c.designationid";
			
			$result1=oci_parse($db,$sql1);			                             		                              
            oci_execute($result1);
			$row1=oci_fetch_array($result1);
			echo "<tr class='success'><td>Designation</td><td>".$row1[0]."</td></tr>";			
            echo "</table>";
	         oci_free_statement($result);
			 oci_free_statement($result1);
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