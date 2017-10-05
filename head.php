<meta charset="UTF-8">
        <title>Conference</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <?php if(in_array($this->router->fetch_class(),array("category"))) { ?>
        <?php }?>
		<?php if (in_array($this->router->fetch_method(), array("add","edit"))) { ?>
		<?php }?>
       <!-- Theme style -->
         <link href="<?=public_path()?>css/admin/conference.css" rel="stylesheet" type="text/css" />
		 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
		 <link media="all" type="text/css" rel="stylesheet" href="<?=public_path()?>vendor/fullcalendar/dist/fullcalendar.css">

      