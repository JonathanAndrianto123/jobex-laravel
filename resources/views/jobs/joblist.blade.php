@extends('layouts.main')

@section('navbar')
    @extends('partials.navbar', ['activePage' => 'jobs', 'activeJobs' => 'joblist'])
@endsection

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        .kebab {
            position: relative;
            top: -44px;
            left: 300px;
            margin-bottom: -8880px;
        }
    </style>
    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0 py-3" name="title" id="search-title"
                                placeholder="Temukan Pekerjaan">
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0 py-3" name="category" id="search-category">
                                <option selected>Kategori Pekerjaan</option>
                                <option value="Teknologi">Teknologi</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Kesehatan">Kesehatan</option>
                                <option value="Pendidikan">Pendidikan</option>
                                <option value="Pemasaran">Pemasaran</option>
                                <option value="Manufaktur">Manufaktur</option>
                                <option value="Desain">Desain</option>
                                <option value="Administrasi">Administrasi</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0 py-3" name="type" id="search-type">
                                <option selected>Tipe Pekerjaan</option>
                                <option value="Full-Time">Full-Time</option>
                                <option value="Part-Time">Part-Time</option>
                                <option value="Contract">Contract</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100 py-3" id="btn-search">Cari</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End -->

    <!-- jobs start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" style="margin-top:-70px;" data-wow-delay="0.1s">
                        <nav aria-label="breadcrumb animated fadeIn">
                            <ol class="breadcrumb text-uppercase" style="margin-top:30px; margin-bottom:40px;">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Beranda</a></li>
                                <li class="breadcrumb-item text-body active" aria-current="page">Daftar Pekerjaan</li>
                            </ol>
                        </nav>
                        <h1 class="mb-3">Daftar Pekerjaan</h1>
                        <p>Jelajahi lowongan kerja terbaru dari perusahaan terkemuka. Dapatkan peluang terbaik untuk karier
                            Anda!</p>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
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

    @if ($message = Session::get('info'))
        <script>
            Swal.fire({
                icon: 'question',
                title: 'Sudah Favorit',
                text: "{{ $message }}",
            });
        </script>
    @endif
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

@section('script')
    <script>
        $(document).ready(function () {
            const urlParams = new URLSearchParams(window.location.search);
            const title = urlParams.get('title') || '';
            const category = urlParams.get('category') || '';
            const type = urlParams.get('type') || '';

            $('#search-title').val(title);
            $('#search-category').val(category);
            $('#search-type').val(type);

            loadJobs(title, category, type);

            $('#btn-search').on('click', function () {
                const newTitle = $('#search-title').val();
                const newCategory = $('#search-category').val();
                const newType = $('#search-type').val();
                loadJobs(newTitle, newCategory, newType);
            });

            function loadJobs(title = '', category = '', type = '') {
                $.ajax({
                    url: "{{ route('jobs.data') }}",
                    type: "GET",
                    data: {
                        title: title,
                        category: category,
                        type: type
                    },
                    success: function (data) {
                        let jobsHtml = '';
                        if (data.length === 0) {
                            jobsHtml = `<div class="col-12 text-center"><p>Tidak ada pekerjaan ditemukan.</p></div>`;
                        }
                        data.forEach(job => {
                            jobsHtml += `
                                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                                <div class="property-item rounded overflow-hidden">
                                                    <div class="position-relative overflow-hidden">
                                                        <a href="/jobs/detail/${job.id}"><img class="img-fluid" src="${job.image ? `/storage/${job.image}` : '/img/default-profile.jpg'}"></a>
                                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">${job.category}</div>
                                                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">${job.location}</div>
                                                    </div>
                                                    <div class="p-4 pb-0">
                                                        <h5 class="text-primary mb-3">Rp ${job.salary ? job.salary : 'Negotiable'}</h5>
                                                        <a class="d-block h5 mb-2" href="/jobs/detail/${job.id}">${job.title}</a>
                                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>${job.location}</p>
                                                    </div>
                                                    <div class="d-flex border-top">
                                                        <small class="flex-fill text-center border-end py-2">
                                                            <i class="fa fa-clock text-primary me-2"></i>Deadline: ${job.deadline ? job.deadline : 'N/A'}
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>`;
                        });

                        $('#job-list').html(jobsHtml);
                    }
                });
            }
        });
    </script>
@endsection