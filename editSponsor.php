<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="<?=admin_path()?>sponsor/postAddSponsor" accept-charset="UTF-8" class="ajax closeModalAfter" id="userprofile" autocomplete="off">
    <input name="user_id" id="user_id" value="<?=$userSponsorDetails['U_ID'] ?>" type="hidden">
         <div class="modal-dialog account_settings">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3 class="modal-title">
                        <i class="ico-user"></i>
                       Edit Sponsor</h3>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="control-label required">First Name</label>
                                <input class="form-control validate[required]" name="first_name" value="<?php echo $userSponsorDetails['U_FNAME']; ?>" id="first_name" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="control-label required">Last Name</label>
                                <input class="form-control validate[required]" name="last_name" value="<?php echo $userSponsorDetails['U_LNAME']; ?>" id="last_name" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="control-label required">Email</label>
                                <input class="form-control validate[required,custom[email]]" name="email" value="<?php echo $userSponsorDetails['U_EMAIL']; ?>" id="email" type="text">
                                    ('Email address Will not change user login Email adress')
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-md-12"><div class="form-group">
                            <label for="email" class="control-label required">No of Tickets</label>
                            <input class="form-control" name="no_tickets" id="no_tickets" type="text" value="<?php echo $userSponsorDetails['ORG_TICKETS']; ?>">
                        </div>
                            </div>
                                        </div>


                    <div class="row more-options">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="password" class="control-label">Old Password</label>
                                <input class="form-control validate[required]" name="password" value="" id="password" type="password" autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="new_password" class="control-label">New Password</label>
                                <input class="form-control validate[required]" name="new_password" value="" id="new_password" type="password" autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="new_password_confirmation" class="control-label">Confirm New Password</label>
                                <input class="form-control validate[required,equals[new_password]]" name="new_password_confirmation" value="" id="new_password_confirmation" type="password" autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <a data-show-less-text="Hide Change Password" href="javascript:void(0);" class="in-form-link show-more-options">
                        Change Password
                    </a>
                </div>
                <div class="modal-footer">
                   <button class="btn modal-close btn-danger" data-dismiss="modal" type="button">Cancel</button>
                   <input class="btn btn-success pull-right" name="regSubmit" id="regSubmit" value="Save Details" type="submit">
                </div>
            </div>
        </div>
    </form>
</div>
<!DOCTYPE html>

<html>

<head>
  <title>Hello!</title>
</head>

<body>

<?php
echo("Hello, World!");
?>

</body>
</html>