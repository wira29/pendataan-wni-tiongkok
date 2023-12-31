@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">

        <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Info</h3>
                </div>
            </div>
            @if (auth()->user()->roles->pluck('name')->contains('manajer'))
                @if($transaksisBelumDisetujui)
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="alert alert-light-warning color-warning"><i class="bi bi-exclamation-triangle"></i>
                                Anda belum menyetujui transaksi sebanyak {{ $transaksisBelumDisetujui}} <u> <a href="{{route('admin.persetujuan.index')}}">klik disini</a></u></div>
                        </div>
                    </div>
                @else
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>
                                Anda sudah menyetujui semua transaksi</div>
                        </div>
                    </div>
                    @endif
            @endif

            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Halaman Beranda</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                    <i class="bi bi-car-front me-2 mb-4"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Mobil</h6>
                                    <h6 class="font-extrabold mb-0">{{$mobils}}</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card"> 
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                    <i class="bi bi-person-circle me-2 mb-4"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Sopir</h6>
                                    <h6 class="font-extrabold mb-0">{{$sopirs}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card"> 
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                    <i class="bi bi-bucket-fill me-2 mb-4"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Transaksi</h6>
                                    <h6 class="font-extrabold mb-0">{{$transaksis}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card"> 
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Sudah Disetujui</h6>
                                    <h6 class="font-extrabold mb-0">{{$setuju}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

           
@endsection
