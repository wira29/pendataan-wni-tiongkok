@extends('admin.layouts.app')

@section('content')

<style>
    .avatar-wrapper {
        position: relative;
        height: 100px;
        width: 100px;
        overflow: hidden;
        border-radius: 50%;
        margin: auto;
    }

    .profile-pic {
        width: 100%;
        height: auto;
        border-radius: 50%;
    }

    /* Style untuk tombol Reset */
    .avatar-wrapper .profile-pic {
        border: 2px solid #61a0ff;
    }
</style>

    <div class="card">
    <div class="card-header">
        <h4 class="card-title">Data Profile dari {{$user->nama}}</h4>
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
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="{{ route('admin.profile.update', $user->id) }}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-body">
                        <div class="row">
                        @foreach([$user] as $user)
                            <div class="col-6">
                                <div class="form-group has-icon-left">
                                    <label for="nik-id-icon">NIK</label>
                                    <div class="position-relative">
                                        <input type="number" class="form-control" placeholder="NIK" value="{{ $user->nik }}" id="nik-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group has-icon-left">
                                    <label for="nama-id-icon">Nama</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{ $user->nama }}" id="nama-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Email</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}" id="email-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group has-icon-left">
                                    <label for="mobile-id-icon">No.Hp</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Mobile" name="no_hp" value="{{ $user->no_hp }}" id="mobile-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-phone"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                <label for="gender-id-icon">Gender</label>
                                <select class="form-select" id="gender-id-icon" name="gender">
                                    <option value="laki-laki" {{ $user->gender == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="perempuan" {{ $user->gender == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                    <label for="alamat-indonesia">Alamat di Indonesia</label>
                                    <textarea class="form-control" id="alamat-indonesia" rows="3" name="alamat_indonesia" placeholder="Alamat di Indonesia">{{ $user->alamat_indonesia }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="alamat-tiongkok">Alamat di Tiongkok</label>
                                    <textarea class="form-control" id="alamat-tiongkok" rows="3" name="alamat_tiongkok" placeholder="Alamat di Tiongkok">{{ $user->alamat_tiongkok }}</textarea>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" onchange="previewImage(this)">
                                    @error('foto')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <img id="preview" class="profile-pic" src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('assets/compiled/jpg/1.jpg') }}" alt="Foto">
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

<script>
        // Fungsi untuk menampilkan preview gambar
        function previewImage(input) {
            var preview = document.getElementById('preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "{{ $user->foto ? asset('storage/' . $user->foto) : asset('assets/compiled/jpg/1.jpg') }}";
            }
        }
    </script>