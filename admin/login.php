<?php 
 
include("../lib/session.php");
	session::checklogin();
include("../helpers/formet.php");
include("../oop-Lib/code.php");
$date_obj = new helps();

$object = new blog();



 ?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		
		
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" name = "login" value="Log in" />
			</div>
		</form><!-- form -->

		<?php 
		if(isset($_POST['login'])){
			$userN = $_POST['username'];
			$userP = $_POST['password'];
			$sql = "SELECT * FROM blog_user WHERE username = '$userN' AND password = '$userP'";
			$result = $object->select($sql);
			if($result != false){
				$value = $result->fetch_assoc();
				//$row = mysqli_num_rows($result); aita lgbe na  
			
					session::set("login",true);
					session::set("username",$value['username']);
					session::set("userId",$value['id']);
					session::set("userRole",$value['role']);
					header("Location:index.php");
				

			}else{
				echo "Username OR Password not matched";
			}
		}
		
			
		 ?>

		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>