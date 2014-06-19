<div class="row">
  <div class="col-md-10 col-md-push-2">
  <div class="row">
	<?php
            echo  "<h1>Faculties</h1>";// put your code here
            $i=1;
            
            $db = oci_pconnect('alvi','oracle','localhost');	
            

			//$sql="insert into student values(10,'Mr. J')";		
            $sql="select distinct a.f_id,a.f_name,b.name,b.oid from faculty a,officer b,dean_faculty c where a.f_id=c.f_id and b.oid=c.t_id and c.finishing_date is null"; 
            $result=oci_parse($db,$sql);			                             		                              
            oci_execute($result);
            //echo $result;
			echo "<ul class='list-group'>";
            while($row=oci_fetch_array($result))
            {	
             
				if($i==1){
                 echo "<table class='table table-bordered' style='border:1px solid black'>
				 <tr class='success'><td>Faculty Name</td><td>Dean</td></tr>";
				 $i=2;
				 
				 }
				
				echo "<tr class='active'><td><a href=".$row[0]."_Faculty.php style='margin-top:-50px'>".$row[1]."</td>
				<td><a href='teachers.php?name=".$row[3]."' style='margin-top:-50px'>".$row[2]."</td>
				</tr>";
				
               
            }		
            echo "</table>";
            oci_free_statement($result);
            oci_close($db);
        ?>
		

 </div>
 </div>