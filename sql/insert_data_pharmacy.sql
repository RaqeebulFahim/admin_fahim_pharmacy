
-- products data using chatgpt

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Unique identifier for each product
    name VARCHAR(255) NOT NULL, -- Product name
    quantity INT NOT NULL DEFAULT 0, -- Quantity in stock
    price DECIMAL(10,2) NOT NULL, -- Price of the product
    discount DECIMAL(5,2) DEFAULT 0.00, -- Discount on the product
    final_price DECIMAL(10,2) GENERATED ALWAYS AS (price - (price * discount / 100)) STORED, -- Final price after discount
    category_id INT NOT NULL, -- Category identifier (foreign key)
    uom_id INT NOT NULL, -- Unit of Measurement identifier (foreign key)
    barcode VARCHAR(100) UNIQUE, -- Barcode for the product
    sku VARCHAR(100) UNIQUE, -- Stock Keeping Unit (SKU)
    manufacturer_id INT NOT NULL, -- Manufacturer identifier (foreign key)
    description TEXT, -- Product description
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Record creation timestamp
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Last update timestamp
    FOREIGN KEY (category_id) REFERENCES categories(id), -- Assuming categories table exists
    FOREIGN KEY (uom_id) REFERENCES uom(id), -- Assuming unit of measurement table exists
    FOREIGN KEY (manufacturer_id) REFERENCES manufacturers(id) -- Assuming manufacturers table exists
);


-- products data using chatgpt


-- Insert 100 sample products into the products table
INSERT INTO products (name, quantity, price, discount, category_id, uom_id, barcode, sku, manufacturer_id, description)
VALUES
('Paracetamol', 50, 2.50, 5.00, 1, 1, '1234567890123', 'SKU001', 1, 'Pain reliever and fever reducer'),
('Ibuprofen', 100, 3.00, 10.00, 1, 1, '1234567890124', 'SKU002', 1, 'Nonsteroidal anti-inflammatory drug'),
('Amoxicillin', 200, 1.50, 0.00, 2, 2, '1234567890125', 'SKU003', 2, 'Antibiotic for bacterial infections'),
('Cough Syrup', 75, 5.00, 15.00, 3, 3, '1234567890126', 'SKU004', 3, 'Relieves cough and sore throat'),
('Vitamin C Tablets', 150, 7.00, 5.00, 4, 1, '1234567890127', 'SKU005', 4, 'Boosts immune system'),
-- Add additional rows for unique products
('Aspirin', 120, 2.80, 5.00, 1, 1, '1234567890128', 'SKU006', 1, 'Pain reliever and anti-inflammatory'),
('Antacid', 80, 3.50, 10.00, 5, 1, '1234567890129', 'SKU007', 1, 'Treats indigestion and heartburn'),
('Thermometer', 30, 15.00, 0.00, 6, 4, '1234567890130', 'SKU008', 5, 'Digital thermometer for body temperature'),
('Hand Sanitizer', 200, 4.50, 5.00, 7, 4, '1234567890131', 'SKU009', 6, 'Kills germs and bacteria'),
('Blood Pressure Monitor', 25, 50.00, 20.00, 8, 4, '1234567890132', 'SKU010', 7, 'Measures blood pressure levels'),
-- Repeat similar rows to reach 100 entries
('Multivitamin Capsules', 180, 10.00, 5.00, 4, 2, '1234567890133', 'SKU011', 4, 'Complete daily vitamins'),
('Antiseptic Cream', 60, 3.20, 8.00, 7, 1, '1234567890134', 'SKU012', 6, 'For cuts, wounds, and burns'),
('Saline Nasal Spray', 90, 2.80, 0.00, 9, 3, '1234567890135', 'SKU013', 1, 'Relieves nasal congestion'),
('Allergy Relief Tablets', 110, 4.00, 5.00, 10, 1, '1234567890136', 'SKU014', 2, 'Relieves seasonal allergies'),
('Laxative Syrup', 50, 6.00, 10.00, 11, 3, '1234567890137', 'SKU015', 3, 'For constipation relief'),
('Oral Rehydration Solution', 70, 1.80, 0.00, 12, 3, '1234567890138', 'SKU016', 2, 'Restores body fluids and electrolytes'),
('Insulin Syringes', 40, 12.00, 15.00, 13, 4, '1234567890139', 'SKU017', 5, 'For diabetic insulin delivery'),
('First Aid Kit', 20, 25.00, 5.00, 14, 4, '1234567890140', 'SKU018', 7, 'Emergency medical supplies kit'),
('Energy Drinks', 100, 1.50, 5.00, 15, 3, '1234567890141', 'SKU019', 4, 'Boosts energy levels'),
('Hair Growth Oil', 60, 8.00, 10.00, 16, 4, '1234567890142', 'SKU020', 6, 'Stimulates hair growth'),
-- Continue until 100 rows

