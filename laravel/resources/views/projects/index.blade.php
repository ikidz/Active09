@extends('app.layout')

@section('pageBanner')
@includeIf('components.page-banner')
@endsection

@section('content')

<?php /* .project-page-section - Start */ ?>
<section class="project-page-section">
	<div class="auto-container">

		<?php /* .mixitup-gallery - Start */ ?>
		<div class="mixitup-gallery">

			<?php /* .filters - Start */ ?>
      <div class="filters">
        <ul class="filter-tabs filter-btns clearfix">
          <li class="active filter" data-role="button" data-filter=".all">VIEW ALL</li>
          @if( $projectCategories->count() > 0 )
            @foreach( $projectCategories->get() as $category )
              <li class="filter" data-role="button" data-filter=".category-{{ $category->id }}">{{ $category->display_title }}</li>
            @endforeach
          @endif
        </ul>
      </div>
			<?php /* .filters - End */ ?>

			<?php /* .filter-list - Start */ ?>
			<div class="filter-list row clearfix">

        @if( $projects->count() > 0 )
          @foreach( $projects->get() as $project )
            <?php /* .default-portfolio-item - Start */ ?>
            <div class="default-portfolio-item mix masonry-item all {{ $project->category_classes }} col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box">
                {{ $project->img }}
                @if( $project->display_img )
                  <figure class="image-box">
                    <img src="{{ $project->display_img }}" alt="">
                  </figure>
                @endif
                          
                <?php /* .overlay-box - Start */ ?>
                <div class="overlay-box">
                  <div class="overlay-inner">
                    <div class="content">
                      @if( $project->display_img )
                        <a href="{{ $project->display_img }}" class="lightbox-image link" data-fancybox="images" data-caption="{{ $project->display_title }}" title="{{ $project->display_title }}"><span class="icon fa fa-search"></span></a>
                      @endif
                      <h3><a href="javascript:void(0);">{{ $project->display_title }}</a></h3>
                      <div class="tags">{{ $project->category_names }}</div>
                    </div>
                  </div>
                </div>
                <?php /* .overlay-box - End */ ?>

              </div>
            </div>
            <?php /* .default-portfolio-item - End */ ?>
          @endforeach
        @endif

			</div>
			<?php /* .filter-list - End */ ?>

		</div>
		<?php /* .mixitup-gallery - End */ ?>
	</div>
</section>
<?php /* .project-page-section - End */ ?>

@endsection

@push('scripts')

@endpush