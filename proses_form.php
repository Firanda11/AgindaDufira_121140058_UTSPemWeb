<?php
// Fungsi untuk membaca data dari berkas teks
function bacaData() {
    $data = file_get_contents('data_mahasiswa.txt');
    $data = explode("\n", $data);
    return $data;
}

// Periksa apakah ada data yang dikirim dari Halaman Formulir
if (isset($_GET['nama'])) {
    // Ambil data dari query string
    $nama = $_GET['nama'];
    $nim = $_GET['nim'];
    $program_studi = $_GET['prodi'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $jenis_kelamin = $_GET['jenis_kelamin'];
    $tanggal_lahir = $_GET['tgl_lahir'];
    $alamat = $_GET['alamat'];

    // Simpan data ke dalam berkas teks
    $data = "$nama|$nim|$program_studi|$email|$password|$jenis_kelamin|$tanggal_lahir|$alamat\n";
    file_put_contents('data_mahasiswa.txt', $data, FILE_APPEND);
}

// Baca data yang telah tersimpan
$data = bacaData();
foreach ($data as $row) {
    $mahasiswa = explode('|', $row);
    echo "<tr>";
    foreach ($mahasiswa as $item) {
        echo "<td>$item</td>";
    }
    echo "</tr>";
}
?>
