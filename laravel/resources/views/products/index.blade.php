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
			<div class="filters clearfix">
        <ul class="filter-tabs filter-btns clearfix">
          <li class="active filter" data-role="button" data-filter="all">VIEW ALL</li>
          <li class="filter" data-role="button" data-filter=".agriculture">AGRICULTURE</li>
          <li class="filter" data-role="button" data-filter=".material">MATERIALS</li>
          <li class="filter" data-role="button" data-filter=".chemical">CHEMICAL</li>
          <li class="filter" data-role="button" data-filter=".mechanical">MECHANICAL</li>
        </ul>
      </div>
			<?php /* .filters - End */ ?>

			<?php /* .filter-list - Start */ ?>
			<div class="filter-list row clearfix">

				<?php /* .default-portfolio-item - Start */ ?>
				<div class="default-portfolio-item mix all chemical col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
            <figure class="image-box"><img src="{{ asset('images/gallery/13.jpg') }}" alt=""></figure>
            <?php /* .overlay-box - Start */ ?>
            <div class="overlay-box">
              <div class="overlay-inner">
                <div class="content">
                  <a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}" class="link"><span class="fa fa-link"></span></a>
                  <a href="{{ asset('images/gallery/13.jpg') }}" class="lightbox-image link" data-fancybox="images" data-caption="" title=""><span class="icon fa fa-search"></span></a>
                  <h3><a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}">Pre Construction</a></h3>
                  <div class="tags">Agriculture, Chemical</div>
                </div>
              </div>
            </div>
						<?php /* .overlaybox - End */ ?>
          </div>
	      </div>
				<?php /* .default-portfolio-item - End */ ?>

				<?php /* .default-portfolio-item - Start */ ?>
        <div class="default-portfolio-item mix all chemical mechanical agriculture col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
            <figure class="image-box"><img src="{{ asset('images/gallery/14.jpg') }}" alt=""></figure>
            <?php /* .overlay-box - Start */ ?>
            <div class="overlay-box">
              <div class="overlay-inner">
                <div class="content">
	                <a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}" class="link"><span class="fa fa-link"></span></a>
	                <a href="{{ asset('images/gallery/14.jpg') }}" class="lightbox-image link" data-fancybox="images" data-caption="" title=""><span class="icon fa fa-search"></span></a>
	                <h3><a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}">Pre Construction</a></h3>
	                <div class="tags">Agriculture, Chemical</div>
                </div>
              </div>
            </div>
						<?php /* .overlay-box - End */ ?>
          </div>
        </div>
				<?php /* .default-portfolio-item - End */ ?>

				<?php /* .default-portfolio-item - Start */ ?>
        <div class="default-portfolio-item mix all chemical col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
            <figure class="image-box"><img src="{{ asset('images/gallery/15.jpg') }}" alt=""></figure>
            <?php /* .overlay-box - Start */ ?>
            <div class="overlay-box">
              <div class="overlay-inner">
                <div class="content">
                  <a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}" class="link"><span class="fa fa-link"></span></a>
                  <a href="{{ asset('images/gallery/15.jpg') }}" class="lightbox-image link" data-fancybox="images" data-caption="" title=""><span class="icon fa fa-search"></span></a>
                  <h3><a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}">Pre Construction</a></h3>
                  <div class="tags">Agriculture, Chemical</div>
                </div>
              </div>
            </div>
						<?php /* .overlay-box - End */ ?>
          </div>
        </div>
				<?php /* .default-portfolio-item - End */ ?>

				<?php /* .default-portfolio-item - Start */ ?>
        <div class="default-portfolio-item mix all mechanical col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
            <figure class="image-box"><img src="{{ asset('images/gallery/16.jpg') }}" alt=""></figure>
            <?php /* .overlay-box - Start */ ?>
            <div class="overlay-box">
              <div class="overlay-inner">
                <div class="content">
                  <a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}" class="link"><span class="fa fa-link"></span></a>
                  <a href="{{ asset('images/gallery/16.jpg') }}" class="lightbox-image link" data-fancybox="images" data-caption="" title=""><span class="icon fa fa-search"></span></a>
                  <h3><a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}">Pre Construction</a></h3>
                  <div class="tags">Agriculture, Chemical</div>
                </div>
              </div>
            </div>
						<?php /* .overlay-box - End */ ?>
          </div>
        </div>
				<?php /* .default-portfolio-item - End */ ?>

				<?php /* .default-portfolio-item - Start */ ?>
        <div class="default-portfolio-item mix all mechanical agriculture col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
            <figure class="image-box"><img src="{{ asset('images/gallery/17.jpg') }}" alt=""></figure>
            <?php /* .overlay-box - Start */ ?>
            <div class="overlay-box">
              <div class="overlay-inner">
                <div class="content">
	                <a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}" class="link"><span class="fa fa-link"></span></a>
	                <a href="{{ asset('images/gallery/17.jpg') }}" class="lightbox-image link" data-fancybox="images" data-caption="" title=""><span class="icon fa fa-search"></span></a>
	                <h3><a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}">Pre Construction</a></h3>
	                <div class="tags">Agriculture, Chemical</div>
                </div>
              </div>
            </div>
						<?php /* .overlay-box - End */ ?>
          </div>
        </div>
				<?php /*..default-portfolio-item - End */ ?>

				<?php /* .default-portfolio-item - Start */ ?>
        <div class="default-portfolio-item mix all agriculture col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
            <figure class="image-box"><img src="{{ asset('images/gallery/18.jpg') }}" alt=""></figure>
            <?php /* .overlay-box - Start */ ?>
            <div class="overlay-box">
              <div class="overlay-inner">
                <div class="content">
                  <a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}" class="link"><span class="fa fa-link"></span></a>
                  <a href="{{ asset('images/gallery/18.jpg') }}" class="lightbox-image link" data-fancybox="images" data-caption="" title=""><span class="icon fa fa-search"></span></a>
                  <h3><a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}">Pre Construction</a></h3>
                  <div class="tags">Agriculture, Chemical</div>
                </div>
              </div>
            </div>
						<?php /* .overlay-box - End */ ?>
          </div>
        </div>
				<?php /* .default-portfolio-item - End */ ?>

				<?php /* .default-portfolio-item - Start */ ?>
        <div class="default-portfolio-item mix all chemical material col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
            <figure class="image-box"><img src="{{ asset('images/gallery/19.jpg') }}" alt=""></figure>
            <?php /* .overlay-box - Start */ ?>
            <div class="overlay-box">
                <div class="overlay-inner">
                  <div class="content">
                    <a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}" class="link"><span class="fa fa-link"></span></a>
                    <a href="{{ asset('images/gallery/19.jpg') }}" class="lightbox-image link" data-fancybox="images" data-caption="" title=""><span class="icon fa fa-search"></span></a>
                    <h3><a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}">Pre Construction</a></h3>
                    <div class="tags">Agriculture, Chemical</div>
                  </div>
                </div>
            </div>
						<?php /* .overlay-box - End */ ?>
          </div>
        </div>
				<?php /* .default-portfolio-item - End */ ?>

				<?php /* .default-portfolio-item - Start */ ?>
        <div class="default-portfolio-item mix all agriculture col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
            <figure class="image-box"><img src="{{ asset('images/gallery/20.jpg') }}" alt=""></figure>
            <?php /* .overlay-box - Start */ ?>
            <div class="overlay-box">
              <div class="overlay-inner">
                <div class="content">
                  <a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}" class="link"><span class="fa fa-link"></span></a>
                  <a href="{{ asset('images/gallery/20.jpg') }}" class="lightbox-image link" data-fancybox="images" data-caption="" title=""><span class="icon fa fa-search"></span></a>
                  <h3><a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}">Pre Construction</a></h3>
                  <div class="tags">Agriculture, Chemical</div>
                </div>
              </div>
            </div>
						<?php /* .overlay-box - End */ ?>
          </div>
        </div>
				<?php /* .default-portfolio-item - End */ ?>

				<?php /* .default-portfolio-item - Start */ ?>
        <div class="default-portfolio-item mix all material col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
            <figure class="image-box"><img src="{{ asset('images/gallery/21.jpg') }}" alt=""></figure>
            <?php /* .overlay-box - Start */ ?>
            <div class="overlay-box">
              <div class="overlay-inner">
                <div class="content">
	                <a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}" class="link"><span class="fa fa-link"></span></a>
	                <a href="{{ asset('images/gallery/21.jpg') }}" class="lightbox-image link" data-fancybox="images" data-caption="" title=""><span class="icon fa fa-search"></span></a>
	                <h3><a href="{{ route('product.info', ['id'=>1, 'slug' => 'product-title-slug']) }}">Pre Construction</a></h3>
	                <div class="tags">Agriculture, Chemical</div>
              	</div>
              </div>
            </div>
						<?php /* .overlay-box - End */ ?>
          </div>
        </div>
				<?php /* .default-portfolio-item - End */ ?>

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