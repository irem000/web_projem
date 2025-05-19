<?php
// Formdan gelen veriler
$kullanici = $_POST['kullanici'] ?? '';
$sifre = $_POST['sifre'] ?? '';

// Doğru bilgiler
$dogru_kullanici = "b2412100001@sakarya.edu.tr";
$dogru_sifre = "b2412100001"; // domain olmayan hali

// Boş alan kontrolü
if (empty($kullanici) || empty($sifre)) {
    header("Location: login.html");
    exit;
}

// Doğrulama işlemi
if ($kullanici === $dogru_kullanici && $sifre === $dogru_sifre) {
    $kisa_kullanici = explode('@', $kullanici)[0]; // b2412100001 kısmını al
    echo "<h2 style='text-align:center; margin-top:100px;'>Hoşgeldiniz <strong>$kisa_kullanici</strong>! Giriş başarılı.</h2>";
    echo "<div style='text-align:center; margin-top:20px;'><a href='webOdev.html' class='btn btn-success'>Ana Sayfa</a></div>";
} else {
    header("Location: login.html");
    exit;
}
?>
