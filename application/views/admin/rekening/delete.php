<!-- Delete rekening -->
       <!--  Modals-->
<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $rekening->id_rekening; ?>"><i class="fa fa-trash"></i></button>

<div class="modal fade" id="Delete<?php echo $rekening->id_rekening; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Yakin ingin menghapus rekening ini?</h4>
      </div>
      <div class="modal-body">
      <div class="col-md-12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
  <tr>
    <td>Nama Rekening</td>
    <td><?php echo $rekening->nama_bank ?></td>
  </tr>
  <tr>
    <td>Website/Link Publikasi</td>
    <td><?php echo $rekening->pemilik_rekening; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <a href="<?php echo base_url('admin/rekening/delete/'.$rekening->id_rekening) ?>" class="btn btn-primary btn-sm">Hapus Rekening</a>
    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button></td>
  </tr>
</table>
</div>
<div class="clearfix"></div>
      </div>
      
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div>
<!-- End Modals-->