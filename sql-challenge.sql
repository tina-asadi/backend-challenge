-- Create database and switch into it
CREATE DATABASE IF NOT EXISTS challenge_db;
USE challenge_db;

-- Create table
DROP TABLE IF EXISTS contacts;
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    phone VARCHAR(15)  -- allows shorter numbers for testing edge cases
);

-- Insert sample phone numbers
INSERT INTO contacts (phone) VALUES
('1234567890'),   -- valid
('4165551234'),   -- valid
('9876543210'),   -- valid
('12345'),        -- too short
(NULL);           -- NULL case

-- ================================
-- SQL Challenge: Format phone numbers
-- ================================

-- 1. Standard formatting (parentheses and dashes)
SELECT
    id,
    CONCAT('(', SUBSTRING(phone, 1, 3), ') ', SUBSTRING(phone, 4, 3), ' ', SUBSTRING(phone, 7, 4)) AS formatted_parentheses,
    CONCAT(SUBSTRING(phone, 1, 3), '-', SUBSTRING(phone, 4, 3), '-', SUBSTRING(phone, 7, 4)) AS formatted_dashes
FROM contacts;

-- 2. Bonus: Handle edge cases (short numbers, NULL, etc.)
SELECT
    id,
    CASE
        WHEN phone IS NULL THEN 'NULL value'
        WHEN LENGTH(phone) = 10 THEN CONCAT('(', SUBSTRING(phone, 1, 3), ') ', SUBSTRING(phone, 4, 3), ' ', SUBSTRING(phone, 7, 4))
        ELSE 'Invalid number'
    END AS formatted_parentheses,
    CASE
        WHEN phone IS NULL THEN 'NULL value'
        WHEN LENGTH(phone) = 10 THEN CONCAT(SUBSTRING(phone, 1, 3), '-', SUBSTRING(phone, 4, 3), '-', SUBSTRING(phone, 7, 4))
        ELSE 'Invalid number'
    END AS formatted_dashes
FROM contacts;
