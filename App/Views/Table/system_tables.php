
<div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-lg-3">
          <h4 class="card-title">
             Manage System Computers
          </h4>
        </div>
        <div class="col-lg-9">
          <button class="btn btn-success" data-toggle="modal" data-target="#saveTableModal">
            ADD NEW COMPUTER
          </button>
          <button id="btnRelease" class="btn btn-danger">
            RELEASE ALL COMPUTERS
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
                        <th>Computer ID</th>
                        <th>Number</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $systemTables=array();
                    if(isset($_GET['action']) && $_GET['action']=='approved'){
                      $systemTables=$upload->getTables('AVAILABLE',$_SESSION['station']);
                    }else{
                      $systemTables=$upload->getAllTables($_SESSION['station']);
                    }
                    foreach ($systemTables as $key => $value) {
                       ?>
                       <tr>
                           <td>
                               <?php echo $value['table_id']; ?>
                           </td>
                           <td>
                               <?php echo $value['name']; ?>
                           </td>
                           <td>
                               <?php
                                if($value['status']=='AVAILABLE'){
                                  ?>
                                  <span class="badge badge-success">
                                    <?php echo $value['status']; ?>
                                  </span>
                                  <?php
                                }elseif($value['status']=='APPROVED'){
                                  ?>
                                  <span class="badge badge-success">
                                    <?php echo $value['status']; ?>
                                  </span>
                                  <?php
                                }elseif($value['status']=='TAKEN'){
                                  ?>
                                  <span class="badge badge-danger">
                                    <?php echo $value['status']; ?>
                                  </span>
                                  <?php
                                }
                               ?>
                           </td>
                           <td>
                            <div class="btn-group">
                              <a table_id="<?php echo $value['table_id']; ?>" computer_name="<?php echo $value['name']; ?>" href="#" class="btn btn-primary btn_pc_edit">
                                <i class="fa fa-edit"></i>
                              </a>
                              <?php 
                              if($value['status']=='AVAILABLE'){
                                ?>
                                <a table_id="<?php echo $value['table_id']; ?>" class="btn btn-warning btnDesactivatePc" data-toggle="tooltip" title="Desactivate Computer!" style='color: #fff;'>
                                  <i class="fa fa-eye-slash"></i>
                                </a>
                                <?php
                              }elseif($value['status']=='TAKEN'){
                                ?>
                                <a table_id="<?php echo $value['table_id']; ?>" class="btn btn-success" data-toggle="tooltip" title="Desactivate Computer!" style='color: #fff;'>
                                  <i class="fa fa-eye"></i>
                                </a>
                                <?php
                              }
                              ?>
                              <a table_id="<?php echo $value['table_id']; ?>" class='btn btn-danger tableDelete' style='color: #fff;' data-toggle="tooltip" title="Delete Computer!">
                                <i class="fa fa-close"></i>
                              </a>
                            </div>

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