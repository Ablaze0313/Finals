CREATE DATABASE webprog_finals;

USE webprog_finals;

CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(225),
  password VARCHAR(225),
  username VARCHAR(225),
  firstname VARCHAR(225),
  middlename VARCHAR(225),
  lastname VARCHAR(225),
  suffix VARCHAR(225)
);

CREATE TABLE IF NOT EXISTS address (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  house_number VARCHAR(225),
  street VARCHAR(225),
  brgy VARCHAR(225),
  city VARCHAR(225),
  user_id INT(6) UNSIGNED, FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS currentuser (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED, FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS categories (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS prices (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  price INT(10)
);

CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  img_dir VARCHAR(225),
  name VARCHAR(255),
  price_id INT(6) UNSIGNED, FOREIGN KEY (price_id) REFERENCES prices(id),
  category_id INT(6) UNSIGNED, FOREIGN KEY (category_id) REFERENCES categories(id),
  stock INT(6)
);


INSERT INTO categories (category)
VALUES
  ('Wireless Mouse'),
  ('Gaming Mouse'),
  ('Keyboards'),
  ('Gaming Keyboards');


INSERT INTO prices (price)
VALUES
  (500),
  (1500),
  (2500),
  (3000),
  (8000);

INSERT INTO products (img_dir, name, price_id, category_id, stock)
VALUES
  ('https://imgur.com/BIiCh22', 'Logitech triathlon wireless mouse m720', 3, 1, 10),
  ('https://imgur.com/F08PWS3', 'Logitech wireless mouse m305', 1, 1, 10),
  ('https://imgur.com/y4Koms4', 'Logitech wireless mouse m171 red', 1, 1, 10),
  ('https://imgur.com/L8HJD8H', 'Logitech Gaming Mouse G502 HERO SE', 4, 2, 10),
  ('https://imgur.com/NnnbDFT', 'Logitech G502 LIGHTSPEED Wireless', 5, 2, 10),
  ('https://imgur.com/zz7z6sE', 'logitech k360', 2, 3, 10),
  ('https://imgur.com/srL6bRf', 'Logitech K380 Black', 3, 3, 10),
  ('https://imgur.com/BvbrCHH', 'Logitech K600', 2, 3, 10),
  ('https://imgur.com/stUsdiB', 'logitech prodigy g213', 4, 4, 10),
  ('https://imgur.com/Cv0CCD4', 'logitech G Pro keyboard', 5, 4, 10);
