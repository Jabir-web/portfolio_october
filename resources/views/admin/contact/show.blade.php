@extends('layouts.layout')
@section('content')
    // ...existing code...
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

            @push('scripts')
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
            @endpush
        </div>
    </section>
@endsection