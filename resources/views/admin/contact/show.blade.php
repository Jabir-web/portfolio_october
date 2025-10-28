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
                                <button type="button" 
                                        class="btn rounded btn-sm btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-id="{{ $user->id }}"
                                        data-name="{{ $user->name }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                <p>Are you sure you want to delete this message from <strong><span id="messageName"></span></strong>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

          
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const deleteModal = document.getElementById('deleteModal');
                    deleteModal.addEventListener('show.bs.modal', function(event) {
                        const button = event.relatedTarget;
                        const id = button.getAttribute('data-id');
                        const name = button.getAttribute('data-name');
                        
                        const form = deleteModal.querySelector('#deleteForm');
                        const nameSpan = deleteModal.querySelector('#messageName');
                        
                        form.action = `/admin/contacts/${id}`;  // Adjust this route according to your needs
                        nameSpan.textContent = name;
                    });
                });
            </script>
          
        </div>
    </section>
@endsection