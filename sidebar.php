    <section class="content">
        <h5 class="heading">Organiser Menu</h5>
		
		<?php if (hasAccess("events")){ ?>
		  <h5 class="heading">Event Menu</h5>
		  <ul id="nav_event" class="topmenu">
		  <?php 	
			if (hasAccess("dashboard")){ ?>
            <li class="">
                 <a href="<?=admin_path()?>dashboard">
                    <span class="figure"><i class="ico-home2"></i></span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
			<?php } ?>
            <li class="">
               <a href="<?=admin_path()?>tickets">
                    <span class="figure"><i class="ico-ticket"></i></span>
                    <span class="text">Tickets</span>
                </a>
            </li>
            <li class="active">
                <a href="<?=admin_path()?>orders">
                    <span class="figure"><i class="ico-cart"></i></span>
                    <span class="text">Orders</span>
                </a>
            </li>
			<?php if (hasAccess("users")){ ?>
            <li class="">
                <a href="<?=admin_path()?>users">
                    <span class="figure"><i class="ico-user"></i></span>
                    <span class="text">Attendees</span>
                </a>
            </li>
			<?php } ?>
            <?php if (hasAccess("sponsor")){ ?>
            <li class="">
                <a href="<?=admin_path()?>sponsor">
                    <span class="figure"><i class="ico-calendar"></i></span>
                    <span class="text">Sponsor</span>
                </a>
            </li>
			<?php } ?>
            
        </ul>
		<?php } ?>		
       
    </section>
