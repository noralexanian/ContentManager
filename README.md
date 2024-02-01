# Laravel Content Manager

This Laravel project is a content management system for articles. It allows creating, viewing, editing, and deleting articles.

## View online
Access online website at http://167.99.206.27:8081

## Installation

1. **Clone the Repository**
git clone git@github.com:noralexanian/ContentManager.git

2. **Navigate to the Project Directory**
cd ContentManager/ContentManager

3. **Install Dependencies**
- Run `composer install` to install PHP dependencies.
- Run `npm install` to install JavaScript dependencies.

4. **Environment Setup**
- Copy `.env.example` to `.env` using `cp .env.example .env`.
- Configure your database and other settings in the `.env` file.

5. **Generate Application Key**
php artisan key:generate

6. **Run Database Migrations**
php artisan migrate

7. **Build Assets with Vite**
- Run `npm run dev` for a development environment.
- Run `npm run build` for production.

8. **Start the Laravel Server**
php artisan serve

9. **Access the Application**
- The application will be available at `http://localhost:8000` or the URL configured in your `.env` file.

## Features

- Article management (Create, Read, Update, Delete).
- Responsive design using Bootstrap.

## Technologies Used

- Laravel
- Vite
- Bootstrap
- MySQL
