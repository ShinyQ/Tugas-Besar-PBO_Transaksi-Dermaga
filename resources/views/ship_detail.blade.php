@extends('template.layout')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-black"><b>Detail Kapal {{ $ship->name }} ({{ $ship->number }})</b></h1>

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
                    <h5 class="mb-3"><b>Tambah Kapal</b></h5>
                    <form action="/register" method="POST">
                        @csrf
                        <input class="form-control mb-3" type="text" name="name" placeholder="Masukkan Nama Kapal">
                        <input class="form-control mb-3" type="text" name="email" placeholder="Masukkan Nomor Kapal">
                        Waktu Kedatangan Kapal:
                        <input class="form-control mb-3" type="datetime-local" name="phone" placeholder="Masukkan Waktu Kedatangan">
                        <div style="float:right">
                            <input class="btn btn-danger" type="submit" value="Delete">
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
                                <th>Nomor Kapal</th>
                                <th>Waktu Kedatangan</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: center">
                            @foreach($ships as $i => $ship)
                                <tr>
                                    <th scope="row">{{ $i + 1 }}</th>
                                    <td>{{ $ship->name }}</td>
                                    <td>{{ $ship->number }}</td>
                                    <td>{{ $ship->arrivalTime }}</td>
                                    <td>
                                        <a href="{{ url('/ship/'. $ship->id) }}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop