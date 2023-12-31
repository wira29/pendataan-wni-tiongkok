@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Pembaruan Paspor</h3>
                    <p class="text-subtitle text-muted">List Paspor</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($paspors as $paspor)
            @if(!$submitPembaruanPaspor->contains('pembaruan_paspors_id', $paspor->id))
                <div class="col-3">
                    <div class="card">
                        <div class="card-content">
                            <img src="{{ asset('storage/' . $paspor->foto) }}" class="card-img-top img-fluid"
                                alt="singleminded">
                            <div class="card-body">
                                <h3>{{ $paspor->judul }}</h3>
                                <p class="card-text">
                                    {{ substr($paspor->deskripsi, 0, 50) }}...
                                </p>
                                <p class="card-text">
                                Batas Tanggal ( {{ $paspor->batas_tanggal }} )
                                </p>
                            @auth
                                @if(auth()->user()->roles->pluck('name')->contains('admin'))
                                <a href="{{ route('admin.pembaruan-paspor.detailAdmin', $paspor->id) }}" class="card-link">Detail</a>
                                <a href="{{ route('admin.pembaruan-paspor.edit', $paspor->id) }}" class="card-link">Edit</a>
                                <a href="#" class="card-link btn-delete-data"
                                data-route="{{ route('admin.pembaruan-paspor.destroy', $paspor->id) }}">Hapus</a>
                                @elseif(auth()->user()->roles->pluck('name')->contains('user'))
                                <!-- jika data sudah terisi jangan tampilkan perbarui -->
                                    @if($submitPembaruanPaspor->contains('pembaruan_paspors_id', $paspor->id))
                                    <p>Sudah Terisi</p>
                                    @elseif(!$submitPembaruanPaspor->contains('pembaruan_paspors_id', $paspor->id))
                                        <a href="{{ route('admin.pembaruan-paspor.show', $paspor->id) }}" class="card-link">Perbarui</a>
                                        @endif
                                @endif
                            @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    @if(auth()->user()->roles->pluck('name')->contains('user'))
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Halaman Pembaruan Paspor</h3>
                        <p class="text-subtitle text-muted">List Paspor</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($paspors as $paspor)
                @if($submitPembaruanPaspor->contains('pembaruan_paspors_id', $paspor->id))
            
                    <div class="col-3">
                        <div class="card">
                            <div class="card-content">
                                <img src="{{ asset('storage/' . $paspor->foto) }}" class="card-img-top img-fluid"
                                    alt="singleminded">
                                <div class="card-body">
                                    <h3>{{ $paspor->judul }}</h3>
                                    <p class="card-text">
                                        {{ substr($paspor->deskripsi, 0, 50) }}...
                                    </p>
                                    <p class="card-text">
                                    Batas Tanggal ( {{ $paspor->batas_tanggal }} )
                                    </p>
                                @auth
                                    @if(auth()->user()->roles->pluck('name')->contains('admin'))
                                    <a href="{{ route('admin.pembaruan-paspor.detailAdmin', $paspor->id) }}" class="card-link">Detail</a>
                                    <a href="{{ route('admin.pembaruan-paspor.edit', $paspor->id) }}" class="card-link">Edit</a>
                                    <a href="#" class="card-link btn-delete-data"
                                    data-route="{{ route('admin.pembaruan-paspor.destroy', $paspor->id) }}">Hapus</a>
                                    @elseif(auth()->user()->roles->pluck('name')->contains('user'))
                                    <!-- jika data sudah terisi jangan tampilkan perbarui -->
                                        @if($submitPembaruanPaspor->contains('pembaruan_paspors_id', $paspor->id))
                                        <p>Sudah Terisi</p>
                                        @elseif(!$submitPembaruanPaspor->contains('pembaruan_paspors_id', $paspor->id))
                                            <a href="{{ route('admin.pembaruan-paspor.show', $paspor->id) }}" class="card-link">Perbarui</a>
                                            @endif
                                    @endif
                                @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        @endif
    <div class="row">
        <div class="col-12">
            {{ $paspors->links() }}
        </div>
    </div>
@endsection
