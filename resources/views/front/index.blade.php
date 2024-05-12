@extends('layouts.front')
@section('content')
<div id="main-wrapper">
    <div class="site-wrapper-reveal">
        <div class="preview-hero-area preview-hero-bg position-relative section-space--ptb_120" style="background: url('landing/assets/images/hero/mitech-landing-main-slider-bg.png');">
            <div class="container-fluid container-fluid--cp-150">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        {{-- <img src="{{ asset('') }}images/cai-logo.png" alt="Karikatur Presisi" width="400" class="mb-4 img-fluid" /> --}}
                        <div class="preview-hero-text wow move-up">
                            <h6 class="mb-30">CAI | COMPUTER AIDED INSTRUCTION</h6>
                            <h2 class="font-weight--reguler text-white mb-20"><span class="text-warning">CAI</span> - Aplikasi yang memanfaatkan komputer sebagai alat bantu belajar <span class="text-warning">Sistem Pencernaan Manusia</span></h2>
                            {{-- <i class="text-white" style="font-size: 20px;">Mudah, Cepat dan Transparan</i> --}}
                            <div class="hero-button mt-30">
                                <a href="{{ url('application') }}" class="btn btn--white" >Mulai Aplikasi</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="preview-inner-img">
                            <img class="img-fluid min-img animation_images one wow fadeInDown" src="{{ asset('') }}landing/our-landing.png" width="939" height="696" alt="" />
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