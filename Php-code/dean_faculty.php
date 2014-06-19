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
<title>Dean Facullty</title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
	<div class="row">
  <div class="col-md-10 col-md-push-2">
  <div class="row">
	<?php
		$id=$_GET['name'];
		$i=1;
		$db = oci_pconnect('alvi','oracle','localhost');
		$sql="select a.f_name,b.name,c.starting_date,c.finishing_date,b.oid from faculty a,officer b,dean_faculty c where a.f_id=".$id." and c.t_id=b.oid"; 
            $result=oci_parse($db,$sql);			                             		                              
            oci_execute($result);
            //echo $result;
			
            while($row=oci_fetch_array($result))
            {	
             
				if($i==1){
				 echo "<h4>".$row[0]."</h4>";
                 echo "<table class='table table-bordered' style='border:1px solid black'>
				 <tr class='success'><td>Dean Name</td><td>StartDate</td><td>Finishing Date</td></tr>";
				 $i=2;
				 
				 }
				
				echo "<tr class='active'><td><a href='teachers.php?name=".$row[4]."' style='margin-top:-50px'>".$row[1]."</td>
				<td>".$row[2]."</td><td>".$row[3]."</td>
				</tr>";
				
               
            }
			$i=1;
            echo "</table>";
            oci_free_statement($result);
            oci_close($db);
	
	?>
	 </div>
 </div>
	<?php include 'facultysidebar.php'?>
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