<div class="container-fluid">
        <div class="page-title">
            <h1 class="title"><i class="ico-users"></i>
Attendees
</h1>
        </div>
                <!--  header -->
        <div class="page-header page-header-block row">
            <div class="row">

<div class="col-md-9">
    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group btn-group-responsive">
            <button data-toggle="modal"   href="javascript:void(0);"  data-href="<?=admin_path()."users/addattendee"?> " class="loadModal btn btn-success" type="button"><i class="ico-user-plus"></i> Invite Attendee</button>
        </div>

        <div class="btn-group btn-group-responsive">
            <button data-toggle="modal"   href="javascript:void(0);"  data-href="<?=admin_path()."users/addattendee"?> " class="loadModal btn btn-success" type="button"><i class="ico-file"></i> Invite Attendees</button>
        </div>

        <div class="btn-group btn-group-responsive">
            <a class="btn btn-success" href="http://nirav-event.kwetoo.com/event/2/attendees/print" target="_blank"><i class="ico-print"></i> Print Attendee List</a>
        </div>
        <div class="btn-group btn-group-responsive">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                <i class="ico-users"></i> Export <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="http://nirav-event.kwetoo.com/event/2/attendees/export/xlsx">Excel (XLSX)</a></li>
                <li><a href="http://nirav-event.kwetoo.com/event/2/attendees/export/xls">Excel (XLS)</a></li>
                <li><a href="http://nirav-event.kwetoo.com/event/2/attendees/export/csv">CSV</a></li>
                <li><a href="http://nirav-event.kwetoo.com/event/2/attendees/export/html">HTML</a></li>
            </ul>
        </div>
        <div class="btn-group btn-group-responsive">
            <button data-toggle="modal"   href="javascript:void(0);"  data-href="<?=admin_path()."users/addattendee"?> " class="loadModal btn btn-success" type="button"><i class="ico-envelope"></i> Message</button>
        </div>
    </div>
</div>
<div class="col-md-3">
   <form method="GET" action="http://nirav-event.kwetoo.com/event/2/attendees?sort_by=created_at" accept-charset="UTF-8">
    <div class="input-group">
        <input name="q" value="" placeholder="Search Attendees.." class="form-control" type="text">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="ico-search"></i></button>
        </span>
    </div>
   </form>
</div>
            </div>
        </div>
        <!--/  header -->

        <!--Content-->

<!--Start Attendees table-->
<div class="row">
    <div class="col-md-12">
                <div class="panel">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                               <a href="?sort_by=first_name&amp;sort_order=asc&amp;q=&amp;page=1" class="col-sort ">Name<i class="ico-arrow-up22"></i></a>
                            </th>
                            <th>
                               <a href="?sort_by=email&amp;sort_order=asc&amp;q=&amp;page=1" class="col-sort ">Email<i class="ico-arrow-up22"></i></a>
                            </th>
                            <th>
                               <a href="?sort_by=ticket_id&amp;sort_order=asc&amp;q=&amp;page=1" class="col-sort ">Ticket<i class="ico-arrow-up22"></i></a>
                            </th>
                            <th>
                               <a href="?sort_by=order_reference&amp;sort_order=asc&amp;q=&amp;page=1" class="col-sort ">Order Ref.<i class="ico-arrow-up22"></i></a>
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr class="attendee_5 ">
                            <td>Paresh Patel</td>
                            <td>
                                <a data-modal-id="MessageAttendee" class="loadModal" href="javascript:void(0);"  data-href="<?=admin_path()."users/addattendee"?> "> paresh.patel@gmail.com</a>
                            </td>
                            <td>
                                Golden Pass
                            </td>
                            <td>
                                <a href="javascript:void(0);"  data-href="<?=admin_path()."users/addattendee"?> " title="View Order #SOZWI259" class="loadModal">
                                    SOZWI259
                                </a>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                                                                <li><a href="javascript:void(0);"  data-href="<?=admin_path()."users/addattendee"?> " class="loadModal"> Message</a></li>
                                                                                <li><a href="javascript:void(0);"  data-href="<?=admin_path()."users/addattendee"?> " class="loadModal"> Resend Ticket</a></li>
                                        <li><a href="http://nirav-event.kwetoo.com/event/2/attendees/5/export_ticket">Download PDF Ticket</a></li>
                                    </ul>
                                </div>

                                <a href="javascript:void(0);"  data-href="<?=admin_path()."users/addattendee"?> " class="loadModal btn btn-xs btn-primary"> Edit</a>

                                <a href="javascript:void(0);"  data-href="<?=admin_path()."users/addattendee"?> " class="loadModal btn btn-xs btn-danger"> Cancel</a>
                            </td>
                        </tr>

                        <tr class="attendee_5 ">
                            <td>Priya Khilosiya</td>
                            <td>
                                <a href="javascript:void(0);"  data-href="<?=admin_path()."users/addattendee"?> " class="loadModal" >priya.khilosiya@gmail.com</a>
                            </td>
                            <td>
                                Golden Pass
                            </td>
                            <td>
                                <a href="javascript:void(0);" data-modal-id="view-order-4" data-href="http://nirav-event.kwetoo.com/event/order/4" title="View Order #SOZWI259" class="loadModal">
                                    SOZWI2ff
                                </a>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                                                                <li><a data-modal-id="MessageAttendee" href="javascript:void(0);" data-href="http://nirav-event.kwetoo.com/event/5/attendees/single_message" class="loadModal"> Message</a></li>
                                                                                <li><a data-modal-id="ResendTicketToAttendee" href="javascript:void(0);" data-href="http://nirav-event.kwetoo.com/event/5/attendees/resend_ticket" class="loadModal"> Resend Ticket</a></li>
                                        <li><a href="http://nirav-event.kwetoo.com/event/2/attendees/5/export_ticket">Download PDF Ticket</a></li>
                                    </ul>
                                </div>

                                <a data-modal-id="EditAttendee" href="javascript:void(0);" data-href="http://nirav-event.kwetoo.com/event/2/attendees/5/edit" class="loadModal btn btn-xs btn-primary"> Edit</a>

                                <a data-modal-id="CancelAttendee" href="javascript:void(0);" data-href="http://nirav-event.kwetoo.com/event/2/attendees/5/cancel" class="loadModal btn btn-xs btn-danger"> Cancel</a>
                            </td>
                        </tr>
                                            </tbody>
                </table>
            </div>
        </div>
            </div>
    <div class="col-md-12">

    </div>
</div>    <!--/End attendees table-->

        <!--/Content-->
    </div>