CREATE DATABASE dentist_db;
USE dentist_db;

CREATE TABLE patients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  age INT,
  treatment VARCHAR(100),
  cost DECIMAL(10,2),
  dentist VARCHAR(100)
);
INSERT INTO patients (name, age, treatment, cost, dentist) VALUES
('Alice Smith', 30, 'Teeth Cleaning', 100.00, 'Dr. Johnson'),
('Bob Brown', 45, 'Cavity Filling', 200.00, 'Dr. Lee'),
('Charlie Davis', 25, 'Root Canal', 500.00, 'Dr. Johnson'),
('Diana Evans', 50, 'Teeth Whitening', 150.00, 'Dr. Lee'),
('Ethan Foster', 35, 'Dental Implants', 1200.00, 'Dr. Johnson');
