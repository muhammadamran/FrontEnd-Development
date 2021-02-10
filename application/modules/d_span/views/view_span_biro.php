<link rel="stylesheet" href="<?php echo base_url().'assets/js/morris.css'?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('d_span');?>">SPAN ALL KAMPUS</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('d_span/biro');?>">SPAN JATINANGOR</a></li>
  </ol>
  <h1 class="page-header">SPAN BIRO</h1>
  <div class="row">
    <div class="col-xl-12">
			<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="morris-chart-2">
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
						<h4 class="text-center">Laporan progress realisasi anggaran BIRO IPDN JATINANGOR <?php echo date("Y") ?> Berdasarkan SPAN</h4>
              <div id="graph" class="height-sm width-xl"></div>
          </div>
        </div>
			</div>
			<!-- end panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-square"></i></button> -->
            <a href="<?php echo base_url('d_span');?>" class="btn btn-icon btn-sm btn-warning"> KEMBALI</a>
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="alert alert-warning fade show">
          <button type="button" class="close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
          </button>
          <p>Untuk kembali ke data SPAN IPDN Click Button Kembali</p>
        </div>
        <div class ="table-responsive">
        <div class="panel-body">
          <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>Kode Satker</th>
                <th>Nama Satker</th>
                <th>Pagu BP</th>
                <th>Realisasi BP</th>
                <th>% BP</th>
                <th>Pagu BB</th>
                <th>Realisasi BB</th>
                <th>% BB</th>
                <th>Pagu BM</th>
                <th>Realisasi BM</th>
                <th>% BM</th>
                <th>Pagu T</th>
                <th>Realisasi T</th>
                <th>% T</th>
                <th>Sisa</th>
              </tr>
            </thead>
            <tbody>
            <?php
                $no = 0;
                foreach($data as $row){
                $no++;
            ?>
              <tr class="gradeA">
                <td width="1%"><?= $no == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $no ?></td>
                <td width="1%"><?= $row->kode_satker_biro == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->kode_satker_biro ?></td>
                <td width="1%"><?= $row->nama_satker_biro == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->nama_satker_biro ?></td>

                <td width="1%"><?= number_format($row->pagu_bp ) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->pagu_bp ) ?></td>
                <td width="1%"><?= number_format($row->realisasi_bp) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->realisasi_bp) ?></td>
                <td width="1%"><?= $row->persentase_bp == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->persentase_bp?></td>

                <td width="1%"><?= number_format($row->pagu_bb ) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->pagu_bb ) ?></td>
                <td width="1%"><?= number_format($row->realisasi_bb) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->realisasi_bb) ?></td>
                <td width="1%"><?= $row->persentase_bb == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->persentase_bb?></td>

                <td width="1%"><?= number_format($row->pagu_bm ) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->pagu_bm ) ?></td>
                <td width="1%"><?= number_format($row->realisasi_bm) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->realisasi_bm) ?></td>
                <td width="1%"><?= $row->persentase_bm == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->persentase_bm?></td>

                <td width="1%"><?= number_format($row->pagu_t ) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->pagu_t ) ?></td>
                <td width="1%"><?= number_format($row->realisasi_t) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->realisasi_t) ?></td>
                <td width="1%"><?= $row->persentase_t == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->persentase_t?></td>

                <td width="1%"><?= number_format($row->sisa) == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : number_format($row->sisa) ?></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        </div>
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-10 -->
  </div>
</div>

<script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
              
<script>
  Morris.Bar({
    element: 'graph',
    data: <?php echo $chart;?>,
    xkey: 'alias',
    ykeys: ['pagu_t', 'realisasi_t'],
    labels: ['pagu_t', 'realisasi_t'],
    barRatio: 0.4,
    pointSize: 2.5,
    // xLabelAngle: 4,  
    resize: true,
    parseTime: false,
    hideHover: 'auto',
    gridTextSize: 9
  });
</script>