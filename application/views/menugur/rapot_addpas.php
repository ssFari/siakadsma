<?php $this->load->view('main/header'); ?>
<!-- Start Left menu area -->
<?php $this->load->view('main/navbar'); ?>
<!-- Mobile Menu end -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Rapot Add</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                                <?php echo form_open_multipart("C_rguru/saverapotpas/". $cek='pas' .'/'. $id); ?>
                                                <?php echo validation_errors(); ?>
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input type="hidden" name="nisn_old" value="">
                                                            <input name="nisn" type="text" class="form-control" placeholder="NISN" value="<?php echo $id ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="kode_mp" id="">
                                                                <?php foreach($mapel as $m) { ?>
                                                                    <option value="<?= $m->kode ?>"><?= $m->nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="kode_semester" id="">
                                                                <?php foreach($semester as $s) { ?>
                                                                    <option value="<?= $s->kode ?>"><?= $s->nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="kode_ta" id="">
                                                                <?php foreach($tahunajaran as $ta) { ?>
                                                                    <option value="<?= $ta->kode ?>"><?= $ta->nama ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="nilaipas" type="number" class="form-control" placeholder="Nilai PAS" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        
                                                    </div>
                                                </div>
                                            </form>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php $this->load->view('main/footer'); ?>