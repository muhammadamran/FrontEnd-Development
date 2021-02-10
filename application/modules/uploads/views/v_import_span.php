<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Upload</a></li>
        <li class="breadcrumb-item active">SPAN</li>
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
                        <div class="card-body">
							<div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <?php echo $this->session->flashdata('span') ?>
                                    <form method="POST" action="<?php echo base_url() ?>uploads/span" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">UNGGAH FILE EXCEL SPAN</label>
                                            <span class="ml-2">
                                                <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                            </span>
                                            <input for="biroN" type="file" name="span" class="form-control col-sm-12">
                                        </div>
                                        <button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP SPAN</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--  -->
               </div>
            </div>
        </div>
    </div>
