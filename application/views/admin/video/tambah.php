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

<form action="<?php echo base_url('admin/video/tambah') ?>" method="post" enctype="multipart/form-data">

<div class="col-md-6">
	<div class="form-group">
    	<label>Judul Video</label>
        <input type="text" name="judul" class="form-control" value="<?php echo set_value('judul') ?>" required placeholder="Judul Video">
    </div>
</div>

<div class="col-md-3">
	<div class="form-group">
    	<label>Bahasa</label>
        <select name="bahasa" class="form-control">
        	<option value="Indonesia">Bahasa Indonesia</option>
            <option value="English">English</option>
        </select>
    </div>	
</div>

    <div class="col-md-3">
	<div class="form-group">
    	<label>Urutan tampil</label>
        <input type="number" name="urutan" class="form-control" value="<?php echo set_value('urutan') ?>" required placeholder="Urutan tampil">
    </div>
    </div>

<div class="col-md-6">
     <div class="form-group">
    	<label>Posisi Video</label>
        <select name="posisi" class="form-control">
        	<option value="Homepage">Homepage - Main page</option>
            <option value="Video">Video - Video page</option>
        </select>
    </div>
    
    <div class="form-group">
   	  <label>Keterangan</label>
        <textarea name="keterangan" placeholder="Keterangan" class="form-control" id="keterangan"><?php echo set_value('keterangan') ?></textarea>
    </div>

<div class="form-group">
 <label>Kode Video dari Youtube</label>
 </div>
<div class="form-group input-group">
   	 
      <span class="input-group-addon"><i class="fa fa-link"></i> https://www.youtube.com/watch?v=</span>
        <input type="text" name="video" required class="form-control" placeholder="Kode video dari Youtube" value="<?php echo set_value('video') ?>">
	</div>

</div>
<div class="col-md-6">
	
    
	<div class="form-group">
   	  <label> Lihat Detail</label>
      	<a href="<?php echo base_url('assets/images/youtube.jpg') ?>" target="_blank">
        <img src="<?php echo base_url('assets/images/youtube.jpg') ?>" class="img-responsive">
        </a>
	</div>
	
</div>

<div class="col-md-12">
	
    
    <div class="form-group">
	<input type="submit" name="submit" value="Save Video" class="btn btn-success btn-lg">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary btn-lg">
    </div>
</div>

</form>