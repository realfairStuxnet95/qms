<?php 
$system_users=$upload->loadSystemUsers();
?>
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
            <div class="col-lg-9">
              <a class="btn btn-success" href="dashboard?request=add_user">
                ADD NEW USERS
              </a>
            </div>
          </div>
      </div>
        <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Names</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>User type</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach ($system_users as $key => $value) {
                  ?>
                    <tr>
                      <td>
                        <?php echo $value['names']; ?>
                      </td>
                      <td>
                        <?php echo $value['email']; ?>
                      </td>
                      <td>
                        <?php echo $value['names']; ?>
                      </td>
                      <td>
                        <?php 
                        if($value['user_type']=='1'){
                          ?>
                          <span class="badge badge-success">
                            ADMIN
                          </span>
                          <?php
                        }elseif($value['user_type']=='2'){
                          ?>
                          <span class="badge badge-danger">
                            RECEPTIONIST
                          </span>
                          <?php
                        }
                        ?>
                      </td>
                      <td>
                        <?php 
                        if($value['status']=='ACTIVE'){
                          ?>
                          <span class="badge badge-success">
                            <?php echo $value['status']; ?>
                          </span>
                          <?php
                        }elseif($value['status']=='INACTIVE'){
                          ?>
                          <span class="badge badge-warning">
                            <?php echo $value['status']; ?>
                          </span>
                          <?php                        }
                        ?>
                      </td>
                      <td>
                          <div class="btn-group">
                              <?php 
                              if($value['status']=='ACTIVE'){
                                ?>
                                  <a user_id="<?php echo $value['user_id']; ?>" class="btn btn-warning desactivateUser" data-toggle="tooltip" title="" style="color: #fff;" data-original-title="Desactivate User!">
                                      <i class="fa fa-eye-slash"></i>
                                  </a>
                                <?php
                              }elseif($value['status']=='INACTIVE'){
                                ?>
                                  <a user_id="<?php echo $value['user_id']; ?>" class="btn btn-info activateUser" data-toggle="tooltip" title="" style="color: #fff;" data-original-title="Activate User!">
                                      <i class="fa fa-eye"></i>
                                  </a>
                                <?php
                              }
                              ?>
                              <a user_id="<?php echo $value['user_id']; ?>" class="btn btn-danger deleteUser" style="color: #fff;" data-toggle="tooltip" title="" data-original-title="Delete User!">
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
</div>