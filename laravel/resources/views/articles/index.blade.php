@extends('app.layout')

@section('pageBanner')
@includeIf('components.page-banner')
@endsection

@section('content')

<?php /* .solutions-page-section - Start */ ?>
<section class="solutions-page-section">
	<div class="auto-container">
  		<div class="row clearfix">

			@if( $articles->count() > 0 )
				@foreach( $articles->get() as $article )
					<?php /* .news-block-two - Start */ ?>
					<div class="col-12 col-md-6">
						@includeIf('components.news-item')
					</div>
					<?php /* .news-block-two - End */ ?>
				@endforeach
			@endif	

		</div>
	</div>
</section>
<?php /* .solutions-page-section - End */ ?>

@endsection

@push('scripts')

@endpush