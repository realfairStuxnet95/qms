<?php 
$trainingStation=$upload->loadStations();
?>
<div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100" style="padding-top: 62px;">
<!-- main content -->
  <div class="container-fluid">

    <div class="card">
      <div class="card-header">
        <div class="row">
            <div class="col-lg-3">
            <h4 class="card-title">
            <b>Manage Training Station</b>
            </h4>
            </div>
            <div class="col-lg-9">
              <a class="btn btn-success" href="#" data-toggle="modal" data-target="#StationModal">
                ADD NEW STATION
              </a>
            </div>
          </div>
      </div>
        <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Station ID</th>
                  <th>Station</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach ($trainingStation as $key => $value) {
                  ?>
                    <tr>
                      <td>
                        <?php echo $value['training_id']; ?>
                      </td>
                      <td>
                        <?php echo $value['station']; ?>
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
                        <a href="" class="btn btn-danger btn-sm">
                          <i class="material-icons">close</i>
                        </a>
                        <a href="" class="btn btn-danger btn-sm">
                          <i class="material-icons">close</i>
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
</div>