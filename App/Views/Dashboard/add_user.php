<div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100" style="padding-top: 62px;">
<!-- main content -->
	<div class="container-fluid">

    <div class="card">
    	<div class="card-header">
    		<h2>
    			Fill the form to add new User
    		</h2>
    	</div>
	  <form method="POST" class="form-horizontal" style="margin:10px;">
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="email">Names:</label>
	      <div class="col-sm-10">
	        <input type="text" class="form-control" id="names" placeholder="Enter Names" name="names" required>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="email">Email:</label>
	      <div class="col-sm-10">
	        <input type="email" class="form-control" id="email" placeholder="E-mail will be used to login" name="email" required>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="email">Select User Type:</label>
	      <div class="col-sm-10">
	       	 <select id="select_type" name="type" class="form-control" required="">
	       	 	<option value="1">SYSTEM ADMIN</option>
	       	 	<option value="2">RECEPTIONIST</option>
	       	 	<option value="3">Verify Officer</option>
	       	 </select>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="email">Select User Station:</label>
	      <div class="col-sm-10">
			<?php 
			$trainingStation=$upload->loadStations();
			?>
			<select class="form-control" name="station">
				<?php 
					foreach ($trainingStation as $key => $value) {
						?>
						<option value="<?php echo $value['training_id']; ?>">
							<?php echo $value['station']; ?>
						</option>
						<?php
					}
				?>
			</select>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="pwd">Create Password:</label>
	      <div class="col-sm-10">          
	        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
	      <div class="col-sm-10">          
	        <input type="password" class="form-control" id="cpwd" placeholder="Re-Enter password" name="cpwd" required>
	      </div>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-10">
	        <button type="submit" name="save_user" class="btn btn-success btn-lg">Save User</button>
	        <a class="btn btn-danger btn-md" href="dashboard?request=system_users">Cancel</a>
	      </div>
	    </div>
	  </form>
	  <?php 
	  if(isset($_POST['save_user'])){
	  	// var_dump($_POST);
	  	$names=$function->sanitize($_POST['names']);
	  	$email=$function->sanitize($_POST['email']);
	  	$station=$function->sanitize($_POST['station']);
	  	$type=$function->sanitize($_POST['type']);
	  	$pwd=$function->sanitize($_POST['pwd']);
	  	$cpwd=$function->sanitize($_POST['cpwd']);

	  	//check if email not already user
	  	$check_mail=$admin->checkEmail($email);
	  	if(!$check_mail){
	  		$save_user=$admin->saveSystemUser($names,$email,$type,$pwd,$station);
	  		if($save_user){
	  			$function->displayAlert("System User created successfully");
	  			$function->backToUrl("dashboard?request=system_users");
	  		}else{
	  			$function->displayAlert("System Error.Contact Administration");
	  		}
	  	}else{
	  		$function->displayAlert("E-mail already in Use");
	  	}
	  }
	  ?>
    </div>
</div>
</div>