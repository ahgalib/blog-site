 <?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
<?php 
	$delid = $_GET['msgd'];
	$sql = "DELETE FROM blog_contact WHERE id='{$delid}'";
	$query = $object->delete($sql);
	if($query){
			echo "<script>alert('data deleted successfully')</script>";
		echo "<script>window.location='inbox.php'</script>";
	
	}else{
		echo "<script>alert('some thing wring')</script>";
	}
 ?>