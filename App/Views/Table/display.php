 <div class="container-fluid">
    <div class="row font-1">
      <div class="col-lg-12">
        <h2>Isaha: <i class="material-icons ml-auto text-muted">access_time</i> <span id="divTime"></span>
          <span class="badge badge-success" id="activeSlot"></span>
          <button id="btnSound" class="btn btn-success btn-sm">PLAY ALARM</button>
        </h2>
        <img id="imgStop" src="assets/images/stop.gif" style="width: 100px;height: auto;display: none;">
        <audio id="alarmAudio" controls style="display: none;">
            <source src="assets/audio/alarm.m4a" type="audio/mpeg">
        </audio>
      </div>
    </div>
    <div class="row font-1">
       <div class="col-lg-2" style="display: none;">
         <div class="card">
          <?php $time_slot=$upload->loadTimeslot(); ?>
             <div class="card-header d-flex align-items-center">
                 <div class="card-title">
                     Time Slots
                 </div>
                 <i class="material-icons ml-auto text-muted">clock</i>
             </div>
             <ul class="list-group list-group-flush">
              <?php 
              foreach ($time_slot as $key => $value) {
                ?>
                 <li class="list-group-item">
                     <div class="media align-items-center">
                         <div class="media-body lh-12">
                             <a href="#">
                               <?php echo $value['time_range'].' - '.$value['end_time']; ?>
                             </a>
                         </div>
                         <div class="lead">
                            <span class="badge badge-success">
                              ACTIVITY
                            </span>
                             <i class="material-icons md-18 align-middle text-success">arrow_upward</i>
                         </div>
                     </div>
                 </li>
                <?php
              }
               ?>

             </ul>
         </div>
       </div>
       <div class="col-lg-12">

          <div class="card">
            <!-- Modal -->
            <div class="py-4">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
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
                            $trainees=array();
                            if(isset($_GET['action']) && $_GET['action']=='approved'){
                              $trainees=$upload->loadTrainees('APPROVED');
                            }else{
                              $trainees=$upload->loadTrainees('APPROVED');
                            }
                            foreach ($trainees as $key => $value) {
                               ?>
                               <tr>
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
                                         <?php echo $upload->getSlotTime((int)$value['slot_id']);?>
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
                                        <?php 
                                        if($_SESSION['user_type']==2){
                                          if($value['status']=='UNAPPROVED'){
                                              ?>
                                              <a class="btn btn-success btn_approve" name="<?php echo $value['trainee_names']; ?>" number="<?php echo $value['trainee_number']; ?>"  style='color: #fff;'>
                                                  APPROVE
                                              </a>
                                              <?php
                                          }elseif($value['status']=='APPROVED'){
                                            ?>
                                            <a class="btn btn-success" style="color: #fff;" disabled>APPROVE</a>
                                            <?php 
                                          }
                                        }elseif($_SESSION['user_type']==1){
                                          ?>
                                          <a class="btn btn-success" style="color: #fff;" disabled>APPROVE</a>
                                          <?php
                                        }
                                        ?>
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
       </div>
    </div>
 </div>