<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
<?php 
	$delid = $_GET['delid'];
	$del_img_sql = "SELECT * FROM blog_post WHERE id='{$delid}'";
	$del_img_query = $object->select($del_img_sql);
	if($del_img_query){
		while($row = $del_img_query->fetch_assoc()){
			$del_img_link = $row['img'];
			unlink($del_img_link);
		}
	}
	$sql = "DELETE FROM blog_post WHERE id='{$delid}'";
	$query = $object->delete($sql);
	if($query){
			echo "<script>alert('data deleted successfully')</script>";
		echo "<script>window.location='postlist.php'</script>";
	
	}else{
		echo "<script>alert('some thing wring')</script>";
	}

 ?>