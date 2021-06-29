<div class="sidebar clear">
	<div class="samesidebar clear">
		<h2>Categories</h2>
		<?php 
		$cata_sql = "SELECT * FROM blog_category";
		$cat_select = $object->select($cata_sql);
		if($cat_select){
			while($row = $cat_select->fetch_assoc()){


		 ?>
			<ul>
				<li><a href="show-cat-post.php?cata_id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
									
			</ul>
			<?php }
		} else{echo ("no category found");}?>
	</div>
			
	<div class="samesidebar clear">
		<h2>Latest articles</h2>
		<?php 
		$sql_last = "SELECT * FROM blog_post ORDER BY id DESC LIMIT 4";
		$show_sql = $object->select($sql_last);
		if($show_sql){
			while($rows = $show_sql->fetch_assoc()){


		 ?>
			<div class="popular clear">
				<h3><a href="post.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['titlt']; ?></a></h3>
				<a href="post.php?id=<?php echo $rows['id']; ?>"><img src="images/<?php echo $rows['img']; ?>" alt="post image"/></a>
				<p><?php echo $date_obj->shortText($rows['body'],100); ?></p>	
			</div>
		<?php }} ?>
	</div>
			
</div>