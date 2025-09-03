@extends('layouts.main')

@section('navbar')
@extends('partials.navbar', ['activePage' => 'home'])
@endsection
@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <br>
                <br>
                <h1 class="display-5 animated fadeIn mb-4">Temukan <span class="text-primary">Pekerjaan Impian</span> yang
                    Sempurna</h1>
                <p class="animated fadeIn mb-4 pb-2">Jobex adalah platform yang menghubungkan pencari kerja dengan beragam
                    peluang karier, dari startup hingga perusahaan besar, dengan fitur pencarian yang memudahkan menemukan
                    pekerjaan sesuai keahlian dan minat Anda.</p>
            </div>
            <div class="col-md-6 animated fadeIn">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="{{asset('template/img/carousel-1.jpg')}}" alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="{{asset('template/img/carousel-2.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


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


    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Tipe Pekerjaan</h1>
                <p>Jobex menyediakan berbagai jenis pekerjaan dari berbagai bidang, seperti teknologi, keuangan, kesehatan,
                    pendidikan, dan lainnya.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('jobs.joblist') }}?category=Teknologi&type=Tipe Pekerjaan">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <i class="bi bi-motherboard" style="font-size: 2rem;"></i>
                            </div>
                            <h6>Teknologi</h6>
                            <span>123 Properties</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('jobs.joblist') }}?category=Keuangan&type=Tipe Pekerjaan">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <i class="bi bi-coin" style="font-size: 2rem;"></i>
                            </div>
                            <h6>Keuangan</h6>
                            <span>123 Properties</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('jobs.joblist') }}?category=Kesehatan&type=Tipe Pekerjaan">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <i class="bi bi-hospital" style="font-size: 2rem;"></i>
                            </div>
                            <h6>Kesehatan</h6>
                            <span>123 Properties</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('jobs.joblist') }}?category=Pendidikan&type=Tipe Pekerjaan">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <i class="bi bi-journals" style="font-size: 2rem;"></i>
                            </div>
                            <h6>Pendidikan</h6>
                            <span>123 Properties</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('jobs.joblist') }}?category=Pemasaran&type=Tipe Pekerjaan">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <i class="bi bi-bank" style="font-size: 2rem;"></i>
                            </div>
                            <h6>Pemasaran</h6>
                            <span>123 Properties</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('jobs.joblist') }}?category=Manufaktur&type=Tipe Pekerjaan">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <i class="bi bi-house" style="font-size: 2rem;"></i>
                            </div>
                            <h6>Manufaktur</h6>
                            <span>123 Properties</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('jobs.joblist') }}?category=Desain&type=Tipe Pekerjaan">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <i class="bi bi-palette" style="font-size: 2rem;"></i>
                            </div>
                            <h6>Desain</h6>
                            <span>123 Properties</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('jobs.joblist') }}?category=Administrasi&type=Tipe Pekerjaan">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <i class="bi bi-pen" style="font-size: 2rem;"></i>
                            </div>
                            <h6>Administrasi</h6>
                            <span>123 Properties</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Category End -->
@endsection

@section('script')
<script>
document.getElementById('btn-search').addEventListener('click', function() {
    const title = document.getElementById('search-title').value;
    const category = document.getElementById('search-category').value;
    const type = document.getElementById('search-type').value;

    let url = "{{ route('jobs.joblist') }}" + "?";

    if (title) {
        url += "title=" + encodeURIComponent(title) + "&";
    }
    if (category && category !== "Kategori Pekerjaan") {
        url += "category=" + encodeURIComponent(category) + "&";
    }
    if (type && type !== "Tipe Pekerjaan") {
        url += "type=" + encodeURIComponent(type) + "&";
    }

    window.location.href = url;
});
</script>

@endsection