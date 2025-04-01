<?php
	include("conection.php");
	include("session.php");

		$value=$_REQUEST['value'];
		$id=$_REQUEST['id'];
	
		
		if($id=="cid")
		{
		 $q="select * from add_category where category='$value'";
			$res=mysqli_query($conn,$q);
			
			if(mysqli_num_rows($res)>0)
			{
				?>
			<button class="btn btn-danger" disabled="true">Category Name All Ready Exsist</button>
				
			<?php
			}
			else
			{
			?>
			
				<input type="submit"  name="btn_submit" class="btn btn-danger">
				
			<?php
			}
			?>
			
	<?php
			}
?>			
			
		
		