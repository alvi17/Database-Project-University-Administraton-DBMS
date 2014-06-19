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
   <h4>New Teacher</h4>
	<form role="form" id="input" method="post" action="insert_officercheck.php">

    <div class="form-group">
    <label for="exampleInputText1">Name :</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Name" name="name">
    </div>
	<div class="form-group">
    <label for="exampleInputText">Department:</label>
	<select name="dept">
	<option value="Select Department" name="dept" form="input">Select Department</option>
	<?php 
	
	$db = oci_pconnect('alvi','oracle','localhost');
	$sql="select D_code from Departments";
	$result=oci_parse($db,$sql);			                             		                              
    oci_execute($result);
	while($row=oci_fetch_array($result))
	{
		echo "<option name='dept'>".$row[0]."</option>";
	
	}
	 oci_free_statement($result);
     oci_close($db);

	?>
	</select>

    </div>
	<div class="form-group">
    <label for="exampleInputEmail1"> Versity Email:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Versity email" name="vemail">
	</div>
	
	<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
	</div>
    <div class="form-group">
    <label for="exampleInputText">Mobile Phone :</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Mobile Phone" name="mobile">
    </div>
	<div class="form-group">
    <label for="exampleInputText">Res TelePhone :</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Phone" name="telephone">
    </div>
	<div class="form-group">
    <label for="exampleInputText">Office TelePhone :</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Office Phone" name="otelephone">
    </div>
	
	<div class="form-group">
    <label for="exampleInputText">Room no:</label>
    <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Enter Room" name="room">
    </div>

	

	<input type="submit" class="btn btn-default">
	</form>
		
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