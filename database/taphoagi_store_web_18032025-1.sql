ALTER TABLE best_selling_products
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
ALTER TABLE categories
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
ALTER TABLE customers
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
ALTER TABLE images
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
ALTER TABLE order_details
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
ALTER TABLE orders
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
ALTER TABLE payments
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
ALTER TABLE products
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
ALTER TABLE product_prices
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
ALTER TABLE product_discounts
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
ALTER TABLE reviews
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
ALTER TABLE suppliers
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
ALTER TABLE transactions
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
ALTER TABLE transaction_details
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
ALTER TABLE warehouses
ADD COLUMN is_active BOOLEAN DEFAULT TRUE NOT NULL,
ADD COLUMN created_by INT DEFAULT TRUE NOT NULL,
ADD COLUMN updated_by INT DEFAULT TRUE NOT NULL;
