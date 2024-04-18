<?php

include('config.php');
include('config1.php');

function readMakanan()
{
    global $conn;

    $query = "SELECT * FROM menu JOIN chef ON menu.id_chef =  chef.id_chef WHERE menu.id_jenis = 1";
    $result = mysqli_query($conn, $query);

    return $result;
}

function readMinuman()
{
    global $conn;

    $query = "SELECT * FROM menu JOIN chef ON menu.id_chef =  chef.id_chef WHERE menu.id_jenis = 2";
    $result = mysqli_query($conn, $query);

    return $result;
}

function readBahanMenu($menu)
{
    global $conn;

    $query = "SELECT menu_bahan.id_bahan, bahan.nama_bahan, menu_bahan.id_menu_bahan FROM menu_bahan JOIN bahan ON menu_bahan.id_bahan = bahan.id_bahan WHERE menu_bahan.id_menu =" . $menu;
    $result = mysqli_query($conn, $query);

    return $result;
}

function readBahan()
{
    global $conn;
    $query = "SELECT * from bahan";
    $result = mysqli_query($conn, $query);

    return $result;
}

function readChef()
{
    global $conn;

    $query = $query = "SELECT * FROM chef";
    $result = mysqli_query($conn, $query);

    return $result;
}

function readQuery($table, $id, $find)
{
    global $conn;
    $query = "SELECT * FROM " . $table . " WHERE " . $id . "=" . $find;
    $result = mysqli_query($conn, $query);

    return $result;
}

function addMenu($data, $file, $listBahan)
{

    global $conn;
    $namaFoto = $file['foto_makanan']['name'];
    $tempNamaFoto = $file['foto_makanan']['tmp_name'];
    $direktori = 'assets/img/' . $namaFoto;

    $isMoved = move_uploaded_file($tempNamaFoto, $direktori);
    if (!$isMoved) {
        $namaFoto = 'default.jpg';
    }

    $namaMenu = $data['nama_menu'];
    $deskripsi = $data['deskripsi'];
    $harga = $data['harga_menu'];
    $jenis = $data['jenis_menu'];
    $chef = $data['chef'];

    $query = "INSERT INTO menu VALUES('', '$namaMenu', '$namaFoto', $harga, '$deskripsi', '$chef', '$jenis')";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);
    if ($isSucceed > 0) {
        $query = "SELECT id_menu from menu WHERE nama_menu LIKE '$namaMenu'";
        $result = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_assoc($result)) {
            $id = $data['id_menu'];
        }
        foreach ($listBahan as $bahan) {
            $query = "INSERT INTO menu_bahan VALUES('','$id', '$bahan')";
            $result = mysqli_query($conn, $query);
        }
    }
    // mengembalikan nilai sukses
    return $isSucceed;
}

if (isset($data['btn-add'])) {
    // jalankan query tambah record baru
    $listBahan = $data['bahan'];
    $isAddSucceed = addMenu($data, $_FILES, $listBahan);
    if ($isAddSucceed > 0) {
        // jika penambahan sukses, tampilkan alert
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'admin.php';
        </script>";
    } else {
        echo "
        <script>
        alert('Gagal menambahkan Data !');
        document.location.href = 'admin.php';
        </script>
        ";
    }
}

function updateMenu($data, $file, $listBahan)
{
    global $conn;
    $id = $data['id'];
    $namaMenu = $data['nama_menu'];
    $deskripsi = $data['deskripsi'];
    $harga = $data['harga_menu'];
    $jenis = $data['jenis_menu'];
    $chef = $data['chef'];
    $namaFoto = $file['foto_makanan']['name'];

    $menuBahan = readBahanMenu($id);

    if ($namaFoto != "") {

        $tempNamaFoto = $file['foto_makanan']['tmp_name'];
        $direktori = 'assets/img/' . $namaFoto;
        move_uploaded_file($tempNamaFoto, $direktori);
        $query = "UPDATE menu SET nama_menu = '$namaMenu', foto_menu = '$namaFoto', harga = $harga, deskripsi = '$deskripsi', id_chef = $chef, id_jenis = $jenis WHERE id_menu = $id";
        $result = mysqli_query($conn, $query);
    } else {
        $query = "UPDATE menu SET nama_menu = '$namaMenu', harga = $harga, deskripsi = '$deskripsi', id_chef = $chef, id_jenis = $jenis WHERE id_menu = $id";
        $result = mysqli_query($conn, $query);
    }

    $isSucceed = mysqli_affected_rows($conn);
    if ($isSucceed > 0) {
        foreach ($menuBahan as $bahan) {
            $query = "DELETE FROM menu_bahan WHERE id_menu_bahan = " . $bahan['id_menu_bahan'];
            $result = mysqli_query($conn, $query);
        }
        foreach ($listBahan as $bahan) {
            $query = "INSERT INTO menu_bahan VALUES('','$id', '$bahan')";
            $result = mysqli_query($conn, $query);
        }
    }
    // mengembalikan nilai sukses
    return $isSucceed;
}

