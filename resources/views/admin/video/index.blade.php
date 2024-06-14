@extends('layouts.main')

@section('content')

<div class="page-content">
    {{-- {{ dd(session('errors')) }} --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-center justify-content-between">
                    <h5>List Video</h5>
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambahUser">
                        Tambah Video
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="text-center">
                                <tr class="text-center">
                                    <th width="5%">Nomor</th>
                                    <th>Title</th>
                                    <th>Video</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <a href="{{ asset('video_materi/'.$item->path) }}" target="_blank">
                                                <button class="btn btn-info">Lihat Video</button>
                                            </a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                                Ubah
                                            </button>
                                            <a href="{{ url('admin/video/delete/'.$item->id) }}" class="btn btn-sm btn-outline-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ url('admin/video/update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="video_id" value="{{ $item->id }}">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tambahUserLabel">Edit Pengguna</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            <label for="" class="control-label">Title Video</label>
                                                            <input type="text" class="form-control" name="title">
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <label for="" class="control-label">File Video <sup class="text-danger">* Kosongkan jika tidak ingin ubah video</sup></label>
                                                            <input type="file" class="form-control" name="video" >
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
                            </tbody>
                            {{-- <button id="buttonSwal">Test</button> --}}

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="tambahUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('admin/video') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahUserLabel">Tambah Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label for="" class="control-label">Title Video</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="" class="control-label">File Video</label>
                        <input type="file" class="form-control" name="video" >
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
    
@endsection
