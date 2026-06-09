<?php
include "config.php";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Opsional: Baris ini bisa dihapus jika tidak ingin teks ini muncul di halaman web Anda
    echo "connected successfully<br>"; 

    $Query = "SELECT * FROM products";
    $stmt = $pdo->query($Query);
    
    // PERBAIKAN: Menambahkan PDO::FETCH_ASSOC agar performa lebih cepat dan hemat memori
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($products as $product) {
        // Memastikan kolom 'name' ada di tabel database Anda
        echo htmlspecialchars($product['name']) . "<br>";
    }  

} catch (PDOException $e) {
    // Keamanan: Di server production, sebaiknya jangan menampilkan $e->getMessage() ke publik
    echo "connection failed: " . $e->getMessage();
}
?>







