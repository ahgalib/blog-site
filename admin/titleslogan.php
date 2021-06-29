<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">  

                    <?php 
                    $sql = "SELECT * FROM blog_title";
                    $query = $object->select($sql);
                    if($query){
                        while($row = $query->fetch_assoc()){
                    
                     ?>
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">					
                            <tr>
                                <td>
                                    <label>Website Title</label>
                                </td>
                                <td>
                                    <input type="text" placeholder="Enter Website Title..."  name="title" value="<?php echo $row['title']; ?>"class="medium" />
                                </td>
                            </tr>
    						 <tr>
                                <td>
                                    <label>Website Slogan</label>
                                </td>
                                <td>
                                    <input type="text" placeholder="Enter Website Slogan..." name="slogan" value="<?php echo $row['slogan']; ?>"class="medium" />
                                </td>
                            </tr>
    						 
    						 <tr>
                                <td>
                                    <label>Upload Image</label>
                                </td>
                                <td>
                                    <img src="<?php echo $row['logo']; ?>">     
                                    <input type="file" name = "img"/>
                                </td>
                            </tr>
    						 <tr>
                                <td>
                                </td>
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php }} ?>
                </div>
                <?php 
                if(isset($_POST['submit'])){
                    $uptitle = $_POST['title'];
                    $upslogan = $_POST['slogan'];

                     $file_name = $_FILES['img']['name'];
                    $file_type = $_FILES['img']['type'];
                    $file_size = $_FILES['img']['size'];
                    $file_tmp = $_FILES['img']['tmp_name']; 
                    $extension = array("jpg","jpeg","png");
                    $file_ext = explode(".",$file_name);
                    $file_ext_name = end($file_ext);
                    $file_uqnic_name = substr(md5(time()),0,10).".".$file_ext_name;
                    $upload_img = "../images/".$file_uqnic_name;
                     move_uploaded_file($file_tmp,$upload_img);
                    if(!empty($file_name)){
                        $upsql = "UPDATE blog_title SET title='$uptitle',slogan = '$upslogan',logo = '$upload_img'";
                        $query = $object->update($upsql);
                        if($query){
                             echo "<script>alert('success')</script>";
                        }else{
                            echo "<span>Add Post UNNNNSuccessfully</span>";
                        }
                    }else{
                        $upsql = "UPDATE blog_title SET title='$uptitle',slogan = '$upslogan'";
                        $query = $object->update($upsql);
                        if($query){
                             echo "<script>window.location='index.php'</script>";
                        }else{
                            echo "<span>Add Post UNNNNSuccessfully</span>";
                        }
                    }

                }
                 ?>
                
            </div>
        </div>
         <?php include ("inc/admin-footer.php"); ?>
