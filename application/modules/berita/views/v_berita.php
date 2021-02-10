<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('berita');?>">Berita</a></li>
  </ol>
  <h1 class="page-header">&nbsp</h1>
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Humas'){ ?>
            <span><a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#add">TAMBAH</a></span>
            <?php } ?>
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
          </div>
        </div>
        <?php if($this->session->flashdata('berita') != NULL){ ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Notif!</strong> <?php echo $this->session->flashdata('berita') ?>
        </div>
        <?php } ?>
        <div class="panel-body">
          <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
                <tr>
                    <th class="text-nowrap">No</th>
                    <th class="text-nowrap" width="1%">Gambar</th>
                    <th class="text-nowrap" width="30%">Judul</th>
                    <th class="text-nowrap" width="30%">Status</th>
                    <th class="text-nowrap" width="30%">Tanggal</th>
                    <th class="text-nowrap" width="9%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0; foreach($data as $row){ $no++; ?>
                    <tr>
                        <td><?= $no == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $no ?></td>
                        <td><?= "<img class='thumb-image setpropileam' src='".base_url('assets/img/gallery/'.$row->gambar)."' width='128px' height='128px'>" ?></td>
                        <td><?= $row->judul_berita == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->judul_berita ?></td>
                        <td><?= $row->status_berita == 'Publish' ? "<label class='label label-success'>Publish</label>" : ( $row->status_berita == 'Draft' ? "<label class='label label-warning'>Draft</label>" :  '' ) ?></td>
                        <td><?= $row->tanggal ?></td>
                       
                        
                        <td>
                            <a href="#" class="btn btn-sm btn-green" data-toggle="modal" data-target="#read<?php echo $row->id_berita;?>"><i class="fa fas fa-info"></i></a>
                            
                            <!-- Modal Read -->
                            <div class="modal fade bd-example-modal-xl" id="read<?php echo $row->id_berita;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row->judul_berita ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span><?php echo $row->tanggal;?></span>
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="height-lg" data-scrollbar="true">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-xl-4">
                                                        <a href="javascript:;" class="pull-left">
                                                            <img class="rounded" style="width:100%" src="<?php echo base_url('assets/img/gallery/'.$row->gambar) ?>" alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="form-group col-xl-8">
                                                        <?php echo $row->isi ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Humas'){ ?>
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit<?php echo $row->id_berita;?>"><i class="fa fas fa-edit"></i></a>
                                <?php if ($row->status_berita == 'Draft'){?>
                                    <a href="#" class="btn btn-sm btn-success" style="color:#fff;cursor:pointer" data-toggle="modal" data-target="#publish<?php echo $row->id_berita;?>"><i class="fa fas fa-eye"></i></a>
                                    <!-- Modal Publish -->
                                    <div class="modal fade" id="publish<?php echo $row->id_berita;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">PUBLISH BERITA</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" method="post" action="berita/publish_berita">
                                                        <div class="modal-body">
                                                            <p>Publish Berita <b><?php echo $row->judul_berita;?></b></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id_berita" value="<?php echo $row->id_berita;?>">
                                                            <input type="hidden" name="status_berita" value="Publish">
                                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                                            <button class="btn btn-success">Publish</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                <?php }else if($row->status_berita == 'Publish'){ ?>
                                    <a href="#" class="btn btn-sm btn-warning" style="color:#fff;cursor:pointer" data-toggle="modal" data-target="#draft<?php echo $row->id_berita;?>"><i class="fa fas fa-eye-slash"></i></a>
                                    <!-- Modal Draft -->
                                    <div class="modal fade" id="draft<?php echo $row->id_berita;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">DRAFT BERITA</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" method="post" action="berita/draft_berita">
                                                        <div class="modal-body">
                                                            <p>Draft Berita <b><?php echo $row->judul_berita;?></b></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id_berita" value="<?php echo $row->id_berita;?>">
                                                            <input type="hidden" name="status_berita" value="Draft">
                                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                                            <button class="btn btn-warning">Draft</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </td>
                    </tr>
                    
                    <!-- Modal EDIT -->
                    <div class="modal fade bd-example-modal-xl" id="edit<?php echo $row->id_berita;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">EDIT BERITA</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="berita/edit_berita" enctype="multipart/form-data" method="POST">
                                    <input type="hidden" class="form-control" id="id_berita" name="id_berita" value="<?php echo $row->id_berita;?>">

                                    <div class="row">
                                        <div class="form-group col-xl-6">
                                            <label class="col-form-label">Judul Berita:</label>
                                            <input type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="Judul Berita" value="<?php echo $row->judul_berita; ?>" required>
                                        </div>

                                        <div class="form-group col-xl-6">
                                            <label class="col-form-label">Status Berita:</label>
                                            <select name="status_berita" class="form-control" required>
                                                <option value="<?php echo $row->status_berita; ?>" selected><?php echo $row->status_berita; ?></option>
                                                <option value="Publish">Publish</option>
                                                <option value="Draft">Draft</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-xl-12">
                                            <label class="col-form-label">Isi Berita:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text btn-warning"><i class="icon-picture">  Upload Gambar</i></span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="form-control" name="profile_pic"/>
                                                    <input type="text" value="<?php echo $row->gambar;?>" disabled/>
                                                    <input type="hidden" name="fileOld" value="<?php echo $row->gambar;?>" />
                                                </div>
                                            </div>
                                            <textarea class="ckeditor" id="isi" name="isi" rows="20"><?php echo $row->isi; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-10 -->
  </div>
  
  <!-- Modal ADD -->
  <div class="modal fade bd-example-modal-xl" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">TAMBAH BERITA</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="berita/tambah_berita" enctype="multipart/form-data" method="POST">
            
            <div class="row">
                
                <div class="form-group col-xl-6">
                    <label for="nama_produk" class="col-form-label">Judul Berita:</label>
                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="Judul Berita" required>
                </div>

                <div class="form-group col-xl-6">
                    <label class="col-form-label">Status Berita:</label>
                    <select name="status_berita" class="form-control" required>
                        <option value="Publish">Publish</option>
                        <option value="Draft">Draft</option>
                    </select>
                </div>

                <div class="form-group col-xl-12">
                    <label for="kd_kategori" class="col-form-label">Isi Berita:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text btn-warning"><i class="icon-picture">  Upload Gambar</i></span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="form-control" name="pic" required/>
                        </div>
                    </div>
                    <textarea class="ckeditor" id="isi" name="isi" rows="20"><p><span style="color:rgb(0,0,0);"></textarea>
                </div>

            </div>
            
            </br>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="reset" name="reset" class="btn btn-info"><i class="fa fa-cut"></i> Reset</button>
              <button type="submit" class="btn btn-primary" value="Cek"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>