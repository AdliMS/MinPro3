<?php

session_start();

if (! isset($_SESSION['username'])) {
    header('Location: login.php');
}
require 'dbconn.php';

$lists = query('SELECT * FROM list');

// jika array $_POST memiliki nilai name="submit",..
if (isset ($_POST['submit'])) {

  add($_POST);
    
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-dark">

      <div class="w-50 m-auto">
        
      <table class="table table-dark table-borderless">
      <thead>
        <tr>
          <th scope="col"><h1 class="text-end my-4 py-4 text-light">To Do List App</h1></th>
          <th scope="col"><img class="float end" style="max-width: 160px; max-height: 160px" src="assets/hutao.jpg" alt=""></th>
        </tr>
      </thead>

      </table>

      </div>
      
    
    
    <div class="container w-50 m-auto text_start">
        <h6 class="text-right my-1 py-1 text-light">Selamat datang, <?php echo $_SESSION['username']?>
        </h6>
    </div>
    
    <div class="container border border-secondary-subtle rounded-3 w-50 m-auto">
        <form action="" method="post">
            <label for="kegiatan">Kegiatan</label> <br> 
            <input class="form-control" type="text" name="kegiatan" id="kegiatan" placeholder="Tuliskan kegiatan Anda disini..." required> <br>
            <button type="submit" name="submit" class="btn btn-primary mb-3">Add to List</button>
        </form>
    </div>

    <br>
    <hr class="bg-dark w-50 m-auto text-light">
    <div class="w-50 m-auto">
   
        <h2 class="text-light">Daftar kegiatan Anda</h2>

        <table class="table table-dark table-bordered table-hover w-100 rounded-3 overflow-hidden">

            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Kegiatan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>

            <tbody class="table-group-divider">

            <?php foreach($lists as $list) : ?>

              <tr>
                <td scope="col"><?= $list['id_list'] ?></td>
                <td scope="col"><?= $list['kegiatan'] ?></td>
                <td socket="col" class="col-2">
                    <a id="edit" href="update.php?id=<?= $list['id_list'] ?>" class="btn btn-success">Edit</a>
                    <a id="hapus" href="delete.php?id=<?= $list['id_list'] ?>" class="btn btn-danger">Hapus</a>
                    
                </td>
              </tr>
              
            <?php endforeach ?>
            

            </tbody>

          </table>
          <a id="logout" href="logout.php" class="btn btn-danger">Log out</a>

          
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>