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

        <section id="subheader" class="relative jarallax text-black">
            @foreach ($header as $item)
            <img src="{{ asset('images/background/10.webp') }}" class="jarallax-img" alt="">
            <div class="container relative z-index-1000">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="crumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">{{ $item->header }}</li>
                        </ul>
                        <h1>{{ $item->header }}</h1>
                        <p class="col-lg-10 lead">{{ $item->subheader }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </section>

        <section>
            <div class="container">
                <div class="row g-4">

                    <div class="col-lg-12">
                        <div class="row g-4">
                            <!-- product item begin -->
                            @foreach ($produk as $item)
                            <div class="col-xl-3 col-lg-4 col-md-6">
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

    </div>
    <!-- content end -->
    @include('components.footer')
</div>

<!-- Javascript Files
    ================================================== -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/designesia.js') }}"></script>

</body>

</html>