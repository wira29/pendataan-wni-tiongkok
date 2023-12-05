@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <p class="text-subtitle text-muted">Form dibawah adalah Data yang diupload oelh user</p>
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
                                <!-- ... Form fields ... -->
                                <div class="form-group">
                                    <label for="first-name-vertical">File Yang Diupload</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="file" value="{{ $pembaruan->file }}" placeholder="file" readonly>
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('admin.download-file', $pembaruan->id) }}" class="btn btn-primary">Unduh File</a>
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
