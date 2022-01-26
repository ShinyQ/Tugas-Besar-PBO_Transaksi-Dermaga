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
            <button data-toggle="modal" data-target="#modal-transaction-add" class="mb-4 btn btn-primary">
                + Tambah Transaksi
            </button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center">
                    <tr>
                        <th>No Transaksi.</th>
                        <th>Tanggal</th>
                        <th>Nama User</th>
                        <th>Total Berat Barang</th>
                        <th>Biaya Pengiriman</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody style="text-align: center">
                    @foreach($transactions as $i => $val)
                        @php
                            $transaction = new \App\Models\Transaction(
                               [
                                    'id' => $val->id,
                                    'created_at' => $val->created_at,
                                    'totalWeight' => $val->totalWeight,
                                    'totalCost' => $val->totalCost
                               ]
                            )
                        @endphp
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $val->created_at }}</td>
                            <td>{{ $val->name }}</td>
                            <td>{{ $transaction->getTotalWeight() }} Kilogram</td>
                            <td>{{ "Rp" . number_format($transaction->getTotalCost(),2,',','.') }}</td>
                            <td>
                                <a href="{{ url('/transaction/' . $transaction->getId() . '/edit') }}" style="white-space:nowrap" class="btn btn-primary" type="submit">
                                    <span class="fa fa-boxes"></span>
                                </a>
                                <button data-toggle="modal" data-target="#delete-ship-{{ $transaction->getId() }}" style="white-space:nowrap" class="btn btn-danger" type="submit">
                                    <span class="fa fa-trash"></span>
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="delete-ship-{{ $transaction->getId() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Hapus Data Transaksi</b></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="/transaction/{{ $transaction->getId() }}" method="POST">
                                        <div class="modal-body">
                                            @method('DELETE')
                                            @csrf
                                            <input style="display: none" type="text" name="id" value="{{ $transaction->getId() }}">
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

                <div class="modal fade" id="modal-transaction-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Transaksi</b></h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="/transaction" method="POST">
                                <div class="modal-body">
                                    @csrf
                                    Pilih User :
                                    <select class="form-control mb-3" type="text" name="user_id">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>

                                    Pilih Kapal :
                                    <select class="form-control mb-3" type="text" name="ship_id">
                                        @foreach($ships as $ship)
                                            <option value="{{ $ship->id }}">{{ $ship->number }} - {{ $ship->name }}</option>
                                        @endforeach
                                    </select>

                                    Tanggal Kedatangan :
                                    <input class="form-control mb-3" type="datetime-local" name="arrivalTime">

                                    Biaya Pengiriman :
                                    <input class="form-control mb-3" type="number" name="totalCost">
                                </div>
                                <div class="modal-footer">
                                    <input style="float: right" class="btn btn-primary" type="submit" value="Tambah Data">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const date = new Date();
        date.setDate(date.getDate() + 2);
        const today = date.toISOString().slice(0, 16);
        document.getElementsByName("arrivalTime")[0].min = today;
    </script>
@stop