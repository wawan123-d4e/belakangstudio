<?php
// db.php
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = ""; 
$DB_NAME = "belakangstudiocaffe";

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($mysqli->connect_errno) {
    die("Gagal koneksi MySQL: " . $mysqli->connect_error);
}

$mysqli->set_charset("utf8mb4");

// Fungsi format Rupiah
if (!function_exists('rupiah')) {
    function rupiah($n) {
        return "Rp " . number_format((float)$n, 0, ',', '.');
    }
}

// Fungsi URL Gambar (Sudah diperbaiki agar tidak double folder)
if (!function_exists('imageUrl')) {
    function imageUrl($path) {
        if (empty($path)) return null;
        
        // Base URL otomatis mendeteksi folder root
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $base = $protocol . "://" . $_SERVER['HTTP_HOST'] . "/belakangstudiocaffe/";
        
        // Jika path sudah mengandung 'uploads/', jangan ditambah lagi
        return $base . ltrim($path, '/');
    }
}
?>