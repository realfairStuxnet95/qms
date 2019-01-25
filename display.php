<!-- content -->
<div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100">
   <!-- main content -->
   <div class="container-fluid">
      <div class="row font-1">
        <div class="col-lg-12">
          <h2>Isaha:<span id="divTime"></span></h2>
        </div>
      </div>
      <div class="row font-1">
         <div class="col-lg-4">
           <div class="card">
            <?php $time_slot=$upload->loadTimeslot(); ?>
               <div class="card-header d-flex align-items-center">
                   <div class="card-title">
                       Time Slots
                   </div>
                   <i class="material-icons ml-auto text-muted">clock</i>
               </div>
               <ul class="list-group list-group-flush">
                <?php 
                foreach ($time_slot as $key => $value) {
                  ?>
                   <li class="list-group-item">
                       <div class="media align-items-center">
                           <div class="media-body lh-12">
                               <a href="#">
                                 <?php echo $value['time_range'].' - '.$value['end_time'].' '.$value['name']; ?>
                               </a>
                           </div>
                           <div class="lead">
                              <span class="badge badge-success">
                                ACTIVITY
                              </span>
                               <i class="material-icons md-18 align-middle text-success">arrow_upward</i>
                           </div>
                       </div>
                   </li>
                  <?php
                }
                 ?>

               </ul>
           </div>
         </div>
      </div>
   </div>
</div>