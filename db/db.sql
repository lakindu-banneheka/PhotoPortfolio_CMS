CREATE DATABASE dashboard_db;

USE dashboard_db;

USE bhtmwcfrbkzg6uviafdf;

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    profile_picture VARCHAR(255) DEFAULT 'images/profile/default.png',
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    title VARCHAR(255) NOT NULL,
    message TEXT NOT NULL
);

CREATE TABLE portfolio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    image_title VARCHAR(255) NOT NULL,
    uploaded_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO admin (name, email, phone, username, password) VALUES ('Admin', 'admin@example.com', '1234567890', 'admin', MD5('adminpassword'));
