{{-- resources/views/contacts/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Contact</h1>

        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" name="company" id="company" class="form-control">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Contact</button>
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
