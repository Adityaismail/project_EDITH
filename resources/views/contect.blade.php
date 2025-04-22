<!DOCTYPE html>
<html lang="zxx">

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
            <section id="subheader" class="relative bg-light">
                <div class="container relative z-index-1000">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="crumb">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li class="active">Contact</li>
                            </ul>
                            <h1>Contact</h1>
                            <p class="col-lg-10 lead">Transform Your Garden into a Personal Paradise!</p>
                        </div>
                    </div>
                </div>
                <img src="{{ asset('images/logo-wm.webp') }}" class="abs end-0 bottom-0 z-2 w-20" alt="">
            </section>

            <section>
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h3 class="wow fadeInUp">Send Your Message</h3>

                            <p>Whether you have a question, a suggestion, or just want to say hello, this is the place to do it. Please fill out the form below with your details and message, and we'll get back to you as soon as possible.</p>

                            <div class="spacer-single"></div>

                            <div class="rounded-1 bg-light overflow-hidden">
                                <div class="row g-2">
                                    <div class="col-sm-6">
                                        <div class="auto-height relative" data-bgimage="url({{ asset('images/blog/1.webp') }})"></div>
                                    </div>   
                                    <div class="col-sm-6 relative">
                                        <div class="p-30">
                                            <div class="fw-bold text-dark"><i class="icofont-clock-time me-2 id-color-2"></i>We're Open</div>
                                            Monday - Friday 08.00 - 18.00

                                            <div class="spacer-20"></div>

                                            <div class="fw-bold text-dark"><i class="icofont-location-pin me-2 id-color-2"></i>Office Location</div>
                                            100 S Main St, New York, NY

                                            <div class="spacer-20"></div>

                                            <div class="fw-bold text-dark"><i class="icofont-phone me-2 id-color-2"></i>Call Us Directly</div>
                                            +1 123 456 789

                                            <div class="spacer-20"></div>

                                            <div class="fw-bold text-dark"><i class="icofont-envelope me-2 id-color-2"></i>Send a Message</div>
                                            contact@gardyn.com                                            
                                        </div>
                                    </div>                             
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="p-4 rounded-10px">
                                <form name="contactForm" id="contact_form" class="position-relative z1000" method="post" action="#">
                                    
                                    <div class="field-set">
                                        <input type="text" name="Name" id="name" class="form-control" placeholder="Your Name" required>
                                    </div>

                                    <div class="field-set">
                                        <input type="text" name="Email" id="email" class="form-control" placeholder="Your Email" required>
                                    </div>

                                    <div class="field-set">
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone" required>
                                    </div>

                                    <div class="field-set mb20">
                                        <textarea name="message" id="message" class="form-control" placeholder="Your Message" required></textarea>
                                    </div>
                                    <button type="submit" class="btn-main">Send Message</button>
                                </form>
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
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="{{ asset('js/recaptcha.js') }}"></script>
</body>

</html>