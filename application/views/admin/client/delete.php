<!-- Delete client -->
       <!--  Modals-->
<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $client->id_client; ?>"><i class="fa fa-trash"></i></button>

<div class="modal fade" id="Delete<?php echo $client->id_client; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Are you sure want to delete this client?</h4>
      </div>
      <div class="modal-body">
      <div class="col-md-12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
  <tr>
    <td>Nama lengkap</td>
    <td><?php echo $client->nama ?></td>
  </tr>
  <tr>
    <td>Publication status</td>
    <td><?php echo $client->status_client; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <a href="<?php echo base_url('admin/client/delete/'.$client->id_client) ?>" class="btn btn-primary btn-sm">Delete</a>
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