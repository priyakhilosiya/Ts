<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="<?=admin_path()?>sponsor/postAddSponsor" accept-charset="UTF-8" class="ajax closeModalAfter" id="sponsorprofile" autocomplete="off">
        <div class="modal-dialog account_settings">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3 class="modal-title">
                        <i class="ico-user"></i>
                        Add Sponsor</h3>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="control-label required">First Name</label>
                                <input class="form-control validate[required]" name="first_name" id="first_name" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="control-label required">Last Name</label>
                                <input class="form-control validate[required]" name="last_name"  id="last_name" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="control-label required">Email</label>
                                <input class="form-control validate[required,custom[email]]" name="email"id="email" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                    <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input class="form-control validate[required]" name="password" value="" id="password" type="password" autocomplete="new-password">
                            </div>
                            </div>
                    </div>

                       <div class="row">
                        <div class="col-md-12">
                     <div class="form-group">
                            <label for="email" class="control-label required">No of Tickets</label>
                            <input class="form-control" name="no_tickets" id="no_tickets" type="text">
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                   <button class="btn modal-close btn-danger" data-dismiss="modal" type="button">Cancel</button>
                   <input class="btn btn-success pull-right" name="regSubmit" id="regSubmit" value="Save Details" type="submit">
                </div>
            </div>
        </div>
    </form>
</div>