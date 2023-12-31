@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Edit Sopir</h3>
                    <p class="text-subtitle text-muted">Isi form dibawah ini untuk mengedit Sopir</p>
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
                                <form action="{{ route('admin.sopir.update', $sopir->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-body">
                                    <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nama</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" value="{{ $sopir->nama }}" name="nama" placeholder="Budi Hartono">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Sim</label>
                                                    <input type="number" id="first-name-vertical" value="{{ $sopir->sim }}"class="form-control" name="sim" placeholder="90283423">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Alamat</label>
                                                    <textarea class="form-control" name="alamat" value="{{ $sopir->alamat}}" id="alamat" cols="5" rows="5" placeholder="Jl. Harui">{{ $sopir->nama }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                            <div class="form-group">
                                                    <label for="current-image">Current Image</label>
                                                    <img src="{{ asset('storage/' . $sopir->gambar) }}" alt="Current Image" width="100">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                        <label for="email-id-vertical">Gambar</label>
                                                        <input type="file" class="form-control" name="gambar" id="gambar">
                                                    </div>
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