<?php
session_start();
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
  <body>

    <h1 class="text-center my-4 py-4">To Do List App</h1>

    <div class="container bg-primary-subtle border border-primary-subtle rounded-3 w-50 m-auto bg-subtle">
        <form action="" method="post">
            <label for="kegiatan">Kegiatan</label> <br> 
            <input class="form-control" type="text" name="kegiatan" id="kegiatan" placeholder="Tuliskan kegiatan Anda disini..." required> <br>
            <button type="submit" name="submit" class="btn btn-success mb-3">Add to List</button>
        </form>
    </div>

    <br>
    <hr class="bg-dark w-50 m-auto">
    <div class="w-50 m-auto"><!DOCTYPE html>
   
        <h2>Daftar kegiatan Anda</h2>

        <table class="table table-primary table table-bordered table-hover">

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
                <td socket="col">
                    <a id="edit" href="update.php?id=<?= $list['id_list'] ?>" class="btn btn-success">Edit</a>
                    <a id="hapus" href="delete.php?id=<?= $list['id_list'] ?>" class="btn btn-danger">Hapus</a>
                    
                </td>
              </tr>
              
            <?php endforeach ?>
            

            </tbody>

          </table>
          <a id="logout" href="delete.php?id=<?= $list['id_list'] ?>" class="btn btn-danger">Log out</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>