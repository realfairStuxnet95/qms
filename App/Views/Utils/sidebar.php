<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
   <div class="mdk-drawer__content">
      <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">
         <nav class="drawer  drawer--dark">
            <div class="drawer-spacer">
               <div class="media align-items-center">
                  <a href="dashboard">
                     <img src="assets/images/police.png" style="width: 100px;">
                  </a>
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
                  <a href="tables?training=<?php echo $_SESSION['station']; ?>&action=display#">
                  <i class="material-icons">date_range</i>
                  <span class="drawer-menu-text">
                     Session Progress
                  </span>
                  </a>
               </li>
               <li>
                 
                </li>
             <li class="drawer-menu-item drawer-submenu">
                 <a data-toggle="collapse" data-parent="#mainMenu" href="#" data-target="#formsMenu" aria-controls="formsMenu" aria-expanded="false" class="collapsed">
                     <i class="material-icons">people</i>
                     <span class="drawer-menu-text">Candidates list</span>
                  </a>
                 <ul class="collapse " id="formsMenu">
                     <li class="drawer-menu-item ">
                        <a href="data?training=<?php echo $_SESSION['station']; ?>&action=unapproved">No Show List</a>
                     </li>
                     <li class="drawer-menu-item ">
                        <a href="data?training=<?php echo $_SESSION['station']; ?>&action=approved">Checked IN List</a>
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
                     <a href="dashboard?request=system_users">
                     <i class="material-icons">people</i>
                     <span class="drawer-menu-text">
                        Manage System Users
                     </span>
                     </a>
                  </li>
                  <li class="drawer-menu-item">
                     <a href="dashboard?request=training_station">
                     <i class="material-icons">fingerprint</i>
                     <span class="drawer-menu-text">
                        Manage Training Station
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
                     <a href="data?training=<?php echo $_SESSION['station']; ?>">
                        <i class="material-icons">people</i>
                        <span class="drawer-menu-text">
                           Uploaded Candidates File
                        </span>
                     </a>
                  </li>
                  <li class="drawer-menu-item">
                     <a href="tables?training=<?php echo $_SESSION['station']; ?>">
                     <i class="material-icons">view_arrays</i>
                     <span class="drawer-menu-text">
                        Manage Computers
                     </span>
                     </a>
                  </li>
                  <li class="drawer-menu-item">
                     <a href="tables?training=<?php echo $_SESSION['station']; ?>&action=time_slot">
                     <i class="material-icons">access_time</i>
                     <span class="drawer-menu-text">
                        Manage Time Slot
                     </span>
                     </a>
                  </li>
                <li class="drawer-menu-item drawer-submenu">
                    <a data-toggle="collapse" data-parent="#mainMenu" href="#" data-target="#formsMenu" aria-controls="formsMenu" aria-expanded="false" class="collapsed">
                        <i class="material-icons">people</i>
                        <span class="drawer-menu-text">Candidates list</span>
                     </a>
                    <ul class="collapse " id="formsMenu">
                        <li class="drawer-menu-item ">
                           <a href="data?training=<?php echo $_SESSION['station']; ?>&action=unapproved">No Show List</a>
                        </li>
                        <li class="drawer-menu-item ">
                           <a href="data?training=<?php echo $_SESSION['station']; ?>&action=approved">Checked IN List</a>
                        </li>
                    </ul>
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