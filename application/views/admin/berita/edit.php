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
echo form_open_multipart(base_url('admin/berita/edit/'.$berita->id_berita));
?>

<div class="col-md-6">

<div class="form-group form-group-lg">
<label>Judul berita</label>
<input type="text" name="judul_berita" class="form-control" placeholder="Judul berita" required="required" value="<?php echo $berita->judul_berita ?>">
</div>

</div>

<div class="col-md-3">

<div class="form-group form-group-lg">
<label>Nomor urut tampil</label>
<input type="number" name="urutan" class="form-control" placeholder="Nomor urut tampil" value="<?php echo $berita->urutan ?>">
</div>

</div>

<div class="col-md-3">

<div class="form-group form-group-lg">
<label>Status Berita</label>
<select name="status_berita" class="form-control">
	<option value="Publish">Publikasikan</option>
	<option value="Draft" 
	<?php if($berita->status_berita=="Draft") { echo "selected"; } ?>
	>Simpan sebagai draft</option>}
</select>

</div>
</div>

<div class="col-md-4">

<div class="form-group">
<label>Jenis Berita</label>
<select name="jenis_berita" class="form-control">
	<option value="Berita">Berita Biasa</option>
  <option value="Penyewaan" 
  <?php if($berita->jenis_berita=="Penyewaan") { echo "selected"; } ?>
  >Informasi Penyewaan</option>}
  <option value="Pembelian" 
  <?php if($berita->jenis_berita=="Pembelian") { echo "selected"; } ?>
  >Informasi Pembelian</option>}
	<option value="Profil" 
	<?php if($berita->jenis_berita=="Profil") { echo "selected"; } ?>
	>Profil Perusahaan/option>
</select>

</div>
</div>

<div class="col-md-4">

<div class="form-group">
<label>Kategori Berita</label>
<select name="id_kategori" class="form-control">

	<?php foreach($kategori as $kategori) { ?>
	<option value="<?php echo $kategori->id_kategori ?>" 
	<?php if($berita->id_kategori==$kategori->id_kategori) { echo "selected"; } ?>
	><?php echo $kategori->nama_kategori ?></option>
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
<label>Isi berita</label>
<textarea name="isi" class="form-control konten" placeholder="Isi berita"><?php echo $berita->isi ?></textarea>
</div>

<div class="form-group">
<label>Keywords (untuk pencarian Google)</label>
<textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo $berita->keywords ?></textarea>
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