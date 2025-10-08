@extends('layouts.app')

@section('title', 'Hasil Pencarian')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Hasil Pencarian: "{{ $query }}"</h2>
            <a href="{{ route('phones.index') }}" class="btn btn-outline-primary">Cari Lagi</a>
        </div>

        {{-- Debug: tampilkan isi results --}}
        {{-- <pre>{{ print_r($results, true) }}</pre> --}}

        @if(is_array($results) && count($results) > 0)
            <p class="text-muted mb-4">Ditemukan {{ count($results) }} hasil</p>
            <div class="row">
                @foreach($results as $phone)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if(isset($phone['image']))
                        <img src="{{ $phone['image'] }}"
                             class="card-img-top p-3"
                             alt="{{ $phone['name'] }}"
                             style="height: 200px; object-fit: contain;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">{{ $phone['name'] }}</h6>
                            @if(isset($phone['id']))
                            <div class="mt-auto">
                                <a href="{{ route('phones.detail', $phone['id']) }}"
                                   class="btn btn-primary btn-sm w-100">
                                    Lihat Spesifikasi
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                <h5>Tidak ada hasil ditemukan</h5>
                <p>Tidak ditemukan HP dengan nama "{{ $query }}". Coba gunakan kata kunci lain.</p>
                <p class="mb-2"><strong>Tips pencarian:</strong></p>
                <ul class="mb-3">
                    <li>Gunakan keyword yang lebih umum (contoh: "Poco" atau "X6")</li>
                    <li>Coba nama merek saja (contoh: "Samsung", "iPhone")</li>
                    <li>Cek ejaan nama HP</li>
                </ul>
                <a href="{{ route('phones.index') }}" class="btn btn-primary">Kembali ke Halaman Utama</a>
            </div>
        @endif
    </div>
</div>
@endsection
