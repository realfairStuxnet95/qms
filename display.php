<?php require 'classes_loader.php';
$trainees=$upload->loadTrainees('APPROVED');
$number_trainees=count($trainees);
?>   

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Session Progress</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      const station_id="<?php echo $_SESSION['station']; ?>";
    </script>
</head>
<body>

<div class="jumbotron text-center" style="padding-top: 5px;padding-bottom: 10px;display: block;">
  <h3>Training List</h3>
  <p>
    <span id="displayTime" class="badge badge-success" style="background: #009966;font-size: 1em;">Isaha:</span>
  </p> 
</div>
  
<div class="container">
  <div class="row">
    <div class="col-lg-2">
      <h3>Batch 1</h3>
      <ul class="list-group">
      <?php 
      
      $counter=0;
      foreach ($trainees as $key => $value) {
        if($counter<=15){
          ?>
          <li class="list-group-item"><?php echo $value['trainee_names']; ?><br>
          <?php echo "Number: <span class='badge badge-success'>".$value['trainee_number'].'</span>'; ?><br>
          <?php echo "Table: ".$upload->getTable($value['table_id']); ?>
        </li>
          <?php
        }
        $counter++;
      }
      ?>
        
      </ul>
    </div>
    <?php 
    if($number_trainees>=50){
      ?>
      <div class="col-sm-2">
        <h3>Column 2</h3>
        <ul class="list-group">
          <?php 
          
          $counter=0;
          foreach ($trainees as $key => $value) {
            if($counter>=25){
              ?>
              <li class="list-group-item"><?php echo $value['trainee_names']; ?><br>
              <?php echo "Number: <span class='badge badge-success'>".$value['trainee_number'].'</span>'; ?><br>
              <?php echo "Table: ".$upload->getTable($value['table_id']); ?>
            </li>
              <?php
            }
            $counter++;
          }
          ?>
            
        </ul>
      </div>
      <?php
    }
    ?>
    <?php 
    if($number_trainees>=75){
      ?>
      <div class="col-sm-2">
        <h3>Column 2</h3>
        <ul class="list-group">
          <?php 
          
          $counter=0;
          foreach ($trainees as $key => $value) {
            if($counter>=50 && $counter<=75){
              ?>
              <li class="list-group-item"><?php echo $value['trainee_names']; ?><br>
              <?php echo "Number: <span class='badge badge-success'>".$value['trainee_number'].'</span>'; ?><br>
              <?php echo "Table: ".$upload->getTable($value['table_id']); ?>
            </li>
              <?php
            }
            $counter++;
          }
          ?>
        
        </ul>
      </div>
      <?php
    }
    ?>
      <div class="col-sm-2">
        <h3>Column 2</h3>
        <ul class="list-group">
          <?php 
          
          $counter=0;
          foreach ($trainees as $key => $value) {
            if($counter<=15){
              ?>
              <li class="list-group-item"><?php echo $value['trainee_names']; ?><br>
              <?php echo "Number: <span class='badge badge-success'>".$value['trainee_number'].'</span>'; ?><br>
              <?php echo "Table: ".$upload->getTable($value['table_id']); ?>
            </li>
              <?php
            }
            $counter++;
          }
          ?>
            
        </ul>
      </div>
      <div class="col-sm-2">
        <h3>Column 2</h3>
        <ul class="list-group">
          <?php 
          
          $counter=0;
          foreach ($trainees as $key => $value) {
            if($counter<=15){
              ?>
              <li class="list-group-item"><?php echo $value['trainee_names']; ?><br>
              <?php echo "Number: <span class='badge badge-success'>".$value['trainee_number'].'</span>'; ?><br>
              <?php echo "Table: ".$upload->getTable($value['table_id']); ?>
            </li>
              <?php
            }
            $counter++;
          }
          ?>
            
        </ul>
      </div>
      <div class="col-sm-2">
        <h3>Column 2</h3>
        <ul class="list-group">
          <?php 
          
          $counter=0;
          foreach ($trainees as $key => $value) {
            if($counter<=15){
              ?>
              <li class="list-group-item"><?php echo $value['trainee_names']; ?><br>
              <?php echo "Number: <span class='badge badge-success'>".$value['trainee_number'].'</span>'; ?><br>
              <?php echo "Table: ".$upload->getTable($value['table_id']); ?>
            </li>
              <?php
            }
            $counter++;
          }
          ?>
            
        </ul>
      </div>
      <div class="col-sm-2">
        <h3>Column 2</h3>
        <ul class="list-group">
          <?php 
          
          $counter=0;
          foreach ($trainees as $key => $value) {
            if($counter<=15){
              ?>
              <li class="list-group-item"><?php echo $value['trainee_names']; ?><br>
              <?php echo "Number: <span class='badge badge-success'>".$value['trainee_number'].'</span>'; ?><br>
              <?php echo "Table: ".$upload->getTable($value['table_id']); ?>
            </li>
              <?php
            }
            $counter++;
          }
          ?>
            
        </ul>
      </div>
      <div class="col-sm-2">
        <h3>Column 2</h3>
        <ul class="list-group">
          <?php 
          
          $counter=0;
          foreach ($trainees as $key => $value) {
            if($counter<=15){
              ?>
              <li class="list-group-item"><?php echo $value['trainee_names']; ?><br>
              <?php echo "Number: <span class='badge badge-success'>".$value['trainee_number'].'</span>'; ?><br>
              <?php echo "Table: ".$upload->getTable($value['table_id']); ?>
            </li>
              <?php
            }
            $counter++;
          }
          ?>
            
        </ul>
      </div>
  </div>
</div>
<script src="assets/js/main.js"></script>
</body>
</html>
