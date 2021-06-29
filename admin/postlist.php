<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table border = "1" class="data display datatable" id="example" >
			<thead>
				<tr>
					<th>Post ID</th>
					<th>Post Title</th>
					<th>Category Name</th>
					<th>Description</th>
					
					<th>Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$sql = "SELECT blog_post.*,  blog_category.name FROM blog_post JOIN blog_category ON blog_post.category=blog_category.id";
				$post = $object->select($sql);
				if($post){
					$i = 0;
					while($row = $post->fetch_assoc()){
						$i++;
				 ?>
				
				<tr class="odd gradeX">
					<td width="5%"><?php echo $i; ?></td>
					<td width="20%"><?php echo  $row['titlt'];  ?></td>
					<td width="5%"><?php echo $row['name']; ?></td>
					<td width="40%"><?php echo$date_obj->shortText($row['body'],100); ?></td>
					<td width="15%"><img src="<?php echo $row['img']; ?>" width="80px" height="60px"></td>
					
					<?php 
					if(session::get("userId") == $row['user_id'] ||session::get("userRole") == "0"){ ?>
					<td width="15%"><a href="editadminp.php?pid=<?php echo $row['id']; ?>">Edit</a> || <a href="deleteadminp.php?delid=<?php echo $row['id']; ?>">Delete</a></td>
				<?php } ?>

				</tr>
				<?php }} ?>
			</tbody>
		</table>

       </div>
    </div>
</div>
      <?php include ("inc/admin-footer.php"); ?>


<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>