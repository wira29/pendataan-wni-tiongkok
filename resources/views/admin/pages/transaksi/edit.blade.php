@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Edit Mobil</h3>
                    <p class="text-subtitle text-muted">Isi form dibawah ini untuk mengedit Mobil</p>
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
                                <form action="{{ route('admin.mobil.update', $mobil->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nama Mobil</label>
                                                    <input type="text" value="{{ $mobil->nama }}" id="first-name-vertical" class="form-control" name="nama" placeholder="Avanza">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Jumlah Kursi</label>
                                                    <input type="number" id="first-name-vertical" class="form-control" name="jumlah_kursi" value="{{ $mobil->jumlah_kursi }}" placeholder="6">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Merk</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" name="merk" value="{{$mobil->merk}}" placeholder="6">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Harga / hari</label>
                                                <input type="number" min="0" class="form-control" name="harga" value="{{$mobil->harga}}" placeholder="250000">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Jenis Kendaraan</label>
                                                <select class="form-control" name="jenis_kendaraan">
                                                    <option value="city car">City Car</option>
                                                    <option value="compact mpv">Compact MPV</option>
                                                    <option value="mini mpv">Mini MPV</option>
                                                    <option value="minivan">Minivan</option>
                                                    <option value="suv">SUV</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Transmisi</label>
                                                <select class="form-control" name="transmisi">
                                                    <option value="manual">Manual</option>
                                                    <option value="automatic">Automatic</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">No Polisi</label>
                                                <input type="text" class="form-control" name="no_polisi" value="{{$mobil->no_polisi}}" placeholder="N 1543 RE">
                                            </div>
                                            <div class="form-group">
                                                    <label for="current-image">Current Image</label>
                                                    <img src="{{ asset('storage/' . $mobil->gambar) }}" alt="Current Image" width="100">
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