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
<title>Institutes</title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
	<div class="row" id="check">
    <div class="col-md-10 col-md-push-2" id="newhead">
    <?php 
			
            $i=1;
            $db = oci_pconnect('alvi','oracle','localhost');	
            $id=$_GET['name'];
			//$sql="insert into student values(10,'Mr. J')";		
            $sql="select a.I_Name,b.name,c.starting_date,c.finishing_date from Institute a,officer b,additional_responsibility c
			 where a.I_code='".$id."' and c.t_id=b.oid and c.designation='Director' order by starting_date desc"; 
            $result=oci_parse($db,$sql);			                             		                              
            oci_execute($result);
            //echo $result;
			
		     while($row=oci_fetch_array($result))
            {	
				if($i==1){
				 echo "<h4>".$row[0]."</h4><h4>Directors:</h4>";
                 echo "<table class='table table-bordered' style='border:1px solid black'>
				 <tr class='success'><th>Director Name</th><th>Starting Date</th><th>Finishing Date</th></tr>";
				 $i=2;
				 
				 }
				
				echo "<tr class='active'><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
				
            }		
            echo "</table>";
			oci_free_statement($result);
			$i=1;
			 $sql1="select a.I_Name,b.name,c.starting_date,c.finishing_date from Institute a,officer b,additional_responsibility c
			 where a.I_code='".$id."' and c.t_id=b.oid and c.designation='Member' order by starting_date desc"; 
            $result1=oci_parse($db,$sql1);			                             		                              
            oci_execute($result1);
            //echo $result;
			
		     while($row=oci_fetch_array($result1))
            {	
				if($i==1){
				 echo "<h4>Members:</h4>";
                 echo "<table class='table table-bordered' style='border:1px solid black'>
				 <tr class='success'><th>Member Name</th><th>Starting Date</th><th>Finishing Date</th></tr>";
				 $i=2;
				 
				 }
				
				echo "<tr class='active'><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
				
            }		
            echo "</table>";
			oci_free_statement($result1);
            oci_close($db);
	
	?>
	
    </div>
	
	<?php include 'institute_sidebar.php'?>
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