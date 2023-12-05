@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Detail Pendataan Tahunan</h3>
                    <p class="text-subtitle text-muted">{{ $pendataan->judul }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Cabang</th>
                                <th>Ranting</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pendataan->submitPendataans as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->pengguna->nama }}</td>
                                    <td>{{ $data->pengguna->ranting->cabang->nama }}</td>
                                    <td>{{ $data->pengguna->ranting->nama }}</td>
                                    <td>
                                        <a href="{{ route('admin.submit-pendataan.detailAdmin', ['user' => $data->pengguna->id, 'id' => $pendataan->id]) }}" class="btn btn-primary btn-sm">Detail</a>
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

@endsection


