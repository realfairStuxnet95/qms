<?php 
   require 'authorization.php';
   require 'classes_loader.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Welcome <?php echo $_SESSION['user_names'].' |Queue Management System'; ?></title>
      <link type="text/css" href="assets/css/vendor-morris.css" rel="stylesheet">
      <link type="text/css" href="assets/css/vendor-bootstrap-datepicker.css" rel="stylesheet">
      <!-- Prevent the demo from appearing in search engines -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta name="robots" content="noindex">
      <?php 
         $router->loadView("Utils/stylesheet");
      ?>
   </head>
   <body>
      <div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-responsive-width="992px" data-has-scrolling-region>
         <div class="mdk-drawer-layout__content">
            <!-- header-layout -->
            <div class="mdk-header-layout js-mdk-header-layout  mdk-header--fixed  mdk-header-layout__content--scrollable">
               <!-- header -->
               <?php 
                  $router->loadView("Utils/header");
               ?>
               <?php 
               if(isset($_GET['request']) && $_GET['request']!=''){
                  $request=$_GET['request'];
                  $valid_request=array("display","home","upload_file","data?training=123");
                  if($request=='system_users'){
                    include 'App/Views/Dashboard/system_users.php';
                  }elseif($request=='add_user'){
                    include 'App/Views/Dashboard/add_user.php';
                  }
                  elseif($request=='upload_file'){
                     $router->loadView("Dashboard/".$request);
                  }elseif($request=='display'){
                     include 'display.php';
                  }
                  else{

                  }
               }else{
                  ?>
                  <script type="text/javascript">
                    window.location="data?training=123";
                  </script>
                  <?php
               }
               ?>
            </div>
         </div>
         <!-- // END drawer-layout__content -->
         <!-- drawer -->
         <?php $router->loadView("Utils/sidebar"); ?>
         <!-- // END drawer -->
         <!-- drawer -->
         <?php $router->loadView("Utils/drawer"); ?>
         <!-- // END drawer -->
      </div>
    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Simplebar -->
    <!-- Used for adding a custom scrollbar to the drawer -->
    <script src="assets/vendor/simplebar.js"></script>


    <!-- Vendor -->
    <script src="assets/vendor/Chart.min.js"></script>
    <script src="assets/vendor/moment.min.js"></script>

    <!-- APP -->
    <script src="assets/js/color_variables.js"></script>
    <script src="assets/js/app.js"></script>


    <script src="assets/vendor/dom-factory.js"></script>
    <!-- DOM Factory -->
    <script src="assets/vendor/material-design-kit.js"></script>
    <!-- MDK -->



    <script>
        (function() {
            'use strict';
            // Self Initialize DOM Factory Components
            domFactory.handler.autoInit()


            // Connect button(s) to drawer(s)
            var sidebarToggle = document.querySelectorAll('[data-toggle="sidebar"]')

            sidebarToggle.forEach(function(toggle) {
                toggle.addEventListener('click', function(e) {
                    var selector = e.currentTarget.getAttribute('data-target') || '#default-drawer'
                    var drawer = document.querySelector(selector)
                    if (drawer) {
                        if (selector == '#default-drawer') {
                            $('.container-fluid').toggleClass('container--max');
                        }
                        drawer.mdkDrawer.toggle();
                    }
                })
            })
        })()
    </script>
    <script src="assets/js/main.js"></script>
    <script src="assets/vendor/jquery.dataTables.js"></script>
    <script src="assets/vendor/dataTables.bootstrap4.js"></script>

    <script>
        $('#data-table').dataTable();
    </script>
   </body>
</html>