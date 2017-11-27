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

<?php echo form_open(base_url('admin/dasbor/map')) ?>
<div class="col-md-6">
    <div class="form-group">
    <label>Google Map</label>
    <textarea name="google_map" rows="8" class="form-control" placeholder="Kode dari Google Map"><?php echo $site->google_map ?></textarea>
    </div>
   <div class="form-group">
    <input type="submit" name="submit" value="Save Configuration" class="btn btn-primary btn-lg">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary btn-lg">
  </div>
</div>
    <div class="col-md-6">    
    <div class="form-group map">
    <style>
	.map iframe {
		width: 100%;
		max-height: 250px;
	}
	</style>
    <?php echo $site->google_map ?>
    </div>
    </div>
 
<?php echo form_close() ?>