@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Informasi</h3>
                    <p class="text-subtitle text-muted">Isi form dibawah ini untuk menambah informasi terbaru</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if($errors->any())
                        <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-circle"></i> Kesalahan
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nama</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" name="judul" value="{{ $user->nama }}" placeholder="Nama" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="form-group">
                                                <label for="gender-id-icon">Gender</label>
                                                <select class="form-select" id="gender-id-icon" name="gender">
                                                    <option value="laki-laki" {{ $user->gender == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                                    <option value="perempuan" {{ $user->gender == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                </select>
                                                </div>
                                            </div>

                                            
                                            
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Gambar</label>
                                                    <input type="file" id="first-name-vertical" class="form-control" name="gambar">
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custome-script')
    <script>
        flatpickr('.flatpickr-no-config', {
            enableTime: true,
            dateFormat: "Y-m-d",
        })
    </script>
@endpush
