@extends('app.layout')

@section('banners')
@includeIf('components.banners')
@endsection
@section('content')

<?php /* .services-section - Start */ ?>
<section class="services-section">
	<div class="auto-container">

		<?php /* .sec-title - Start */ ?>
    <div class="sec-title centered">
    	<h2>Our Services</h2>
      <div class="separater"></div>
      <div class="text">{{ $settings['ourservice_caption'] }}</div>
    </div>
    <div class="row clearfix">

      @if( $services->count() > 0 )
        @foreach( $services->get() as $service )
          <?php /* .services-block - Start */ ?>
          @includeIf('components.service-item')
          <?php /* .services-block - End */ ?>
        @endforeach
      @endif
            
    </div>
  </div>
</section>
<?php /* .services-section - End */ ?>

<?php /* .product-section - Start */ ?>
<section class="product-section">
	<div class="upper-box" style="background-image:url({{ $settings['quote_bg'] }})">
  	<div class="auto-container">
      <h2>{!! $settings['quote'] !!}</h2>
    </div>
  </div>
  <div class="auto-container">
  	<div class="lower-box">
    	<div class="clearfix">
				<?php /* .image-column - Start */ ?>
      	<div class="image-column col-lg-6 col-md-12 col-sm-12">
        	<div class="image">
            @if( $settings['aboutus_img'] )
          	  <img src="{{ $settings['aboutus_img'] }}" alt="" />
            @endif
          </div>
        </div>
				<?php /* .image-column - End */ ?>

        <?php /* .content-column - Start */ ?>
      	<div class="content-column col-lg-6 col-md-12 col-sm-12">
        	<div class="inner-column">
          	<h3>{!! $settings['aboutus_title'] !!}</h3>
            <div class="text">
              {!! $settings['aboutus_caption'] !!}
            </div>
          </div>
        </div>
        <?php /* .content-column - End */ ?>
      </div>
    </div>
  </div>
</section>
<?php /* .product-section - End */ ?>

<?php /* .product-section - Start */ ?>
@if( $settings['business_title'] )
<section class="product-section">
  <div class="upper-box bg-orange">
  	<div class="auto-container">
      <h2><strong>Our Business</strong></h2>
    </div>
  </div>
  <div class="auto-container">
  	<div class="lower-box">
    	<div class="clearfix">

        <?php /* .content-column - Start */ ?>
      	<div class="content-column col-lg-6 col-md-12 col-sm-12 order-2 order-lg-1">
        	<div class="inner-column">
          	<h3><span class="theme_color">{!! $settings['business_title'] !!}</span></h3>
            <div class="text">
              {!! $settings['business_caption'] !!}
            </div>
          </div>
        </div>
        <?php /* .content-column - End */ ?>

        <?php /* .image-column - Start */ ?>
      	<div class="image-column col-lg-6 col-md-12 col-sm-12 order-1 order-lg-2">
        	<div class="image">
            @if( $settings['business_img'] )
          	  <img src="{{ $settings['business_img'] }}" alt="" />
            @endif
          </div>
        </div>
				<?php /* .image-column - End */ ?>

      </div>
    </div>
  </div>
</section>
@endif
<?php /* .product-section - End */ ?>

<?php /* @includeIf('home.components.projects') */ ?>

<?php /* @includeIf('home.components.news') */ ?>

<?php /* .clients-section - Start */ ?>
@if( $partners->count() > 0 )
  <section class="clients-section">
    <div class="auto-container">
      <div class="row clearfix">
            
        <?php /* .title-cloumn - Start */ ?>
        <div class="title-column col-lg-3 col-md-12 col-sm-12">
          <h2>Benefits of Rubber Liners</h2>
        </div>
        <?php /* .title-cloumn - End */ ?>

        <?php /* .client-column - Start */ ?>
        <div class="clients-column col-lg-9 col-md-12 col-sm-12">
          <div class="sponsors-outer">
                
            <?php /* .sponsors-carousel - Start */ ?>
            <ul class="sponsors-carousel owl-carousel owl-theme">
              @foreach( $partners->get() as $partner )
                <li class="slide-item">
                  <figure class="image-box">
                    <a href="{{ $partner->display_url }}">
                      @if( $partner->display_logo )
                        <img src="{{ $partner->display_logo }}" alt="">
                      @endif
                      <p>{{ $partner->display_title }}</p>
                    </a>
                  </figure>
                </li>
              @endforeach
            </ul>
            <?php /* .sponsors-carousel - End */ ?>

          </div>
        </div>
        <?php /* .client-column - End */ ?>
              
      </div>
    </div>
  </section>
@endif
<?php /* .clients-section - End */ ?>

@if( $settings['map'] )
  <?php /* .map-section - Start */ ?>
  <section class="map-section">
    <div class="auto-container">

      <?php /* .map-outer - Start */ ?>
      <div class="map-outer">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="{{ $settings['map'] }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
      <?php /* .map-outer - End */ ?>
          
    </div>
  </section>
  <?php /* .map-section - End */ ?>
@endif

@endsection

@push('scripts')

@endpush