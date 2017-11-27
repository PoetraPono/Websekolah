<p><a href="<?php echo base_url('admin/berita/tambah') ?>" class="btn btn-primary">
<i class="fa fa-plus"></i> Tambah</a> 
<?php 
$url_navigasi = $this->uri->segment(2); 
if($this->uri->segment(3) != "") { 
 ?>
<a href="<?php echo base_url('admin/'.$url_navigasi) ?>">
 <small class="btn btn-success"><i class="fa fa-arrow-circle-left"></i> Kembali</small></a>
 <?php } ?>
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
    <th>Judul</th>
    <th>Kategori</th>
    <th>Jenis Berita - Status</th>
    <th>Author</th>
    <th width="15%">Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($berita as $berita) { ?>

<tr class="odd gradeX">
    <td><?php echo $i ?></td>
    <td>
    <a href="<?php echo base_url('admin/berita/edit/'.$berita->id_berita) ?>">
    <?php echo $berita->judul_berita ?> <sup><i class="fa fa-pencil"></i></sup>
    </a>
      <small>
        <br>Update: <?php echo date('d M Y H:i: s',strtotime($berita->tanggal)) ?>
        <br>Urutan: <?php echo $berita->urutan ?>
      </small>
    </td>
    <td>
    <a href="<?php echo base_url('admin/berita/kategori/'.$berita->id_kategori) ?>">
    <?php echo $berita->nama_kategori ?><sup><i class="fa fa-link"></i></sup>
    </a>
    </td>
    <td>
    <a href="<?php echo base_url('admin/berita/jenis_berita/'.$berita->jenis_berita) ?>">
    <?php echo $berita->jenis_berita ?><sup><i class="fa fa-link"></i></sup>
    </a> - <a href="<?php echo base_url('admin/berita/status_berita/'.$berita->status_berita) ?>"><?php echo $berita->status_berita ?><sup><i class="fa fa-link"></i></sup>
    </a></td>
    <td>
    <a href="<?php echo base_url('admin/berita/author/'.$berita->id_user) ?>">
    <?php echo $berita->nama ?><sup><i class="fa fa-link"></i></sup>
    </a></td>
    <td>
      <a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>" 
      class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

      <a href="<?php echo base_url('admin/berita/edit/'.$berita->id_berita) ?>" 
      class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

      <?php include('delete.php'); ?>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>