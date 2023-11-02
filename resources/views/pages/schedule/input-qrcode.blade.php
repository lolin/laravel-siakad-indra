@extends('layouts.app')

@section('title', 'Absensi Mata Kuliah')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Absensi Mata Kuliah</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Users</a></div>
                <div class="breadcrumb-item">Absensi Mata Kuliah</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="{{ route('generate-qrcode-update',$schedule) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Absensi Mata Kuliah</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Code QRCode</label>
                                    <input type="text" class="form-control @error('code') is-invalid
                                            @enderror" name="code" required="">
                                    @error('code')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->

<!-- Page Specific JS File -->
@endpush
