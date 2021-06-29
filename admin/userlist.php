<!DOCTYPE html>
<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
<?php 
if(!session::get("userRole") == "0"){
	echo "<script>window.location='index.php'</script>";
}
 ?>
<div class="grid_10">
     <div class="box round first grid">
        <h2>Add New User</h2>
        <div class="block">    
       

       
              <table width="100%" border="1">
			<thead>
				<tr>
					<th>ID</th>
					<th>Username</th>
					<th>Password</th>
					<th>Email</th>
					<th>details</th>
					<th>role</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$sql = "SELECT * FROM blog_user";
				$post = $object->select($sql);
				if($post){
					$i = 0;
					while($row = $post->fetch_assoc()){
						$i++;
				 ?>
				
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo  $row['username'];  ?></td>
					<td><?php echo $row['password']; ?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo$row['details']; ?></td>
					<td>
						
						<?php 
						if($row['role'] == "0"){
							echo "Admin";
						}elseif($row['role'] == "1"){
							echo "User";
						}elseif($row['role'] == "2"){
							echo "Editor";
						}
						?>
							
					</td>
					
				</tr>
				<?php }} ?>
			</tbody>
		</table>
          
        
        </div>
    </div>
</div>
             

<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>

      <?php include ("inc/admin-footer.php"); ?>