<?php 
error_reporting(0);
require 'classes_loader.php';
$start_time='';
$end_time='';
if((isset($_GET['start_time']) && $_GET['start_time']!='') && (isset($_GET['end_time']) && $_GET['end_time']!='')){
  $start_time=$_GET['start_time'];
  $end_time=$_GET['end_time'];
  $range=$start_time.' - '.$end_time;
}
$compare_date=date("Y-m-d");
$Today=date("d-m-y");
$Candidates=$upload->SystemOutput($compare_date,$start_time,$end_time);
//var_dump($Candidates);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Approved Candidates ||Queue Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="container">
  <?php include 'App/Views/Display/approve_form.php'; ?>
  <h2 style="margin:10px;background: #009966;color: #FFF;">
    <?php echo '<font style="color:white;">'.$Today.'</font> <font style="color:white;">Candidates: '.count($Candidates).'</font> <font style="color:white;font-weight:bold;">Range: '.$range.'</font>'; ?>
    <span id="divTime" class="pull right">
      
    </span>
  </h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators" style="display: none;">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php 
       for ($i=0; $i<count($Candidates); $i=$i+10) { 
        $temp=$i+10;
        $div="item active";
        if($i<1){
        ?>
         <div class="item active">
          <!-- <p><?php echo $i.' => '.$temp; ?></p> -->
          <table class="table table-condensed" style="font-weight: bold;font-size: 2em;">
            <thead>
              <tr>
                <th>Candidate</th>
                <th>Computer</th>
                <th>NID</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              for ($j=$i;$j<$temp;$j++) { 
                $verified=$Candidates[$j]['verified'];
                if($verified=='YES'){
                 ?>
                  <tr style="background: #009966;color: #fff;">
                    <td>
                      <?php echo $Candidates[$j]['trainee_names'].' '.$Candidates[$j]['lnames']; ?>
                    </td>
                    <td>
                      <span class="label label-success">
                        <?php echo $upload->getTable($Candidates[$j]['table_id']); ?>
                      </span>
                    </td>
                    <td>
                      <?php echo $Candidates[$j]['trainee_number']; ?>
                    </td>
                  </tr>
                 <?php
               }else{
                 ?>
                  <tr>
                    <td>
                      <?php echo $Candidates[$j]['trainee_names'].' '.$Candidates[$j]['lnames']; ?>
                    </td>
                    <td>
                      <span class="label label-success">
                        <?php echo $upload->getTable($Candidates[$j]['table_id']); ?>
                      </span>
                    </td>
                    <td>
                      <?php echo $Candidates[$j]['trainee_number']; ?>
                    </td>
                  </tr>
                 <?php
               }
              }
              ?>
            </tbody>
          </table>
         </div>
          <?php
        }else{
        ?>
         <div class="item">
          <!-- <p><?php echo $i.' => '.$temp; ?></p> -->
          <table class="table table-condensed" style="font-weight: bold;font-size: 2em;">
            <thead>
                <th>Candidate</th>
                <th>Computer</th>
                <th>NID</th>
            </thead>
            <tbody>
              <?php 
              for ($j=$i;$j<$temp;$j++) { 
                $verified=$Candidates[$j]['verified'];
                if($verified=='YES'){
                 ?>
                  <tr style="background: #009966;color: #fff;">
                    <td>
                      <?php echo $Candidates[$j]['trainee_names'].' '.$Candidates[$j]['lnames']; ?>
                    </td>
                    <td>
                      <span class="label label-success">
                        <?php echo $upload->getTable($Candidates[$j]['table_id']); ?>
                      </span>
                    </td>
                    <td>
                      <?php echo $Candidates[$j]['trainee_number']; ?>
                    </td>
                  </tr>
                 <?php
               }else{
                 ?>
                  <tr>
                    <td>
                      <?php echo $Candidates[$j]['trainee_names'].' '.$Candidates[$j]['lnames']; ?>
                    </td>
                    <td>
                      <span class="label label-success">
                        <?php echo $upload->getTable($Candidates[$j]['table_id']); ?>
                      </span>
                    </td>
                    <td>
                      <?php echo $Candidates[$j]['trainee_number']; ?>
                    </td>
                  </tr>
                 <?php
               }
              }
              ?>
            </tbody>
          </table>
<!--           <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(46).jpg" style="width: 100%;"> -->
         </div>
          <?php
        }
         }
      ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="display: none;">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next" style="display: none;">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<script src="index.js"></script>
</body>
</html>
