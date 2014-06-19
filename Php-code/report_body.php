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
<title>Reportss</title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
	
	<div class="row">
  <div class="col-md-8 col-md-push-3">
  <div class="row">
	<?php
	$name=$_GET["name"];
	$db = oci_pconnect('alvi','oracle','localhost');
	$i=1;
	if($name=="leave")
	{
		
		$sql="select a.t_id,d.name,count(*),a.status from teacher a, teacher_leave b,officer d where a.t_id=b.t_id and b.t_id=d.oid
		and (select floor(months_between(sysdate,min(b.leave_start) ) /12) from dual)<=2
		group by a.t_id,a.status,d.name";
		
		$result=oci_parse($db,$sql);			                             		                                      
		$res=oci_execute($result);
		while($row=oci_fetch_array($result)){
		
		
						if($i==1){
                 echo "<table class='table table-bordered' style='border:1px solid black;'>
				 <tr class='success'><th>TeacherName</th><th>Number of Leave</th><th>Status</th></tr>";
				 $i=2;
				 
				 }
				 echo
				 "<tr><td>".$row[1].".</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
		
	    }
		echo "</table>";
		$i=1;
		oci_free_statement($result);
	
	}
	else if($name=="promotion")
	{
	$sql="select a.oid,b.name,count(*) from working a,officer b 
			where a.oid=b.oid and (select floor(months_between(sysdate,min(a.enddate) ) /12) from dual)<=10 
			group by a.oid,b.name ";
			$result=oci_parse($db,$sql);			                             		                                      
		   $res=oci_execute($result);
			while($row=oci_fetch_array($result)){
			if($i==1){
                 echo "<table class='table table-bordered' style='border:1px solid black;'>
				 <tr class='success'><th>officerId</th><th>OfficerName</th><th>Number of Promotion</th></tr>";
				 $i=2;
				 
				 }
				 echo
				 "<tr><td>".$row[0].".</td><td>".$row[1]."</td><td>".$row[2]."</td></tr>";
		
	    }
		echo "</table>";
		$i=1;
		oci_free_statement($result);
	
	
	}
	else if($name=="medical")
	{
		$sql="select a.oid,b.name,a.description,a.recorddate from medicalrecord a,officer b
 where a.oid=b.oid order by a.oid,a.recorddate ";
				$result=oci_parse($db,$sql);			                             		                                      
		   $res=oci_execute($result);
			while($row=oci_fetch_array($result)){
			if($i==1){
                 echo "<table class='table table-bordered' style='border:1px solid black,margin-top:20px;'>
				 <tr class='success'><th>officerId</th><th>OfficerName</th><th>Description</th><th>Record Date</th></</tr>";
				 $i=2;
				 
				 }
				 echo
				 "<tr><td>".$row[0].".</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
		
	    }
		echo "</table>";
		$i=1;
		oci_free_statement($result);
	
	}
	
	?>
 </div>
 </div>
	
	
	<?php include 'report_sidebar.php'?>
	
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