-- Additional products to reach 100 entries

('Pain Relief Gel', 70, 6.50, 8.00, 1, 1, '1234567890143', 'SKU021', 3, 'For muscle and joint pain'),
('Antifungal Cream', 90, 4.20, 5.00, 7, 1, '1234567890144', 'SKU022', 2, 'Treats fungal infections'),
('Eye Drops', 100, 3.30, 0.00, 9, 3, '1234567890145', 'SKU023', 1, 'Relieves eye irritation'),
('Diabetic Test Strips', 80, 20.00, 10.00, 13, 4, '1234567890146', 'SKU024', 5, 'Used with glucometer for blood sugar tests'),
('Glucose Powder', 120, 2.00, 0.00, 12, 3, '1234567890147', 'SKU025', 6, 'Provides instant energy'),
('Herbal Shampoo', 75, 7.50, 5.00, 16, 4, '1234567890148', 'SKU026', 4, 'Natural hair care product'),
('N95 Masks', 200, 1.80, 0.00, 7, 4, '1234567890149', 'SKU027', 7, 'Protective face masks'),
('Dental Floss', 60, 2.50, 0.00, 17, 1, '1234567890150', 'SKU028', 3, 'For oral hygiene'),
('Calcium Supplements', 100, 8.00, 5.00, 4, 2, '1234567890151', 'SKU029', 4, 'Strengthens bones and teeth'),
('Protein Powder', 50, 25.00, 10.00, 15, 3, '1234567890152', 'SKU030', 5, 'Dietary supplement for fitness'),
('Cold Relief Tablets', 90, 3.00, 0.00, 10, 1, '1234567890153', 'SKU031', 1, 'Relieves common cold symptoms'),
('Wound Dressing Kit', 30, 12.00, 5.00, 14, 4, '1234567890154', 'SKU032', 7, 'First aid kit for wound care'),
('Baby Diapers', 150, 0.50, 2.00, 18, 3, '1234567890155', 'SKU033', 6, 'Disposable diapers for infants'),
('Ointment for Burns', 80, 5.50, 5.00, 7, 1, '1234567890156', 'SKU034', 2, 'Treats minor burns and skin irritation'),
('Antibacterial Wipes', 200, 3.50, 0.00, 7, 4, '1234567890157', 'SKU035', 6, 'Cleans and disinfects surfaces'),
('Liver Tonic', 70, 10.00, 5.00, 12, 3, '1234567890158', 'SKU036', 4, 'Supports liver health'),
('Multivitamin Syrup', 90, 6.00, 5.00, 4, 3, '1234567890159', 'SKU037', 4, 'Supplement for kids and adults'),
('Hair Conditioner', 60, 8.00, 5.00, 16, 4, '1234567890160', 'SKU038', 5, 'Moisturizes and strengthens hair'),
('Pregnancy Test Kit', 100, 5.00, 0.00, 19, 4, '1234567890161', 'SKU039', 7, 'Home pregnancy test'),
('Menstrual Pain Relief Patch', 50, 3.80, 5.00, 10, 1, '1234567890162', 'SKU040', 3, 'Provides relief from cramps'),
('Energy Bars', 80, 1.50, 0.00, 15, 3, '1234567890163', 'SKU041', 4, 'Convenient snack for energy'),
('Moisturizing Lotion', 100, 6.00, 5.00, 16, 4, '1234567890164', 'SKU042', 5, 'Hydrates and nourishes skin'),
('Muscle Relaxant Spray', 40, 8.50, 10.00, 1, 3, '1234567890165', 'SKU043', 2, 'For quick relief from muscle pain'),
('Anti-dandruff Shampoo', 70, 6.00, 5.00, 16, 4, '1234567890166', 'SKU044', 4, 'Treats dandruff effectively'),
('Skin Whitening Cream', 50, 9.00, 5.00, 16, 1, '1234567890167', 'SKU045', 3, 'Brightens skin tone'),
('Asthma Inhaler', 60, 15.00, 0.00, 20, 4, '1234567890168', 'SKU046', 1, 'Relieves asthma symptoms'),
('Pain Relief Patches', 70, 5.00, 5.00, 1, 1, '1234567890169', 'SKU047', 2, 'For localized pain relief'),
('Anti-aging Serum', 40, 20.00, 10.00, 16, 4, '1234567890170', 'SKU048', 5, 'Reduces signs of aging'),
('Cough Lozenges', 90, 1.80, 5.00, 3, 3, '1234567890171', 'SKU049', 3, 'Soothes throat irritation'),
('Cold Sore Cream', 50, 4.50, 5.00, 7, 1, '1234567890172', 'SKU050', 6, 'Treats cold sores effectively'),
('Sleep Aid Tablets', 80, 3.00, 0.00, 10, 1, '1234567890173', 'SKU051', 4, 'Improves sleep quality'),
('Acne Treatment Gel', 60, 6.00, 5.00, 7, 1, '1234567890174', 'SKU052', 2, 'Reduces acne and blemishes'),
('Hand Gloves', 100, 1.50, 0.00, 7, 4, '1234567890175', 'SKU053', 7, 'Disposable protective gloves'),
('Foot Cream', 40, 5.50, 5.00, 16, 1, '1234567890176', 'SKU054', 3, 'Moisturizes and softens feet'),
('Antibacterial Soap', 120, 2.00, 5.00, 7, 4, '1234567890177', 'SKU055', 6, 'Protects against germs'),
('Digestive Enzyme Capsules', 80, 10.00, 5.00, 12, 2, '1234567890178', 'SKU056', 4, 'Improves digestion'),
('Sunscreen Lotion', 90, 8.50, 5.00, 16, 4, '1234567890179', 'SKU057', 5, 'Protects skin from UV rays'),
('Mouthwash', 100, 3.00, 5.00, 17, 4, '1234567890180', 'SKU058', 3, 'Freshens breath and kills germs'),
('Fever Patch', 50, 4.00, 5.00, 10, 1, '1234567890181', 'SKU059', 6, 'Provides cooling relief for fever'),
('Anti-mosquito Spray', 70, 6.00, 5.00, 21, 4, '1234567890182', 'SKU060', 2, 'Repels mosquitoes effectively');



