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

<!--  Modals-->
<div class="panel-body">
<p><button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Testimoni</button></p>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Tambah Testimoni</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url('admin/testimoni') ?>" method="post">
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-list"></i></span>
              <input type="text" name="nama_testi" class="form-control" placeholder="Nama Testimoni" required value="<?php echo set_value('nama_testi') ?>">
            </div>           
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
              <textarea name="isi" class="form-control" placeholder="Isi Testimoni"><?php echo set_value('isi');?></textarea>
            </div>
            <div class="form-group input-group">
              <input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-md">
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div>
</div>
<!-- End Modals-->

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>Nama Testimoni</th>
        <th>Isi</th>
        <th>Tanggal Posting</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
  <?php $i=1; foreach($testimoni as $testimoni) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $testimoni->nama_testi; ?></td>
        <td><?php echo $testimoni->isi ?></td>
        <td class="center"><?php echo $testimoni->tanggal_posting;?></td>
        <td class="center">
        <a href="<?php echo base_url('admin/testimoni/edit/'.$testimoni->id_testimoni) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

        <a href="<?php echo base_url('admin/testimoni/delete/'.$testimoni->id_testimoni) ?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus testimoni ini?')"><i class="fa fa-trash"></i></a>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>