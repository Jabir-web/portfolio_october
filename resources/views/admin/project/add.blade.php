@extends('layouts.layout')

@section('content')

<section class="py-5">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <h2 class="text-center head-text">Projects</h2>

```
    <p class="mb-4 text-center w-50">
        Welcome to the Users page. Here you can find a list of all users associated with the platform.
    </p>

    <div>
        <a href="{{ route('all.projects') }}" class="btn btn-primary rounded my-3">All Projects</a>
    </div>

    <section style="display:flex; justify-content:center; align-items:center;">
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
            <h5 class="text-center mb-4">Add New Project</h5>
            <form id="projectForm" method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data" onsubmit="showLoader()">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="text" name="title" class="form-control bg-light" placeholder="Title" required>
                </div>

                <div class="mb-3">
                    <input type="text" name="version" class="form-control bg-light" placeholder="Version" required>
                </div>

                <div class="mb-3">
                    <input type="text" name="size" class="form-control bg-light" placeholder="Size" required>
                </div>

                <div class="mb-3">
                    <input type="text" name="video_link" class="form-control bg-light" placeholder="Video Link" required>
                </div>

                <div class="mb-3">
                    <input type="text" name="amount" class="form-control bg-light" placeholder="Amount" required>
                </div>

                <div class="mb-3">
                    <textarea name="description" class="form-control bg-light" placeholder="Description" rows="5" required></textarea>
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" id="submitProjectBtn" class="btn btn-primary rounded">
                        <span id="submitProjectSpinner" class="spinner-border spinner-border-sm" style="display:none;" role="status"></span>
                        <span id="submitProjectText">Save</span>
                    </button>
                </div>

                <div id="projectAlert" class="mt-3"></div>
            </form>

            <!-- Loader -->
            <div id="loader" style="display:none; text-align:center; margin-top:20px;">
                <div class="spinner-border text-primary" role="status"></div>
                <p>Processing...</p>
            </div>

        </div>
    </section>
</div>
```

</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('projectForm');
    const btn = document.getElementById('submitProjectBtn');
    const spinner = document.getElementById('submitProjectSpinner');
    const btnText = document.getElementById('submitProjectText');
    const alertBox = document.getElementById('projectAlert');
    const loader = document.getElementById('loader');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        alertBox.innerHTML = '';
        btn.disabled = true;
        spinner.style.display = 'inline-block';
        btnText.textContent = 'Processing...';
        if (loader) loader.style.display = 'block';

        const fd = new FormData(form);

        try {
            const res = await fetch(form.action, {
                method: 'POST',
                body: fd,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const data = await res.json().catch(() => null);

            if (res.ok) {
                alertBox.innerHTML = '<div class="alert alert-success">Project saved successfully.</div>';
                form.reset();
                const fileLabel = document.querySelector('.custom-file-label');
                if (fileLabel) fileLabel.textContent = 'Choose file';
            } else if (res.status === 422 && data && data.errors) {
                const html = '<ul style="margin:0; padding-left:18px;">' +
                    Object.values(data.errors).flat().map(x => '<li>' + x + '</li>').join('') +
                    '</ul>';
                alertBox.innerHTML = '<div class="alert alert-danger">' + html + '</div>';
            } else {
                alertBox.innerHTML = '<div class="alert alert-danger">' + (data?.message ?? 'Error saving project.') + '</div>';
            }
        } catch (err) {
            alertBox.innerHTML = '<div class="alert alert-danger">Network error. Please try again.</div>';
        } finally {
            btn.disabled = false;
            spinner.style.display = 'none';
            btnText.textContent = 'Save';
            if (loader) loader.style.display = 'none';
        }
    });

    const fileInput = document.getElementById('inputGroupFile01');
    const fileLabel = document.querySelector('.custom-file-label');
    if (fileInput && fileLabel) {
        fileInput.addEventListener('change', function() {
            fileLabel.textContent = this.files[0]?.name ?? 'Choose file';
        });
    }
});
</script>

@endsection
