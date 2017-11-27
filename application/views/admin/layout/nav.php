<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
<div class="sidebar-collapse">
<ul class="nav" id="main-menu">

	<!-- Dasbor menu-->
    <li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="btn btn-success btn-xs fa fa-dashboard"></i> Dasbor</a></li>

    <!-- Client menu-->                  
    <li><a href="#"><i class="btn btn-success btn-xs fa fa-users"></i> Calon Siswa<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/client') ?>">Data Calon Siswa</a></li>
            <li><a href="<?php echo base_url('admin/client/tambah') ?>">Tambah Calon Siswa</a></li>
        </ul>
    </li> 

    <!-- News/Berita menu-->                  
    <li><a href="#"><i class="btn btn-success btn-xs fa fa-newspaper-o"></i> Berita/Profil/Informasi<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/berita') ?>">Data Berita/Profil</a></li>
            <li><a href="<?php echo base_url('admin/berita/tambah') ?>">Tambah Berita/Profil</a></li>
            <li><a href="<?php echo base_url('admin/kategori') ?>">Kategori Berita/Profil</a></li>
        </ul>
    </li> 

    <!-- Galeri menu-->                  
    <li><a href="#"><i class="btn btn-success btn-xs fa fa-image"></i> Galeri<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/galeri') ?>">Data Galeri</a></li>
            <li><a href="<?php echo base_url('admin/galeri/tambah') ?>">Tambah Galeri</a></li>
            <li><a href="<?php echo base_url('admin/kategori_galeri') ?>">Kategori Galeri</a></li>
        </ul>
    </li> 

     <!-- Video menu-->                  
    <li><a href="#"><i class="btn btn-success btn-xs fa fa-film"></i> Video<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/video') ?>">Data Video</a></li>
            <li><a href="<?php echo base_url('admin/video/tambah') ?>">Tambah Video</a></li>
        </ul>
    </li> 

    <!-- Download menu-->                  
    <li><a href="#"><i class="btn btn-success btn-xs fa fa-download"></i> Download/File<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/download') ?>">Data Download/File</a></li>
            <li><a href="<?php echo base_url('admin/download/tambah') ?>">Tambah Download/File</a></li>
            <li><a href="<?php echo base_url('admin/kategori_download') ?>">Kategori Download/File</a></li>
        </ul>
    </li>

    <!-- Staff menu-->                  
    <li><a href="#"><i class="btn btn-success btn-xs fa fa-tree"></i> Guru &amp; Staff<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/staff') ?>">Data Guru &amp; Staff</a></li>
            <li><a href="<?php echo base_url('admin/staff/tambah') ?>">Tambah Guru &amp; Staff</a></li>
        </ul>
    </li>  

    <!-- Prestasi menu-->                  
    <li><a href="#"><i class="btn btn-success btn-xs fa fa-trophy"></i> Prestasi<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/prestasi') ?>">Data Prestasi</a></li>
            <li><a href="<?php echo base_url('admin/prestasi/tambah') ?>">Tambah Prestasi</a></li>
        </ul>
    </li> 

    <!-- Eskul menu-->                  
    <li><a href="#"><i class="btn btn-success btn-xs fa fa-soccer-ball-o"></i> Eskul<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/eskul') ?>">Data Eskul</a></li>
            <li><a href="<?php echo base_url('admin/eskul/tambah') ?>">Tambah Eskul</a></li>
        </ul>
    </li>            

    <!-- User menu-->                  
    <li><a href="#"><i class="btn btn-success btn-xs fa fa-user"></i> User/Administrator<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/user') ?>">Data User/Admin</a></li>
            <li><a href="<?php echo base_url('admin/user/tambah') ?>">Tambah User/Admin</a></li>
        </ul>
    </li>  

    <!-- Testimoni menu-->                  
    <li><a href="#"><i class="btn btn-success btn-xs fa fa-pencil"></i> Testimoni<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/testimoni') ?>">Data Testimoni</a></li>
        </ul>
    </li>      

     <!-- Konfigurasi menu-->                  
    <li><a href="#"><i class="btn btn-success btn-xs fa fa-wrench"></i> Konfigurasi<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/dasbor/konfigurasi') ?>">Konfigurasi Umum</a></li>
            <li><a href="<?php echo base_url('admin/dasbor/map') ?>">Map</a></li>            
            <li><a href="<?php echo base_url('admin/dasbor/logo') ?>">Ganti Logo Website</a></li>
            <li><a href="<?php echo base_url('admin/dasbor/icon') ?>">Ganti Icon Website</a></li>
            <li><a href="<?php echo base_url('admin/dasbor/quote') ?>">Ganti Quote Website</a></li>
            <li><a href="<?php echo base_url('admin/rekening') ?>">Data Rekening Pembayaran</a></li>
            <li><a href="<?php echo base_url('admin/dasbor/captcha') ?>">Re-Captcha Key</a></li>
        </ul>
    </li>  
  	
</ul>

</div>

</nav>  
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
<div class="row">
    <div class="col-md-12">
     <h2>
         <?php
         $url_navigasi = $this->uri->segment(2); 
             echo $title;
             
             if($this->uri->segment(3) != "") { 
             ?>
             <sup><a href="<?php echo base_url('admin/'.$url_navigasi) ?>">
             <small class="btn btn-success btn-xs"><i class="fa fa-arrow-circle-left"></i> Kembali</small></a></sup>
             <?php } ?>

     </h2>   
       
    </div>
</div>
 <!-- /. ROW  -->
 <hr />

<div class="row">
<div class="col-md-12">
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-body">
