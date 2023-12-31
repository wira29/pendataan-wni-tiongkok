@extends('admin.layouts.app')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Tambah Mobil</h3>
                    <p class="text-subtitle text-muted">Isi form dibawah ini untuk menambah Mobil</p>
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
                                <form action="{{ route('admin.transaksi.store') }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Nama Peminjam</label>
                                            <input type="text" class="form-control" name="nama_peminjam" id="namapeminjam" value="{{ old('nama_peminjam') }}" placeholder="Budiono" >
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">No Hp</label>
                                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" placeholder="08512342333" >
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ old('alamat') }}" placeholder="N 1543 RE" >
                                        </div>
                                        
                                        
                                        <div class="col-6">
                                            <label class="form-label">Mobil</label>
                                            <select class="form-control" name="id_mobil" id="mobilDropdown">
                                                @foreach ($mobils as $mobil)
                                                    <option value="{{ $mobil->id }}">{{ $mobil->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">No Polisi</label>
                                            <input type="text" class="form-control" name="no_polisi" id="noPolisi" value="{{ old('no_polisi') }}" placeholder="N 1543 RE" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Nama Pengemudi</label>
                                            <select class="form-control" name="id_driver">
                                                @foreach ($drivers as $driver)
                                                    <option value="{{ $driver->id }}">{{ $driver->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="tanggal-pinjam">Tanggal Pinjam</label>
                                                    <input type="date" id="tanggal-pinjam" class="form-control" name="tanggalpinjam" value="{{ old('tanggal_pinjam', now()->toDateString()) }}" placeholder="Tanggal Pinjam">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Tanggal Kembali</label>
                                                    <input type="date" id="first-name-vertical" class="form-control" name="tanggalkembali" value="{{ old('merk') }}" placeholder="6">
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-start mt-3">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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

<!-- AJAX Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#mobilDropdown').change(function () {
            var mobilId = $(this).val();

            // Make an AJAX request to get the No Polisi based on the selected Mobil
            $.ajax({
                type: 'GET',
                url: '/admin/get-no-polisi/' + mobilId,
                success: function (data) {
                    $('#noPolisi').val(data.no_polisi);
                },
                error: function (error) {
                    console.log(error.responseText); // Log the error response
                }
            });
        });
    });
</script>
@endsection