if (isset($data['edit-menu'])) {
      
    $listBahan = $data['listBahan'];
    // jalankan query tambah record baru
    $isAddSucceed = updateMenu($data, $_FILES, $listBahan);
    if ($isAddSucceed > 0) {
        // jika penambahan sukses, tampilkan alert
        echo "
        <script>
            alert('Data Berhasil di update');
            document.location.href = 'admin.php';
        </script>
    ";
    } else {
        echo "
        <script>
        alert('Tidak Ada Data yang diperbarui !');
        document.location.href = 'admin.php';
        </script>
        ";
    }
}

function deleteMenu($id)
{
    global $conn;
    $bahan = readBahanMenu($id);
    while ($listBahan = mysqli_fetch_assoc($bahan)) {
        $query = "DELETE FROM menu_bahan WHERE id_menu_bahan = " . $listBahan['id_menu_bahan'];
        $result = mysqli_query($conn, $query);
    }
    $query = "DELETE FROM menu WHERE id_menu = $id";
    $result = mysqli_query($conn, $query);


    $isSucceed = mysqli_affected_rows($conn);


    // mengembalikan nilai sukses
    return $isSucceed;
}

function addBahan($data)
{
    global $conn;
    $namaBahan = $data['nama_bahan'];
    $stokBahan = $data['stok_bahan'];
    $hargaBahan = $data['harga_bahan'];

    $query = "INSERT INTO bahan VALUES('', '$namaBahan', '$stokBahan', '$hargaBahan')";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);
    if ($isSucceed > 0) {
        $query = "SELECT id_bahan from bahan WHERE nama_bahan LIKE '$namaBahan'";
        $result = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_assoc($result)) {
            $id = $data['id_bahan'];
        }
    }
    // mengembalikan nilai sukses
    return $isSucceed;
}

if (isset($data['add-bahan'])) {
    // jalankan query tambah record baru
    $isAddSucceed = addBahan($data);
    if ($isAddSucceed > 0) {
        // jika penambahan sukses, tampilkan alert
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'admin.php';
            </script>";
    } else {
        echo "
            <script>
            alert('Gagal menambahkan Data !');
            document.location.href = 'admin.php';
            </script>
            ";
    }
}

function updateBahan($data)
{
    global $conn;
    $idBahan = $data['id_bahan'];
    $namaBahan = $data['nama_bahan'];
    $stokBahan = $data['stok_bahan'];
    $hargaBahan = $data['harga_bahan'];

    if ($namaBahan != "") {
        $query = "UPDATE bahan SET nama_bahan = '$namaBahan', harga_bahan = '$hargaBahan', stok_bahan = '$stokBahan' WHERE id_bahan = $idBahan";
        $result = mysqli_query($conn, $query);
    } else {
        $query = "UPDATE bahan SET nama_bahan = '$namaBahan', harga_bahan = '$hargaBahan', stok_bahan = '$stokBahan' WHERE id_bahan = $idBahan";
        $result = mysqli_query($conn, $query);
    }

    $isSucceed = mysqli_affected_rows($conn);
    if ($isSucceed > 0) {
        $result = mysqli_query($conn, $query);
    }
    // mengembalikan nilai sukses
    return $isSucceed;
}

if (isset($data['edit-bahan'])) {
      
    // jalankan query tambah record baru
    $isAddSucceed = updateBahan($data);
    if ($isAddSucceed > 0) {
        // jika penambahan sukses, tampilkan alert
        echo "
        <script>
            alert('Data Berhasil di update');
            document.location.href = 'admin.php';
        </script>
    ";
    } else {
        echo "
        <script>
        alert('Tidak Ada Data yang diperbarui !');
        document.location.href = 'admin.php';
        </script>
        ";
    }
}

function deleteBahan($id)
{
    global $conn;

    $query = "DELETE FROM bahan WHERE id_bahan = $id";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);

    // mengembalikan nilai sukses
    return $isSucceed;
}

