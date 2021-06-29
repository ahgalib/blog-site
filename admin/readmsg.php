
<!DOCTYPE html>
<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
<div class="grid_10">
     <div class="box round first grid">
        <h2>Read Message</h2>
        <div class="block"> 
        <?php
				//for update message
				$msg_id = $_GET['msg'];
       			$sql2 = "UPDATE blog_contact SET status='1'WHERE id = '$msg_id'";
        
        		$query2 = $object->update($sql2);
        		if($query2){
        			
        		}
        ?>   
        	<?php 
        	
        	$sql = "SELECT * FROM blog_contact WHERE id = '$msg_id'";
        
        	$query = $object->select($sql);
        	if($query){
        		while($row = $query->fetch_assoc()){
        	
        	 ?>
        
             <form action="" method="post">
                 <table class="form">
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" readonly value = "<?php echo $row['fname'].' '.$row['lname']; ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" readonly value = "<?php echo $row['email']; ?>" class="medium" />
                        </td>
                    </tr>
                 
                       <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Message</label>
                        </td>
                        <td>
                            <textarea readonly class="tinymce">
                            	<?php echo $row['message']; ?>
                            </textarea>
                        </td>
                    </tr>
    				<tr>
                        <td></td>
                        <td>
                           <button><a href="inbox.php">OK</a></button>
                        </td>
                    </tr>
                </table>
            </form>
        <?php }} ?>
        </div>
    </div>
</div>




      <?php include ("inc/admin-footer.php"); ?>