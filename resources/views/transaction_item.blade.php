@extends('template.layout')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-black"><b>Detail Transaksi #{{ $transaction->getId() }}</b></h1>

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
            <button data-toggle="modal" data-target="#modal-item-add" style="white-space:nowrap" class="btn btn-primary mb-4">
                + Tambah Barang
            </button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Berat</th>
                        <th>Jumlah</th>
                        <th>Nomor Container</th>
                        <th>Jenis</th>
                        <th>Bentuk</th>
                        <th>Mudah Terbakar</th>
                        <th>Aksi</th>
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
                            <td>
                                <a data-toggle="modal" data-target="#modal-item-{{ $item->getId() }}" style="white-space:nowrap" class="btn btn-primary" type="submit">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <button data-toggle="modal" data-target="#delete-item-{{ $item->getId() }}" style="white-space:nowrap" class="btn btn-danger" type="submit">
                                    <span class="fa fa-trash"></span>
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="modal-item-{{ $item->getId() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Update Item</b></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="/item/{{ $item->getId() }}" method="POST">
                                        <div class="modal-body">
                                            @method('PUT')
                                            @csrf

                                            <input style="display: none" type="text" name="id" value="{{ $item->getId() }}">
                                            <input style="display: none" type="text" name="transaction_id" value="{{ $item->getTransactionId() }}">
                                            Pilih Nomor Container :
                                            <select class="form-control mb-3" type="text" name="container_id">
                                                @foreach($containers as $container)
                                                    <option value="{{ $container->id }}" {{$item->getContainer() == $container->number  ? 'selected' : ''}}>
                                                        {{ $container->number }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            Nama : <input class="form-control mb-3" type="text" name="name" placeholder="Masukkan Nama" value="{{ $item->getName() }}">
                                            Berat (Kg) : <input class="form-control mb-3" type="number" name="weight" placeholder="Masukkan Berat" value="{{ $item->getWeight() }}">
                                            @if($item instanceof \App\Models\ItemSolid)
                                                Bentuk : <input class="form-control mb-3" type="text" name="shape" placeholder="Masukkan Bentuk" value="{{ $item->getShape() }}">
                                                Jumlah : <input class="form-control mb-3" type="number" name="quantity" placeholder="Masukkan Jumlah (Pcs)" value="{{ $item->getQuantity() }}">
                                            @else
                                                Barang Mudah Terbakar :
                                                <select class="form-control mb-3" name="isFlammable">
                                                    <option {{$item->getIsFlammable() == 1  ? 'selected' : ''}} value="1">Ya</option>
                                                    <option {{$item->getIsFlammable() == 0  ? 'selected' : ''}} value="0">Tidak</option>
                                                </select>
                                                Volume : <input class="form-control mb-3" type="number" name="volume" placeholder="Masukkan Volume" value="{{ $item->getVolume() }}">

                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <input class="btn btn-primary" type="submit" value="Update Data">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="delete-item-{{ $item->getId() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Hapus Item</b></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="/item/{{ $item->getId() }}" method="POST">
                                        <div class="modal-body">
                                            @method('DELETE')
                                            @csrf
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

                <div class="modal fade" id="modal-item-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Barang</b></h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="/item" method="POST">
                                <div class="modal-body">
                                    @csrf
                                    <input style="display: none" type="text" name="transaction_id" value="{{ $transaction_id }}">
                                    Pilih Nomor Container :
                                    <select class="form-control mb-3" type="text" name="container_id">
                                        @foreach($containers as $container)
                                            <option value="{{ $container->id }}">
                                                {{ $container->number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    Nama : <input class="form-control mb-3" type="text" name="name" placeholder="Masukkan Nama Barang">
                                    Berat (Kg) : <input class="form-control mb-3" type="number" name="weight" placeholder="Masukkan Berat">

                                    Masukkan Jenis Barang
                                    <select class="form-control mb-3" onchange="typeCheck(this);">
                                        <option value="solid">Padat</option>
                                        <option value="liquid">Cair</option>
                                    </select>

                                    <div id="solid">
                                        Bentuk : <input class="form-control mb-3" type="text" name="shape" placeholder="Masukkan Bentuk">
                                        Jumlah : <input class="form-control mb-3" type="number" name="quantity" placeholder="Masukkan Jumlah (Pcs)">
                                    </div>

                                    <div id="liquid" style="display: none;">
                                        Barang Mudah Terbakar :
                                        <select class="form-control mb-3" name="isFlammable">
                                            <option></option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                        Volume : <input class="form-control mb-3" type="number" name="volume" placeholder="Masukkan Volume">
                                    </div>
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
        function typeCheck(type) {
            if (type.value === "solid") {
                document.getElementById("solid").style.display = "block";
                document.getElementById("liquid").style.display = "none";
            } else {
                document.getElementById("liquid").style.display = "block";
                document.getElementById("solid").style.display = "none";
            }
        }
    </script>
@stop