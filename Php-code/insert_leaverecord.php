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
<title>Leave Record</title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
	<div class="row" id="check">
    <div class="col-md-8 col-md-push-3" id="newhead">
    <h4>New Leave</h4>
	<form role="form" method="post" action="insert_newliaverecord_check.php">
    <div class="form-group">
    <label for="exampleInputText">Teacher Id :</label>
    <input type="number" class="form-control" id="exampleInputNumber1" placeholder= "Officer ID" name="tid">
    </div>
    <div class="form-group">
    <label for="exampleInputText1">Leave Id:</label>
    <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Leave Id" name="lid">
    </div>
	<div class="form-group">
    <label for="exampleInputDate1">Start Date:</label>
    <input type="text" class="form-control" id="exampleInputDate1" placeholder="DD-MM-YYYY" name="sdate" value="<?php echo date("d-m-Y")?>"> 
    </div>
	<label for="exampleInputDate1">End Date:</label>
    <input type="text" class="form-control" id="exampleInputDate1" placeholder="DD-MM-YYYY" name="fdate" >
	<br>
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