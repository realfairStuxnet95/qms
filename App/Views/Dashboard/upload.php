 <?php
require $_SERVER['DOCUMENT_ROOT'].'/queue/classes_loader.php';
require $_SERVER['DOCUMENT_ROOT'].'/queue/authorization.php';
$errors=false;
if($_FILES['files']['name'])
{
  $filename = explode(".", $_FILES['files']['name']);
  if($filename[1] == 'csv')
  {
    $handle = fopen($_FILES['files']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
      $training_id=$_SESSION['station'];
      $trainee_names=$function->sanitize($data[0]);
      $lnames=$function->sanitize($data[1]);
      $trainee_number=$function->sanitize($data[2]);
      $reg_id=$function->sanitize($data[3]);
      $train_date=$function->sanitize($data[4]);
      $train_time=$function->sanitize($data[5]);

      $insert_state=$upload->insertTrainee($training_id,$trainee_names,$lnames,$trainee_number,$reg_id,$train_date,$train_time);
      if(!$insert_state){
        $errors=true;
      }

   }
   fclose($handle);
   if($errors){
    echo "There was something wrong while upload a csv file please contact system admins";
   }else{
    echo "Everything Uploaded accordingly and successfully";
   }
  }
}else{
echo "no file(filename)";
}
 ?>