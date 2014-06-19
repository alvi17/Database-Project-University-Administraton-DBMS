  <div class="col-md-2 col-md-pull-10">
      <?php
            $db = oci_pconnect('alvi','oracle','localhost');	

			//$sql="insert into student values(10,'Mr. J')";		
            $sql="select I_code from Institute"; 
            $result=oci_parse($db,$sql);			                             		                              
            oci_execute($result);
            //echo $result;
            
       
            while($row=oci_fetch_array($result))
            {	
				echo "<a class='btn btn-default'  href='institute.php?name=".$row[0]."' role='button' style='width:100%'>".$row[0]."</a><br>";
            }		
            
            oci_free_statement($result);
            oci_close($db);
        ?>

  <br>

  </div>