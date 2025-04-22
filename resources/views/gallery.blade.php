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
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="css/plugins.css" rel="stylesheet" type="text/css" >
    <link href="css/style.css" rel="stylesheet" type="text/css" >
    <link href="css/coloring.css" rel="stylesheet" type="text/css" >
    <!-- color scheme -->
    <link id="colors" href="css/colors/scheme-01.css" rel="stylesheet" type="text/css" >

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

            <section class="relative">
                <div class="container">
                    <div class="row g-4">
                        @foreach ($gallery as $item)
                        <div class="col-lg-4 text-center">
                            <a href="{{ asset('storage/'.$item->image_path) }}" class="image-popup d-block hover">
                                <div class="relative overflow-hidden rounded-10">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div> 
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="{{ asset('storage/'.$item->image_path) }}" class="img-fluid hover-scale-1-2" alt="">
                                    <div class="absolute bottom-0 left-0 w-100 p-3 text-start text-white" style="background-color: transparent;">
                                        <p class="mb-0">Informasi :</p>
                                        <p class="mb-0">{{ $item->information }}</p>
                                        <p class="mb-0">{{ $item->location }}</p>
                                        <p class="mb-0">{{ $item->created_at->format('d F Y') }}</p>
                                    </div>
                                </div>
                            </a>
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

</body>

</html>