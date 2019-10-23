<?php 
   require 'authorization.php';
   require 'classes_loader.php';
   require 'const.php';
   if(isset($_GET['training']) && $_GET['training']!=''){
        $training=$function->sanitize($_GET['training']);
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
    <title>System Computers |Queue Managment System</title>


    <link type="text/css" href="assets/css/vendor-bootstrap-datatables.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <?php include 'table_modal.php';?>
        <?php include 'App/Views/Table/time_modal.php'; ?>
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
                      <?php 
                      if(isset($_GET['action']) && $_GET['action']!=''){
                        $action=$_GET['action'];
                        if($action=='time_slot'){
                          include 'App/Views/Table/time_slot.php';
                        }elseif($action=='display'){
                          include 'App/Views/Table/display.php';
                        }
                        else{
                          include 'App/Views/Table/system_tables.php';
                        }
                      }else{
                        include 'App/Views/Table/system_tables.php';
                      }
                      ?>
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