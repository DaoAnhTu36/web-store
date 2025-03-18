ALTER TABLE accounts CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE best_selling_products CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE categories CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE customers CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE images CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE orders CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE order_details CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE payments CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE product_prices CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE product_discounts CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE reviews CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE suppliers CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE transactions CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE transaction_details CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE warehouses CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE permissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    permission_name VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE role_permissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_id INT NOT NULL,
    permission_id INT NOT NULL
);

ALTER TABLE roles 
CHANGE role_name name varchar(255);
ALTER TABLE permissions 
CHANGE permission_name name varchar(255);
