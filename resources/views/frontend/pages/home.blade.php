@extends('frontend.layouts.app')
@section('content')

    <style>
        .h1 {
            color: #343661;
        }
        .banner {
            position: relative;
            background: url("/assets/images/breadcrumbs-bg.jpg") no-repeat center center;
            background-size: cover;
            height: 80vh;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
            overflow: hidden;
            z-index: 1;
        }

        /* Overlay Styles */
        .banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(175, 175, 174, 0.5); /* Dark overlay with 50% opacity */
            z-index: 0; /* Place overlay behind text */
        }

        .banner-content {
            margin-top: 60px;
            position: relative;
            max-width: 500px;
            animation: fadeInLeft 2s ease-in-out;
            z-index: 1; /* Ensure text is above overlay */
            right: -50px;
        }

        .banner h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            animation: slideInLeft 2s ease-out;
            color: #343661;
        }

        .banner p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            line-height: 1.5;
            animation: fadeInUp 2s ease-in-out;
        }

        .btn-custom {
            background-color: #ff5722;
            color: #fff;
            border-radius: 5px;
            padding: 0.75rem 2rem;
            font-size: 1rem;
            text-transform: uppercase;
            font-weight: 600;
            border: none;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-custom:hover {
            background-color: #e64a19;
        }

        .cards-container {
            margin-top: 80px;
            display: grid;
            grid-template-columns: repeat(2, 150px);
            grid-template-rows: repeat(2, 150px);
            gap: 7px;
            animation: fadeInRight 2s ease-in-out;
            position: relative;
            z-index: 1; /* Ensure cards are above overlay */
            transform: translateX(-60px);
        }

        .card {
            background-color: #646363;
            color: #333;
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100px; /* Square shape */
            height: 100px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            animation: fadeInUp 2s ease-in-out, scaleUp 2s ease-in-out;
        }

        .card:hover {
        animation: scaleUpHover 0.5s ease-in-out forwards;
        }

        .card-img-top {
            width: 80%;
            height: 80%;
            object-fit: cover;
        }

        .card-body {
            padding: 0.5rem;
        }

        .card-title {
            font-size: 0.75rem;
            margin-bottom: 0.25rem;
        }

        .card-text {
            font-size: 0.65rem;
        }

        /* @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes scaleUp {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        @keyframes scaleUpHover {
            from {
                transform: scale(1);
            }
            to {
                transform: scale(1.1); /* Mengubah ukuran sedikit saat hover */
            /* }
        } */

        @media (max-width: 768px) {
            .banner h1 {
                font-size: 2rem;
            }
            .banner p {
                font-size: 1rem;
            }
            .card {
                width: 70px; /* Adjust card size for smaller screens */
                height: 70px;
            }
        } */
    </style>

    <div class="banner section">
        <div class="banner-content">
            <h1>Building Your Vision</h1>
            <p>We provide high-quality construction services with a commitment to excellence and innovation. From residential to commercial projects, we bring your dreams to life.</p>
            <a href="{{ route('kontak') }}" class="btn btn-custom">Contact Us</a>
        </div>

        <div class="cards-container">
            <!-- Card 1 -->
            <div class="card">
                <img src="\assets\images\employee-engagement_15332452.gif" class="card-img-top" alt="Service 1">
            </div>
            <!-- Card 2 -->
            <div class="card">
                <img src="\assets\images\folder_15332435.gif" class="card-img-top" alt="Service 2">
            </div>
            <!-- Card 3 -->
            <div class="card">
                <img src="\assets\images\user_14251527.gif" class="card-img-top" alt="Service 3">
            </div>
            <!-- Card 4 -->
            <div class="card">
                <img src="\assets\images\agenda_12205149.gif" class="card-img-top" alt="Service 4">
            </div>
        </div>
    </div>
    <div class="hero overlay">

        <div class="img-bg rellax">
            {{-- <img src="{{ asset('assets/frontend') }}/images/hero_1.jpg" alt="Image" class="img-fluid"> --}}
            <img src="\assets\images\visibg.jpg" alt="Image" class="img-fluid">
        </div>

        <div class="container">
            <div class="row align-items-center justify-content-start">
                <div class="col-lg-5">

                    <h1 class="heading mb-3" data-aos="fade-up" style="color: #343661">VISI PERUSAHAAN</h1>
                    <p class="mb-5" data-aos="fade-up">{{ $visi }}</p>

                </div>


            </div>
        </div>


    </div>

    <div class="section service-section-1">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div class="heading-content" data-aos="fade-up">
                        <h2>MISI <span class="d-block">PERUSAHAAN</span></h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                        <p class="my-4" data-aos="fade-up" data-aos-delay="300"><a href="#"
                                class="btn btn-primary">View All</a></p>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($misisplit as $index => $item)
                            @if (!empty(trim($item))) <!-- This ensures empty items are skipped -->
                                <div class="col-6 col-md-6 col-lg-3 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                                    <div class="service-1">
                                        <span class="icon">
                                            <img src="{{ asset('assets/frontend') }}/images/svg/01.svg" alt="Image"
                                                class="img-fluid">
                                        </span>
                                        <div>
                                            <h3>Misi {{ $index + 1 }}</h3>
                                            <p>{{ trim($item) }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="section section-2">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 order-lg-2 mb-5 mb-lg-0">
                    <div class="image-stack mb-5 mb-lg-0">
                        <div class="image-stack__item image-stack__item--bottom" data-aos="fade-up">
                            {{-- <img src="{{ asset('assets/frontend') }}/images/img_v_1.jpg" alt="Image"
                                class="img-fluid rellax "> --}}
                            <img src="\assets\images\contoh_gambar4.jpg" alt="Image" class="img-fluid rellax">
                        </div>
                        <div class="image-stack__item image-stack__item--top" data-aos="fade-up" data-aos-delay="100"
                            data-rellax-percentage="0.5">
                            {{-- <img src="{{ asset('assets/frontend') }}/images/img_v_2.jpg" alt="Image" class="img-fluid"> --}}
                            <img src="\assets\images\contoh_gambar10.jpg" alt="Image" class="img-fluid">
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-4 order-lg-1">

                    <div>
                        <h2 class="heading mb-3" data-aos="fade-up" data-aos-delay="100">KEBIJAKAN PERUSAHAAN</h2>
                        @foreach ($kebijakansplit as $index => $item)
                            @if (!empty(trim($item))) <!-- This ensures empty items are skipped -->
                                

                                <p data-aos="fade-up" data-aos-delay="200">{{ trim($item) }}</p>


                        {{-- <p class="my-4" data-aos="fade-up" data-aos-delay="300"><a href="#"
                                class="btn btn-primary">Read more</a></p> --}}
                                @endif
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0 order-lg-2" data-aos="fade-up">
                    {{-- <img src="{{ asset('assets/frontend') }}/images/img-1.jpg" alt="Image" class="img-fluid"> --}}
                    <img src="\assets\images\contoh_gambar9.jpg" alt="Image" class="img-fluid" width="200" height="150">
                </div>
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="heading mb-4">JASA PELAYANAN</h2>
                    @foreach ($jasapelayanansplit as $index => $item)
                        @if (!empty(trim($item))) <!-- This ensures empty items are skipped -->
                                <p>{{ trim($item) }}</p>
                    
                    {{-- <p class="my-4" data-aos="fade-up" data-aos-delay="200"><a href="#"
                            class="btn btn-primary">Read more</a></p> --}}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <img src="{{ asset('assets/frontend') }}/images/img_v_2.jpg" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-5 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="100">

                    <h2 class="heading mb-5">Frequently Asked <br> Questions</h2>

                    <div class="custom-accordion" id="accordion_1">
                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How to
                                    download and register?</button>
                            </h2>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordion_1">
                                <div class="accordion-body">
                                    Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                                    at the coast of the Semantics, a large language ocean.
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How
                                    to create your paypal account?</button>
                            </h2>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordion_1">
                                <div class="accordion-body">
                                    A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly
                                    into your mouth.
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->
                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">How to link your paypal and bank account?</button>
                            </h2>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordion_1">
                                <div class="accordion-body">
                                    When she reached the first hills of the Italic Mountains, she had a last view back
                                    on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and
                                    the subline of her own road, the Line Lane. Pityful a rethoric question ran over her
                                    cheek, then she continued her way.
                                </div>
                            </div>

                        </div> <!-- .accordion-item -->


                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">We
                                    are better than others?</button>
                            </h2>

                            <div id="collapseFour" class="collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordion_1">
                                <div class="accordion-body">
                                    When she reached the first hills of the Italic Mountains, she had a last view back
                                    on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and
                                    the subline of her own road, the Line Lane. Pityful a rethoric question ran over her
                                    cheek, then she continued her way.
                                </div>
                            </div>

                        </div> <!-- .accordion-item -->

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
