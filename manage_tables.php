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
                                <h4 class="card-title">
                                   Manage Training Tables
                                </h4>
                            </div>
                            <!-- Modal -->
                            <div class="py-4">
                                <div class="table-responsive">
                                    <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Number</th>
                                                <th>Name</th>
                                                <th>Capacity</th>
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
                                                       <?php echo $value['number']; ?>
                                                   </td>
                                                   <td>
                                                       <?php echo $value['name']; ?>
                                                   </td>
                                                   <td>
                                                       <?php echo $value['capacity']; ?>
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
                                                     <a class='btn btn-danger' href="#">
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
                    </div>
                </div>
            </div>

        </div>
         <?php $router->loadView("Utils/sidebar"); ?>
         <!-- // END drawer -->
         <!-- drawer -->
         <?php $router->loadView("Utils/drawer"); ?>

    </div>
    <?php $router->loadView("Utils/data_script"); ?>
</body>

</html>