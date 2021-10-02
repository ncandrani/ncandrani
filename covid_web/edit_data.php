<?php
include_once('functions.php');

$id = $_GET['id'];

$func = new functions();

$data = $func->detailPatient($id);

if (isset($_POST["submit"])) {
        if ($func->addEditPatient($_POST) > 0){
                echo "
                <script>
                alert('Data berhasil diubah');
                document.location.href = 'list_data.php';
            </script>
            ";
        }
        else {
            die('ERROR: data gagal '.$data.': '. mysqli_error($data));
        }
    }
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
    <nav class="navbar navbar-expand-lgnavbar-dark bg-primary">
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
                        <a class="nav-link " href="list_data.php">List Data Pasien</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Form -->
    <section>
        <div class="container">
            <h1 class="mt-3 mb-2">Edit Data Pasien Covid-19</h1>
            <?php foreach($data as $d) : ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="name" value="<?= $d['name'] ?>" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Kelamin :</label>
                    <select class="form-control" name="gender" id="exampleFormControlSelect1">
                        <?php

                        if ($d['gender'] == "L") echo "<option value='L' selected>Laki-laki</option>";
                        else echo "<option value='L'>Laki-laki</option>";
                        
                        if ($d['gender'] == "P") echo "<option value='P' selected>Perempuan</option>";
                        else echo "<option value='P'>Perempuan</option>";

                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Kondisi Pasien :</label>
                    <select class="form-control" name="is_recover" id="exampleFormControlSelect1">
                        <?php

                        if ($d['is_recover'] == 1) echo "<option value=1 selected>Sembuh</option>";
                        else echo "<option value=1>Sembuh</option>";
                        
                        if ($d['is_recover'] == 0) echo "<option value=0 selected>Belum</option>";
                        else echo "<option value=0>Belum</option>";

                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" name="address" value="<?= $d['address'] ?>" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Lahir :</label>
                    <input type="date" name="birth" value="<?= $d['birth'] ?>" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Kondisi Pasien :</label>
                    <select class="form-control" name="inpatient" id="exampleFormControlSelect1">
                        <?php

                        if ($d['inpatient'] == 1) echo "<option value=1 selected>Isolasi di Rumah Sakit</option>";
                        else echo "<option value=1>Isolasi di Rumah Sakit</option>";
                        
                        if ($d['inpatient'] == 0) echo "<option value=0 selected>Isolasi Mandiri</option>";
                        else echo "<option value=0>Isolasi Mandiri</option>";

                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Gejala yang diderita :</label>
                    <textarea class="form-control" name="indication"><?= $d['indication'] ?></textarea>
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
            </form>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- End Form -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    
</body>

</html>