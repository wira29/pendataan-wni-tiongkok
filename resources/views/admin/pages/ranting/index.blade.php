@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Ranting</h3>
                    <p class="text-subtitle text-muted">List cabang yang terdaftar</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($rantings as $ranting)
            <div class="col-3">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h3>{{ $ranting->nama }}</h3>
                            <h6>{{ $ranting->cabang->nama }}</h6>
                            <p class="card-text">
                                {{ $ranting->alamat }}
                            </p>
                            <a href="{{ route('admin.ranting.edit', $ranting->id) }}" class="card-link">Edit</a>
                            <a href="#" class="card-link btn-delete-data"
                               data-route="{{ route('admin.ranting.destroy', $ranting->id) }}">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12">
            {{ $rantings->links() }}
        </div>
    </div>

@endsection

@push('custome-script')
    <script>

    </script>
@endpush
