CREATE DATABASE coffeeshop;

USE coffeeshop;

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(100) NOT NULL
);




INSERT INTO products (name, description, price, image) VALUES
('Espresso', 'Strong and bold coffee.', 3.00, 'espresso.jpg'),
('Cappuccino', 'A rich and creamy coffee.', 3.50, 'cappuccino.jpg'),
('Latte', 'Smooth and milky coffee.', 4.00, 'latte.jpg');
