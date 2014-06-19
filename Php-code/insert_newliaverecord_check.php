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
<title>New Leave Record</title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
	<div class="row">
   <div class="col-md-8 col-md-push-3">
	<?php
			$db = oci_pconnect('alvi','oracle','localhost');	    
			$tid=$_POST["tid"];
			$lid=$_POST["lid"];
			$sdate=$_POST["sdate"];

			$fdate=$_POST["fdate"];

			//$sql="insert into student values(10,'Mr. J')";		
			$sql1="select to_date('".$sdate."','dd-mm-yyyy') from dual";
			$result2=oci_parse($db,$sql1);
			oci_execute($result2);
			$row1=oci_fetch_array($result2);
			$sql2="select to_date('".$fdate."','dd-mm-yyyy') from dual";
			$result1=oci_parse($db,$sql2);
			oci_execute($result1);
			$row2=oci_fetch_array($result1);
			echo $row1[0]." ".$row2[0];
	        $sql="insert into teacher_leave values(".$tid.",".$lid.",'".$row1[0]."','".$row2[0]."')";
            $result=oci_parse($db,$sql);			                             		                              
            $res=oci_execute($result);
            if($res==1)
			echo "<script>alert('Successfully Inserted');</script>";
            oci_free_statement($result);
			oci_free_statement($result2);
			oci_free_statement($result1);
            oci_close($db);
	
	?>
		
    </div>
	
	
	<?php include 'admin_sidebar.php'?>
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