<?php $this->load->view('main/header'); ?>

    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <?php $this->load->view('main/navbar'); ?>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Dashboard SIAWARAK</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
    <div class="alert alert-success" role="alert">
     <i class="fas fa-tachometer-alt"></i> Dashboard
    </div>
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Selamat Datang!</h4>
  <!--  -->
  <p>Selamat Datang <strong><?php echo $username; ?></strong> di Sistem Informasi Akademik SD Negeri Siwarak Wetan, Anda Login sebagai <?= $role ?> </p>
  <hr>


<?php $this->load->view('main/footer'); ?>