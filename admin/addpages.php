
<!DOCTYPE html>
<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
<div class="grid_10">
     <div class="box round first grid">
        <h2>Add New Post</h2>
        <div class="block">    
        <?php 
        if(isset($_POST['submit'])){
            $p_name = $_POST['name'];
          
            $p_body = $_POST['body'];

          
            $sql = "INSERT INTO blog_add_page(name,body)VALUES('$p_name','$p_body')";
            $query = $object->insert($sql);
            if($query){
              echo "<script>window.location='index.php'</script>";
            }else{
                 echo "<span>Add Post Successfully</span>";
            }
        }
        ?>           
             <form action="" method="post">
                 <table class="form">
                    <tr>
                        <td>
                            <label>Page Name</label>
                        </td>
                        <td>
                            <input type="text" name = "name" placeholder="Enter Page name..." class="medium" />
                        </td>
                    </tr>
                 	 <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Body</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name = "body"></textarea>
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