<button class="btn btn-primary" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah
</button>
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
</div>
<div class="modal-body">
    
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
echo form_open_multipart(base_url('admin/harga_barang/barang/'.$barang->id_barang));
?>

<div class="col-md-12">
<div class="form-group">
<label>Periode Sewa Barang</label>
<select name="id_periode" class="form-control">
	<?php foreach($periode as $periode) { ?>
	<option value="<?php echo $periode->id_periode ?>"><?php echo $periode->nama_periode ?></option>
	<?php } ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Harga sewa barang (Rp)</label>
<input type="text" name="harga" class="form-control" placeholder="Harga sewa barang" value="<?php echo set_value('harga') ?>" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Status harga</label>
<select name="status_harga" class="form-control">
  <option value="Publish">Publikasikan</option>
  <option value="Draft">Simpan sebagai draft</option>
</select>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Keterangan harga</label>
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
