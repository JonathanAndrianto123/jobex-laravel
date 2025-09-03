@extends('layouts.main')

@section('navbar')
    @extends('partials.navbar', ['activePage2' => 'employer', 'activeJobs' => 'employerlist'])
@endsection

@section('content')
    <style>
        .job-item {
            transition: box-shadow 0.3s ease;
            cursor: pointer;
            background: #fff;
            /* Tambah background putih */
            padding: 10px;
            /* Biar shadow terlihat jelas */
            border-radius: 8px;
            /* Supaya lebih lembut */
        }


        .job-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .tes {
            margin-top: 100px !important;
        }
    </style>

    <!-- jobs start -->
    <div class="container-xxl py-5">
        <div class="container">
            <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase" style="margin-bottom:40px;">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Beranda</a></li>
                    <li class="breadcrumb-item text-body active" aria-current="page">Daftar Pemberi Kerja</li>
                </ol>
            </nav>
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6" style="margin-bottom:-30px;">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Daftar Pemberi Kerja</h1>
                        <p>Berikut adalah daftar pemberi kerja yang telah terdaftar di platform Jobex. Anda dapat meninjau,
                            mengelola, dan memverifikasi informasi mereka untuk memastikan kualitas dan kelayakan perusahaan
                            yang bergabung.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4" id="job-list">
                <!-- job-list -->
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <a class="btn btn-primary py-3 px-5" href="">Browse More Jobs</a>
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
    @if ($message = Session::get('successupdate'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ $message }}",
            });
        </script>
    @endif
    @if ($message = Session::get('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "{{ $message }}",
            });
        </script>
    @endif
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajax({
                url: "{{ route('admin.getemployerdata') }}",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    if (data.length === 0) {
                        $('#job-list').html('<div class="text-center text-muted">Belum ada pelamar untuk lowongan ini.</div>');
                        return;
                    }

                    const urlParams = new URLSearchParams(window.location.search);
                    const from = urlParams.get('from') ?? 'myjobs';
                    let rows = '';
                    data.forEach(employers => {
                        rows += `
                                <a href="/admin/employer/detail/${employers.id}">
                                <div class="col-12 wow fadeInUp position-relative" style="margin-bottom : -20px;" data-wow-delay="0.1s">
                                <div class="d-flex border rounded p-3 align-items-start job-item">
                                <div>
                                <h5 class="mb-1">${employers.name}</h5>
                                <p class="mb-1">${employers.email}</p>
                                <div class="btn-group position-absolute gap-2" style="top: 18; right: 25;" role="group">
                            <a href="/admin/employer/jobs/${employers.id}"><button type="button" class="btn btn-primary">Daftar Lowongan</button></a>
                                <a><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal-hapus-${employers.id}">Nonaktifkan</button></a>
                            </div>
                                                    </div>
                                                </div>
                                                </div>


                                            <!-- Modal Hapus -->
                <div class="modal fade tes" id="modal-hapus-${employers.id}" tabindex="-1"
                    aria-labelledby="modalHapusLabel-${employers.id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="/employers/myjobs/applicants/detail/delete/${employers.id}" method="POST" class="modal-content">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalHapusLabel-${employers.id}">Konfirmasi Nonaktifkan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menonaktifkan lamaran dari <strong>${employers.name}</strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Nonaktifkan</button>
                            </div>
                        </form>
                    </div>
                </div>
                                        `;
                    });
                    $('#job-list').html(rows);
                }
            });
        });
    </script>
@endsection