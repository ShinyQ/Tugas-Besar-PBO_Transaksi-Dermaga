@extends('template.layout')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-black"><b>Data Transaksi </b></h1>

    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center">
                    <tr>
                        <th>No Transaksi.</th>
                        <th>Tanggal</th>
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
                            <td>{{ $transaction->getTotalWeight() }} Kilogram</td>
                            <td>{{ "Rp" . number_format($transaction->getTotalCost(),2,',','.') }}</td>
                            <td>
                                <a href="{{ url('/user/transaction/' . $transaction->getId() . '/item') }}" style="white-space:nowrap" class="btn btn-primary" type="submit">
                                    <span class="fa fa-boxes"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop