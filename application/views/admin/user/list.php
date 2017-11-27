<p><a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-primary">
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
    <th>Nama</th>
    <th>Email</th>
    <th>Username - Level</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($user as $user) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $user->nama ?></td>
    <td><?php echo $user->email ?></td>
    <td><?php echo $user->username ?> - <?php echo $user->akses_level ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>