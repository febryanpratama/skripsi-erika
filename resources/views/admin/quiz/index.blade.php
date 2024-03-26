@extends('layouts.main') @section('content')
<div class="page-content">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="position-relative">
                    <figure class="overflow-hidden mb-0 d-flex justify-content-center">
                        <img src="{{ asset('') }}images/bg-materi.png" class="rounded-top" alt="profile cover" />
                    </figure>
                    <div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
                        <div>
                            <img class="wd-70 rounded-circle" src="{{ asset('') }}admin/assets/images/faces/face1.jpg" alt="profile" />
                            <span class="h4 ms-3 text-dark">{{ Auth::user()->name }}</span>
                        </div>
                        {{-- <div class="d-none d-md-block">
                            <button class="btn btn-primary btn-icon-text">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-edit btn-icon-prepend"
                                >
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                Edit profile
                            </button>
                        </div> --}}
                    </div>
                </div>
                <div class="d-flex justify-content-center p-3 rounded-bottom">
                    <h2>Computer Aided System</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row profile-body d-flex justify-content-center">
        <!-- left wrapper start -->
        <div class="card p-2 mb-3">
            <h3 class="text-center">Pilih Kategori Materi</h3>
        </div>
        @foreach ($data as $item)
            <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="image">
                            <img src="{{ asset('') }}images/profile.jpg" class="img-fluid" alt="" />
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-3 mb-2">
                            <h4 class="card-title mb-0">{{ $item->nama_materi }}</h4>
                            
                        </div>
                        {{-- <p>{{ $item->nama_materi }}</p> --}}
                        
                        <div class="mt-3">
                            <a href="{{ url('admin/quiz/'.$item->id) }}">
                                <button class="form-control btn btn-outline-primary" id="tambahMateri">Tambah Soal</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection @section('scripts')
<script>
    $(document).ready(function () {
        $("#tambahMateri").on("click", function () {
            $(".list").addClass("hide");
            $(".add").removeClass("hide");
        });
    });
</script>
@endsection
