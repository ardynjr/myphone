@extends('layouts.app')

@section('title', 'Detail Spesifikasi HP')

@section('content')
<div class="row">
    <div class="col-md-12 mb-3">
        <a href="javascript:history.back()" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <!-- Gambar HP -->
                    <div class="col-md-4">
                        @if(isset($images['images']) && count($images['images']) > 0)
                            <div id="phoneCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($images['images'] as $index => $image)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ $image }}" class="d-block w-100" alt="{{ $phone['name'] }}">
                                    </div>
                                    @endforeach
                                </div>
                                @if(count($images['images']) > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#phoneCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#phoneCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </button>
                                @endif
                            </div>
                        @else
                            <div class="text-center p-5 bg-light">
                                <p class="text-muted">Gambar tidak tersedia</p>
                            </div>
                        @endif
                    </div>

                    <!-- Info HP -->
                    <div class="col-md-8">
                        <h2 class="mb-3">{{ $phone['name'] }}</h2>

                        <!-- Network -->
                        @if(isset($phone['network']))
                        <div class="mb-3">
                            <h5><i class="bi bi-reception-4"></i> Network</h5>
                            <p>{{ $phone['network'] }}</p>
                        </div>
                        @endif

                        <!-- Launch -->
                        @if(isset($phone['launced']))
                        <div class="mb-3">
                            <h5><i class="bi bi-calendar-event"></i> Launch</h5>
                            <p><strong>Announced:</strong> {{ $phone['launced']['announced'] ?? '-' }}</p>
                            <p><strong>Status:</strong> {{ $phone['launced']['status'] ?? '-' }}</p>
                        </div>
                        @endif

                        <!-- Body -->
                        @if(isset($phone['body']))
                        <div class="mb-3">
                            <h5><i class="bi bi-phone"></i> Body</h5>
                            <p><strong>Dimensions:</strong> {{ $phone['body']['dimension'] ?? '-' }}</p>
                            <p><strong>Weight:</strong> {{ $phone['body']['weight'] ?? '-' }}</p>
                            @if(isset($phone['body']['sim']))
                            <p><strong>SIM:</strong> {{ $phone['body']['sim'] }}</p>
                            @endif
                        </div>
                        @endif

                        <!-- Display -->
                        @if(isset($phone['display']))
                        <div class="mb-3">
                            <h5><i class="bi bi-display"></i> Display</h5>
                            <p><strong>Type:</strong> {{ $phone['display']['type'] ?? '-' }}</p>
                            <p><strong>Size:</strong> {{ $phone['display']['size'] ?? '-' }}</p>
                            <p><strong>Resolution:</strong> {{ $phone['display']['resolution'] ?? '-' }}</p>
                            @if(isset($phone['display']['protection']))
                            <p><strong>Protection:</strong> {{ $phone['display']['protection'] }}</p>
                            @endif
                        </div>
                        @endif

                        <!-- Platform -->
                        @if(isset($phone['platform']))
                        <div class="mb-3">
                            <h5><i class="bi bi-cpu"></i> Platform</h5>
                            <p><strong>OS:</strong> {{ $phone['platform']['os'] ?? '-' }}</p>
                            <p><strong>Chipset:</strong> {{ $phone['platform']['chipset'] ?? '-' }}</p>
                            <p><strong>CPU:</strong> {{ $phone['platform']['cpu'] ?? '-' }}</p>
                            @if(isset($phone['platform']['gpu']))
                            <p><strong>GPU:</strong> {{ $phone['platform']['gpu'] }}</p>
                            @endif
                        </div>
                        @endif

                        <!-- Memory -->
                        @if(isset($phone['memory']))
                        <div class="mb-3">
                            <h5><i class="bi bi-sd-card"></i> Memory</h5>
                            @if(isset($phone['memory']['cardslot']))
                            <p><strong>Card Slot:</strong> {{ $phone['memory']['cardslot'] }}</p>
                            @endif
                            <p><strong>Internal:</strong> {{ $phone['memory']['internal'] ?? '-' }}</p>
                        </div>
                        @endif

                        <!-- Main Camera -->
                        @if(isset($phone['main_camera']))
                        <div class="mb-3">
                            <h5><i class="bi bi-camera"></i> Main Camera</h5>
                            @foreach($phone['main_camera'] as $key => $value)
                            <p><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</p>
                            @endforeach
                        </div>
                        @endif

                        <!-- Selfie Camera -->
                        @if(isset($phone['selfie_camera']))
                        <div class="mb-3">
                            <h5><i class="bi bi-camera-fill"></i> Selfie Camera</h5>
                            @foreach($phone['selfie_camera'] as $key => $value)
                            <p><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</p>
                            @endforeach
                        </div>
                        @endif

                        <!-- Battery -->
                        @if(isset($phone['battery']))
                        <div class="mb-3">
                            <h5><i class="bi bi-battery-charging"></i> Battery</h5>
                            @foreach($phone['battery'] as $key => $value)
                            <p><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</p>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
