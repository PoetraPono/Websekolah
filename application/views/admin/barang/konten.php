
<div id="Detail<?php echo $barang->id_barang ?>" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo $barang->nama_barang ?></h4>
            </div>
            <div class="modal-body">

<div class="panel panel-default">
<div class="panel-body">
<ul class="nav nav-pills">
    <li class="active"><a href="#home-pills" data-toggle="tab">Harga Sewa</a></li>
    <li class=""><a href="#profile-pills" data-toggle="tab">Gambar</a></li>
    <li class=""><a href="#messages-pills" data-toggle="tab">Kerusakan</a></li>
    <li class=""><a href="#settings-pills" data-toggle="tab">History Sewa</a></li>
    <li class=""><a href="#detail-pills" data-toggle="tab">Detail Barang</a></li>
</ul>

<div class="tab-content">
	<hr>
    <div class="tab-pane active fade in" id="home-pills">

        <?php include('harga.php') ?>

    </div>
    <div class="tab-pane fade in" id="profile-pills">
        <?php include('gambar.php') ?>
    </div>
    <div class="tab-pane fade in" id="messages-pills">
      <?php include('kerusakan.php') ?>

    </div>
    <div class="tab-pane fade in" id="settings-pills">
      SEWA

    </div>

     <div class="tab-pane fade in" id="detail-pills">
     <?php include('detail_barang.php') ?>

    </div>
</div>
</div>
</div>
    

</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">
                <i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>