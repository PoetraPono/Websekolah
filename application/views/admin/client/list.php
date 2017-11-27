
<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 
// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>


<div class="panel-body">
<p><a href="<?php echo base_url('admin/client/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Siswa</a></p>


<table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
<thead>
    <tr>
        <th width="5%">#</th>
        <th width="20%">Nama</th>
        <th width="23%">Email</th>
        <th width="23%">HP</th>
        <th width="9%">Publish?</th>
        <th width="20%"></th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($client as $client) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?>.</td>
        <td><?php echo $client->nama ?></td>
        <td><?php echo $client->email ?></td>
        <td><?php echo $client->telepon; ?></td>
        <td><?php echo $client->status_client; ?></td>
        <td>
<a href="<?php echo base_url('admin/client/password/'.$client->id_client) ?>" class="btn btn-info btn-xs"><i class="fa fa-key"></i> Approve</a>
        
         <a href="<?php echo base_url('admin/siswa/tambah/'.$client->id_client) ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
   <?php include('detail.php') ?>

        <a href="<?php echo base_url('admin/client/edit/'.$client->id_client) ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
       
       <?php include('delete.php') ?>


       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>