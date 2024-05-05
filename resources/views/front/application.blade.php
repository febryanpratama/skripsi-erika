@extends('layouts.front')
@section('content')
<div id="main-wrapper">
    <div class="site-wrapper-reveal" >
        <div class="preview-hero-area preview-hero-bg position-relative section-space--ptb_120" style="background: url('landing/assets/images/hero/mitech-landing-main-slider-bg.png');z-index:999">
            <div class="container-fluid container-fluid--cp-150" style="z-index: 999">
                <div class="row align-items-center d-flex justify-content-center" style="z-index: 999">
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-4 one wow fadeInLeft" style="z-index: 999">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <span><i class="fas fa-book fa-lg" style="color:red"></i></span>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h3>MATERI</h3>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <a href="{{ url('materi') }}">
                                    <button class="btn btn-sm btn-outline-info">Selanjutnya</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-4 one wow fadeInLeft" style="z-index: 999">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <span><i class="fas fa-feather fa-lg" style="color:red"></i></span>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h3>QUIZ</h3>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <a href="{{ url('quiz') }}">
                                    <button class="btn btn-sm btn-outline-info">Selanjutnya</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-4 one wow fadeInLeft" style="z-index: 999">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <span><i class="fas fa-question-circle fa-lg" style="color:red"></i></span>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h3>BANTUAN</h3>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <a href="{{ url('bantuan') }}">
                                    <button class="btn btn-sm btn-outline-info">Selanjutnya</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-4 one wow fadeInLeft" style="z-index: 999">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <span><i class="fas fa-bell fa-lg" style="color:red"></i></span>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h3>TENTANG APLIKASI</h3>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <a href="{{ url('tentang-aplikasi') }}">
                                    <button class="btn btn-sm btn-outline-info">Selanjutnya</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <img class="img-fluid pe-img-01 animation_images two wow fadeInDown" src="{{ asset('') }}landing/assets/images/hero/mitech-landing-main-slider-slide-01-image-01.webp" width="337" height="383" alt="" />
                <img class="img-fluid pe-img-02 animation_images two wow fadeInDown hide-in-mobile" src="{{ asset('') }}landing/assets/images/hero/mitech-landing-main-slider-slide-01-image-02.webp" width="119" height="184" alt="" />
                <img class="img-fluid pe-img-03 animation_images two wow fadeInDown" src="{{ asset('') }}landing/assets/images/hero/mitech-landing-main-slider-slide-01-image-03.webp" width="360" height="435" alt="" />
                <img class="img-fluid pe-img-04 animation_images two wow fadeInDown" src="{{ asset('') }}landing/assets/images/hero/mitech-landing-main-slider-slide-01-image-05.webp" width="356" height="68" alt="" />
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