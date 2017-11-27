<style>
#imagePreview, .gambar {
    width: 75px !important;
    height: 75px !important;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
	file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: '<?php echo base_url() ?>assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            height: 100,
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

<form action="<?php echo base_url('admin/staff/edit/'.$staff->id_staff) ?>" method="post" enctype="multipart/form-data">


<div class="col-md-4">

<div class="form-group">
    	<label>Status Guru</label>
        <select name="status_tutor" class="form-control">
        	<option value="Ya">Ya</option>
            <option value="Tidak" <?php if($staff->status_tutor=="Tidak") { echo "selected"; } ?>>Tidak</option>
        </select>
    </div>
	<div class="form-group">
    	<label>Nama lengkap</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $staff->nama ?>" required placeholder="Nama lengkap">
    </div>
    

	<div class="form-group">
    	<label>Nomor urut tampil</label>
        <input type="number" name="urutan" class="form-control" value="<?php echo $staff->urutan ?>" placeholder="Urutan tampil">
    </div>
    
    <div class="form-group">
    	<label>Email</label>
        <input type="text" name="email" class="form-control" value="<?php echo $staff->email ?>" required placeholder="Email staff">
    </div>
    
</div>

<div class="col-md-4">

	<div class="form-group">
    	<label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="<?php echo $staff->jabatan ?>" required placeholder="Jabatan">
    </div>
    
	<div class="form-group">
    	<label>Keahlian</label>
        <input type="text" name="expertise" class="form-control" placeholder="Keahlian"  value="<?php echo $staff->expertise ?>">
    </div>
    
    <div class="form-group">
    	<label>Pendidikan</label>
		<input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan"  value="<?php echo $staff->pendidikan ?>">
        </select>
    </div>
    <div class="form-group">
    	<label>Publikasikan ke publik</label>
        <select name="status_staff" class="form-control">
        	<option value="Yes" <?php if($staff->status_staff=="Yes") { echo "selected"; } ?>>Yes, Publish</option>
            <option value="No" <?php if($staff->status_staff=="No") { echo "selected"; } ?>>No, Only for internal used</option>
        </select>
    </div>
</div>

<div class="col-md-4">
	
    
	<div class="form-group">
    	<label>Upload Gambar</label>
      <input type="file" name="gambar" class="form-control" id="file">
        <div id="imagePreview"></div>
        <div class="gambar"><img src="<?php echo base_url('assets/upload/image/thumbs/'.$staff->gambar) ?>" width="75" height="75"></div>
    </div>
</div>



<div class="col-md-4">
<div class="form-group">
    	<label>Ukuran Gambar</label>
        <select name="ukuran" class="form-control">
        	<option value="Small" <?php if($staff->ukuran=="Small") { echo "selected"; } ?>>Small</option>
            <option value="Large" <?php if($staff->ukuran=="Large") { echo "selected"; } ?>>Large</option>
        </select>
    </div>
    <div class="form-group">
    	<label>Keywords (Untuk pencarian Google)</label>
        <textarea name="keywords" placeholder="Keywords Staff" class="form-control"><?php echo $staff->keywords ?></textarea>
    </div> 
</div>

<div class="col-md-12">
	<div class="form-group">
    	<label>Keterangan</label>
        <textarea name="isi" placeholder="Isi Staff" class="form-control" id="isi"><?php echo $staff->isi ?></textarea>
    </div>
    
    
    <div class="form-group">
	<input type="submit" name="submit" value="Save Staff" class="btn btn-primary btn-lg">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary btn-lg">
    </div>
</div>

</form>