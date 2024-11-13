@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contacts</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Search Form -->
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control"
                placeholder="Search by keyword (name, company, phone, or email)" value="{{ request()->query('search') }}">
        </div>

        <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">Add New Contact</a>
        <a href="{{ route('generate.dummy.contacts') }}" class="btn btn-success mb-3">Generate Dummy 50 Contacts</a>
        <div id="contactsTable">
            @include('contacts.table', ['contacts' => $contacts]) <!-- Render the table -->
        </div>

        <div id="pagination">
            {{ $contacts->links() }} <!-- Render pagination -->
        </div>
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

    <script>
        // Open the delete confirmation modal and set the action URL dynamically
        function openDeleteModal(formAction) {
            document.getElementById('deleteForm').action = formAction; // Set the action for the delete form
            new bootstrap.Modal(document.getElementById('deleteModal')).show(); // Show the modal
        }
    </script>
    <script>
        // Listen for input events to trigger search
        document.getElementById('searchInput').addEventListener('input', function() {
            let searchQuery = this.value; // Get the value from the search input field
            fetchContacts(searchQuery); // Fetch the contacts based on the search query
        });

        // Function to fetch contacts based on the search term
        function fetchContacts(searchQuery = '') {
            fetch(`{{ route('contacts.index') }}?search=${searchQuery}`, {
                    headers: {
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Update the contacts table with the new data
                    document.getElementById('contactsTable').innerHTML = data.contacts;
                    // Update the pagination links
                    document.getElementById('pagination').innerHTML = data.pagination;
                })
                .catch(error => {
                    console.error('Error fetching contacts:', error);
                });
        }
    </script>
@endsection
