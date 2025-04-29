@extends('app.layout')

@section('pageBanner')
@includeIf('components.page-banner')
@endsection

@section('content')
<?php /* .project-single-section - Start */ ?>
<section class="project-single-section">
	<div class="auto-container">
  		<div class="upper-box">
    		<div class="row clearfix">

				@if( $info->display_img )
					<?php /* .image-column - Start */ ?>
					<div class="image-column col-12 col-lg-8">
						<div class="image">
							<img src="{{ $info->display_img }}" alt="" />
						</div>
					</div>
					<?php /* .image-column - End */ ?>
				@endif

			</div>

			<?php /* .lower-box - Start */ ?>
			<div class="lower-box">
      			<h2>{{ $info->display_title }}</h2>
				{!! $info->display_desc !!}
				<div>&nbsp;</div>
				<div class="text-center"><a href="{{ route('project.index') }}" class="theme-btn btn-style-one">Back</a></div>
      		</div>
			<?php /* .lower-box - End */ ?>

		</div>
	</div>
</section>
<?php /* .project-single-section - End */ ?>
@endsection

@push('scripts')

@endpush