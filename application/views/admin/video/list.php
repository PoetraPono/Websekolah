
<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 
// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>


<div class="panel-body">
<p><a href="<?php echo base_url('admin/video/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Video</a></p>


<table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
<thead>
    <tr>
        <th width="5%">#</th>
        <th width="12%">Video</th>
        <th width="19%">Judul Video</th>
        <th width="21%">Position</th>
        <th width="7%">Keterangan</th>
        <th width="17%"></th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($video as $video) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?>.</td>
        <td class="video"> <iframe src="https://www.youtube.com/embed/<?php echo $video->video ?>"></iframe></td>
        <td>
		<?php echo $video->judul ?> - <?php echo $video->urutan ?>
        <sup><a href="<?php echo base_url('video/detail/'.$video->id_video) ?>"><i class="fa fa-link"></i></a></sup>
        <br><small>Lang: <span class="flag-icon <?php if($video->bahasa=="English") { echo "flag-icon-gb"; }else{ echo "flag-icon-id"; } ?>"></span> <?php echo $video->bahasa ?></small>
        </td>
        <td><?php echo $video->posisi ?></td>
        <td><?php echo $video->keterangan ?></td>
        <td>
        
<?php include('detail.php') ?>   

        <a href="<?php echo base_url('admin/video/edit/'.$video->id_video) ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
       
       
<?php include('delete.php') ?>

       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>