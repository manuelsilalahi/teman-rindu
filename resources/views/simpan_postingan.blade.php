
$user_id = session('id');
$isi = request('isi');

$foto = "";

if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){

    $foto = time() . "_" . $_FILES['foto']['name'];

    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        "uploads_postingan/" . $foto
    );
}

echo "Postingan berhasil diproses";

