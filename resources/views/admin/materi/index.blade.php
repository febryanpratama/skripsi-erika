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
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="card-title mb-0">Materi</h6>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                    class="feather feather-more-horizontal icon-lg text-muted pb-3px"
                                >
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;">
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
                                        class="feather feather-edit-2 icon-sm me-2"
                                    >
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                    <span class="">Edit</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;">
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
                                        class="feather feather-git-branch icon-sm me-2"
                                    >
                                        <line x1="6" y1="3" x2="6" y2="15"></line>
                                        <circle cx="18" cy="6" r="3"></circle>
                                        <circle cx="6" cy="18" r="3"></circle>
                                        <path d="M18 9a9 9 0 0 1-9 9"></path>
                                    </svg>
                                    <span class="">Update</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;">
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
                                        class="feather feather-eye icon-sm me-2"
                                    >
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    <span class="">View all</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <p>Anda dapat menambahkan materi baru di halaman ini !!!</p>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Materi Terakhir:</label>
                        <p class="text-muted">Materi Terakhir tentang Data Scientist</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Jumlah Materi Saat Ini:</label>
                        <p class="text-muted">3 Materi</p>
                    </div>
                    <div class="mt-3">
                        <button class="form-control btn btn-outline-primary" id="tambahMateri">Tambah Materi</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xl-9 middle-wrapper">
            <div class="row list">
                @foreach ($data as $item)
                <div class="col-md-12 mb-2">
                    <div class="card rounded">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="img-xs rounded-circle" src="{{ asset('') }}images/profile.jpg" alt="" />
                                    <div class="ms-2">
                                        <p><b>{{ $item->nama_materi }}</b></p>
                                        <p class="tx-11 text-muted">5 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="mb-3 tx-14">{{ $item->deskripsi }}.</p>
                            <img class="img-fluid" src="../assets/images/photos/img2.jpg" alt="" />
                        </div>
                        <div class="card-footer">
                            <div class="d-flex post-actions">
                                <a href="{{ url('admin/materi/'.$item->id.'/konten') }}" class="d-flex btn btn-outline-primary hover-textf align-items-center text-muted me-4">
                                    <svg
                                        id="Layer_1"
                                        style="enable-background: new 0 0 64 64;"
                                        width="24"
                                        height="24"
                                        version="1.1"
                                        viewBox="0 0 64 64"
                                        xml:space="preserve"
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                    >
                                        <g>
                                            <g id="Icon-Plus" transform="translate(28.000000, 278.000000)">
                                                <path
                                                    class="st0"
                                                    d="M4-222.1c-13.2,0-23.9-10.7-23.9-23.9c0-13.2,10.7-23.9,23.9-23.9s23.9,10.7,23.9,23.9     C27.9-232.8,17.2-222.1,4-222.1L4-222.1z M4-267.3c-11.7,0-21.3,9.6-21.3,21.3s9.6,21.3,21.3,21.3s21.3-9.6,21.3-21.3     S15.7-267.3,4-267.3L4-267.3z"
                                                    id="Fill-38"
                                                />
                                                <polygon class="st0" id="Fill-39" points="-8.7,-247.4 16.7,-247.4 16.7,-244.6 -8.7,-244.6    " />
                                                <polygon class="st0" id="Fill-40" points="2.6,-258.7 5.4,-258.7 5.4,-233.3 2.6,-233.3    " />
                                            </g>
                                        </g>
                                    </svg>
                                    <p class="d-none d-md-block ms-2">Tambah Konten</p>
                                </a>
                                <a href="{{ url('admin/materi/'.$item->id.'/soal') }}" class="d-flex btn btn-outline-info hover-textf align-items-center text-muted me-4">
                                    <svg
                                        id="Layer_1"
                                        style="enable-background: new 0 0 64 64;"
                                        width="24"
                                        height="24"
                                        version="1.1"
                                        viewBox="0 0 64 64"
                                        xml:space="preserve"
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                    >
                                        <g>
                                            <g id="Icon-Plus" transform="translate(28.000000, 278.000000)">
                                                <path
                                                    class="st0"
                                                    d="M4-222.1c-13.2,0-23.9-10.7-23.9-23.9c0-13.2,10.7-23.9,23.9-23.9s23.9,10.7,23.9,23.9     C27.9-232.8,17.2-222.1,4-222.1L4-222.1z M4-267.3c-11.7,0-21.3,9.6-21.3,21.3s9.6,21.3,21.3,21.3s21.3-9.6,21.3-21.3     S15.7-267.3,4-267.3L4-267.3z"
                                                    id="Fill-38"
                                                />
                                                <polygon class="st0" id="Fill-39" points="-8.7,-247.4 16.7,-247.4 16.7,-244.6 -8.7,-244.6    " />
                                                <polygon class="st0" id="Fill-40" points="2.6,-258.7 5.4,-258.7 5.4,-233.3 2.6,-233.3    " />
                                            </g>
                                        </g>
                                    </svg>
                                    <p class="d-none d-md-block ms-2">Tambah Soal</p>
                                </a>
                                <a href="{{ url('admin/materi/delete/'.$item->id) }}" class="d-flex btn btn-outline-danger hover-textf align-items-center text-muted me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                                        <path d="M 21 0 C 19.355469 0 18 1.355469 18 3 L 18 5 L 10.1875 5 C 10.0625 4.976563 9.9375 4.976563 9.8125 5 L 8 5 C 7.96875 5 7.9375 5 7.90625 5 C 7.355469 5.027344 6.925781 5.496094 6.953125 6.046875 C 6.980469 6.597656 7.449219 7.027344 8 7 L 9.09375 7 L 12.6875 47.5 C 12.8125 48.898438 14.003906 50 15.40625 50 L 34.59375 50 C 35.996094 50 37.1875 48.898438 37.3125 47.5 L 40.90625 7 L 42 7 C 42.359375 7.003906 42.695313 6.816406 42.878906 6.503906 C 43.058594 6.191406 43.058594 5.808594 42.878906 5.496094 C 42.695313 5.183594 42.359375 4.996094 42 5 L 32 5 L 32 3 C 32 1.355469 30.644531 0 29 0 Z M 21 2 L 29 2 C 29.5625 2 30 2.4375 30 3 L 30 5 L 20 5 L 20 3 C 20 2.4375 20.4375 2 21 2 Z M 11.09375 7 L 38.90625 7 L 35.3125 47.34375 C 35.28125 47.691406 34.910156 48 34.59375 48 L 15.40625 48 C 15.089844 48 14.71875 47.691406 14.6875 47.34375 Z M 18.90625 9.96875 C 18.863281 9.976563 18.820313 9.988281 18.78125 10 C 18.316406 10.105469 17.988281 10.523438 18 11 L 18 44 C 17.996094 44.359375 18.183594 44.695313 18.496094 44.878906 C 18.808594 45.058594 19.191406 45.058594 19.503906 44.878906 C 19.816406 44.695313 20.003906 44.359375 20 44 L 20 11 C 20.011719 10.710938 19.894531 10.433594 19.6875 10.238281 C 19.476563 10.039063 19.191406 9.941406 18.90625 9.96875 Z M 24.90625 9.96875 C 24.863281 9.976563 24.820313 9.988281 24.78125 10 C 24.316406 10.105469 23.988281 10.523438 24 11 L 24 44 C 23.996094 44.359375 24.183594 44.695313 24.496094 44.878906 C 24.808594 45.058594 25.191406 45.058594 25.503906 44.878906 C 25.816406 44.695313 26.003906 44.359375 26 44 L 26 11 C 26.011719 10.710938 25.894531 10.433594 25.6875 10.238281 C 25.476563 10.039063 25.191406 9.941406 24.90625 9.96875 Z M 30.90625 9.96875 C 30.863281 9.976563 30.820313 9.988281 30.78125 10 C 30.316406 10.105469 29.988281 10.523438 30 11 L 30 44 C 29.996094 44.359375 30.183594 44.695313 30.496094 44.878906 C 30.808594 45.058594 31.191406 45.058594 31.503906 44.878906 C 31.816406 44.695313 32.003906 44.359375 32 44 L 32 11 C 32.011719 10.710938 31.894531 10.433594 31.6875 10.238281 C 31.476563 10.039063 31.191406 9.941406 30.90625 9.96875 Z"></path>
                                    </svg>
                                    <p class="d-none d-md-block ms-2">Hapus Soal</p>
                                </a>
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                    Ubah Materi
                                </button>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ url('admin/materi/edit') }}" method="POST">
                            @csrf
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Ubah {{ $item->nama_materi }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" name="materi_id" value="{{ $item->id }}">
                                <div class="form-group mt-2">
                                    <label for="" class="control-label">Nama Materi</label>
                                    <input type="text" class="form-control" name="nama_materi" value="{{ $item->nama_materi }}" id="nama_materi" placeholder="Nama Materi" />
                                </div>
                                <div class="form-group mt-2">
                                    <label for="" class="control-label">Deskripsi Materi</label>
                                    <input type="text" class="form-control" name="deskripsi" value="{{ $item->deskripsi }}" id="deskripsi" placeholder="Deskripsi Materi" />
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row add hide">
                <form action="{{ url('admin/materi') }}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="card rounded">
                            <div class="card-header">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">
                                            <h5>Tambah Materi Baru</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group mt-2">
                                    <label for="" class="control-label">Nama Materi</label>
                                    <input type="text" class="form-control" name="nama_materi" id="nama_materi" placeholder="Nama Materi" />
                                </div>
                                <div class="form-group mt-2">
                                    <label for="" class="control-label">Deskripsi Materi</label>
                                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Materi" />
                                </div>

                                <div class="form-group mt-3">
                                    <button class="form-control btn btn-outline-success" type="submit">Tambah Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
