<table class="table table-bordered table-hover" width="100%">
	<tbody>
		<tr>
			<td width="30%">Nama Barang</td>
			<td>: <?php echo $barang->nama_barang ?></td>
		</tr>
		<tr>
		  <td width="30%">Jumlah barang</td>
		  <td>: <?php echo $barang->jumlah_barang ?> pcs</td>
	  </tr>
		<tr>
		  <td width="30%">Berat barang</td>
		  <td>: <?php echo $barang->berat ?> kg</td>
	  </tr>
		<tr>
		  <td width="30%">Ukuran (PXLXT cm)</td>
		  <td>: <?php echo $barang->panjang ?> x <?php echo $barang->lebar ?> x <?php echo $barang->tinggi ?> cm</td>
	  </tr>
		<tr>
		  <td width="30%">Harga beli</td>
		  <td>: Rp. <?php echo number_format($barang->harga_barang,'0',',','.') ?></td>
	  </tr>
		<tr>
		  <td width="30%">Harga jual</td>
		  <td>: Rp. <?php echo number_format($barang->harga_jual,'0',',','.') ?></td>
	  </tr>
		<tr>
		  <td width="30%">Biaya kirim minimal</td>
		  <td>: Rp. <?php echo number_format($barang->biaya_kirim,'0',',','.') ?></td>
	  </tr>
		<tr>
		  <td width="30%">Kategori</td>
		  <td>: <?php echo $barang->nama_kategori_barang ?></td>
	  </tr>
		<tr>
		  <td width="30%">Brand</td>
		  <td>: <?php echo $barang->nama_brand ?></td>
	  </tr>
		
		<tr>
		  <td width="30%">Gambar</td>
		  <td>: <img src="<?php echo base_url('assets/upload/image/'.$barang->gambar) ?>" class="img img-responsive"></td>
	  </tr>
	  <tr>
		  <td width="30%">Tanggal input</td>
		  <td>: <?php echo $barang->tanggal_post ?></td>
	  </tr>
		<tr>
		  <td width="30%">Terakhir update</td>
		  <td>: <?php echo $barang->tanggal ?></td>
	  </tr>
		<tr>
		  <td width="30%">Diupdate oleh</td>
		  <td>: <?php echo $barang->nama ?></td>
	  </tr>
	  <tr>
		  <td colspan="2">
		  <p><strong>Deskripsi:</strong></p><hr>
		  <?php echo $barang->isi ?></td>
	  </tr>
	</tbody>
</table>