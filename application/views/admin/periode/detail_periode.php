<style type="text/css" media="screen">
	.modal-body .form-horizontal .col-sm-2,
.modal-body .form-horizontal .col-sm-10, .form-control, .form-group {
    width: 100% !important;
    display: block;
    margin-bottom: 10px;
}

.modal-body .form-horizontal .control-label {
    text-align: left;
}
.modal-body .form-horizontal .col-sm-offset-2 {
    margin-left: 15px;
}
</style>
<div id="Detail<?php echo $periode->id_periode ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo $periode->nama_periode ?></h4>
            </div>
            <div class="modal-body">
<?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form buka 
echo form_open(base_url('admin/periode/edit/'.$periode->id_periode));
?>

<div class="form-group">
<label>Nama periode</label>
<input type="text" name="nama_periode" class="form-control" placeholder="Nama periode" value="<?php echo $periode->nama_periode ?>" required>
</div>

<div class="form-group">
<label>Urutan periode</label>
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

</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">
                <i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>

