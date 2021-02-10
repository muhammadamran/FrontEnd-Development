<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('kemeng/view_matkul1'); ?>">All Matkul</a></li>

  </ol>
  <h1 class="page-header">MATAKULIAH</h1>
  <div class="row">
    <div class="col-xl-12">
      <!-- begin panel -->
      
      <!-- end panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <span><a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambahmatkul">TAMBAH MATAKULIAH</a></span>
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-square"></i></button> -->
            <!-- <a href="" class="btn btn-icon btn-sm btn-inverse" data-toggle="modal" data-target="#addpeg"><i class="fa fa-plus-square"></i></a> -->
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>

        <!-- <p><a href="export.php"><button>Export Data ke Excel</button></a></p> -->
        <div class="table-responsive">
          <?php if ($this->session->flashdata('matkul') != NULL) { ?>
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Notif!</strong> <?php echo $this->session->flashdata('matkul') ?>
            </div>
          <?php } ?>

          <div class="panel-body">
            <table id="data-matkul" class="table table-striped table-bordered table-td-valign-middle" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID MATAKULIAH</th>
                  <TH>NAMA MATAKULIAH </TH>
                  <!-- <th>ID FAKULTAS</th> -->
                  <th>NAMA FAKULTAS</th>
                  <!-- <th>ID PRODI</th> -->
                  <th>NAMA PRODI</th>
                  <th>SKS</th>
                  <th>SEMESTER</th>
                  <th>OPSI</th>

                  
                </tr>
              </thead>

            </table>
          </div>
        </div>
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-10 -->

    <!-- Modal Ubah -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
           <h4 class="modal-title">Ubah Data Matakuliah</h4>
           <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

         </div>
         <form class="form-horizontal" action="<?php echo base_url('kemeng/ubah')?>" method="post" enctype="multipart/form-data" role="form">
           <div class="modal-body">
             <div class="form-group">
              <div class="row">
                <div class="col-xl-3">
                  <label class="col-form-label">Kode Matkul:</label>
                  <input type="text" class="form-control" id="id_matkul" name="id_matkul" readonly="">
                </div>
                <div class="col-xl">
                  <label class="col-form-label">Nama Matkul:</label>
                  <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" readonly="">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-xl-3">
                  <label class="col-form-label">Kode Fakultas:</label>
                  <input type="text" class="form-control" id="id_fakultas" name="id_fakultas" readonly="">
                </div>
                <div class="col-xl">
                  <label class="col-form-label">Nama Fakultas:</label>
                  <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" readonly="">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-xl-3">
                  <label class="col-form-label">Kode Prodi:</label>
                  <input type="text" class="form-control" id="id_prodi" name="id_prodi" readonly="">
                </div>
                <div class="col-xl">
                  <label class="col-form-label">Nama Prodi:</label>
                  <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" readonly="">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-xl-5">
                  <label class="col-form-label">SKS:</label>
                  <input type="text" class="form-control" id="sks" name="sks" required="">
                </div>
                <div class="col-xl">
                  <label class="col-form-label">Semester:</label>
                  <input type="text" class="form-control" id="semester" name="semester" required="">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
           <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
           <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
         </div>
       </form>
     </div>
   </div>
 </div>
</div>
<!-- END Modal Ubah -->


<!-- Modal TAMBAH -->
<div aria-hidden="true" aria-labelledby="myModalLabel" id="tambahmatkul" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title">Tambah Matakuliah</h4>
       <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

     </div>
     <form class="form-horizontal" action="<?php echo base_url('kemeng/tambahmatakuliah')?>" method="post" enctype="multipart/form-data" role="form">
       <div class="modal-body">
         <div class="form-group">
          <div class="row">
            <div class="col-xl-3">

              <label class="col-form-label">Kode Matkul :</label>
              <input type="text" class="form-control" id="id_matkul" name="id_matkul" placeholder="ID Matkul..">
            </div>
            <div class="col-xl">
              <label class="col-form-label">Nama Matkul :</label>
              <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" placeholder="Nama Matakuliah..">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-xl">
              <label class="col-form-label">Kode Fakultas :</label>
              <select class="form-control" name="fakultas" id="fakultas">
                <option value="">No Selected</option>
                <?php foreach ($fakulll as $x) { ?>
                  <option value="<?php echo $x->id_fakultas;?>"><?php echo $x->id_fakultas;?> | <?php echo $x->nama_fakultas;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div> 
        <div class="form-group">
          <div class="row">
            <div class="col-xl">
              <label class="col-form-label">Kode Prodi :</label>
              <select class="form-control" name="prodi" id="prodi">
               <option>No Selected</option> 

             </select>
           </div>
         </div>
       </div> 

       <div class="form-group">
        <div class="row">
          <div class="col-xl-5">
            <label class="col-form-label">SKS :</label>
            <input type="text" class="form-control" id="sks" name="sks" required="">
          </div>
          <div class="col-xl">
            <label class="col-form-label">Semester :</label>
            <input type="text" class="form-control" id="semester" name="semester" required="">
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
     <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
     <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
   </div>
 </form>
</div>
</div>
</div>
</div>
<!-- END Modal tambah -->

<!-- Modal HAPUS DOSEN -->
<div class="modal fade" id="hapusmatkul" tabindex="-1" role="dialog" aria-labelledby="hapusmatkul" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusmatkul">Hapus Data Matakuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="hapus_matkul">
          <div class="modal-body">
            <p>Anda yakin akan menghapus Data Matakuliah : </p>
            <div class="form-group">
              <div class="row">
                <div class="col-xl">
                  <input type="hidden" id="id_matkul" name="id_matkul">
                  <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" readonly="">
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <input type="hidden" name="id_dosenxx" name="id_dosen" >
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>
<script>

  $(document).ready(function() {

    var url = '<?php echo base_url('kemeng/cobain');?>';
    // alert(url);

        $('#data-matkul').dataTable({
            // dom: 'Bfrtip',
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
            'copy', 'excel', 'print'
            ],
            responsive: true,
            "ajax": {
              "url": url,
              "dataSrc": ""
            }
          });
      });

    </script>


    <script>
      $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id_matkul').attr("value",div.data('id_matkul'));
            modal.find('#nama_matkul').attr("value",div.data('nama_matkul'));
            modal.find('#id_prodi').attr("value",div.data('id_prodi'));
            modal.find('#nama_prodi').attr("value",div.data('nama_prodi'));
            modal.find('#id_fakultas').attr("value",div.data('id_fakultas'));
            modal.find('#nama_fakultas').attr("value",div.data('nama_fakultas'));
            modal.find('#sks').attr("value",div.data('sks'));
            modal.find('#semester').attr("value",div.data('semester'));
          });
        // Untuk sunting
        $('#hapusmatkul').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id_matkul').attr("value",div.data('id_matkul'));
            modal.find('#nama_matkul').attr("value",div.data('nama_matkul'));
          });
      });
    </script>


    <script type="text/javascript">
      $(document).ready(function(){

        $('#fakultas').change(function(){ 
          var id_prodi=$(this).val();
          $.ajax({
            url : "<?php echo site_url('kemeng/get_sub_category');?>",
            method : "POST",
            data : {id_prodi: id_prodi},
            async : true,
            dataType : 'json',
            success: function(data){

              var html = '';
              var i;
              for(i=0; i<data.length; i++){
                html += '<option value='+data[i].id_prodi+'>'+data[i].nama_prodi+'</option>';
              }
              $('#prodi').html(html);

            }
          });
          return false;
        }); 

      });
    </script>