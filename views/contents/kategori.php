<?php
  include_once($url_db);
  $digit = 5;
  $name_page = 'kategori';
  $text_jdl =  ($_GET['action']=='edit') ? 'Edit data' : 'Input data';
  $collapse_control = ($_GET['action']=='edit') ? 'show' : '' ;
  switch ($_GET['action']) {
    case 'ubah':
      if (isset($_POST['submit'])) {
        $judul = $_POST['judul_buku'];
        $deskripsi = $_POST['deskripsi'];
        $date = $_POST['date'];
        $harga = $_POST['harga'];
        $id = $_POST['id'];
        if (empty($_FILES['upload_cover']['name'])) {
          $query = "UPDATE tb_buku SET jdl_buku='$judul',deskripsi='$deskripsi',tgl_terbit='$date',harga='$harga' WHERE id = '$id'";
          $query_execute = mysqli_query($connect,$query);
          if ($query_execute) {
            $message = "Data berhasil dirubah !";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }else {
            $message = "Data gagal dirubah !";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
        } else {
          $query1 = "SELECT photo FROM tb_buku";
          $query_exe = mysqli_query($connect,$query1);
          $container = mysqli_fetch_array($query_exe);
          if ($container['photo']=='') { }else { unlink($url_db_cover.$container['photo']); }
          // start untuk upload image ke db folder
          $file = $_FILES['upload_cover']['name'];
          $target_file = $url_db_cover.basename($_FILES['upload_cover']['name']);
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $extensions_arr = array("jpg","jpeg","png","gif");
          $random=str_pad(rand(0, pow(10, $digit)-1), $digit, '0', STR_PAD_LEFT).'-';
          if (in_array($imageFileType,$extensions_arr)) {
            move_uploaded_file($_FILES['upload_cover']['tmp_name'],$url_db_cover.$random.$file);
          }
          $query2 = "UPDATE tb_buku SET jdl_buku='$judul',deskripsi='$deskripsi',tgl_terbit='$date',harga='$harga',photo='$random$file' WHERE id = '$id'";
          $query_execute1 = mysqli_query($connect,$query2);
          if ($query_execute1) {
            $message = "Data berhasil rubah !";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }else {
            $message = "Data gagal dirubah !";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
        }
      }
      break;
    case 'hapus':
      $query1 = "SELECT photo FROM tb_buku";
      $query_exe = mysqli_query($connect,$query1);
      $container = mysqli_fetch_array($query_exe);
      if ($container['photo']=='') { }else {unlink($url_db_cover.$container['photo']);}
      $id = $_GET['id'];
      $query_delete = mysqli_query($connect,"DELETE FROM tb_buku WHERE id = '$id'");
      if ($query_delete) {
        $message = "Data berhasil hapus !";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }else {
        $message = "Data berhasil hapus !";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
      break;
    default:
      if (isset($_POST['submit'])) {
        $judul = $_POST['judul_buku'];
        $deskripsi = $_POST['deskripsi'];
        $date = $_POST['date'];
        $harga = $_POST['harga'];
        // start untuk upload image ke db folder
        $file = $_FILES['upload_cover']['name'];
        $target_file = $url_db_cover.basename($_FILES['upload_cover']['name']);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extensions_arr = array("jpg","jpeg","png","gif");
        $random=str_pad(rand(0, pow(10, $digit)-1), $digit, '0', STR_PAD_LEFT).'-';
        if (in_array($imageFileType,$extensions_arr)) {
          $query = "INSERT INTO tb_buku (id,jdl_buku,deskripsi,tgl_terbit,harga,photo) VALUES (NULL,'$judul','$deskripsi','$date','$harga','$random$file')";
          // echo $query;
          move_uploaded_file($_FILES['upload_cover']['tmp_name'],$url_db_cover.$random.$file);
          $query_execute = mysqli_query($connect,$query);
          if ($query_execute) {
            $message = "Data berhasil dimasukkan !";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }else {
            $message = "Data gagal dimasukkan !";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
        }
      }
      break;
    // end untuk upload image
  }
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3 py-3">

            <div class="shadow p-3">
                <div class="form-inline">
                    <h3 class="text-center"><?php echo $text_jdl; ?></h3>
                    <button class="btn btn-outline-info ml-auto" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Show
                    </button>
                </div>
                <div class="collapse <?php echo $collapse_control ?>" id="collapseExample">
                    <br class="my-1">
                    <?php if ($_GET['action']=="edit"){
                        $id = $_GET['id'];
                        $query_get = "SELECT * FROM tb_buku WHERE id = $id";
                        $query_jalan = mysqli_query($connect,$query_get);
                        $fetch_data = mysqli_fetch_array($query_jalan);
                    ?>
                        <form action="<?php echo $url_index.'?page='.$name_page.'&action=ubah' ?>" method="post" enctype='multipart/form-data'>
                        <input type="hidden" name="id" value="<?php echo $fetch_data['id'] ?>">
                        <div class="form-group">
                            <label for="judul_buku">Judul buku</label>
                            <input type="text" class="form-control" name="judul_buku" id="judul_buku" value="<?php echo $fetch_data['jdl_buku']; ?>" aria-describedby="helpId" placeholder="judul buku...">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"><?php echo $fetch_data['deskripsi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="date" name="date" value="<?php echo $fetch_data['tgl_terbit'] ?>" class="w-100 rounded">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" value="<?php echo $fetch_data['harga'] ?>" aria-describedby="harga" placeholder="10000">
                            <small id="harga" class="form-text text-muted">masukkan harganya</small>
                        </div>
                        <div class="form-group">
                            <label for="upload_cover">Masukkan Cover</label>
                            <input type="file" class="form-control-file" name="upload_cover" id="upload_cover"  placeholder="search..." aria-describedby="cover">
                            <small id="cover" class="form-text text-muted">silahkan upload cover buku</small>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                            <a href="<?php echo $url_index.'?page='.$name_page.'&action=' ?>" class="btn btn-danger" style="width:80px;">
                                Batal
                            </a>
                        </div>
                        </form>                
                    <?php }else{ ?>
                        <form action="<?php echo $url_index.'?page='.$name_page.'&action=' ?>" method="post" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="judul_buku">Judul buku</label>
                            <input type="text" class="form-control" name="judul_buku" id="judul_buku" value="" aria-describedby="helpId" placeholder="judul buku...">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" value="" id="deskripsi" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="date" name="date" value="" class="w-100 rounded">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" value="" aria-describedby="harga" placeholder="10000">
                            <small id="harga" class="form-text text-muted">masukkan harganya</small>
                        </div>
                        <div class="form-group">
                            <label for="upload_cover">Masukkan Cover</label>
                            <input type="file" class="form-control-file" name="upload_cover" id="upload_cover" placeholder="search..." aria-describedby="cover">
                            <small id="cover" class="form-text text-muted">silahkan upload cover buku</small>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                            <span class="mx-3"></span>
                            <a href="<?php echo $url_index.'?page='.$name_page.'&action=' ?>" class="btn btn-danger" style="width:80px;">
                                Batal
                            </a>
                        </div>
                        </form>
                    <?php } ?>
                </div>
            </div>

        </div>
        <div class="col-md-8 py-3 ">
          <div class="table-responsive rounded shadow-sm p-3" style="height:800px;">
            <table class="table text-center">
              <thead class="bg-light">
                <tr>
                  <th class="align-middle" scope="col">No.</th>
                  <th class="align-middle" scope="col">Judul Buku</th>
                  <th class="align-middle" scope="col">Deskripsi</th>
                  <th class="align-middle" scope="col">Date</th>
                  <th class="align-middle" scope="col">Harga</th>
                  <th class="align-middle" scope="col">Cover</th>
                  <th class="align-middle" scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no = 1;
                  $query_run = mysqli_query($connect,"SELECT * FROM tb_buku");
                  if (mysqli_num_rows($query_run)>0) {
                    while ($cetak = mysqli_fetch_array($query_run)) {
                ?>
                <tr>
                  <th class="align-middle" scope="row"><?php echo $no; ?></th>
                  <td class="align-middle"><?php echo $cetak['jdl_buku']; ?></td>
                  <td class="align-middle"><?php echo $cetak['deskripsi']; ?></td>
                  <td class="align-middle"><?php echo $cetak['tgl_terbit']; ?></td>
                  <td class="align-middle"><?php echo 'Rp.'.$cetak['harga']; ?></td>
                  <td class="align-middle"><img src="<?php echo $url_db_cover.$cetak['photo']; ?>" alt="cover" width="100px" srcset=""></td>
                  <td class="justify-content-center align-middle">
                    <a href="<?php echo $url_index.'?page='.$name_page.'&action=edit&id='.$cetak['id']; ?>" class="btn btn-outline-primary" style="width:80px;">
                        Edit
                    </a>
                    <a href="<?php echo $url_index.'?page='.$name_page.'&action=hapus&id='.$cetak['id']; ?>" class="btn btn-outline-danger mt-3 mt-xl-0" style="width:80px;">
                        Delete
                    </a>
                  </td>
                </tr>
                <?php
                    $no++;
                    }
                  }else{
                ?>
                <tr>
                  <td class="text-center" colspan="7">
                    Data Kosong
                  </td>
                </tr>
                <?php } ?>
              </tbody>

            </table>
          </div>
        </div>
    </div>
</div>