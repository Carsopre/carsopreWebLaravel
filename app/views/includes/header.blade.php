	<!-- STATUS BAR -->
	
<div class="contain-to-grid">
	<nav class="top-bar" data-topbar>	  
	  <ul class="title-area">
		<li class="name"><h1><a href="#">Project Name</a></h1></li>
		
		<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>

	  </ul>

	  <section class="top-bar-section">
	 	<!-- Left Nav Section -->
		
		
		<ul class="right">
			<li class="divider">&nbsp;</li>
			<?php if($user->hasAnyPermission(array(41, 51))) :?>
			<li class="has-dropdown not-click">
			  <a href="#">Sections</a>
			  <ul class="dropdown">
			      <li><a href="#">Curriculum Vitae</a></li>
			      <li><a href="#">PortFolio</a></li>
			      <li><a href="#">Contact</a></li>
			  </ul>
		    </li>
			<?php endif ?>
			<li class="divider">&nbsp;</li>	
			<?php if($user->hasAnyPermission(array(2, 11, 21))) :?>
			<li class="has-dropdown not-click">
			  <a href="#">Config</a>
			  <ul class="dropdown">
			  	  <li><a href="#">Global Conf.</a></li>
			  	  <?php if($user->hasPermission(31)) :?><li><a href="#">Languages</a></li><?php endif ?>
	  	  		  <?php if($user->hasPermission(41)) :?><li><a href="#">Categories</a></li><?php endif ?>
			  	  <li class="divider"></li>
			      <?php if($user->hasPermission(2)) :?><li>{{ HTML::link('users/index', 'Users') }}</li><?php endif ?>
			      <?php if($user->hasPermission(11)) :?><li><a href="#">Profiles</a></li><?php endif ?>
			      <?php if($user->hasPermission(21)) :?><li><a href="#">Permissions</a></li><?php endif ?>
			  </ul>
		    </li>
			<?php endif ?>
		    <li class="divider">&nbsp;</li>	
			<li class="has-dropdown not-click">
				<a href="#"><?= $user->username; ?></a>
				<ul class="dropdown">
				<li><a href="#">Config</a></li>
				<li class="divider"></li>
				@if(Auth::check())
					<li>{{ HTML::link('portal/logout', 'Logout') }}</li>
				@endif
				</ul>
			</li>
			<li class="divider">&nbsp;</li>	
		</ul>
		
	  </section>
	</nav>	
</div>
