<?php 

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'todolist';

//Buat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

//Cek conn
if ($conn == null) {
    die('Koneksi Gagal'. mysqli_connect_error());
}   

// untuk menampilkan data
function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// untuk menambah data list
function add($data) {
    global $conn;

    // mengisi variabel $kegiatan dengan array $_POST yang memiliki name="kegiatan"
    $kegiatan = htmlspecialchars( $data['kegiatan']);

    // melakukan query INSERT INTO ke dalam tabel dengan variabel $kegiatan
    $query = "INSERT INTO list VALUES 
              ('', '$kegiatan')";
    mysqli_query($conn, $query);
    header("Location: index.php");
}

// untuk menambah data user (register)
function register($data) {
    global $conn;

    // mengisi variabel $kegiatan dengan array $_POST yang memiliki name="kegiatan"
    $email = $data['email'];
    $username = $data['username'];
    $password = $data['password'];
    $password2 = $data['password2'];
    
    // mengecek apakah user telah benar memasukkan konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>
            alert('Harap masukkan password yang sama!');
        </script>
        ";
        return false;
    }

    // // enkripsi password
    // $password = password_hash($password, PASSWORD_DEFAULT);

    // melakukan query INSERT INTO ke dalam tabel dengan variabel $kegiatan
    $query = "INSERT INTO user VALUES 
              ('', '', '$username', '$email', '$password')";
    mysqli_query($conn, $query);
    header("Location: index.php");
}

// untuk menghapus data
function delete($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM list WHERE id_list = $id");
    header("Location: index.php");
}

// untuk mengupdate data
function update($id, $kegiatan) {
    global $conn;

    $query = "UPDATE list
                SET kegiatan = $kegiatan
                WHERE id_list = $id";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>
