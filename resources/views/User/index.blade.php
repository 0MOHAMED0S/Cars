<x-app-layout>
    {{-- Welcome  --}}
    <section class="slider">
        <div id="rev_slider_2_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="car-dealer-03"
            style="margin:0 auto;background-color:transparent;padding:0;margin-top:0;margin-bottom:0">
            <div id="rev_slider_2_1" class="rev_slider fullwidthabanner" style="display:none" data-version="5.2.6">
                <ul>
                    <li data-index="rs-3" data-transition="random-static,random-premium,random" data-slotamount="default"
                        data-hideafterloop="0" data-hideslideonmobile="off" data-randomtransition="on">
                        <img src="{{ asset('main/images/slider/2.jpg') }}" alt="" />
                        <div class="tp-caption tp-resizeme" id="slide-3-layer-1" data-x="62" data-y="179"
                            data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1500,"frame":"0","from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index:5;white-space:nowrap;font-size:70px;line-height:80px;font-weight:900;color:rgba(255,255,255,1.00);font-family:Roboto;text-transform:uppercase">
                            Are You Ready..
                            <br> For The Race
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <br>
    <br>
    {{-- cars --}}
    <section class="feature-car bg-4 bg-overlay-black-70 page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title">
                        <span class="text-white">Check out our recent cars</span>
                        <h2 class="text-white">Feature Car</h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div style="display: flex;justify-content: center;" class="owl-carousel-1">
                        @if ($cars->isEmpty())
                            <center>
                                <h1>Soon</h1>
                            </center>
                        @else
                            @foreach ($cars as $car)
                                <div class="item">
                                    <div class="car-item text-center">
                                        <div class="car-image">
                                            <img class="img-responsive" src="{{ asset('storage/' . $car->path) }}"
                                                alt="" />
                                            <div class="car-overlay-banner">
                                                <ul>
                                                    <li><a href="{{ route('cars.details', ['id' => $car->id]) }}"><i class="fa fa-link"></i></a></li>
                                                    {{-- <li><a href="#"><i class="fa fa-dashboard"></i></a></li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                        <div  class="car-content">
                                            <a href="{{ route('cars.details',['id' => $car->id]) }}">{{ $car->name }}</a>
                                            <div class="separator"></div>
                                            <div class="price">
                                                {{-- <span class="old-price">$35,568</span> --}}
                                                <span class="new-price">${{ $car->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- testimonials --}}
    <section class="testimonial-1 white-bg page page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title">
                        <span>What Our Happy Clients say about us</span>
                        <h2>our Testimonial</h2>
                        <div class="separator"></div>
                    </div>
                </div>
            </div>
            @if ($testimonials->isEmpty())
                <center>
                    <h1>Soon</h1>
                </center>
            @else
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="owl-carousel-2">
                            @foreach ($testimonials as $testimonial)
                                <div style="min-height: 500px" class="item">
                                    <div style="    min-height: 450px;"
                                        class="testimonial-block text-center border-new">
                                        <div class="testimonial-image">
                                            <img class="img-responsive" src="{{ asset('storage/' . $testimonial->path) }}"
                                                alt="" style="max-width: 100%; max-height: 300px;" />
                                        </div>
                                        <div class="testimonial-box">
                                            <div class="testimonial-avtar">
                                                <img class="img-responsive"
                                                    src="{{ asset('storage/' . $testimonial->path2) }}" alt=""
                                                    style="max-width: 100%; max-height: 100px;" />
                                                <h6>{{ $testimonial->name }}</h6>
                                            </div>
                                            <div class="testimonial-content">
                                                <p>{{ $testimonial->details }}.</p>
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-app-layout>
