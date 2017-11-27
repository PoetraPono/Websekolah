 <!-- Detail client -->
       <!--  Modals-->
<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Detail<?php echo $client->id_client; ?>"><i class="fa fa-eye"></i></button>

<div class="modal fade" id="Detail<?php echo $client->id_client; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><?php echo $client->nama ?></h4>
      </div>
      <div class="modal-body">
      <div class="col-md-12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
  <tr>
    <td colspan="2" align="center"><img src="<?php echo base_url('assets/upload/image/thumbs/'.$client->gambar) ?>" ></td>
    </tr>
  <tr class="bg-primary">
    <th colspan="2" align="center"><?php echo $client->nama; ?></th>
    </tr>
    
  <tr>
    <td>Alamat</td>
    <td><?php echo $client->alamat; ?></td>
  </tr>
  <tr>
    <td>Website</td>
    <td><?php echo $client->website; ?></td>
  </tr>
  <tr>
    <td>Phone</td>
    <td><?php echo $client->telepon; ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $client->email; ?></td>
  </tr>
 
  <tr>
    <td>Publish to public</td>
    <td><?php echo $client->status_client; ?></td>
  </tr>
   <tr>
    <td>Keywords</td>
    <td><?php echo $client->keywords; ?></td>
  </tr>
  <tr>
    <td>Publish client testimonial?</td>
    <td><?php echo $client->status_testimoni; ?></td>
  </tr>
  <tr class="bg-primary">
    <th colspan="2" align="center">Testimony</th>
    </tr>
     <tr>
    <td colspan="2"><?php echo $client->isi_testimoni; ?></td>
    </tr>
   <tr>
    <td>Tanggal update</td>
    <td><?php echo $client->tanggal; ?></td>
  </tr>
   <tr class="bg-primary">
    <th colspan="2" align="center">Detail</th>
    </tr>
    <tr class="bg-primary">
    <th colspan="2" align="center">Keterangan</th>
    </tr>
     <tr>
    <td colspan="2"><?php echo $client->isi; ?></td>
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