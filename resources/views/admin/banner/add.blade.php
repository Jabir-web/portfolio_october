@extends('layouts.layout')
@section('content')
    <section class=" py-5 ">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h2 class="text-center  head-text">Banners</h1>

                <p class="mb-4 text-center w-50">Welcome to the Users page. Here you can find a list of all users associated
                    with
                    the platform.</p>
                <div>
                    <a href="{{ route('all.banners') }}" class="btn btn-primary rounded my-3">All Banners</a>
                </div>
                <section style=" display:flex; justify-content:center; align-items:center; ">
                    <div
                        style="width:400px; background:#fff; padding:30px; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

                        <!-- Alerts -->
                        @if (session('success'))
                            <div class="alert alert-success" id="alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" id="alert-danger">
                                <ul style="margin:0; padding-left:20px;">
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Signup Form -->
                        {{-- <h4 class="text-center text-primary font-weight-bold">JABIR FAISAL</h4> --}}
                        <h5 class="text-center mb-4">Add New Banner</h5>
                        <form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data"
                            onsubmit="showLoader()">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01" required>
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control bg-light" placeholder="Title"
                                    required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="link" class="form-control bg-light" placeholder="Link"
                                    required>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary rounded">Save</button>
                            </div>
                        </form>

                        <!-- Loader -->
                        <div id="loader" style="display:none; text-align:center; margin-top:20px;">
                            <div class="spinner-border text-primary" role="status"></div>
                            <p>Processing...</p>
                        </div>

                    </div>
                </section>

        </div>
    </section>
@endsection
