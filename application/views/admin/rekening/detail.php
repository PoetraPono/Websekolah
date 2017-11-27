<!-- Delete rekening -->
       <!--  Modals-->
<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#Detail<?php echo $rekening->id_rekening; ?>"><i class="fa fa-eye"></i></button>

<div class="modal fade" id="Detail<?php echo $rekening->id_rekening; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><?php echo $rekening->nama_bank ?></h4>
      </div>
      <div class="modal-body">
      <div class="col-md-12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
  <tr>
    <td colspan="2" align="center"><img src="<?php echo base_url('assets/upload/image/thumbs/'.$rekening->gambar) ?>" ></td>
    </tr>
  <tr class="bg-primary">
    <th colspan="2" align="center"><?php echo $rekening->nama_bank; ?></th>
    </tr>
  <tr>
    <td>Nomor Rekening</td>
    <td><?php echo $rekening->nomor_rekening; ?></td>
  </tr>
  <tr>
    <td>Pimilik Rekening</td>
    <td><?php echo $rekening->pemilik_rekening; ?></td>
  </tr>
   <tr>
    <td>Tanggal update</td>
    <td><?php echo $rekening->tanggal; ?></td>
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