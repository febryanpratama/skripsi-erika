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
                                <div class="row d-flex justify-content-center" >
                                    <div class="col-md-6 owl-carousel d-flex justify-content-center" id="carousel">
                                        {{-- @foreach ($data->detail as $item)
                                            <img src="https://dfstudio-d420.kxcdn.com/wordpress/wp-content/uploads/2019/06/digital_camera_photo-980x653.jpg" alt="">
                                        @endforeach --}}
                                    </div>
                                </div>
                                <div class="row mt-2 d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <p id="deskripsi">
                                            Selamat datang di materi <b>{{ $data->nama_materi }}</b>. Materi ini akan membahas tentang <b>{{ $data->deskripsi }}</b>. Silahkan klik next untuk melanjutkan ke materi selanjutnya.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                {{-- <a href="javascript:;" class="btn btn-sm btn-outline-success" id="back">Back</a> --}}
                                <a href="javascript:;" class="btn btn-sm btn-outline-info" id="next">Next</a>
                                <a href="{{ url('materi/quiz/'.$data->id) }}" class="hide btn btn-sm btn-outline-info" id="btnquiz">Mulai Quiz</a>
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

@section('script')
    <script>
        $(document).ready(function(){
            let konten=[];

            $.ajax({
                url: '{{ url("api/detail-konten/$data->id") }}',
                method: 'GET',
                dataType: 'json', // Change this to the appropriate data type
                success: function(response) {
                    // Handle the successful response here
                    // console.log(response);
                    let resp = response.data

                    konten.push(resp)
                    // console.log(resp)
                    // resp.forEach(element => {
                    //     console.log(element.materi_id)
                    // });
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error(xhr.responseText);
                }
            });

            let index = 0;


            $("#next").on('click', function(event){
                event.preventDefault();

                $('#carousel').html('')

                $('#deskripsi').html(konten[0][index].isi_konten)
                
                let gambar = JSON.parse(konten[0][index].gambar)

                let nextIndex = index+1

                for(let i=0;i < gambar.length; i++){

                    // console.log(i+"index")
                    // console.log(gambar[0].image+"URLINDEX")

                    let url = '{{ asset('') }}gambar_materi/'+gambar[i].image

                    console.log(url)
                    $('#carousel').append(`
                        <img src="`+url+`" style="width: 40%" alt="">
                    `)
                }

                if(index >= konten[0].length-1){
                    // event.preventDefault();
                    $('#next').addClass('hide')
                    $('#btnquiz').removeClass('hide')
                    
                }

                index++
            })

            // $("#back").on('click', function(){

            //     console.log(index+"---")

            //     console.log(konten[0])
            //     index = index-1
            //     console.log(konten[0][index].isi_konten)
            //     // $('#deskripsi').html(konten[0][index].isi_konten)

            // })
            
        })
    </script>
@endsection