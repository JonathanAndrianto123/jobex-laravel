@extends('layouts.main')

@section('navbar')
    @extends('partials.navbar', ['activePage2' => 'home'])
@endsection

@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <br>
                <br>
                <h1 class="display-5 animated fadeIn mb-4">Selamat Datang di <span class="text-primary">Dashboard
                        Admin</span></h1>
                <p class="animated fadeIn mb-4 pb-2">Pengelolaan platform Jobex yang efisien dan mudah, memantau dan
                    mengelola pekerjaan, kandidat, serta statistik platform Anda.</p>
            </div>
            <div class="col-md-6 animated fadeIn">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="{{ asset('template/img/carousel-1.jpg') }}" alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="{{ asset('template/img/carousel-2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Dashboard Stats Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="text-center mx-auto text-white" style="max-width: 600px;">
                <h1 class="mb-3">Dashboard Admin</h1>
                <p>Di sini, Anda dapat memantau statistik platform Jobex, termasuk pekerjaan yang diposting, kandidat yang
                    melamar, dan aktivitas lainnya.</p>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5" style="margin-top:-60px">
        <div class="container">
            <div class="row g-4">
                <!-- Job Count -->
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light text-center rounded p-3">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <i class="bi bi-briefcase" style="font-size: 2rem;"></i>
                            </div>
                            <h6>Jumlah Pekerjaan</h6>
                            <span>{{ $jobCount }}</span>
                        </div>
                    </div>
                </div>

                <!-- Candidate Count -->
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light text-center rounded p-3">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <i class="bi bi-person" style="font-size: 2rem;"></i>
                            </div>
                            <h6>Jumlah Kandidat</h6>
                            <span>{{ $candidateCount }}</span>
                        </div>
                    </div>
                </div>

                <!-- Applications Count -->
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light text-center rounded p-3">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <i class="bi bi-journal-check" style="font-size: 2rem;"></i>
                            </div>
                            <h6>Lamaran Dikirim</h6>
                            <span>{{ $applicationCount }}</span>
                        </div>
                    </div>
                </div>

                <!-- Active Employers -->
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="bg-light text-center rounded p-3">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <i class="bi bi-building" style="font-size: 2rem;"></i>
                            </div>
                            <h6>Perusahaan Aktif</h6>
                            <span>{{ $activeEmployers }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Stats End -->

    <!-- Recent Jobs Start -->
    <div class="container-xxl py-5" style="margin-top:-20px">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Pekerjaan Terbaru</h1>
                <p>Berikut adalah daftar pekerjaan terbaru yang diposting di platform Jobex.</p>
            </div>
            <div class="row g-4">
                @foreach ($recentJobs as $job)
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="cat-item d-block bg-light text-center rounded p-3">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <i class="bi bi-briefcase" style="font-size: 2rem;"></i>
                                </div>
                                <h6>{{ $job->title }}</h6>
                                <span>{{ $job->category }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Recent Jobs End -->
@endsection