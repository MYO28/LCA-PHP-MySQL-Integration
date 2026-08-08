# AfriStaff

## Description

AfriStaff is a simple human resources web application built for a growing company to manage its internal staff directory. It allows administrators to view, create, update, and delete employee records directly through a clean browser interface.

## Tech Stack

- PHP: Server-side scripting and business logic.
- MySQL: Relational database management system for persistent data storage.
- XAMPP: Local development server stack hosting Apache and MySQL.
- phpMyAdmin: Web interface for visual database management.
- HTML: Structure and markup for application web pages.
- CSS: Custom styling for responsive UI presentation.

## Prerequisites

XAMPP installed with Apache and MySQL enabled. MySQL must be running on port 3307.

## Database Setup

1. Open your browser and navigate to phpMyAdmin (`http://localhost/phpmyadmin` or `http://localhost:8080/phpmyadmin`).
2. Click on the **SQL** tab.
3. Paste and run the following SQL statements:

```sql
CREATE DATABASE IF NOT EXISTS afristaff_db;

USE afristaff_db;

CREATE TABLE IF NOT EXISTS staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    department VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO staff (first_name, last_name, department, email) VALUES
('Sipho', 'Ndlovu', 'Engineering', 'sipho.ndlovu@afristaff.co.za'),
('Amina', 'Gardi', 'Human Resources', 'amina.gardi@afristaff.co.za'),
('Thabo', 'Mokoena', 'Finance', 'thabo.mokoena@afristaff.co.za');
```

## Installation

1. Clone the repository:
   `git clone https://github.com/your-username/LCA-PHP-MySQL-Integration.git`
2. Move or copy the `week4_ex01_php_mysql_integration` folder into your XAMPP `htdocs` directory (`C:\xampp\htdocs\`).

## How to Run

Start Apache and MySQL in the XAMPP Control Panel (as administrator), then navigate to `http://localhost/week4_ex01_php_mysql_integration/index.php` in a browser.
