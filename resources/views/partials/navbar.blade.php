<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        @role('employer')
        <a href="{{ route('employer.home') }}" class="navbar-brand d-flex align-items-center text-center">
            @endrole
            @role('job_seeker')
            <a href="{{ route('dashboard.home') }}" class="navbar-brand d-flex align-items-center text-center">
                @endrole
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="{{asset('template/img/icon-deal.png')}}" alt="Icon"
                        style="width: 30px; height: 30px;">
                </div>
                <h1 class="m-0 text-primary">JobEx</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    @role('employer')
                    <a href="{{route('employer.home')}}"
                        class="nav-item nav-link {{ ($activePage ?? '') === 'home' ? 'active' : '' }}">Beranda</a>
                    @endrole
                    @role('job_seeker')
                    <a href="{{route('dashboard.home')}}"
                        class="nav-item nav-link {{ ($activePage ?? '') === 'home' ? 'active' : '' }}">Beranda</a>
                    @endrole
                    @role('admin')
                    <a href="{{route('admin.home')}}"
                        class="nav-item nav-link {{ ($activePage2 ?? '') === 'home' ? 'active' : '' }}">Beranda</a>
                    @endrole
                    <a href="" class="nav-item nav-link {{ ($activePage2 ?? '') === 'about' ? 'active' : '' }}">Tentang
                    </a>
                    <div class="nav-item dropdown">
                        @role('admin')
                        <a href="#"
                            class="nav-link dropdown-toggle {{ ($activePage2 ?? '') === 'employer' ? 'active' : '' }}"
                            data-bs-toggle="dropdown">Pemberi Kerja</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{route('admin.employerlist')}}"
                                class="dropdown-item {{ ($activeJobs ?? '') === 'employerlist' ? 'active' : '' }}">Daftar
                                Pemberi Kerja</a>
                            <a href="{{route('admin.lowonganlist')}}"
                                class="dropdown-item {{ ($activeJobs ?? '') === 'lowonganlist' ? 'active' : '' }}">Daftar
                                Lowongan</a>
                            @if(($activeJobs ?? '') === 'jobdetail' && isset($job))
                                <a href="{{ route('admin.jobdetail', $job->id) }}" class="dropdown-item active">Detail
                                    Pekerjaan</a>
                            @endif
                            @if(($activeJobs ?? '') === 'employerdetail' && isset($employer))
                                <a href="{{ route('admin.employerdetail', $employer->id) }}"
                                    class="dropdown-item active">Detail
                                    Pelamar</a>
                            @endif
                            @if(($activeJobs ?? '') === 'employerjobs' && isset($employer))
                                <a href="{{ route('admin.employerjobs', $employer->id) }}"
                                    class="dropdown-item active">Daftar Lowongan Milik {{ $employer->name }}</a>
                            @endif
                            @if(($activeJobs ?? '') === 'applicants' && isset($job))
                                <a href="{{ route('admin.jobdetail', $job->id) }}" class="dropdown-item">Detail
                                    Pekerjaan</a>
                                <a href="{{ route('employer.applicants', $job->id) }}" class="dropdown-item active">Daftar
                                    Pelamar</a>
                            @endif
                            @if(($activeJobs ?? '') === 'applicantsdetail' && isset($job))
                                <a href="{{ route('admin.jobdetail', $job->id) }}" class="dropdown-item">Detail
                                    Pekerjaan</a>
                                <a href="{{ route('employer.applicants', $job->id) }}" class="dropdown-item">Daftar
                                    Pelamar</a>
                                <a href="{{ route('employer.applicantsdetail', $lamarans->id) }}"
                                    class="dropdown-item active">Detail
                                    Pelamar</a>
                            @endif
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#"
                            class="nav-link dropdown-toggle {{ ($activePage2 ?? '') === 'jobseeker' ? 'active' : '' }}"
                            data-bs-toggle="dropdown">Pencari Kerja</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{route('admin.jobseekerlist')}}"
                                class="dropdown-item {{ ($activeJobs ?? '') === 'jobseekerlist' ? 'active' : '' }}">Daftar
                                Pencari Kerja</a>
                            <a href="{{route('jobs.favoritejobs')}}"
                                class="dropdown-item {{ ($activeJobs ?? '') === 'joblist' ? '' : '' }}">Daftar
                                Lamaran</a>
                        </div>
                    </div>
                    @endrole
                    @role('job_seeker')
                    <a href="#" class="nav-link dropdown-toggle {{ ($activePage ?? '') === 'jobs' ? 'active' : '' }}"
                        data-bs-toggle="dropdown">Pekerjaan</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{route('jobs.joblist')}}"
                            class="dropdown-item {{ ($activeJobs ?? '') === 'joblist' ? 'active' : '' }}">Daftar
                            Pekerjaan</a>
                        <a href="{{route('jobs.favoritejobs')}}"
                            class="dropdown-item {{ ($activeJobs ?? '') === 'joblist' ? '' : '' }}">Favorit</a>

                        @if(($activeJobs ?? '') === 'jobdetail' && isset($job))
                            <a href="{{ route('jobs.detail', $job->id) }}" class="dropdown-item active">Detail
                                Pekerjaan</a>
                        @endif
                        @if(($activeJobs ?? '') === 'apply' && isset($job))
                            <a href="{{ route('jobs.detail', $job->id) }}" class="dropdown-item">Detail
                                Pekerjaan</a>
                            <a href="{{route('lamaran.apply', $job->id)}}" class="dropdown-item active">Lamar
                                Pekerjaan</a>
                        @endif
                        @endrole

                        @role('employer')
                        <a href="#"
                            class="nav-link dropdown-toggle {{ ($activePage ?? '') === 'jobs' ? 'active' : '' }}"
                            data-bs-toggle="dropdown">Lowongan</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{ route('employer.myjobs') }}"
                                class="dropdown-item {{ ($activeJobs ?? '') === 'myjobs' ? 'active' : '' }}">Daftar
                                Lowongan</a>
                            @if(($activeJobs ?? '') === 'jobdetail' && isset($job))
                                <a href="{{ route('employer.jobdetail', $job->id) }}" class="dropdown-item active">Detail
                                    Lowongan</a>
                            @endif
                            @if(($activeJobs ?? '') === 'applicants' && isset($job))
                                <a href="{{ route('employer.applicants', $job->id) }}" class="dropdown-item active">Daftar
                                    Pelamar</a>
                            @endif
                            @if(($activeJobs ?? '') === 'applicantsdetail' && isset($job, $lamarans))
                                <a href="{{ route('employer.applicants', $job->id) }}" class="dropdown-item">Daftar
                                    Pelamar</a>
                                <a href="{{ route('employer.applicantsdetail', $lamarans->id) }}"
                                    class="dropdown-item active">Detail
                                    Pelamar</a>
                            @endif
                            @if(($activeJobs ?? '') === 'editjob' && isset($job))
                                <a href="{{ route('employer.jobdetail', $job->id) }}" class="dropdown-item">Detail
                                    Lowongan</a>
                                <a href="{{ route('employer.editjob', $job->id) }}" class="dropdown-item active">Edit
                                    Lowongan</a>
                            @endif
                        </div>
                    </div>
                </div>
                <a class="btn px-3 d-none d-lg-flex {{ ($activePage ?? '') === 'addjob' ? 'btn-secondary' : 'btn-primary' }}"
                    href="{{ route('employer.addjob') }}" style="margin-right:28px;">Tambah Lowongan</a>
                @endrole
                @role('job_seeker')
            </div>
