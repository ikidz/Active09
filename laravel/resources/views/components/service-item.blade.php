<div class="services-block col-lg-4 col-md-6 col-sm-12">
    <div class="inner-box">
        <?php /*
        <div class="upper-box">
            <span class="icon d-flex align-items-center justify-content-center">
                {!! data_get( $service->category, 'icon' ) !!}
            </span>
            <h3>
                <a href="{{ route('service.index', ['id' => data_get( $service->category, 'id' )] ) }}">
                    {{ data_get( $service->category, 'display_name' ) }}
                </a>
            </h3>
        </div>
        */ ?>
        <div class="lower-box">
            <div class="image">
                @if( $service->display_img )
                    <img src="{{ $service->display_img }}" alt="" />
                @endif
                <div class="overlay-box">
                    <div class="text">{{ $service->display_title }}</div>
                    <?php /*
                    <a href="{{ route('service.info', ['id' => data_get( $service, 'id' )] ) }}" class="link-btn"><span class="fa fa-link"></span></a>
                    */ ?>
                </div>
            </div>
        </div>
    </div>
</div>