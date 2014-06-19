  <div class="col-md-2 col-md-pull-10">
  
  <a class="btn btn-default" href="faculties.php" role="button" style="width:100%" >Faculties</a>
  <div class="list-group">
  <a href="departments_faculty.php" class="list-group-item" > Depatments</a>
 
  </div>
  <a class="btn btn-default" href="departments.php" role="button" style="width:100%">Departments</a><br>
  <div class="list-group">
  <a href="departments_subsection.php?name=teachers" class="list-group-item">Teahers</a>
  <a href="departments_subsection.php?name=head" class="list-group-item" >Head of Department</a>
  </div>

  <a class="btn btn-default" href="departments_subsection.php?name=institute" role="button" style="width:100%">Institutes</a><br>
  <div class="list-group">
  <a href="departments_subsection.php?name=directors" class="list-group-item">Directors</a>
  </div>
  
  <a class="btn btn-default" href="offices.php?name=offices" role="button" style="width:100%" >Offices</a><br>
  <div class="list-group">
  <a href="employee.php" class="list-group-item" >Employees</a>
  </div><br>
  <a class="btn btn-default" href="leaves.php" role="button" style="width:100%">Leaves</a><br>
   <a class="btn btn-default" href="search.php" role="button" style="width:100%">Search</a><br>
   <button  data-toggle="modal" data-target="#myModal" style="width:100%">
   Admin</button>
   <br>
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Login Form</h4>
      </div>
      <div class="modal-body">
       <form role="form" method="post" action="admin.php">
  <div class="form-group">
    <label for="exampleInputText">User Id</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter UserId" name="userid">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
	<input type="submit" class="btn btn-default">
	</form>

      </div>

    </div>
  </div>
   
   
  </div>
  </div>