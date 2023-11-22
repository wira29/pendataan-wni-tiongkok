@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Cabang</h3>
                    <p class="text-subtitle text-muted">List cabang yang terdaftar</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($cabangs as $cabang)
            <div class="col-3">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h3>{{ $cabang->nama }}</h3>
                            <p class="card-text">
                                {{ $cabang->alamat }}
                            </p>
                            <a href="{{ route('admin.cabang.edit', $cabang->id) }}" class="card-link">Edit</a>
                            <a href="#" class="card-link btn-delete-data" data-route="{{ route('admin.cabang.destroy', $cabang->id) }}">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12">
            {{ $cabangs->links() }}
        </div>
    </div>


@endsection

@push('custome-script')
    <script>

    </script>
@endpush
