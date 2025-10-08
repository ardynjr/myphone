@extends('layouts.app')

@section('title', 'Error')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="alert alert-danger">
            <h4><i class="bi bi-exclamation-triangle"></i> Terjadi Kesalahan</h4>
            <p>{{ $message }}</p>
            <hr>
            <a href="{{ route('phones.index') }}" class="btn btn-primary">
                <i class="bi bi-house"></i> Kembali ke Halaman Utama
            </a>
        </div>
    </div>
</div>
@endsection
