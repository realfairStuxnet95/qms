<?php 
   require 'authorization.php';
   require 'classes_loader.php';
   if(isset($_GET['training']) && $_GET['training']!=''){
        $training=$function->sanitize($_GET['training']);
   }else{
        backHome();
   }

   function backHome(){
        header("Location: dashboard");
        exit();
   }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sub</title>


    <link type="text/css" href="assets/css/vendor-bootstrap-datatables.css" rel="stylesheet">

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
      <?php 
         $router->loadView("Utils/stylesheet");
      ?>

</head>

<body>
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-responsive-width="992px" data-has-scrolling-region>
        <?php include 'modal.php';?>
        <div class="mdk-drawer-layout__content">
            <!-- header-layout -->
            <div class="mdk-header-layout js-mdk-header-layout  mdk-header--fixed  mdk-header-layout__content--scrollable">
               <?php 
                  $router->loadView("Utils/header");
               ?>
                <!-- content -->
                <div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100">
                    <!-- main content -->
                    <div class="container-fluid">

                        <div class="card">
                            <div class="card-header">
                              <div class="row">
                                <div class="col-lg-3">
                                  <h4 class="card-title">
                                     <b>Uploaded Candidates File</b>
                                  </h4>
                                </div>
                                <div class="col-lg-9">
                                  <a id="btnStartTraining" class="btn btn-success" href="display" target="_blank">
                                    START TRAINING SESSION
                                  </a>
                                </div>
                              </div>
                            </div>
                            <!-- Modal -->
                            <div class="py-4">
                                <div class="table-responsive">
                                    <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                              <th>System ID</th>
                                                <th>Name</th>
                                                <th>Number</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $trainees=array();
                                            if(isset($_GET['action']) && $_GET['action']=='approved'){
                                              $trainees=$upload->loadTrainees('APPROVED');
                                            }else{
                                              $trainees=$upload->loadTrainees('UNAPPROVED');
                                            }
                                            foreach ($trainees as $key => $value) {
                                               ?>
                                               <tr>
                                                  <td>
                                                    <?php echo $value['file_id']; ?>
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
                                                       <?php echo $value['train_time']; ?>
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

        </div>
         <?php $router->loadView("Utils/sidebar"); ?>
         <!-- // END drawer -->
         <!-- drawer -->
         <?php $router->loadView("Utils/drawer"); ?>

    </div>
    <?php 
    include 'App/Views/Utils/data_script.php';
    ?>
</body>

</html>