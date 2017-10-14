<div role="dialog"  class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true">
   <form method="POST" action="<?=admin_path()?>sponsor/deletesponsor" accept-charset="UTF-8" class="ajax closeModalAfter">
   <input name="user_id" id="user_id" value="<?=$userSponsorDetails['U_ID'] ?>" type="hidden">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-cancel"></i>
                    Delete <b><?php echo $userSponsorDetails['U_FNAME']." ".$userSponsorDetails['U_LNAME'];?><b></b></b></h3><b><b>
            </b></b></div><b><b>
            <div class="modal-body">
                <p>
                    Deleting Sponsor  will Move all attende of that sponsor to Organization.
                </p>

                
                <br>
              </div> <!-- /end modal body-->
            <div class="modal-footer">
               <button class="btn modal-close btn-danger" data-dismiss="modal" type="button">Cancel</button>
               <input class="btn btn-success" value="Confirm Delete Sponsor" type="submit">
            </div>
        </b></b></div><!-- /end modal content--><b><b>

    </b></b></div></form><b><b>
</b></b></div>