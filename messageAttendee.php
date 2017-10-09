<div role="dialog"  class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true">
   <form method="POST" action="<?= admin_path()?>/users/postAllAttendeeEmailMessage/" accept-charset="UTF-8" class="ajax closeModalAfter">
       <input type="hidden" name="order_id" id="order_id" value="<?=$order_id;?>" />
    <input type="hidden" name="user_id" id="user_id" value="<?=$user_id;?>" />
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title">
                    <i class="ico-envelope"></i>
                    Message <?= $userAttendeeDetails['U_FNAME'];?><?=$userAttendeeDetails['U_LNAME'];?>
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
                            <div class="custom-checkbox">
                                <input name="send_copy" id="send_copy" value="1" type="checkbox">
                                <label for="send_copy">&nbsp;&nbsp;Send a copy to <b><?=$this->user_session['U_EMAIL'];?></b></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="help-block">
                    The attendee will be instructed to send any reply to <b><?=$this->user_session['U_EMAIL'];?></b>
                </div>
            </div> <!-- /end modal body-->
            <div class="modal-footer">
               <button class="btn modal-close btn-danger" data-dismiss="modal" type="button">Cancel</button>
               <input class="btn btn-success" value="Send Message" type="submit">
            </div>
        </div><!-- /end modal content-->

    </div></form>
</div>