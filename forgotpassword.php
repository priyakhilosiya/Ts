<!DOCTYPE html>
<html class="">
    <head>
        <meta charset="UTF-8">
        <title>Conference | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
         <link href="<?=public_path()?>css/conference.css" rel="stylesheet" type="text/css" />
		 <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
        <div class="form-box login-box " id="login-box">
		<div class="login-logo">
		  <a href="#"><b>5 Min Propsite</b></a>
		 </div>
		<div class="login-box-body">
            <div class="header">
			<h3><p class="login-box-msg">Forgot Password</p></h3>
			</div>
            <form action="" method="post">
                <div class="dsds body bg-gray">
                    <div id="flash_msg">
                        <?php
                            if (@$flash_msg['flash_type'] == "success") {
                                echo success_msg_box($flash_msg['flash_msg']);
                            }

                            if (@$flash_msg['flash_type'] == "error") {
                                echo error_msg_box($flash_msg['flash_msg']);
                            }
                        ?>
                    </div>
                    <div class="form-group <?=(@$error_msg['email'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['email'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['email']?></label>
                        <?php
                            }
                        ?>
                        <input type="text" name="email" class="form-control allow-enter" placeholder="Email"/>
                    </div>

                </div>
                <div class="footer">
                    <button type="submit" class="btn btn-primary sumitbtn">Submit</button>
					<a type="button" class="btn btn-primary  sumitbtn" href="/admin">Back</a>
                </div>
            </form>
        </div>
		 </div>
         <!-- AdminLTE App -->
        <script src="<?=public_path()?>js/Conference/conference.js" type="text/javascript"></script>
    </body>
</html>