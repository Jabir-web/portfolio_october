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
                            <th scope="col">Image</th>
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
                                <td>{{ $user->image ?? 'N/A' }}</td>
                                <td>{{ $user->views ?? 'N/A' }}</td>
                                <td>{{ $user->amount ?? 'N/A' }}</td>
                                <td>{{ $user->status ?? 'N/A' }}</td>
                                <td>{{ $user->created_at ? $user->created_at->format('d-M-Y') : 'N/A' }}</td>
                                <td>
                                    <!-- Example actions, adjust as needed -->
                                    {{-- <a href="" class="btn rounded btn-sm btn-dark">View</a> --}}
                                    <a href="" class="btn rounded btn-sm btn-info"><span
                         class="icon-pencil"></span></a>
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
