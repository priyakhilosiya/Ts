<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Theme style -->
         <link href="<?=public_path()?>css/admin/conference.css" rel="stylesheet" type="text/css" />
		 <link href="<?=public_path()?>css/admin/login.css" rel="stylesheet" type="text/css" />
      </head>
	<body class="login-page">
   <section id="main" role="main">
		<section class="container">
		  <form action="<?=admin_path()?>index" method="post" id="loginFrm">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel">
						<div class="panel-body">
							<div class="logo">
								<img src="<?=public_path()?>/images/logo-admin.png">
							</div>
							 <?php
                        if(@$error_msg['invalid_login'] != ''){
                    ?>
                        <div class="box box-solid box-danger">
                            <div class="box-header">
                                <h3 class="box-title"><?=$error_msg['invalid_login']?></h3>
                                <div class="box-tools pull-right">
                                    <button data-widget="collapse" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></button>
                                    <button data-widget="remove" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
						<div class="form-group <?=(@$error_msg['userid'] != '')?'has-error':'' ?>">
								<label for="email" class="control-label">Email</label>
								<?php
                            if(@$error_msg['userid'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['userid']?></label>
                        <?php
                            }
                        ?>
								<input class="form-control allow-enter validate[required]" autofocus="1" name="userid" id="userid" type="text" value='<?php if(isset($_COOKIE['uname'])) echo $_COOKIE['uname']; ?>'>
							</div>
							<div class="form-group <?=(@$error_msg['password'] != '')?'has-error':'' ?>">
								<label for="password" class="control-label">Password</label>
								(<a class="forgotPassword" href="admin/index/forgot-password" tabindex="-1">Forgot password?</a>)
								<?php
                            if(@$error_msg['password'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['password']?></label>
                        <?php
                            }
                        ?>
								<input class="form-control allow-enter validate[required]" name="password" value="" id="password" type="password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-block btn-success">Login</button>
							</div>

						</div>
					</div>
				</div>
			</div>
			</form>
		</section>
 </section>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?=public_path()?>js/Conference/conference.js" type="text/javascript"></script>
<script src="<?=public_path()?>js/admin/index.js" type="text/javascript"></script>
<script src="<?=public_path()?>js/btvalidationEngine.js" type="text/javascript"></script>
<script src="<?=public_path()?>js/btvalidationEngine-en.js" type="text/javascript"></script>


<script type="text/javascript">
$(document).ready(function(){
	$("#loginFrm").validationEngine();
});
</script>

</body>
</html>

