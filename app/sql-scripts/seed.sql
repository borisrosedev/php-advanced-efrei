CREATE DATABASE IF NOT EXISTS it_creator;

USE it_creator;  

CREATE TABLE IF NOT EXISTS it_creator.users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100),
    lastname VARCHAR(100),
    email VARCHAR(100) NOT NULL UNIQUE,
    password TEXT NOT NULL,
    wallet FLOAT DEFAULT 0,
    tools TEXT,
    level INT DEFAULT 1,
    status ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


START TRANSACTION;
INSERT INTO it_creator.users(firstname, lastname, email, password, wallet, level) VALUES('alexandre','dupont', 'alexandre.amar@gmail.com', SHA2('10alexandre10!', 256), 2000, 2);

INSERT INTO it_creator.users(firstname, lastname, email, password, wallet, level) VALUES('sarah','wang', 'sarah.wang@gmail.com', SHA2('10sarah10!', 256), 1000, 2);

INSERT INTO it_creator.users(firstname, lastname, email, password, wallet, level) VALUES('mamadou','mamate', 'mamadou.mamate@gmail.com', SHA2('10mamadou10!', 256), 4000, 2);


COMMIT;
-- ROLLBACK;