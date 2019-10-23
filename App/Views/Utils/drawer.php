<div class="mdk-drawer js-mdk-drawer" id="user-drawer" data-position="right" data-align="end">
   <div class="mdk-drawer__content">
      <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">
         <nav class="drawer drawer--light">
            <div class="drawer-spacer drawer-spacer-border">
               <div class="media align-items-center">
                  <img src="assets/images/avatars/avatar.png" class="img-fluid rounded-circle mr-2" width="35" alt="">
                  <div class="media-body">
                     <a href="#" class="h5 m-0">
                        <?php echo $_SESSION['user_names']; ?>
                     </a>
                     <div>
                        <?php 
                        if($_SESSION['user_type']==1){
                           echo "System Admin";
                        }else{
                           echo "Receptionist";
                        }
                        ?>
                     </div>
                  </div>
               </div>
            </div>
            <!-- MENU -->
            <ul class="drawer-menu" id="userMenu" data-children=".drawer-submenu">
               <li class="drawer-menu-item">
                  <a href="dashboard?request=change_password">
                  <i class="material-icons">lock</i>
                  <span class="drawer-menu-text"> Change Password</span>
                  </a>
               </li>
               <li class="drawer-menu-item">
                  <a href="#">
                  <i class="material-icons">account_circle</i>
                  <span class="drawer-menu-text"> Profile</span>
                  </a>
               </li>
               <li class="drawer-menu-item">
                  <a href="logout">
                  <i class="material-icons">exit_to_app</i>
                  <span class="drawer-menu-text"> Logout</span>
                  </a>
               </li>
            </ul>
         </nav>
      </div>
   </div>
</div>