@extends('layouts.main')

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Tambah Soal</h5>
                    </div>
                    <form action="{{ url('admin/quiz') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="materi_id" value="{{ $materi_id }}"> --}}
                        <div class="card-body">
                            {{-- <div class="form-group mb-3">
                                <label for="" class="control-label mb-2">Nomor Section</label>
                                <input type="number" class="form-control" name="nomor_section">
                            </div> --}}
                            <div class="form-group mb-3">
                                <label for="" class="control-label mb-2">Soal</label>
                                <textarea name="soal" id="ckeditor" class="form-control ckeditor" cols="30" rows="10"></textarea>
                            </div>
                            {{-- <div class="form-group mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <label for="" class="control-label">Gambar</label>
                                    <button class="btn btn-sm btn-primary" type="button" id="addGambar"> + Gambar</button>
                                </div>
                                <div id="listImage">
                                    <div class="d-flex mb-2">
                                        <input type="file" class="form-control mr-2" name="gambar[]">
                                        <button class="btn btn-sm btn-danger" onclick="removeTag()">Hapus</button>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-group mb-3">
                                <button type="submit" class="form-control btn btn-outline-success"> Simpan Data </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>List Soal</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th width="5%">Nomor</th>
                                        <th>Soal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key=>$item)
                                        <tr class="">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->soal }}</td>
                                            <td>
                                                <a href="{{ url('admin/quiz/detail-jawaban/'.$item->id) }}" class="btn btn-sm btn-primary">Jawaban</a>
                                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                                    Ubah
                                                </button>
                                                <a href="{{ url('admin/materi/detail-soal/delete/'.$item->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                                            <form action="{{ url('admin/materi/detail-soal/edit') }}" method="POST">
                                                <div class="modal-dialog modal-lg">
                                                    @csrf
                                                    <input type="hidden" value="{{ $item->id }}" name="soal_id" id="">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Ubah :  {{ $item->soal }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-md-12">
                                                                <label for="" class="label-control"> Soal</label>
                                                                <input type="text" class="form-control" value="{{ $item->soal }}" name="soal">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
