@extends('layouts.main')
@section('navbar')
@extends('partials.navbar', [
    'activePage' => ($status ?? '') === 'sudah_dilamar' ? 'history' : 'jobs',
    'activeJobs' => ($status ?? '') === 'sudah_dilamar' ? 'edit' : 'jobdetail'
])

@endsection

@section('content')

    <!-- jobs start -->
    <div class="container-xxl py-5">
        <div class="container">
            @if($status=='sudah_dilamar')
            <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase" style=" margin-bottom:40px;">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jobs.history') }}">Riwayat Melamar</a></li>
                    <li class="breadcrumb-item text-body active" aria-current="page">Detail Lamaran</li>
                </ol>
            </nav>
            @else
            <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase" style=" margin-bottom:40px;">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jobs.joblist') }}">Daftar Pekerjaan</a></li>
                    <li class="breadcrumb-item text-body active" aria-current="page">Detail Pekerjaan</li>
                </ol>
            </nav>
            @endif
            <div class="row align-items-start">
                <!-- Gambar -->
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $job->image) }}" class="img-fluid rounded shadow" alt="Gambar Lowongan">
                </div>

                <!-- Deskripsi -->
                <div class="col-md-6 d-flex flex-column justify-content-start ps-md-4">
                    <h1 class="mb-3 fw-bold">{{ $job->title }}</h1> <!-- Tambah ukuran & warna -->
                    <p class="mb-4 text-muted">{{ $job->description }}</p> <!-- Tambah warna abu-abu -->

                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><strong>😎 Perusahaan:</strong> {{ $job->company_name }}</li>
                        <li class="mb-2" style="margin-top:3%;"><strong>📍 Lokasi:</strong> {{ $job->location }}</li>
                        <li class="mb-2" style="margin-top:3%;"><strong>🗂 Kategori:</strong> {{ $job->category }}</li>
                        <li class="mb-2" style="margin-top:3%;"><strong>🦺 Tipe Pekerjaan:</strong>
                            {{ $job->employment_type }}</li>
                        <li class="mb-2" style="margin-top:3%;"><strong>💰 Gaji:</strong> Rp
                            {{ number_format($job->salary, 0, ',', '.') }}</li>
                        <li style="margin-top:3%;"><strong>⏳ Deadline:</strong>
                            {{ \Carbon\Carbon::parse($job->deadline)->format('d M Y H:i') }}</li>
                    </ul>

                    @if($status == 'sudah_dilamar')
                        <a href="{{ route('lamaran.editlamaran', $lamaran->id) }}" style="margin-top:1%;"
                            class="btn btn-primary btn-lg rounded-pill shadow w-75 d-flex align-items-center justify-content-center">
                            <i class="fa me-2"></i>Edit Lamaran
                        </a>
                    @else
                        <a href="{{ route('lamaran.apply', $job->id) }}" style="margin-top:1%;"
                            class="btn btn-primary btn-lg rounded-pill shadow w-75 d-flex align-items-center justify-content-center">
                            <i class="fa me-2"></i>Ajukan Lamaran
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection