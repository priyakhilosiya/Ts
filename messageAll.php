<div role="dialog"  class="modal fade " style="display: none;">  
    <form method="POST" action="http://nirav-event.kwetoo.com/event/1/attendees/message" accept-charset="UTF-8" class="reset ajax closeModalAfter"><input name="_token" value="ZqtchsCdM67hPPB4P3hlAR4QATtShR74lJzWICwp" type="hidden">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title">
                    <i class="ico-envelope"></i>
                    Message Attendees</h3>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#new_message" data-toggle="tab">New Message</a></li>
                    <li><a href="#sent_messages" data-toggle="tab">Sent Messages</a></li>
                </ul>

                <div class="tab-content panel">
                    <div class="tab-pane active" id="new_message">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subject" class="control-label required">Message Subject</label>
                                    <input class="form-control" name="subject" id="subject" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="message" class="control-label required">Message Content</label>
                                    <textarea class="form-control" rows="5" name="message" cols="50" id="message"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="recipients" class="control-label required">Send To</label>
                                    <select class="form-control" id="recipients" name="recipients"><option value="all">All Event Attendees</option><optgroup label="Attendees with ticket type"><option value="1">silver ticket</option><option value="2">Golden</option></optgroup></select>
                                </div>

                                <div class="form-group hide">
                                    <label for="sent_time" class="control-label required">Schedule Send Time</label>
                                    <input class="form-control" name="sent_time" id="sent_time" type="text">
                                    <div class="help-block">
                                        Leave blank to send immediately.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="sent_messages">

                                                    <div class="alert alert-info">
                                You have not sent any messages for this event.
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