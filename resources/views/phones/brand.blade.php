@extends('layouts.app')

@section('title', 'Daftar HP')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">Daftar HP {{ ucfirst($brandSlug) }}</h2>
        <div class="row">
            @if(isset($phones->data->phones))
                @foreach($phones->data->phones as $phone)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        @if(isset($phone->image))
                        <img src="{{ $phone->image }}" class="card-img-top" alt="{{ $phone->phone_name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $phone->phone_name }}</h5>
                            <a href="{{ route('phones.detail', $phone->slug) }}" class="btn btn-info btn-sm">Lihat Spesifikasi</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p>Data HP tidak tersedia.</p>
            @endif
        </div>
    </div>
</div>
@endsection
