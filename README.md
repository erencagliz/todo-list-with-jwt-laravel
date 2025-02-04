# To-Do List API

A simple To-Do List API built with Laravel 11, featuring JWT-based authentication.

## Features
- User Registration & Login (JWT Authentication)
- Create, Read, Update, and Delete (CRUD) To-Do Items
- Secure API with token-based authentication

## Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/todo-list-api.git
   cd todo-list-api
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure Database**  
   Update your `.env` file with database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run Migrations**
   ```bash
   php artisan migrate
   ```

6. **Serve the Application**
   ```bash
   php artisan serve
   ```

---

## API Endpoints

### **Authentication**
- **Register:** `POST /api/register`
  ```json
  {
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password"
  }
  ```

- **Login:** `POST /api/login`
  ```json
  {
    "email": "john@example.com",
    "password": "password"
  }
  ```

The response will include a JWT token:
```json
{
  "token": "your_jwt_token_here"
}
```
Use this token in the Authorization header for protected routes:
```
Authorization: Bearer your_jwt_token_here
```

### **To-Do Operations**
- **Get All Todos:** `GET /api/todos`
- **Create Todo:** `POST /api/todos`
  ```json
  {
    "title": "Learn Laravel",
    "description": "Study API development with Laravel."
  }
  ```
- **Update Todo:** `PUT /api/todos/{id}`
  ```json
  {
    "title": "Master Laravel",
    "description": "Complete advanced topics."
  }
  ```
- **Delete Todo:** `DELETE /api/todos/{id}`

---

## Postman Collection

1. Import the [Postman Collection](todo_api_postman_collection.json).
2. Set the environment variable `base_url` to `http://localhost:8000`.
3. Use the Register request to get a token, which will be automatically saved.
4. Test all endpoints easily.

---

## Technologies Used
- Laravel 11
- JWT Authentication
- MySQL
- Postman

---

## License
This project is open-source and available under the [MIT License](LICENSE).

