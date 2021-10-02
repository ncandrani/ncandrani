<?php
include_once('functions.php');

$func = new functions();

$rows = $func->getStatistic();

$stats = $func->countStatistic();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>RS Sehat Mulia</title>
</head>

<body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">RS Sehat Mulia</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="list_data.php">List Data Pasien</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start Banner -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 title-banner">
                <h1>Selamat datang di <br> Rumah Sakit Sehat Mulia</h1>
                <p>Rumah sakit yang memberikan pelayanan berkaitan tentang Covid-19</p>
                <a href="list_data.php" class="btn btn-primary">Cek Data Pasien</a>
            </div>
            <div class="col-md-6">
                <img src="assets/img/banner.png" alt="" srcset="">
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start Statistic -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow bg-white rounded" style="width: 18rem;">
                    <div class="card-body ">
                        <h5 class="card-title title-statistic">Penderita Covid</h5>
                        <p class="card-text text-statistic"><?= $stats['total_covid'] ?> Orang</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow bg-white rounded" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title title-statistic">Sembuh</h5>
                        <p class="card-text text-statistic"><?= $stats['total_sembuh'] ?> Orang</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow bg-white rounded" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title title-statistic">Dirawat</h5>
                        <p class="card-text text-statistic"><?= $stats['total_rawat'] ?> Orang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Statistic -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>