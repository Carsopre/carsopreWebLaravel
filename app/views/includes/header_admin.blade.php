	<!-- STATUS BAR -->
	
<div class="contain-to-grid sticky">
	<nav class="top-bar" data-topbar>	  
	  <ul class="title-area">
		<li class="name"><h1>{{ HTML::link('/', 'Home')}}</h1></li>
		
		<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>

	  </ul>

	  <section class="top-bar-section">
	 	<!-- Left Nav Section -->
		<ul>
			<?php $cats = Category::all(); ?>
			@foreach($cats as $cat)
				<li class="divider"></li>
				<li>{{ HTML::link('categories/'.$cat->id, $cat->name)}}</li>
			@endforeach
				<li class="divider"></li>
		</ul>
		@if( Auth::check())
		<ul class="right">
			<li class="divider">&nbsp;</li>	
			<?php if($user->hasAnyPermission(array(2, 11, 21,31,41,51))) :?>
			<li class="has-dropdown not-click">
			  <a href="#">Config</a>
			  <ul class="dropdown">
			  	  <li><a href="#">Global Conf.</a></li>
			  	  <li class="divider"></li>
	  	  		  <?php if($user->hasPermission(41)) :?><li>{{ HTML::link('categories', 'Categories') }}</li><?php endif ?>
	  	  		  <!--<?php if($user->hasPermission(51)) :?><li>{{ HTML::link('sections', 'Sections') }}</li><?php endif ?>-->
			  	  <li class="divider"></li>
			      <?php if($user->hasPermission(2)) :?><li>{{ HTML::link('users', 'Users') }}</li><?php endif ?>
			      <?php if($user->hasPermission(11)) :?><li>{{ HTML::link('profiles', 'Profiles') }}</li><?php endif ?>
			      <?php if($user->hasPermission(21)) :?><li>{{ HTML::link('permissions', 'Permissions') }}</li><?php endif ?>
			      <?php if($user->hasPermission(31)) :?><li>{{ HTML::link('languages', 'Languages') }}</li><?php endif ?>
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
		@endif		
	  </section>
	</nav>	
</div>
