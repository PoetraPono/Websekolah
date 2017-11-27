<script>
tinymce.init({
  selector: '.konten',
  height: "auto",
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
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Error upload
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

// Form open
echo form_open_multipart(base_url('admin/eskul/edit/'.$eskul->id_eskul));
?>

<div class="col-md-6">
  <div class="form-group form-group-lg">
  <label>Nama Eskul</label>
    <input type="text" name="nama_eskul" class="form-control" placeholder="Nama Eskul" required="required" value="<?php echo $eskul->nama_eskul ?>">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
  <label>Upload gambar</label>
  <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
  </div>
</div>
<div class="col-md-12">
  <div class="form-group">
    <label>Keterangan</label>
    <textarea name="keterangan" class="form-control konten" placeholder="Keterangan"><?php echo $eskul->keterangan ?></textarea>
  </div>
  <div class="form-group">
    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
    <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
  </div>
</div>
<?php
// Form close
echo form_close();
?>