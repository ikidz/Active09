<?php /* .page-title - Start */ ?>
<section class="page-title" style="background-image:url({{ $pageTitle['banner_bg'] ?? '' }})">
	<div class="auto-container">
  	<h1>{{ $pageTitle['title'] }}</h1>
		@if( count( $pageTitle['breadcrumbs'] ) > 0 )
    	<ul class="page-breadcrumb">
				@foreach( $pageTitle['breadcrumbs'] as $breadcrumb )
  				<li>
						@if( isset( $breadcrumb['url'] ) )
							<a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
						@else
							{{ $breadcrumb['label'] }}
						@endif
					</li>
				@endforeach
    	</ul>
		@endif
  </div>
</section>
<?php /* .page-title - End */ ?>