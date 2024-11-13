# Contact System

This project follows specific requirements base on the document you shared:

-   **Search with AJAX**: The contact search feature is implemented using `fetch` for AJAX requests, but it can be easily replaced with **Axios** or **jQuery** as alternatives.
-   **Contact Access Control**: Contacts are user-specific and are not shared across users. Authorization checks are enforced to ensure users can only access their own contacts.
-   **Delete Confirmation**: When a user clicks the delete button for a contact, a popup confirmation is triggered to confirm deletion.
-   **Post-Registration Redirection**: After successful registration, users are redirected to a thank you page.
-   **Navigation to Contacts**: After clicking the "Continue" button, users are taken directly to the contact management page.

Some additions beyond its initial scope:

-   **Comprehensive Testing**: Added feature tests for each contact resource, verifying both functionality and authorization policies.
-   **CI/CD Setup**: GitHub Actions CI is configured for automated testing, facilitating pull requests and merges. However, since I am the only contributor, I typically push directly to the `main` branch.
-   **Changelog Management**: Changelogs are generated based on [Conventional Commits](https://www.conventionalcommits.org/) using `release-it`, to maintain a consistent and clear release history.

## Run Tests

To quickly check the proper authorization and functionality for the contact system, you can run the following command:

    php artisan test --filter ContactTest

This will run the test suite specifically for the contact system, which includes tests for creating, updating, viewing, and deleting contacts, along with ensuring that authorization checks are properly applied.

## Features

-   **Authentication**: Laravel's built-in authentication system is used for user management.
-   **CRUD Operations**: Add, Edit, Delete, and View contacts.
-   **Authorization**: Policies are used to control access to contact resources found in ContactPolicy and custom request like StoreContactRequest and UpdateContactRequest. The `update`, `show` and `delete` actions are protected directly by policy Gate checks.
-   **Custom Requests**: Custom request validation is used to decouple authorization checks from validation rules.
-   **Dummy Data Generator**: A dummy contact generator is available to quickly create test data for the system, using Laravel's factory system.
-   **Feature Tests**: Feature tests are written for the contact system, allowing you to verify functionality.

## Continuous Integration and Release Management

-   **GitHub Actions CI**: The project includes a GitHub Actions CI workflow to automate testing for the contact system. This ensures that every commit and pull request is verified to maintain code quality and functional integrity.
-   **Release Management with release-it**: The `release-it` tool is included to manage releases, automate changelog generation, and streamline the release workflow. This helps to standardize the release process, making it easy to generate new versions with clear, auto-generated changelogs.

## UI Improvements

To further improve the user interface and make the front-end development more organized, integrating **Inertia.js** with **ReactJS** or another UI framework would be beneficial. This would allow you to:

-   Create a **component-driven UI**, improving reusability and maintainability.
-   Use **ReactJS** or **VueJS** components for rendering views, improving performance and making the front-end easier to manage.
-   Simplify the process of building dynamic, single-page-like experiences while still leveraging the power of server-side rendering with Laravel.
-   Keep the **Laravel backend** handling the application logic and API calls, while **React** or **Vue** handles the dynamic, client-side interactions.

By using **Inertia.js**, you can easily integrate React or Vue components into the Laravel system without needing a full API, simplifying the development process.
