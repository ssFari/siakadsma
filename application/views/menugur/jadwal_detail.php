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
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <?php echo $this->session->userdata('uname'); ?>
                            </div>
                            </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Detail Jadwal</span>
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


<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Data Jadwal</h1>
                        </div>
                        <div class="add-product">
                            <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add</button>
                            <!-- <a href="<echo base_url('C_admin/addrapot'); ?>">Add Data</a> -->
                    </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                       <option value="">Export Basic</option>
                                       <option value="all">Export All</option>
                                       <option value="selected">Export Selected</option>
                                   </select>
                               </div>
                               <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                               data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                               <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true"></th>
                                    <th data-field="kelas" data-editable="true">Kelas</th>
                                    <th data-field="kode_mp" data-editable="true">Matapelajaran</th>
                                    <th data-field="kode_semester" data-editable="true">Semester</th>
                                    <th data-field="kode_ta" data-editable="true">Tahun Ajaran</th>
                                    <th data-field="hari" data-editable="true">Hari</th>
                                    <th data-field="waktu" data-editable="true">Waktu</th>
                                    <th data-field="aksi">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1;

                                foreach ($jadwal as $value) { ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $value->kelas ?></td>
                                    <td><?php echo $value->mapel ?></td>
                                    <td><?php echo $value->semester ?></td>
                                    <td><?php echo $value->ta ?></td>
                                    <td><?php echo $value->hari ?></td>
                                    <td><?php echo $value->waktu ?></td>
                                    <td class="datatable-ct">
                                        <a href="<?php echo base_url('C_rguru/editjadwal/'.$value->kode_kelas.'/'.$value->kode_mp) ?>"><button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        <!-- <a href="<echo base_url('C_admin/deleterapot/'.$value->kode_mp) ?>"><button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a> -->
                                    </td>
                                </tr>
                                <?php
                                $no++; 
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Static Table End -->
<div class="footer-copyright-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="footer-copy-right">
                    <p>Copyright © 2019. All rights reserved. by <a href="https://instagram.com/">ADT</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Data Jadwal</h4>
      </div>
      <div class="modal-body">
      <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                                <?php echo form_open_multipart("C_rguru/savejadwal/"); ?>
                                                <?php echo validation_errors(); ?>
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input type="hidden" name="kode_kelas" value="<?= $id ?>" hidden>
                                                           <input disabled type="text" class="form-control" value="<?= $id ?>" />
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
                                                           <input name="hari" type="text" class="form-control" placeholder="Hari" value="" />
                                                        </div>
                                                        <div class="form-group">
                                                           <input name="waktu" type="text" class="form-control" placeholder="Waktu" value="" />
                                                           
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php $this->load->view('main/footer'); ?>