<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
       <div class="block copyblock"> 
        <?php 
        $catid = $_GET['id'];
       
            $sql = "SELECT * FROM blog_category WHERE id = {$catid}";
            $query = $object->select($sql);
            if($query){
                while($row = $query->fetch_assoc()){
            
        
        /*if(isset($_POST['submits'])){
             $name = $_POST['addcatname'];
            if(empty($name)){
                echo "<span>Please write the category name</span>";
            }else{
               
                $sql = "INSERT INTO blog_category(name) VALUES ('$name')";//mistake->{'$name'}don't do this
                $querys = $object->insert($sql);
                if($querys){
                     echo "<span>Success</span>";
                }else{
                     echo "<span>Failed</span>";
                }
            }
            
        }*/
         ?>
         <form action ="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" name ="addcatnames" value="<?php echo $row['name']; ?>"placeholder="Enter Category Name..." class="medium" />
                    </td>
                </tr>
				<tr> 
                    <td>
                        <input type="submit" name="submiting" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        <?php }} ?>
        </div>
        <?php 
        if(isset($_POST['submiting'])){
            $names = $_POST['addcatnames'];
            $sqls = "UPDATE blog_category SET name = ('$names') WHERE id = '$catid'";
            $quy = $object->update($sqls);
            if($quy){
                echo "<span>Update successfully</span>";
              // header("Location:login.php");
                echo "<script>window.location = 'catlist.php'</script>";
            }else{
                 echo "<span>Update uunnnnsuccessfully</span>";
            }
        }
         ?>
        
    </div>
</div>
  <?php include ("inc/admin-footer.php"); ?>     