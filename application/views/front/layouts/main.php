<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
   <!-- Bootsrap --> <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
   <link rel="stylesheet" href="<?= base_url() ?>asset/vendor/bootstrap/css/bootstrap.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url() ?>asset/vendor/fontawesome-free/css/all.min.css">
   <!--Custom Css -->
   <link rel="stylesheet" href="<?= base_url('asset/css/style.css') ?>">
  

	
	

	<!-- Icon -->
	<link rel="shortcut icon" type="image/png" href="asset/icon.png"/>
   <title><?= $title ?> - Madrasah Ibtidaiyah AL MUHAJIRIN</title>
</head>
<body>

	<!-- Navbar -->
	<?php $this->load->view('front/layouts/_navbar'); ?>
   <!-- End of Navbar -->

	<!-- Content -->
	<?php $this->load->view('front/pages/' . $page); ?>
	<!-- End of Content -->
	
	<!-- Footer -->
	<?php $this->load->view('front/layouts/_footer'); ?>
   <!-- End of Footer -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
   <!-- Jquery -->
	<script src="<?= base_url() ?>asset/vendor/jquery/jquery.min.js"></script>
   <script src="<?= base_url() ?>asset/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
