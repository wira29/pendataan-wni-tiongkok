@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Detail Informasi</h3>
                    <p class="text-subtitle text-muted">{{ $informasi->judul }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h3>{{ $informasi->judul }}</h3>
                        <p class="card-text">
                            {{ $informasi->deskripsi }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="car
                d-content">
                    <img src="{{ asset('storage/' . $informasi->gambar) }}" class="card-img-top img-fluid"
                         alt="singleminded">
                </div>
            </div>
        </div>
    </div>

@endsection


