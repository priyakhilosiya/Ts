<div role="dialog"  class="modal fade " style="display: none;">  
   <form method="POST" action="http://nirav-event.kwetoo.com/event/1/attendees/invite" accept-charset="UTF-8" class="ajax"><input name="_token" value="ZqtchsCdM67hPPB4P3hlAR4QATtShR74lJzWICwp" type="hidden">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">�</button>
                <h3 class="modal-title">
                    <i class="ico-user"></i>
                    Invite Attendee</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   <label for="ticket_id" class="control-label required">Ticket</label>
                                   <select class="form-control" id="ticket_id" name="ticket_id"><option value="1">silver ticket</option><option value="2">Golden</option></select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="first_name" class="control-label required">First Name</label>

                                <input class="form-control" name="first_name" id="first_name" type="text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="last_name" class="control-label">Last Name</label>

                                <input class="form-control" name="last_name" id="last_name" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label required">Email Address</label>

                            <input class="form-control" name="email" id="email" type="text">
                        </div>

                        <div class="form-group">
                            <div class="checkbox custom-checkbox">
                                <input name="email_ticket" id="email_ticket" value="1" type="checkbox">
                                <label for="email_ticket">&nbsp;&nbsp;Send invitation &amp; ticket to attendee.</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /end modal body-->
            <div class="modal-footer">
               <button class="btn modal-close btn-danger" data-dismiss="modal" type="button">Cancel</button>
               <input class="btn btn-success" value="Invite Attendee" type="submit">
            </div>
        </div><!-- /end modal content-->

    </div></form>
</div>