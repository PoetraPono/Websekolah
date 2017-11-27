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
    <th>Periode Sewa</th>
    <th>Harga</th>
    <th>Keterangan</th>
    <th>Status Harga</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($harga_barang as $harga_barang) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $harga_barang->nama_periode ?></td>
    <td>Rp. <?php echo number_format($harga_barang->harga,'0',',','.') ?></td>
    <td><?php echo $harga_barang->keterangan ?></td>
    <td><?php echo $harga_barang->status_harga ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/harga_barang/edit/'.$harga_barang->id_harga_barang) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>