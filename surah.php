<?php
include "koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- My Css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- style -->
    <style>
      @font-face {
        font-family: Uthmani;
        src: url('assets/font/UthmanicHafs1Ver09.otf') format('truetype');
      }

      .arabic {
        color: black;
        font-family: Uthmani;
        font-weight: normal;
        font-size: 30px;
        direction: rtl;
      }
      .latin {
        font-weight: normal;
        direction: ltr;
      }
    </style>

    <title>Al Qur'anul Karim</title>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="index.php">Al-Qur'anul Karim</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="index.php">Beranda <span class="i bi bi-house"></span></a>
          </div>
        </div>
      </div>
    </nav>
    <!-- EndNavbar -->

    <!-- Content -->
    <section id="content-surah" style="padding-top: 3rem;">
      <div class="container">
        <div class="row justify-content-center mt-5">
          <?php
          if (isset($_GET['surah'])) {
            $surah = $_GET['surah'];

            $tampil = mysqli_query($koneksi, "SELECT a.text as arabic, b.text as indonesia FROM arabicquran a LEFT OUTER JOIN indonesianquran b ON a.index = b.index WHERE a.surah = $surah");

            $ayat = 1;
            while($data = mysqli_fetch_array($tampil)) {
              $str = $data['arabic'];
              echo '<p class="arabic">' . $str . format_arabic_number($ayat) . '</p>';
              echo '<p class="latin">' . $data['indonesia'] . '</p>';
              echo '<hr>';
              $ayat++;
            }
            
          }

          // function format number arabic
          function format_arabic_number($number) {
            $arabic_number = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
            $jum_karakter = strlen($number);
            $temp = "";

            for($i = 0; $i < $jum_karakter; $i++) {
              $char = substr($number, $i, 1);
              $temp .= $arabic_number[$char];
            }

            return '<span class"arabic_number">' . $temp . '</span>';
          }
          ?>
        </div>
      </div>
    </section>
    <!-- EndContent -->

    <section id="footer-top">
      
    </section>

    <!-- Footer -->
    <footer id="footer">
      <div class="container">
        <div class="row text-center mt-3 py-4">
          <p>Copyright &copy; <strong>Al-Qur'anul Karim</strong> <?= date('Y'); ?></p>
        </div>
      </div>
    </footer>
    <!-- EndFooter -->

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <!-- Bootstrap min JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    
  </body>
</html>