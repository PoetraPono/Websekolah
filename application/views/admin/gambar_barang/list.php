<p>
<a href="<?php echo base_url('admin/barang') ?>" class="btn btn-success">
<i class="fa fa-backward"></i> Kembali</a>
  <?php include('tambah.php') ?>
</p>

<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<table class="table table-bordered" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Gambar</th>
    <th>Judul gambar</th>
    <th>Keterangan</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<tr class="odd gradeX bg-danger">
    <td><?php echo 1 ?></td>
    <td>
    <?php if($barang->gambar != "") { ?>
    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$barang->gambar) ?>" width="60" class="img img-responsive">
    <?php }else{ echo 'Tidak ada'; } ?>
    </td>
    <td><?php echo $barang->nama_barang ?></td>
    <td><?php echo 'Gambar utama' ?></td>
    <td>1</td>
    <td>

    </td>
</tr>

<?php $i=2; foreach($gambar_barang as $gambar_barang) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
    <?php if($gambar_barang->gambar != "") { ?>
    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$gambar_barang->gambar) ?>" width="60" class="img img-responsive">
    <?php }else{ echo 'Tidak ada'; } ?>
    </td>
    <td><?php echo $gambar_barang->nama_gambar_barang ?></td>
    <td><?php echo $gambar_barang->keterangan ?></td>
    <td><?php echo $gambar_barang->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/gambar_barang/edit/'.$gambar_barang->id_gambar_barang) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>