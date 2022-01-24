@extends('template.layout')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-black"><b>Daftar Pengguna</b></h1>

    @if (\Session::has('error'))
        <div class="mt-4 alert alert-danger">
            <div style="text-align: center;">{!! \Session::get('error') !!}</div>
        </div>
    @endif

    @if (\Session::has('success'))
        <div class="mt-4 alert alert-success">
            <div style="text-align: center;">{!! \Session::get('success') !!}</div>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4 mt-3">
                <div class="card-body">
                    <h5 class="mb-3"><b>Tambah Pengguna</b></h5>
                    <form action="/register" method="POST">
                        @csrf
                        <input class="form-control mb-3" type="text" name="name" placeholder="Masukkan Nama">
                        <input class="form-control mb-3" type="text" name="email" placeholder="Masukkan Email">
                        <input class="form-control mb-3" type="text" name="phone" placeholder="Masukkan Nomor HP">
                        <input class="form-control mb-3" type="text" name="password" placeholder="Masukkan Password">
                        <textarea style="height: 150px" class="form-control mb-3" type="text" name="address" placeholder="Masukkan Alamat"></textarea>
                        <div style="float:right">
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4 mt-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="text-align: center">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: center">
                            @foreach($users as $i => $user)
                                @php
                                    $user = new \App\Models\User([
                                         'id' => $user->id,
                                         'name' => $user->name,
                                         'email' => $user->email,
                                         'password' => $user->password,
                                         'address' => $user->address,
                                         'phone' => $user->phone,
                                         'is_admin' => $user->is_admin
                                    ]);
                                @endphp
                                <tr>
                                    <th scope="row">{{ $i + 1 }}</th>
                                    <td>{{ $user->getName() }}</td>
                                    <td>{{ $user->getPhone() }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="/user/transaction/{{ $user->getId() }}"><span class="fa fa-receipt"></span></a>
                                        <button type="button" class="btn btn-info" role="button" data-toggle="modal" data-target="#modal-user-{{ $user->getId() }}">
                                            <span class="fa fa-edit"></span>
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-user-{{ $user->getId() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><b>Detail Pengguna</b></h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form action="/register/{{ $user->getId() }}" method="POST">
                                                <div class="modal-body">
                                                        @method('PUT')
                                                        @csrf
                                                        <input style="display: none" type="text" name="id" value="{{ $user->getId() }}">
                                                        <input style="display: none" type="text" name="password" value="{{ $user->getPassword() }}">

                                                        Nama : <input class="form-control mb-3" type="text" name="name" placeholder="Masukkan Nama" value="{{ $user->getName() }}">
                                                        Email : <input class="form-control mb-3" type="text" name="email" placeholder="Masukkan Email" value="{{ $user->getEmail() }}">
                                                        Nomor Handphone : <input class="form-control mb-3" type="text" name="phone" placeholder="Masukkan Nomor HP" value="{{ $user->getPhone() }}">
                                                        Alamat : <textarea style="height: 120px" class="form-control mb-3" name="address">{{ $user->getAddress() }}</textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <input class="btn btn-primary" type="submit" value="Update Data">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop