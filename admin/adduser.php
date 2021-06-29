

<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
<?php 
if(!session::get("userRole") == "0"){
	echo "<script>window.location='index.php'</script>";
}
 ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
       <div class="block copyblock"> 
        <?php 
        if(isset($_POST['save'])){
             $usname = $_POST['username'];
             $uspass = $_POST['pass'];
             $usrole = $_POST['role'];
           
                $sql = "INSERT INTO blog_user(username,password,role) VALUES ('$usname','$uspass','$usrole')";//mistake{'$name'}->don't do this
                $querys = $object->insert($sql);
                if($querys){
                    echo "<script>window.location = 'catlist.php'</script>";
                }else{
                     echo "<span>Failed</span>";
                }
            
            
        }
         ?>
	         <form action ="" method="post">
	            <table class="form">					
	            	<tr>
	            		<td>
	            			<label>Username</label>
	            		</td>
	            		<td>
	            			<input type="text" name="username">
	            		</td>
	            	</tr>
	            	<tr>
	            		<td>
	            			<label>Password</label>
	            		</td>
	            		<td>
	            			<input type="text" name="pass">
	            		</td>
	            	</tr>
	            	<tr>
	            		<td>
	            			<label>User Roll</label>
	            		</td>
	            		<td>
	            			<select id="select" name="role">
	            				<option value="0">Select User Role</option>
	            				<option value="0">Admin</option>
	            				<option value="1">User</option>
	            				<option value="2">Editor</option>
	            			</select>
	            		</td>
	            	</tr>
	            	<tr>
	            		<td>
	            			
	            		</td>
	            		<td>
	            			<input type="submit" name="save" value="Submit">
	            		</td>
	            	</tr>
	            </table>
	        </form>
        </div>
    </div>
</div>
  <?php include ("inc/admin-footer.php"); ?>     