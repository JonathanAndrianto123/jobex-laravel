@extends('layouts.main')

@section('navbar')
    @extends('partials.navbar', ['activePage' => 'jobs', 'activePage2' => 'employer', 'activeJobs' => 'employerdetail'])
@endsection

@section('content')

    <style>
        .tes {
            margin-top: 100px !important;
        }
    </style>

    <!-- Detail Pelamar -->
    <div class="container-xxl py-5">
        <div class="container">
            <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase" style="margin-bottom:40px;">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.employerlist') }}">Daftar Pemberi Lowongan</a></li>
                    <li class="breadcrumb-item text-body active" aria-current="page">Detail Pelamar</li>
                </ol>
            </nav>
            <div class="row align-items-start">
                <!-- Informasi Pelamar -->
                <div class="col-md-6 d-flex flex-column justify-content-start ps-md-4">
                    <h1 class="mb-3 fw-bold">{{ $employer->name }}</h1>

                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><strong>📧 Email:</strong> {{ $employer->email }}</li>                    
                    </ul>
                </div>
            </div>
        </div>

        <!-- Modal Hapus -->
        <div class="modal fade tes" id="modal-hapus-{{ $employer->id }}" tabindex="-1"
            aria-labelledby="modalHapusLabel-{{ $employer->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('admin.employerdelete', $employer->id) }}" method="POST" class="modal-content">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalHapusLabel-{{ $employer->id }}">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus <strong>{{ $employer->name }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
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