<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data){
	global $conn;

	// ambil data dari tiap elemen dalam form
	$foto = htmlspecialchars($data["foto"]);
	$nis = htmlspecialchars($data["nis"]);
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$agama = htmlspecialchars($data["agama"]);

	//query instert data
	$query = "INSERT INTO daftarsiswa (foto, nis, nama, alamat, email, jurusan, agama)
        VALUES ('$foto', '$nis', '$nama', '$alamat', '$email', '$jurusan', '$agama')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM daftarsiswa WHERE id = $id");
	return mysqli_affected_rows($conn);
}

?>
