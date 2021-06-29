<!DOCTYPE html>
<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
<div class="grid_10">
     <div class="box round first grid">
        <h2>Add New Post</h2>
        <div class="block">    
        <?php 
        
        	$pid = $_GET['pageid'];
        	$sql = "SELECT * FROM blog_add_page WHERE id='$pid'";
        	$query = $object->insert($sql);
        	if($query){
        		while($row=$query->fetch_assoc()){
        	
        
        ?>           
             <form action="" method="post">
                 <table class="form">
                    <tr>
                        <td>
                            <label>Page Name</label>
                        </td>
                        <td>
                            <input type="text" name = "name" value="<?php echo $row['name']; ?>" class="medium" />
                        </td>
                    </tr>
                 	 <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Body</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name = "body">
                            	<?php echo $row['body']; ?>
                            </textarea>
                        </td>
                    </tr>
    				<tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save"/>
                             <button><a href="deletePage.php?delpageid=<?php echo $row['id']; ?>">Delete</a></button>
                        </td>
                    </tr>
                </table>
            </form>
        <?php }} ?>
        </div>
    </div>
</div>
      <?php 
       if(isset($_POST['submit'])){
            $p_name = $_POST['name'];
          
            $p_body = $_POST['body'];

          
            $sql2 = "UPDATE blog_add_page SET name ='$p_name' ,body = '$p_body' WHERE id = '$pid'";
            $query2 = $object->update($sql2);
            if($query2){
              echo "<script>window.location='index.php'</script>";
            }else{
                 echo "<span>Add Post UNNNNSuccessfully</span>";
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