-- category insertion

INSERT INTO categories (Name) 
VALUES 
('Medicine'),
('Surgical Items'),
('Health Supplements'),
('Baby Care Products'),
('Personal Hygiene'),
('Orthopedic Support'),
('Medical Equipment'),
('First Aid Kits'),
('Vitamins & Minerals'),
('Diagnostic Tools');


-- stock table  insertion

INSERT INTO stock (Product_Id, Quantity, Transaction_Type_Id, Warehouse_Id, Remark) 
VALUES 
(1, 50, 1, 101, 'Initial stock addition'),
(2, 100, 2, 102, 'Restocked from supplier'),
(3, 20, 3, 101, 'Sold items'),
(4, 75, 1, 103, 'New batch received'),
(5, 10, 3, 102, 'Items damaged and discarded'),
(6, 200, 1, 104, 'Initial stock addition'),
(7, 150, 2, 101, 'Bulk order restocked'),
(8, 50, 3, 103, 'Items sold to customer'),
(9, 300, 1, 102, 'Received promotional items'),
(10, 30, 3, 101, 'Returned damaged goods'),
(11, 80, 2, 103, 'Replenishment order'),
(12, 25, 3, 104, 'Sale transaction'),
(13, 90, 1, 102, 'Seasonal stock update'),
(14, 40, 2, 101, 'Top-up stock order'),
(15, 15, 3, 103, 'Expired items removed'),
(16, 120, 1, 104, 'Initial warehouse supply'),
(17, 60, 2, 102, 'Restocked after low inventory alert'),
(18, 70, 3, 101, 'Bulk customer purchase'),
(19, 130, 1, 103, 'Opening inventory'),
(20, 20, 3, 104, 'Sample stock used for promotions');


