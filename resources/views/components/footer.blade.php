<!-- footer begin -->
<footer class="section-dark">
    <div class="container relative z-2">
        <div class="row gx-5">
            <div class="col-lg-4 col-sm-6">
                @foreach ($footer as $item)
                    <img src="{{ asset('storage/' . $item->image_path) }}" class="w-150px" alt="" >
                    <div class="spacer-20"></div>
                    <p>{{ $item->content }}</p>
                @endforeach

                {{-- <div class="social-icons mb-sm-30">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                </div> --}}
            </div>
            <div class="col-lg-4 col-sm-12 order-lg-1 order-sm-2">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="widget">
                            <h5>Navigation</h5>
                            <ul>                                        
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Produk</a></li>
                                <li><a href="#">Gallery</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="widget">
                            <h5>Sosial Media</h5>
                            <table>
                                @foreach ($sosialMedia as $item)
                                    <tr>
                                        <td><a href="{{ $item->url }} " target="_blank"><i class="fa-brands fa-{{ $item->name }} fa-lg me-2"></i></a></td>
                                        <td><a href="{{ $item->url }} " target="_blank">{{ $item->name }}</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 order-lg-2 order-sm-1">
                <div class="widget">
                    @foreach ($operasional as $item)
                        <div class="fw-bold text-white"><i class="icofont-clock-time me-2 id-color-2"></i>Oprasional</div>
                        {{ $item->hari }} | {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                    @endforeach
                    <div class="spacer-15"></div>

                    <div class="fw-bold text-white"><i class="icofont-location-pin me-2 id-color-2"></i>Alamat</div>
                    @foreach ($alamat as $item)
                        {{ $item->alamat }}
                    @endforeach

                    <div class="spacer-15"></div>

                    <div class="fw-bold text-white"><i class="icofont-envelope me-2 id-color-2"></i>Email</div>
                    @foreach ($alamat as $item)
                        {{ $item->email }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="de-flex">
                        @foreach ($footer as $item)
                            <div class="de-flex-col">
                                {{ $item->copyright }}
                            </div>
                        @endforeach
                        <ul class="menu-simple">
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset('images/misc/silhuette-1-black.webp') }}" class="abs bottom-0 op-3" alt="">
</footer>
<!-- footer end -->