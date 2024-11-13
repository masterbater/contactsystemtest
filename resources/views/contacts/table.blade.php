<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Company</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->company }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->email }}</td>
                <td>
                    <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('contacts.show', $contact) }}" class="btn btn-sm btn-success">View</a>
                    <!-- Delete Button -->
                    <button type="button" class="btn btn-sm btn-danger"
                        onclick="openDeleteModal('{{ route('contacts.destroy', $contact) }}')">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
