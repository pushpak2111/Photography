<?php 
   include("conection.php");
   
   if(isset($_REQUEST['id']))
   {
   		$id = $_REQUEST['id'];
		$sel = "select * from user_bookclname where cl_id = '$id'";
		$res = mysqli_query($conn,$sel);
		if(mysqli_num_rows($res))
		{
		?>
		<table id="sampleTable" class="table table-hover table-bordered">
		  <thead>
			<tr>
			  <th>Customer Id</th>
			  <th> Name</th>
              <th> Contact No</th>
              <th> Date</th>
              <th> Emailid</th>
			  <th>Address</th>
              <th>Package_id</th>
              <th>Customer_id</th>
			  
			  
			  
			</tr>
		  </thead>
		  <tbody>
			<?php
			$id = $_REQUEST['id'];
			$sel2 = "select * from user_bookclname  where user_bookclname.cl_id = '$id' ";
				$res2 = mysqli_query($conn,$sel2);
				while($row2 = mysqli_fetch_array($res2))
				{
				?>
					<tr>
						<td><?php echo $row2['cl_id'] ?></td>
						<td><?php echo $row2['cl_name']	?></td>
						<td><?php echo $row2['cl_num'] ?></td>
						<td><?php echo $row2['ev_date'] ?></td>
						<td><?php echo $row2['clemail'] ?></td>
						<td><?php echo $row2['cl_address'] ?></td>
						<td><?php echo $row2['package_id'] ?></td>
                        <td><?php echo $row2['customer_id'] ?></td>
						
						
				</tr>
				<?php
				}
				?>		
		  </tbody>
		</table>
		<?php
		}
		else
		{
		?>
		  <div class="form-group">
		  	<center><strong style="color:#F84714;">Record not found...!</strong></center>
		  </div>
		<?php	
		}
	
   }
?>