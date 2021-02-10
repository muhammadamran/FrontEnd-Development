<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('d_sas'); ?>">IPDN</a></li>
    </ol>
    <h1 class="page-header">SAS</h1>
    <div class="row">
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="morris-chart-1">
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
                        <h4 class="text-center">Laporan progress realisasi anggaran IPDN <?php echo date("Y") ?> Berdasarkan SAS</h4>
                        <div id="graph" class="height-sm width-xl"></div>
                    </div>
                </div>
            </div>
            <!-- end panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
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
                <!-- <div class="alert alert-warning fade show">
          <button type="button" class="close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
          </button>
          <p>Silahkan input <b>Data Pegawai</b> Pada Button icon "<i class="fa fa-plus-square"></i>"</p>
        </div> -->
                <div class="table-responsive">
                    <div class="panel-body">
                        <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kampus</th>
                                    <th>Pagu</th>
                                    <th>Realiasasi</th>
                                    <th>Sisa Pagu</th>
                                    <th>Persentase</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach (json_decode($data, true) as $x) : ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?= $x['nama']; ?></td>
                                        <td><?= number_format($x['pagu'], 0, ',', '.'); ?></td>
                                        <td><?= number_format($x['realisasi'], 0, ',', '.'); ?></td>
                                        <td><?= number_format($x['pagu'] - $x['realisasi'], 0, ',', '.'); ?></td>
                                        <td><?= round((100 / $x['pagu'] * $x['realisasi']), 2) . "%"; ?></td>
                                        <?php if (isset($x['kode_satker'])) { ?>
                                            <td><a href="<?= base_url() . 'd_sasbaru/' . $x['kode_satker']; ?>" class='btn btn-primary mr-1'><i class='fa fa-eye'></i></a></td>
                                        <?php } else { ?>
                                            <td><a href="<?= base_url() . 'd_sasbaru/' . $x['id_b']; ?>" class='btn btn-primary mr-1'><i class='fa fa-eye'></i></a></td>

                                        <?php } ?>
                                    </tr>
                                <?php endforeach; ?>
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

<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>

<script>
    Morris.Bar({
        element: 'graph',
        data: <?php echo $data; ?>,
        xkey: 'alias',
        ykeys: ['pagu', 'realisasi'],
        labels: ['Pagu', 'Realisasi'],
        barRatio: 0.4,
        pointSize: 2.5,
        resize: true,
        parseTime: false,
        hideHover: 'auto',
        gridTextSize: 9
    });
</script>