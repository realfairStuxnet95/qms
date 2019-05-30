<div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100" style="padding-top: 62px;">
<!-- main content -->
  <div class="container-fluid">

    <div class="card">
      <div class="card-header">
        <div class="row">
            <div class="col-lg-3">
              <h4 class="card-title">
                <b>Manage System Users</b>
              </h4>
            </div>
        </div>
      </div>
    <div class="table-responsive">
      <center style="margin: 10px;">
        <a id="btnStartTraining" class="btn btn-success" href="display" target="_blank">
          DISPLAY QUEUE
        </a>
      </center>
        <table id="data_table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                  <th>System ID</th>
                    <th>Names</th>
                    <th>Number</th>
                    <th>REGISTRATION ID</th>
                    <th>Da/Time</th>
                    <th>Status</th>
                    <th>Verified</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $compare_date=date("Y-m-d");
                $trainees=array();
                if(isset($_GET['action']) && $_GET['action']=='approved'){
                  $trainees=$upload->systemDisplay("APPROVED",$compare_date);
                }else{
                  $trainees=$upload->systemDisplay('UNAPPROVED',$compare_date);
                }
                $trainees=$upload->needToVerify($compare_date);
                foreach ($trainees as $key => $value) {
                   ?>
                   <tr>
                      <td>
                        <?php echo $value['file_id']; ?>
                      </td>
                       <td>
                           <?php echo $value['trainee_names'].' '.$value['lnames']; ?>
                       </td>
                       <td>
                           <?php echo $value['trainee_number']; ?>
                       </td>
                       <td>
                         <?php echo $value['reg_id']; ?>
                       </td>
                       <td>
                           <?php echo $value['train_date']; ?>
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
                       <td>
                         <?php 
                         if($value['verified']=='YES'){
                          ?>
                          <span class="badge badge-success">
                            YES
                          </span>
                          <?php
                         }else{
                          ?>
                          <span class="badge badge-danger">
                            NO
                          </span>
                          <?php
                         }
                         ?>
                       </td>
                       <td>
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
                                <a class="btn btn-success" style="color: #fff;" disabled>APPROVED</a>
                                <?php 
                              }
                            }if($value['status']=='UNAPPROVED'){
                                  ?>
                                  <a class="btn btn-success btn_approve" name="<?php echo $value['trainee_names']; ?>" number="<?php echo $value['trainee_number']; ?>"  style='color: #fff;'>
                                      APPROVE
                                  </a>
                                  <?php
                              }
                            ?>
                            <?php 
                            if($_SESSION['user_type']==3 && $value['status']=='APPROVED' && $value['verified']!='YES'){
                              ?>
                              <a candidate_id="<?php echo $value['trainee_number']; ?>" href="#" class="btn btn-danger btn_verify">
                                VERIFY
                              </a>
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