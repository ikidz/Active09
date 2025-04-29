@if( $banners->count() > 0 )
  <section class="main-slider">
        
    <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
      <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
        <ul>
          @foreach( $banners->get() as $index => $banner )
            @php $index = 1680 + $index; @endphp
            @php $dataIndex = 'rs-'.$index; @endphp
            <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="{{ $dataIndex }}" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/main-slider/image-1.jpg" data-title="Slide Title" data-transition="parallaxvertical">
              @if( $banner->display_img )
                <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ $banner->display_img }}">
              @endif
                        
              <div class="tp-caption" 
              data-paddingbottom="[0,0,0,0]"
              data-paddingleft="[0,0,0,0]"
              data-paddingright="[0,0,0,0]"
              data-paddingtop="[0,0,0,0]"
              data-responsive_offset="on"
              data-type="text"
              data-height="none"
              data-width="['720','720','650','450']"
              data-whitespace="normal"
              data-hoffset="['15','15','15','15']"
              data-voffset="['-100','-110','-70','-75']"
              data-x="['left','left','left','left']"
              data-y="['middle','middle','middle','middle']"
              data-textalign="['top','top','top','top']"
              data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                <h2>{!! $banner->display_title !!}</h2>
              </div>
                      
              <div class="tp-caption tp-resizeme" 
              data-paddingbottom="[0,0,0,0]"
              data-paddingleft="[0,0,0,0]"
              data-paddingright="[0,0,0,0]"
              data-paddingtop="[0,0,0,0]"
              data-responsive_offset="on"
              data-type="text"
              data-height="none"
              data-whitespace="normal"
              data-width="['550','720','650','450']"
              data-hoffset="['15','15','15','15']"
              data-voffset="['30','15','20','5']"
              data-x="['left','left','left','left']"
              data-y="['middle','middle','middle','middle']"
              data-textalign="['top','top','top','top']"
              data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                <div class="text">{!! $banner->display_caption !!}</div>
              </div>

              @if( $banner->buttons->count() > 0 )
                <div class="tp-caption tp-resizeme" 
                data-paddingbottom="[0,0,0,0]"
                data-paddingleft="[0,0,0,0]"
                data-paddingright="[0,0,0,0]"
                data-paddingtop="[0,0,0,0]"
                data-responsive_offset="on"
                data-type="text"
                data-height="none"
                data-width="['720','720','650','450']"
                data-whitespace="normal"
                data-hoffset="['15','15','15','15']"
                data-voffset="['125','110','100','95']"
                data-x="['left','left','left','left']"
                data-y="['middle','middle','middle','middle']"
                data-textalign="['top','top','top','top']"
                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                  @foreach( $banner->buttons as $key => $button )
                    @php $btnClass = ( $key % 2 == 0 ? 'btn-style-one' : 'btn-style-two' ); @endphp
                    <a href="{{ ( $button->display_url ) }}" class="theme-btn {{ $btnClass }}">{{ $button->display_label }}</a>
                  @endforeach
                </div>
              @endif
            </li>
          @endforeach
          <?php /*          
          <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1688" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/main-slider/image-2.jpg" data-title="Slide Title" data-transition="parallaxvertical">
            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('images/main-slider/banner_2.png') }}">
                      
            <div class="tp-caption" 
            data-paddingbottom="[0,0,0,0]"
            data-paddingleft="[0,0,0,0]"
            data-paddingright="[0,0,0,0]"
            data-paddingtop="[0,0,0,0]"
            data-responsive_offset="on"
            data-type="text"
            data-height="none"
            data-width="['720','720','650','450']"
            data-whitespace="normal"
            data-hoffset="['15','15','15','15']"
            data-voffset="['-100','-110','-70','-75']"
            data-x="['left','left','left','left']"
            data-y="['middle','middle','middle','middle']"
            data-textalign="['top','top','top','top']"
            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
              <h2>Get a Solution For <br> All <span class="theme_color">industries</span></h2>
            </div>
            
            <div class="tp-caption tp-resizeme" 
            data-paddingbottom="[0,0,0,0]"
            data-paddingleft="[0,0,0,0]"
            data-paddingright="[0,0,0,0]"
            data-paddingtop="[0,0,0,0]"
            data-responsive_offset="on"
            data-type="text"
            data-height="none"
            data-whitespace="normal"
            data-width="['550','720','650','450']"
            data-hoffset="['15','15','15','15']"
            data-voffset="['30','15','20','5']"
            data-x="['left','left','left','left']"
            data-y="['middle','middle','middle','middle']"
            data-textalign="['top','top','top','top']"
            data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
              <div class="text">We are team of the professionals who will build everything you can draw on a paper</div>
            </div>
            
            <div class="tp-caption tp-resizeme" 
            data-paddingbottom="[0,0,0,0]"
            data-paddingleft="[0,0,0,0]"
            data-paddingright="[0,0,0,0]"
            data-paddingtop="[0,0,0,0]"
            data-responsive_offset="on"
            data-type="text"
            data-height="none"
            data-width="['720','720','650','450']"
            data-whitespace="normal"
            data-hoffset="['15','15','15','15']"
            data-voffset="['125','110','100','95']"
            data-x="['left','left','left','left']"
            data-y="['middle','middle','middle','middle']"
            data-textalign="['top','top','top','top']"
            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
              <a href="about.html" class="theme-btn btn-style-one">Learn More</a> <a href="solutions.html" class="theme-btn btn-style-two">Our Solutions</a>
            </div>
                      
          </li>
          */ ?>
                      
        </ul>
      </div>
    </div>
    
  </section>
@endif