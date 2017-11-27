<p>
    <a href="<?php echo base_url('admin/prestasi/tambah') ?>" class="btn btn-primary">
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
                <th>Nama Kegiatan</th>
                <th>Prestasi</th>
                <th>Jenis Prestasi - Tingkat</th>
                <th>Penyelenggara</th>
                <th width="15%">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php $i=1; foreach($prestasi as $prestasi) { ?>

                <tr class="odd gradeX">
                    <td>
                        <?php echo $i ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url('admin/prestasi/edit/'.$prestasi->id_prestasi) ?>">
                            <?php echo $prestasi->nama_kegiatan ?> <sup><i class="fa fa-pencil"></i></sup>
                        </a>
                        <small>
                        <br>Update: <?php echo date('d M Y H:i: s',strtotime($prestasi->tanggal)) ?>
                        </small>
                    </td>
                    <td>
                        <?php echo $prestasi->prestasi ?>
                    </td>
                    <td>                        
                        <?php echo $prestasi->jenis_prestasi  ?> - <?php echo $prestasi->tingkat?>
                    </td>
                    <td>
                        <?php echo $prestasi->penyelenggara ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url('prestasi/read/'.$prestasi->slug_prestasi) ?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

                        <a href="<?php echo base_url('admin/prestasi/edit/'.$prestasi->id_prestasi) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

                        <?php include('delete.php'); ?>

                    </td>
                </tr>
                <?php $i++; } ?>
        </tbody>
    </table>