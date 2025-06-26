<?php
header('Content-Type: application/json'); // Penting!

// Contoh koneksi database & query
try {
    $pdo = new PDO("mysql:host=localhost;dbname=db_game", "user", "password");
    $stmt = $pdo->prepare("SELECT id, name, rating, image_url FROM games");
    $stmt->execute();
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode(['status' => 'success', 'data' => $games]); // Format JSON
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]); // Error tetap JSON
}

// Jika api.php ada di folder "api":
// Contoh pemanggilan API ini seharusnya diletakkan di file JavaScript, bukan di file PHP.