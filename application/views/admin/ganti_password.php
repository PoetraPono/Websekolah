
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo $title ?></title>
<!-- BOOTSTRAP STYLES-->
<link href="<?php echo base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="<?php echo base_url() ?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="<?php echo base_url() ?>assets/admin/assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<div class="container">
<div class="row text-center ">
<div class="col-md-12">
<br /><br />
<h2> <?php echo $title ?></h2>

<br />
</div>
</div>
<div class="row ">

<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
<div class="panel panel-default">
<div class="panel-heading">
<strong>   Masukkan password baru Anda </strong>  
</div>
<div class="panel-body">

<?php
// Validasi error
echo validation_errors('<div class="alert alert-success">','</div>');

// Notifikasi
if($this->session->flashdata('sukses')) {
  echo '<div class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

// Form open
echo form_open(base_url('login/ganti/'));
?>

   <br />
 <div class="form-group input-group">
        <span class="input-group-addon"><i class="fa fa-key"  ></i></span>
        <input type="password" name="password" class="form-control" placeholder="Password baru" />
    </div>
 <div class="form-group input-group">
        <span class="input-group-addon"><i class="fa fa-key"  ></i></span>
        <input type="password" name="password_conf" class="form-control" placeholder="Konfirmasi password" />
    </div>
                                          
 
 <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Ganti Password">

<hr />
Kembali ke <a href="<?php echo base_url() ?>" >Beranda </a> 
</form>
</div>

</div>
</div>


</div>
</div>


<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/custom.js"></script>

</body>
</html>
