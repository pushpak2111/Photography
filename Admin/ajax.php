<?php
	include("conection.php");
	
	if(isset($_REQUEST['state']))
	{
		$id = $_REQUEST['state'];
		$sel = "select * from sub_category where cid = '$id'";
		$res = mysqli_query($conn,$sel);
		?>
		<div class="form-group">
			
			<table><tr><td><select name="sel_city" required="" class="form-control" style="width:942px">
            <option selected="selected" value="">-- Select sub category --</option>
			<?php
			while($row = mysqli_fetch_array($res))
			{
			?>
			<option value="<?php echo $row['sid'] ?>"><?php echo $row['subcategoryname'] ?></option>
			<?php
			}
			?>
		</select>
			</td></tr></table>
		</div>
		<?php
		
	}
?>