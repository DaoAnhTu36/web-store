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

ALTER TABLE permissions
ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE roles
ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE role_permissions
ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

ALTER TABLE permissions
ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE roles
ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
ALTER TABLE role_permissions
ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

CREATE TABLE routes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    method VARCHAR(10) COLLATE utf8_general_ci NOT NULL,             -- GET, POST
    uri VARCHAR(255) COLLATE utf8_general_ci NOT NULL,               -- URI path
    controller VARCHAR(255) COLLATE utf8_general_ci NOT NULL,        -- Controller::method
    filters VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,       -- Middleware / Filter
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE routes
ADD COLUMN created_by VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
ADD COLUMN updated_by VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
ADD COLUMN is_active TINYINT(1) COLLATE utf8_general_ci NOT NULL;

ALTER TABLE routes
ADD COLUMN is_group TINYINT(1) NOT NULL DEFAULT 0,
ADD COLUMN parent_id INT(11) NOT NULL DEFAULT 0,
ADD COLUMN level TINYINT(1) NOT NULL DEFAULT 0
;
ALTER TABLE routes
MODIFY COLUMN is_group TINYINT NULL,
MODIFY COLUMN parent_id INT NULL,
MODIFY COLUMN level INT NULL;
ALTER TABLE routes
ADD COLUMN permission_id INT(11) COLLATE utf8_general_ci NOT NULL;

-- 20250320
ALTER TABLE accounts
DROP COLUMN role;
CREATE TABLE product_attributes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    attribute_name VARCHAR(50) NOT NULL,
    attribute_value VARCHAR(50) NOT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1, -- 1: Active, 0: Inactive
    created_by INT DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_by INT DEFAULT NULL,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE product_attribute_values (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    attribute_id INT NOT NULL,
    is_active TINYINT(1) DEFAULT 1,
    created_by INT DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_by INT DEFAULT NULL,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (attribute_id) REFERENCES product_attributes(id) ON DELETE CASCADE
);
ALTER TABLE transaction_details
ADD COLUMN product_attribute_id INT NULL;

CREATE TABLE inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    warehouse_id INT DEFAULT NULL,
    product_attribute_id INT DEFAULT NULL,
    quantity INT NOT NULL DEFAULT 0,
    last_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (warehouse_id) REFERENCES warehouses(id),
    FOREIGN KEY (product_attribute_id) REFERENCES product_attributes(id)
);

TRUNCATE TABLE transactions;
TRUNCATE TABLE transaction_details;

CREATE TABLE discounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,       -- Tên chương trình giảm giá
    discount_type INT NOT NULL,
    discount_value DECIMAL(10,2) DEFAULT 0,    -- Giá trị giảm (% hoặc số tiền)
    min_order_amount DECIMAL(10,2) DEFAULT 0,  -- Giá trị đơn hàng tối thiểu để áp dụng
    max_discount DECIMAL(10,2) DEFAULT NULL,   -- Số tiền giảm tối đa (nếu có)
    coupon_code VARCHAR(50) DEFAULT NULL,      -- Mã giảm giá (nếu cần nhập)
    start_date DATETIME,                       -- Thời gian bắt đầu
    end_date DATETIME,                         -- Thời gian kết thúc
    usage_limit INT DEFAULT NULL,              -- Số lần sử dụng tối đa
    used_count INT DEFAULT 0,                  -- Số lần đã dùng
    is_active TINYINT(1) DEFAULT 1,            -- Có đang hoạt động không
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE discount_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,         -- Tên loại giảm giá (hiển thị cho admin)
    description TEXT DEFAULT NULL,           -- Mô tả (nếu cần)
    is_active TINYINT(1) DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE product_discount_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    discount_id INT NOT NULL,
    product_id INT NOT NULL,
    product_discount_id INT NOT NULL,
    is_active TINYINT(1) DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


