<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 

// File upload error
if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<form action="<?php echo base_url('admin/rekening/edit/'.$rekening->id_rekening) ?>" method="post" enctype="multipart/form-data">

<div class="col-md-6">
	<div class="form-group input-group-lg">
    	<label>Nama Rekening</label>
        <input type="text" name="nama_bank" class="form-control" value="<?php echo $rekening->nama_bank ?>" required placeholder="Nama rekening">
    </div>
   
    
	<div class="form-group">
    	<label>Nomor rekening</label>
        <input type="text" name="nomor_rekening" class="form-control" value="<?php echo $rekening->nomor_rekening ?>" placeholder="Nomor rekening">
    </div>
    
    <div class="form-group">
    	<label>Nama Pemilik Rekening</label>
        <input type="text" name="pemilik_rekening" class="form-control" value="<?php echo $rekening->pemilik_rekening ?>" placeholder="Pemilik rekening">
    </div>

</div>

<div class="col-md-6">
	
    
	<div class="form-group">
    	<label>Upload Foto/Gambar</label>
      <input type="file" name="gambar" class="form-control" id="file">
        <div id="imagePreview"></div>
    </div>
</div>

<div class="col-md-12">   
    <div class="form-group">
	<input type="submit" name="submit" value="Simpan Rekening" class="btn btn-success btn-lg">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary btn-lg">
    </div>
</div>

</form>