<?php
// Hataları göster
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Kullanıcıdan gelen verileri al
$kullanici = $_POST['kullanici'] ?? '';
$sifre = $_POST['sifre'] ?? '';

// Mail adresi kontrolü
function gecerliSakaryaMail($mail) {
    return preg_match('/^[a-z0-9._%+-]+@sakarya\.edu\.tr$/', $mail); // Sadece @sakarya.edu.tr uzantılı mailleri kabul edecek
}

// Giriş bilgileri(kullanıcı adı - şifre) dolu mu kontrol et
if (empty($kullanici) || empty($sifre) || !gecerliSakaryaMail($kullanici)) { // HTML5'in required özelliğinden dolayı uyarı mesajı tarayıcı tarafından otomatik oluşturulur
    header("Location: login.html"); // Tekrar login sayfası yöndendirilir
    exit;
}

$dogru_sifre = explode('@', $kullanici)[0];// Mail adresinin @ öncesi kısmı, yani öğrenci numarası, şifre olmalıdır

// Doğrulama
if ($sifre === $dogru_sifre) {
    echo "<h2 style='text-align:center; margin-top:100px;'>Hoşgeldiniz <strong>$sifre</strong>! Giriş başarılı.</h2>";
    echo "<div style='text-align:center; margin-top:20px;'><a href='main.html' class='btn btn-success'>Ana Sayfa</a></div>";
} else {
    echo "<script>
  alert('Hatalı giriş! Lütfen bilgilerinizi kontrol edin.');
  window.location.href = 'login.html';
</script>";
exit;

}
?>
