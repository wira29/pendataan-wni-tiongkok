@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Mobil</h3>
                    <p class="text-subtitle text-muted">List Mobil</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($mobils as $mobil)
            <div class="col-3">
                <div class="card">
                    <div class="card-content">
                        <img src="{{ asset('storage/' . $mobil->gambar) }}" class="card-img-top img-fluid"
                             alt="singleminded">
                        <div class="card-body">
                            <h3>{{ $mobil->nama}}</h3>
                            <p class="card-text">
                                {{ substr($mobil->no_polisi, 0, 20)}}
                            </p>
                            @auth
                            @if(auth()->user()->roles->pluck('name')->contains('admin'))
                            <a href="{{ route('admin.mobil.edit', $mobil->id) }}" class="card-link">Edit</a>
                            <a href="#" class="card-link btn-delete-data"
                               data-route="{{ route('admin.mobil.destroy', $mobil->id) }}">Hapus</a>
                               @elseif(auth()->user()->roles->pluck('name')->contains('user'))
                            <a href="{{ route('admin.mobil.show', $mobil->id) }}" class="card-link">Tampilkan</a>
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
            {{ $mobils->links() }}
        </div>
    </div>
@endsection
