
<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('d_praja'); ?>">Praja</a></li>

  </ol>
  <h1 class="page-header">PRAJA</h1>
  <div class="row">
    <div class="col-xl-12">
      <!-- begin panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title"></h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <h4 class="text-center">Jumlah Praja Di Setiap Provinsi</h4>
            
            <!-- <div id="graph" class="height-sm width-xl"></div> -->
            <canvas id="myChart" height="70"></canvas>
          </div>
        </div>
      </div>
      <!-- end panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
              <span><a href="<?php echo base_url('d_praja/editstatus');?>" class="btn btn-sm btn-warning"> STATUS PRAJA</a></span>
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
          <?php if ($this->session->flashdata('praja') != NULL) { ?>
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Notif!</strong> <?php echo $this->session->flashdata('praja') ?>
            </div>
          <?php } ?>
          
          <br>
          <div class="col-xl-2">
            <label for="basic-url">Angkatan  : </label>
            <input class="form-control" list="angkatann" name="angkatan" id="angkatannn">
            <datalist id="angkatann">
             <?php foreach (json_decode($angkatan, true) as $x) : ?>

               <option value="<?php echo $x['angkatan'] ?>">


               <?php endforeach; ?>
             </datalist>
             <br>
           </div>
           


           <div class="panel-body">
             <div class ="table-responsive">
              <table id="data-praja" class="table table-striped table-bordered table-td-valign-middle" width="100%">
                <!-- <button href='#' class='btn btn-sm btn-warning' btn-sm><i class='fa fa-edit'></i></button> -->
                <thead>
                  <tr>
                   <th class="text-nowrap"> no </th>
                    <th class="text-nowrap">opsi</th>
                    <th class="text-nowrap">npp</th>
                    <th class="text-nowrap"> nama </th>
                    <th class="text-nowrap"> jk </th>
                    <th class="text-nowrap"> nisn</th>
                    <th class="text-nowrap"> no_spcp </th>
                    <th class="text-nowrap"> npwp</th>
                    <th class="text-nowrap"> nik_praja </th>
                    <th class="text-nowrap"> tmpt_lahir </th>
                    <th class="text-nowrap"> tgl_lahir </th>
                    <th class="text-nowrap"> agama </th>
                    <th class="text-nowrap"> alamat </th>
                    <th class="text-nowrap"> rt </th>
                    <th class="text-nowrap"> rw </th>
                    <th class="text-nowrap"> nama_dusun </th>
                    <th class="text-nowrap"> kelurahan </th>
                    <th class="text-nowrap"> kecamatan </th>
                    <th class="text-nowrap"> kode_pos </th>
                    <th class="text-nowrap"> kab_kota </th>
                    <th class="text-nowrap"> provinsi </th>
                    <th class="text-nowrap"> jenis_tinggal </th>
                    <th class="text-nowrap"> alat_transport </th>
                    <th class="text-nowrap"> tlp_rumah </th>
                    <th class="text-nowrap"> tlp_pribadi </th>
                    <th class="text-nowrap"> email </th>
                    <th class="text-nowrap"> kewarganegaraan </th>
                    <th class="text-nowrap"> penerima_pks </th>
                    <th class="text-nowrap"> no_pks </th>
                    <th class="text-nowrap"> prodi </th>
                    <th class="text-nowrap"> jenis_pendaftaran </th>
                    <th class="text-nowrap"> tgl_masuk_kuliah </th>
                    <th class="text-nowrap"> tahun_masuk_kuliah </th>
                    <th class="text-nowrap"> pembiayaan </th>
                    <th class="text-nowrap"> jalur_masuk </th>
                    <th class="text-nowrap"> tingkat </th>
                    <th class="text-nowrap"> angkatan </th>
                    <th class="text-nowrap"> status </th>
                    <th class="text-nowrap"> fakultas </th>
                    <th class="text-nowrap"> id_ortu </th>
                    <th class="text-nowrap"> nik_ayah </th>
                    <th class="text-nowrap"> nama_ayah </th>
                    <th class="text-nowrap"> tgllahir_ayah </th>
                    <th class="text-nowrap"> pendidikan_ayah </th>
                    <th class="text-nowrap"> pekerjaan_ayah </th>
                    <th class="text-nowrap"> penghasilan_ayah </th>
                    <th class="text-nowrap"> tlp_ayah </th>
                    <th class="text-nowrap"> nik_ibu </th>
                    <th class="text-nowrap"> nama_ibu </th>
                    <th class="text-nowrap"> tgllahir_ibu </th>
                    <th class="text-nowrap"> pendidikan_ibu </th>
                    <th class="text-nowrap"> pekerjaan_ibu </th>
                    <th class="text-nowrap"> penghasilan_ibu </th>
                    <th class="text-nowrap"> id_wali </th>
                    <th class="text-nowrap"> nik_wali </th>
                    <th class="text-nowrap"> nama_wali </th>
                    <th class="text-nowrap"> tgllahir_wali </th>
                    <th class="text-nowrap"> pendidikan_wali </th>
                    <th class="text-nowrap"> pekerjaan_wali </th>
                    <th class="text-nowrap"> penghasilan_wali </th>
                    <th class="text-nowrap"> tlp_wali </th>
                  </tr>
                </thead>

              </table>
            </div>
          </div>
        </div>
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-10 -->



    <!-- Modal Ubah -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="show-data" class="modal fade">
      <div class="modal-dialog" style="max-width: 30%;">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Data Praja</h4>
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>

          </div>
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" role="form">
           <div class="modal-body">
             <div class="form-group">
               <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Data Praja</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#ortu" role="tab" data-toggle="tab">Data Orang Tua</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#wali" role="tab" data-toggle="tab">Data Wali</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#lain" role="tab" data-toggle="tab">Data Lain-lain</a>
                </li>
              </ul>

              <!-- Tab panes -->

              <div class="tab-content">
               <div role="tabpanel" class="tab-pane fade active show" id="profile">
                <table class="table table-striped">
               <!--  <div role="tabpanel" class="tab-pane fade active show" id="profile">

                <table class="table table-striped"> -->
                  <tbody>
                    <tr>

                      <td>NPP</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="npp" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>NAMA PRAJA</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="nama" style="height:10px;"></td>
                    </tr>
                    <tr>
                      <td>JENIS KELAMIN</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="jk" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td >TEMPAT TANGGAL LAHIR</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="tmpt_lahir" style="height:10px; "></td>

                    </tr>
                    <tr>
                      <td>NISN</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="nisn" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>NPWP</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="npwp" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>NO SPCP</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="no_spcp" style="height:10px; "></td>
                    </tr>
                    <tr>

                      <td>NIK</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="nik_praja" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>AGAMA</td>
                      <td> <input type="text" readonly class="form-control-plaintext" id="agama" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>ALAMAT</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="alamat" style="height:10px;"></td>
                    </tr>
                    <tr>
                      <td>RT</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="rt" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>RW</td>
                      <td> <input type="text" readonly class="form-control-plaintext" id="rw" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>NAMA DUSUN</td>
                      <td> <input type="text" readonly class="form-control-plaintext" id="nama_dusun" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>KELURAHAN</td>
                      <td> <input type="text" readonly class="form-control-plaintext" id="kelurahan" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>KECAMATAN</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="kecamatan" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>KODE POS</td>
                      <td> <input type="text" readonly class="form-control-plaintext" id="kode_pos" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>JENIS TINGGAL</td>
                      <td> <input type="text" readonly class="form-control-plaintext" id="jenis_tinggal" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>ALAT TRANSPORT</td>
                      <td> <input type="text" readonly class="form-control-plaintext" id="alat_transport" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>TLP RUMAH</td>
                      <td> <input type="text" readonly class="form-control-plaintext" id="tlp_rumah" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>NO HP</td>
                      <td> <input type="text" readonly class="form-control-plaintext" id="tlp_pribadi" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>EMAIL</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="email" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>TINGKAT</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="tingkat" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>ANGKATAN</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="angkatan" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>STATUS</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="status" style="height:10px; "></td>
                    </tr>
                  </tbody></table>

                </div>

                <div role="tabpanel" class="tab-pane fade" id="ortu">
                  <table class="table table-striped">
                   <tbody>
                    <tr>
                      <td>NIK AYAH</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="nik_ayah" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>NAMA AYAH</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="nama_ayah" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>TANGGAL LAHIR AYAH</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="tgllahir_ayah" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>PENDIDIKAN AYAH</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="pendidikan_ayah" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>PEKERJAAN AYAH</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="pekerjaan_ayah" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>PENGHASILAN AYAH</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="penghasilan_ayah" style="height:10px; "></td>
                    </tr>       
                    <tr>
                      <td>NIK IBU</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="nik_ibu" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>NAMA IBU</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="nama_ibu" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>TANGGAL LAHIR IBU</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="tgllahir_ibu" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>PENDIDIKAN IBU</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="pendidikan_ibu" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>PEKERJAAN IBU</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="pekerjaan_ibu" style="height:10px; "></td>
                    </tr>
                    <tr>
                      <td>PENGHASILAN IBU</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="penghasilan_ibu" style="height:10px; "></td>
                    </tr>                     
                  </tbody>
                </table>

              </div>

              <div role="tabpanel" class="tab-pane fade" id="wali">
                <table class="table table-striped">
                 <tbody>
                  <tr>
                    <td>NIK WALI</td>
                    <td><input type="text" readonly class="form-control-plaintext" id="nik_wali" style="height:10px; "></td>
                  </tr>
                  <tr>
                    <td>NAMA WALI</td>
                    <td><input type="text" readonly class="form-control-plaintext" id="nama_wali" style="height:10px; "></td>
                  </tr>
                  <tr>
                    <td>TANGGAL LAHIR WALI</td>
                    <td><input type="text" readonly class="form-control-plaintext" id="tgllahir_wali" style="height:10px; "></td>
                  </tr>
                  <tr>
                    <td>PENDIDIKAN WALI</td>
                    <td><input type="text" readonly class="form-control-plaintext" id="pendidikan_wali" style="height:10px; "></td>
                  </tr>
                  <tr>
                    <td>PEKERJAAN WALI</td>
                    <td><input type="text" readonly class="form-control-plaintext" id="pekerjaan_wali" style="height:10px; "></td>
                  </tr>
                  <tr>
                    <td>PENGHASILAN WALI</td>
                    <td><input type="text" readonly class="form-control-plaintext" id="penghasilan_wali" style="height:10px; "></td>
                  </tr>       

                </tbody>
              </table>

            </div>

            <div role="tabpanel" class="tab-pane fade" id="lain">
              <table class="table table-striped">
               <tbody>
                <tr>
                  <td>FAKULTAS</td>
                  <td><input type="text" readonly class="form-control-plaintext" id="fakultas" style="height:10px; "></td>
                </tr>
                <tr>
                  <td>PRODI</td>
                  <td><input type="text" readonly class="form-control-plaintext" id="prodi" style="height:10px; "></td>
                </tr>
                <tr>
                  <td>KEWARGANEGARAAN</td>
                  <td><input type="text" readonly class="form-control-plaintext" id="kewarganegaraan" style="height:10px; "></td>
                </tr>
                <tr>
                  <td>JENIS PENDAFTARAN</td>
                  <td><input type="text" readonly class="form-control-plaintext" id="jenis_pendaftaran" style="height:10px; "></td>
                </tr>
                
                <tr>
                  <td>TANGGAL MASUK KULIAH</td>
                  <td><input type="text" readonly class="form-control-plaintext" id="tgl_masuk_kuliah" style="height:10px; "></td>
                </tr>
                <tr>
                  <td>TAHUN MASUK KULIAH</td>
                  <td><input type="text" readonly class="form-control-plaintext" id="tahun_masuk_kuliah" style="height:10px; "></td>
                </tr>
                <tr>
                  <td>PEMBIAYAAN</td>
                  <td><input type="text" readonly class="form-control-plaintext" id="pembiayaan" style="height:10px; "></td>
                </tr>       
                <tr>
                  <td>JALUR MASUK</td>
                  <td><input type="text" readonly class="form-control-plaintext" id="jalur_masuk" style="height:10px; "></td>
                </tr>               
              </tbody>
            </table>


          </div>
        </div>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
     </div>
   </form>
 </div>
