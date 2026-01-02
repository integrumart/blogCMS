-- Database schema for 140-character blog CMS
-- Create database
CREATE DATABASE IF NOT EXISTS blogcms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE blogcms;

-- Create posts table
-- VARCHAR(560) allows 140 characters even with 4-byte UTF-8 characters
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content VARCHAR(560) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_created_at (created_at DESC)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
