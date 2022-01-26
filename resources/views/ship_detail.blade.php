@extends('template.layout')
@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-black">
            <a style="white-space:nowrap" href="{{ url('/ship/') }}" class="btn btn-primary mr-2">
                <span class="fa fa-arrow-left"></span>
            </a>
        <b>Detail Kapal {{ $ship->getName() }} (No. {{ $ship->getNumber() }})</b>
    </h1>

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

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4 mt-3">
                <div class="card-body">
                    <form action="/container" method="POST">
                        @csrf
                        <input style='display: none' type="text" name="ship_id" value="{{ $ship->getId() }}">

                        Nomor Container :
                        <input class="form-control mb-3" type="text" name="number" placeholder="Masukkan Nomor Container">

                        Jenis Container :
                        <select class="form-control mb-3" type="text" name="type">
                            <option value="Dry Storage">Dry Storage</option>
                            <option value="Open Side">Open Side</option>
                            <option value="Open Top">Open Top</option>
                        </select>

                        Ukuran Container :
                        <div class="input-group mb-3">
                            <input type="text" name="size" class="form-control" placeholder="Masukkan Ukuran Container" aria-label="measurement" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">ft</span>
                            </div>
                        </div>

                        <div style="float:right">
                            <input class="btn btn-primary" type="submit" value="Tambah Data">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow mb-4 mt-3">
                <div class="card-body">
                    <h3 class="mb-4" style="font-weight: bold; font-size: 18px">Barang Akan Sampai Dalam {{ \App\Models\Transaction::getTimeArrival($ship->getId()) }}</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="text-align: center">
                            <tr>
                                <th>No.</th>
                                <th>Nomor Container</th>
                                <th>Tipe</th>
                                <th>Ukuran</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: center">
                            @foreach($containers as $i => $container)
                                @php
                                    $container = new \App\Models\Container([
                                        'id' => $container->id,
                                        'ship_id' => $container->ship_id,
                                        'number' => $container->number,
                                        'type' => $container->type,
                                        'size' => $container->size
                                    ])
                                @endphp
                                <tr>
                                    <th scope="row">{{ $i + 1 }}</th>
                                    <td>{{ $container->getNumber() }}</td>
                                    <td>{{ $container->getType() }}</td>
                                    <td>{{ $container->getSize() }}</td>
                                    <td>
                                        <a href="{{ url('/container/'. $container->getId()) .'/item'}}" class="btn btn-primary"><span class="fa fa-receipt"></span></a>
                                        <a data-toggle="modal" data-target="#modal-container-{{ $container->getId() }}" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                                        <button data-toggle="modal" data-target="#delete-container-{{ $container->getId() }}" class="btn btn-danger" type="submit">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-container-{{ $container->getId() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><b>Update Data Container</b></h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form action="/container/{{ $container->getId() }}" method="POST">
                                                <div class="modal-body">
                                                    @method('PUT')
                                                    @csrf
                                                    <input style='display: none' type="text" name="ship_id" value="{{$ship->getId()}}">

                                                    Nomor Container :
                                                    <input class="form-control mb-3" type="text" name="number" placeholder="Masukkan Nomor Container" value="{{ $container->getNumber() }}">

                                                    Jenis Container :
                                                    <select class="form-control mb-3" type="text" name="type">
                                                        <option {{$container->getType() == 'Dry Storage'  ? 'selected' : ''}} value="Dry Storage">Dry Storage</option>
                                                        <option {{$container->getType() == 'Open Side'  ? 'selected' : ''}} value="Open Side">Open Side</option>
                                                        <option {{$container->getType() == 'Open Top'  ? 'selected' : ''}} value="Open Top">Open Top</option>
                                                    </select>

                                                    Ukuran Container :
                                                    <div class="input-group mb-3">
                                                        <input value="{{ $container->getSize() }}" type="text" name="size" class="form-control" placeholder="Masukkan Ukuran Container" aria-label="measurement" aria-describedby="basic-addon2">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon2">ft</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input class="btn btn-primary" type="submit" value="Update Data">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="delete-container-{{ $container->getId() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><b>Hapus Data Container {{ $container->getNumber() }}</b></h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form action="/container/{{ $container->getId() }}" method="POST">
                                                <div class="modal-body">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input style="display: none" type="text" name="ship_id" value="{{ $container->getShipId() }}">
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
        </div>

    </div>

@stop