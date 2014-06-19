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
   <div class="col-md-10 col-md-push-2" id="newhead">
    <?php
			$db = oci_pconnect('alvi','oracle','localhost');	
            $i=1;
			$name=$_GET['name'];
			if($name=='teachers')
			{
				$sql="select a.oid,a.name,b.D_name from officer a,departments b, teacher c where a.oid=c.t_id and b.d_id=c.d_id";
			echo "<h4>Teachers</h4>";				
            $result=oci_parse($db,$sql);			                             		                              
            oci_execute($result);
			while($row=oci_fetch_array($result)){
				if($i==1){
                 echo "<table <table class='table table-bordered' style='border:1px solid black;margin-top:-10px'> <tr class='success'><th>TeacherName</th><th>Department</th></tr>";
				 $i=2;
				 }
                echo 
				"<tr class='active'>"."<td><a href='teachers.php?name=".$row[0]."'>
				 ".$row[1] ."</a></td>"."<td>".$row[2]."</td><br>";			  
            }		
            echo "</table>";	
			oci_free_statement($result);
			}
			else if($name=='head')
			{
				echo "<h4>Heads Of Departments</h4>";
				$sql1="select d_code,d_name from departments";
				$result1=oci_parse($db,$sql1);			                             		                              
                oci_execute($result1);
				while($row1=oci_fetch_array($result1)){
				echo "<h4>".$row1[1]."</h4>";
				$sql="select a.oid,a.name,b.D_code,c.starting_date,c.finishing_date from officer a, departments b, head_department c where a.oid=c.t_id and c.d_id=b.d_id and b.d_code='".$row1[0]."'";
								
            $result=oci_parse($db,$sql);			                             		                              
            oci_execute($result);
			while($row=oci_fetch_array($result)){
				if($i==1){
                 echo "<table <table class='table table-bordered' style='border:1px solid black;'> <tr class='success'><th>TeacherName</th><th>StartDate</th><th>FinishDate</th></tr>";
				 $i=2;
				 }
                echo 
				"<tr class='active'>"."<td><a href='teachers.php?name=".$row[0]."'>
				 ".$row[1] ."</a></td>"."<td>".$row[3]."</td><td>".$row[4]."</td></tr>";			  
            }		
            echo "</table>";		
			oci_free_statement($result);
			}
			oci_free_statement($result1);
			}
			else if($name=='institute')
			{
				echo "<h4>Institutes, Centers & Others</h4>";
				$sql="select a.I_Name,a.I_code,a.I_Location from Institute a";
				$result=oci_parse($db,$sql);			                             		                              
				oci_execute($result);
				while($row=oci_fetch_array($result)){
				if($i==1){
                 echo "<table <table class='table table-bordered' style='border:1px solid black;'> <tr class='success'><th>Institute Name</th><th>Short Name</th><th>Location</th></tr>";
				 $i=2;
				 }
                echo 
				"<tr class='active'>"."<td><a href='institute.php?name=".$row[1]."'>
				 ".$row[0] ."</a></td>"."<td>".$row[1]."</td><td>".$row[2]."</td></tr>";			  
            }		
            echo "</table>";
				oci_free_statement($result);
		
			}
			else if($name=='directors')
			{
				echo "<h4>Directors of Institutes, Centers & Others</h4>";
				$sql="select a.name,b.I_name,c.Starting_date,c.t_id,c.I_code from officer a,Institute b,Additional_Responsibility c
				 where c.t_id=a.oid and c.I_code=b.I_code and c.Designation='Director' and c.finishing_date is null";
				$result=oci_parse($db,$sql);			                             		                              
				oci_execute($result);
				while($row=oci_fetch_array($result)){
				if($i==1){
                 echo "<table <table class='table table-bordered' style='border:1px solid black;'> <tr class='success'><th>Institute Name</th><th>Director Name</th><th>Starting Date</th></tr>";
				 $i=2;
				 }
                echo 
				"<tr class='active'>"."<td><a href='institute.php?name=".$row[4]."'>
				 ".$row[1] ."</a></td>"."<td><a href='teachers.php?name=".$row[3]."'>".$row[0]."</td><td>".$row[2]."</td></tr>";			  
            }		
				echo "</table>";

			}
			else if($name=='offices')
			{
				echo "<h4>Offices</h4>";
				$sql="select ";
				$result=oci_parse($db,$sql);			                             		                              
				oci_execute($result);
				while($row=oci_fetch_array($result)){
				if($i==1){
                 echo "<table <table class='table table-bordered' style='border:1px solid black;'> <tr class='success'><th>Institute Name</th><th>Director Name</th><th>Starting Date</th></tr>";
				 $i=2;
				 }
                echo 
				"<tr class='active'>"."<td><a href='institute.php?name=".$row[4]."'>
				 ".$row[1] ."</a></td>"."<td><a href='teachers.php?name=".$row[3]."'>".$row[0]."</td><td>".$row[2]."</td></tr>";			  
            }		
				echo "</table>";
oci_free_statement($result);
			}
			
		    $i=1;
	
            
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