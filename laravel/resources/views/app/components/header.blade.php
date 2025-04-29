@php
$webSettings = new \App\Models\WebSettings;
$settings = [
  'company_address' => data_get( $webSettings->where('key', 'CONTACT_ADDRESS')->first(), 'value', null ),
];
@endphp
<header class="main-header">
    
	<?php /* .header-top - Start */ ?>
	<div class="header-top">
    <div class="auto-container">
      <div class="clearfix">
        <?php /*
        <!--Top Left-->
        <div class="top-left pull-left">
        	<ul class="clearfix">
            <li><span class="fa fa-phone"></span>034 472 370</li>
          </ul>
        </div>
        <!--Top Right-->
        <div class="top-right pull-right">
        	<ul class="social-nav">
          	<li><a href="#"><span class="fa fa-line"></span></a></li>
            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
            <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
            <li><a href="#"><span class="fa fa-dribbble"></span></a></li>
          </ul>
        	<!-- Search -->
          <div class="search-box">
          	<form method="post" action="javascript:void(0);">
              <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search" required>
                <button type="submit"><span class="icon fa fa-search"></span></button>
              </div>
            </form>
					</div>
        </div>
        <?php */ ?>
    	</div>
    </div>
  </div>
	<?php /* .header-top - End */ ?>

	<?php /* .header-upper - Start */ ?>
  <div class="header-upper">
  	<div class="auto-container">
    	<div class="clearfix">

				<?php /* .pull-left - Start */ ?>
      	<div class="pull-left logo-box">
        	<div class="logo">
						<a href="{{ route('home') }}"><img src="{{ asset('images/logo_250x70.png') }}" alt="" title=""></a>
					</div>
        </div>
				<?php /* .pull-left - End */ ?>
        
				<?php /* .pull-right - Start */ ?>
        <div class="pull-right upper-right clearfix d-none d-md-block">
        
          <?php /* .info-box - Start */ ?>
          <div class="upper-column info-box">
          	<div class="icon-box">
							<span class="flaticon-earth-globe"></span>
						</div>
            <ul>
            	<li><strong>Address</strong></li>
              <li>{!! $settings['company_address'] !!}</li>
            </ul>
          </div>
					<?php /* .info-box - End */ ?>
                    
        </div>
				<?php /* .pull-right - End */ ?>
                
      </div>
    </div>
  </div>
  <?php /* .header-upper - End */ ?>
    
  <?php /* .header-lower - Start */ ?>
  <div class="header-lower">
        
    <div class="auto-container">
      <div class="nav-outer clearfix">
				
        <?php /* .main-menu - Start */ ?>
				@includeIf('app.components.navigation')
        <?php /* .main-menu - End */ ?>

				<?php /* .outer-box - Start */ ?>
        <div class="outer-box clearfix">
          <div class="advisor-box">
            <a href="{{ route('contact') }}" class="theme-btn advisor-btn">
							<span>Contact Us</span>
						</a>
          </div>
        </div>
				<?php /* .outer-box - End */ ?>

    	</div>
  	</div>
	</div>
	<?php /* .header-lower - End */ ?>
    
  <?php /* .sticky-header - Start */ ?>
  <div class="sticky-header">
  	<div class="auto-container clearfix">

    	<?php /* .logo - Start */ ?>
    	<div class="logo pull-left">
      	<a href="{{ route('home') }}" class="img-responsive">
					<img src="{{ asset('images/logo_150x40.png') }}" alt="" title="">
				</a>
      </div>
			<?php /* .logo - End */ ?>
            
      <?php /* .right-col - Start */ ?>
      <div class="right-col pull-right">

				<?php /* .main-menu - Start */ ?>
				@includeIf('app.components.navigation', ['status' => 'sticky'])
				<?php /* .main-menu - End */ ?>

      </div>
			<?php /* .right-col - End */ ?>
            
    </div>
  </div>
  <?php /* .sticky-header - End */ ?>

</header>