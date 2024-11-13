<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('contacts.index');
    })->middleware(['auth', 'verified'])->name('welcome');
    Route::get('/dashboard', function () {
        return redirect()->route('contacts.index');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('contacts', ContactController::class)->middleware(['auth', 'verified']);
    Route::get('/generate-dummy-contacts', function () {
        $user = auth()->user(); // Get the authenticated user

        // Generate 10 dummy contacts for the authenticated user
        Contact::factory()->count(50)->create(['user_id' => $user->id]);

        return redirect()->route('contacts.index')->with('success', 'Dummy contacts generated successfully!');
    })->name('generate.dummy.contacts');
});

require __DIR__.'/auth.php';
