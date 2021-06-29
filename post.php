<?php include "inc/header.php";
	
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
				if(!isset($_GET['id'])){
					header("Location: 404.php");
				}else{
					$id = $_GET['id'];
				}
				$sql ="SELECT * FROM blog_post WHERE id = {$id}";
				$show = $object->select($sql);
				if($show){
					while($row = $show->fetch_assoc()){
				

				 ?>
				
				<h2><?php echo $row['titlt']; ?></h2>
				<h4><?php echo $date_obj->setdate($row['date']); ?>, <?php echo $row['author']; ?></h4>
				<img src="images/<?php echo $row['img']; ?>" alt="MyImage"/>
				<p><?php echo $row['body']; ?></p>
				
				
			
			
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
						$catId = $row['cat_id'];
						$sql_cat ="SELECT * FROM blog_post WHERE  cat_id= {$catId}";
						$show_cat = $object->select($sql_cat);
						if($show_cat){
							while($row_cat = $show_cat->fetch_assoc()){
						

				 ?>
					<a href="post.php?id=<?php echo $row['id']; ?>"><img src="images/<?php echo $row_cat['img'];?>" alt="post image"/></a>
				<?php }} else{echo ("no daata found");}?>
				</div>
				<?php }} ?>

				<div class="relatedpost clear">
					<h2>Popular articles</h2>
					<a href="post.php"><img src="images" alt="post image"/></a>
				</div>
			</div>

		</div>
		<?php include "inc/sidebar.php" ?>
	</div><!-- close contentsection clear-->
	<?php include "inc/footer.php" ?>