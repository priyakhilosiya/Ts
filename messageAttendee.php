<div role="dialog" class="modal fade" style="display: block;" aria-hidden="false">
   <form method="POST" action="http://nirav-event.kwetoo.com/event/3/attendees/single_message" accept-charset="UTF-8" class="ajax reset closeModalAfter"><input name="_token" value="ZqtchsCdM67hPPB4P3hlAR4QATtShR74lJzWICwp" type="hidden">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title">
                    <i class="ico-envelope"></i>
                    Message Priya Khilosiya
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
                                <label for="send_copy">&nbsp;&nbsp;Send a copy to <b>nirav.patel@kraffsoft.com</b></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="help-block">
                    The attendee will be instructed to send any reply to <b>nirav.patel@kraffsoft.com</b>
                </div>
            </div> <!-- /end modal body-->
            <div class="modal-footer">
               <button class="btn modal-close btn-danger" data-dismiss="modal" type="button">Cancel</button>
               <input class="btn btn-success" value="Send Message" type="submit">
            </div>
        </div><!-- /end modal content-->

    </div></form>
</div>