function addChef($data, $file)
{
    global $conn;
    $namaChef = $data['nama_chef'];
    $noTelpChef = $data['no_telp_chef'];
    $alamat_jln = $data['alamat_jln'];
    $provinsi = $data['provinsi'];
    $kabupaten = $data['kabupaten'];
    $kecamatan = $data['kecamatan'];
    $kelurahan = $data['kelurahan'];
    $jenisKelaminChef = $data['jenis_kelamin_chef'];
    $fotoChef = $file['foto_chef']['name'];
    $tempFotoChef = $file['foto_chef']['tmp_name'];
    $direktori = 'assets/img/chefs/' . $fotoChef;
  
    $mysqli = new mysqli("localhost", "root", "", "wilayah_indonesia"); 

    $query_str = "SELECT name FROM provinces WHERE id='$provinsi'";
    $data1 = $mysqli->query($query_str);
    $provinsi_str = $data1->fetch_array();
  
    $query_str = "SELECT name FROM regencies WHERE id='$kabupaten'";
    $data1 = $mysqli->query($query_str);
    $kabupaten_str = $data1->fetch_array();
  
    $alamat = $alamat_jln . ', ' . $kelurahan . ', ' . $kecamatan . ',' . $kabupaten_str[0] . ', ' . $provinsi_str[0];
  
    $isMoved = move_uploaded_file($tempFotoChef, $direktori);
    if (!$isMoved) {
        $fotoChef = 'default.jpg';
    }

    $query = "INSERT INTO chef VALUES('', '$namaChef', '$noTelpChef', '$alamat', '$jenisKelaminChef', '$fotoChef')";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);
    if ($isSucceed > 0) {
        $query = "SELECT id_chef from chef WHERE nama_chef LIKE '$namaChef'";
        $result = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_assoc($result)) {
            $id = $data['id_bahan'];
        }
    }
    // mengembalikan nilai sukses
    return $isSucceed;
}

if (isset($data['add-chef'])) {
    // jalankan query tambah record baru
    $isAddSucceed = addChef($data, $_FILES);
    if ($isAddSucceed > 0) {
      // jika penambahan sukses, tampilkan alert
      echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'admin.php';
            </script>";
    } else {
      echo "
            <script>
            alert('Gagal menambahkan Data !');
            document.location.href = 'admin.php';
            </script>
            ";
    }
}

function updateChef($data, $file)
{
    global $conn;
    $idChef = $data['id_chef'];
    $namaChef = $data['nama_chef'];
    $noTelpChef = $data['no_telp_chef'];
    $alamatChef = $data['alamat_chef'];
    $jenisKelaminChef = $data['jenis_kelamin_chef'];

    $fotoChef = $file['foto_chef']['name'];
    if ($fotoChef != "") {
        $tempFotoChef = $file['foto_chef']['tmp_name'];
        $direktori = 'assets/img/chefs/' . $fotoChef;
        move_uploaded_file($tempFotoChef, $direktori);
        $query = "UPDATE chef SET nama_chef = '$namaChef', no_telp_chef = '$noTelpChef', alamat_chef = '$alamatChef', jenis_kelamin_chef = '$jenisKelaminChef', foto_chef = '$fotoChef' WHERE id_chef = $idChef";
        $result = mysqli_query($conn, $query);
    } else {
        $query = "UPDATE chef SET nama_chef = '$namaChef', no_telp_chef = '$noTelpChef', alamat_chef = '$alamatChef', jenis_kelamin_chef = '$jenisKelaminChef' WHERE id_chef = $idChef";
        $result = mysqli_query($conn, $query);
    }

    $isSucceed = mysqli_affected_rows($conn);
    if ($isSucceed > 0) {
        $result = mysqli_query($conn, $query);
    }
    // mengembalikan nilai sukses
    return $isSucceed;
}
if (isset($data['edit-chef'])) {
      
    // jalankan query tambah record baru
    $isAddSucceed = updateChef($data, $_FILES);
    if ($isAddSucceed > 0) {
        // jika penambahan sukses, tampilkan alert
        echo "
        <script>
            alert('Data Berhasil di update');
            document.location.href = 'admin.php';
        </script>
    ";
    } else {
        echo "
        <script>
        alert('Tidak Ada Data yang diperbarui !');
        document.location.href = 'admin.php';
        </script>
        ";
    }
}

function deleteChef($id)
{
    global $conn;

    $query = "DELETE FROM chef WHERE id_chef = $id";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);

    // mengembalikan nilai sukses
    return $isSucceed;
}
?>