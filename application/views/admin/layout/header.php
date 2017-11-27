<?php
// Load data user yg sudah login
$id_user    = $this->session->userdata('id');
$user_login = $this->user_model->detail($id_user);
$site_info  = $this->konfigurasi_model->listing();
?>

<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('admin') ?>"><?php echo $site_info->namaweb ?></a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?php echo date('d F Y') ?> &nbsp; 

<a href="<?php echo base_url('admin/dasbor/profil') ?>" class="btn btn-success square-btn-adjust">
    <i class="fa fa-user"></i> <?php echo $user_login->nama ?> (<?php echo $user_login->akses_level ?>)
</a> 

<a href="<?php echo base_url('login/logout') ?>" class="btn btn-warning square-btn-adjust">
    <i class="fa fa-sign-out"></i> Logout
</a> 

<a href="<?php echo base_url() ?>" class="btn btn-primary square-btn-adjust" target="_blank">
    <i class="fa fa-home"></i> Beranda
</a> 

</div>
        </nav>   
