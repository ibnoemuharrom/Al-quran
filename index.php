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
      }
    </style>

    <title>Al Qur'anul Karim</title>
  </head>
  <body>

    <!-- Jumbotron -->
    <div class="jumbotron">
      <div class="container text-center">
        <img src="assets/img/alquran.png" class="img-fluid" width="500" alt="alquran">
        <h3 class="mt-3">Al - Qur'anul Karim</h3>
      </div>
    </div>
    <!-- EndJumbotron -->

    <!-- Search -->
    <div class="container">
      <div class="row justify-content-center mt-3">
        <div class="col-md-5">
          <form action="" method="GET">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="search" placeholder="Cari Surah 'Al-Fatihah' " aria-label="Cari 'Al-Fatihah' ">
              <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Endsearch -->

    <!-- Content -->
    <section id="content">
      <div class="container">
        <div class="row justify-content-center mt-5">
          <?php
          // searching
          if (isset($_GET['search']) != '') {
            $search = $_GET['search'];
            $surat = mysqli_query($koneksi, "SELECT * FROM daftarsurah WHERE surah_indonesia LIKE '%".$search."%'");
          } else {
            $surat = mysqli_query($koneksi, "SELECT * FROM daftarsurah");
          }
          while($row = mysqli_fetch_array($surat, MYSQLI_ASSOC)) {
          ?>
          <div class="col-sm-4 mb-3">
            <div class="card shadow-sm">
              <div class="card-body">
                <div class="col">
                  <a href="surah.php?surah=<?= $row['index']; ?>" style="text-decoration: none;">
                    <h5 class="card-title"><?= $row['index']; ?>.
                      <?= $row['surah_indonesia']; ?>
                      <span class="arabic"><?= $row['surah_arab']; ?></span>
                    </h5>
                  </a>
                  <p class="card-text">"<?= $row['arti']; ?>" <?= $row['jumlah_ayat']; ?> Ayat</p>
                </div>
                <div class="col">
                  <p class="card-text"></p>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <?php if (isset($_GET['search'])) : ?>
        <div class="row justify-content-center mt-3">
          <div class="col-md-2">
            <a href="index.php" class="btn btn-primary">Refresh <i class="bi bi-arrow-clockwise"></i></a>
            </div>
          </div>
        <?php endif; ?>
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