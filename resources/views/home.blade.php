<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Gardyn — Plants Store</title>
    <link rel="icon" href="{{ asset('images/icon.webp') }}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <meta content="Gardyn — Plants Store" name="description" >
    <meta content="" name="keywords" >
    <meta content="" name="author" >
    <!-- CSS Files
    ================================================== -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/coloring.css') }}" rel="stylesheet" type="text/css" >
    <!-- color scheme -->
    <link id="colors" href="{{ asset('css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css" >

</head>

<body>
    <div id="wrapper">
        <a href="#" id="back-to-top"></a>

        <!-- preloader begin -->
        <div id="de-loader"></div>
        <!-- preloader end -->

        @include('components.header')
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            <section id="section-intro" class="slider-light no-top no-bottom relative overflow-hidden z-1000">
                <div class="v-center relative">
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($slider as $item)
                        <div class="swiper-slide">
                            <div class="swiper-inner jarallax">
                                <img src="{{ asset('images/shop/slider/bg.webp') }}" class="jarallax-img" alt="">
                                <div class="sw-caption z-1000">
                                    <div class="container">
                                        <div class="row g-4 align-items-center justify-content-between">
                                            <div class="spacer-double"></div>
                                            <div class="col-lg-5">     
                                                <div class="spacer-single"></div>
                                                <div class="sw-text-wrapper">
                                                    <div class="subtitle">{{ $item->crumb }}</div>
                                                    <h2 class="slider-title mb-4">{{ $item->judul }}</span></h2>
                                                    <p class="slider-text">{{ $item->subjudul }}</p>
                                                    <div class="d-flex mb-4 slider-extra xs-hide">
                                                        @foreach ($item->sales as $sale)
                                                        <div class="d-inline me-3 w-130px text-center overlay-white-6 p-3 rounded-1">
                                                            <img src="{{ asset('images/shop/svg/coupon-svgrepo-com.svg') }}" class="w-40 mb-1" alt="">
                                                            <h6 class="mb-0">{{ $sale->nama }}</h6>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="btn-main mb10 mb-3" href="#">Explore</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="relative">
                                                    <div class="abs abs-middle bg-blur overlay-white-70 w-250px p-4 rounded-1">
                                                        <h5>{{ $item->nama_produk }}</h5>
                                                        <div class="de-rating-ext">
                                                            <span class="d-stars">
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <img src="{{ asset('storage/'.$item->image_path) }}" class="w-100" alt="">
                                                </div>
                                            </div>
                                            <div class="spacer-single"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                
                        @endforeach
                        <!-- Slides -->                     
                    </div>
                </div>
            </section>

            <section class="pb-0">
                <div class="container">
                    <div class="row g-4">
                        @foreach ($promotion as $item)
                        <div class="col-lg-6">
                            <div class="p-4 h-100 hover" data-bgcolor="#DCE0D9">
                                <div class="row g-4 align-items-center">
                                    <div class="col-md-6">
                                        <img src="{{ asset('storage/'.$item->image_path) }}" class="w-100 hover-scale-1-1" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $item->judul }}</span>
                                        <h3>{{ $item->subjudul }}</h3>
                                        <a class="btn-main bg-color-2" href="{{ route('produk') }}">Explore</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            
            <section>
                <div class="container">
                    <div class="row g-4 mb-4">
                        <div class="col-lg-12">
                            <div class="owl-custom-nav menu-" data-target="#new-arrivals-carousel">
                                <div class="d-flex justify-content-between">
                                    <h3 class="text-uppercase mb-4">Best Seller</h3>
                                    <div class="arrow-simple">
                                        <a class="btn-prev"></a> 
                                        <a class="btn-next"></a>
                                    </div>
                                </div>

                                <div id="new-arrivals-carousel" class="owl-carousel owl-4-cols">
                                    <!-- product item begin -->
                                    @foreach ($bestSeller as $item)
                                    <div class="item">
                                        <div class="de__pcard text-center">
                                            <div class="atr__images">
                                                <div class="atr__promo">
                                                    {{ $item->kategori->nama_kategori }}
                                                </div>
                                                <a href="#">
                                                    <img class="atr__image-main" src="{{ asset('storage/'.$item->image_path) }}">
                                                    <img class="atr__image-hover" src="{{ asset('storage/'.$item->image_path) }}">
                                                </a>
                                                <div class="atr__extra-menu">
                                                    <div class="atr__quick-view"><i class="icon_zoom-in_alt"></i></div>
                                                    <div class="atr__add-cart"><i class="icon_cart_alt"></i></div>
                                                    <div class="atr__wish-list"><i class="icon_heart_alt"></i></div>
                                                </div>
                                            </div>

                                            <div class="de-rating-ext">
                                                <span class="d-stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </div>

                                            <h3>{{ $item->nama }}</h3>
                                            <div class="atr__main-price">
                                                Rp. {{ number_format($item->harga, 0, ',', '.') }}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- product item end -->
                            </div>

                        </div>
                    </div>
                    
                </div>
            </section>

            <section class="bg-light">
                <div class="container">
                    <div class="row g-4 mb-4">
                        <div class="col-lg-12">
                            <div class="owl-custom-nav menu-" data-target="#today-deals-carousel">
                                <div class="d-flex justify-content-between">
                                    <h3 class="text-uppercase mb-4">New Produk</h3>
                                    <div class="arrow-simple">
                                        <a class="btn-prev"></a> 
                                        <a class="btn-next"></a>
                                    </div>
                                </div>

                                <div id="today-deals-carousel" class="owl-carousel owl-4-cols">

                                    <!-- product item begin -->
                                    @foreach ($newProduk as $item)
                                    <div class="item">
                                        <div class="de__pcard text-center">
                                            <div class="atr__images">
                                                <div class="atr__promo">
                                                    {{ $item->kategori->nama_kategori }}
                                                </div>
                                                <a href="#">
                                                    <img class="atr__image-main" src="{{ asset('storage/'.$item->image_path) }}">
                                                    <img class="atr__image-hover" src="{{ asset('storage/'.$item->image_path) }}">
                                                </a>
                                                <div class="atr__extra-menu">
                                                    <div class="atr__quick-view"><i class="icon_zoom-in_alt"></i></div>
                                                    <div class="atr__add-cart"><i class="icon_cart_alt"></i></div>
                                                    <div class="atr__wish-list"><i class="icon_heart_alt"></i></div>
                                                </div>
                                            </div>

                                            <div class="de-rating-ext">
                                                <span class="d-stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </div>

                                            <h3>{{ $item->nama }}</h3>
                                            <div class="atr__main-price">
                                                Rp. {{ number_format($item->harga, 0, ',', '.') }}
                                            </div>
                                            
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- product item end -->
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </section>            

            <section class="jarallax">
                <img src="{{ asset('images/background/7.webp') }}" class="jarallax-img" alt="">
                <div class="container relative z-2">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="owl-carousel owl-theme wow fadeInUp" id="testimonial-carousel">
                                @foreach ($feedback as $item)
                                <div class="item">
                                    <div class="bg-light relative p-4">
                                        <i class="icofont-quote-right abs top-0 end-0 fs-32 m-4 id-color-2"></i>
                                        <div class="relative">
                                            <img class="relative z-2 w-60px circle" alt="" src="{{ asset('storage/'.$item->image_path) }}">
                                        </div>
                                        <div class="mt-3 fw-600">{{ $item->nama }}</div>
                                        <div class="de-rating-ext mb-3">
                                            <span class="d-stars">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </span>
                                        </div>
                                        <p>"{{ $item->message }}"</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="row g-4 mb-4">
                        <div class="col-lg-12">
                            <div class="owl-custom-nav menu-" data-target="#best-seller-carousel">
                                <div class="d-flex justify-content-between">
                                    <h3 class="text-uppercase mb-4">Promo</h3>
                                    <div class="arrow-simple">
                                        <a class="btn-prev"></a> 
                                        <a class="btn-next"></a>
                                    </div>
                                </div>

                                <div id="best-seller-carousel" class="owl-carousel owl-4-cols">
                                    <!-- product item begin -->
                                    @foreach ($promo as $item)
                                    <div class="item">
                                        <div class="de__pcard text-center">
                                            <div class="atr__images">
                                                <div class="atr__promo">
                                                    {{ $item->kategori->nama_kategori }}
                                                </div>
                                                <a href="#">
                                                    <img class="atr__image-main" src="{{ asset('storage/'.$item->image_path) }}">
                                                    <img class="atr__image-hover" src="{{ asset('storage/'.$item->image_path) }}">
                                                </a>
                                                <div class="atr__extra-menu">
                                                    <div class="atr__quick-view"><i class="icon_zoom-in_alt"></i></div>
                                                    <div class="atr__add-cart"><i class="icon_cart_alt"></i></div>
                                                    <div class="atr__wish-list"><i class="icon_heart_alt"></i></div>
                                                </div>
                                            </div>

                                            <div class="de-rating-ext">
                                                <span class="d-stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </span>
                                            </div>

                                            <h3>{{ $item->nama }}</h3>
                                            <div class="atr__main-price">
                                                Rp. {{ number_format($item->harga, 0, ',', '.') }}
                                            </div>
                                            
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- product item end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="jarallax">
                <img src="{{ asset('images/shop/slider/bg.webp') }}" class="jarallax-img" alt="">
                <div class="container">
                    <div class="row g-4 align-items-center justify-content-between">
                        @foreach ($banner as $item)
                        <div class="col-lg-5">     
                            <div class="sw-text-wrapper">
                                <div class="subtitle">{{ $item->text }}</div>
                                <h2 class="mb-2">{{ $item->header }}</h2>
                                <p>{{ $item->subheader }}</p>
                                <a class="btn-main mb10 mb-3" href="{{ route('produk') }}">Explore</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="relative">
                                <img src="{{ asset('storage/'.$item->image_path) }}" class="w-100" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

    </div>
    <!-- content end -->
    
    @include('components.footer')
</div>

<!-- Javascript Files
    ================================================== -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/designesia.js') }}"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
    <script src="{{ asset('js/custom-marquee.js') }}"></script>
    <script src="{{ asset('js/custom-swiper-2.js') }}"></script>

</body>

</html>