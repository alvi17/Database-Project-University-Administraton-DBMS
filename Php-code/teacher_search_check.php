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
<title>Search Teacher</title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
	
	<div class="row">
	<div class="col-md-10 col-md-push-2">
	<div class="row">
		
	<br>
	<?php
	$i=1;
	$db = oci_pconnect('alvi','oracle','localhost');
	$name=$_POST["name"];
	$dept=$_POST["dept"];
	$year=$_POST["year"];
	if($year==null)$year=0;
	$sql="select b.oid,d.d_name,b.name,b.universityemail,
			min(c.startdate) from teacher a,officer b,working c,
			departments d where a.d_id=d.d_id and a.t_id=b.oid and b.oid=c.oid and b.name 
			like '%".$name."%' and d.d_name like '%".$dept."%'  group by b.oid,b.name,b.universityemail,d.d_name
			 having (select floor(months_between(sysdate,min(c.startdate) ) /12) from dual)>=0";
	
	$result=oci_parse($db,$sql);			                             		                              
     $res=oci_execute($result);
	  while($row=oci_fetch_array($result)){
		if($i==1){
                 echo "<table class='table table-bordered' style='border:1px solid black;'>
				 <tr class='success'><th>TeacherName</th><th>Department</th></tr>";
				 $i=2;
				 
				 }
				
                echo 
				"<tr>"."<td>"
				.$row[2] ."</td>"."<td>".$row[1]."</td></tr>";	

				
            }		
            echo "</table>";
	  
	 
	?>
	</div>
	</div>
	
	<?php include 'search_sidebar.php'?>
	

</div>
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