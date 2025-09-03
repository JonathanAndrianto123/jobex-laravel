@extends('layouts.main')
@section('navbar')
@extends('partials.navbar', ['activePage' => 'jobs', 'activeJobs'=>'apply'])
@endsection
@section('content')
<style>
    .tes {
        margin-left: -30px;
    }
</style>
    <div class="container-xxl py-5">
        <div class="container">
        <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase" style=" margin-bottom:40px;">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jobs.joblist') }}">Daftar Pekerjaan</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jobs.detail', $job->id) }}">Detail Pekerjaan</a></li>
                    <li class="breadcrumb-item text-body active" aria-current="page">Lamar Pekerjaan</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft"  data-wow-delay="0.1s">
                        <h1 class="mb-3 text-center" style="margin-left:-210px;">Ajukan Lamaran</h1>
                        <p class="text-center" style="margin-left:-170px;">Ambil langkah pertama menuju karier impianmu!</p>
                    </div>
                </div>
                <div class="container-fluid header">
                    <div class="row">
                        <div class="col-md-6 p-5 ">
                            <form action="{{ route('lamaran.store', $job->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <br>
                                <br>
                                <div class="mb-3 tes">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="name" placeholder="Masukan nama lengkap"
                                        required>
                                </div>

                                <div class="mb-3 tes">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Masukkan email"
                                        required>
                                </div>

                                <div class="mb-3 tes">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" name="phone"
                                        placeholder="Masukkan nomor WhatsApp" required>
                                </div>

                                <div class="mb-3 tes">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="address"
                                        placeholder="Misalnya : Jl.Jend. Sudirman, Yogyakarta" required>
                                </div>

                                <div class="mb-3 tes">
                                    <label for="cv" class="form-label">Upload CV (PDF)</label>
                                    <input type="file" class="form-control" name="cv" accept=".pdf">
                                </div>

                                <div class="mb-3 tes">
                                    <label for="message" class="form-label">Pesan (Opsional)</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Mengapa kami harus menerimamu"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary py-3 px-5">Kirim Lamaran</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection