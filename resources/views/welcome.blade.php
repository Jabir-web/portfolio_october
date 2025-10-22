@extends('layouts.layout')
@section('content')
    <section class="site-section-hero pt-5 " data-stellar-background-ratio="0.5" id="section-home">
        <div class="">
            <h1 class="text-center  head-text">Jabir Faisal</h1>
            <p class="mb-4 text-center head-para">Creative Software Developer & Designer</p>
            <div class="owl-carousel owl-theme">
                @foreach ($banners as $banner)
                    <div class="item-video rounded overflow-hidden" data-merge="3" style="height: 500px;">
                        <img src="{{ asset($banner->image) }}" class="rounded banner-img"
                            style="width: 100%; height: 100%; object-fit: cover; object-position: center;"
                            alt="{{ $banner->title }}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="container-fluid site-section">


        <div class="row mb-3">
            <div class="col-12 text-center">
                <div class="d-inline-block border-2 p-md-4 p-sm-1">
                    <h2 class="heading ">Code Projects</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <section class="row align-items-stretch photos" id="section-photos">
                <div class="col-12">
                    <div class="row py-3 ">
                        @foreach ($projects as $project)
                            {{-- ======   Card     ======= --}}
                            <div class="col-12 col-md-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div
                                    class="code-project-card bg-white p-3 rounded m-2 h-100 d-flex flex-column justify-content-between">
                                    <a href="{{ asset($project->image) }}" class=" photo-item" data-fancybox="gallery">
                                        <img src="{{ asset($project->image) }}" class="rounded " width="100%"
                                            alt="">
                                    </a>
                                    <h5 class="mt-2 ">{{ $project->title }}</h5>
                                    <div class="d-flex justify-content-between align-items-center mb-3 ">
                                        <div>
                                            <a target="_blank" href="{{ route('project.view', $project->id) }}"
                                                class="btn btn-primary btn-sm rounded mr-1">View More</a>

                                            <a href="#" class="btn btn-dark btn-sm rounded"><span
                                                    class="icon-eye mr-2"></span>{{ $project->views }}</a>
                                        </div>
                                        <div>
                                            <div class=" rounded-circle heart-icon  d-inline-block d-flex justify-content-center align-items-center"
                                                style="width: 50px; height: 50px;">
                                                <i class="icon icon-heart "></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ======   Card     ======= --}}
                           
                        @endforeach


                    </div>
                     <div class="more-btn text-center my-4">
                        {{-- pagination links --}}
                        <div class="d-flex justify-content-center">
                            {{ $projects->withQueryString()->links() }}
                        </div>
                    </div>

                </div>
            </section> <!-- #section-photos -->
        </div>

        {{-- <div class="row mb-3 pt-4">
            <div class="col-12 text-center">
                <div class="d-inline-block border-2 p-4">
                    <h2 class="heading ">Code Labs</h2>
                </div>
            </div>
        </div> --}}

        <section class="site-section " id="section-contact">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <div class="d-inline-block border-2 p-4">
                        <h2 class="heading ">Contact Me</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 ">
                        <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? '' }}">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label for="fname">Full Name</label>
                                    <input type="text" name="name" id="fname" class="form-control bg-white" placeholder="Write your fullname">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="email">Email / Phone</label>
                                    <input type="text" name="address" id="email" class="form-control bg-white" placeholder="Write your email/phone">
                                </div>
                            </div>

                            <div class="row form-group mb-5">
                                <div class="col-md-12">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="7" class="form-control bg-white" placeholder="Write your message here" required></textarea>
                                </div>
                            </div>

                            <div id="contactAlert"></div>

                            <div class="row form-group">
                                @auth
                                    <div class="col-md-12 text-center">
                                        <button type="submit" id="submitBtn" class="btn btn-primary rounded btn-md">
                                            <span id="btnText">Send Message</span>
                                            <span id="btnSpinner" class="spinner-border spinner-border-sm ms-2" role="status"
                                                style="display:none;"></span>
                                        </button>
                                    </div>
                                @else
                                    <div class="col-md-12 text-center">
                                        <a href="{{ route('loginpage') }}" class="btn btn-primary btn-md rounded">Login
                                            Required</a>
                                    </div>
                                @endauth
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </section>

        @include('components.footer')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnSpinner = document.getElementById('btnSpinner');
            const btnText = document.getElementById('btnText');
            const alertContainer = document.getElementById('contactAlert');

            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                alertContainer.innerHTML = '';
                submitBtn.disabled = true;
                btnSpinner.style.display = 'inline-block';
                btnText.textContent = 'Processing...';

                const formData = new FormData(form);

                try {
                    const res = await fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                    });

                    const data = await res.json().catch(() => null);

                    if (res.ok) {
                        alertContainer.innerHTML =
                            '<div class="alert alert-success">Message sent successfully.</div>';
                        form.reset();
                    } else if (res.status === 422 && data && data.errors) {
                        const html = '<ul style="margin:0; padding-left:18px;">' +
                            Object.values(data.errors).flat().map(x => '<li>' + x + '</li>').join('') +
                            '</ul>';
                        alertContainer.innerHTML = '<div class="alert alert-danger">' + html + '</div>';
                    } else {
                        alertContainer.innerHTML = '<div class="alert alert-danger">' + (data
                            ?.message ?? 'Error sending message.') + '</div>';
                    }
                } catch (err) {
                    alertContainer.innerHTML =
                        '<div class="alert alert-danger">Network error. Please try again.</div>';
                } finally {
                    submitBtn.disabled = false;
                    btnSpinner.style.display = 'none';
                    btnText.textContent = 'Send Message';
                }
            });
        });
    </script>
@endsection
