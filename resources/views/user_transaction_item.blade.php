@extends('template.layout')
@section('content')
    <!-- Page Heading -->
    @if(!empty($transaction_id))
        <h1 class="h3 mb-2 text-black">
            <b>Detail Transaksi #{{ $transaction_id }}</b>
        </h1>
    @else
        <h1 class="h3 mb-2 text-black"><b>{{ $title }}</b></h1>
    @endif
    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Berat</th>`
                        <th>Jumlah</th>
                        <th>Nomor Container</th>
                        <th>Jenis</th>
                        <th>Bentuk</th>
                        <th>Mudah Terbakar</th>
                    </tr>
                    </thead>
                    <tbody style="text-align: center">
                    @foreach($items as $i => $val)
                        @php
                            if($val->quantity) {
                                $item = new \App\Models\ItemSolid([
                                    'id' => $val->id,
                                    'name' => $val->name,
                                    'transaction_id' => $val->transaction_id,
                                    'weight' => $val->weight,
                                    'container' => $val->number],
                                    $val->shape,
                                    $val->quantity
                                );
                            } else {
                                $item = new \App\Models\ItemLiquid([
                                    'id' => $val->id,
                                    'name' => $val->name,
                                    'transaction_id' => $val->transaction_id,
                                    'weight' => $val->weight,
                                    'container' => $val->number],
                                    $val->isFlammable,
                                    $val->volume
                                );
                            }
                        @endphp

                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ ucfirst($item->getName()) }}</td>
                            <td>{{ $item->getWeight() }} Kg</td>
                            <td>{{ $item instanceof \App\Models\ItemSolid ? $item->getQuantity() . ' Pcs' : $item->getVolume() . ' Liter'}}</td>
                            <td>{{ $item->getContainer() }}</td>
                            <td>{{ $item instanceof  \App\Models\ItemSolid ? 'Padat' : 'Cair' }} </td>
                            <td>{{ $item instanceof  \App\Models\ItemSolid ? $item->getShape() : '-' }} </td>
                            <td>{{ $item instanceof  \App\Models\ItemLiquid ? ($item->getIsFlammable() == 0 ? 'Tidak' : 'Ya') : '-' }} </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop