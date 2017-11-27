
    
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
echo form_open_multipart(base_url('admin/harga_barang/edit/'.$harga_barang->id_harga_barang));
?>

<div class="col-md-12">
<div class="form-group">
<label>Periode Sewa Barang</label>
<select name="id_periode" class="form-control">
	<?php foreach($periode as $periode) { ?>
	<option value="<?php echo $periode->id_periode ?>" 
	<?php if($harga_barang->id_periode == $periode->id_periode) { echo "selected"; } ?>
	><?php echo $periode->nama_periode ?></option>
	<?php } ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Harga sewa barang (Rp)</label>
<input type="text" name="harga" class="form-control" placeholder="Harga sewa barang" value="<?php echo $harga_barang->harga ?>" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Status harga</label>
<select name="status_harga" class="form-control">
  <option value="Publish">Publikasikan</option>
  <option value="Draft" 
<?php if($harga_barang->status_harga == "Draft") { echo "selected"; } ?>
  >Simpan sebagai draft</option>
</select>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Keterangan harga</label>
<textarea name="keterangan"  class="form-control konten" placeholder="Keterangan" ><?php echo $harga_barang->keterangan ?></textarea>
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

