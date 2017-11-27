<?php
// Proteksi halaman dengan username dan password dari library SIMPLE_LOGIN
$this->simple_login->cek_login();

// Gabungin semuanya
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');