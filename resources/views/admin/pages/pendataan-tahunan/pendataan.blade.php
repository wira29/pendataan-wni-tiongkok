@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Pembaruan Passport</h3>
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
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nama Lengkap</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" name="nama" value="{{ $user->nama }}" placeholder ="Nama">
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
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Tanggal Lahir</label>
                                                    <input name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" type="date" class="form-control mb-3 flatpickr-no-config" placeholder="Select date..">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Tempat Lahir</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Keperluan</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" name="keperluan" placeholder="Status/Keperluan di Tiongkok">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Email Aktif</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" name="email" value="{{$user->email}}" placeholder="Status/Keperluan di Tiongkok">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">No.Hp Tiongkok</label>
                                                    <input type="number" id="first-name-vertical" class="form-control" name="no_hp_tiongkok" placeholder="No.Hp Tiongkok">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nomor Passport</label>
                                                    <input type="number" id="first-name-vertical" class="form-control" name="no_paspor" placeholder="No.Hp Tiongkok">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Masa Berlaku Pasport</label>
                                                    <input name="masa_berlaku_paspor" value="{{ old('masa_berlaku_paspor') }}" type="date" class="form-control mb-3 flatpickr-no-config" placeholder="Select date..">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nomor Visa</label>
                                                    <input type="number" id="first-name-vertical" class="form-control" name="no_visa" placeholder="Nomor Visa">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Masa Berlaku Visa</label>
                                                    <input name="masa_berlaku_visa" value="{{ old('masa_berlaku_visa') }}" type="date" class="form-control mb-3 flatpickr-no-config" placeholder="Select date..">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nama Kontak Darurat</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" name="nama_kontak_darurat" placeholder="Nama Kontak Darurat">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nomor Kontak Darurat</label>
                                                    <input type="number" id="first-name-vertical" class="form-control" name="no_kontak_darurat" placeholder="Nomor Kontak Darurat">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Hubungan Dengan Kontak Darurat</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" name="hubungan_kontak_darurat" placeholder="Hubungan Dengan Kontak Darurat">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Alamat Lengkap di Indonesia</label>
                                                    <textarea class="form-control" name="deskripsi" id="alamat" cols="5" rows="5" placeholder="deskripsi...">{{ $user->alamat_indonesia }}</textarea>
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
