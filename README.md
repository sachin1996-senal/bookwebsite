# Book Website - Laravel Project

A Laravel-based book management system with user authentication and role-based access control.

## Features

-   📚 **Book Listing** - Browse all available books with images, prices, and discounts
-   🔍 **Search Functionality** - Search books by name
-   📖 **Book Details** - View detailed information about each book
-   💰 **Discount Calculation** - Automatic calculation and display of discounted prices
-   👥 **Role-Based Access Control**
    -   **Admin**: Can add new books to the system
    -   **User**: Can view book list and details only
-   🔐 **User Authentication** - Secure login and registration system
-   📱 **Responsive Design** - Works on desktop and mobile devices

## Technology Stack

-   **Framework**: Laravel 11.x
-   **Frontend**: Blade Templates with Tailwind CSS
-   **Authentication**: Laravel Breeze
-   **Database**: MySQL

## Installation

1. **Clone the repository**

    ```bash
    git clone <repository-url>
    cd bookwebsite
    ```

2. **Install dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Environment setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Configure database**

    - Update `.env` file with your database credentials:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

5. **Run migrations**

    ```bash
    php artisan migrate
    ```

6. **Create storage link**

    ```bash
    php artisan storage:link
    ```

7. **Build assets**

    ```bash
    npm run build
    ```

8. **Start the development server**

    ```bash
    php artisan serve
    ```

    The application will be available at `http://localhost:8000`

## User Roles & Credentials

### Admin Account

-   **Email**: `sachin.muthukuda@test.com`
-   **Password**: `12345678`
-   **Permissions**:
    -   Add new books
    -   View all books
    -   Access dashboard
    -   View book details

### Regular User

-   **Permissions**:
    -   View book list
    -   Search books
    -   View book details
-   Users can register through the registration page

### For Admin Users

1. **Login** with admin credentials:

    - Email: `sachin.muthukuda@test.com`
    - Password: `12345678`

    ### For Users

1. **Login** with user credentials:

    - Email: `pathumsilva49@gmail.com`
    - Password: `Pathum@2025`
