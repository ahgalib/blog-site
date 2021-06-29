<!DOCTYPE html>
<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
<div class="grid_10">
     <div class="box round first grid">
        <h2>Add New User</h2>
        <div class="block">    
       

        <?php 
        $ses_id = session::get('userId');
		$ses_role = session::get('userRole');
        $sql2 = "SELECT * FROM blog_user WHERE id ='$ses_id' AND role='$ses_role'";
        $query2 = $object->select($sql2);
        if($query2){
        	while($row2 = $query2->fetch_assoc()){
        
         ?>
             <form action="" method="post">
                 <table class="form">
                    <tr>
                        <td>
                            <label>Username</label>
                        </td>
                        <td>
                            <input type="text" name = "username" readonly value = "<?php echo $row2['username']; ?>" class="medium" />
                          
                        </td>
                    </tr>
                 
                      <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                        	
                            <input type="text" name ="email" value="<?php echo $row2['email']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name = "details">
                            	<?php echo $row2['details']; ?>
                            </textarea>
                        </td>
                    </tr>
    				<tr>
                        <td></td>
                        <td>
                            <input type="submit" name="updatesubmit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        <?php }}else{
        	echo "nothing fouc";
        } ?>
        </div>
    </div>
</div>
        <?php 
        if(isset($_POST['updatesubmit'])){
        	
            $email = $_POST['email'];
            $detals = $_POST['details'];
			$upsql = "UPDATE blog_user SET email = '$email', details = '$detals' WHERE id = '$ses_id'";
	        $query = $object->update($upsql);
            if($query){
                echo "<script>window.location = 'postlist.php'</script>";
            }else{
                 echo "<span>Add Post Successfully</span>";
            }
	    }
    	
        ?>           

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