@extends('template.layout')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-black"><b>Halaman Transaksi Pengguna</b></h1>

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
            <form class="mb-4" action="/transaction" method="POST" style="width: 50%;">
                @csrf
                Pilih User :
                <div class="row">
                    <div class="col-md-6">
                        <select class="form-control mb-3" type="text" name="user_id">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input class="btn btn-primary" type="submit" value="+ Tambah Transaksi">
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center">
                    <tr>
                        <th>No Transaksi.</th>
                        <th>Tanggal</th>
                        <th>Nama User</th>
                        <th>Total Berat Barang</th>
                        <th>Total Harga Barang</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody style="text-align: center">
                    @foreach($transactions as $i => $transaction)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $transaction->created_at }}</td>
                            <td>{{ $transaction->name }}</td>
                            <td>{{ $transaction->totalWeight }} Kilogram</td>
                            <td>{{ "Rp" . number_format($transaction->totalCost,2,',','.') }}</td>
                            <td>
                                <a href="{{ url('/transaction/' . $transaction->id . '/edit') }}" style="white-space:nowrap" class="btn btn-primary" type="submit">
                                    <span class="fa fa-boxes"></span>
                                </a>
                                <button data-toggle="modal" data-target="#delete-ship-{{ $transaction->id }}" style="white-space:nowrap" class="btn btn-danger" type="submit">
                                    <span class="fa fa-trash"></span>
                                </button>
                            </td>
                        </tr>

{{--                        <div class="modal fade" id="modal-ship-{{ $ship->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                            <div class="modal-dialog" role="document">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-header">--}}
{{--                                        <h5 class="modal-title" id="exampleModalLabel"><b>Update Waktu Kedatangan</b></h5>--}}
{{--                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <span aria-hidden="true">×</span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <form action="/ship/{{ $ship->id }}" method="POST">--}}
{{--                                        <div class="modal-body">--}}
{{--                                            @method('PUT')--}}
{{--                                            @csrf--}}
{{--                                            <input style="display: none" type="text" name="id" value="{{ $ship->id }}">--}}
{{--                                            Nama : <input class="form-control mb-3" type="text" name="name" placeholder="Masukkan Nama" value="{{ $ship->name }}">--}}
{{--                                            Nomor Kapal : <input class="form-control mb-3" type="text" name="number" placeholder="Masukkan Nomor Kapal" value="{{ $ship->number }}">--}}
{{--                                            Waktu Kedatangan Kapal: <input class="form-control mb-3" type="datetime-local" name="arrivalTime" value="{{ $ship->arrivalTime }}">--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <input class="btn btn-primary" type="submit" value="Update Data">--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="modal fade" id="delete-ship-{{ $transaction->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Hapus Data Transaksi</b></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="/transaction/{{ $transaction->id }}" method="POST">
                                        <div class="modal-body">
                                            @method('DELETE')
                                            @csrf
                                            <input style="display: none" type="text" name="id" value="{{ $transaction->id }}">
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