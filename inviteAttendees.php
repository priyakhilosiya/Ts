<div role="dialog"  class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true">
   <form method="POST" action="http://nirav-event.kwetoo.com/event/1/attendees/import" accept-charset="UTF-8" class="ajax closeModalAfter" enctype="multipart/form-data"><input name="_token" value="ZqtchsCdM67hPPB4P3hlAR4QATtShR74lJzWICwp" type="hidden">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title">
                    <i class="ico-user-plus"></i>
                    Invite Attendees</h3>
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
                        <!-- Import -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="attendees_list" class="control-label required">Import File</label><a style="margin-left: 4px;font-size: 11px;" href="javascript:showHelp('File must be .csv and the first line must contains first_name,last_name,email');"><i class="ico ico-question "></i></a>
                                <div class="styledFile" id="input-attendees_list">
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-primary btn-file ">
                    Browse… <input name="attendees_list" multiple="" type="file">
                </span>
            </span>
            <input class="form-control" readonly="" type="text">
            <span style="display: none;" class="input-group-btn btn-upload-file">
                <span class="btn btn-success ">
                    Upload
                </span>
            </span>
        </div>
    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox custom-checkbox">
                                        <input name="email_ticket" id="email_ticket" value="1" type="checkbox">
                                        <label for="email_ticket">&nbsp;&nbsp;Send invitation &amp; ticket to attendees.</label>
                                    </div>
                                </div>
                            </div>
                		</div>
                    </div>
                </div>
            </div> <!-- /end modal body-->
            <div class="modal-footer">
               <button class="btn modal-close btn-danger" data-dismiss="modal" type="button">Cancel</button>
               <input class="btn btn-success" value="Create Attendees" type="submit">
            </div>
        </div><!-- /end modal content-->

    </div></form>
</div>