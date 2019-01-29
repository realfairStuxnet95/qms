<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/queue/classes_loader.php';
?>
<div id="123" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Modal Header</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="card" style="border: none;">
              <div class="card-body">
                <form>
                  <?php 
                  $time_slot=$upload->getTimeSlot();
                  ?>
                    <select class="form-control form-control-lg">
                            <option>Select Time Slot</option>
                            <?php 
                            foreach ($time_slot as $key => $value) {
                              ?>
                              <option>
                                <?php echo $function->changeTimeToString($value['time_range']).' - '.$function->changeTimeToString($value['end_time']);?>
                              </option>
                              <?php
                            }
                            ?>
                    </select>
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