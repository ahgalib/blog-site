<!DOCTYPE html>
<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
<div class="grid_10">
     <div class="box round first grid">
        <h2>Add New Post</h2>
        <div class="block">    
       

        <?php 
        $post_id = $_GET['pid'];
        $sql2 = "SELECT * FROM blog_post WHERE id = '$post_id'";
        $query2 = $object->select($sql2);
        if($query2){
        	while($row2 = $query2->fetch_assoc()){
        
         ?>
             <form action="" method="post" enctype="multipart/form-data">
                 <table class="form">
                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name = "title" value = "<?php echo $row2['titlt']; ?>"placeholder="Enter Post Title..." class="medium" />
                          
                        </td>
                    </tr>
                 
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="cate">
                                 <option value="1">choose category</option>
                                <?php 
                                $sql = 'SELECT * FROM blog_category';
                                $query = $object->select($sql);
                                if($query){
                                    while($row = $query->fetch_assoc()){
                                 ?>
                                
                                <option 
                                <?php if($row2['category'] == $row['id']){ ?>
                                	selected = "selected";
                                
                             <?php } ?>
                                value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                <?php }} ?>
                            </select>
                        </td>
                    </tr>
               
                
                  
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                        	<img src="<?php echo $row2['img']; ?>" width="80px" height="60px">
                        	<br>
                            <input type="file" name = "img"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name = "body">
                            	<?php echo $row2['body']; ?>
                            </textarea>
                        </td>
                        <td>
                            <input type="hidden" name="user_id" value="<?php echo session::get("userId"); ?>" />
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
        <?php }} ?>
        </div>
    </div>
</div>
        <?php 
        if(isset($_POST['updatesubmit'])){
        	$ps_id = $_POST['id'];
            $tit = $_POST['title'];
            $category = $_POST['cate'];
            $content = $_POST['body'];
            $us_id = $_POST['user_id'];

            $file_name = $_FILES['img']['name'];
            $file_size = $_FILES['img']['size'];
            $file_type = $_FILES['img']['type'];
            $file_tmp = $_FILES['img']['tmp_name'];
            $permited = array("jpg","jpeg","png");
            $ext = explode(".",$file_name);
            $file_ext = end($ext);
            $uniq_name = substr(md5(time()),0,10).'.'.$file_ext;
            $upload_img = "../images/".$uniq_name;

            move_uploaded_file($file_tmp,$upload_img);
            if(!empty( $file_name)){
	            $upsql = "UPDATE blog_post SET category='$category',titlt = '$tit',body = '$content',user_id='$us_id',img = '$upload_img' WHERE id = '$post_id'";
	            $query = $object->update($upsql);
	            if($query){
	                echo "<script>window.location = 'postlist.php'</script>";
	            }else{
	                 echo "<span>Add Post Successfully</span>";
	            }
	        }else{
	        	$upsql = "UPDATE blog_post SET category='$category',titlt = '$tit',body = '$content',user_id='$us_id'WHERE id = '$post_id'";
	            $query = $object->update($upsql);
	            if($query){
	                echo "<script>window.location = 'postlist.php'</script>";
	            }else{
	                 echo "<span>Add Post Successfully</span>";
	            }
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