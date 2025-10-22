@extends('layouts.layout')
@section('content')
    <section class="py-5"
        style="min-height:100vh; display:flex; justify-content:center; align-items:center; background:#f8fafc;">
        <div style="width:400px; background:#fff; padding:30px; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

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
            <h4 class="text-center text-primary font-weight-bold">JABIR FAISAL</h4>
            <h5 class="text-center mb-4">Signup</h5>
            <form method="POST" action="{{ route('signup.post') }}" onsubmit="showLoader()">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control bg-light" placeholder="Full Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control bg-light" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control bg-light" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control bg-light"
                        placeholder="Confirm Password" required>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary rounded">Signup</button>
                    <a href="{{ route('google.login') }}" class="btn btn-dark rounded text-light">
                        <span class="icon-google text-primary mr-2"></span>Signup With Google
                    </a>
                </div>
            </form>

            <!-- Loader -->
            <div id="loader" style="display:none; text-align:center; margin-top:20px;">
                <div class="spinner-border text-primary" role="status"></div>
                <p>Processing...</p>
            </div>

        </div>
    </section>

    <script>
        function showLoader() {
            document.getElementById('loader').style.display = 'block';
        }

        function showLoader() {
            document.getElementById('loader').style.display = 'block';
        }

        // Hide alerts after 20 seconds (20000 ms)
        setTimeout(function() {
            var successAlert = document.getElementById('alert-success');
            var dangerAlert = document.getElementById('alert-danger');
            if (successAlert) successAlert.style.display = 'none';
            if (dangerAlert) dangerAlert.style.display = 'none';
        }, 10000);
    </script>
@endsection
