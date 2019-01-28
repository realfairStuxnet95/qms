
<div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-lg-3">
          <h4 class="card-title">
             <b>Manage Time Slot</b>
          </h4>
        </div>
        <div class="col-lg-9">
          <button class="btn btn-success" data-toggle="modal" data-target="#saveSlotModal">
            ADD NEW TIME SLOT
          </button>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="py-4">
        <div class="table-responsive">
            <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Slot ID</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $systemSlot=array();
                    if(isset($_GET['action']) && $_GET['action']=='available'){
                      $systemSlot=$upload->getTimeSlot('AVAILABLE');
                    }else{
                      $systemSlot=$upload->getTimeSlot('AVAILABLE');
                    }
                    foreach ($systemSlot as $key => $value) {
                       ?>
                       <tr>
                           <td>
                               <?php echo $value['slot_id']; ?>
                           </td>
                           <td>
                               <?php
                                echo $function->changeTimeToString((int)$value['time_range']);
                               ?>
                           </td>
                           <td>
                               <?php
                                echo $function->changeTimeToString((int)$value['end_time']);
                               ?>
                           </td>
                           <td>
                               <?php
                                if($value['status']=='AVAILABLE'){
                                  ?>
                                  <span class="badge badge-success">
                                    <?php echo $value['status']; ?>
                                  </span>
                                  <?php
                                }elseif($value['status']=='UNAVAILABLE'){
                                  ?>
                                  <span class="badge badge-danger">
                                    <?php echo $value['status']; ?>
                                  </span>
                                  <?php
                                }
                               ?>
                           </td>
                           <td>
                             <a slot_id="<?php echo $value['slot_id']; ?>" class='btn btn-danger slotDelete' href="#">
                               DELETE
                             </a>
                           </td>
                       </tr>
                       <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>