</div>
<a href="{{ route('jobs.history') }}"
    class="nav-item nav-link {{ ($activePage ?? '') === 'history' ? 'active' : '' }}">Riwayat</a>
@if(($activeJobs ?? '') === 'detail' && isset($job))
    <a href="#" class="nav-link dropdown-toggle {{ ($activePage ?? '') === 'history' ? 'active' : '' }}"
        data-bs-toggle="dropdown">Riwayat</a>
    <div class="dropdown-menu rounded-0 m-0">
        <a href="{{route('jobs.detail', $job->id)}}"
            class="dropdown-item {{ ($activeJobs ?? '') === 'edit' ? 'active' : '' }}">Detail Lamaran</a>
@endif
    @if(($activeJobs ?? '') === 'edit' && isset($job, $lamarans))
        <a href="#" class="nav-link dropdown-toggle {{ ($activePage ?? '') === 'history' ? 'active' : '' }}"
            data-bs-toggle="dropdown">Riwayat</a>
        <div class="dropdown-menu rounded-0 m-0">
            <a href="{{route('jobs.detail', $job->id)}}"
                class="dropdown-item {{ ($activeJobs ?? '') === 'edit' ? 'active' : '' }}">Detail Lamaran</a>
            <a href="{{route('lamaran.editlamaran', $lamarans->id)}}"
                class="dropdown-item {{ ($activeJobs ?? '') === 'edit' ? 'active' : '' }}">Edit Lamaran</a>
    @endif
        @endrole
    </div>
    <a href="{{ route('logout') }}" class="btn btn-danger px-3 d-none d-lg-flex">LOGOUT</a>
</div>
</nav>
</div>
<!-- Navbar End -->