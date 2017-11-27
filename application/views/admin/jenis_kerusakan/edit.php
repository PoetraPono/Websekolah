  <?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/jenis_kerusakan/edit/'.$jenis_kerusakan->id_jenis_kerusakan));
?>

<div class="form-group">
<input type="text" name="nama_jenis_kerusakan" class="form-control" placeholder="Nama jenis_kerusakan" value="<?php echo $jenis_kerusakan->nama_jenis_kerusakan ?>" required>
</div>

<div class="form-group">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $jenis_kerusakan->urutan ?>" required>
</div>

<div class="form-group text-center">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

