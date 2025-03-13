CREATE TABLE best_selling_products (
    record_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    total_sold INT NOT NULL DEFAULT 0, -- Tổng số sản phẩm đã bán
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE product_discounts (
    discount_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    discount_type ENUM('percentage', 'fixed') NOT NULL, -- Giảm giá theo % hoặc số tiền cố định
    discount_value DECIMAL(10,2) NOT NULL, -- Giá trị giảm giá
    start_date DATE NOT NULL, -- Ngày bắt đầu khuyến mãi
    end_date DATE NOT NULL, -- Ngày kết thúc khuyến mãi
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE product_prices (
    price_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    price DECIMAL(10,2) NOT NULL, -- Giá sản phẩm
    start_date DATE NOT NULL, -- Ngày bắt đầu áp dụng giá
    end_date DATE DEFAULT NULL, -- Ngày kết thúc (nếu có)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE inventory_movements (
    movement_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    warehouse_id INT NOT NULL,
    quantity INT NOT NULL,
    movement_type ENUM('import', 'export') NOT NULL,
    reference VARCHAR(255), -- Ghi chú số đơn hàng hoặc lý do nhập/xuất
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE stock (
    stock_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    warehouse_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 0,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE warehouses (
    warehouse_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    location TEXT NOT NULL,
    manager VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
