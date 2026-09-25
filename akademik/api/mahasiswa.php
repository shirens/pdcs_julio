<?php

require_once "../config.php";
require_once "../helpers/response.php";

$q = "SELECT m.id, m.nama, m.nim, j.nama_jurusan AS jurusan FROM mahasiswa m LEFT JOIN jurusan
j on m.jurusan_id = j.id ORDER BY m.id DESC";

$r = mysqli_query($koneksi, $q);

if(!$r) sendResponse(false, "query gagal: " . mysqli_error($koneksi), null, 500);

$data = [];
while ($row = mysqli_fetch_assoc($r)) {
    $data[] = $row;
}

sendResponse(true, "berhasil", $data, 200);

?>