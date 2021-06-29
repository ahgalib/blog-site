 <?php  include("inc/admin-header.php"); ?>
<?php  include("inc/admin-sidebar.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>E-mail</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$sql = "SELECT * FROM blog_contact";
						$query = $object->select($sql);
						if($query){
							$i = 0;
							while($row = $query->fetch_assoc()){
							$i++;
						 ?>
						
						
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['fname'].' '.$row['lname']; ?></td>
							<td><?php echo $row['email'] ?></td>
							<td><?php echo $date_obj->shortText($row['message'],30); ?></td>
							<td><?php echo $date_obj->setdate($row['date']); ?></td>
							<td><a href="readmsg.php?msg=<?php echo $row['id']; ?>">view</a> || <a href="delmsg.php?msgd=<?php echo $row['id']; ?>">Delete</a></td>
						</tr>
					<?php }} ?>
						
					</tbody>
				</table>
				<!-- another table--->
				
				  
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
