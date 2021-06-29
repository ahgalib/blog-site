<?php include "inc/header.php";?>
<?php 
	if(isset($_POST["submit"])){
		
		$first_name = mysqli_real_escape_string($object->mysqlix,$_POST['firstname']);
		$last_name = mysqli_real_escape_string($object->mysqlix,  $_POST['lastname']);
		$emil = mysqli_real_escape_string($object->mysqlix, $_POST['email']);
		$msg = mysqli_real_escape_string($object->mysqlix, $_POST['msgB'] );

      	$sql = "INSERT INTO blog_contact(fname,lname,email,message) VALUES ('$first_name','$last_name','$emil','$msg')";
		$query = $object->insert($sql);
		if($query){
			echo "<script>alert('success')</script>";
			echo "<script>window.location = 'contact.php'</script>";
		}else{
			echo "<script>alert('UNNNNNNNNsuccess')</script>";
		}
	}
 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
			<form action="" method="post">
				<table>
					<tr>
						<td>Your First Name:</td>
						<td>
						<input type="text" name="firstname" placeholder="Enter first name" required="1"/>
						</td>
					</tr>
					<tr>
						<td>Your Last Name:</td>
						<td>
						<input type="text" name="lastname" placeholder="Enter Last name" required="1"/>
						</td>
					</tr>
					
					<tr>
						<td>Your Email Address:</td>
						<td>
						<input type="email" name="email" placeholder="Enter Email Address" required="1"/>
						</td>
					</tr>
					<tr>
						<td>Your Message:</td>
						<td>
						<textarea name="msgB"></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
						<input type="submit" name="submit" value="Submit"/>
						</td>
					</tr>
				</table>
			<form>				
 		</div>
	</div>
		<?php include "inc/sidebar.php" ?>
	</div><!-- close contentsection clear-->
	<?php include "inc/footer.php" ?>