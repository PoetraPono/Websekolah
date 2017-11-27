<p>
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

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Gambar</th>
    <th>Nama kategori barang</th>
    <th>Slug</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori_barang as $kategori_barang) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
    <?php if($kategori_barang->gambar != "") { ?>
    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$kategori_barang->gambar) ?>" width="60" class="img img-responsive">
    <?php }else{ echo 'Tidak ada'; } ?>
    </td>
    <td><?php echo $kategori_barang->nama_kategori_barang ?></td>
    <td><?php echo $kategori_barang->slug_kategori_barang ?></td>
    <td><?php echo $kategori_barang->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/kategori_barang/edit/'.$kategori_barang->id_kategori_barang) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>