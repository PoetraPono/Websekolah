<p>
  <?php include('tambah.php') ?>
</p>

<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Nama periode</th>
    <th>Slug</th>
    <th>Urutan</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($periode as $periode) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $periode->nama_periode ?></td>
    <td><?php echo $periode->slug_periode ?></td>
    <td><?php echo $periode->urutan ?></td>
    <td>
      
      <a href="<?php echo base_url('admin/periode/edit/'.$periode->id_periode) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

       <a class="btn btn-success btn-xs" data-toggle="modal" href="#Detail<?php echo $periode->id_periode ?>" id="modellink<?php echo $periode->id_periode ?>"><i class="fa fa-eye"></i></a>


      <?php include('delete.php'); ?>
<div class="modal-container"></div>
<script type="text/javascript">

  $(document).ready(function(){
    var url = "<?php echo base_url('admin/ridwan/detail/'.$periode->id_periode) ?>";
    jQuery('#modellink<?php echo $periode->id_periode ?>').click(function(e) {
        $('.modal-container').load(url,function(result){
        $('#Detail<?php echo $periode->id_periode ?>').modal({show:true});
      });
    });
  });
</script>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>