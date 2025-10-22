@extends('layouts.layout')
@section('content')
    <section class=" py-5 " >
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h2 class="text-center  head-text">Messages</h1>
         
            <p class="mb-4 text-center w-50">Welcome to the Users page. Here you can find a list of all users associated with
                the platform.</p>
                   <div>
                {{-- <a href="{{ route('add.banners') }}" class="btn btn-primary rounded my-3">Add Banner</a> --}}
            </div>
            <table class="table table-light table-hover table-bordered table-sm ">
                <thead>
                    <tr class="thead-dark">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email/Phone</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $index => $user)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->address?? 'N/A' }}</td>
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
