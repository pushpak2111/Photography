<?php 
   include("conection.php");
   
   if(isset($_REQUEST['id']))
   {
   		$id = $_REQUEST['id'];
		$sel = "select * from customer_reg where cid = '$id'";
		$res = mysqli_query($conn,$sel);
		if(mysqli_num_rows($res))
		{
		?>
		<table id="sampleTable" class="table table-hover table-bordered">
		  <thead>
			<tr>
			  <th>Customer Id</th>
			  <th> Name</th>
			  <th> Last Name</th>
			  <th>Address</th>
			  <th> Gender</th>
			  <th> Emailid</th>
			  <th> Contact No</th>
			  
			</tr>
		  </thead>
		  <tbody>
			<?php
			$id = $_REQUEST['id'];
			$sel1 = "select * from customer_reg  where customer_reg.cid = '$id' ";
				$res1 = mysqli_query($conn,$sel1);
				while($row1 = mysqli_fetch_array($res1))
				{
				?>
					<tr>
						<td><?php echo $row1['cid'] ?></td>
						<td><?php echo $row1['fname']	?></td>
						<td><?php echo $row1['lname'] ?></td>
						<td><?php echo $row1['address'] ?></td>
						<td><?php echo $row1['gender'] ?></td>
						<td><?php echo $row1['emailid'] ?></td>
						<td><?php echo $row1['mno'] ?></td>
						
						
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