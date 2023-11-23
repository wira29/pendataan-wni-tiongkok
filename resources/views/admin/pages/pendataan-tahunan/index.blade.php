@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Pendataan Tahunan</h3>
                    <p class="text-subtitle text-muted">List pendataan tahunan yang terdaftar</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($pendataans as $pendataan)
            <div class="col-3">
                <div class="card">
                    <div class="card-content">
                        <img src="{{ asset('storage/' . $pendataan->foto) }}" class="card-img-top img-fluid" alt="singleminded">
                        <div class="card-body">
                            <h3>{{ $pendataan->nama }}</h3>
                            <p class="card-text">
                                {{ $pendataan->deskripsi }}
                            </p>
                            <a href="{{ route('admin.cabang.edit', $pendataan->id) }}" class="card-link">Edit</a>
                            <a href="#" class="card-link btn-delete-data"
                               data-route="{{ route('admin.pendataan.destroy', $pendataan->id) }}">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12">
            {{ $pendataans->links() }}
        </div>
    </div>

@endsection