-- uoms table insertion 

INSERT INTO uoms (Name) 
VALUES 
('Piece'),
('Box'),
('Bottle'),
('Strip'),
('Tablet'),
('Capsule'),
('Packet'),
('Tube'),
('Syringe'),
('Dropper'),
('Vial'),
('Canister'),
('Carton'),
('Liter'),
('Milliliter'),
('Gram'),
('Kilogram'),
('Inhaler'),
('Ampoule'),
('Powder Sachet');


-- warehouse table insertion 

INSERT INTO warehouses (Name, Address, Location) 
VALUES 
('Central Warehouse', '123 Main Street, Dhaka', 'Dhaka'),
('East Branch Warehouse', '45 East Avenue, Chattogram', 'Chattogram'),
('North Distribution Center', '67 North Road, Rajshahi', 'Rajshahi'),
('South Storage', '89 South Lane, Khulna', 'Khulna'),
('West Regional Depot', '21 West Boulevard, Sylhet', 'Sylhet'),
('City Supply Hub', '34 Urban Plaza, Barishal', 'Barishal'),
('Pharma Logistics Base', '12 Logistics Park, Rangpur', 'Rangpur'),
('Suburban Warehouse', '56 Outskirts Road, Mymensingh', 'Mymensingh'),
('Emergency Storage Unit', '78 Relief Street, Cumilla', 'Cumilla'),
('Specialized Storage', '101 Sector 7, Savar', 'Savar');



-- stock_adjustment table insertion 

INSERT INTO stock_adjustments (Name, Adjustment_Type, Warehouse_Id, Remark) 
VALUES 
('Medicine Stock Correction', 'Increase', 101, 'Stock quantity adjusted after inventory review'),
('Surgical Supplies Adjustment', 'Decrease', 102, 'Removed expired items from stock'),
('Health Supplements Recalculation', 'Increase', 103, 'Stock discrepancy corrected after audit'),
('Baby Care Product Stock Update', 'Decrease', 104, 'Stock removed due to damaged goods'),
('Personal Care Item Adjustment', 'Increase', 101, 'Stock updated due to incoming order'),
('Orthopedic Support Stock Correction', 'Decrease', 102, 'Items sold but not recorded correctly'),
('Medical Equipment Stock Increase', 'Increase', 103, 'Stock added after restocking from supplier'),
('First Aid Kit Adjustment', 'Decrease', 104, 'Expired stock removed from inventory'),
('Vitamins Stock Correction', 'Increase', 101, 'Added missing stock after audit'),
('Diagnostic Tools Adjustment', 'Decrease', 102, 'Stock discrepancy due to system error'),
('Pain Relief Stock Update', 'Increase', 103, 'Stock replenished after new batch arrival'),
('Antibiotics Adjustment', 'Decrease', 104, 'Removed stock due to damage in shipment'),
('Injectables Stock Correction', 'Increase', 101, 'Stock increased after replenishment'),
('OTC Medicines Adjustment', 'Decrease', 102, 'Items returned to supplier due to defect'),
('Medical Consumables Stock Update', 'Increase', 103, 'Stock adjusted after recount'),
('Surgical Masks Adjustment', 'Decrease', 104, 'Expired stock discarded'),
('Disinfectants Stock Correction', 'Increase', 101, 'Stock increased after supply received'),
('Bandages Stock Update', 'Decrease', 102, 'Incorrect stock recorded, adjusted'),
('Eye Care Products Adjustment', 'Increase', 103, 'Stock updated from new delivery'),
('Nutritional Supplements Adjustment', 'Decrease', 104, 'Removed expired supplements');


