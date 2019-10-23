<!-- content -->
<div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100">
   <!-- main content -->
   <div class="container-fluid">
      <div class="row font-1">
         <div class="col-lg-4">
            <div class="card card-body flex-row align-items-center bg-success text-white">
               <h5 class="m-0"><i class="fa fa-users"></i> 
                  APPROVED CANDIDATES
               </h5>
               <div class="text-white ml-auto">
                  <?php 
                  $compare_date=date("Y-m-d");
                  $training=$_SESSION['station'];
                  $trainees=$admin->uploadedCandidates('APPROVED',$compare_date,$training);
                  echo count($trainees);
                  ?>
               </div>
            </div>
         </div>
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
                  echo count($trainees);
                  ?>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="card card-body flex-row align-items-center bg-warning text-white">
               <h5 class="m-0"><i class="fa fa-desktop"></i> 
                  AVAILABLE COMPUTERS
               </h5>
               <div class="text-white ml-auto">
                  <?php 
                  $compare_date=date("Y-m-d");
                  $training=$_SESSION['station'];
                  $computers=$admin->computerReport($training,"AVAILABLE");
                  echo count($computers);
                  ?>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="card card-body flex-row align-items-center bg-info text-white">
               <h5 class="m-0"><i class="fa fa-desktop"></i> 
                  TAKEN COMPUTERS
               </h5>
               <div class="text-white ml-auto">
                  <?php 
                  $compare_date=date("Y-m-d");
                  $training=$_SESSION['station'];
                  $computers=$admin->computerReport($training,"TAKEN");
                  echo count($computers);
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>