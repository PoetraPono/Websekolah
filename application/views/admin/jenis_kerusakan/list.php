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
    <th>Nama Jenis Kerusakan</th>
    <th>Slug</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($jenis_kerusakan as $jenis_kerusakan) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $jenis_kerusakan->nama_jenis_kerusakan ?></td>
    <td><?php echo $jenis_kerusakan->slug_jenis_kerusakan ?></td>
    <td><?php echo $jenis_kerusakan->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/jenis_kerusakan/edit/'.$jenis_kerusakan->id_jenis_kerusakan) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>