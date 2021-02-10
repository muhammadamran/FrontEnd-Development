<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Upload</a></li>
        <li class="breadcrumb-item active">SAS</li>
    </ol>
    <h1 class="page-header">Upload</b></h1>
    <div class="row">
		<div class="col-sm-12">
            <div class="panel panel-inverse" data-sortable-id="form-plugins-1">
                <div class="panel-heading">
                    <h4 class="panel-title">Upload File Excel</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body bg-white">
                    <div class="card border-0 bg-white text-black text-truncate mb-4">
                        <div class="card-body">
							<div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <?php echo $this->session->flashdata('notifpagu') ?>
                                    <form method="POST" action="<?php echo base_url() ?>uploads/uploadPagu" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">UNGGAH FILE EXCEL JATINANGOR</label>
                                            <span class="ml-2">
                                                <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                            </span>
                                            <input for="pagu" type="file" name="pagu" class="form-control">
                                        </div>

                                        <button id="pagu" type="submit" class="btn btn-success">UPLOAD REKAP JATINANGOR</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
							<div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <?php echo $this->session->flashdata('notifsulsel') ?>
                                    <form method="POST" action="<?php echo base_url() ?>uploads/uploadRealisasiSulsel" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">UNGGAH FILE EXCEL SULSEL</label>
                                            <span class="ml-2">
                                                <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                            </span>
                                            <input for="biroN" type="file" name="sulsel" class="form-control">
                                        </div>

                                        <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP SULSEL</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
							<div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <?php echo $this->session->flashdata('notifkalbar') ?>
                                    <form method="POST" action="<?php echo base_url() ?>uploads/uploadRealisasiKalbar" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">UNGGAH FILE EXCEL KALBAR</label>
                                            <span class="ml-2">
                                                <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                            </span>
                                            <input for="biroN" type="file" name="kalbar" class="form-control">
                                        </div>

                                        <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP KALBAR</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
							<div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <?php echo $this->session->flashdata('notifntb') ?>
                                    <form method="POST" action="<?php echo base_url() ?>uploads/uploadRealisasiNTB" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">UNGGAH FILE EXCEL NTB</label>
                                            <span class="ml-2">
                                                <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                            </span>
                                            <input for="biroN" type="file" name="ntb" class="form-control">
                                        </div>

                                        <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP NTB</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
							<div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <?php echo $this->session->flashdata('notifpapua') ?>
                                    <form method="POST" action="<?php echo base_url() ?>uploads/uploadRealisasiPapua" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">UNGGAH FILE EXCEL PAPUA</label>
                                            <span class="ml-2">
                                                <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                            </span>
                                            <input for="biroN" type="file" name="papua" class="form-control">
                                        </div>

                                        <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP PAPUA</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
							<div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <?php echo $this->session->flashdata('notifsulut') ?>
                                    <form method="POST" action="<?php echo base_url() ?>uploads/uploadRealisasiSulut" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">UNGGAH FILE EXCEL SULUT</label>
                                            <span class="ml-2">
                                                <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                            </span>
                                            <input for="biroN" type="file" name="sulut" class="form-control">
                                        </div>

                                        <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP SULUT</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
							<div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <?php echo $this->session->flashdata('notifsumbar') ?>
                                    <form method="POST" action="<?php echo base_url() ?>uploads/uploadRealisasiSumbar" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">UNGGAH FILE EXCEL SUMBAR</label>
                                            <span class="ml-2">
                                                <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                            </span>
                                            <input for="biroN" type="file" name="sumbar" class="form-control">
                                        </div>

                                        <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP SUMBAR</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                         <!-- <div class="card-body">
                            <div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <?php echo $this->session->flashdata('notifnangor') ?>
                                    <form method="POST" action="<?php echo base_url() ?>uploads/uploadJatinangor" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">UNGGAH FILE EXCEL JATINANGOR</label>
                                            <span class="ml-2">
                                                <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                            </span>
                                            <input for="biroN" type="file" name="nangor" class="form-control">
                                        </div>

                                        <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP Jatinangor</button>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>