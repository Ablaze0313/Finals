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
  ('https://i.imgur.com/BIiCh22.jpg', 'Logitech triathlon wireless mouse m720', 3, 1, 10),
  ('https://i.imgur.com/F08PWS3.jpg', 'Logitech wireless mouse m305', 1, 1, 10),
  ('https://i.imgur.com/y4Koms4.jpg', 'Logitech wireless mouse m171 red', 1, 1, 10),
  ('https://i.imgur.com/mXS15HR.png', 'Logitech Gaming Mouse G502 HERO SE', 4, 2, 10),
  ('https://i.imgur.com/NnnbDFT.png', 'Logitech G502 LIGHTSPEED Wireless', 5, 2, 10),
  ('https://i.imgur.com/zz7z6sE.jpg', 'Logitech k360', 2, 3, 10),
  ('https://i.imgur.com/srL6bRf.jpg', 'Logitech K380 Black', 3, 3, 10),
  ('https://i.imgur.com/BvbrCHH.jpg', 'Logitech K600', 2, 3, 10),
  ('https://i.imgur.com/Cv0CCD4.png', 'Logitech prodigy g213', 4, 4, 10),
  ('https://i.imgur.com/stUsdiB.png?1', 'Logitech G Pro keyboard', 5, 4, 10);
