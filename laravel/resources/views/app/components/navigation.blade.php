<nav class="main-menu navbar-expand-md">

	<?php /* .navbar-header - Start */ ?>
	<div class="navbar-header">
		
		<?php /* navbar-toggler - Start */ ?>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<?php /* navbar-toggler - End */ ?>

	</div>
	<?php /* .navbar-header - End */ ?>
	
	<?php /* .navbar-collapse - Start */ ?>
	<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
		<ul class="navigation clearfix">
      <li class="{{ ( request()->routeIs('home') ? 'current' : '' ) }}">
				<a href="{{ route('home') }}">Home</a>
			</li>
			<li class="{{ ( request()->routeIs('article.aboutus') ? 'current' : '' ) }}">
				<a href="{{ route('article.aboutus') }}">About Us</a>
			</li>
			<li class="{{ ( request()->routeIs('service.*') ? 'current' : '' ) }}">
				<a href="{{ route('service.index') }}">Services</a>
			</li>
			<?php /*
			<li class="{{ ( request()->routeIs('project.*') ? 'current' : '' ) }}">
				<a href="{{ route('project.index') }}">Projects</a>
			</li>
			*/ ?>
			<li class="{{ ( request()->routeIs('product.*') ? 'current' : '' ) }}">
				<a href="{{ route('product.index') }}">Products</a>
			</li>
			@if( @$status == 'sticky' )
				<li class="{{ ( request()->routeIs('contact') ? 'current' : '' ) }}">
					<a href="{{ route('contact') }}">Contact Us</a>
				</li>
			@endif
			<li class="{{ ( request()->routeIs('contact') ? 'current' : '' ) }} d-block d-lg-none">
				<a href="{{ route('contact') }}">Contact Us</a>
			</li>
    </ul>
  </div>
	
</nav>