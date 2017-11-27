<p><a href="<?php echo base_url('admin/barang/tambah') ?>" class="btn btn-primary">
<i class="fa fa-plus"></i> Tambah</a></p>

<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>

<div class="modal-container"></div>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Nama barang</th>
    <th>Kategori</th>
    <th>Brand</th>
    <th>Jenis - Status</th>
    <th>Author</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($barang as $barang) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td><?php echo $barang->nama_barang ?></td>
    <td>
    <a href="<?php echo base_url('admin/barang/kategori/'.$barang->id_kategori_barang) ?>">
    <?php echo $barang->nama_kategori_barang ?>
    </a>
    </td>
    <td>
    <a href="<?php echo base_url('admin/barang/brand/'.$barang->id_brand) ?>">
    <?php echo $barang->nama_brand ?>
    </a>
    </td>
    <td>
    <a href="<?php echo base_url('admin/barang/jenis_barang/'.$barang->jenis_barang) ?>">
    <?php echo $barang->jenis_barang ?>
    </a> - 
    <a href="<?php echo base_url('admin/barang/status_barang/'.$barang->status_barang) ?>">
    <?php echo $barang->status_barang ?>
    </a>
    </td>
    <td>
    <a href="<?php echo base_url('admin/barang/author/'.$barang->id_user) ?>">
    <?php echo $barang->nama ?>
    </a>
    </td>
    <td>

      <div class="btn-group">
        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs">
        <i class="fa fa-plus"></i> Action <span class="caret"></span></button>
        <ul class="dropdown-menu">
        <li><a href="<?php echo base_url('admin/harga_barang/barang/'.$barang->id_barang) ?>"><i class="fa fa-dollar"></i> Setting harga sewa</a></li>
        <li><a href="<?php echo base_url('admin/gambar_barang/barang/'.$barang->id_barang) ?>"><i class="fa fa-image"></i> Tambah Gambar</a></li>
        <li><a href="<?php echo base_url('admin/kerusakan_barang/barang/'.$barang->id_barang) ?>"><i class="fa fa-exclamation-triangle"></i> Data kerusakan</a></li>
        <li class="divider"></li>
        <li><a href="<?php echo base_url('barang/detail/'.$barang->slug_barang) ?>"  target="_blank"><i class="fa fa-eye"></i>  Lihat Detail</a></li>
        </ul>
      </div>

      <a class="btn btn-success btn-xs" data-toggle="modal" href="#Detail<?php echo $barang->id_barang ?>" id="modellink<?php echo $barang->id_barang ?>"><i class="fa fa-eye"></i></a>


      <a href="<?php echo base_url('admin/barang/edit/'.$barang->id_barang) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>
<div class="modal-container"></div>

<script type="text/javascript">
  $(document).ready(function(){
    var url = "<?php echo base_url('admin/barang/detail/'.$barang->id_barang) ?>";
    jQuery('#modellink<?php echo $barang->id_barang ?>').click(function(e) {
        $('.modal-container').load(url,function(result){
        $('#Detail<?php echo $barang->id_barang ?>').modal({show:true});
      });
    });
  });
</script>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>