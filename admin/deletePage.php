<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
<?php
$pid = $_GET['delpageid'];
$sql = "DELETE FROM blog_add_page WHERE id='$pid'";
$query = $object->insert($sql);
 if($query){
 	echo "<script>window.location='index.php'</script>";
 }else{
 	echo "mistake";
 }
        	
 ?>

