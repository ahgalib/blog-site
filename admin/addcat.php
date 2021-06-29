<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
       <div class="block copyblock"> 
        <?php 
        if(isset($_POST['submits'])){
             $name = $_POST['addcatname'];
            if(empty($name)){
                echo "<span>Please write the category name</span>";
            }else{
               
                $sql = "INSERT INTO blog_category(name) VALUES ('$name')";//mistake{'$name'}->don't do this
                $querys = $object->insert($sql);
                if($querys){
                    echo "<script>window.location = 'catlist.php'</script>";
                }else{
                     echo "<span>Failed</span>";
                }
            }
            
        }
         ?>
         <form action ="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" name ="addcatname"placeholder="Enter Category Name..." class="medium" />
                    </td>
                </tr>
				<tr> 
                    <td>
                        <input type="submit" name="submits" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
  <?php include ("inc/admin-footer.php"); ?>     
