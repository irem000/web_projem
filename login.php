<?php
// Formdan gelen veriler
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Doğru bilgiler (örnek olarak kendi bilgini kullan)
$dogru_email = "b2412100001@sakarya.edu.tr";
$dogru_password = "b2412100001"; // domain olmayan hali

// Boş kontrolü (extra güvenlik için)
if (empty($email) || empty($password)) {
    header("Location: login.html");
    exit;
}

// Doğrulama
if ($email === $dogru_email && $password === $dogru_password) {
    $kullanici = explode('@', $email)[0]; // b2412100001 kısmı
    echo "<h2 style='text-align:center; margin-top:100px;'>Hoşgeldiniz <strong>$kullanici</strong>! Giriş başarılı.</h2>";
} else {
    // Yanlışsa tekrar login sayfasına gönder
    header("Location: login.html");
    exit;
}
if ($email === $dogru_email && $password === $dogru_password) {
    // Hoşgeldiniz yazısı
} else {
    // login.html'e geri gönder
    header("Location: login.html");
    exit;
}


?>
