<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search', '');  // Get the search term or default to an empty string

        // Query the contacts based on the search keyword
        $contacts = Contact::where('user_id', $request->user()->id)
            ->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('name', 'like', '%'.$search.'%')
                        ->orWhere('company', 'like', '%'.$search.'%')
                        ->orWhere('phone', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%');
                }
            })
            ->paginate(10);

        if ($request->expectsJson()) {
            return response()->json([
                'contacts' => view('contacts.table', compact('contacts'))->render(),  // Return the rendered HTML table
                'pagination' => $contacts->links()->toHtml(),  // Return the pagination HTML
            ]);
        }

        return view('contacts.index', compact('contacts'));  // Default return for normal requests
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = $request->user()->id;
        Contact::create($validatedData);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact created successfully.');
    }

    // public function show(Contact $contact)
    // {
    //     return redirect()->route('contacts.index')
    //         ->with('success', 'Contact updated successfully.');
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        Gate::authorize('update', $contact);

        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $contact->update($request->validated());

        return redirect()->route('contacts.index')
            ->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        Gate::authorize('delete', $contact);
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
}
