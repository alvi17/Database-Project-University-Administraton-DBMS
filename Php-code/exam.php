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
<title>Exam</title>
</head>

<body>
<div class="container">
    <?php include_once('header.php'); ?>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid"> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="#">Home</a> </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top:-30px">
                <ul class="nav navbar-nav">
                    <li><a href="#">Exam</a></li>
                    <li><a href="#">Class</a></li>
                    <li><a href="#">Marks</a></li>
                    <li><a href="#">Upload File</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse --> 
        </div>
        <!-- /.container-fluid --> 
    </nav>
    <div class="container" style="padding-left:200px;padding-top:30px; padding-right:200px;;">
        <table class="table table-striped" style="width:100%">
            <colgroup>
            <col span="1" style="width: 10%;">
            <col span="1" style="width: 10%;">
            <col span="1" style="width: 15%;">
            <col span="1" style="width: 45%;">
            <col span="1" style="width: 10%;">
            <col span="1" style="width: 10%;">
            </colgroup>
            <tr class="success">
                <td>Course</td>
                <td>Date</td>
                <td>Time</td>
                <td>Topic</td>
                <td>Edit</td>
                <td>Cancel</td>
            </tr>
            <tr>
                <td>CSE307</td>
                <td>15-Mar,2014</td>
                <td>01.00 pm</td>
                <td>Specifying Control</td>
                <td><button type="button" class="btn btn-info">Edit</button></td>
                <td><button type="button" class="btn btn-danger">Cancel</button></td>
            </tr>
            <tr>
                <td>CSE101</td>
                <td>28-Mar,2014</td>
                <td>10.00 am</td>
                <td>Hardware Organization</td>
                <td><button type="button" class="btn btn-info">Edit</button></td>
                <td><button type="button" class="btn btn-danger">Cancel</button></td>
            </tr>
        </table>
    </div>
    <div style="text-align:center">
        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Scedule New Exam</button></td>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Schedule New Exam</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Course</label>
                                <ul class="nav nav-pills">
                                    <li class="dropdown" id="menu1"> <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1"> Select Course <b class="caret"></b> </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">CSE101</a></li>
                                            <li><a href="#">CSE205</a></li>
                                            <li><a href="#">CSE307</a></li>
                                            <li><a href="#">CSE407</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Date</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Time</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Time">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Topic</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Topic">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php include 'footer.php'; ?>

<script type="text/javascript">
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
   </script>
</body>
</html>
