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
<title>Pay Scale</title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
	<div class="row">
   <div class="col-md-8 col-md-push-3">
	<?php
			$db = oci_pconnect('alvi','oracle','localhost');	    
			$grade=$_POST["grade"];
			$salary=$_POST["ssalary"];
			$increment=$_POST["increment"];
			
			
			//$sql="insert into student values(10,'Mr. J')";		

	        $sql="update payscale set startingsalary=".$salary." where grade=".$grade;
            $result=oci_parse($db,$sql);			                             		                              
            $res=oci_execute($result);
            if($res==1)
			echo "<script>alert('Operation Successfully Performed');</script>";
            oci_free_statement($result);
			
			
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