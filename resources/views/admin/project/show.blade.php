@extends('layouts.layout')
@section('content')
    <section class=" py-5 ">
        @if (session('success'))
            <div class="alert alert-success w-50 text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h2 class="text-center  head-text">Projects</h1>

                <p class="mb-4 text-center w-50">Welcome to the Users page. Here you can find a list of all users associated
                    with
                    the platform.</p>
                <div>
                    <a href="{{ route('add.projects') }}" class="btn btn-primary rounded my-3">Add Project</a>
                </div>
                <table class="table table-light table-hover table-bordered table-sm ">
                    <thead>
                        <tr class="thead-dark">
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            {{-- <th scope="col">Image</th> --}}
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
                                {{-- <td>{{ $user->image ?? 'N/A' }}</td> --}}
                                <td>{{ $user->views ?? 'N/A' }}</td>
                                <td>{{ $user->amount ?? 'N/A' }}</td>
                                <td>{{ $user->status ?? 'N/A' }}</td>
                                <td>{{ $user->created_at ? $user->created_at->format('d-M-Y') : 'N/A' }}</td>
                                <td>
                                    <!-- Example actions, adjust as needed -->
                                    {{-- <a href="" class="btn rounded btn-sm btn-dark">View</a> --}}
                                    <!-- Edit Button (opens modal) -->
                                    <button type="button" class="btn rounded btn-sm btn-info" data-toggle="modal"
                                        data-target="#editProjectModal-{{ $user->id }}">
                                        <span class="icon-pencil"></span>
                                    </button>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editProjectModal-{{ $user->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="editProjectModalLabel-{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('projects.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editProjectModalLabel-{{ $user->id }}">Edit Project</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="title-{{ $user->id }}">Title</label>
                                                            <input id="title-{{ $user->id }}" name="title" class="form-control" value="{{ $user->title }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="amount-{{ $user->id }}">Amount</label>
                                                            <input id="amount-{{ $user->id }}" name="amount" class="form-control" value="{{ $user->amount }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="views-{{ $user->id }}">Views</label>
                                                            <input id="views-{{ $user->id }}" name="views" type="number" class="form-control" value="{{ $user->views }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status-{{ $user->id }}">Status</label>
                                                            <select id="status-{{ $user->id }}" name="status" class="form-control">
                                                                <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>active</option>
                                                                <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>inactive</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="image-{{ $user->id }}">Image (optional)</label>
                                                            <input id="image-{{ $user->id }}" type="file" name="image" class="form-control-file">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

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
    </section>
@endsection
