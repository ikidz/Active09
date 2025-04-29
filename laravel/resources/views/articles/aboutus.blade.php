@extends('app.layout')

@section('pageBanner')
@includeIf('components.page-banner')
@endsection

@section('content')

<?php /* .welcome-section - Start */ ?>
<section class="welcome-section alternate">
	<div class="auto-container">
  	<div class="row clearfix">
        	
      <?php /* .content-column - Start */ ?>
      <div class="content-column col-lg-7 col-md-12 col-sm-12">
      	<div class="inner-column">
        	<h2>{!! $info['title'] !!}</h2>
          <div class="text">
          	{!! $info['desc'] !!}
          </div>
        </div>
      </div>
			<?php /* .content-column - End */ ?>
            
      <?php /* .image-column - Start */ ?>
      <div class="image-column col-lg-5 col-md-12 col-sm-12">
        @if( $info['img'] )
          <div class="image">
            <img src="{{ $info['img'] }}" alt="" />
          </div>
        @endif
      </div>
			<?php /* .image-column - End */ ?>
            
    </div>
  </div>
</section>
<?php /* .welcome-section - End */ ?>

@endsection

@push('scripts')

@endpush