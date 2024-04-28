@extends('layouts.main')

@section('content')

{{-- {{ dd(session('error')) }} --}}
    <div class="page-content">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Tambah Jawaban</h5>
                        <small class="text-danger"> maksimal 4 jawaban di tiap soal </small>
                    </div>
                    <form action="{{ url('admin/materi/detail-jawaban') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="soal_id" value="{{ $soal_id }}">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="" class="control-label mb-2">Jawaban</label>
                                <textarea name="jawaban" id="ckeditor" class="form-control ckeditor" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="control-label">Value Jawaban</label>
                                <div class="d-flex justify-content-evenly">
                                    <div class="d-flex">
                                        <input type="radio" name="is_correct" value="1" class="mr-2">
                                        <label for="" class="form-contol control-label">Benar</label>
                                    </div>
                                    <div class="d-flex ml-3">
                                        <input type="radio" name="is_correct" value="0" class="mr-2">
                                        <label for="" class="form-contol control-label">Salah</label>
                                    </div>
                                </div>
                            </div>
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
                        <h5>List Jawaban</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th width="5%">Nomor</th>
                                        <th>Jawaban</th>
                                        <th>Status Jawaban</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ $data }} --}}
                                    @foreach ($data as $key=>$item)
                                        <tr class="">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->jawaban }}</td>
                                            <td class={{ $item->is_correct ? 'text-success' : 'text-danger' }}>{{ $item->is_correct ? 'Benar' : 'Salah' }}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                                    Ubah
                                                </button>
                                                {{-- <a href="{{ url('admin/materi/detail-jawaban/delete/'.$item->id) }}" class="btn btn-sm btn-outline-danger">Hapus</a> --}}
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                                            <form action="{{ url('admin/materi/detail-jawaban/edit') }}" method="POST">
                                                <div class="modal-dialog">
                                                    @csrf
                                                    <input type="hidden" name="soal_id" value="{{ $soal_id }}">
                                                    <input type="hidden" value="{{ $item->id }}" name="jawaban_id" id="">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Ubah :  {{ $item->jawaban }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-md-12">
                                                                <label for="" class="label-control"> Jawaban</label>
                                                                <input type="text" class="form-control" value="{{ $item->jawaban }}" name="jawaban">
                                                            </div>
                                                            <div class="col-md-12 mt-2">
                                                                <div class="form-group mb-3">
                                                                    <label for="" class="control-label">Value Jawaban</label>
                                                                    <div class="d-flex justify-content-evenly">
                                                                        <div class="d-flex">
                                                                            <input type="radio" name="is_correct" value="1" class="mr-2">
                                                                            <label for="" class="form-contol control-label">Benar</label>
                                                                        </div>
                                                                        <div class="d-flex ml-3">
                                                                            <input type="radio" name="is_correct" value="0" class="mr-2">
                                                                            <label for="" class="form-contol control-label">Salah</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
