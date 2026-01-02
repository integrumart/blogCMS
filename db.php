<?php
require_once 'config.php';

// Create database connection
function getDBConnection() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        return $pdo;
    } catch (PDOException $e) {
        // Log the detailed error for debugging (in production, log to file)
        error_log("Database connection error: " . $e->getMessage());
        // Show generic error to user
        die("Veritabanı bağlantı hatası. Lütfen daha sonra tekrar deneyin.");
    }
}
?>
