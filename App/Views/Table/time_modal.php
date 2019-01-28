<div id="saveSlotModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add new Time Slot to System</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="card" style="border: none;">
              <div class="card-body">
                  <form id="frm_save_slot">
                    <div class="form-group">
                      <label for="email">Select Start Time</label>
                      <input type="time" class="form-control" id="startTime" name="startTime" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Select End Time</label>
                      <input type="time" class="form-control" id="endTime" name="endTime" required>
                    </div>
                    <button type="submit" class="btn btn-success">SAVE TIME SLOT</button>
                  </form>
                  <div id="divLoader" class="loading-circle-border" style="margin: 10px 40px auto;display: none;width: 80px;height: 80px;"></div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

  </div>
</div>