<?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        <?php 
                        $sql = "SELECT * FROM blog_category";
                        $query = $object->select($sql);
                        if($query){
                            
                            while($row = $query->fetch_assoc()){


                        
                         ?>
                        
						<tr class="odd gradeX">
							<td><?php echo $row['id'] ?></td>
							<td><?php echo $row['name'] ?></td>
							<td><a href="editcat.php?id=<?php echo $row['id']; ?>">Edit</a> || <a onclick="return confirm('are you sure to delete this!!')" href="?did=<?php echo $row['id']; ?>">Delete</a></td>
						</tr>
						<?php }} ?>

                        <?php 
                            if(isset($_GET['did'])){
                                $delete_id = $_GET['did'];
                                $sql = "DELETE FROM blog_category WHERE id = '$delete_id'";
                                $query = $object->delete($sql);
                                if($query){
                                   echo "<script>window.location = 'catlist.php'</script>";
                                }else{
                                    echo "<span>cannot delete record</span>";
                                }
                            }
                         ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
       


<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
      <?php include ("inc/admin-footer.php"); ?>
