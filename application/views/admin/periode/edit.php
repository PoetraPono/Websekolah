  <?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/periode/edit/'.$periode->id_periode));
?>

<div class="form-group">
<input type="text" name="nama_periode" class="form-control" placeholder="Nama periode" value="<?php echo $periode->nama_periode ?>" required>
</div>

<div class="form-group">
<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $periode->urutan ?>" required>
</div>

<div class="form-group text-center">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
</div>
<div class="clearfix"></div>

<?php
// Form close 
echo form_close();
?>

