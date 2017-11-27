<script>
tinymce.init({
  selector: '.konten',
  height: "auto",
  allow_script_urls: true,
  convert_urls: false,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
</script>
<?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Error upload
if(isset($error)) {
  echo '<div class="alert alert-warning">';
  echo $error;
  echo '</div>';
}

// Form open
echo form_open_multipart(base_url('admin/prestasi/edit/'.$prestasi->id_prestasi));
?>

<div class="col-md-6">
  <div class="form-group form-group-lg">
  <label>Nama Kegiatan</label>
    <input type="text" name="nama_kegiatan" class="form-control" placeholder="Nama Kegiatan" required="required" value="<?php echo $prestasi->nama_kegiatan ?>">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group form-group-lg">
  <label>Penyelenggara</label>
    <input type="text" name="penyelenggara" class="form-control" placeholder="Penyelenggara" value="<?php echo $prestasi->penyelenggara ?>">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group form-group-lg">
  <label>Prestasi</label>
    <input type="text" name="prestasi" class="form-control" placeholder="Prestasi" value="<?php echo $prestasi->prestasi ?>">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group form-group-lg">
    <label>Penghargaan</label>
    <input type="text" name="penghargaan" class="form-control" placeholder="Penghargaan" value="<?php echo $prestasi->penghargaan ?>">
  </div>
</div>
<div class="col-md-3">
  <div class="form-group">
    <label>Tingkat</label>
    <select name="tingkat" class="form-control">
      <option value="kecamatan" <?php if($prestasi->tingkat=="kecamantan") { echo "selected"; } ?>>Kecamatan</option>}
      <option value="kabupaten" <?php if($prestasi->tingkat=="kabupaten") { echo "selected"; } ?>>Kabupaten</option>}
      <option value="provinsi" <?php if($prestasi->tingkat=="provinsi") { echo "selected"; } ?>>Provinsi</option>
      <option value="nasional" <?php if($prestasi->tingkat=="nasional") { echo "selected"; } ?>>Nasional</option>
    </select>
  </div>
</div>
<div class="col-md-3">
  <div class="form-group">
  <label>Jenis Prestasi</label>
    <input type="text" name="jenis_prestasi" class="form-control" placeholder="Jenis Prestasi" value="<?php echo $prestasi->jenis_prestasi ?>">
  </div>
</div>
<div class="col-md-2">
  <div class="form-group">
  <label>Tahun Prestasi</label>
  <input type="number" name="tahun_prestasi" class="form-control" placeholder="Tahun" value="<?php echo $prestasi->tahun_prestasi ?>">
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
  <label>Upload gambar</label>
  <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
  </div>
</div>
<div class="col-md-12">
  <div class="form-group">
    <label>Keterangan</label>
    <textarea name="keterangan" class="form-control konten" placeholder="Keterangan"><?php echo $prestasi->keterangan ?></textarea>
  </div>
  <div class="form-group">
    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
    <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
  </div>
</div>

<?php
// Form close
echo form_close();
?>