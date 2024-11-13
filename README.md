# Contact System

This project is a simple contact management system built with Laravel. It provides basic CRUD functionalities for managing contacts, with authentication and authorization features. The system uses Laravel conventions, policies, and resource controllers for a clean and scalable design.

## Run Tests

To quickly check the proper authorization and functionality for the contact system, you can run the following command:

php artisan test --filter ContactTest

This will run the test suite specifically for the contact system, which includes tests for creating, updating, viewing, and deleting contacts, along with ensuring that authorization checks are properly applied.

## Features

-   **Authentication**: Laravel's built-in authentication system is used for user management.
-   **CRUD Operations**: Add, Edit, Delete, and View contacts.
-   **Authorization**: Policies are used to control access to contact resources. The `update` and `delete` actions are protected by policy checks.
-   **Custom Requests**: Custom request validation is used to decouple authorization checks from validation rules.
-   **Dummy Data Generator**: A dummy contact generator is available to quickly create test data for the system, using Laravel's factory system.
-   **Feature Tests**: Feature tests are written for the contact system, allowing you to verify functionality.

## Installation

### Prerequisites

1. Make sure you have PHP and Composer installed on your machine.
2. Clone the repository:
   git clone https://github.com/masterbater/contactsystemtest

3. Navigate into the project folder:
   cd contactsystemtest

4. Install the dependencies:
   composer install

5. Set up your environment:
   cp .env.example .env

6. Generate the application key:
   php artisan key:generate

7. Run migrations:
   php artisan migrate

8. (Optional) Seed the database with test data:
   php artisan db:seed

9. Start the development server:
   php artisan serve

You can use laravel sail if you want docker
