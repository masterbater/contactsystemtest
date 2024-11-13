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

## UI Improvements

To further improve the user interface and make the front-end development more organized, integrating **Inertia.js** with **ReactJS** or another UI framework would be beneficial. This would allow you to:

-   Create a **component-driven UI**, improving reusability and maintainability.
-   Use **ReactJS** or **VueJS** components for rendering views, improving performance and making the front-end easier to manage.
-   Simplify the process of building dynamic, single-page-like experiences while still leveraging the power of server-side rendering with Laravel.
-   Keep the **Laravel backend** handling the application logic and API calls, while **React** or **Vue** handles the dynamic, client-side interactions.

By using **Inertia.js**, you can easily integrate React or Vue components into the Laravel system without needing a full API, simplifying the development process.
