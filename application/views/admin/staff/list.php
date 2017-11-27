
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
<p><a href="<?php echo base_url('admin/staff/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Guru dan Staff</a></p>


<table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
<thead>
    <tr>
        <th width="8%">#</th>
        <th width="15%">Photo</th>
        <th width="22%">Name</th>
        <th width="17%">Jabatan</th>
        <th width="18%">Status - Sort order</th>
        <th width="20%"></th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($staff as $staff) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?>.</td>
        <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$staff->gambar) ?>" width="60"></td>
        <td><?php echo $staff->nama.'<br> <small>Pendidikan : '.$staff->pendidikan ?></small></td>
        <td><?php echo $staff->jabatan; ?></td>
        <td><?php echo $staff->status_staff.' - '.$staff->urutan; ?></td>
        <td>
        
    <!-- Delete staff -->
       <!--  Modals-->
<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#Detail<?php echo $staff->id_staff; ?>"><i class="fa fa-eye"></i></button>

<div class="modal fade" id="Detail<?php echo $staff->id_staff; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><?php echo $staff->nama ?></h4>
      </div>
      <div class="modal-body">
      <div class="col-md-12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
  <tr>
    <td colspan="2" align="center"><img src="<?php echo base_url('assets/upload/image/thumbs/'.$staff->gambar) ?>" ></td>
    </tr>
  <tr class="bg-primary">
    <th colspan="2" align="center"><?php echo $staff->nama; ?></th>
    </tr>
    
  <tr>
    <td>Position</td>
    <td><?php echo $staff->jabatan; ?></td>
  </tr>
  <tr>
    <td>Jabatan</td>
    <td><?php echo $staff->expertise; ?></td>
  </tr>
  <tr>
    <td>Education/School</td>
    <td><?php echo $staff->pendidikan; ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $staff->email; ?></td>
  </tr>
 
  <tr>
    <td>Status</td>
    <td><?php echo $staff->status_staff; ?></td>
  </tr>
   <tr>
    <td>Keywords</td>
    <td><?php echo $staff->keywords; ?></td>
  </tr>
   <tr>
    <td>Last updated</td>
    <td><?php echo $staff->tanggal; ?></td>
  </tr>
   <tr class="bg-primary">
    <th colspan="2" align="center">Detail</th>
    </tr>
     <tr>
    <td colspan="2"><?php echo $staff->isi; ?></td>
    </tr>
</table>
</div>
<div class="clearfix"></div>
      </div>
      
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div>
<!-- End Modals-->

        <a href="<?php echo base_url('admin/staff/edit/'.$staff->id_staff) ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
       
       <!-- Delete staff -->
       <!--  Modals-->
<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $staff->id_staff; ?>"><i class="fa fa-trash"></i></button>

<div class="modal fade" id="Delete<?php echo $staff->id_staff; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Yeskin ingin menghapus staff ini?</h4>
      </div>
      <div class="modal-body">
      <div class="col-md-12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
  <tr>
    <td>Full name</td>
    <td><?php echo $staff->nama ?></td>
  </tr>
  <tr>
    <td>Status Publikasi</td>
    <td><?php echo $staff->status_staff; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <a href="<?php echo base_url('admin/staff/delete/'.$staff->id_staff) ?>" class="btn btn-primary btn-sm">Delete Staff</a>
    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button></td>
  </tr>
</table>
</div>
<div class="clearfix"></div>
      </div>
      
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div>
<!-- End Modals-->


       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>