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
<title>Give Promotion</title>
</head>
<body>
<div class="container">
    <?php include_once('header.php'); ?>
	<div class="row">
   <div class="col-md-8 col-md-push-3">
	<h4>Promotion</h4>
	<form role="form" method="post" action="give_promotion_check.php">
    <div class="form-group">
    <label for="exampleInputText">Officer Id :</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Enter TeacherId" name="officerid">
    </div>
    <div class="form-group">
    <label for="exampleInputText1">Office Name:</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Office Name" name="office">
    </div>
	<div class="form-group">
    <label for="exampleInputDate1">Designation:</label>
    <input type="text" class="form-control" id="exampleInputText1" placeholder="Designation" name="designation">
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