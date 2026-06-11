# Employee Management System - Backend API

This repository houses the Backend API for the Employee Management System, a multi-platform application developed as part of the internship project for **PT NusaGo Digital Travelindo**. The system is built using **Laravel 12** and secured with **Laravel Sanctum** for token-based authentication.

---

## ⚙️ Getting Started (Local Development)

Follow these steps to set up and run the backend service locally:

### 1. Clone the Repository
```json
git clone <https://github.com/Myosotis-Addict/employee-management-backend>
cd <employee-backend>
```
### 2. Install Dependencies
```json
composer install
```
### 3. Setup Environment Configuration
Copy the `.env.example` file to create your local `.env` file and generate the application key:
```json
cp .env.example .env
php artisan key:generate
```
Note: By default, the database configuration is pre-configured to use SQLite. Ensure your `.env` aligns with your preferred local database setup.

### 4. Run Migrations and Seeders
Run the migrations to create the database schema along with the seeders for initial dummy data:
```json
php artisan migrate:fresh --seed
```
Note: The seeder will automatically create an Admin account (`admin@nusago.com` / password: `admin123`) and generate 10 default employee records.

### 5. Start Local Server
```json
php artisan serve
```
The RESTful API will be accessible at: `http://127.0.0.1:8000`

## 🔐 Role & Access Control (Auth)
All protected endpoints require the following headers to be present in the request:
 - `Accept: application/json`
 - `Authorization: Bearer <your_sanctum_token>`

The system strictly enforces role-based access control (RBAC) via custom middleware:

| Role | Access Permissions |
| :--- | :--- |
| **Admin** | Full Privileges (Read, Create, Update, and Delete employees). Built for the Web Admin Dashboard. |
| **User** | Read-Only Privileges (View list and detailed employee data). Built for the Flutter Mobile Application. |


## 📍API Endpoints

### 1. Authentication (Public Endpoints)
User registration:
- URL: `/api/register`
- Method : `POST`
- Payload (JSON):
```json
 {
    "name": "karyawan",
    "email": "karyawan@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "role": "user"
 } 
``` 
(Accepted roles: admin or user)
    
User Login
- URL: `/api/login`
- Method: `POST`
- Payload (JSON) and Registered Account:
```json
   //Admin
 {
    "email": "admin@nusago.com",
    "password": "admin123"
 }

   //User Mobile
 {
    "email": "usermobile@nusago.com",
    "password": "user123"
 }
```

### 2. Employee Management (Protected Endpoints)
A. Get All Employee
- URL: `/api/employees`
- Method: `GET`
- Acces Allowed: Admin and User

B. Get Employee Details
- URL: `/api/employees/{id}`
- Method: `GET`
- Acces Allowed: Admin and User

C. Create New Employee
- URL: `/api/employees`
- Method: `POST`
- Acces Allowed: Admin Only
- Payload (JSON):
```json
 {
    "name": "Irsyd",
    "email": "irsyd@nusago.com",
    "phone": "081234567890",
    "address": "Jl. Bantul",
    "position": "IT Staff",
    "department": "IT"
 }
```
D. Update New Employee
- URL: `/api/employees/{id}`
- Method: `PUT`
- Acces Allowed: Admin Only
- Payload (JSON):
```json
 {
    "name": "Irsyd",
    "email": "irsyd@nusago.com",
    "phone": "081234567890",
    "address": "Jl. Bantul",
    "position": "IT Staff",
    "department": "IT"
 }
```

(Update/Edit as needed)

E. Delete Employee
- URL: `/api/employees/{id}`
- Method: `DELETE`
- Acces Allowed: Admin Only

F. User Logout
- URL: `/api/logout`
- Method: `POST`
- Acces Allowed: Admin and User



