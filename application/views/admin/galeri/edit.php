<script>
tinymce.init({
  selector: '.konten',
  height: "auto",
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
echo form_open_multipart(base_url('admin/galeri/edit/'.$galeri->id_galeri));
?>

<div class="col-md-12">

<div class="form-group form-group-lg">
<label>Judul galeri</label>
<input type="text" name="judul_galeri" class="form-control" placeholder="Judul galeri" value="<?php echo $galeri->judul_galeri ?>">
</div>

</div>

<div class="col-md-4">

<div class="form-group">
<label>Jenis/Posisi Galeri</label>
<select name="jenis_galeri" class="form-control">
	<option value="Galeri">Galeri Biasa</option>
	<option value="Homepage" 
	<?php if($galeri->jenis_galeri=="Homepage") { echo "selected"; } ?>
	>Homepage - Gambar Slider</option>

  <option value="Profil" 
  <?php if($galeri->jenis_galeri=="Profil") { echo "selected"; } ?>
  >Halaman Profil</option> 

  <option value="Struktur" 
  <?php if($galeri->jenis_galeri=="Struktur") { echo "selected"; } ?>
  >Struktur Sekolah</option>    
</select>

</div>
</div>

<div class="col-md-4">

<div class="form-group">
<label>Kategori Galeri</label>
<select name="id_kategori_galeri" class="form-control">

	<?php foreach($kategori_galeri as $kategori_galeri) { ?>
	<option value="<?php echo $kategori_galeri->id_kategori_galeri ?>" 
	<?php if($galeri->id_kategori_galeri==$kategori_galeri->id_kategori_galeri) { echo "selected"; } ?>
	><?php echo $kategori_galeri->nama_kategori_galeri ?></option>
	<?php } ?>

</select>

</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Upload gambar</label>
<input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
</div>
</div>

<div class="col-md-12">

<div class="form-group">
<label>Isi galeri</label>
<textarea name="isi" class="form-control konten" placeholder="Isi galeri"><?php echo $galeri->isi ?></textarea>
</div>

<div class="form-group">
<label>Link/website terkait Galeri</label>
<input type="url" name="website" class="form-control" placeholder="http://website.com" value="<?php echo $galeri->website ?>">
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