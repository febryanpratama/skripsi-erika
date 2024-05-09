@extends('layouts.main')

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
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
                                <input type="file" class="form-control" name="voice">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="control-label mb-2">Isi Konten</label>
                                <textarea name="isi_konten" id="ckeditor" class="form-control ckeditor" cols="30" rows="10"></textarea>
                            </div>
                            
                            <div class="form-group mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <label for="" class="control-label">File</label>
                                    <button class="btn btn-sm btn-primary" type="button" id="addGambar"> + File</button>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>List Konten Materi</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th width="5%">Nomor</th>
                                        <th wid>Isi Konten</th>
                                        <th>Jumlah Gambar</th>
                                        <th>Nomor Section</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key=>$item)

                                    {{-- {{ dd($item) }} --}}
                                        <tr class="">
                                            <td>{{ $key+1 }}</td>
                                            <td>{!! $item->isi_konten !!}</td>
                                            <td>{{ count(json_decode($item->gambar)) }}</td>
                                            <td>Section {{ $item->nomor_section }}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#setSection{{ $item->id }}">
                                                    Set Urutan Slide
                                                </button>
                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                                    Lihat File
                                                </button>
                                                <a href="{{ url('admin/materi/detail-materi/delete/'.$item->id) }}" class="btn btn-sm btn-outline-danger">Hapus</a>
                                            </td>

                                            {{-- {{ dd($item->gambar) }} --}}
                                        </tr>

                                        <div class="modal fade" id="setSection{{ $item->id }}" tabindex="-1" aria-labelledby="setSectionLabel{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ url('admin/materi/set-ordering') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="detail_materi_id" value="{{ $item->id }}" id="">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="setSectionLabel{{ $item->id }}">Set Ordering / Section {{ $item->nama_materi }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-md-12">
                                                                <label for="" class="control-label">Nomor Section</label>
                                                                <input type="number" class="form-control" name="nomor_section" value="{{ $item->nomor_section }}">
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
                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Lihat Gambar {{ $item->nama_materi }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach (json_decode($item['gambar']) as $item)
                                                            {{-- {{ dd($item->image) }} --}}
                                                            <div class="col-md-6">
                                                                <img src="{{ asset('gambar_materi/'.$item->image) }}" class="img-thumbnail" alt="">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ url('admin/materi') }}">
                            <button class="btn btn-danger mt-4" >Kembali</button>
                        </a>
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