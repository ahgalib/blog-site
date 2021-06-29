<!DOCTYPE html>
<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
<div class="grid_10">
     <div class="box round first grid">
        <h2>Add New Post</h2>
        <div class="block">    
        <?php 
        if(isset($_POST['submit'])){
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
            $sql = "INSERT INTO blog_post(category,titlt,body,img,user_id)VALUES('$category','$tit','$content','$upload_img','$us_id')";
            $query = $object->insert($sql);
            if($query){
              echo "<script>window.location='postlist.php'</script>";
            }else{
                 echo "<span>Add Post Successfully</span>";
            }
        }
        ?>           
             <form action="" method="post" enctype="multipart/form-data">
                 <table class="form">
                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name = "title" placeholder="Enter Post Title..." class="medium" />
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
                                
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                <?php }} ?>
                            </select>
                        </td>
                    </tr>
               
                
                  
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name = "img"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name = "body"></textarea>
                        </td>
                         <td>
                            <input type="hidden" name="user_id" Value="<?php echo session::get("userId"); ?>" />
                        </td>
                    </tr>
    				<tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
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