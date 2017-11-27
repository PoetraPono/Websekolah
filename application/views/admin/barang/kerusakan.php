<p><a href="<?php echo base_url('admin/kerusakan_barang/barang/'.$barang->id_barang) ?>" class="btn btn-success btn-sm">
<i class="fa fa-pencil"></i> Kelola Kerusakan Barang</a></p>

<table class="table table-bordered" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Jenis Kerusakan</th>
    <th>Kerusakan</th>
    <th>Keterangan</th>
    <th>Status Kerusakan</th>
</tr>
</thead>
<tbody>

<?php $k=1; foreach($kerusakan_barang as $kerusakan_barang) { ?>

<tr class="odd gradeX">
    <td><?php echo $k ?></td>
    <td><?php echo $kerusakan_barang->nama_jenis_kerusakan ?></td>
    <td><?php echo $kerusakan_barang->nama_kerusakan ?></td>
    <td><?php echo $kerusakan_barang->keterangan ?></td>
    <td><?php echo $kerusakan_barang->status_kerusakan ?></td>
</tr>

<?php $k++; } ?>

</tbody>
</table>