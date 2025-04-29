@php
$webSettings = new \App\Models\WebSettings;
$settings = [
  'footer_aboutus' => data_get( $webSettings->where('key', 'FOOTER_ABOUTUS')->first(), 'value', null ),
  'company_address' => data_get( $webSettings->where('key', 'CONTACT_ADDRESS')->first(), 'value', null ),
  'company_tel' => data_get( $webSettings->where('key', 'CONTACT_TEL')->first(), 'value', null ),
  'social_line' => data_get( $webSettings->where('key', 'SOCIAL_LINE')->first(), 'value', null)
];
$services = \App\Models\Services::Published()->limit(5);
$products = \App\Models\Projects::Published()->limit(5);
@endphp
<?php /* .main-footer - Start */ ?>
<footer class="main-footer" style="background-image:url({{ asset('images/background/footer_banner.png') }})">
	<div class="auto-container">
        
  	<?php /* .widgets-section - Start */ ?>
    <div class="widgets-section">
    	<div class="row clearfix">
                	
        <?php /* .big-column - Start */ ?>
        <div class="big-column col-lg-6 col-md-12 col-sm-12">
          <div class="row clearfix">
                        
            <?php /* .footer-column - Start */ ?>
            <div class="footer-column col-lg-7 col-md-6 col-sm-12">
              <div class="footer-widget logo-widget">
								<div class="logo">
                	<a href="{{ route('home') }}"><img src="{{ asset('images/logo_250x70.png') }}" alt="" /></a>
                </div>
                <div class="text">{!! $settings['footer_aboutus'] !!}</div>
							</div>
            </div>
						<?php /* .footer-column - End */ ?>
                            
            <?php /* .footer-column - Start */ ?>
            <div class="footer-column col-lg-5 col-md-6 col-sm-12">
              <div class="footer-widget links-widget">
              	<div class="footer-title">
              		<h2>Services</h2>
                </div>
                <ul class="footer-lists">
                  @if( $services->count() > 0 )
                    @foreach( $services->get() as $service )
                      <li><a href="{{ route('service.index') }}">{{ $service->display_title }}</a></li>
                    @endforeach
                  @endif
                </ul>
              </div>
            </div>
						<?php /* .footer-column - End */ ?>
                            
          </div>
        </div>
				<?php /* .big-column - End */ ?>
                    
        <?php /* .big-column - Start */ ?>
        <div class="big-column col-lg-6 col-md-12 col-sm-12">
          <div class="row clearfix">
                        	
						<?php /* .footer-column - Start */ ?>
            <div class="footer-column col-lg-5 col-md-6 col-sm-12">
              <div class="footer-widget links-widget">
              	<div class="footer-title">
              		<h2>Products</h2>
                </div>
                <ul class="footer-lists">
                  @if( $products->count() > 0 )
                    @foreach( $products->get() as $product )
                      <li><a href="{{ route('product.index') }}">{{ $product->display_title }}</a></li>
                    @endforeach
                  @endif
                </ul>
              </div>
            </div>
						<?php /* .footer-column - End */ ?>
                            
            <?php /* .footer-column - Start */ ?>
          	<div class="footer-column col-lg-6 col-md-6 col-sm-12">
            	<div class="footer-widget subscribe-widget">
              	<div class="footer-title">
              		<h2>Contact Information</h2>
                </div>
								<div class="widget-content">
                  <div class="text">
                    <p><strong>Address : </strong></p>
                    {!! $settings['company_address'] !!}
                  </div>
                  <div class="text">
                    <p><strong>Telephone : </strong></p>
                    <p>{{ $settings['company_tel'] }}</p>
                  </div>
                  <div class="text">
                    <p><strong>Line : </strong></p>
                    <p>{{ $settings['social_line'] }}</p>
                  </div>
									<?php /*
                  <div class="subscribe-form">
                    <form method="post" action="">
                      <div class="form-group">
                        <input type="email" name="email" value="" placeholder="Email Address" required>
                        <button type="submit" class="theme-btn"><span class="fa fa-send"></span></button>
                      </div>
                    </form>
                  </div>
									*/ ?>
                </div>
              </div>
            </div>
						<?php /* .footer-column - End */ ?>
                            
          </div>
        </div>
				<?php /* .blog-column - End */ ?>
                    
      </div>
    </div>
		<?php /* .widgets-section - End */ ?>
            
  </div>

  <div class="footer-bottom">
  	<div class="auto-container">
    	<div class="copyright">&copy; Copyright {{ now()->format('Y') }}. All Rights Reserved. Active 09 Industry Co., Ltd.</div>
    </div>
  </div>
</footer>
<?php /* .main-footer - End */ ?>