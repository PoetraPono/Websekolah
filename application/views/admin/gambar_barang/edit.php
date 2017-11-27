
    
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
echo form_open_multipart(base_url('admin/gambar_barang/edit/'.$gambar_barang->id_gambar_barang));
?>

<div class="col-md-12">
<div class="form-group">
<label>Judul gambar</label>
<input type="text" name="nama_gambar_barang" class="form-control" placeholder="Judul gambar" value="<?php echo $gambar_barang->nama_gambar_barang ?>" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Urutan gambar</label>
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $gambar_barang->urutan ?>" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Gambar barang</label>
<input type="file" name="gambar" class="form-control" placeholder="Gambar" value="<?php echo $gambar_barang->gambar ?>">
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Keterangan gambar</label>
<textarea name="keterangan"  class="form-control konten" placeholder="Keterangan" ><?php echo $gambar_barang->keterangan ?></textarea>
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

