@extends('template.layout')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-black"><b>Halaman Kapal</b></h1>

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

    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
            <form action="/ship" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-4">
                        Nama Kapal :
                        <input class="form-control mb-3" type="text" name="name" placeholder="Masukkan Nama Kapal">
                    </div>
                    <div class="col-md-4">
                        Nomor Kapal :
                        <input class="form-control mb-3" type="text" name="number" placeholder="Masukkan Nomor Kapal">
                    </div>
                    <div class="col-md-4">
                        Waktu Kedatangan Kapal:
                        <input class="form-control mb-3" type="datetime-local" name="arrivalTime" placeholder="Masukkan Waktu Kedatangan">
                        <div style="float:right">
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

        <div class="card shadow mb-4 mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="text-align: center">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Nomor Kapal</th>
                            <th>Kedatangan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody style="text-align: center">
                        @foreach($ships as $i => $ship)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $ship->name }}</td>
                                <td>{{ $ship->number }}</td>
                                <td>{{ $ship->arrivalTime }} <a href="" data-toggle="modal" data-target="#modal-ship-{{ $ship->id }}"><span class="ml-1 fa fa-edit"></span></a></td>
                                <td>
                                    <a style="white-space:nowrap" href="{{ url('/container/'. $ship->id) }}" class="btn btn-primary"><span class="fa fa-boxes"></span></a>
                                    <button data-toggle="modal" data-target="#delete-ship-{{ $ship->id }}" style="white-space:nowrap" class="btn btn-danger" type="submit">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="modal-ship-{{ $ship->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><b>Update Waktu Kedatangan</b></h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="/ship/{{ $ship->id }}" method="POST">
                                            <div class="modal-body">
                                                @method('PUT')
                                                @csrf
                                                <input style="display: none" type="text" name="id" value="{{ $ship->id }}">
                                                Nama : <input class="form-control mb-3" type="text" name="name" placeholder="Masukkan Nama" value="{{ $ship->name }}">
                                                Nomor Kapal : <input class="form-control mb-3" type="text" name="number" placeholder="Masukkan Nomor Kapal" value="{{ $ship->number }}">
                                                Waktu Kedatangan Kapal: <input class="form-control mb-3" type="datetime-local" name="arrivalTime" value="{{ $ship->arrivalTime }}">
                                            </div>
                                            <div class="modal-footer">
                                                <input class="btn btn-primary" type="submit" value="Update Data">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="delete-ship-{{ $ship->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><b>Hapus Data Kapal {{ $ship->name }}</b></h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="ship/{{ $ship->id }}" method="POST">
                                            <div class="modal-body">
                                                @method('DELETE')
                                                @csrf
                                                <input style="display: none" type="text" name="id" value="{{ $ship->id }}">
                                                Apakah Anda Yakin Ingin Menghapus Data Ini ?
                                            </div>
                                            <div class="modal-footer">
                                                <input class="btn btn-danger" type="submit" value="Hapus Data">
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
@stop