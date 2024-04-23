@extends('layouts.main')

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Tambah Jawaban</h5>
                        <small class="text-danger"> maksimal 4 jawaban di tiap soal </small>
                        {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores ipsum ex, temporibus dolore magni quae. --}}
                    </div>
                    <form action="{{ url('admin/quiz/detail-jawaban') }}" method="POST" enctype="multipart/form-data">
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
                                                <a href="{{ url('admin/materi/detail-soal/'.$item->id) }}" class="btn btn-sm btn-primary">Jawaban</a>
                                                <a href="{{ url('admin/materi/detail-soal/'.$item->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                                            </td>
                                        </tr>
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
