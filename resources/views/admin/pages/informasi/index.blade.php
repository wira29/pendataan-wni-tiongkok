@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Informasi</h3>
                    <p class="text-subtitle text-muted">List informasi</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($informations as $information)
            <div class="col-3">
                <div class="card">
                    <div class="card-content">
                        <img src="{{ asset('storage/' . $information->gambar) }}" class="card-img-top img-fluid"
                             alt="singleminded">
                        <div class="card-body">
                            <h3>{{ $information->judul }}</h3>
                            <p class="card-text">
                                {{ substr($information->deskripsi, 0, 50) }}...
                            </p>
                            @auth
                            @if(auth()->user()->roles->pluck('name')->contains('admin'))
                            <a href="{{ route('admin.informasi.edit', $information->id) }}" class="card-link">Edit</a>
                            <a href="#" class="card-link btn-delete-data"
                               data-route="{{ route('admin.informasi.destroy', $information->id) }}">Hapus</a>
                               @elseif(auth()->user()->roles->pluck('name')->contains('user'))
                            <a href="{{ route('admin.informasi.show', $information->id) }}" class="card-link">Tampilkan</a>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12">
            {{ $informations->links() }}
        </div>
    </div>
@endsection
