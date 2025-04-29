@extends('app.layout')

@section('pageBanner')
@includeIf('components.page-banner')
@endsection

@section('content')

<?php /* .solutions-page-section - Start */ ?>
<section class="solutions-page-section">
	<div class="auto-container">
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
<?php /* .solutions-page-section - End */ ?>

@endsection

@push('scripts')

@endpush