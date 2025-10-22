@extends('layouts.layout')
@section('content')
    <section class="site-section-hero py-5 " data-stellar-background-ratio="0.5" id="section-home">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h1 class="text-center  head-text">Users</h1>
            <p class="mb-4 text-center w-50">Welcome to the Users page. Here you can find a list of all users associated with
                the platform. As a creative software developer and designer, you can manage user information and explore
                their profiles.</p>
            <table class="table table-light table-hover table-bordered table-sm ">
                <thead>
                    <tr class="thead-dark">
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role ?? 'N/A' }}</td>
                            <td>{{ $user->status ?? 'N/A' }}</td>
                            <td>{{ $user->created_at ? $user->created_at->format('d-M-Y') : 'N/A' }}</td>
                            <td>
                                <!-- Example actions, adjust as needed -->
                                <a href="" class="btn rounded btn-sm btn-dark">View</a>
                                <a href="" class="btn rounded btn-sm btn-info">Edit</a>
                                <a href="" class="btn rounded btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </section>
@endsection
