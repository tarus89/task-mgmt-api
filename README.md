# Task Management System API

This is a simple **Task Management System API** built with **Laravel 11 as Lumen is no longer Supported for the latest versions**. 
<br>The API allows users to manage tasks with basic **CRUD** operations, supports **soft deletes**, and includes features like task filtering, pagination, and search functionality.

## Table of Contents
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Environment Setup](#environment-setup)
- [Database Setup](#database-setup)
- [Authentication](#authentication)
- [Accessing the API](#accessing-the-api)
- [API Endpoints](#api-endpoints)
- [Task Filtering, Pagination, and Search](#task-filtering-pagination-and-search)

## Features
- Task creation, retrieval, update, and deletion
- Soft delete support
- User-based task ownership
- Task filtering by status and due date
- Task search by title
- Pagination for task listing
- RESTful API adhering to Laravel and SOLID principles

## Requirements
- PHP >= 8.2
- Composer
- PostgreSQL
- Laravel 11
- Laravel Sanctum for API authentication

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/tarus89/task-mgmt-api.git
   cd task-mgmt-api
   
2. **Install Composer dependencies:**

   ```bash
   composer install

## Environment Setup:

1. **Copy the .env.example file and set up environment variables:**

   ```bash
   cp .env.example .env

2. **Generate the application key:**

   ```bash
   php artisan key:generate

3. **Set up database configuration in the .env file:**

   ```bash
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password

## Database Setup:

1. **Run migrations:**

   ```bash
   php artisan migrate

2. **Seed the database (to create sample tasks and users):**

   ```bash
   php artisan db:seed

## Accessing the API:

1. **Get a Token upon login:**

    After authenticating, users can receive a token using the following endpoint:

    ``Login endpoint (POST /api/login):  ``  

    Request:

        {
        "email": "testuser@gmail.com",
        "password": "1234"
        }
    ###### Note: A user profile with the above credentials has been created from the Seeders.

   Response:

        {
            "token": "user-sanctum-api-token"
        }

2. **Use the token in subsequent API requests:**

   Include the token in the Authorization header of each request:
   ```
   Authorization: Bearer user-sanctum-api-token

## API Endpoints:

### Authentication
    
#### Login: (POST ```/api/login```)

   Request Body: 

       { 
          "email": "user@example.com", 
          "password": "password" 
        }
    
Response: 

```{ "token": "user-sanctum-api-token" }```

### Tasks
* Get All Tasks: (GET ```/api/tasks```)

* Get a Specific Task: (GET ```/api/tasks/{id}```)

* Create a Task: (POST ```/api/tasks```)

   Request Body:
         
        {
             "title": "Task title",
             "description": "Task description",
             "status": "pending",
             "due_date": "2024-12-01"
         }

* Update a Task: (PUT ```/api/tasks/{id}```)

    Request Body:

        {
          "title": "Updated title"
          "status": "completed"
        }

* Delete a Task (Soft Delete): 

    DELETE: ```/api/tasks/{id}```

``Tasks are soft-deleted, meaning they are not permanently removed from the database.``

### Task Filtering, Pagination, and Search

* Filtering by status (e.g., pending, completed):

   ``` GET: /api/tasks?status=pending```

* Filtering by due date:

    ``` GET: /api/tasks?due_date=2024-12-01```

* Search by title:

    ``` GET: /api/tasks?search=important```

* Paginate results (10 per page):

    ``` GET: /api/tasks?page=1```
