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
    height: 250,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
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

<?php echo form_open(base_url('admin/dasbor/captcha')) ?>

<input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">


    <div class="form-group">
    <label>Re-Capthcha site key</label>
    <input type="text" name="site_key" placeholder="Site key" value="<?php echo $site->site_key ?>" class="form-control" required>
    </div>
    
    <div class="form-group">
    <label>Re-Capthcha secret key</label>
    <input type="text" name="secret_key" placeholder="Site key" value="<?php echo $site->secret_key ?>" class="form-control" required>
    </div>

  

 <div class="form-group">
	<input type="submit" name="submit" value="Save Configuration" class="btn btn-primary">
    <input type="reset" name="reset" value="Reset" class="btn btn-primary">
</div>

</form>