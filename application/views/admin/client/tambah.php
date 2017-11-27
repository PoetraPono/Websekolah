<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
	file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: '<?php echo base_url() ?>assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    },
    selector: "#isi",
	height: 100,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

<style>
#imagePreview {
    width: 75px;
    height: 75px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $("#file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>


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

<form action="<?php echo base_url('admin/client/tambah') ?>" method="post" enctype="multipart/form-data">

<div class="col-md-4">
	<div class="form-group">
    	<label>Nama lengkap</label>
        <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>"  placeholder="Nama lengkap" required>
    </div>

<div class="form-group">
    	<label>Email (Username)</label>
        <input type="text" name="email" class="form-control" value="<?php echo set_value('email') ?>" placeholder="Email client">
    </div>
    
    <div class="form-group">
    	<label>Phone</label>
		<input type="text" name="telepon" class="form-control" placeholder="Phone"  value="<?php echo set_value('telepon') ?>">
        </select>
    </div>
</div>

<div class="col-md-4">
    
	<div class="form-group">
    	<label>Website</label>
        <input type="text" name="website" class="form-control" placeholder="Website"  value="<?php echo set_value('website') ?>">
    </div>
 
    <div class="form-group">
    	<label>Publikasikan untuk umum?</label>
        <select name="status_client" class="form-control">
        	<option value="No">No, Only for internal used</option>
            <option value="Yes">Yes, Publish</option>
            <option value="Pending">Pending</option>
        </select>
    </div>
    
    <div class="form-group">
    	<label>Publish client testimonial?t</label>
        <select name="status_testimoni" class="form-control">
        	<option value="Yes">Yes, Publish</option>
            <option value="No">No, Only for internal used</option>
        </select>
    </div>

</div>

<div class="col-md-4">
	
    <div class="form-group">
   	  <label>Alamat</label>
        <textarea name="alamat" rows="2" class="form-control" placeholder="Alamat"><?php echo set_value('alamat') ?></textarea>
    </div>
    
	<div class="form-group">
    	<label>Upload gambar/logo</label>
      <input type="file" name="gambar" class="form-control" id="file">
        <div id="imagePreview"></div>
    </div> 
    
</div>

<div class="col-md-8">
	<div class="form-group">
    	<label>Testimony</label>
        <textarea name="isi_testimoni" placeholder="Isi Testimoni Client" class="form-control tinymce" id="isi"><?php echo set_value('isi_testimoni') ?></textarea>
    </div>
</div>

<div class="col-md-4">    
	<div class="form-group">
    	<label>Keterangan</label>
        <textarea name="isi" placeholder="Client Keterangan" class="form-control tinymce" id="isi"><?php echo set_value('isi') ?></textarea>
    </div>
    
    <div class="form-group">
    	<label>Keywords (untuk pencarian Google)</label>
        <textarea name="keywords" placeholder="Keywords Client" class="form-control"><?php echo set_value('keywords') ?></textarea>
    </div>
    
    <div class="form-group">
	<input type="submit" name="submit" value="Simpan Client" class="btn btn-primary btn-lg">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary btn-lg">
    </div>
</div>

</form>