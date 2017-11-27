<?php
// Validasi error
echo validation_errors('<div class="alert alert-success">','</div>');

// Notifikasi
if($this->session->flashdata('sukses')) {
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

// Form open
echo form_open(base_url('admin/user/edit/'.$user->id_user));
?>

<div class="col-md-6">

<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" class="form-control" placeholder="Nama" required="required" value="<?php echo  $user->nama; ?>">
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email" class="form-control" placeholder="Email" required="required" value="<?php echo  $user->email; ?>">
</div>

<div class="form-group">
<label>Level hak akses</label>
<select name="akses_level" class="form-control">
	<option value="Admin">Admin</option>
	<option value="User" <?php if($user->akses_level=="User") { echo "selected"; } ?>>User</option>
	<option value="Blocked" <?php if($user->akses_level=="Blocked") { echo "selected"; } ?>>Blocked</option>
</select>
</div>

</div>

<div class="col-md-6">

<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control" placeholder="Username" required="required" value="<?php echo  $user->username; ?>" readonly>
</div>

<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control" placeholder="Password" required="required" value="<?php echo  $user->password; ?>">
</div>

<div class="form-group">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
</div>

</div>

<?php
// Close form
echo form_close();
?>