
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
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="py-4">
        <div class="table-responsive">
            <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Table ID</th>
                        <th>Number</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $systemTables=array();
                    if(isset($_GET['action']) && $_GET['action']=='approved'){
                      $systemTables=$upload->getTables('AVAILABLE');
                    }else{
                      $systemTables=$upload->getTables('AVAILABLE');
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
                                }
                               ?>
                           </td>
                           <td>
                             <a table_id="<?php echo $value['table_id']; ?>" class='btn btn-danger tableDelete' href="#">
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