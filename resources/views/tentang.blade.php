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
                            <a class="btn-main wow fadeInUp" href="#" data-wow-delay=".6s">Lihat Gallery</a>
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
                <img src="{{ asset('images/background/4.webp') }}" class="jarallax-img" alt="">
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

                                <div class="item">
                                    <i class="icofont-quote-left fs-40 mb-4 wow fadeInUp id-color-2"></i>
                                    <h3 class="mb-4 wow fadeInUp fs-32">Experience unparalleled luxury and personalized service at Gardyn Hotel, where every stay is a journey into sophistication, comfort, and 
                                    unforgettable memories.</h3>
                                    <img src="{{ asset('images/testimonial/1.webp') }}" class="circle w-80px mb-3" alt="">
                                    <div class="wow fadeInUp">Donette Fondren</div>
                                </div>

                                <div class="item">
                                    <i class="icofont-quote-left fs-40 mb-4 wow fadeInUp id-color-2"></i>
                                    <h3 class="mb-4 wow fadeInUp fs-32">Experience unparalleled luxury and personalized service at Gardyn Hotel, where every stay is a journey into sophistication, comfort, and 
                                    unforgettable memories.</h3>
                                    <img src="{{ asset('images/testimonial/1.webp') }}" class="circle w-80px mb-3" alt="">
                                    <div class="wow fadeInUp">Donette Fondren</div>
                                </div>

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
                            <div class="subtitle wow fadeInUp">Why Choose Us</div>
                            <h2 class="text-uppercase wow fadeInUp" data-wow-delay=".2s">Our Commitment to <span class="id-color-2">Excellence</span></h2>
                        </div>                        
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('images/logo-icon.webp') }}" class="w-50px mb-3" alt="">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">01</div>
                                <div>
                                    <h4>Expertise and Experience</h4>
                                    <p class="mb-0">With years of hands-on experience, our team of professional gardeners and landscapers bring a wealth of knowledge to every project.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('images/logo-icon.webp') }}" class="w-50px mb-3" alt="">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">02</div>
                                <div>
                                    <h4>Personalized Service</h4>
                                    <p class="mb-0">We believe that every garden is unique, just like its owner. We take the time to understand your vision, preferences, and the specific needs.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color text-light padding30 rounded-1">
                                <img src="{{ asset('images/logo-icon.webp') }}" class="w-50px mb-3" alt="">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">03</div>
                                <div>
                                    <h4>Comprehensive Solutions</h4>
                                    <p class="mb-0">From garden design and installation to regular maintenance and specialty services, we offer a full range of garden services.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color-2 text-light padding30 rounded-1">
                                <img src="{{ asset('images/logo-icon.webp') }}" class="w-50px mb-3" alt="">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">04</div>
                                <div>
                                    <h4>Quality Workmanship</h4>
                                    <p class="mb-0">Our commitment to quality is evident in every service we provide. We use only the best materials, plants, and tools to your garden.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color-2 text-light padding30 rounded-1">
                                <img src="{{ asset('images/logo-icon.webp') }}" class="w-50px mb-3" alt="">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">05</div>
                                <div>
                                    <h4>Eco-Friendly Practices</h4>
                                    <p class="mb-0">We are dedicated to environmentally sustainable practices. Our organic gardening methods, water-wise landscaping, and  waste management.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="relative h-100 bg-color-2 text-light padding30 rounded-1">
                                <img src="{{ asset('images/logo-icon.webp') }}" class="w-50px mb-3" alt="">
                                <div class="abs m-3 top-0 end-0 p-2 rounded-2 mb-3">06</div>
                                <div>
                                    <h4>Satisfaction Guarantee</h4>
                                    <p class="mb-0">Our top priority is your satisfaction. We take pride in our work, and our many happy customers are a testament to the quality and care.</p>
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