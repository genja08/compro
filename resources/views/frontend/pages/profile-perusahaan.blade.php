<style>
/* Banner Styles */
.banner {
    position: relative;
    background: url('/assets/images/hero-carousel-4.jpg') no-repeat center center;
    background-size: cover;
    height: 60vh; /* Sesuaikan tinggi banner */
    color: #5a5a5a;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    text-align: center;
    overflow: hidden;
    border-radius: 8px;
    margin-bottom: 10px; /* Ruang antara banner dan konten berikutnya */
    opacity: 0.9; /* Transparansi pada keseluruhan banner */
}

.banner::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(116, 116, 116, 0.4); /* Overlay gelap dengan opasitas 40% */
    z-index: 0; /* Letakkan overlay di bawah konten banner */
}

.banner-content {
    position: relative;
    z-index: 1; /* Letakkan konten di atas overlay */
    color: rgba(255, 255, 255, 0.9); /* Konten teks dengan transparansi */
    margin-top: 60px;
}

.banner h1 {
    font-size: 3rem;
    margin: 0;
    font-weight: 700;
    animation: fadeInUp 1.5s ease-out;
    color: #fff;
}

.banner p {
    font-size: 1.25rem;
    margin-top: 0.5rem;
    animation: fadeInUp 2s ease-out;
    color: #fff;
}

.banner .btn-custom {
    background-color: rgba(255, 87, 34, 0.9); /* Warna latar belakang dengan transparansi */
    color: #fff;
    border-radius: 5px;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    text-transform: uppercase;
    font-weight: 600;
    border: none;
    transition: background-color 0.3s ease;
    text-decoration: none;
    display: inline-block;
    margin-top: 1rem;
}
</style>


@extends('frontend.layouts.app')

@section('content')
    <!-- Banner Section -->
    <div class="banner">
        <div class="banner-content" data-aos="fade-up">
            <h1>Selamat Datang di Halaman Struktur Organisasi</h1>
            <p>Kenali struktur organisasi perusahaan dan personil yang berkontribusi dalam kesuksesan proyek kami. Temukan informasi tentang peralatan perusahaan dan banyak lagi di sini.</p>
            {{-- <a href="#contact" class="btn-custom">Hubungi Kami</a> --}}
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="col-12" data-aos="fade-up" data-aos-delay="0">
                <h3>Struktur Organisasi</h3>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div id="tree"></div>
                    </div>
                </div>
            </div>
            <div class="col-12" data-aos="fade-up" data-aos-delay="0">
                <h3>Personil Perusahaan</h3>
                <div class="row">
                    @foreach ($personils as $personil)
                        <div class="col-md-4">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ $personil->gambar() }}" class="img-fluid rounded-start square-image" height="200" width="200">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $personil->nama }}</h5>
                                            <p class="card-text">{{ \Str::limit($personil->jabatan, 90) }}</p>
                                            {{-- <p class="card-text"><small
                                                    class="text-body-secondary">{{ $personil->created_at->diffForHumans() }}</small>
                                            </p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12" data-aos="fade-up" data-aos-delay="0">
                <h3>Peralatan Perusahaan</h3>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Merk</th>
                                    <th>Type</th>
                                    <th>Jumlah</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($peralatans as $peralatan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $peralatan->nama }}</td>
                                        <td>{{ $peralatan->merk->nama ?? '-' }}</td>
                                        <td>{{ $peralatan->type->nama ?? '-' }}</td>
                                        <td>{{ $peralatan->jumlah }}</td>
                                        <td>{{ $peralatan->deskripsi }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">Tidak Ada Data!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('scripts')
    <script src="{{ asset('assets/vendors/orgchart.js') }}"></script>
    <script>
        let dataProfil = <?php echo json_encode($personils)?>;

        let chart = new OrgChart("#tree", {
            // Menonaktifkan fitur pencarian
            nodeBinding: {
                field_0: "nama",
            },
            nodes: dataProfil,
        });
    </script>
@endpush --}}

@push('scripts')
    <script src="{{ asset('assets/vendors/orgchart.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init(); // Inisialisasi AOS
        let dataProfil = <?php echo json_encode($personils)?>;

        let chart = new OrgChart("#tree", {
            nodeBinding: {
                field_0: "nama",
            },
            nodes: dataProfil,
        });
    </script>
@endpush

