<div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100" style="padding-top: 62px;">
<!-- main content -->
	<div class="container-fluid">

    <div class="card">
    	<div class="card-header">
    		<h2>
    			Change Password for:<?php echo $_SESSION['user_names']; ?>
    		</h2>
    	</div>
	  <form method="POST" class="form-horizontal" style="margin:10px;">
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="pwd">Current Password:</label>
	      <div class="col-sm-10">          
	        <input type="password" class="form-control" placeholder="Enter old password" name="current_pwd" required>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="pwd">Create new Password:</label>
	      <div class="col-sm-10">          
	        <input type="password" class="form-control" id="pwd" placeholder="Enter new password" name="new_pwd" required>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-6" for="pwd">Confirm new Password:</label>
	      <div class="col-sm-10">          
	        <input type="password" class="form-control" id="cpwd" placeholder="Re-Enter password" name="confirm_pwd" required>
	      </div>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-8 col-sm-10">
	        <button type="submit" name="update_password" class="btn btn-success btn-lg">Change Password</button>
	        <a class="btn btn-danger btn-md" href="dashboard">Cancel</a>
	      </div>
	    </div>
	  </form>
	  <?php 
	  if(isset($_POST['update_password'])){
	  	//var_dump($_POST);
	  	$current_pwd=$function->sanitize($_POST['current_pwd']);
	  	$new_pwd=$function->sanitize($_POST['new_pwd']);
	  	$confirm_pwd=$function->sanitize($_POST['confirm_pwd']);

	  	if(strlen($new_pwd)>=6){
	  		if($new_pwd == $confirm_pwd){
	  			//validate old password
	  			$user_id=$_SESSION['user_id'];
	  			$validate_pwd=$admin->checkUserPassword($user_id,$current_pwd);
	  			if($validate_pwd){
	  				//update user password
	  				$update=$admin->updateUserPassword($user_id,$new_pwd);
	  				if($update){
	  					$function->displayAlert("Password changed successfully.Changes will take effect on next login");
	  					$function->backToUrl("logout");
	  				}
	  			}else{
	  				$function->displayAlert("Invalid Current password.Try again");
	  			}
	  		}else{
	  			$function->displayAlert("New Entered password do not match.Please check again");
	  		}
	  	}else{
	  		$function->displayAlert("Password must be atleast 6 Characters");
	  	}
	  }
	  ?>
    </div>
</div>
</div>