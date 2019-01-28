<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
   <div class="mdk-drawer__content">
      <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">
         <nav class="drawer  drawer--dark">
            <div class="drawer-spacer">
               <div class="media align-items-center">
                  <a href="index.html" class="drawer-brand-circle mr-2">S</a>
                  <div class="media-body">
                     <a href="dashboard" class="h5 m-0 text-link">QMS System</a>
                  </div>
               </div>
            </div>
            <!-- HEADING -->
            <div class="py-2 drawer-heading">
               Dashboards
            </div>
            <!-- MENU -->
            <ul class="drawer-menu" id="dasboardMenu" data-children=".drawer-submenu">
               <?php 
               $userType=(int)$_SESSION['user_type'];
               if($userType==2){
                  ?>
               <li class="drawer-menu-item">
                  <a href="dashboard">
                  <i class="material-icons">poll</i>
                  <span class="drawer-menu-text">
                     Dashboard
                  </span>
                  </a>
               </li>
               <li class="drawer-menu-item">
                  <a href="dashboard">
                  <i class="material-icons">date_range</i>
                  <span class="drawer-menu-text">
                     Training Progress
                  </span>
                  </a>
               </li>
               <li class="drawer-menu-item">
                  <a href="?request=display">
                  <i class="material-icons">track_changes</i>
                  <span class="drawer-menu-text">
                     Activity Tracking
                  </span>
                  </a>
               </li>
             <li class="drawer-menu-item drawer-submenu">
                 <a data-toggle="collapse" data-parent="#mainMenu" href="#" data-target="#formsMenu" aria-controls="formsMenu" aria-expanded="false" class="collapsed">
                     <i class="material-icons">people</i>
                     <span class="drawer-menu-text">Trainees</span>
                  </a>
                 <ul class="collapse " id="formsMenu">
                     <li class="drawer-menu-item ">
                        <a href="data?training=123&action=unapproved">UnApproved Trainees</a>
                     </li>
                     <li class="drawer-menu-item ">
                        <a href="data?training=123&action=approved">Approved Trainees</a>
                     </li>
                 </ul>
             </li>
                  <?php
               }elseif($userType==1){
                  ?>
                  <li class="drawer-menu-item active ">
                     <a href="dashboard">
                     <i class="material-icons">poll</i>
                     <span class="drawer-menu-text">
                        Dashboard
                     </span>
                     </a>
                  </li>
                  <li class="drawer-menu-item">
                     <a href="dashboard?request=upload_file">
                     <i class="material-icons">cloud_uploads</i>
                     <span class="drawer-menu-text">
                        Upload Candidates File
                     </span>
                     </a>
                  </li>
                  <li class="drawer-menu-item">
                     <a href="data?training=123">
                        <i class="material-icons">people</i>
                        <span class="drawer-menu-text">
                           Uploaded Candidates File
                        </span>
                     </a>
                  </li>
                  <li class="drawer-menu-item">
                     <a href="tables?training=123">
                     <i class="material-icons">view_arrays</i>
                     <span class="drawer-menu-text">
                        Manage Tables
                     </span>
                     </a>
                  </li>
                  <li class="drawer-menu-item">
                     <a href="tables?training=123&action=time_slot">
                     <i class="material-icons">access_time</i>
                     <span class="drawer-menu-text">
                        Manage Time Slot
                     </span>
                     </a>
                  </li>
                  <li class="drawer-menu-item">
                     <a href="data?training=123&action=approved">
                     <i class="material-icons">check</i>
                     <span class="drawer-menu-text">
                        Approved Candidates
                     </span>
                     </a>
                  </li>
                  <?php
               }
               ?>
               <li class="drawer-menu-item" style="display: none;">
                  <a href="projects.html">
                  <i class="material-icons">dns</i>
                  <span class="drawer-menu-text"> Projects/Tickets</span>
                  <span class="badge badge-pill badge-success ml-1">4</span>
                  </a>
               </li>
            </ul>
         </nav>
      </div>
   </div>
</div>