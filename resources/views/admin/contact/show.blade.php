@extends('layouts.layout')
@section('content')
    <section class="py-5">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h2 class="text-center head-text">Messages</h2>
            <p class="mb-4 text-center w-50">
                Welcome to the Messages page. Here you can find a list of all user messages and view their details.
            </p>

            <table class="table table-light table-hover table-bordered table-sm">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email / Phone</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $index => $msg)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $msg->name }}</td>
                            <td>{{ $msg->address ?? 'N/A' }}</td>
                            <td>
                                <span class="badge {{ $msg->status == 'Read' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ $msg->status ?? 'Unread' }}
                                </span>
                            </td>
                            <td>{{ $msg->created_at ? $msg->created_at->format('d-M-Y') : 'N/A' }}</td>
                            <td>
                                <button type="button"
                                        class="btn btn-sm btn-dark rounded viewBtn"
                                        data-id="{{ $msg->id }}"
                                        data-name="{{ $msg->name }}"
                                        data-email="{{ $msg->address }}"
                                        data-status="{{ $msg->status }}"
                                        data-message="{{ $msg->message ?? 'No message content available.' }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#viewModal">
                                    View
                                </button>
                                <a href="" class="btn btn-sm btn-info rounded">Edit</a>
                                <button type="button"
                                        class="btn btn-sm btn-danger rounded"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-id="{{ $msg->id }}"
                                        data-name="{{ $msg->name }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- View Modal -->
            <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content shadow-lg">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="viewModalLabel">Message Details</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <strong>Name:</strong> <span id="viewName"></span>
                                </div>
                                <div class="col-md-6">
                                    <strong>Email / Phone:</strong> <span id="viewEmail"></span>
                                </div>
                                <div class="col-md-6">
                                    <strong>Status:</strong> <span id="viewStatus"></span>
                                </div>
                                <div class="col-md-6">
                                    <strong>Date:</strong> <span id="viewDate"></span>
                                </div>
                                <div class="col-12 mt-3">
                                    <strong>Message:</strong>
                                    <div class="border rounded p-3 bg-light mt-2" id="viewMessage"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <form id="markReadForm" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">Mark as Read</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content shadow-lg">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
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

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Delete Modal Setup
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const name = button.getAttribute('data-name');
                const form = deleteModal.querySelector('#deleteForm');
                const nameSpan = deleteModal.querySelector('#messageName');
                form.action = `/admin/contacts/${id}`;
                nameSpan.textContent = name;
            });

            // View Modal Setup
            const viewButtons = document.querySelectorAll('.viewBtn');
            const viewModal = document.getElementById('viewModal');
            const viewName = document.getElementById('viewName');
            const viewEmail = document.getElementById('viewEmail');
            const viewStatus = document.getElementById('viewStatus');
            const viewMessage = document.getElementById('viewMessage');
            const viewDate = document.getElementById('viewDate');
            const markReadForm = document.getElementById('markReadForm');

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const email = this.getAttribute('data-email');
                    const status = this.getAttribute('data-status');
                    const message = this.getAttribute('data-message');
                    const date = this.closest('tr').querySelector('td:nth-child(5)').textContent.trim();

                    viewName.textContent = name;
                    viewEmail.textContent = email || 'N/A';
                    viewStatus.textContent = status || 'Unread';
                    viewMessage.textContent = message;
                    viewDate.textContent = date;

                    // Update form action to mark as read
                    markReadForm.action = `/admin/contacts/${id}/read`;
                });
            });
        });
    </script>
@endsection
