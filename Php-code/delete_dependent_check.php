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
   <div class="col-md-8 col-md-push-3">
	<?php
			$db = oci_pconnect('alvi','oracle','localhost');	    
			$oid=$_POST["oid"];
			$name=$_POST["dname"];		
	        $sql="delete from dependant where oid=".$oid." and name='".$name."'";
            $result=oci_parse($db,$sql);			
            $res=oci_execute($result);
			$err=oci_error($result);
            if(!$res){
				
			    echo "<script> alert(".$err['message'].");</script>";
				oci_free_statement($result);
                oci_close($db);
				//header('Location: depandant_new.php'); 
			}
			else
			{
				echo "<script>alert('Successfully Deleted');</script>";
				$sql1="select name,dependents from officer where oid=".$oid;
				$result1=oci_parse($db,$sql1);
				$res1=oci_execute($result1);
				while($row=oci_fetch_array($result1))
            {	
				
                 echo "<table class='table table-bordered' style='border:1px solid black;'><tr><th>Officer Name</th><th>Dependants</th></tr>
				 <tr><td>".$row[0]."</td><td>".$row[1]."</td></tr></table>";
			 
            }	
			oci_free_statement($result1);
			oci_free_statement($result);
            oci_close($db);
			
				
			}

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