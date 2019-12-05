<?php 
$server="localhost";
$user="root";
$pwd='';
$db='queue_store';
$con=mysqli_connect($server,$user,$pwd,$db);
if($con){
	if(isset($_POST['currentTime']) && $_POST['currentTime']!=''){
		$currentTime=formatTime(substr($_POST['currentTime'],0,5));
		$query=mysqli_query($con,"SELECT * FROM uploaded_file WHERE train_time<=\"$currentTime\"");
		?>
		<?php
		if(mysqli_num_rows($query)>0){
			while ($r=mysqli_fetch_assoc($query)) {
				?>	
				<span class="badge badge-success" style="background: #009966;padding:13px;margin: 10px;line-height: 10px;font-size: 2em;">
					<?php echo 'Active Slot: '.$currentTime; ?>
				</span>			
				<?php 
					
					getUser($currentTime);
					break;
				?>
				<?php
			}
			?>
			<?php
		}else{
			echo "No active Slot";
		}
	}else{
		echo "Please submit Current Time";
	}
}else{
	die(mysqli_error($con));
}

function formatTime($time){
  $last_char=substr($time, -1);
  $new_time='';
  if($last_char==':'){
    $new_time='0'.substr($time,0,4);
  }else{
    $new_time=$time;
  }
  return $new_time;
}
function getUser($currentTime){
$server="localhost";
$user="root";
$pwd='';
$db='queue_store';
require 'classes_loader.php';
$con=mysqli_connect($server,$user,$pwd,$db);
if($con){
	$query=mysqli_query($con,"SELECT * FROM uploaded_file WHERE train_time<=\"$currentTime\" AND status='APPROVED'");
	$num=mysqli_num_rows($query);

	?>
  <div class="table-responsive">
      <table id="data-table" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                <th>System ID</th>
                  <th>Table Number</th>
                  <th>Name</th>
                  <th>Number</th>
                  <th>Date</th>
                  <th>Training Time</th>
                  <th>Status</th>
                  <th style="display: none;">Action</th>
              </tr>
          </thead>
          <tbody>
              <?php
              while ($value=mysqli_fetch_assoc($query)) {
                 ?>
                 <tr>
                  <td>
                    <?php echo $value['file_id']; ?>
                  </td>
                    <td>
                      <span class="badge badge-danger">
                        <?php 
                          echo $upload->getTable($value['table_id']);
                        ?>
                      </span>
                    </td>
                     <td>
                         <?php echo $value['trainee_names']; ?>
                     </td>
                     <td>
                         <?php echo $value['trainee_number']; ?>
                     </td>
                     <td>
                         <?php echo $value['train_date']; ?>
                     </td>
                     <td>
                         <span class="badge badge-info">
                           <?php echo $currentTime; ?>
                         </span>
                     </td>
                     <td>
                         <?php
                          if($value['status']=='UNAPPROVED'){
                            ?>
                            <span class="badge badge-warning">
                              <?php echo $value['status']; ?>
                            </span>
                            <?php
                          }elseif($value['status']=='APPROVED'){
                            ?>
                            <span class="badge badge-success">
                              <?php echo $value['status']; ?>
                            </span>
                            <?php
                          }
                         ?>
                     </td>
                     <td style="display: none;">

                     </td>
                 </tr>
                 <?php
              }
              ?>
          </tbody>
      </table>
  </div>
	<?php
}else{
	echo "Database Connection Error";
}	
}
?>