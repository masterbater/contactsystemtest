<?php

// tests/Feature/ContactTest.php

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create(); // Create the current user
    $this->actingAs($this->user); // Authenticate as the current user
});

it('can create a contact', function () {
    $contactData = Contact::factory()->make(['user_id' => $this->user->id])->toArray();

    $response = $this->post(route('contacts.store'), $contactData);

    $response->assertRedirect(route('contacts.index'));
    $this->assertDatabaseHas('contacts', ['name' => $contactData['name']]);
});

it('can view a list of contacts', function () {
    Contact::factory()->count(3)->create(['user_id' => $this->user->id]);

    $response = $this->get(route('contacts.index'));

    $response->assertStatus(200)
        ->assertViewIs('contacts.index')
        ->assertViewHas('contacts');
});

it('can update a contact', function () {
    $contact = Contact::factory()->create(['user_id' => $this->user->id]);
    $updatedData = ['name' => 'Updated Name'];

    $response = $this->put(route('contacts.update', $contact), $updatedData);

    $response->assertRedirect(route('contacts.index'));
    $this->assertDatabaseHas('contacts', ['id' => $contact->id, 'name' => 'Updated Name']);
});

it('cannot update a contact of another user', function () {
    // Create a contact for a different user
    $otherUser = User::factory()->create();
    $contact = Contact::factory()->create(['user_id' => $otherUser->id]);
    $updatedData = ['name' => 'Updated Name'];

    // Try to update the contact created by another user
    $response = $this->put(route('contacts.update', $contact), $updatedData);

    // Assert that access is denied (403 Forbidden or redirect to index)
    $response->assertStatus(403); // You can adjust based on your actual access control
});

it('can delete a contact', function () {
    $contact = Contact::factory()->create(['user_id' => $this->user->id]);

    $response = $this->delete(route('contacts.destroy', $contact));

    $response->assertRedirect(route('contacts.index'));
    $this->assertDatabaseMissing('contacts', ['id' => $contact->id]);
});

it('cannot delete a contact of another user', function () {
    // Create a contact for a different user
    $otherUser = User::factory()->create();
    $contact = Contact::factory()->create(['user_id' => $otherUser->id]);

    // Try to delete the contact created by another user
    $response = $this->delete(route('contacts.destroy', $contact));

    // Assert that access is denied (403 Forbidden or redirect to index)
    $response->assertStatus(403); // You can adjust based on your actual access control
});
