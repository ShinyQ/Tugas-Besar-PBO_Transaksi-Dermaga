@extends('template.layout')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-black"><b>Dashboard User</b></h1>

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

    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Transaksi Anda</h6>
        </div>

        <div class="card-body">
            @if(!empty($data))
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center">
                    <tr>
                        <th>No.</th>
                        <th>Nama File</th>
                        <th>Ukuran File</th>
                        <th>Tanggal Diupload</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody style="text-align: center">
{{--                    @foreach($files as $i => $file)--}}
{{--                        <tr>--}}
{{--                            <td>{{ $i+1 }}</td>--}}
{{--                            <td>{{ $file['fileName'] }}</td>--}}
{{--                            <td>{{ round($file['size'] / 1024, 2) }} kB</td>--}}
{{--                            <td>{{ $file['createdAt'] }}</td>--}}
{{--                            <td>--}}
{{--                                <div style="text-align: center;">--}}
{{--                                    <a href="/file/download/{{ $file['id'] }}" class="btn btn-success btn-icon-split">--}}
{{--                                        <span class="text">Download</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
                    </tbody>
                </table>
            </div>
            @else
                <div style="text-align: center;"><h5>Belum Ada Data Transaksi</h5></div>
            @endif
        </div>
    </div>
@stop