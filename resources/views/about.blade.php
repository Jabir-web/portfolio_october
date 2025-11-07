@extends('layouts.layout')
@section('content')
    <section class="site-section-hero pt-5 " data-stellar-background-ratio="0.5" id="section-home">
        <div class="">
            <h1 class="text-center  head-text">About Me</h1>
            <h2 class="mb-4 text-center fw-bold">Jabir Faisal</h2>
            <p class="mb-4 text-center head-para">Creative Software Developer & Designer</p>
            <div class="p-4 rounded bg-light container h-100">
                <div class="d-flex">
                    <div class="w-25">
                        <img src="{{ asset('images/jabir-s.jpg') }}" class="w-100 rounded" alt="">
                    </div>
                    <div class=" px-4 w-75">
                        <h1>Jabir Faisal</h1>
                        <p>I’m passionate about crafting visually stunning, high-performing web experiences. With a focus on
                            <strong>Laravel, JavaScript, and modern UI/UX</strong> design, I turn ideas into powerful
                            digital solutions that connect creativity and technology.
                        </p>
                        <h6>👉 Nationality: <b class="text-primary">Pakistani</b></h6>
                        <h6>👉 Date Of Birth: <b class="text-primary">02-June-2001</b></h6>
                        <h5 class="fw-bold mt-3">EDUCATION:</h5>
                        <span>👉 (BSIT) Bachelour In Information Technology From
                            <strong>Virtual University Of Pakistan</strong>.
                        </span><br>
                        <span>👉 Matriculation From
                            <strong>Jetpur Memon Academy</strong>.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
