<?php include "inc/header.php";?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php 
				$page_id = $_GET['pageId'];
				$sql = "SELECT * FROM blog_add_page WHERE id = '$page_id'";
				$query = $object->select($sql);
				if($query){
					while($row = $query->fetch_assoc()){
			 	?>
				<h2><?php echo $row['name']; ?></h2>
	
				<p><?php echo $row['body']; ?></p>
				<?php }} ?>
			</div>

		</div>
		<?php include "inc/sidebar.php" ?>
	</div><!-- close contentsection clear-->
	<?php include "inc/footer.php" ?>
	