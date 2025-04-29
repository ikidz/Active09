<div class="news-block-two">
    <div class="inner-box">
        <div class="row clearfix">
            <div class="image-column col-lg-5 col-md-6 col-sm-12">
                @if( $article->display_thumb )
                    <div class="image">
                        <a href="{{ route('article.info', ['id' => $article->id]) }}">
                            <img src="{{ $article->display_thumb }}" alt="" />
                        </a>
                    </div>
                @endif
            </div>
            <div class="content-column col-lg-7 col-md-6 col-sm-12">
                <div class="inner-column">
                    <h3><a href="{{ route('article.info', ['id' => $article->id]) }}">{{ $article->display_title }}</a></h3>
                    <div class="text">{{ $article->display_caption }}</div>
                    <ul class="post-meta">
                        <li><span class="icon fa fa-calendar"></span>{{ $article->display_post_date }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>