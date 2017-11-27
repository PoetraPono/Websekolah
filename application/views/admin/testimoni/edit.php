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

<form action="<?php echo base_url('admin/testimoni/edit/'.$testimoni->id_testimoni) ?>" method="post">
 
  <div class="form-group input-group">
    <span class="input-group-addon"><i class="fa fa-list"></i></span>
    <input 
        type="text" 
        name="nama_testi" 
        class="form-control" 
        placeholder="Nama Testimoni"
        required value="<?php echo $testimoni->nama_testi ?>">
  </div>
  <div class="form-group input-group">
    <span class="input-group-addon"><i class="fa fa-key"></i></span>
    <textarea class="form-control" name="isi"><?php echo $testimoni->isi;?></textarea>
  </div>
  <div class="form-group input-group">
      <input type="submit" name="submit" value="Update" class="btn btn-primary btn-md">
  </div>
</form>