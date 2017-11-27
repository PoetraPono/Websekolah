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

<table class="table table-bordered" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Jenis Kerusakan</th>
    <th>Kerusakan</th>
    <th>Keterangan</th>
    <th>Status Kerusakan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kerusakan_barang as $kerusakan_barang) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $kerusakan_barang->nama_jenis_kerusakan ?></td>
    <td><?php echo $kerusakan_barang->nama_kerusakan ?></td>
    <td><?php echo $kerusakan_barang->keterangan ?></td>
    <td><?php echo $kerusakan_barang->status_kerusakan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/kerusakan_barang/edit/'.$kerusakan_barang->id_kerusakan_barang) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>