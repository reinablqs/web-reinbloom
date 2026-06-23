<?php

//panggil koneksi database
include "conn.php";

//uji jika tombol simpan di klik
if (isset($_POST['bsimpan'])) {

    //persiapan simpan data baru 
    $simpan = mysqli_query($koneksi, "INSERT INTO tbarang (id_barang, nama, jenis, warna, merek, tempat, jumlah)
                                        VALUES ('$_POST[tid]',
                                                '$_POST[tnama]',
                                                '$_POST[tjenis]',
                                                '$_POST[twarna]',
                                                '$_POST[tmerek]',
                                                '$_POST[ttempat]',
                                                '$_POST[tjumlah]')");

    //jika simpan sukses
    if ($simpan) {
        echo "<script>
                alert('Simpan data Sukses!');
                document.location='index.php';
            </script>";
    } else {
        echo "<script>
                alert('Simpan data Gagal!');
                document.location='index.php';
            </script>";
    }
}


//uji jika tombol ubah di klik
if (isset($_POST['bubah'])) {

    //persiapan ubah data 
    $ubah = mysqli_query($koneksi, "UPDATE tbarang SET 
                                                        id_barang = '$_POST[tid]',
                                                        nama = '$_POST[tnama]',
                                                        jenis = '$_POST[tjenis]',
                                                        warna = '$_POST[twarna]',
                                                        merek = '$_POST[tmerek]',
                                                        tempat = '$_POST[ttempat]',
                                                        jumlah = '$_POST[tjumlah]'
                                                        WHERE id_barang = '$_POST[id_barang]'
                                                        ");



    //jika ubah sukses
    if ($ubah) {
        echo "<script>
                alert('Ubah data Sukses!');
                document.location='index.php';
            </script>";
    } else {
        echo "<script>
                alert('Ubah data Gagal!');
                document.location='index.php';
            </script>";
    }
}


//uji jika tombol hapus di klik
if (isset($_POST['bhapus'])) {

    //persiapan hapus data 
    $hapus = mysqli_query($koneksi, "DELETE FROM tbarang WHERE id_barang = '$_POST[id_barang]'");

    //jika hapus sukses
    if ($hapus) {
        echo "<script>
                alert('Hapus data Sukses!');
                document.location='index.php';
            </script>";
    } else {
        echo "<script>
                alert('Hapus data Gagal!');
                document.location='index.php';
            </script>";
    }
}
