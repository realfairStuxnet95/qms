<div id="saveTableModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add new Table to System</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="card" style="border: none;">
              <div class="card-body">
                  <form id="frm_save_table">
                    <div class="form-group">
                      <label for="email">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
                    </div>
                    <div class="form-group">
                      <label for="pwd">Table Capacity</label>
                      <input type="number" class="form-control" id="number" name="number" required>
                    </div>
                    <button type="submit" class="btn btn-success">SAVE TABLE</button>
                  </form>
                  <div id="divLoader" class="loading-circle-border" style="margin: 10px 40px auto;display: block;width: 80px;height: 80px;"></div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

  </div>
</div>