@extends('frontend.layouts.app')
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col blog-content pe-5">
                    <h2>{{ $item->nama }}</h2>
                    <p>{{ $item->deskripsi }}</p>

                    <h5>Galeri</h5>
                    <div class="row">

                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach ($item->gambar as $key => $gambar)
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @forelse ($item->gambar as $key => $gambar)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ $gambar->gambar() }}" class="d-block w-100" alt="...">
                                    </div>
                                @empty
                                    <div class="col-md">
                                        <p class="text-center">Tidak ada data!</p>
                                    </div>
                                @endforelse
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        
                        <div class="col-lg-3 mt-5">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Lihat Kontrak
                            </button>
                        </div>
                        
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Kontrak</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe src="{{ $kontrak }}" width="450" height="400"></iframe>
                                    {{-- <object data="{{ $kontrak }}" width="600" height="400"></object> --}}
                                    {{-- <embed type="application/pdf" src="{{ $kontrak }}" width="600" height="400"></embed> --}}
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
    <script>
        $(function() {
            document.querySelectorAll('.my-lightbox-toggle').forEach((el) => el.addEventListener('click', (e) => {
                e.preventDefault();
                const lightbox = new Lightbox(el, options);
                lightbox.show();
            }));
        })
    </script>
@endpush
