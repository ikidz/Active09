@extends('app.layout')

@section('pageBanner')
@includeIf('components.page-banner')
@endsection

@section('content')
<?php /* .contact-section - Start */ ?>
<section class="contact-section">
	<div class="auto-container">
  	<div class="sec-title">
    	<h2>Contact Us</h2>
      <div class="separater"></div>
    </div>
		<div class="row clearfix">

			<?php /* .form-column - Start */ ?>
    	<div class="form-column col-lg-9 col-md-8 col-sm-12">
      	<div class="inner-column">

					<?php /* .default-form - Start */ ?>
					<div class="default-form contact-form">

						<?php /* .contact-form - Start */ ?>
						<form method="post" action="" id="contact-form">
							<div class="row clearfix">
								<div class="col-lg-6 col-md-6 col-sm-12 form-group">
                  <input type="text" name="username" placeholder="Enter Name" required>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                  <input type="email" name="email" placeholder="Enter Email" required>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                  <input type="text" name="subject" placeholder="Enter Subject" required>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                  <input type="text" name="phone" placeholder="Enter Phone" required>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                  <textarea name="message" placeholder="Massage"></textarea>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                  <button class="theme-btn btn-style-one" type="submit" name="submit-form">Send Now</button>
                </div>
							</div>
						</form>
						<?php /* .contact-form - End */ ?>

					</div>
					<?php /* .default-form - End */ ?>

				</div>
			</div>
			<?php /* .form-column - End */ ?>

			<?php /* .info-column - Start */ ?>
			<div class="info-column col-lg-3 col-md-4 col-sm-12">
      	
				<?php /* .list-style-three - Start */ ?>
        <ul class="list-style-three">
        	<li><span class="icon flaticon-note"></span><strong>{{ $webSettings['email'] }}</strong>We reply within 24 hours</li>
          <li><span class="icon flaticon-telephone"></span><strong>Have Any Question</strong>{{ $webSettings['tel'] }}<br />or Line : {{ $webSettings['line'] }}</li>
          <li><span class="icon fa fa-clock-o"></span><strong>Working Hours</strong>{{ $webSettings['hours'] }}</li>
          <li><span class="icon fa fa-map-marker"></span>{{ strip_tags( $webSettings['address'] ) }}</li>
          <li><span class="icon fa fa-map-marker"></span>{{ strip_tags( $webSettings['address'] ) }}</li>
        </ul>
				<?php /* .list-style-three - End */ ?>

      </div>
			<?php /* .info-column - End */ ?>

		</div>
	</div>

</section>
<?php /* .contact-section - End */ ?>

@if( $webSettings['map'] )
	<?php /* .contact-map-section - Start */ ?>
	<section class="contact-map-section">
		<?php /* .map-outer - Start */ ?>
		<div class="map-outer">
			<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="{{ $webSettings['map'] }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
		<?php /* .map-outer - End */ ?>
	</section>
	<?php /* .contact-map-section - End */ ?>
@endif
@endsection

@push('scripts')

@endpush