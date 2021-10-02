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

    <!-- start list user -->
    <div class="container">
        <h1 class="mt-5 mb-3">Data Pasien terkena Covid-19</h1>
        <a href="tambah_data.php" class="btn btn-primary mb-3">Tambah Data Pasien</a>
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Sembuh</th>
                    <th scope="col">Isolasi di Rumah Sakit</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $i = 1;
                    foreach($rows as $row) : 
                ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['gender'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                    <?php
                        $birth = new DateTime($row['birth']); 
                        $today = new Datetime(date('m.d.y'));

                        $diff = $today->diff($birth);
                    ?>
                    <td><?php printf('%d Tahun, %d bulan, %d hari', $diff->y, $diff->m, $diff->d);  ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['is_recover'] == 0 ? '<span class="badge badge-danger p-2">Belum</span>' : '<span class="badge badge-success p-2">Ya</span>' ?></td>
                    <td><?= $row['inpatient'] == 0 ? '<span class="badge badge-danger p-2"><i class="fa fa-close"></i></span>' : '<span class="badge badge-success p-2"><i class="fa fa-check"></i></span>' ?></td>
                    <td>
                        <a href="detail_data.php?id=<?= $row['id'] ?>" class="badge badge-warning p-2">Detail</a>
                        <a href="edit_data.php?id=<?= $row['id'] ?>" class="badge badge-primary p-2">Edit</a>
                        <a class="badge badge-danger p-2" href="delete_data.php?id=<?php echo $row["id"] ?>" onclick="return confirm('Apakah Anda yakin akan menghapus data?')">Hapus</a>
                    </td>
                </tr>
                <?php 
                    $i++;
                    endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <!-- end list user -->

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