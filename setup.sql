
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