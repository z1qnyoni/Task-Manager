# Task Manager

A simple task management web application built with Laravel.

## Description

This application allows users to register, create, edit, and delete tasks with a title, deadline, and status. It also provides an API endpoint to retrieve the user’s tasks in JSON format.

## Features

- User registration and authentication
- CRUD operations for tasks (Create, Read, Update, Delete)
- Responsive web interface with Bootstrap 5
- Date picker with Flatpickr
- API endpoint `/api/tasks` to get the authenticated user’s tasks as JSON

## Requirements

- PHP >= 8.1
- Composer
- Laravel 10
- MySQL or any supported database

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/task-manager.git
   cd task-manager
Install dependencies:

bash

composer install
Copy .env.example to .env and configure your database settings:

dotenv

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_db
DB_USERNAME=root
DB_PASSWORD=1234
Generate the application key: base64:vzJUlgq3krdGJnPY+1d/fmsQCCnAgKsAzFzEScui2Q8=

bash

php artisan key:generate
Run database migrations:

bash

php artisan migrate
(Optional) Start the local development server:

bash
Копировать
php artisan serve
The app will be available at http://127.0.0.1:8000

Usage
Visit the homepage to register or login.

Use the Dashboard to create and manage your tasks.

API Endpoint to get tasks:

bash

GET /api/tasks
Returns the authenticated user’s tasks in JSON format. Authentication is required.

API Authentication
The API is secured using Laravel Sanctum. Obtain an access token and include it in your request headers:

css

Authorization: Bearer {your_token}
Technologies Used
Laravel 10

Bootstrap 5

Flatpickr (date picker)

Laravel Sanctum (API authentication)

License
MIT License
