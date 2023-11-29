@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Edit informasi</h3>
                    <p class="text-subtitle text-muted">Isi form dibawah ini untuk mengedit informasi</p>
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
                                <form action="{{ route('admin.informasi.update', $informasi->id) }}" method="POST" class="form form-vertical">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Judul</label>
                                                    <input type="text" value="{{ $informasi->judul }}" id="first-name-vertical" class="form-control" name="judul" placeholder="nama informasi..">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Deskripsi</label>
                                                    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="5" rows="5" placeholder="Deskripsi...">{{ $informasi->deskripsi }}</textarea>
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
