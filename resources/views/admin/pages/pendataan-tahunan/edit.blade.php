@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Edit Pendataan Tahunan</h3>
                    <p class="text-subtitle text-muted">Isi form dibawah ini untuk menambah pendataan tahunan</p>
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
                                <form action="{{ route('admin.pendataan.update', $pendataan->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Judul</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" name="judul" value="{{ $pendataan->judul }}" placeholder="Judul pendataan tahunan..">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Deskripsi</label>
                                                    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="5" rows="5" placeholder="deskripsi...">{{ $pendataan->deskripsi }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="batas-tanggal">Batas Tanggal Pendataan</label>
                                                    <input name="batas_tanggal" value="{{ $pendataan->batas_tanggal ? \Carbon\Carbon::parse($pendataan->batas_tanggal)->format('Y-m-d') : '' }}" type="date" class="form-control mb-3" id="batas-tanggal" placeholder="Select date..">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                            <div class="form-group">
                                                    <label for="current-image">Current Image</label>
                                                    <img src="{{ asset('storage/' . $pendataan->foto) }}" alt="Current Image" width="100">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="foto">Change Image</label>
                                                    <input type="file" id="foto" class="form-control" name="foto" accept="image/*">
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
