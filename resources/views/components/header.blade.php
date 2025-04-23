<!-- header begin -->
<header class="header-light transparent">
    <div id="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between xs-hide">
                        <div class="d-flex">
                            @foreach ($operasional as $item)
                                <div class="topbar-widget me-3"><a href="#"><i class="fa-classic fa-clock"></i>{{ $item->hari }} | {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}</a></div>
                            @endforeach
                            @foreach ($alamat as $item)
                                <div class="topbar-widget me-3"><a href="#"><i class="fa-classic fa-map"></i>{{ $item->alamat }}</a></div>
                            @endforeach
                            @foreach ($alamat as $item)
                                <div class="topbar-widget me-3"><a href="#"><i class="fa-classic fa-envelope"></i>{{ $item->email }}</a></div>
                            @endforeach
                        </div>

                        <div class="d-flex">
                            @foreach ($sosialMedia as $item)
                            <div class="social-icons">
                                <a href="{{ $item->url }}" target="_blank"><i class="fa-brands fa-{{ $item->name }} fa-lg"></i></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <!-- logo begin -->
                        @foreach ($alamat as $item)
                        <div id="logo">
                            <a href="#">
                                <img class="logo-main" src="{{ asset('storage/' . $item->image_path) }}" alt="" >
                                <img class="logo-scroll" src="{{ asset('storage/' . $item->image_path) }}" alt="" >
                                <img class="logo-mobile" src="{{ asset('storage/' . $item->image_path) }}" alt="" >
                            </a>
                        </div>
                        @endforeach
                        <!-- logo end -->
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <!-- mainemenu begin -->
                        <ul id="mainmenu">
                            <li><a class="menu-item" href="{{ route('home') }}">Home</a></li>
                            <li><a class="menu-item" href="{{ route('produk') }}">Produk</a></li>
                            <li><a class="menu-item" href="{{ route('gallery') }}">Gallery</a></li>
                            <li><a class="menu-item" href="{{ route('tentang') }}">Tentang Kami</a></li>
                        </ul>
                        <!-- mainmenu end -->
                    </div>
                    <div class="de-flex-col">
                        <div class="menu_side_area">          
                            <a href="{{ route('produk') }}" class="btn-main btn-sm">Explore</a>
                        </div>
                        <span id="menu-btn"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->