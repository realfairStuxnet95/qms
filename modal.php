<div id="modal123" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Assign Training time slot to Trainee</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="card" style="border: none;">
              <div class="card-body">
                <form id="frm_approve">
                  <?php 
                  $time_slot=$upload->getTimeSlot('ACTIVE');
                  ?>
                    <select id="sel_slot" class="form-control form-control-lg">
                            <option value="">Select Time Slot</option>
                            <?php 
                            foreach ($time_slot as $key => $value) {
                              ?>
                              <option value="<?php echo $value['id']; ?>">
                                <?php echo $value['start_time'].' - '.$value['end_time'];?>
                              </option>
                              <?php
                            }
                            ?>
                    </select>
                    <input type="hidden" name="trainee_info" id="trainee_info">
                    <h3 id="p_trainee">You are assigning slot to:Manikiza Samuel</h3>
                    <br>
                    <input type="submit" class="btn btn-primary btn-lg" value="APPROVE AND ASSIGN SLOT">
                </form>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

  </div>
</div>