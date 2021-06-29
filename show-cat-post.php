<?php include "inc/header.php";
include "inc/slider.php";


?>
	
	
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php 
			if(!isset($_GET['cata_id'])){
				header("Location:404.php");
			}else{
				$cat_id = $_GET['cata_id'];
			}
			$object = new blog();
			/*$limit = 3;
			if(isset($_GET['page'])){
				$page = $_GET['page'];
			}else{
				$page = 1;
			}
			$offset = ($page - 1)*$limit;*/
			//$cat_id = $_GET['id'];
			$sql = "SELECT * FROM blog_post WHERE category = {$cat_id}";
	  		$show = $object->select($sql);
			if($show){
				while($row = $show->fetch_assoc()){
			
			 ?>
			
			<div class="samepost clear">
				<h2><a href=""><?php echo $row['titlt']; ?></a></h2>
				<h4><?php echo $date_obj->setdate($row['date']);?> <a href="#"><?php echo $row['author']; ?></a></h4>
				 <a href="#"><img style="width:200px;height:150px;"src="images/<?php echo $row['img'];?>" alt="post image"/></a>
				<p>
					<?php echo $date_obj->shortText($row['body']); ?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $row['id']; ?>">Read More</a>
				</div>
			</div>

		<?php }}else{echo "<span>No post available</span>";} ?>
		</div>
			<?php include "inc/sidebar.php"; ?>

	</div><!-- close contentsection clear-->
	<?php include "inc/footer.php" ?>