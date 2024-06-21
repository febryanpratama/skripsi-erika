@extends('layouts.front')

@section('content')
<div id="main-wrapper" style="height: 100%;background: url('{{ asset('') }}landing/assets/images/hero/mitech-landing-main-slider-bg.png">
    <div class="site-wrapper-reveal">
        <div class="preview-hero-area preview-hero-bg position-relative section-space--ptb_120" style="background: url('{{ asset('') }}landing/assets/images/hero/mitech-landing-main-slider-bg.png');height: 100%">
            <div class="container-fluid ">
                <div class="row align-items-center mx-auto">
                    <div class="col-lg-12 col-md-12" style="z-index: 999;">
                        <div class="card">
                            <div class="card-header text-center">
                                {{-- {{ dd($data) }} --}}
                                <h3>{{ $data->nama_materi }}</h3>
                            </div>
                            <div class="card-body">
                                
                                <div class="row mt-2 d-flex justify-content-center">
                                    <div class="col-md-8">
                                        
                                        <p id="deskripsi" class="text-center">
                                            <span class="text-center" style="text-align: center;font-size: 1.5rem">
                                                Selamat datang di materi <b>{{ $data->nama_materi }}</b>.<br><br> Materi ini akan membahas tentang <b>{{ $data->deskripsi }}</b> <br><br>  Silahkan klik next untuk melanjutkan ke materi selanjutnya.
                                            </span>
                                        </p>
                                        {{-- <span class="audioo hide">
                                            <audio controls>
                                                <source src="" type="audio/mpeg">
                                            </audio>
                                        </span> --}}
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center" >
                                    <div class="col-md-6 owl-carousel d-flex justify-content-center" id="carousel">
                                        {{-- Carousel --}}
                                    </div>
                                    <span class="audioo hide">
                                        <audio controls>
                                            <source src="" type="audio/mpeg">
                                        </audio>
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end" id="cardfooter">
                                <a href="javascript:;" class="btn btn-sm btn-outline-success hide" id="back">Back</a>
                                <a href="javascript:;" class="btn btn-sm btn-outline-info hide" id="next">Next</a>
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

            setTimeout(() => {
                $('#next').removeClass('hide')
            }, 5000);

            let konten=[];

            $.ajax({
                url: '{{ url("api/detail-konten/$data->id") }}',
                method: 'GET',
                dataType: 'json', // Change this to the appropriate data type
                success: function(response) {
                    // Handle the successful response here
                    console.log(response);
                    let resp = response.data

                    konten.push(resp)
                    // console.log(resp)
                    // resp.forEach(element => {
                    //     console.log(element.materi_id)
                    // });

                    // console.log(konten)
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error(xhr.responseText);
                }
            });

            let index = 0;


            $("#next").on('click', function(event){
            // console.log(konten[0][index])
                
            // console.log(index+"index")
            event.preventDefault();
            if (index == 1) {
                $('#back').removeClass('hide')
                
                $('#cardfooter').removeClass('justify-content-end')
                $('#cardfooter').addClass('justify-content-between')
            }

                // $('.audioo').removeClass('hide')
                if(konten[0][index].voice != null){
                    console.log(konten[0][index].voice)
                    $('.audioo').removeClass('hide')
                    $('audio').attr('src', '{{ asset('') }}voice_materi/'+konten[0][index])
                }else{
                    $('.audioo').addClass('hide')
                }
                $('#deskripsi').removeClass('text-center')

                $('#carousel').html('')

                $('#deskripsi').html(konten[0][index].isi_konten)
                $('audio').attr('src', '{{ asset('') }}voice_materi/'+konten[0][index].voice)
                
                let gambar = JSON.parse(konten[0][index].gambar)

                let nextIndex = index+1

                for(let i=0;i < gambar.length; i++){
                    
                    let extension = gambar[i].image.split('.').pop()

                    if(extension == 'mp4'){
                        let url = '{{ asset('') }}gambar_materi/'+gambar[i].image

                        $('#carousel').append(`
                            <video width="700" height="550" autoplay loop>
                                <source src="`+url+`" type="video/mp4" >
                                Your browser does not support the video tag.
                            </video>
                        `)
                    }else{

                        let url = '{{ asset('') }}gambar_materi/'+gambar[i].image
    
    
                        $('#carousel').append(`
                            <img src="`+url+`" style="width: 40%" alt="">
                        `)
                    }

                }

                if(index >= konten[0].length-1){
                    // event.preventDefault();
                    $('#next').addClass('hide')
                    $('#btnquiz').removeClass('hide')
                    
                }

                index++
            })

            $("#back").on('click', function(){

                if (index == 1) {
                    $('#back').addClass('hide')
                    
                    $('#cardfooter').removeClass('justify-content-between')
                    $('#cardfooter').addClass('justify-content-end')
                }

                console.log(index+"index")

                let getIndex = index

                console.log(getIndex+"getindex")

                let rilIndex = getIndex-1
                index = rilIndex
                // console.log(rilIndex+"rilindex")

                // index = index-1
                console.log(konten[0][rilIndex].isi_konten)
                $('#deskripsi').html(konten[0][rilIndex].isi_konten)

                $('#carousel').html('')

                $('#deskripsi').html(konten[0][rilIndex].isi_konten)
                if(konten[0][rilIndex].voice != null){
                    $('.audioo').removeClass('hide')
                    $('audio').attr('src', '{{ asset('') }}voice_materi/'+konten[0][rilIndex].voice)
                }
                
                let gambar = JSON.parse(konten[0][rilIndex].gambar)

                let nextIndex = index+1

                for(let i=0;i < gambar.length; i++){
                    
                    let extension = gambar[i].image.split('.').pop()

                    if(extension == 'mp4'){
                        let url = '{{ asset('') }}gambar_materi/'+gambar[i].image

                        $('#carousel').append(`
                            <video width="700" height="550" autoplay loop>
                                <source src="`+url+`" type="video/mp4" >
                                Your browser does not support the video tag.
                            </video>
                        `)
                    }else{

                        let url = '{{ asset('') }}gambar_materi/'+gambar[i].image
    
    
                        $('#carousel').append(`
                            <img src="`+url+`" style="width: 40%" alt="">
                        `)
                    }

                }
            })
            
        })
    </script>
@endsection