<p><a href="<?php echo base_url('admin/galeri/tambah') ?>" class="btn btn-primary">
<i class="fa fa-plus"></i> Tambah</a></p>

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
    <th>Judul</th>
    <th>Kategori - Posisi</th>
    <th>Website</th>
    <th>Author</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($galeri as $galeri) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$galeri->gambar) ?>" width="60">
    </td>
    <td><?php echo $galeri->judul_galeri ?>
      
      <br><small>
      Link:<br> 
      <textarea name="aa"><?php echo base_url('assets/upload/image/'.$galeri->gambar) ?></textarea>
      </small>

    </td>
    <td><?php echo $galeri->nama_kategori_galeri ?> - <?php echo $galeri->jenis_galeri ?></td>
    <td><?php echo $galeri->website ?></td>
    <td><?php echo $galeri->nama ?></td>
    <td>
      <a href="<?php echo base_url('galeri/read/'.$galeri->id_galeri) ?>" 
      class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

      <a href="<?php echo base_url('admin/galeri/edit/'.$galeri->id_galeri) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>