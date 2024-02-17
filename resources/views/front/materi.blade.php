@extends('layouts.front')

@section('content')
<div id="main-wrapper">
    <div class="site-wrapper-reveal">
        <div class="preview-hero-area preview-hero-bg position-relative section-space--ptb_120" style="background: url('landing/assets/images/hero/mitech-landing-main-slider-bg.png');">
            <div class="container-fluid container-fluid--cp-150">
                <div class="row align-items-center mx-auto">
                    @foreach ($data as $item)
                        <div class="col-lg-4" style="z-index: 999">
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{ $item->nama_materi }}</h5>
                                </div>
                                <div class="card-body">
                                    <p>{{ $item->deskripsi }}</p>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <a href="{{ url('materi/detail-soal/'.$item->id) }}" class="btn btn-sm btn-outline-primary">Kunjungi Materi</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

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