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
   <li class="drawer-menu-item" style="display: none;">
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
            <a href="data?training=<?php echo $_SESSION['station']; ?>&action=absence">
            No Show List
         </a>
         </li>
         <li class="drawer-menu-item ">
            <a href="data?training=<?php echo $_SESSION['station']; ?>&action=approved">Checked IN List</a>
         </li>
     </ul>
 </li>