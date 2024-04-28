@extends('layouts.main')

@section('content')

<div class="page-content">
    {{-- {{ dd(session('errors')) }} --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-center justify-content-between">
                    <h5>List User</h5>
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambahUser">
                        Tambah User
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="text-center">
                                <tr class="text-center">
                                    <th width="5%">Nomor</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                                Ubah
                                            </button>
                                            <a href="{{ url('admin/users/delete/'.$item->id) }}" class="btn btn-sm btn-outline-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ url('admin/users/update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $item->id }}">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tambahUserLabel">Edit Pengguna</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            <label for="" class="control-label">Nama</label>
                                                            <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <label for="" class="control-label">Email</label>
                                                            <input type="email" class="form-control" name="email" value="{{ $item->email }}">
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <label for="" class="control-label">Password</label>
                                                            <input type="password" class="form-control" name="password">
                                                            <small class="text-danger">* Kosongkan jika tidak ubah password!!!</small>
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
        <form action="{{ url('admin/users') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahUserLabel">Tambah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label for="" class="control-label">Nama</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="" class="control-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="" class="control-label">Password</label>
                        <input type="password" class="form-control" name="password">
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
