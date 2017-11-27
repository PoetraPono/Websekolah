
<script>
tinymce.init({
  selector: '.konten',
  height: 100,
  allow_script_urls: true,
  convert_urls: false,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
</script>
    
<?php
// Error upload 
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open_multipart(base_url('admin/brand/edit/'.$brand->id_brand));
?>

<div class="col-md-12">
<div class="form-group">
<label>Nama Brand</label>
<input type="text" name="nama_brand" class="form-control" placeholder="Nama Brand" value="<?php echo $brand->nama_brand ?>" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Urutan Brand</label>
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $brand->urutan ?>" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Gambar Brand</label>
<input type="file" name="gambar" class="form-control" placeholder="Gambar" value="<?php echo $brand->gambar ?>">
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Keterangan Brand</label>
<textarea name="keterangan"  class="form-control konten" placeholder="Keterangan" ><?php echo $brand->keterangan ?></textarea>
</div>

<div class="form-group text-right">
<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan Data">
<input type="reset" name="reset" class="btn btn-success btn-lg" value="Reset">
</div>
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

