<?php include "inc/header.php";
include "inc/slider.php";


?>
	
	
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php 
			//setdate class
			//include("helpers/formet.php");
			//$date_obj = new helps();
	 		//include"oop-Lib/code.php";
			$object = new blog();
			$limit = 3;
			if(isset($_GET['page'])){
				$page = $_GET['page'];
			}else{
				$page = 1;
			}
			$offset = ($page - 1)*$limit;
			$sql = "SELECT * FROM blog_post LIMIT $offset,$limit";
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

		<?php }} ?>
		</div>
			<?php include "inc/sidebar.php"; ?>

	</div><!-- close contentsection clear-->
	<?php 
	$sql  = "SELECT * FROM blog_post";
	$show = $object->select($sql);
	$total_rec = mysqli_num_rows($show);
	$total_page = ceil($total_rec/$limit);
	if($page>1){
		echo '<button style="background:skyblue;color:red;font-size:18px;list-style:none;padding:5px;margin-left:20px;"><li><a href="index.php?page='.($page-1).'">Prev</a></li></button>';
	}

	for ($i=1; $i <= $total_page; $i++) { 
		echo '<button style="background:skyblue;color:red;font-size:18px;list-style:none;padding:5px;margin-left:20px;"><li><a href="index.php?page='.$i.'">'.$i.'</a></li></button>';
	}

	if($total_page >$page){
		echo '<button style="background:skyblue;color:red;font-size:18px;list-style:none;padding:5px;margin-left:20px;"><li><a href="index.php?page='.($page+1).'">Next</a></li></button>';
	}

	 ?>
	

	<?php include "inc/footer.php" ?>

	