<!-- resources/views/contacts/view.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contact Details</h1>

        <!-- Contact Information -->
        <div class="card mb-3">
            <div class="card-header">
                <h2>{{ $contact->name }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $contact->email }}</p>
                <p><strong>Phone:</strong> {{ $contact->phone }}</p>
                <p><strong>Company:</strong> {{ $contact->company ?? 'N/A' }}</p>
            </div>
        </div>

        <!-- Buttons for editing or deleting the contact -->
        <div class="d-flex justify-content-end">
            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning me-2">Edit</a>

            <button class="btn btn-danger"
                onclick="openDeleteModal('{{ route('contacts.destroy', $contact->id) }}')">Delete</button>
        </div>

        <!-- Modal for Deletion Confirmation -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this contact? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form id="deleteForm" action="" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        // Open the delete confirmation modal and set the action URL dynamically
        function openDeleteModal(formAction) {
            document.getElementById('deleteForm').action = formAction; // Set the action for the delete form
            new bootstrap.Modal(document.getElementById('deleteModal')).show(); // Show the modal
        }
    </script>
@endsection
