<button class="btn btn-primary" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah
</button>
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
</div>
<div class="modal-body">

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
echo form_open_multipart(base_url('admin/kategori_barang'));
?>

<div class="col-md-12">
<div class="form-group">
<label>Nama kategori barang</label>
<input type="text" name="nama_kategori_barang" class="form-control" placeholder="Nama kategori barang" value="<?php echo set_value('nama_kategori_barang') ?>" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Urutan kategori barang</label>
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo set_value('urutan') ?>" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Gambar kategori barang</label>
<input type="file" name="gambar" class="form-control" placeholder="Gambar" value="<?php echo set_value('gambar') ?>">
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Keterangan kategori barang</label>
<textarea name="keterangan"  class="form-control konten" placeholder="Keterangan" ><?php echo set_value('keterangan') ?></textarea>
</div>

<div class="form-group text-right">
<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan Data">
<input type="reset" name="reset" class="btn btn-success btn-lg" value="Reset">
<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
</div>
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

</div>
<div class="modal-footer">
    
    
    

</div>
</div>
</div>
</div>
