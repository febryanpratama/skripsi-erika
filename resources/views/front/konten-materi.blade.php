@extends('layouts.front')

@section('content')
<div id="main-wrapper">
    <div class="site-wrapper-reveal">
        <div class="preview-hero-area preview-hero-bg position-relative section-space--ptb_120" style="background: url('{{ asset('') }}landing/assets/images/hero/mitech-landing-main-slider-bg.png');">
            <div class="container-fluid container-fluid--cp-150">
                <div class="row align-items-center mx-auto">
                    <div class="col-lg-12 col-md-12" style="z-index: 999">
                        <div class="card">
                            <div class="card-header text-center">
                                {{-- {{ dd($data) }} --}}
                                <h3>{{ $data->nama_materi }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6 owl-carousel">
                                        @foreach ($data->detail as $item)
                                            <img src="https://dfstudio-d420.kxcdn.com/wordpress/wp-content/uploads/2019/06/digital_camera_photo-980x653.jpg" alt="">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row mt-2 d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <h6>{{ $data->deskripsi }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ url('materi/'.@$item->id.'/konten') }}" class="btn btn-sm btn-outline-success">Coba Quiz</a>
                                <a href="{{ url('materi/'.@$item->id.'/konten') }}" class="btn btn-sm btn-outline-info">Next</a>
                            </div>
                        </div>
                        {{-- <div class="card">
                            <div class="card-header">
                                <h5>{{ @$item->nama_materi }}</h5>
                            </div>
                            <div class="card-body">
                                <p>{{ @$item->deskripsi }}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                            </div>
                        </div> --}}
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