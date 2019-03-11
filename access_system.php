<?php 
require 'classes_loader.php';
$trainingStation=$upload->loadStations();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sub</title>
    <?php 
    $router->loadView("Utils/stylesheet");
    ?>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
</head>

<body>
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-has-scrolling-region>
        <div class="mdk-drawer-layout__content mdk-header-layout__content--scrollable" style="overflow-y: auto;" data-simplebar data-simplebar-force-enabled="true">


            <div class="container h-vh d-flex justify-content-center align-items-center flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <img src="assets/images/police.png">
                    <h2 class="ml-2 text-bg mb-0"><strong style="display: block;">Queue Management</strong></h2>
                </div>
                <div class="row w-100 justify-content-center">
                    <div class="card card-login mb-3" style="min-width: 200px;">
                        <div class="card-body">
                            <form id="frmLogin">
                                <div class="form-group">
                                    <label>Username</label>

                                    <div class="input-group input-group--inline">
                                        <div class="input-group-addon">
                                            <i class="material-icons">account_circle</i>
                                        </div>
                                        <input id="username" type="text" class="form-control" name="username" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Select Training Station</label>

                                    <div class="input-group input-group--inline">
                                        <div class="input-group-addon">
                                            <i class="material-icons">account_circle</i>
                                        </div>
                                        <select id="station" name="station" class="form-control">
                                            <?php 
                                            foreach ($trainingStation as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value['training_id']; ?>">
                                                    <?php echo $value['station']; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex">
                                        <label>Password</label>
                                        <span class="ml-auto"><a href="#">Forgot password?</a></span>
                                    </div>

                                    <div class="input-group input-group--inline">
                                        <div class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="text-center">
                                        <input id="btnSubmit" type="submit" class="btn btn-primary" value="Login" />
                                    </div>
                                    <center>
                                        <div id="divLoader" class="loading-circle-border" style="margin: 10px 40px auto;display: none;width: 80px;height: 80px;"></div>
                                        <div id="divError" class="alert alert-danger" role="alert" style="margin: 10px;display: none;">
                                             This is a danger alert—check it out!
                                        </div>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        (function() {
            'use strict';

            // Self Initialize DOM Factory Components
            domFactory.handler.autoInit();
        });
    </script>
</body>

</html>