</div>
</div>
</div>
<!-- END Modal Ubah -->



<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>
    <!-- <script>

      $(document).ready(function() {

        var url = '<?php echo base_url('d_praja/cobain');?>';
        // alert(url);

        $('#data-praja').dataTable({
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
  -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [
        <?php
        if (count($prov)>0) {
          foreach ($prov as $data) {
            echo "'" .$data->provinsi ."',";
          }
        }
        ?>
        ],
        datasets: [{
          label: 'Jumlah Praja',
          backgroundColor: '#ADD8E6',
          borderColor: '##93C3D2',
          data: [
          <?php
          if (count($prov)>0) {
           foreach ($prov as $data) {
            echo $data->jumlah . ", ";
          }
        }
        ?>
        ]
      }]
    },
  });

</script>


<script >
 $(document).on('change', 'input', function(){
  var options = $('datalist')[0].options;
  var val = $(this).val();
  for (var i=0;i<options.length;i++){
   if (options[i].value === val) {

    var uri = "<?php echo base_url('d_praja').'/cobain/'; ?>"+ val;
    console.log(uri);
    $('#data-praja').dataTable({
      "searching": true,
        // "paging": false,
        responsive: true,
        retrieve: true,
        dom: 'Bfrtip',
        buttons: [
        'copy', 'excel', 'print'
        ],
        destroy: true,
        "ajax": {
          "url": uri,
          "dataSrc": ""
        }
      });


    break;
  }

}
});

</script>

<script>
  $(document).ready(function() {
        // Untuk sunting
        $('#show-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#npp').attr("value",div.data('npp'));
            modal.find('#nama').attr("value",div.data('nama'));
            modal.find('#jk').attr("value",div.data('jk'));
            modal.find('#nisn').attr("value",div.data('nisn'));
            modal.find('#no_spcp').attr("value",div.data('no_spcp'));
            modal.find('#npwp').attr("value",div.data('npwp'));
            modal.find('#nik_praja').attr("value",div.data('nik_praja'));
            modal.find('#tmpt_lahir').attr("value",div.data('tmpt_lahir'));
            modal.find('#tgl_lahir').attr("value",div.data('tgl_lahir'));
            modal.find('#agama').attr("value",div.data('agama'));
            modal.find('#alamat').attr("value",div.data('alamat'));
            modal.find('#rt').attr("value",div.data('rt'));
            modal.find('#rw').attr("value",div.data('rw'));
            modal.find('#nama_dusun').attr("value",div.data('nama_dusun'));
            modal.find('#kelurahan').attr("value",div.data('kelurahan'));
            modal.find('#kecamatan').attr("value",div.data('kecamatan'));
            modal.find('#kode_pos').attr("value",div.data('kode_pos'));
            modal.find('#kab_kota').attr("value",div.data('kab_kota'));
            modal.find('#provinsi').attr("value",div.data('provinsi'));
            modal.find('#jenis_tinggal').attr("value",div.data('jenis_tinggal'));
            modal.find('#alat_transport').attr("value",div.data('alat_transport'));
            modal.find('#tlp_rumah').attr("value",div.data('tlp_rumah'));
            modal.find('#tlp_pribadi').attr("value",div.data('tlp_pribadi'));
            modal.find('#email').attr("value",div.data('email'));
            modal.find('#kewarganegaraan').attr("value",div.data('kewarganegaraan'));
            modal.find('#penerima_pks').attr("value",div.data('penerima_pks'));
            modal.find('#no_pks').attr("value",div.data('no_pks'));
            modal.find('#prodi').attr("value",div.data('prodi'));
            modal.find('#jenis_pendaftaran').attr("value",div.data('jenis_pendaftaran'));
            modal.find('#tgl_masuk_kuliah').attr("value",div.data('tgl_masuk_kuliah'));
            modal.find('#tahun_masuk_kuliah').attr("value",div.data('tahun_masuk_kuliah'));
            modal.find('#pembiayaan').attr("value",div.data('pembiayaan'));
            modal.find('#jalur_masuk').attr("value",div.data('jalur_masuk'));
            modal.find('#tingkat').attr("value",div.data('tingkat'));
            modal.find('#angkatan').attr("value",div.data('angkatan'));
            modal.find('#status').attr("value",div.data('status'));
            modal.find('#fakultas').attr("value",div.data('fakultas'));
            modal.find('#id_ortu').attr("value",div.data('id_ortu'));
            modal.find('#nik_ayah').attr("value",div.data('nik_ayah'));
            modal.find('#nama_ayah').attr("value",div.data('nama_ayah'));
            modal.find('#tgllahir_ayah').attr("value",div.data('tgllahir_ayah'));
            modal.find('#pendidikan_ayah').attr("value",div.data('pendidikan_ayah'));
            modal.find('#pekerjaan_ayah').attr("value",div.data('pekerjaan_ayah'));
            modal.find('#penghasilan_ayah').attr("value",div.data('penghasilan_ayah'));
            modal.find('#tlp_ayah').attr("value",div.data('tlp_ayah'));
            modal.find('#nik_ibu').attr("value",div.data('nik_ibu'));
            modal.find('#nama_ibu').attr("value",div.data('nama_ibu'));
            modal.find('#tgllahir_ibu').attr("value",div.data('tgllahir_ibu'));
            modal.find('#pendidikan_ibu').attr("value",div.data('pendidikan_ibu'));
            modal.find('#pekerjaan_ibu').attr("value",div.data('pekerjaan_ibu'));
            modal.find('#penghasilan_ibu').attr("value",div.data('penghasilan_ibu'));
            modal.find('#id_wali').attr("value",div.data('id_wali'));
            modal.find('#nik_wali').attr("value",div.data('nik_wali'));
            modal.find('#nama_wali').attr("value",div.data('nama_wali'));
            modal.find('#tgllahir_wali').attr("value",div.data('tgllahir_wali'));
            modal.find('#pendidikan_wali').attr("value",div.data('pendidikan_wali'));
            modal.find('#pekerjaan_wali').attr("value",div.data('pekerjaan_wali'));
            modal.find('#penghasilan_wali').attr("value",div.data('penghasilan_wali'));
            modal.find('#tlp_wali').attr("value",div.data('tlp_wali'));
            // modal.find('#id_prodi').attr("value",div.data('id_prodi'));
            // modal.find('#nama_prodi').attr("value",div.data('nama_prodi'));
            // modal.find('#id_fakultas').attr("value",div.data('id_fakultas'));
            // modal.find('#nama_fakultas').attr("value",div.data('nama_fakultas'));
            // modal.find('#sks').attr("value",div.data('sks'));
            // modal.find('#semester').attr("value",div.data('semester'));
          });
});
</script>