<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url(uri_string());?>"><?= $title; ?></a></li>

  </ol>
  <h1 class="page-header">Rekap Kelebihan Jam Mengajar Dosen IPDN</h1>
  <div class="row">
    <div class="col-xl-12">
      <!-- begin panel -->
      
      <!-- end panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">

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

          <div class="panel-body">
            <h4 class="text-center">Kelebihan Mengajar <?php echo ucwords(strtolower($title)); ?></h4>
            <br>
            <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle" width="100%">
              <thead valign="middle">
                <tr align="center">
                  <th rowspan="2" style="vertical-align: middle !important">NO</th>
                  <th colspan="3" style="vertical-align: middle !important">DOSEN</th>
                  <th rowspan="2" style="vertical-align: middle !important">TOTAL SKS</th>
                  <th rowspan="2" style="vertical-align: middle !important">KEWAJIBAN</th>
                  <th rowspan="2" style="vertical-align: middle !important">KELEBIHAN</th>
                  <th rowspan="2" style="vertical-align: middle !important">TOTAL</th>
                </tr>
                <tr align="center">
                  <th  style="vertical-align: middle !important">NIP</th>
                  <th  style="vertical-align: middle !important">NAMA</th>
                  <th  style="vertical-align: middle !important">GOLONGAN</th>
                </tr>
                <!-- <th>NIP</th>
                <th>NAMA</th>
                <th>JABATAN</th>
                <th>TOTAL SKS</th>
                <th>KEWAJIBAN</th>
                <th>KELEBIHAN</th>
                <th>TOTAL</th> -->

              </tr>  

            </thead>

            <tbody>
              <?php $no = 1; ?>
              <?php foreach (json_decode($ho, true) as $x): ?>
                <tr >
                  <td ><?php echo $no++; ?></td>
                  <td ><?= $x['nip']; ?></td>
                  <td ><?= $x['nama']; ?></td>
                  <td ><?= $x['jabatan']; ?></td>
                  <td ><?= $x['totalsks'].' sks'; ?></td>
                  <td ><?= $x['kewajiban'].' sks'; ?></td>
                  <td ><?= $x['kelebihan'].' sks'; ?></td>
                  <td ><?= 'Rp'. number_format($x['total'], 0, ',', '.'); ?></td>

                  <?php endforeach; ?>
                </tr>
                
              </tbody>


            </table>
          </div>
        </div>
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-10 -->




    <script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
      <!-- script>


      $(document).ready(function() {
      
          var url = '<?php echo base_url('kemeng/honor_table_all');?>';
      // alert(uri);
      $('#data-dosen-honor').dataTable({
            // dom: 'Bfrtip',
            dom: 'Bfrtip',
            buttons: [
            'copy', 'excel', 'print'
            ],
            responsive: true,
            "ajax": {
              "url": url,
              "dataSrc": ""
            },
            "columns": [
            { "data": "nip" },
            { "data": "nama" },
            { "data": "jabatan" },
            { "data": "totalsks" },
            { "data": "kewajiban" },
            { "data": "kelebihan" },
            { "data": "total" }
            ]
          });
    });
  </script> -->