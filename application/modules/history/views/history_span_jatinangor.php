<link rel="stylesheet" href="<?php echo base_url().'assets/js/morris.css'?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('history/span');?>">HISTORY SPAN</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('history/span_jatinangor?fromDate='.$fromDate);?>">HISTORY SPAN JATINANGOR</a></li>
  </ol>
  <h1 class="page-header">HISTORY SPAN JATINANGOR</h1>
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <div class="col-sm-6">
              <a href="<?php echo base_url('history/span');?>" class="btn btn-sm btn-warning"> KEMBALI</a>
            </div>
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class ="table-responsive">
            <div class="panel-body">
                <?php if($data != 'Tidak') {?>
                <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
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
                        <td width="1%"><?= $row->created_date == NULL ? "<i><font style='color:red;'>Not Found</font></i>" : $row->created_date ?></td>
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
                <?php } ?>
            </div>
        </div>
        <!-- end panel-body -->
      </div>
      <!-- end panel -->
    </div>
    <!-- end col-10 -->
  </div>
</div>