<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link type="text/css" href="<?php echo base_url()?>css/style.css" rel="stylesheet" />
	<link type="text/css" href="<?php echo base_url()?>css/base/jquery.ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo base_url(); ?>javascript/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>javascript/jquery-ui-1.8.2.custom.min.js"></script>
	<title>Acityaventory - Inventory Management System - <?php echo $title; ?></title>
</head>
<body>
<div id="page">
  <b class="box">
  <b class="box1"><b></b></b>
  <b class="box2"><b></b></b>
  <b class="box3"></b>
  <b class="box4"></b>
  <b class="box5"></b></b>
  <div class="boxfg">
    <!-- content goes here -->
  	<div id="header">
        <? $this->load->view('template/header'); ?>
    </div>
    
    <div id="menu">
        <? // $this->load->view('template/menu'); ?>
    </div>
    
	<div id="wrapper">
    <h2><?= $subheader ?></h2>
        <?php $this->load->view($main); ?>
	</div>
	
    <div id="footer">
        <? $this->load->view('template/footer')?>
    </div>
  </div>
  <b class="box">
  <b class="box5"></b>
  <b class="box4"></b>
  <b class="box3"></b>
  <b class="box2"><b></b></b>
  <b class="box1"><b></b></b></b>
</div>
</body>
</html>
