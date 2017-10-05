<!-- Header Navbar: style can be found in header.less -->
<div class="navbar-header">
        <a class="navbar-brand" href="<?=base_url()?>">
            <img style="width: 150px;" class="logo" alt="Attendize" src="<?=public_path()?>images/logo-light.png">
        </a>
    </div>
    <div class="navbar-toolbar clearfix">
            <ul class="nav navbar-nav navbar-left">
    <!-- Show Side Menu -->
    <li class="navbar-main">
        <a href="<?=base_url()?>" class="toggleSidebar" title="Show sidebar">
            <span class="toggleMenuIcon">
                <span class="icon ico-menu"></span>
            </span>
        </a>
    </li>
    <!--/ Show Side Menu -->
    <li class="nav-button ">
        <a target="_blank" href="">
            <span>
                <i class="ico-eye2"></i>&nbsp;Organiser Page
            </span>
        </a>
    </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown profile">

            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                <span class="meta">
                    <span class="text "><?=$this->user_session['U_FNAME']." ".$this->user_session['U_LNAME'] ?></span>
                    <span class="arrow"></span>
                </span>
            </a>


            <ul class="dropdown-menu" role="menu">

                <li>
                    <a data-toggle="modal" data-target="#exampleModal" class="" href="javascript:void(0);"><span class="icon ico-user"></span>My Profile</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?=admin_path()."index/logout"?>"><span class="icon ico-exit"></span>Sign Out</a></li>
            </ul>
        </li>
    </ul>
    </div>

<!-- End of header-->