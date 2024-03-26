@extends('layouts.main')

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Tambah Konten</h5>
                    </div>
                    <form action="{{ url('admin/materi/detail-materi') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="materi_id" value="{{ $materi_id }}">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="" class="control-label mb-2">Nomor Section</label>
                                <input type="number" class="form-control" name="nomor_section">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="control-label mb-2">File Mp3</label>
                                <input type="file" class="form-control" name="voice" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="control-label mb-2">Isi Konten</label>
                                <textarea name="isi_konten" id="ckeditor" class="form-control ckeditor" cols="30" rows="10"></textarea>
                            </div>
                            
                            <div class="form-group mb-3">
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
                        <h5>List Konten Materi</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th width="5%">Nomor</th>
                                        <th>Nomor Section</th>
                                        <th>Isi Konten</th>
                                        <th>Jumlah Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key=>$item)
                                        <tr class="">
                                            <td>{{ $key+1 }}</td>
                                            <td>Section {{ $item->nomor_section }}</td>
                                            <td>{!! $item->isi_konten !!}</td>
                                            <td>2 Gambar</td>
                                            <td>
                                                <a href="{{ url('admin/materi/detail-materi/'.$item->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                                                <a href="{{ url('admin/materi/detail-materi/'.$item->id) }}" class="btn btn-sm btn-danger">Hapus</a>
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

@section('scripts')
    <script>
        $('#addGambar').on('click',  function(){
            $('#listImage').append(`
                <div class="d-flex mb-2">
                    <input type="file" class="form-control mr-2" name="gambar[]">
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </div>
            `)
        })

        function removeTag(){
            console.log("remove")
            $(this).children().remove()
        }
    </script>
@endsection