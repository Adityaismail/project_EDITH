<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gardyn — Garden and Landscape Website Template</title>
    <link rel="icon" href="{{ asset('images/icon.webp') }}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <meta content="Gardyn — Garden and Landscape Website Template" name="description" >
    <meta content="" name="keywords" >
    <meta content="" name="author" >
    <!-- CSS Files
    ================================================== -->

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet" type="text/css" >
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
                <img src="{{ asset('images/background/10.webp') }}" class="jarallax-img" alt="">
                <div class="container relative z-index-1000">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="crumb">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li class="active">Tentang Kami</li>
                            </ul>
                            <h1>Tentang Kami</h1>
                            <p class="col-lg-10 lead">Transform Your Garden into a Personal Paradise!</p>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container relative z-1">
                    <div class="row g-4 gx-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="subtitle wow fadeInUp mb-3">Story</div>
                            <h2 class=" wow fadeInUp" data-wow-delay=".2s">Crafting Beautiful Gardens Since '99</h2>
                            <p class="wow fadeInUp">Established in 1999, our garden service has been transforming outdoor spaces into thriving, beautiful landscapes for over two decades. With a commitment to quality and personalized care, our experienced team offers a full range of services, from design to maintenance, ensuring your garden flourishes in every season.</p>
                            <a class="btn-main wow fadeInUp" href="#" data-wow-delay=".6s">Lihat</a>
                        </div>

                        <div class="col-lg-6">
                            <div class="row g-4">
                                <div class="col-sm-6">
                                    <div class="row g-4">
                                        <div class="col-lg-12">
                                            <img src="{{ asset('images/misc/3.webp') }}" class="w-100 rounded-1 wow zoomIn" alt="">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="rounded-1 relative bg-color-2 text-light p-4">
                                                <img src="{{ asset('images/icons/tree.png') }}" class="abs abs-middle w-60px" alt="">
                                                <div class="de_count ps-80 wow fadeInUp">
                                                    <h2 class="mb-0 fs-32"><span class="timer" data-to="2025" data-speed="3000"></span></h2>
                                                    <span class="op-7">Tahun Berdiri</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row g-4">
                                        <div class="col-lg-12">
                                            <div class="rounded-1 relative bg-color-2 text-light p-4">
                                                <img src="{{ asset('images/icons/happy.png') }}" class="abs abs-middle w-60px" alt="">
                                                <div class="de_count ps-80 wow fadeInUp">
                                                    <h2 class="mb-0 fs-32"><span class="timer" data-to="850" data-speed="3000"></span>+</h2>
                                                    <span class="op-7">Pelanggan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <img src="{{ asset('images/misc/4.webp') }}" class="w-100 rounded-1 wow zoomIn" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>

            <section class="jarallax">
                <img src="{{ asset('images/shop/slider/bg.webp') }}" class="jarallax-img" alt="">
                <div class="container relative z-2">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 text-center">
                            <div class="owl-single-dots owl-carousel owl-theme">
                                <div class="item">
                                    <i class="icofont-quote-left fs-40 mb-4 wow fadeInUp id-color-2"></i>
                                    <h3 class="mb-4 wow fadeInUp fs-32">Experience unparalleled luxury and personalized service at Gardyn Hotel, where every stay is a journey into sophistication, comfort, and 
                                    unforgettable memories.</h3>
                                    <img src="{{ asset('images/testimonial/1.webp') }}" class="circle w-80px mb-3" alt="">
                                    <div class="wow fadeInUp">Donette Fondren</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="row g-4 mb-3 align-items-center justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2 class="fadeInUp" data-wow-delay=".2s">Komitmen Kami untuk <span class="id-color-2">Menjaga Keindahan</span></h2>
                        </div>                        
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('images/logo-icon.webp') }}" class="w-50px mb-3" alt="">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">01</div>
                                <div>
                                    <h4>Keahlian dan Pengalaman</h4>
                                    <p class="mb-0">Dengan pengalaman tahunan, tim profesional kami yang berpengalaman membawa kekayaan pengetahuan ke setiap proyek.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('images/logo-icon.webp') }}" class="w-50px mb-3" alt="">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">02</div>
                                <div>
                                    <h4>Layanan Personalisasi</h4>
                                    <p class="mb-0">Kami percaya bahwa setiap taman adalah unik, seperti pemiliknya. Kami mengambil waktu untuk memahami visi, preferensi, dan kebutuhan spesifik Anda.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('images/logo-icon.webp') }}" class="w-50px mb-3" alt="">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">03</div>
                                <div>
                                    <h4>Solusi Komprehensif</h4>
                                    <p class="mb-0">Dari desain dan instalasi taman hingga perawatan rutin dan layanan khusus, kami menawarkan berbagai layanan taman.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('images/logo-icon.webp') }}" class="w-50px mb-3" alt="">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">04</div>
                                <div>
                                    <h4>Kualitas Pekerjaan</h4>
                                    <p class="mb-0">Komitmen kami pada kualitas terlihat dalam setiap layanan yang kami berikan. Kami menggunakan bahan terbaik, tanaman, dan alat untuk taman Anda.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('images/logo-icon.webp') }}" class="w-50px mb-3" alt="">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">05</div>
                                <div>
                                    <h4>Praktik Ramah Lingkungan</h4>
                                    <p class="mb-0">Kami berkomitmen pada praktik yang ramah lingkungan. Metode pertanian organik kami, pengaturan lahan yang hemat air, dan pengelolaan sampah.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('images/logo-icon.webp') }}" class="w-50px mb-3" alt="">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">06</div>
                                <div>
                                    <h4>Garansi Kepuasan</h4>
                                    <p class="mb-0">Prioritas utama kami adalah kepuasan Anda. Kami bangga dengan pekerjaan kami, dan banyak pelanggan yang senang adalah bukti kualitas dan perhatian.</p>
                                </div>
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