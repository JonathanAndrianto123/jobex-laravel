@extends('layouts.main')
@section('navbar')
    @extends('partials.navbar', ['activePage' => 'jobs', 'activePage2' => 'employer', 'activeJobs' => 'jobdetail'])
@endsection

@section('content')

    <style>
        .tes {
            margin-top: 100px !important;
        }
    </style>

    <!-- jobs start -->
    <div class="container-xxl py-5">
        <div class="container">
            <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase" style="margin-bottom:40px;">
                    <li class="breadcrumb-item"><a href="{{ route('employer.home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('employer.myjobs') }}">Daftar Lowongan</a></li>
                    <li class="breadcrumb-item text-body active" aria-current="page">Detail Lowongan</li>
                </ol>
            </nav>
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
                        <li class="mb-2" style="margin-top:3%;"><strong>ID Pembuat Lowongan:</strong> {{ $employer->id }}</li>
                        <li class="mb-2" style="margin-top:3%;"><strong>Nama Pembuat Lowongan:</strong> {{ $employer->name }}</li>
                        <li class="mb-2" style="margin-top:3%;"><strong>Perusahaan:</strong> {{ $job->company_name }}</li>
                        <li class="mb-2" style="margin-top:3%;"><strong>Lokasi:</strong> {{ $job->location }}</li>
                        <li class="mb-2" style="margin-top:3%;"><strong>Kategori:</strong> {{ $job->category }}</li>
                        <li class="mb-2" style="margin-top:3%;"><strong>Tipe Pekerjaan:</strong>
                            {{ $job->employment_type }}</li>
                        <li class="mb-2" style="margin-top:3%;"><strong>Gaji:</strong> Rp
                            {{ number_format($job->salary, 0, ',', '.') }}
                        </li>
                        <li style="margin-top:3%;"><strong>Deadline:</strong>
                            {{ \Carbon\Carbon::parse($job->deadline)->format('d M Y H:i') }}</li>
                    </ul>

                    <div class="btn-group" role="group">
                        <a href="{{ route('employer.applicants', [$job->id, 'from'=>'detail']) }}" type="button"
                            class="btn btn-primary">Pelamar</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modal-hapus-{{ $job->id }}">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Hapus -->
        <div class="modal fade tes" id="modal-hapus-{{ $job->id }}" tabindex="-1"
            aria-labelledby="modalHapusLabel-{{ $job->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('employer.delete', $job->id) }}" method="POST" class="modal-content">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalHapusLabel-{{ $job->id }}">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus lowongan <strong>{{ $job->title }}</strong> dari
                        <strong>{{ $job->company_name }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <link href="
            https://cdn.jsdelivr.net/npm/sweetalert2@11.19.1/dist/sweetalert2.min.css
            " rel="stylesheet">
    <script src="
            https://cdn.jsdelivr.net/npm/sweetalert2@11.19.1/dist/sweetalert2.all.min.js
            "></script>

    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ $message }}",
            });
        </script>
    @endif


@endsection