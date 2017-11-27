
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
<p><a href="<?php echo base_url('admin/rekening/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Rekening</a></p>


<table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
<thead>
    <tr>
        <th width="5%">#</th>
        <th width="12%">Gambar</th>
        <th width="19%">Nama Bank</th>
        <th width="21%">Nomor Rekening</th>
        <th width="7%">Pemilik</th>
        <th width="17%"></th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($rekening as $rekening) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?>.</td>
        <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$rekening->gambar) ?>" width="60"></td>
        <td><?php echo $rekening->nama_bank ?></td>
        <td><?php echo $rekening->nomor_rekening ?></td>
        <td><?php echo $rekening->pemilik_rekening ?></td>
        <td>
        
    <?php include('detail.php') ?>

        <a href="<?php echo base_url('admin/rekening/edit/'.$rekening->id_rekening) ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
       
       
	<?php include('delete.php') ?>

       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>