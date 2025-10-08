@extends('layouts.app')

@section('title', 'Cari Spesifikasi HP')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body text-center py-5">
                <h1 class="mb-4">Cari Spesifikasi HP</h1>
                <p class="text-muted mb-4">Temukan spesifikasi lengkap HP dari berbagai merek</p>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('phones.search') }}" method="GET">
                    <div class="input-group input-group-lg mb-3">
                        <input type="text"
                               class="form-control"
                               name="query"
                               placeholder="Contoh: iPhone 15, Samsung Galaxy S24, Poco X3"
                               required
                               autocomplete="off">
                        <button class="btn btn-primary px-5" type="submit">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </form>

                <div class="mt-4">
                    <p class="text-muted small">
                        <strong>Tips:</strong> Ketik nama HP yang ingin dicari, misalnya "iPhone 15 Pro Max" atau "Samsung S24 Ultra"
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h5 class="mb-3">Pencarian Populer:</h5>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('phones.search', ['query' => 'iPhone 15']) }}" class="btn btn-outline-secondary btn-sm">iPhone 15</a>
                <a href="{{ route('phones.search', ['query' => 'Samsung Galaxy S24']) }}" class="btn btn-outline-secondary btn-sm">Samsung Galaxy S24</a>
                <a href="{{ route('phones.search', ['query' => 'Xiaomi 14']) }}" class="btn btn-outline-secondary btn-sm">Xiaomi 14</a>
                <a href="{{ route('phones.search', ['query' => 'Poco X6']) }}" class="btn btn-outline-secondary btn-sm">Poco X6</a>
                <a href="{{ route('phones.search', ['query' => 'Oppo Reno']) }}" class="btn btn-outline-secondary btn-sm">Oppo Reno</a>
            </div>
        </div>
    </div>
</div>
@endsection
