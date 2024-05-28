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
                                <h3 id="title">Quiz Id</h3>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center" >
                                    <div class="col-md-6 owl-carousel d-flex justify-content-center" id="carousel">
                                        {{-- @foreach ($data->detail as $item)
                                            <img src="https://dfstudio-d420.kxcdn.com/wordpress/wp-content/uploads/2019/06/digital_camera_photo-980x653.jpg" alt="">
                                        @endforeach --}}
                                    </div>
                                </div>
                                <div class="row mt-2 d-flex justify-content-center" id="jawaban">
                                    <div class="col-md-8">
                                        <h6 id="deskripsi">
                                            Selamat datang di materi <b>Quiz</b>. Materi ini akan membahas tentang <b>Quiz</b>. Silahkan klik next untuk melanjutkan ke materi selanjutnya.<br><br>
                                            Rules. Anda Tidak dapat mengulangi pertanyaan sebelumnya. Jika anda melakukan hal tersebut, maka seluruh jawaban yang telah anda simpan akan direset dan memulai kembali dari awal. Beware !!!
                                        </h6>
                                    </div>
                                </div>

                                {{-- <div class="row mt-2 d-flex justify-content-center" id="jawaban">
                                    <div class="col-md-8 col-xs-offset-1">
                                        <div class="radio">
                                            <label class="d-flex">
                                                <input type="radio" name="jawaban_materi" class="radioCheck" onclick="getJawaban(1,1)" style="margin-right: 20px" value="1" id="rdo_pick">
                                                <h6>Jawaban 1</h6>
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label class="d-flex">
                                                <input type="radio" name="jawaban_materi" class="radioCheck" onclick="getJawaban(1,2)" style="margin-right: 20px" value="2" id="rdo_pick">
                                                <h6>Jawaban 2</h6>
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label class="d-flex">
                                                <input type="radio" name="jawaban_materi" class="radioCheck" onclick="getJawaban(1,7)" style="margin-right: 20px" value="7" id="rdo_pick">
                                                <h6>Jawaban 3</h6>
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label class="d-flex">
                                                <input type="radio" name="jawaban_materi" class="radioCheck" onclick="getJawaban(1,8)" style="margin-right: 20px" value="8" id="rdo_pick">
                                                <h6>Jawaban 4</h6>
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row mt-2 d-flex justify-content-center" id="truejawaban">
                                    
                                </div>

                                
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="javascript:;" class="btn btn-sm btn-outline-success hide" id="back">Back</a>
                                <a href="javascript:;" class="btn btn-sm btn-outline-info " id="mulai">Mulai</a>
                                <a href="javascript:;" class="btn btn-sm btn-outline-info hide" id="next">Selanjutnya</a>
                                <a href="javascript:;" class="btn btn-sm btn-outline-info hide" id="selesai">Hitung Score Anda</a>
                                <a href="{{ url('/') }}" class="btn btn-sm btn-outline-info hide" id="beranda">Kembali Ke Beranda</a>
                                {{-- <a href="{{ url('materi/quiz/'.$data->id) }}" class="hide btn btn-sm btn-outline-info" id="btnquiz">Mulai Quiz</a> --}}
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
            let quiz = []

            let respArray = []

            // console.log(respArray)

            $.ajax({
                url: '{{ url("api/get-quiz-non") }}',
                method: 'GET',
                dataType: 'json', // Change this to the appropriate data type
                success: function(response) {
                    // Handle the successful response here
                    // console.log(response);
                    let resp = response.data


                    // console.log(resp)
                    // Shuffle Random Logic
                    resp.sort(()=>{
                        const randomTrueOrFalse = Math.random() > 0.5;
                        return randomTrueOrFalse ? 1:-1
                    })

                    // console.log(resp[0])

                    respArray.push(resp)
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error(xhr.responseText);
                }
            });

            let indexData = 0

            $('#mulai').on('click', function(e){
                $('#truejawaban').html('')

                // console.log(respArray)

                $('#mulai').addClass('hide')
                $('#next').removeClass('hide')

                $('#title').html(respArray[0][indexData].soal)
                
                $('#jawaban').html(`
                <div class="col-md-8 col-xs-offset-1">
                    <div class="radio">
                        <label class="d-flex">
                            <input type="radio" name="jawaban_materi" class="radioCheck" onClick="getJawaban(`+respArray[0][indexData].id+`,`+respArray[0][indexData].jawaban[0].id+`)" style="margin-right: 20px" value="`+respArray[0][indexData].jawaban[0].id+`" id="rdo_pick">
                            <h6>`+respArray[0][indexData].jawaban[0].jawaban+`</h6>
                        </label>
                    </div>
                    <div class="radio">
                        <label class="d-flex">
                            <input type="radio" name="jawaban_materi" class="radioCheck" onClick="getJawaban(`+respArray[0][indexData].id+`,`+respArray[0][indexData].jawaban[1].id+`)" style="margin-right: 20px" value="`+respArray[0][indexData].jawaban[1].id+`" id="rdo_pick">
                            <h6>`+respArray[0][indexData].jawaban[1].jawaban+`</h6>
                        </label>
                    </div>
                    <div class="radio">
                        <label class="d-flex">
                            <input type="radio" name="jawaban_materi" class="radioCheck" onClick="getJawaban(`+respArray[0][indexData].id+`,`+respArray[0][indexData].jawaban[2].id+`)" style="margin-right: 20px" value="`+respArray[0][indexData].jawaban[2].id+`" id="rdo_pick">
                            <h6>`+respArray[0][indexData].jawaban[2].jawaban+`</h6>
                        </label>
                    </div>
                    <div class="radio">
                        <label class="d-flex">
                            <input type="radio" name="jawaban_materi" class="radioCheck" onClick="getJawaban(`+respArray[0][indexData].id+`,`+respArray[0][indexData].jawaban[3].id+`)" style="margin-right: 20px" value="`+respArray[0][indexData].jawaban[3].id+`" id="rdo_pick">
                            <h6>`+respArray[0][indexData].jawaban[3].jawaban+`</h6>
                        </label>
                    </div>
                </div>
                `)

                indexData++
                // console.log(indexData + " Index Mulai")
            })

            $('#next').on('click', function(e){
                // console.log(quiz+"nextt")
                $('#truejawaban').html('')

                let jawaban_id
                if(!$("input:radio[class='radioCheck']").is(":checked")) {
                    //write your code         
                    Swal.fire({
                        icon: "error",
                        text: "Anda Harus mengisi Jawaban",
                    });
                    
                    return false;
                }else{
                    jawaban_id = $("input:radio[class='radioCheck']:checked").val()
                }

                if(indexData >= respArray[0].length){
                    // console.log(quiz)
                    $('#next').addClass('hide')
                    $('#selesai').removeClass('hide')
                }

                // indexData++
                // console.log(indexData+" Index Now")


                // console.log(respArray[0][indexData])

                if(respArray[0][indexData] != undefined){

                    $('#title').html(respArray[0][indexData].soal)
                    
                    $('#jawaban').html(`
                    
                    <div class="col-md-8 col-xs-offset-1">
                    <div class="radio">
                        <label class="d-flex">
                            <input type="radio" name="jawaban_materi" class="radioCheck" onClick="getJawaban(`+respArray[0][indexData].id+`,`+respArray[0][indexData].jawaban[0].id+`)" style="margin-right: 20px" value="`+respArray[0][indexData].jawaban[0].id+`" id="rdo_pick">
                            <h6>`+respArray[0][indexData].jawaban[0].jawaban+`</h6>
                        </label>
                    </div>
                    <div class="radio">
                        <label class="d-flex">
                            <input type="radio" name="jawaban_materi" class="radioCheck" onClick="getJawaban(`+respArray[0][indexData].id+`,`+respArray[0][indexData].jawaban[1].id+`)" style="margin-right: 20px" value="`+respArray[0][indexData].jawaban[1].id+`" id="rdo_pick">
                            <h6>`+respArray[0][indexData].jawaban[1].jawaban+`</h6>
                        </label>
                    </div>
                    <div class="radio">
                        <label class="d-flex">
                            <input type="radio" name="jawaban_materi" class="radioCheck" onClick="getJawaban(`+respArray[0][indexData].id+`,`+respArray[0][indexData].jawaban[2].id+`)" style="margin-right: 20px" value="`+respArray[0][indexData].jawaban[2].id+`" id="rdo_pick">
                            <h6>`+respArray[0][indexData].jawaban[2].jawaban+`</h6>
                        </label>
                    </div>
                    <div class="radio">
                        <label class="d-flex">
                            <input type="radio" name="jawaban_materi" class="radioCheck" onClick="getJawaban(`+respArray[0][indexData].id+`,`+respArray[0][indexData].jawaban[3].id+`)" style="margin-right: 20px" value="`+respArray[0][indexData].jawaban[3].id+`" id="rdo_pick">
                            <h6>`+respArray[0][indexData].jawaban[3].jawaban+`</h6>
                        </label>
                    </div>
                </div>
                    `)
                
                }

                let selectedValue = $("input:radio[class='radioCheck']:checked").val()
                let selectedText = $("input:radio[class='radioCheck']").val()

                // console.log(selectedValue+" Selected Value")
                // console.log(respArray[0][indexData-1].soal+("Soal dikurangin index"))

                // indexData
                // console.log(jawaban_id+" Jawaban ID");
                quiz.push({
                    soal_id: respArray[0][indexData-1].id,
                    soal: respArray[0][indexData-1].soal,
                    jawaban_id: jawaban_id == undefined ? jawaban_id[0] : jawaban_id,
                    jawaban: jawaban_id
                })

                // console.log(quiz)

                indexData++

                // console.log(indexData+" Index Now Sekarang" + respArray[0].length)
                

                // if(indexData == respArray[0].length-1){
                //     $('#next').addClass('hide')
                //     $('#btnquiz').removeClass('hide')
                // }

                
                
            })


            
            $('#selesai').on('click', function(e){
                // console.log(quiz)
                $('#truejawaban').html('')

                $.ajax({
                    url: '{{ url("api/quiz/submit") }}',
                    method: 'POST',
                    data: {
                        quiz: quiz
                    },
                    dataType: 'json', // Change this to the appropriate data type
                    success: function(response) {
                        // Handle the successful response here
                        // console.log(response);
                        $('#title').html("Berikut Merupakan Score Anda")
                        // console.log("Selesai")
                        $('#jawaban').html(`
                            <div class="col-md-8">
                                <div class="text-center">
                                    <img src="{{ asset('') }}images/score.jpg" style="width: 50%;height:60%" alt="">
                                </div>
                                <div class="text-center">
                                    <h4 id="deskripsi">
                                        Score Anda 
                                    </h4>
                                    <h1 id="deskripsi">
                                        `+response.score+` / <span class="text-success">100</span>
                                    </h1>
                                    <h4>
                                        Silahkan klik tombol selesai untuk kembali ke beranda
                                    </h4>
                                </div>
                            </div>
                        `)

                        $('#selesai').addClass('hide')
                        $('#beranda').removeClass('hide')
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);
                    }
                });

                
            })

        })

        // function getJawaban(soal_id, jawaban_id){
        //     // console.log(soal_id)
        //     // console.log(jawaban_id)

        //     $.ajax({
        //         url: '{{ url("api/get-jawaban") }}',
        //         method: 'POST',
        //         data: {
        //             soal_id: soal_id,
        //             jawaban_id: jawaban_id
        //         },
        //         dataType: 'json', // Change this to the appropriate data type
        //         success: function(response) {
        //             // Handle the successful response here
        //             // console.log(response);
        //             if(response.status == true){
        //                 $('#truejawaban').html(`
        //                     <div class="col-md-8 col-xs-offset-1">
        //                         <hr>
        //                         <h4 class="text-success"> BENAR </h4>
        //                         <p>`+response.data+`</p>
        //                     </div>
        //                 `)
        //             }else{
        //                 $('#truejawaban').html(`
        //                     <div class="col-md-8 col-xs-offset-1">
        //                         <hr>
        //                         <h4 class="text-danger"> SALAH </h4>
        //                         <p>`+response.data+`</p>
        //                     </div>
        //                 `)
        //             }
        //         },
        //     })
        // }
    </script>
@endsection