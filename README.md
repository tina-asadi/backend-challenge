# Backend Developer Challenge

This repository contains my solutions for a backend coding challenge, including a PHP acronym generator and an SQL phone number formatter.

---

## PHP Acronym Generator

**File:** `php-challenge.php`

**Description:**  
Converts any given phrase into its acronym. Hyphens are treated as spaces, punctuation is ignored, and the output is always uppercase. Previous submissions are stored in session history.

**Example:**

| Phrase                    | Acronym |
|----------------------------|---------|
| As Soon As Possible        | ASAP    |
| Liquid-crystal display     | LCD     |
| Thank George It's Friday!  | TGIF    |

**How to run:**
1. Make sure PHP 8.x+ is installed.
2. Start a local server (CLI: `php -S localhost:8000` or use LocalWP/MAMP/Laragon).
3. Open `php-challenge.php` in your browser.
4. Enter a phrase and click **Generate** to see the acronym and previous results.

**Extra:**  
- Stores all previously generated acronyms in session.
- Handles empty or invalid input gracefully.

---

## SQL Phone Number Formatter

**File:** `sql-challenge.sql`

**Description:**  
Formats 10-digit phone numbers into two styles:  
1. `(123) 456 7890`  
2. `123-456-7890`  

It also handles NULL values or numbers that are too short.

**Setup & Sample Data:**
```sql
CREATE DATABASE IF NOT EXISTS challenge_db;
USE challenge_db;

DROP TABLE IF EXISTS contacts;
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    phone VARCHAR(15)
);

INSERT INTO contacts (phone) VALUES
('1234567890'),
('4165551234'),
('9876543210'),
('12345'),
(NULL);

**Extra:**  
- Handles edge cases like NULL values or incomplete numbers.
- Ensures consistent formatting for valid numbers.
