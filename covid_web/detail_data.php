<?php
include_once('functions.php');

$id = $_GET['id'];

$func = new functions();

$data = $func->detailPatient($id);

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

    <!-- Form -->
    <section>
        <div class="container">
            <a href="list_data.php" class="btn btn-primary mt-3">List Data Pasien</a>
            <?php foreach($data as $d) : ?>
            <h1 class="mt-3 mb-">Detail Data Pasien <?= $d['name'] ?></h1>
            <table class="table table-hover table-borderless">
                    <tbody>
                        <tr>
                            <td scope="row">Nama :</td>
                            <td><?= $d['name'] ?></td>
                        </tr>
                        <tr>
                            <td scope="row">Jenis Kelamin :</td>
                            <td><?= $d['gender'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                        </tr>
                        <tr>
                            <td scope="row">Kondisi Pasien :</td>
                            <td><?= $d['is_recover'] == 0 ? '<span class="badge badge-danger p-2">Belum</span>' : '<span class="badge badge-success p-2">Ya</span>' ?></td>
                        </tr>
                        <tr>
                            <td scope="row">Alamat : </td>
                            <td><?= $d['address'] ?></td>
                        </tr>
                        <?php
                            $birth = new DateTime($d['birth']); 
                            $today = new Datetime(date('m.d.y'));

                            $diff = $today->diff($birth);
                        ?>
                        <tr>
                            <td scope="row">Umur : </td>
                            <td><?php printf('%d Tahun, %d bulan, %d hari', $diff->y, $diff->m, $diff->d);  ?></td>
                        </tr>
                        <tr>
                            <td scope="row">Isolasi : </td>
                            <td><?= $d['inpatient'] == 0 ? 'Isolasi Mandiri' : 'Isolasi di Rumah Sakit' ?></td>
                        </tr>
                        <tr>
                            <td scope="row">Gejala yang diderita : </td>
                            <td><?= $d['indication'] ?></td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </section>

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>