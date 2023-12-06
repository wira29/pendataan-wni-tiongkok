@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Detail pasport Tahunan</h3>
                    <p class="text-subtitle text-muted">{{ $pasport->judul }}</p>
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
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pasport->submitpasports as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->pengguna->nama }}</td>
                                    <td>{{ $data->file }}</td>
                                    <td>
                                        <a href="{{ route('admin.download-file', $data->id) }}" class="btn btn-primary btn-sm">Download</a>
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


