<div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100" style="padding-top: 62px;">
<!-- main content -->
	<div class="container-fluid">

    <div class="card">
    	<div class="card-header">
    		<h2>
    			Fill the form to add new User
    		</h2>
    	</div>
	  <form id="frm_save_user" class="form-horizontal" style="margin:10px;">
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
	       	 <select id="select_type" class="form-control" required="">
	       	 	<option value="1">SYSTEM ADMIN</option>
	       	 	<option value="2">RECEPTIONIST</option>
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
	        <button type="submit" class="btn btn-success btn-lg">Save User</button>
	        <a class="btn btn-danger btn-md" href="dashboard?request=system_users">Cancel</a>
	      </div>
	    </div>
	  </form>
    </div>
</div>
</div>