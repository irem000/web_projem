<?php
// Hataları göster
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Kullanıcıdan gelen verileri al
$kullanici = $_POST['kullanici'] ?? '';
$sifre = $_POST['sifre'] ?? '';

// Mail adresi kontrolü
function gecerliSakaryaMail($mail) {
    return preg_match('/^[a-z0-9._%+-]+@sakarya\.edu\.tr$/', $mail);
}

// Giriş bilgileri dolu mu kontrol et
if (empty($kullanici) || empty($sifre) || !gecerliSakaryaMail($kullanici)) {
    header("Location: login.html");
    exit;
}

// Kullanıcı adı doğruysa şifre kısmı mail'in başındaki öğrenci numarası olmalı
$dogru_sifre = explode('@', $kullanici)[0];

// Doğrulama
if ($sifre === $dogru_sifre) {
    echo "<h2 style='text-align:center; margin-top:100px;'>Hoşgeldiniz <strong>$sifre</strong>! Giriş başarılı.</h2>";
    echo "<div style='text-align:center; margin-top:20px;'><a href='webOdev.html' class='btn btn-success'>Ana Sayfa</a></div>";
} else {
    header("Location: login.html");
    exit;
}
?>
