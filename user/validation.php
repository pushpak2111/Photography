<?php
include "conection.php";
$value = $_GET['query'];
$formfield = $_GET['field'];
		
		if ($formfield == "email") 
		{
			if (empty($value)) 
			{
				echo "Required"."<br>";
			}
			else
			{
				if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)) 
				{
					echo "Invalid Email";
				}
				else
				{
					$sel1 = "select * from customer_reg where emailid='$value'";
					$abc=mysqli_query($conn,$sel1);
					$sel=mysqli_fetch_array($abc);
					//$arr = array('pr_email'=>$value);
					//$sel = $this->mymodel->selectwhere("patient_reg",$arr);
					if(mysqli_num_rows($abc))
					{
					?>
						<input type="hidden" name="email" value="<?php echo $sel['emailid'] ?>" />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="review_submit" type="submit" name="btn_submit" class="btn btn-success" value="Submit">Submit</button><br><br>
					<?php
					}
					else
					{
						echo "This Email not Exist..!";
					}
				}
			}
		}
		//if ($formfield == "otp") 
		//{
			
		//}

?>