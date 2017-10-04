<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('admin/template/head');?>
	</head>
	<body class="attendize">

			<?php if (!isset($noheader)) {?>
				<header class="navbar" id="header">
					<?php $this->load->view('admin/template/header');?>
				</header>
			<?php }?>
			
			<?php if (!isset($nosidebar)) {?>
			<aside class="sidebar sidebar-left sidebar-menu">
				<?php $this->load->view('admin/template/sidebar');?>
			</aside>
			<?php }?>

			<section id="main" role="main">
				<?php $this->load->view("admin/".$this->router->fetch_class()."/".$view);?>
				 <!--To The Top-->
				<a href="#" style="display:none;" class="totop"><i class="ico-angle-up"></i></a>
				<!--/To The Top-->
			</div>
			<?php if (!isset($nofooter)) {?>
			<footer class="main-footer">
				<?php $this->load->view('admin/template/footer');?>
			</footer>
			<?php }?>

			<?php
            $userDetails=$this->common_model->getUserDetails($this->user_session['U_ID']);
            $data['userDetails'] = $userDetails;
            $this->load->view('admin/usermodel', $data);?>
						
	</body>
		<?php $this->load->view('admin/template/script');?>
</html>