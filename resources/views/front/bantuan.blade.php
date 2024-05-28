@extends('layouts.front')
@section('content')

<div id="main-wrapper">
    <div class="site-wrapper-reveal">
        <!--====================  gradation process area ====================-->
        <div class="gradation-process-area section-space--ptb_100 bg-light" style="padding-bottom: 220px !important;">
            <div class="container-fluid px-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="gradation-title-wrapper section-space--mb_60">
                            <div class="gradation-title-wrap">
                                <h6 class="section-sub-title text-black mb-20">Cara Kerja</h6>
                                <h4 class="heading">Bagaimana cara menggunakan <span class="text-danger">CAI</span></h4>
                            </div>

                            <div class="gradation-sub-heading">
                                <h3 class="heading"><mark>05</mark> Langkah</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12">
                        <div class="ht-gradation style-01">
                            <!-- Single item gradation Start -->
                            <div class="item item-1 animate wow fadeInRight" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInRight;">
                                <div class="line"></div>
                                <div class="circle-wrap">
                                    <div class="mask">
                                        <div class="wave-pulse wave-pulse-1"></div>
                                        <div class="wave-pulse wave-pulse-2"></div>
                                        <div class="wave-pulse wave-pulse-3"></div>
                                    </div>

                                    <h6 class="circle">1</h6>
                                </div>

                                <div class="content-wrap">
                                    <img src="{{ asset('landing/ss1.png') }}" class="img-thumbnail text-center" style="width:50%;heiht:80px" alt="">
                                    <h6 class="heading mt-2">01. Mulai Aplikasi</h6>

                                    <div class="text">Pengguna memulai aplikasi.</div>
                                </div>
                            </div>
                            <!-- Single item gradation End -->

                            <!-- Single item gradation Start -->
                            <div class="item item-1 animate wow fadeInRight" data-wow-delay="0.15s" style="visibility: visible; animation-delay: 0.15s; animation-name: fadeInRight;">
                                <div class="line"></div>
                                <div class="circle-wrap">
                                    <div class="mask">
                                        <div class="wave-pulse wave-pulse-1"></div>
                                        <div class="wave-pulse wave-pulse-2"></div>
                                        <div class="wave-pulse wave-pulse-3"></div>
                                    </div>

                                    <h6 class="circle">2</h6>
                                </div>

                                <div class="content-wrap">
                                    <img src="{{ asset('landing/ss2.png') }}" class="img-thumbnail text-center" style="width:50%;heiht:80px" alt="">

                                    <h6 class="heading mt-2">02. Pilih Materi</h6>

                                    <div class="text">Pengguna memilih menu yang akan dipilih.</div>
                                </div>
                            </div>
                            <!-- Single item gradation End -->

                            <!-- Single item gradation Start -->
                            <div class="item item-1 animate wow fadeInRight" data-wow-delay="0.20s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInRight;">
                                <div class="line"></div>
                                <div class="circle-wrap">
                                    <div class="mask">
                                        <div class="wave-pulse wave-pulse-1"></div>
                                        <div class="wave-pulse wave-pulse-2"></div>
                                        <div class="wave-pulse wave-pulse-3"></div>
                                    </div>

                                    <h6 class="circle">3</h6>
                                </div>

                                <div class="content-wrap">
                                    <img src="{{ asset('landing/ss3.png') }}" class="img-thumbnail text-center" style="width:50%;heiht:80px" alt="">

                                    <h6 class="heading mt-2">03. Mulai Pembelajaran</h6>

                                    <div class="text">Pengguna memulai pembelajaran sesuai dengan materi yang diinginkan.</div>
                                </div>
                            </div>
                            <!-- Single item gradation End -->

                            <!-- Single item gradation Start -->
                            <div class="item item-1 animate wow fadeInRight" data-wow-delay="0.25s" style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInRight;">
                                <div class="line"></div>
                                <div class="circle-wrap">
                                    <div class="mask">
                                        <div class="wave-pulse wave-pulse-1"></div>
                                        <div class="wave-pulse wave-pulse-2"></div>
                                        <div class="wave-pulse wave-pulse-3"></div>
                                    </div>

                                    <h6 class="circle">4</h6>
                                </div>

                                <div class="content-wrap">
                                    <img src="{{ asset('landing/ss4.png') }}" class="img-thumbnail text-center" style="width:50%;heiht:80px" alt="">

                                    <h6 class="heading mt-2">04. Selesaikan Materi Quiz</h6>

                                    <div class="text">Pengguna dapat memulai quiz setelah menyelesaikan pembelajaran materi</div>
                                </div>
                            </div>
                            <!-- Single item gradation End -->

                            <!-- Single item gradation Start -->
                            <div class="item item-1 animate wow fadeInRight" data-wow-delay="0.25s" style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInRight;">
                                <div class="line"></div>
                                <div class="circle-wrap">
                                    <div class="mask">
                                        <div class="wave-pulse wave-pulse-1"></div>
                                        <div class="wave-pulse wave-pulse-2"></div>
                                        <div class="wave-pulse wave-pulse-3"></div>
                                    </div>

                                    <h6 class="circle">5</h6>
                                </div>

                                <div class="content-wrap">
                                    <img src="{{ asset('landing/ss5.png') }}" class="img-thumbnail text-center" style="width:50%;heiht:80px" alt="">

                                    <h6 class="heading mt-2">05. Hasil Pembelajaran Kamu</h6>

                                    <div class="text">Pengguna mendapatkan hasil quiz yang telah dikerjakan.</div>
                                </div>
                            </div>
                            <!-- Single item gradation End -->
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center mt-5 animate wow fadeInBottom" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInRight;">
                            <a href="{{ url('application') }}" class="btn btn-primary" style="background-color: #fc1e86">Kembali Ke Aplikasi</a>
                        </div>
                    </div>
                    <div class="col-lg-8 text-center mt-4">
                        <h4 style="text-transform: capitalize;">aplikasi cai sistem pencernaan pada manusia dibuat sebagai syarat untuk menyelesaikan tugas akhir di untan jurusan informatika.</h4>
                        <br>
                        <h4 style="text-transform: capitalize;color: #fc1e86">Erika oktaviani ( D1042171041)</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row p-0 m-0 pt-3 pb-4" style="box-shadow: 1px -3px 10px 1px rgba(0,0,0,0.1);">
                <div class="col-sm-6 col-md-2 py-2 text-center align-self-center">
                    <a href="http://lpse.polri.go.id/" target="__blank">
                        <img src="https://lpse.lkpp.go.id/eproc4/public/images/imgng/lpse-logo.png" alt="LPSE" width="100">
                    </a>
                </div>
                <div class="col-sm-6 col-md-2 py-2 text-center align-self-center">
                    <a href="http://www.lkpp.go.id/v3/" target="__blank">
                        <img src="http://www.lkpp.go.id/v3/themes/default/assets/images/new_lkpp.png" alt="LKPP" width="100">
                    </a>
                </div>
                <div class="col-sm-6 col-md-2 py-2 text-center align-self-center">
                    <a href="https://sirup.lkpp.go.id/sirup/ro/rekap/klpd/L47" target="__blank">
                        <img src="https://sirup.lkpp.go.id/sirup/public/images/web/logo-header-latihan.png" alt="SIRUP" width="100">
                    </a>
                </div>
                <div class="col-sm-6 col-md-2 py-2 text-center align-self-center">
                    <a href="https://e-katalog.lkpp.go.id/" target="__blank">
                        <img src="https://e-katalog.lkpp.go.id/public/images/nav_logo.png" alt="E-Katalog" width="100">
                    </a>
                </div>
                <div class="col-sm-6 col-md-2 py-2 text-center align-self-center">
                    <a href="https://siukpbj.lkpp.go.id/summary-report/8" target="__blank">
                        <img src="https://siukpbj.lkpp.go.id/uploads/logo/logo.png" alt="UKPBJ" width="100">
                    </a>
                </div>
                <div class="col-sm-6 col-md-2 py-2 text-center align-self-center">
                    <a href="https://sikap.lkpp.go.id/" target="__blank">
                        <img src="https://latihan-lpse.lkpp.go.id/sikaplat/public/img/logo-sikap-v3.png" alt="SIKAP" width="80">
                    </a>
                </div>
            </div> -->
    </div>

    <div class="cta-image-area_one section-space--ptb_100 cta-bg-image_one" id="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-lg-7">
                    <div class="cta-content md-text-center">
                        <h3 class="heading text-white">Mengalami kesulitan saat menggunakan aplikasi <span class="text-color-secondary"> CAI</span>?</h3>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div style="margin-left: 30px;">
                        <h5 class="text-color-secondary">CAI OFFICIAL</h5>
                        <p class="text-white" style="line-height: 21px;">
                            Jl. Timur Kebarat Nomor 2<br />
                            Kota Pontianak<br />
                            Provinsi Kalimantan Barat<br />
                            Email: <a href="mailto:starlabsys.tech@gmail.com" class="text-color-secondary">starlabsys.tech@gmail.com</a><br />
                            Telp: <a href="tel:6288728788" class="text-color-secondary">+6288728788</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#mulai').on('click', function(){
                // $('#navbar').removeClass('hide')
                $('#navigation').css('display', '')
            })
        })
    </script>
@endsection