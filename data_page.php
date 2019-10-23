<?php
  $title='';
   require 'authorization.php';
   require 'classes_loader.php';
   require 'const.php';
   if(isset($_GET['training']) && $_GET['training']!=''){
        $training=$_GET['training'];
        $check_training=$upload->checkTraining($training);
        if(!$check_training){
          backHome();
        }
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
    <title> Uploaded Candidates |Queue Management System</title>


    <link type="text/css" href="assets/css/vendor-bootstrap-datatables.css" rel="stylesheet">

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
      <?php 
         $router->loadView("Utils/stylesheet");
      ?>
      <script type="text/javascript">
        const station_id="<?php echo $_SESSION['station']; ?>";
      </script>
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
                        <div class="card-body">
                          <div class="row">
                             <div class="col-lg-4">
                                <div class="card card-body flex-row align-items-center bg-danger text-white">
                                   <h5 class="m-0"><i class="fa fa-user-plus"></i> 
                                      UNAPPROVED CANDIDATES
                                   </h5>
                                   <div class="text-white ml-auto">
                                      <?php 
                                      $compare_date=date("Y-m-d");
                                      $training=$_SESSION['station'];
                                      $trainees=$admin->uploadedCandidates('UNAPPROVED',$compare_date,$training);
                                      echo '<strong>'.count($trainees).'</strong>';
                                      ?>
                                   </div>
                                </div>
                             </div>
                            <div class="col-lg-4">
                              <div class="card card-body flex-row align-items-center bg-success text-white">
                                 <h5 class="m-0"><i class="fa fa-user-plus"></i> 
                                    APPROVED CANDIDATES
                                 </h5>
                                 <div class="text-white ml-auto">
                                    <?php 
                                    $compare_date=date("Y-m-d");
                                    $training=$_SESSION['station'];
                                    $trainees=$admin->uploadedCandidates('APPROVED',$compare_date,$training);
                                    echo '<strong>'.count($trainees).'</strong>';
                                    ?>
                                 </div>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="card card-body flex-row align-items-center badge-warning text-white">
                                 <h5 class="m-0"><i class="fa fa-user-plus"></i> 
                                    NO-SHOW CANDIDATES
                                 </h5>
                                 <div class="text-white ml-auto">
                                    <?php 
                                    $compare_date=date("Y-m-d");
                                    $training=$_SESSION['station'];
                                    $trainees=$admin->uploadedCandidates('ABSENCE',$compare_date,$training);
                                    echo '<strong>'.count($trainees).'</strong>';
                                    ?>
                                 </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="card">
                            <div class="card-header">
                              <div class="row">
                                <div class="col-lg-3">
                                  <h4 class="card-title">
                                    <?php 
                                      if(isset($_GET['action']) && $_GET['action']=='approved'){
                                        $title="Checked In List";
                                      }else{
                                        $title="No Show List";
                                      }
                                    ?>
                                     <b><?php echo $title; ?></b>
                                  </h4>
                                </div>
                                <div class="col-lg-9">
                                  <a class="btn btn-success btn-lg" href="display" target="_blank">
                                    DISPLAY QUEUE
                                  </a>
                                 <a class="btn btn-danger btn-lg btnReportAbsence text-white">
                                    REPORT AS NO SHOW
                                  </a> 
                                </div>
                              </div>
                            </div>
                            <!-- Modal -->
                            <div class="py-4">
                                <div class="table-responsive">
                                    <table  class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                              <th>System ID</th>
                                                <th>Names</th>
                                                <th>Number</th>
                                                <th>REGISTRATION ID</th>
                                                <th>Date/Time</th>
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
                                              $trainees=$upload->systemDisplay("APPROVED",$compare_date,$training);
                                            }elseif(isset($_GET['action']) && $_GET['action']=='absence'){
                                              $trainees=$upload->systemDisplay("ABSENCE",$compare_date,$training);
                                            }
                                            else{
                                              $trainees=$upload->systemDisplay('UNAPPROVED',$compare_date,$training);
                                            }
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