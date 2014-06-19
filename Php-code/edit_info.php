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
<title>Update Teacher Info</title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
	<div class="row">
   <div class="col-md-8 col-md-push-3">
   <h4>Update Officer</h4>
	<form role="form" id="input" method="post" action="update_officercheck.php">
    <div class="form-group">
	<label for="exampleInputText1">Teacher Id :</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Id" name="oid" value="<?php
	$id=$_POST['officerid'];
	echo $id;
	?>" readonly>
    </div>
	<div class="form-group">
    <label for="exampleInputText1">Name :</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Name" name="name" value="<?php
	$db = oci_pconnect('alvi','oracle','localhost');
	$id=$_POST['officerid'];
	$sql="select name from officer where oid=".$id;
	$result=oci_parse($db,$sql);			                             		                              
    $res=oci_execute($result);
	$row=oci_fetch_array($result);
	echo $row[0];
	oci_execute($result);
	oci_close($db);
	?>">
    </div>
	
	<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="<?php
	$db = oci_pconnect('alvi','oracle','localhost');
	$id=$_POST['officerid'];
	$sql="select email from officer where oid=".$id;
	$result=oci_parse($db,$sql);			                             		                              
    $res=oci_execute($result);
	$row=oci_fetch_array($result);
	echo $row[0];
	oci_execute($result);
	oci_close($db);
	?>">
	</div>
    <div class="form-group">
    <label for="exampleInputText">Mobile Phone :</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Mobile Phone" name="mobile" value="<?php
	$db = oci_pconnect('alvi','oracle','localhost');
	$id=$_POST['officerid'];
	$sql="select mobile from officer where oid=".$id;
	$result=oci_parse($db,$sql);			                             		                              
    $res=oci_execute($result);
	$row=oci_fetch_array($result);
	echo $row[0];
	oci_execute($result);
	oci_close($db);
	?>">
    </div>
	<div class="form-group">
    <label for="exampleInputText">Res TelePhone :</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Phone" name="telephone" value="<?php
	$db = oci_pconnect('alvi','oracle','localhost');
	$id=$_POST['officerid'];
	$sql="select residantphone from officer where oid=".$id;
	$result=oci_parse($db,$sql);			                             		                              
    $res=oci_execute($result);
	$row=oci_fetch_array($result);
	echo $row[0];
	oci_execute($result);
	oci_close($db);
	?>">
    </div>
	<div class="form-group">
    <label for="exampleInputText">Office TelePhone :</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter Office Phone" name="otelephone" value="<?php
	$db = oci_pconnect('alvi','oracle','localhost');
	$id=$_POST['officerid'];
	$sql="select office_telephone from Teacher where t_id=".$id;
	$result=oci_parse($db,$sql);			                             		                              
    $res=oci_execute($result);
	$row=oci_fetch_array($result);
	echo $row[0];
	oci_execute($result);
	oci_close($db);
	?>">
    </div>
	
	<div class="form-group">
    <label for="exampleInputText">Room no:</label>
    <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Enter Room" name="room" value="<?php
	$db = oci_pconnect('alvi','oracle','localhost');
	$id=$_POST['officerid'];
	$sql="select t_roomno from officer where oid=".$id;
	$result=oci_parse($db,$sql);			                             		                              
    $res=oci_execute($result);
	$row=oci_fetch_array($result);
	echo $row[0];
	oci_execute($result);
	oci_close($db);
	?>">
    </div>
	<div class="form-group">
    <label for="exampleInputText">Retire Date:</label>
    <input type="date" class="form-control" id="exampleInputDate2"  name="rdate" >
    </div>

	<input type="submit" class="btn btn-default" value="Save Changes"></input>
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

