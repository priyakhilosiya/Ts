<div role="dialog"  class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true">
   <form method="POST" action="<?= admin_path()?>/users/postAllAttendeeEmailMessage/" accept-charset="UTF-8" class="ajax closeModalAfter">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-envelope"></i>
                    Message To All
                </h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="subject" class="control-label required">Mesage Subject</label>
                            <input class="form-control" name="subject" id="subject" type="text">
                        </div>

                        <div class="form-group">
                            <label for="message" class="control-label required">Message Content</label>

                            <textarea class="form-control" rows="5" name="message" cols="50" id="message"></textarea>
                        </div>
					<div class="form-group">
                                    <label for="recipients" class="control-label required">Send To</label>
                                    <?php
                                    if (count($ticketDetails>0)){?>
                                    <select class="form-control" id="recipients" name="recipients"><option value="all">All Event Attendees</option><optgroup label="Attendees with ticket type"><?php foreach($ticketDetails as $key=>$val){   ?>                                       <option value="<?=$key?>"><?php echo $val;?></option>
                					<?php }?></optgroup></select>
                                <?php  }?>
                                </div>
                    </div>
                </div>
             
            </div> <!-- /end modal body-->
            <div class="modal-footer">
               <button class="btn modal-close btn-danger" data-dismiss="modal" type="button">Cancel</button>
               <input class="btn btn-success" value="Send Message" type="submit">
            </div>
        </div><!-- /end modal content-->

    </div></form>
</div>