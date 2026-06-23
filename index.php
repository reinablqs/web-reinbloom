<?php

//Panggil koneksi database
include "conn.php";

?>


<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Inventaris Barang Rumah Ungu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-lavender">

    <header class="bg-ghostwhite shadow-sm">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <img src="./img/reinbloom_logo.png" alt="reinbloom Logo" class="img-fluid" width="200">    
                </div>
                <div class="flex items-center px-4">                   
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="mt-3">
        <h3 class="text-center fw-bold text-indigo">Web Inventaris Barang reinbloom</h3>
        </div>

        <div class="card mt-3">
            <div class="card-header text-indigo bg-lavenderblush">
                Data Barang reinbloom
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data
                </button>

                <table class="table table-bordered table-striped table-hover table-reinbloom">
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Warna</th>
                        <th>Merek</th>
                        <th>Tempat</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>

                    <?php

                    //menampilkan data
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tbarang ORDER BY id_barang DESC");
                    while ($data = mysqli_fetch_array($tampil)) :

                    ?>

                        <tr>
                            <td><?= $no++ ?></th>
                            <td><?= $data['id_barang'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['jenis'] ?></td>
                            <td><?= $data['warna'] ?></td>
                            <td><?= $data['merek'] ?></td>
                            <td><?= $data['tempat'] ?></td>
                            <td><?= $data['jumlah'] ?></td>
                            <td>
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                                <a href="#" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                            </td>
                        </tr>


                        <!-- Modal Ubah Start -->
                        <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data Barang</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi_crud.php">

                                        <input type="hidden" name="id_barang" value="<?=  $data['id_barang'] ?>">

                                        <div class="modal-body">

                                            <!-- Input 1 -->
                                            <div class="mb-3">
                                                <label class="form-label">ID</label>
                                                <input type="text" class="form-control" name="tid" value="<?= $data['id_barang'] ?>" placeholder="Masukan ID Barang">
                                            </div>
                                            <!-- Input 2 -->
                                            <div class="mb-3">
                                                <label class="form-label">Nama Barang</label>
                                                <input type="text" class="form-control" name="tnama" value="<?= $data['nama'] ?>" placeholder="Masukan Nama Barang">
                                            </div>
                                            <!-- Input 3 -->
                                            <div class="mb-3">
                                                <label class="form-label">Jenis</label>
                                                <select class="form-select" name="tjenis">
                                                    <option value="<?= $data['jenis'] ?>"><?= $data['jenis'] ?></option>
                                                    <option value="Benang">Benang</option>
                                                    <option value="Hakpen">Hakpen</option>
                                                    <option value="Alat-Alat">Alat-Alat</option>
                                                    <option value="Hiasan">Hiasan</option>
                                                    <option value="Hiasan">Lainnya</option>
                                                </select>
                                            </div>
                                            <!-- Input 4 -->
                                            <div class="mb-3">
                                                <label class="form-label">Warna</label>
                                                <input type="text" class="form-control" name="twarna" value="<?= $data['warna'] ?>" placeholder="Masukan Warna Barang">
                                            </div>
                                            <!-- Input 5 -->
                                            <div class="mb-3">
                                                <label class="form-label">Merek</label>
                                                <input type="text" class="form-control" name="tmerek" value="<?= $data['merek'] ?>" placeholder="Masukan Merek Barang">
                                            </div>
                                            <!-- Input 6 -->
                                            <div class="mb-3">
                                                <label class="form-label">Tempat</label>
                                                <input type="text" class="form-control" name="ttempat" value="<?= $data['tempat'] ?>" placeholder="Masukan Tempat/Lokasi Penyimpanan Barang">
                                            </div>
                                            <!-- Input 7 -->
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah</label>
                                                <input type="text" class="form-control" name="tjumlah" value="<?= $data['jumlah'] ?>" placeholder="Masukan Jumlah Barang">
                                            </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Ubah End -->


                        <!-- Modal Ubah Start -->
                        <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi_crud.php">

                                        <input type="hidden" name="id_barang" value="<?=  $data['id_barang'] ?>">

                                        <div class="modal-body">

                                            <h5 class="text-center">Apakah anda yakin akan menghapus data ini? <br>
                                                <span class="text-danger"><?= $data['nama'] ?> - <?= $data['warna']?></span>
                                            </h5>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bhapus">Ya, hapus data tersebut!</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Ubah End -->



                    <?php endwhile ?>
                </table>

                <!-- Modal Tambah Start -->
                <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Barang</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="aksi_crud.php">
                                <div class="modal-body">

                                    <!-- Input 1 -->
                                    <div class="mb-3">
                                        <label class="form-label">ID</label>
                                        <input type="text" class="form-control" name="tid" placeholder="Masukan ID Barang">
                                    </div>
                                    <!-- Input 2 -->
                                    <div class="mb-3">
                                        <label class="form-label">Nama Barang</label>
                                        <input type="text" class="form-control" name="tnama" placeholder="Masukan Nama Barang">
                                    </div>
                                    <!-- Input 3 -->
                                    <div class="mb-3">
                                        <label class="form-label">Jenis</label>
                                        <select class="form-select" name="tjenis">
                                            <option></option>
                                            <option value="Benang">Benang</option>
                                            <option value="Hakpen">Hakpen</option>
                                            <option value="Alat-Alat">Alat-Alat</option>
                                            <option value="Hiasan">Hiasan</option>
                                        </select>
                                    </div>
                                    <!-- Input 4 -->
                                    <div class="mb-3">
                                        <label class="form-label">Warna</label>
                                        <input type="text" class="form-control" name="twarna" placeholder="Masukan Warna Barang">
                                    </div>
                                    <!-- Input 5 -->
                                    <div class="mb-3">
                                        <label class="form-label">Merek</label>
                                        <input type="text" class="form-control" name="tmerek" placeholder="Masukan Merek Barang">
                                    </div>
                                    <!-- Input 6 -->
                                    <div class="mb-3">
                                        <label class="form-label">Tempat</label>
                                        <input type="text" class="form-control" name="ttempat" placeholder="Masukan Tempat/Lokasi Penyimpanan Barang">
                                    </div>
                                    <!-- Input 7 -->
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah</label>
                                        <input type="text" class="form-control" name="tjumlah" placeholder="Masukan Jumlah Barang">
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Tambah End -->
            </div>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>