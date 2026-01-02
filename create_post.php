<?php
require_once 'db.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php?error=' . urlencode('Geçersiz istek'));
    exit;
}

// Get and validate content
$content = isset($_POST['content']) ? trim($_POST['content']) : '';

if (empty($content)) {
    header('Location: index.php?error=' . urlencode('İçerik boş olamaz'));
    exit;
}

if (mb_strlen($content) > 140) {
    header('Location: index.php?error=' . urlencode('İçerik 140 karakterden uzun olamaz'));
    exit;
}

// Insert post into database
try {
    $pdo = getDBConnection();
    $stmt = $pdo->prepare("INSERT INTO posts (content) VALUES (:content)");
    $stmt->execute(['content' => $content]);
    
    header('Location: index.php?success=1');
    exit;
} catch (Exception $e) {
    header('Location: index.php?error=' . urlencode('Veritabanı hatası'));
    exit;
}
?>
