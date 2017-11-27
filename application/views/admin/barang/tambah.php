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
echo form_open_multipart(base_url('admin/barang/tambah'));
?>

<div class="col-md-8">

<div class="form-group form-group-lg">
<label>Nama barang</label>
<input type="text" name="nama_barang" class="form-control" placeholder="Nama barang" required value="<?php echo set_value('nama_barang') ?>">
</div>

</div>

<div class="col-md-4">

<div class="form-group form-group-lg">
<label>Jumlah barang (<small class="text-danger">Bisa dipakai</small>)</label>
<input type="number" name="jumlah_barang" class="form-control" placeholder="Jumlah barang" required value="<?php echo set_value('jumlah_barang') ?>">
</div>

</div>

<div class="col-md-4">

<div class="form-group">
<label>Harga beli barang - Rp (<small class="text-danger">Saat pembelian</small>)</label>
<input type="number" name="harga_barang" class="form-control" placeholder="Harga beli barang" required value="<?php echo set_value('harga_barang') ?>">
</div>

</div>

<div class="col-md-4">

<div class="form-group">
<label>Harga dasar barang - Rp (<small class="text-danger">Jual/Sewa</small>)</label>
<input type="number" name="harga_jual" class="form-control" placeholder="Harga jual barang" value="<?php echo set_value('harga_jual') ?>">
</div>

</div>

<div class="col-md-4">

<div class="form-group">
<label>Biaya pengiriman - Rp (<small class="text-danger">Standar Minimal</small>)</label>
<input type="number" name="biaya_kirim" class="form-control" placeholder="Biaya pengiriman minimal" value="<?php echo set_value('biaya_kirim') ?>">
</div>

</div>

<div class="col-md-4">

<div class="form-group">
<label>Status Barang</label>
<select name="status_barang" class="form-control">
  <option value="Publish">Publikasikan</option>
  <option value="Draft">Simpan sebagai draft</option>
</select>

</div>

<div class="form-group">
<label>Jenis Barang</label>
<select name="jenis_barang" class="form-control">
	<option value="Disewakan">Disewakan</option>
	<option value="Dijual">Dijual</option>
</select>

</div>
</div>

<div class="col-md-4">

<div class="form-group">
<label>Brand/merek Barang</label>
<select name="id_brand" class="form-control">

  <?php foreach($brand as $brand) { ?>
  <option value="<?php echo $brand->id_brand ?>"><?php echo $brand->nama_brand ?></option>
  <?php } ?>

</select>

</div>

<div class="form-group">
<label>Kategori Barang</label>
<select name="id_kategori_barang" class="form-control">

	<?php foreach($kategori_barang as $kategori_barang) { ?>
	<option value="<?php echo $kategori_barang->id_kategori_barang ?>"><?php echo $kategori_barang->nama_kategori_barang ?></option>
	<?php } ?>

</select>

</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Upload gambar</label>
<input type="file" name="gambar" class="form-control" required placeholder="Upload gambar" id="file">
<div id="imagePreview"></div>
</div>
</div>

<div class="col-md-12">

<div class="form-group">
<label>Deskripsi Barang</label>
<textarea name="isi" class="form-control konten" placeholder="Deskripsi Barang"><?php echo set_value('isi') ?></textarea>
</div>

</div>

<div class="col-md-3">

<div class="form-group">
<label>Berat (<small class="text-danger">kg</small>)</label>
<input type="number" name="berat" class="form-control" placeholder="Berat" value="<?php echo set_value('berat') ?>">
</div>

</div>

<div class="col-md-3">

<div class="form-group">
<label>Panjang (<small class="text-danger">cm</small>)</label>
<input type="number" name="panjang" class="form-control" placeholder="Panjang" value="<?php echo set_value('panjang') ?>">
</div>

</div>

<div class="col-md-3">

<div class="form-group">
<label>Lebar (<small class="text-danger">cm</small>)</label>
<input type="number" name="lebar" class="form-control" placeholder="Lebar" value="<?php echo set_value('lebar') ?>">
</div>

</div>

<div class="col-md-3">

<div class="form-group">
<label>Tinggi(<small class="text-danger">cm</small>)</label>
<input type="number" name="tinggi" class="form-control" placeholder="Tinggi" value="<?php echo set_value('tinggi') ?>">
</div>

</div>

<div class="col-md-12">

<div class="form-group">
<label>Keywords (untuk pencarian Google)</label>
<textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo set_value('keywords') ?></textarea>
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

