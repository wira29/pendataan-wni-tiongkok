@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Beranda</h3>
{{--                    <p class="text-subtitle text-muted">This is a blank page</p>--}}


                </div>
            </div>
            @if (auth()->user()->roles->pluck('name')->contains('user'))
                @if($pendataans > 0)
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="alert alert-light-warning color-warning"><i class="bi bi-exclamation-triangle"></i>
                                Anda belum mengisi {{ $pendataans }} pendataan tahunan.</div>
                        </div>
                    </div>
                @endif
                @if($pembaruanPaspor > 0)
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="alert alert-light-info color-info"><i class="bi bi-exclamation-triangle"></i>
                                Terdapat {{ $pembaruanPaspor }} event pembaruan paspor.</div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection
