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
<title>Departments</title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
	<div class="row">
  <div class="col-md-10 col-md-push-2">
  <div class="row">
	<?php 
	        echo  "<h3>Departments</h3>";// put your code here
            $i=1;
            $j=0;
            $db = oci_pconnect('alvi','oracle','localhost');	
            $id=$_GET['name'];

			//$sql="insert into student values(10,'Mr. J')";		
            $sql="select a.D_name,a.D_officeroom from departments a where a.D_Code='".$id."'"; 
            $result=oci_parse($db,$sql);			                             		                              
            oci_execute($result);
            //echo $result;
		     while($row=oci_fetch_array($result))
            {	
				if($i==1){
                 echo "<table class='table table-bordered' style='border:1px solid black;'>
				 <tr class='success'><th>DepartmentName</th><th>Officeroom</th></tr>";
				 $i=2;
				 
				 }
	
                echo 
				"<tr>"."<td>"
				.$row[0] ."</td>"."<td>".$row[1]."</td></tr>";

            }		
            echo "</table>";
			oci_free_statement($result);
		   $sql1="select a.name,a.oid from officer a,departments b,head_department c where b.D_Code='".$id."' and a.oid=c.t_id and b.d_id=c.d_id and 
		   c.finishing_date is null" ; 
            $result1=oci_parse($db,$sql1);			                             		                              
            oci_execute($result1);
            //echo $result;
			echo "<h4>Head Of Department</h4>";
			echo "<ul class='list-group'>";
		     while($row=oci_fetch_array($result1))
            {	
				
                echo 
				"<a href='teachers.php?name=".$row[1]."'><li  class='list-group-item'>".
				$row[0]."</li></a>";
            }		
            echo "</ul>";
			oci_free_statement($result1);
			
			$sql2="select a.name,a.oid from officer a,departments b,teacher c where b.D_Code='".$id."' and a.oid=c.t_id and b.d_id=c.d_id" ; 
            $result2=oci_parse($db,$sql2);			                             		                              
            oci_execute($result2);
            //echo $result;
			echo "<h4>Teachers</h4>";
			echo "<ul class='list-group'>";
		     while($row=oci_fetch_array($result2))
            {	
				
                echo 
				"<a href='teachers.php?name=".$row[1]."'><li  class='list-group-item'>".
				$row[0]."</li></a>";
            }		
            echo "</ul>";
			oci_free_statement($result2);
			
			
            oci_close($db)
	?>
	 </div>
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