@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pengisian {{$EvPendataan->judul}}</h3>
                    <p class="text-subtitle text-muted">Form dibawah adalah pengisian anda sebelumnya</p>
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
                                <form action="#" method="POST" enctype="multipart/form-data" class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nama Lengkap</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" name="nama" value="{{ $user->nama }}" placeholder ="Nama" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Gender</label>
                                                    <input type="text" id="first-name-vertical"  value="{{ ($user->gender)}}" class="form-control" value="" name="tempat_lahir" placeholder="Tempat Lahir" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Tanggal Lahir</label>
                                                    <input type="text" id="first-name-vertical"  value="{{ $pendataan->tanggal_lahir ? \Carbon\Carbon::parse($pendataan->tanggal_lahir)->format('Y-m-d') : '' }}" class="form-control" value="" name="tempat_lahir" placeholder="Tempat Lahir" readonly>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Tempat Lahir</label>
                                                    <input type="text" id="first-name-vertical" value="{{$pendataan->tempat_lahir}}" class="form-control" value="" name="tempat_lahir" placeholder="Tempat Lahir" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Keperluan</label>
                                                    <input type="text" id="first-name-vertical" value="{{$pendataan->keperluan}}" class="form-control" name="keperluan" placeholder="Status/Keperluan di Tiongkok" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Email Aktif</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" name="email" value="{{$user->email}}" placeholder="Status/Keperluan di Tiongkok" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">No.Hp Tiongkok</label>
                                                    <input type="number" id="first-name-vertical" class="form-control" value="{{$pendataan->no_hp_tiongkok}}" name="no_hp_tiongkok" placeholder="No.Hp Tiongkok" readonly> 
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nomor Passport</label>
                                                    <input type="number" id="first-name-vertical" value="{{$pendataan->no_paspor}}" class="form-control" name="no_paspor" placeholder="No.Hp Tiongkok" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Masa Berlaku Passport</label>
                                                    <input type="text" id="first-name-vertical" value="{{$pendataan->masa_berlaku_paspor}}" class="form-control" name="no_paspor" placeholder="No.Hp Tiongkok" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nomor Visa</label>
                                                    <input type="number" id="first-name-vertical" class="form-control"  value="{{$pendataan->no_visa}}" name="no_visa" placeholder="Nomor Visa" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Masa Berkalu Visa</label>
                                                    <input type="text" id="first-name-vertical" class="form-control"  value="{{$pendataan->masa_berlaku_visa}}" name="no_visa" placeholder="Nomor Visa" readonly>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nama Kontak Darurat</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" value="{{$pendataan->nama_kontak_darurat}}" name="nama_kontak_darurat" placeholder="Nama Kontak Darurat" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nomor Kontak Darurat</label>
                                                    <input type="number" id="first-name-vertical" class="form-control" value="{{$pendataan->no_kontak_darurat}}" name="no_kontak_darurat" placeholder="Nomor Kontak Darurat" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Hubungan Dengan Kontak Darurat</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" value="{{$pendataan->hubungan_kontak_darurat}}" name="hubungan_kontak_darurat" placeholder="Hubungan Dengan Kontak Darurat" readonly>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Alamat Lengkap di Indonesia</label>
                                                    <textarea class="form-control" name="deskripsi" id="alamat" cols="5" rows="5" placeholder="deskripsi..." readonly>{{ $user->alamat_indonesia }}</textarea>
                                                </div>
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
