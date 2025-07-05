# Task Manager

A modern and user-friendly task management system built with Laravel.  
Manage your tasks with ease: registration, authentication, CRUD operations, dashboard statistics, and a JSON API.

---

## 🚀 Features

- **User registration and authentication**
- **Create, view, edit, and delete tasks**
- **Each task has a title, deadline, and status (`jauns`, `procesā`, `pabeigts`)**
- **Modern dashboard with cards and statistics**
- **API endpoint to get tasks in JSON format**
- **Secure authentication with Laravel Sanctum**
- **Validation and authorization via Policy**

---

## 🛠️ Installation

1. **Clone the repository:**
   ```sh
   git clone https://github.com/YOUR_USERNAME/task-manager.git
   cd task-manager
   ```

2. **Install dependencies:**
   ```sh
   composer install
   npm install
   ```

3. **Copy the .env file and generate an app key:**
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure your database settings in `.env`**

5. **Run migrations:**
   ```sh
   php artisan migrate
   ```

6. **Start the development server:**
   ```sh
   php artisan serve
   ```

7. **(Optional) Build frontend assets:**
   ```sh
   npm run dev
   ```

---

## 📦 API

- **Get user tasks (requires authentication):**
  ```
  GET /api/tasks
  Headers: Authorization: Bearer {token}
  ```

- **Sample response:**
  ```json
  {
    "success": true,
    "data": [
      {
        "id": 1,
        "title": "Test",
        "deadline": "2025-01-01",
        "status": "jauns",
        "user_id": 1,
        "created_at": "...",
        "updated_at": "..."
      }
    ]
  }
  ```

---

## 🖥️ Screenshots

_Add your UI screenshots here!_

---


---

## 📄 License

MIT

---

## 💡 Notes

- Uses Laravel Sanctum for API authentication.
- UI built with Bootstrap 5 and Bootstrap Icons.
- Date selection via Flatpickr.
- PHPUnit for testing.

---
