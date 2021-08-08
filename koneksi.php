<?php
$koneksi = mysqli_connect("localhost","root","");
mysqli_set_charset($koneksi, 'utf8');
mysqli_select_db($koneksi, 'alquran');