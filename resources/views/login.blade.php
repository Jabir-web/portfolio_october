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

            <!-- Login Form -->
            <h4 class="text-center mb-4">Login</h4>
            <form method="POST">
                @csrf
                <div class="mb-3">
                    <input type="email" name="email" class="form-control bg-light" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control bg-light" placeholder="Password" required>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" id="loginBtn" class="btn btn-primary rounded ">
                        <span id="btnText">Login</span>
                        <span id="btnLoader" class="spinner-border spinner-border-sm d-none"></span>
                    </button>
                    <a type="submit" class="btn btn-dark rounded text-light"><span
                            class="icon-google text-primary mr-2"></span>Login With Google</a>
                </div>
            </form>


        </div>
    </section>

    <script>
        document.querySelector("form").addEventListener("submit", function() {
            let btn = document.getElementById("loginBtn");
            let text = document.getElementById("btnText");
            let loader = document.getElementById("btnLoader");

            btn.disabled = true;
            text.textContent = "Processing...";
            loader.classList.remove("d-none");
        });
    </script>

@endsection
