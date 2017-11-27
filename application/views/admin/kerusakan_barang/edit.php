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
echo form_open_multipart(base_url('admin/kerusakan_barang/edit/'.$kerusakan_barang->id_kerusakan_barang));
?>
<div class="col-md-8">
<div class="form-group">
<label>Nama/judul Kerusakan</label>
<input type="text" name="nama_kerusakan" class="form-control" placeholder="Nama/judul Kerusakan" value="<?php echo $kerusakan_barang->nama_kerusakan ?>" required>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Kerusakan dilaporkan oleh?</label>
<select name="dilaporkan_oleh" class="form-control" id="dilaporkan_oleh">
  <option value="Admin">Admin Website</option>
  <option value="Client" <?php if($kerusakan_barang->dilaporkan_oleh=="Client") { echo "selected"; } ?>>Client</option>
</select>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Pilih Client (<span class="text-red">Jika dilaporan oleh client</span>)</label>
<select name="id_client" class="form-control" id="id_client">
	<option value="">Pilih client</option>
	<?php foreach($client as $client) { ?>
	<option value="<?php echo $client->id_client ?>" class="Client"><?php echo $client->nama ?></option>
	<?php } ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Jenis Kerusakan Barang</label>
<select name="id_jenis_kerusakan" class="form-control">
	<?php foreach($jenis_kerusakan as $jenis_kerusakan) { ?>
	<option value="<?php echo $jenis_kerusakan->id_jenis_kerusakan ?>" 
	 <?php if($kerusakan_barang->id_jenis_kerusakan==$jenis_kerusakan->id_jenis_kerusakan) { echo "selected"; } ?>
	><?php echo $jenis_kerusakan->nama_jenis_kerusakan ?></option>
	<?php } ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Status kerusakan</label>
<select name="status_kerusakan" class="form-control">
  <option value="Publish">Publikasikan</option>
  <option value="Draft"  <?php if($kerusakan_barang->status_kerusakan=="Draft") { echo "selected"; } ?>>Simpan sebagai draft</option>
</select>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Tanggal rusak</label>
<input type="text" name="tanggal_rusak" class="form-control datepicker" placeholder="YYYY-MM-DD" value="<?php echo $kerusakan_barang->tanggal_rusak ?>">
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Tanggal service/perbaikan</label>
<input type="text" name="tanggal_perbaikan" class="form-control datepicker" placeholder="YYYY-MM-DD" value="<?php echo $kerusakan_barang->tanggal_perbaikan ?>">
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Tanggal siap pakai</label>
<input type="text" name="tanggal_selesai" class="form-control datepicker" placeholder="YYYY-MM-DD" value="<?php echo $kerusakan_barang->tanggal_selesai ?>">
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Biaya perbaikan (Rp)</label>
<input type="number" name="biaya_perbaikan" class="form-control" placeholder="Biaya perbaikan" value="<?php echo $kerusakan_barang->biaya_perbaikan ?>">
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Keterangan kerusakan</label>
<textarea name="keterangan"  class="form-control konten" placeholder="Keterangan" ><?php echo $kerusakan_barang->keterangan ?></textarea>
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