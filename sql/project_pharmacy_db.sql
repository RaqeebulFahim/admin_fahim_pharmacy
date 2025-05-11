create database if not exists project_pharmacy_db;

use project_pharmacy_db;

-- 001 products table for project_pharmacy_db

create table if not exists products(
    id int primary key auto_increment,
    name varchar(100) not null,
    quantity int not null,
    price decimal(10, 2) not null,
    discount decimal(10, 2),
    final_price decimal(10, 2),
    category_id int not null,
    -- foreign key (category_id) references categories(id),
    uom_id int,
    -- foreign key (uom_id) references uoms(id),
    barcode decimal(10, 2),
    sku varchar(100),
    manufacturer_id int not null,
    -- foreign key (manufacturer_id) references manufacturers(id),
    product_picture varchar(100),
    description varchar(100),
    weight decimal(10,2),
    size decimal(10,2),
    is_feature varchar(100),
    is_brand varchar(100),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);


-- 002 categories table for project_pharmacy_db 

create table if not exists categories(
    id int primary key auto_increment,
    name varchar(100),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

-- 003 uoms table for project_pharmacy_db

create table if not exists uoms(
    id int primary key auto_increment,
    name varchar(100) not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);


-- 004 manufacturers table for project_pharmacy_db

create table if not exists manufacturers(
    id int primary key auto_increment,
    name varchar(100),
    email varchar(100),
    phone int(50),
    website varchar(100),
    country varchar(100),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

-- 005 suppliers table for project_pharmacy_db

create table if not exists suppliers(
    id int primary key auto_increment,
    name varchar(100),
    email varchar(100),
    phone int(50),
    website varchar(100),
    address varchar(100),
    photo varchar(100),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

-- 006 purchase table for project_pharmacy_db

create table if not exists purchases(
    id int primary key auto_increment,
    supplier_id int not null,
    total_order decimal(10,2) not null,
    Purchase_date datetime,
    total_discount decimal(10,2),
    total_amount decimal(10,2) not null,
    paid_amount varchar(100),
    status varchar(100), -- new table
    shipping_address varchar(100),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);



-- 007 purchase_details table for project_pharmacy_db

create table if not exists purchase_details(
    id int primary key auto_increment,
    purchase_id int(50),
    product_id int(50), -- why id?
    quantity int(50),
    price decimal(10,2) not null,
    discount decimal(10,2),
    total_price decimal(10,2) not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

-- 008 status table for project_pharmacy_db

create table if not exists status(
    id int primary key auto_increment,
    name varchar(100) not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

-- 009 customers table for project_pharmacy_db

create table if not exists customers(
    id int primary key auto_increment,
    name varchar(100),
    email varchar(100),
    phone int(50),
    address varchar(100),
    photo varchar(100),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

-- 010 order table for project_pharmacy_db

create table if not exists orders(
    id int primary key auto_increment,
    customer_id int(50),
    total_order decimal(10,2),
    total_discount decimal(10,2),
    vat_amount decimal(10,2),
    total_amount decimal(10,2),
    paid_amount decimal(10,2),
    status varchar(50),
    shipping_address varchar(100),
    order_date datetime,
    delivery_date datetime,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

-- 011 order_details table for project_pharmacy_db

create table if not exists order_details(
    id int primary key auto_increment,
    order_id int(50),
    product_id int(50),
    quantity int(50),
    price decimal(10,2),
    discount decimal(10,2),
    vat decimal(10,2),
    total_price decimal(10,2) not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

-- 012 stock table for project_pharmacy_db

create table if not exists stock(
    id int primary key auto_increment,
    product_id int(50),
    quantity int(50),
    transaction_type_id int(50),
    warehouse_id int(50),
    remark varchar(100),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

-- 013 transaction_types table for project_pharmacy_db

create table if not exists transaction_types(
    id int primary key auto_increment,
    name varchar(100) not null,
    factor int(20),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

-- 014 warehouses table for project_pharmacy_db

create table if not exists warehouses(
    id int primary key auto_increment,
    name varchar(100) not null,
    address varchar(100),
    location varchar(100),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

-- 015 stock_adjustment table for project_pharmacy_db

create table if not exists stock_adjustments(
    id int primary key auto_increment,
    name varchar(100) not null,
    adjustment_type int(20),
    warehouse_id int(10),
    remark varchar(100),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

-- 016 adjustment_types table for project_pharmacy_db

create table if not exists adjustment_types(
    id int primary key auto_increment,
    name varchar(100) not null,
    factor int(20),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

-- 017 stock_adjustment_details table for project_pharmacy_db

create table if not exists stock_adjustment_details(
    id int primary key auto_increment,
    stock_adjustment_id int(50),
    product_id int(50),
    quantity int(50),
    price decimal(10,2),
    remark varchar(100),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

-- 018 supplier_returns table for project_pharmacy_db

create table if not exists supplier_returns(
    id int primary key auto_increment,
    supplier_id int(50),
    purchase_id int(50),
    product_id int(50),
    total_order decimal(10,2) not null,
    total_return decimal(10,2)
);