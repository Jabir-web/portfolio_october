@extends('layouts.layout')
@section('content')
    <section class="py-5">

        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h2 class="text-center head-text">Projects</h2>

            <p class="mb-4 text-center w-50">
                Welcome to the Users page. Here you can find a list of all users associated with the platform.
            </p>

            <div>
                <a href="{{ route('add.projects') }}" class="btn btn-primary rounded my-3">Add Project</a>
            </div>
            @if (session('success'))
                <div class="alert alert-success w-50 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-light table-hover table-bordered table-sm">
                <thead>
                    <tr class="thead-dark">
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Views</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $index => $user)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $user->title }}</td>
                            <td>{{ $user->views ?? 'N/A' }}</td>
                            <td>{{ $user->amount ?? 'N/A' }}</td>
                            <td>{{ $user->status ?? 'N/A' }}</td>
                            <td>{{ $user->created_at ? $user->created_at->format('d-M-Y') : 'N/A' }}</td>
                            <td class="d-flex gap-1">
                                <!-- Edit Button -->
                                <button type="button" class="btn rounded btn-sm btn-info" data-bs-toggle="modal"
                                    data-bs-target="#editProjectModal-{{ $user->id }}">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>

                                <!-- Delete Form -->
                                <form action="{{ route('projects.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- ✅ Move modals outside the table -->
        @foreach ($projects as $user)
            <div class="modal fade" id="editProjectModal-{{ $user->id }}" tabindex="-1"
                aria-labelledby="editProjectModalLabel-{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('projects.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="modal-header">
                                <h5 class="modal-title" id="editProjectModalLabel-{{ $user->id }}">Edit Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <!-- Title -->
                                <div class="form-group mb-3">
                                    <label for="title-{{ $user->id }}">Title</label>
                                    <input id="title-{{ $user->id }}" name="title" type="text"
                                        class="form-control" value="{{ $user->title }}" required>
                                </div>

                                <!-- Amount -->
                                <div class="form-group mb-3">
                                    <label for="amount-{{ $user->id }}">Amount</label>
                                    <input id="amount-{{ $user->id }}" name="amount" type="number"
                                        class="form-control" value="{{ $user->amount }}" required>
                                </div>

                                <!-- Views -->
                                <div class="form-group mb-3">
                                    <label for="views-{{ $user->id }}">Views</label>
                                    <input id="views-{{ $user->id }}" name="views" type="number"
                                        class="form-control" value="{{ $user->views }}">
                                </div>

                                <!-- Download Link -->
                                <div class="form-group mb-3">
                                    <label for="download_link-{{ $user->id }}">Download Link</label>
                                    <input id="download_link-{{ $user->id }}" name="download_link" type="text"
                                        class="form-control" value="{{ $user->download_link }}"
                                        placeholder="https://example.com/file.zip">
                                </div>

                                <!-- Status -->
                                <div class="form-group mb-3">
                                    <label for="status-{{ $user->id }}">Status</label>
                                    <select id="status-{{ $user->id }}" name="status" class="form-control">
                                        <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>

                                <!-- Image -->
                                <div class="form-group mb-3">
                                    <label for="image-{{ $user->id }}">Image (optional)</label>
                                    <input id="image-{{ $user->id }}" type="file" name="image"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </section>
@endsection