-- adjustment_types table insertion 
INSERT INTO adjustment_types (Name, Factor) 
VALUES 
('Stock Increase', 1),
('Stock Decrease', -1),
('Stock Return to Supplier', -1),
('Stock Received from Supplier', 1),
('Damage Adjustment', -1),
('Stock Discrepancy Correction', 1),
('Inventory Audit Adjustment', 1),
('Stock Write-Off', -1),
('Promotion Stock Addition', 1),
('Sample Stock Reduction', -1);



-- stock_adjustment_details table insertion 

INSERT INTO stock_adjustment_details (Stock_Adjustment_Id, Product_Id, Quantity, Price, Remark) 
VALUES 
(1, 101, 50, 15.00, 'Adjusted for inventory audit'),
(1, 102, -10, 25.00, 'Removed due to damage'),
(2, 103, 30, 12.50, 'Stock correction for discrepancy'),
(2, 104, -5, 18.00, 'Expired stock discarded'),
(3, 105, 20, 10.00, 'Stock replenished after supplier delivery'),
(3, 106, -15, 8.00, 'Removed due to incorrect entry'),
(4, 107, 60, 5.00, 'Added promotional items'),
(4, 108, -8, 20.00, 'Sample stock distributed'),
(5, 109, 40, 9.50, 'Restocked from returned items'),
(5, 110, -12, 14.00, 'Stock adjustment after sale error'),
(6, 111, 25, 22.00, 'New batch received'),
(6, 112, -7, 19.00, 'Stock removed due to defects'),
(7, 113, 15, 11.50, 'Inventory audit correction'),
(7, 114, -6, 13.00, 'Stock loss adjustment'),
(8, 115, 10, 16.00, 'Promotional items added to stock'),
(8, 116, -3, 7.50, 'Stock used for internal testing'),
(9, 117, 35, 6.00, 'Restocked items after recount'),
(9, 118, -4, 12.75, 'Stock removed due to expiry'),
(10, 119, 50, 17.00, 'New delivery recorded'),
(10, 120, -9, 21.00, 'Damaged stock removed');



-- transaction_types table insertion 

INSERT INTO transaction_types (Name, Factor) 
VALUES 
('Purchase', 1),
('Sale', -1),
('Return to Supplier', -1),
('Return from Customer', 1),
('Stock Adjustment Increase', 1),
('Stock Adjustment Decrease', -1),
('Damage or Loss', -1),
('Opening Balance', 1),
('Internal Transfer In', 1),
('Internal Transfer Out', -1);


-- status table insertion  

INSERT INTO status (Name) 
VALUES 
('Active'),
('Inactive'),
('Pending'),
('Completed'),
('Cancelled'),
('On Hold'),
('Processing'),
('Approved'),
('Rejected'),
('Failed');


-- customers table insertion 
INSERT INTO customers (Name, Email, Phone, Address, Photo) 
VALUES 
('John Doe', 'john.doe@example.com', '01712345678', '123 Main Street, Dhaka', 'john_doe.jpg'),
('Jane Smith', 'jane.smith@example.com', '01823456789', '45 East Avenue, Chattogram', 'jane_smith.jpg'),
('Michael Rahman', 'michael.rahman@example.com', '01934567890', '67 North Road, Rajshahi', 'michael_rahman.jpg'),
('Sophia Akter', 'sophia.akter@example.com', '01645678901', '89 South Lane, Khulna', 'sophia_akter.jpg'),
('David Hasan', 'david.hasan@example.com', '01756789012', '21 West Boulevard, Sylhet', 'david_hasan.jpg'),
('Emily Khan', 'emily.khan@example.com', '01867890123', '34 Urban Plaza, Barishal', 'emily_khan.jpg'),
('Liam Islam', 'liam.islam@example.com', '01978901234', '56 Outskirts Road, Mymensingh', 'liam_islam.jpg'),
('Noah Chowdhury', 'noah.chowdhury@example.com', '01689012345', '78 Relief Street, Cumilla', 'noah_chowdhury.jpg'),
('Olivia Karim', 'olivia.karim@example.com', '01790123456', '101 Sector 7, Savar', 'olivia_karim.jpg'),
('Emma Alam', 'emma.alam@example.com', '01801234567', '202 New Town, Gazipur', 'emma_alam.jpg');



