@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Cabang</h3>
                    <p class="text-subtitle text-muted">Daftar cabang yang terdaftar</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($informasis as $informasi)
            <div class="col-3">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h3>{{ $informasi->judul }}</h3>
                            <p class="card-text">
                                {{ $informasi->deskripsi }}
                            </p>
                            @if($informasi->gambar)
                                <img src="{{ asset('storage/images/informasi/' . $informasi->gambar) }}" alt="{{ $informasi->judul }}" class="img-fluid">
                            @endif
                            <a href="{{ route('admin.informasi.edit', $informasi->id) }}" class="card-link">Edit</a>
                            <a href="#" class="card-link btn-delete-data" data-route="{{ route('admin.informasi.destroy', $informasi->id) }}">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12">
            @if($informasis instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $informasis->links() }}
            @endif
        </div>
    </div>
@endsection

@push('custome-script')
    <script>

    </script>
@endpush
