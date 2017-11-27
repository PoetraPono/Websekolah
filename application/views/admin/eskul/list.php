<p>
    <a href="<?php echo base_url('admin/eskul/tambah') ?>" class="btn btn-primary">
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
                <th>Nama Eskul</th>
                <th>Katerangan</th>
                <th width="15%">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php $i=1; foreach($eskul as $eskul) { ?>

                <tr class="odd gradeX">
                    <td>
                        <?php echo $i ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url('admin/eskul/edit/'.$eskul->id_eskul) ?>">
                            <?php echo $eskul->nama_eskul ?> <sup><i class="fa fa-pencil"></i></sup>
                        </a>
                        <small>
                        <br>Update: <?php echo date('d M Y H:i: s',strtotime($eskul->tgl_update)) ?>
                        </small>
                    </td>
                    <td>
                        <?php echo $eskul->keterangan ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url('eskul/read/'.$eskul->slug_eskul) ?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

                        <a href="<?php echo base_url('admin/eskul/edit/'.$eskul->id_eskul) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

                        <?php include('delete.php'); ?>

                    </td>
                </tr>
                <?php $i++; } ?>
        </tbody>
    </table>