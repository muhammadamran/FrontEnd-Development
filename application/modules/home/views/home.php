<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
	</ol>
	<!-- <h1 class="page-header mb-3">&nbsp;</h1> -->
	<div class="d-sm-flex align-items-center mb-3">
		<a href="#" class="btn btn-inverse mr-2 text-truncate" id="daterange-filter">
			<i class="fa fa-calendar fa-fw text-white-transparent-5 ml-n1"></i> 
			<span><?php echo date("d/m/Y"); ?></span>
		</a>
	</div>
	<div class="row">
		<div class="col-xl-6">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">KEUANGAN</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
					</div>
				</div>

				<div class="panel-body bg-dark">
					<div class="card border-0 bg-dark text-white mb-3 overflow-hidden">
						<div class="card-body">
							<div class="mb-3 text-grey">
								<b class="mb-3">RATA-RATA KEMENDAGRI</b>
								<div class="text-grey">
									<i class=""></i> Berdasarkan OM-SPAN
								</div>
								<?php echo date('d/m/Y', strtotime($tanggal_rank)) ?>
							</div>
							<div class="d-flex align-items-center mb-1">
								<a href="<?php echo base_url('d_peringkat');?>">
									<h5 class="text-white mb-3">
										<span data-animation="number" data-value="<?= $rank_kemendagri_persen ?>"><?= $rank_kemendagri_persen ?></span> |
										<span class="mb-3">IPDN (PERINGKAT KE-<?= $rank_kemendagri_ipdn ?>)</span>
									</h5>
								</a>
							</div>
							<div class="row">
								<div class="col-xl-12 col-lg-8">
									<div class="mb-3 text-grey">
										<b>PERSENTASE OM-SPAN (SP2D)</b>
										<span class="ml-2">
											<i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="PERSENTASE SPAN, SAS dan POK" data-placement="top" data-content=""></i>
										</span>
									</div>
									<div class="d-flex mb-1">
										<a href="<?php echo base_url('d_spanint');?>"><h2 class="mb-0"><span data-animation="number" data-value="<?php echo $persentase_span ?>"><?php echo $persentase_span ?></span>%</h2></a>
										<div class="ml-auto mt-n1 mb-n1"><div id="total-sales-sparkline"></div></div>
									</div>
									<div class="mb-3 text-grey">
										<!-- <i class="fa fa-caret-up"></i> <span data-animation="number" data-value="33.21">0.00</span>% compare to last week -->
									</div>
									<div class="progress progress-xs rounded-lg rounded-corner bg-dark-darker m-b-5 active">
										<div class="progress-bar bg-teal progress-bar-striped rounded-right progress-bar-animated" style="width: <?php echo $persentase_span ?>%"></div>
									</div>
									<hr class="bg-white-transparent-2" />
									<div class="row text-truncate">
										<div class="col-6">
											<div class="f-s-12 text-grey"><b>PERSENTASE SAS (SPM)</b></div>
											<div class="text-grey">
												<i class=""></i> IPDN
											</div>
											<div class="f-s-18 m-b-5 f-w-600 p-b-1"><a href="<?php echo base_url('d_sas');?>"><span data-animation="number" data-value="<?php $ceksas == NULL ? 0 : $persentase_sas ?>"><?php $ceksas == NULL ? 0 : $persentase_sas ?></span>%</a></div>
											<div class="progress progress-xs rounded-lg rounded-corner bg-dark-darker m-b-5 active">
												<div class="progress-bar bg-warning progress-bar-striped rounded-right progress-bar-animated" style="width: <?php $ceksas == NULL ? 0 : $persentase_sas ?>%"></div>
											</div>
										</div>
										<div class="col-6">
											<div class="f-s-12 text-grey"><b>PERSENTASE POK (SPP)</b></div>
											<div class="text-grey">
												<i class=""></i> JATINANGOR
											</div>
											<div class="f-s-18 m-b-5 f-w-600 p-b-1"><a href="<?php echo base_url('d_pok');?>"><span data-animation="number" data-value="<?php $cekpok == NULL ? 0 : $persentase_pok ?>"><?php $cekpok == NULL ? 0 : $persentase_pok ?></span>%</a></div>
											<div class="progress progress-xs rounded-lg rounded-corner bg-dark-darker m-b-5 active">
												<div class="progress-bar bg-blue progress-bar-striped rounded-right progress-bar-animated" style="width: <?php $cekpok == NULL ? 0 : $persentase_pok ?>%"></div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title"> <a href="<?php echo base_url('d_spanint');?>">OM-SPAN JATINANGOR (SP2D)</h4>
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
						</div>
					</div>
					<div class="panel-body bg-dark">
						<div class="card border-0 bg-dark text-white text-truncate mb-3">
							<div class="mb-3 text-grey">
								<b class="mb-3">TOTAL PERSENTASE</b> 
								<span class="ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="BIRO KAMPUS JATINANGOR" data-placement="top" data-content="REALISASI SERAPAN ANGGARAN PROGRAM PENDIDIKAN KEPAMONGPRAJAAN IPDN JATINANGOR ." data-original-title="" title=""></i></span>
								<div class="text-grey">
									<i class=""></i> OM-SPAN JATINANGOR (SP2D) 
								</div>
							</div>
							
							<div class="d-flex align-items-center mb-1">
								<a href="<?php echo base_url('d_spanint');?>"><h2 class="text-white mb-0"><span data-animation="number" data-value="<?php echo $persentase_jatinangor[0]->persentase_t ?>"><?php echo $persentase_jatinangor[0]->persentase_t ?></span></h2></a>
								<!-- <a href="#"><h2 class="text-white mb-0"><span data-animation="number" data-value="<?php echo $persentase_jatinangor[0]->persentase_t ?>"><?php echo $persentase_jatinangor[0]->persentase_t ?></span></h2></a> -->
								<div class="ml-auto">
									<div id="conversion-rate-sparkline"></div>
								</div>
							</div>
							<br><br>
							<?php
							foreach($biro as $row){
								?>
								<div class="d-flex mb-2">
									<div class="d-flex align-items-center">
										<i class="fa fa-circle text-lime f-s-8 mr-2"></i>
										<?php echo $row->alias; ?>
									</div>
									<div class="d-flex align-items-center ml-auto">
										<!-- <div class="text-grey f-s-11"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="262">0</span>%</div> -->
										<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="<?php echo $row->persentase_t; ?>"><?php echo $row->persentase_t; ?></span></div>
									</div>
								</div>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xl-3">
				<div class="panel panel-inverse">
					<div class="panel-heading">
						<h4 class="panel-title">DOSEN</h4>
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
						</div>
					</div>
					<div class="panel-body bg-dark">
						<div class="card border-0 bg-dark text-white text-truncate mb-3">
							<div class="mb-3 text-grey">
								<b class="mb-3">TOTAL DOSEN (<?php echo$last_dosen; ?>)</b> 
								<!-- <span class="ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Institut Pendidikan Dalam Negeri (IPDN)" data-placement="top" data-content="Data DOSEN Berdasarkan http://sika.ipdn.ac.id" data-original-title="" title=""></i></span> -->
								<div class="text-grey">
									<i class=""></i> KAMPUS IPDN
								</div>
							</div>
							<div class="d-flex align-items-center mb-1">
								<h2 class="text-white mb-0"><span data-animation="number" data-value="<?php echo $dosen[0]->total; ?>"><?php echo $dosen[0]->total; ?></span> DOSEN</h2>
								<div class="ml-auto">
									<div id="conversion-rate-sparkline"></div>
								</div>
							</div>
							<br><br>
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-green f-s-8 mr-2"></i>
									GURU BESAR
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="text-right pl-2 f-w-600"><span><?php echo $dosen[0]->guru_besar; ?></span></div>
								</div>
							</div>
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-orange f-s-8 mr-2"></i>
									LEKTOR KEPALA
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="text-right pl-2 f-w-600"><span><?php echo $dosen[0]->lektor_kepala; ?></span></div>
								</div>
							</div>
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-blue f-s-8 mr-2"></i>
									LEKTOR
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="text-right pl-2 f-w-600"><span><?php echo $dosen[0]->lektor; ?></span></div>
								</div>
							</div>
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-red f-s-8 mr-2"></i>
									ASISTEN AHLI
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="text-right pl-2 f-w-600"><span><?php echo $dosen[0]->asisten_ahli; ?></span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-6">
				<ul class="nav nav-tabs nav-tabs-inverse nav-justified nav-justified-mobile" data-sortable-id="index-2">
					<li class="nav-item"><a href="#aplikasi" data-toggle="tab" class="nav-link active"><i class="fa fa-globe fa-lg m-r-5"></i> <span class="d-none d-md-inline">APLIKASI</span></a></li>
					<li class="nav-item"><a href="#status_aplikasi" data-toggle="tab" class="nav-link"><i class="fa fa-list fa-lg m-r-5"></i> <span class="d-none d-md-inline">STATUS APLIKASI</span></a></li>
				</ul>
				<div class="tab-content" data-sortable-id="index-3">
					<div class="tab-pane fade active show" id="aplikasi">
						<div class="height-sm" data-scrollbar="true">
							<div class="panel-body">
								<div class="card border-0 bg-white text-black mb-3">
									<div class="card-body" style="background: no-repeat bottom right; background-image: url(assets/img/svg/img-4.svg); background-size: auto 100%;"></div>
									<div class="widget-list widget-list-rounded">
										<br>
										<a href="http://ipdn.ac.id/" target="_blank" class="widget-list-item rounded-0 p-t-3">
											<div class="widget-list-media icon">
												<i class="fab fas fa-lg fa-fw  fa-university bg-primary text-white"></i>
											</div>
											<div class="widget-list-content">
												<div class="widget-list-title">IPDN</div>
											</div>
										</a>
										<a href="<?php echo base_url('d_span');?>" class="widget-list-item rounded-0 p-t-3">
											<div class="widget-list-media icon">
												<i class="fab fas fa-lg fa-fw  fa-money-bill-alt bg-green text-white"></i>
											</div>
											<div class="widget-list-content">
												<div class="widget-list-title">Keuangan</div>
											</div>
										</a>
										<a href="<?php echo base_url('kepegawaian');?>" class="widget-list-item rounded-0 p-t-3">
											<div class="widget-list-media icon">
												<i class="fab fas fa-lg fa-fw fa-building bg-blue text-white"></i>
											</div>
											<div class="widget-list-content">
												<div class="widget-list-title">Kepegawaian</div>
											</div>
										</a>
										<a href="<?php echo base_url('d_praja');?>" class="widget-list-item rounded-0 p-t-3">
											<div class="widget-list-media icon">
												<i class="fab fas fa-lg fa-fw fa-graduation-cap bg-yellow text-white"></i>
											</div>
											<div class="widget-list-content">
												<div class="widget-list-title">Keprajaan</div>
											</div>
										</a>
										<br>
										<div class="col-sm-6">
											<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail"><i class="fa fas fa-info-circle"></i> More</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="status_aplikasi">
						<div class="height-sm" data-scrollbar="true">
							<div class="card border-0 bg-white text-black text-truncate mb-3">
								<div class="mb-3 text-black">
									<b class="mb-3">TOTAL APLIKASI</b> 
									<span class="ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Institut Pendidikan Dalam Negeri (IPDN)" data-placement="top" data-content="" data-original-title="" title=""></i></span>
									<div class="text-black">
										<i class=""></i> KAMPUS IPDN
									</div>
								</div>
								<div class="d-flex align-items-center mb-1">
									<h4 class="text-black mb-0"><span data-animation="number" data-value="<?php echo $apps[0]->total ?>"><?php echo $apps[0]->total ?></span> Aplikasi</h4>
									<div class="ml-auto">
										<div id="conversion-rate-sparkline"></div>
									</div>
								</div>
								<br>
								<div class="d-flex mb-2">
									<div class="d-flex align-items-center">
										<i class="fa fa-circle text-green f-s-8 mr-2"></i>
										Aktif, Digunakan
									</div>
									<div class="d-flex align-items-center ml-auto">
										<div class="text-right pl-2 f-w-600"><span><?php echo $apps[0]->aktif; ?></span></div>
									</div>
								</div>
								<div class="d-flex mb-2">
									<div class="d-flex align-items-center">
										<i class="fa fa-circle text-warning f-s-8 mr-2"></i>
										Aktif, Tidak Digunakan
									</div>
									<div class="d-flex align-items-center ml-auto">
										<div class="text-right pl-2 f-w-600"><span><?php echo $apps[0]->tdk_digunakan; ?></span></div>
									</div>
								</div>
								<div class="d-flex mb-2">
									<div class="d-flex align-items-center">
										<i class="fa fa-circle text-red f-s-8 mr-2"></i>
										Tidak Aktif
									</div>
									<div class="d-flex align-items-center ml-auto">
										<div class="text-right pl-2 f-w-600"><span><?php echo $apps[0]->tdk_aktif; ?></span></div>
									</div>
								</div>					
							</div>
							<div class="table-responsive">
								<table class="table table-valign-middle table-panel mb-0" width="100%">
									<thead>
										<tr>
											<div class="progress rounded-corner">
												<div class="progress-bar bg-dark" style="width: 25%">
													Unit
												</div>
												<div class="progress-bar bg-lime" style="width: 25%">
													Aktif, Digunakan
												</div>
												<div class="progress-bar bg-warning" style="width: 25%">
													Tidak Digunakan
												</div>
												<div class="progress-bar bg-red" style="width: 25%">
													Tidak Aktif
												</div>
											</div>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td width="35%"><label class="label label-danger"><?php echo $apps[0]->nama_1; ?></label></td>
											<td width="26%"><?php echo $apps[0]->app1_1; ?></td>
											<td width="24%"><?php echo $apps[0]->app1_2; ?></td>
											<td><?php echo $apps[0]->app1_3; ?></td>
										</tr>
										<tr>
											<td><label class="label label-warning"><?php echo $apps[0]->nama_2; ?></label></td>
											<td><?php echo $apps[0]->app2_1; ?></td>
											<td><?php echo $apps[0]->app2_2; ?></td>
											<td><?php echo $apps[0]->app2_3; ?></td>
										</tr>
										<tr>
											<td><label class="label label-success"><?php echo $apps[0]->nama_3; ?></label></td>
											<td><?php echo $apps[0]->app3_1; ?></td>
											<td><?php echo $apps[0]->app3_2; ?></td>
											<td><?php echo $apps[0]->app3_3; ?></td>
										</tr>
										<tr>
											<td><label class="label label-primary"><?php echo $apps[0]->nama_4; ?></label></td>
											<td><?php echo $apps[0]->app4_1; ?></td>
											<td><?php echo $apps[0]->app4_2; ?></td>
											<td><?php echo $apps[0]->app4_3; ?></td>
										</tr>
										<tr>
											<td><label class="label label-default"><?php echo $apps[0]->nama_5; ?></label></td>
											<td><?php echo $apps[0]->app5_1; ?></td>
											<td><?php echo $apps[0]->app5_2; ?></td>
											<td><?php echo $apps[0]->app5_3; ?></td>
										</tr>
										<tr>
											<td><label class="label label-lime"><?php echo $apps[0]->nama_6; ?></label></td>
											<td><?php echo $apps[0]->app6_1; ?></td>
											<td><?php echo $apps[0]->app6_2; ?></td>
											<td><?php echo $apps[0]->app6_3; ?></td>
										</tr>
										<tr>
											<td><label class="label label-pink"><?php echo $apps[0]->nama_7; ?></label></td>
											<td><?php echo $apps[0]->app7_1; ?></td>
											<td><?php echo $apps[0]->app7_2; ?></td>
											<td><?php echo $apps[0]->app7_3; ?></td>
										</tr>
										<tr>
											<td><label class="label label-green"><?php echo $apps[0]->nama_8; ?></label></td>
											<td><?php echo $apps[0]->app8_1; ?></td>
											<td><?php echo $apps[0]->app8_2; ?></td>
											<td><?php echo $apps[0]->app8_3; ?></td>
										</tr>
										<tr>
											<td><label class="label label-red"><?php echo $apps[0]->nama_9; ?></label></td>
											<td><?php echo $apps[0]->app9_1; ?></td>
											<td><?php echo $apps[0]->app9_2; ?></td>
											<td><?php echo $apps[0]->app9_3; ?></td>
										</tr>
										<tr>
											<td><label class="label label-warning"><?php echo $apps[0]->nama_10; ?></label></td>
											<td><?php echo $apps[0]->app10_1; ?></td>
											<td><?php echo $apps[0]->app10_2; ?></td>
											<td><?php echo $apps[0]->app10_3; ?></td>
										</tr>
										<tr>
											<td><label class="label label-default"><?php echo $apps[0]->nama_11; ?></label></td>
											<td><?php echo $apps[0]->app11_1; ?></td>
											<td><?php echo $apps[0]->app11_2; ?></td>
											<td><?php echo $apps[0]->app11_3; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-6">
				<!-- begin tabs -->
				<ul class="nav nav-tabs nav-tabs-inverse nav-justified nav-justified-mobile" data-sortable-id="index-2">
					<li class="nav-item"><a href="#latest-post" data-toggle="tab" class="nav-link active"><i class="fa fa-newspaper fa-lg m-r-5"></i> <span class="d-none d-md-inline">BERITA INTERNAL</span></a></li>
					<li class="nav-item"><a href="#eksternal" data-toggle="tab" class="nav-link"><i class="fa fa-list fa-lg m-r-5"></i> <span class="d-none d-md-inline">BERITA EKSTERNAL</span></a></li>
				</ul>
				<div class="tab-content" data-sortable-id="index-3">
					<div class="tab-pane fade active show" id="latest-post">
						<div class="height-sm" data-scrollbar="true">
							
							<?php foreach($berita as $berita) { ?>
								<ul class="media-list media-list-with-divider">
									<li class="media media-lg">
										<a href="javascript:;" class="pull-left">
											<img class="media-object rounded" src="<?php echo base_url('assets/img/gallery/'.$berita->gambar) ?>" alt=""/>
										</a>
										<div class="media-body">
											<h5 class="media-heading"><?php echo $berita->judul_berita ?></h5>
											<p><?php echo date('H:i:s | d/m/Y', strtotime($berita->tanggal)) ?></p>
											<?php $limited_word = word_limiter($berita->isi,10);?>
											<?php echo $limited_word ?>
											<span>
												<a href="#" data-toggle="modal" data-target="#read<?php echo $berita->id_berita;?>">Baca detail...</a>
											</span>
										</div>
									</li>
								</ul>

								<!-- Modal -->
								<div class="modal fade bd-example-modal-xl" id="read<?php echo $berita->id_berita;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-xl" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel"><?php echo $berita->judul_berita ?></h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="height-lg" data-scrollbar="true">
												<div class="modal-body">
													<div class="row">
														<div class="form-group col-xl-4">
															<a href="javascript:;" class="pull-left">
																<img class="rounded" style="width:100%" src="<?php echo base_url('assets/img/gallery/'.$berita->gambar) ?>" alt=""/>
															</a>
														</div>
														<div class="form-group col-xl-8">
															<?php echo $berita->isi ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php }?>

						</div>
					</div>

					<div class="tab-pane fade" id="eksternal">
						<div class="height-sm" data-scrollbar="true">
							<div class="panel-body">
								<div class="table-responsive">
									<table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
										<thead>
											<tr>
												<th class="text-nowrap">No</th>
												<th class="text-nowrap">Nama Media</th>
												<th class="text-nowrap">Judul</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no =0 ;
											foreach($eksternal as $row){
												$no++;    
												?>
												<tr>
													<td><?php echo $no; ?></td>
													<td><?php echo $row->NamaMedia?></td>
													<td><a href="<?php echo $row->Link?>" target="_blank"> <?php echo $row->Judul?></a></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			

		

			<div class="col-xl-3">
				<div class="panel panel-inverse">
					<div class="panel-heading">
						<h4 class="panel-title">KEPRAJAAN</h4>
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
						</div>
					</div>
					<div class="panel-body bg-dark">
						<div class="card border-0 bg-dark text-white text-truncate mb-3">
							<div class="mb-3 text-grey">
								<b class="mb-3">TOTAL PRAJA</b> 
								<span class="ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Institut Pendidikan Dalam Negeri (IPDN)" data-placement="top" data-content="Data Berdasrkan http://sika.ipdn.ac.id" data-original-title="" title=""></i></span>
								<div class="text-grey">
									<i class=""></i> KAMPUS IPDN
								</div>
							</div>
							<div class="d-flex align-items-center mb-1">
								<h4 class="text-white mb-0"><span data-animation="number" data-value="<?php echo $total_praja ?>"><?php echo $total_praja ?></span> PRAJA</h4>
								<div class="ml-auto">
									<div id="conversion-rate-sparkline"></div>
								</div>
							</div>
							<br>
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-blue f-s-8 mr-2"></i>
									LAKI LAKI
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="width-50 text-right pl-2 f-w-600"><span><?php echo $jkpraja[0]->jumlahL; ?></span></div>
								</div>
							</div>
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-pink f-s-8 mr-2"></i>
									PEREMPUAN
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="width-50 text-right pl-2 f-w-600"><span><?php echo $jkpraja[0]->jumlahP; ?></span></div>
								</div>
							</div>
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-lime f-s-8 mr-2"></i>
									AKTIF
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="width-50 text-right pl-2 f-w-600"><span><?php echo $status[0]->aktif; ?></span></div>
								</div>
							</div>
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-white f-s-8 mr-2"></i>
									CUTI
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="width-50 text-right pl-2 f-w-600"><span><?php echo $status[0]->cuti; ?></span></div>
								</div>
							</div>
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-warning f-s-8 mr-2"></i>
									DIBERHENTIKAN
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="width-50 text-right pl-2 f-w-600"><span><?php echo $hukuman[0]->berhenti; ?></span></div>
								</div>
							</div>
						</br>
						<div class="d-flex mb-2">
							<div class="d-flex align-items-center">
								TURUN TINGKAT
							</div>
						</div>
						<div class="d-flex mb-2">
							<div class="d-flex align-items-center">
								<i class="fa fa-circle text-green f-s-8 mr-2"></i>
								MADYA PRAJA
							</div>
							<div class="d-flex align-items-center ml-auto">
								<div class="width-50 text-right pl-2 f-w-600"><span><?php echo $angkatan30[0]->turuntingkat; ?></span></div>
							</div>
						</div>
						<div class="d-flex mb-2">
							<div class="d-flex align-items-center">
								<i class="fa fa-circle text-orange f-s-8 mr-2"></i>
								NINDYA PRAJA
							</div>
							<div class="d-flex align-items-center ml-auto">
								<div class="width-50 text-right pl-2 f-w-600"><span><?php echo $angkatan29[0]->turuntingkat; ?></span></div>
							</div>
						</div>
						<div class="d-flex mb-2">
							<div class="d-flex align-items-center">
								<i class="fa fa-circle text-yellow f-s-8 mr-2"></i>
								PRAJA UTAMA
							</div>
							<div class="d-flex align-items-center ml-auto">
								<div class="width-50 text-right pl-2 f-w-600"><span><?php echo $angkatan28[0]->turuntingkat; ?></span></div>
							</div>
						</div>
					</br>
					<div class="d-flex mb-2">
						<div class="d-flex align-items-center">
							ANGKATAN
						</div>
					</div>
					<div class="d-flex mb-2">
						<div class="d-flex align-items-center">
							<i class="fa fa-circle text-red f-s-8 mr-2"></i>
							MUDA PRAJA
						</div>
						<div class="d-flex align-items-center ml-auto">
							<div class="width-50 text-right pl-2 f-w-600"><span><?php echo $angkatan[0]->angkatan31; ?></span></div>
						</div>
					</div>
					<div class="d-flex mb-2">
						<div class="d-flex align-items-center">
							<i class="fa fa-circle text-yellow f-s-8 mr-2"></i>
							MADYA PRAJA
						</div>
						<div class="d-flex align-items-center ml-auto">
							<div class="width-50 text-right pl-2 f-w-600"><span><?php echo $angkatan[0]->angkatan30; ?></span></div>
						</div>
					</div>
					<div class="d-flex mb-2">
						<div class="d-flex align-items-center">
							<i class="fa fa-circle text-green f-s-8 mr-2"></i>
							NINDYA PRAJA
						</div>
						<div class="d-flex align-items-center ml-auto">
							<div class="width-50 text-right pl-2 f-w-600"><span><?php echo $angkatan[0]->angkatan29; ?></span></div>
						</div>
					</div>
					<div class="d-flex mb-2">
						<div class="d-flex align-items-center">
							<i class="fa fa-circle text-blue f-s-8 mr-2"></i>
							PRAJA UTAMA
						</div>
						<div class="d-flex align-items-center ml-auto">
							<div class="width-50 text-right pl-2 f-w-600"><span><?php echo $angkatan[0]->angkatan28; ?></span></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3">
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h4 class="panel-title">KEPEGAWAIAN</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
				</div>
			</div>
			<div class="panel-body bg-dark">
				<div class="card border-0 bg-dark text-white text-truncate mb-3">
					<div class="mb-3 text-grey">
						<b class="mb-3">TOTAL PEGAWAI</b> 
						<span class="ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Institut Pendidikan Dalam Negeri (IPDN)" data-placement="top" data-content="Data Berdasarkan http://sika.ipdn.ac.id" data-original-title="" title=""></i></span>
						<div class="text-grey">
							<i class=""></i> KAMPUS IPDN
						</div>
					</div>
					<div class="d-flex align-items-center mb-1">
						<h4 class="text-white mb-0"><span data-animation="number" data-value="<?php echo $total_peg ?>"><?php echo $total_peg ?></span> PEGAWAI</h4>
						<div class="ml-auto">
							<div id="conversion-rate-sparkline"></div>
						</div>
					</div>
					<br>
					<div class="d-flex mb-2">
						<div class="d-flex align-items-center">
							PNS
						</div>
						<div class="d-flex align-items-center ml-auto">
							<div class="text-right pl-2 f-w-600"><span><?php echo $peg[0]->pns; ?> PEGAWAI</span></div>
						</div>
					</div>
					<div class="d-flex mb-2">
						<div class="d-flex align-items-center">
							<i class="fa fa-circle text-red f-s-8 mr-2"></i>
							Eselon I
						</div>
						<div class="d-flex align-items-center ml-auto">
							<div class="text-right pl-2 f-w-600"><span><?php echo $eselon[0]->I; ?> PEGAWAI</span></div>
						</div>
					</div>
					<div class="d-flex mb-2">
						<div class="d-flex align-items-center">
							<i class="fa fa-circle text-yellow f-s-8 mr-2"></i>
							Eselon II
						</div>
						<div class="d-flex align-items-center ml-auto">
							<div class="text-right pl-2 f-w-600"><span><?php echo $eselon[0]->II; ?> PEGAWAI</span></div>
						</div>
					</div>
					<div class="d-flex mb-2">
						<div class="d-flex align-items-center">
							<i class="fa fa-circle text-warning f-s-8 mr-2"></i>
							Eselon III
						</div>
						<div class="d-flex align-items-center ml-auto">
							<div class="text-right pl-2 f-w-600"><span><?php echo $eselon[0]->III; ?> PEGAWAI</span></div>
						</div>
					</div>
					<div class="d-flex mb-2">
						<div class="d-flex align-items-center">
							<i class="fa fa-circle text-primary f-s-8 mr-2"></i>
							Eselon IV
						</div>
						<div class="d-flex align-items-center ml-auto">
							<div class="text-right pl-2 f-w-600"><span><?php echo $eselon[0]->IV; ?> PEGAWAI</span></div>
						</div>
					</div>
					<br>
					<div class="d-flex mb-2">
						<div class="d-flex align-items-center">
							NON-PNS
						</div>
					</div>
					<div class="d-flex mb-2">
						<div class="d-flex align-items-center">
							<i class="fa fa-circle text-yellow f-s-8 mr-2"></i>
							TENAGA KONTRAK
						</div>
						<div class="d-flex align-items-center ml-auto">
							<div class="text-right pl-2 f-w-600"><span><?php echo $peg[0]->thl; ?> PEGAWAI</span></div>
						</div>
					</div>
					<div class="d-flex mb-2">
						<div class="d-flex align-items-center">
							<i class="fa fa-circle text-red f-s-8 mr-2"></i>
							TENAGA AHLI
						</div>
						<div class="d-flex align-items-center ml-auto">
							<div class="text-right pl-2 f-w-600"><span><?php echo $peg[0]->ta; ?> PEGAWAI</span></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3">
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h4 class="panel-title">HUKUM DAN ORTALA</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
				</div>
			</div>
			<div class="panel-body bg-dark">
				<div class="card border-0 bg-dark text-white text-truncate mb-3">
					<div class="mb-3 text-grey">
						<b class="mb-3">TOTAL PRODUK HUKUM</b> 
						<span class="ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Institut Pendidikan Dalam Negeri (IPDN)" data-placement="top" data-original-title="" title=""></i></span>
						<div class="text-grey">
							<i class=""></i> KAMPUS IPDN
						</div>
					</div>
					<div class="d-flex align-items-center mb-1">
						<h4 class="text-white mb-0"><span data-animation="number" data-value="<?php echo $prokum[0]->prokum ?>"><?php echo $prokum[0]->prokum ?></span> PRODUK HUKUM</h4>
						<div class="ml-auto">
							<div id="conversion-rate-sparkline"></div>
						</div>
					</div>
					<br>
						<!-- <div class="d-flex mb-2">
							<div class="d-flex align-items-center">
								Peraturan Rektor
							</div>
							<div class="d-flex align-items-center ml-auto">
								<div class="text-right pl-2 f-w-600"><span><?php echo $peg[0]->pns; ?> PEGAWAI</span></div>
							</div>
						</div> -->
						<div class="d-flex mb-2">
							<div class="d-flex align-items-center">
								<i class="fa fa-circle text-red f-s-8 mr-2"></i>
								Peraturan Rektor
							</div>
							<div class="d-flex align-items-center ml-auto">
								<div class="text-right pl-2 f-w-600"><span><?php echo $perek[0]->pr; ?></span></div>
							</div>
						</div>
						<div class="d-flex mb-2">
							<div class="d-flex align-items-center">
								<i class="fa fa-circle text-yellow f-s-8 mr-2"></i>
								Keputusan Rektor
							</div>
							<div class="d-flex align-items-center ml-auto">
								<div class="text-right pl-2 f-w-600"><span><?php echo $keprek[0]->kr; ?></span></div>
							</div>
						</div>
						<div class="d-flex mb-2">
							<div class="d-flex align-items-center">
								<i class="fa fa-circle text-warning f-s-8 mr-2"></i>
								Surat Edaran Rektor
							</div>
							<div class="d-flex align-items-center ml-auto">
								<div class="text-right pl-2 f-w-600"><span><?php echo $srt[0]->ser; ?></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
</div>



<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Aplikasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<div data-scrollbar="true" data-height="600px">
					
					<?php if($pddikti != NULL){ ?>	
						<div class="col-lg-12">
							<div class="m-b-10 f-s-10 m-t-10">
								<b class="text-inverse">PDDIKTI</b>
							</div>
							<div class="card-body">
								<div class="form-row">
									<?php foreach($pddikti as $ris){?>
										<div class="col-4">
											<div class="form-group">
												<div class="text-center">
													<a href="<?php echo $ris->link_apps ?>" target="_blank" >
														<div class="app-box">
															<img src="<?php echo $ris->image_url ?>" width="60%" >
															<div class="app-name" title=""><?php echo $ris->nama_apps ?></div>
														</div>
													</a>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>

					<?php if($perpustakaan != NULL){ ?>
						<div class="col-lg-12">
							<div class="m-b-10 f-s-10 m-t-10">
								<b class="text-inverse">PERPUSTAKAAN</b>
							</div>
							<div class="card-body">
								<div class="form-row">
									<?php foreach($perpustakaan as $perpus){?>
										<div class="col-4">
											<div class="form-group">
												<div class="text-center">
													<a href="<?php echo $perpus->link_apps ?>" target="_blank" >
														<div class="app-box">
															<img src="<?php echo $perpus->image_url ?>" width="60%" >
															<div class="app-name" title=""><?php echo $perpus->nama_apps ?></div>
														</div>
													</a>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if($akademik != NULL){ ?>			
						<div class="col-lg-12">
							<div class="m-b-10 f-s-10 m-t-10">
								<b class="text-inverse">AKADEMIK</b>
							</div>
							<div class="card-body">
								<div class="form-row">
									<?php foreach($akademik as $akade){?>
										<div class="col-4">
											<div class="form-group">
												<div class="text-center">
													<a href="<?php echo $akade->link_apps ?>" target="_blank" >
														<div class="app-box">
															<img src="<?php echo $akade->image_url ?>" width="60%" >
															<div class="app-name" title=""><?php echo $akade->nama_apps ?></div>
														</div>
													</a>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php if($keuangan != NULL){ ?>	
						<div class="col-lg-12">
							<div class="m-b-10 f-s-10 m-t-10">
								<b class="text-inverse">KEUANGAN</b>
							</div>
							<div class="card-body">
								<div class="form-row">
									<?php foreach($keuangan as $keu){?>
										<div class="col-4">
											<div class="form-group">
												<div class="text-center">
													<a href="<?php echo $keu->link_apps ?>" target="_blank" >
														<div class="app-box">
															<img src="<?php echo $keu->image_url ?>" width="60%" >
															<div class="app-name" title=""><?php echo $keu->nama_apps ?></div>
														</div>
													</a>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php if($riset != NULL){ ?>	
						<div class="col-lg-12">
							<div class="m-b-10 f-s-10 m-t-10">
								<b class="text-inverse">RISET</b>
							</div>
							<div class="card-body">
								<div class="form-row">
									<?php foreach($riset as $ris){?>
										<div class="col-4">
											<div class="form-group">
												<div class="text-center">
													<a href="<?php echo $ris->link_apps ?>" target="_blank" >
														<div class="app-box">
															<img src="<?php echo $ris->image_url ?>" width="60%" >
															<div class="app-name" title=""><?php echo $ris->nama_apps ?></div>
														</div>
													</a>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php if($tp != NULL){ ?>	
						<div class="col-lg-12">
							<div class="m-b-10 f-s-10 m-t-10">
								<b class="text-inverse">TP</b>
							</div>
							<div class="card-body">
								<div class="form-row">
									<?php foreach($tp as $ris){?>
										<div class="col-4">
											<div class="form-group">
												<div class="text-center">
													<a href="<?php echo $ris->link_apps ?>" target="_blank" >
														<div class="app-box">
															<img src="<?php echo $ris->image_url ?>" width="60%" >
															<div class="app-name" title=""><?php echo $ris->nama_apps ?></div>
														</div>
													</a>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php if($keprajaan != NULL){ ?>	
						<div class="col-lg-12">
							<div class="m-b-10 f-s-10 m-t-10">
								<b class="text-inverse">KEPRAJAAN</b>
							</div>
							<div class="card-body">
								<div class="form-row">
									<?php foreach($keprajaan as $ris){?>
										<div class="col-4">
											<div class="form-group">
												<div class="text-center">
													<a href="<?php echo $ris->link_apps ?>" target="_blank" >
														<div class="app-box">
															<img src="<?php echo $ris->image_url ?>" width="60%" >
															<div class="app-name" title=""><?php echo $ris->nama_apps ?></div>
														</div>
													</a>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php if($pascasarjana != NULL){ ?>	
						<div class="col-lg-12">
							<div class="m-b-10 f-s-10 m-t-10">
								<b class="text-inverse">PASCASARJANA</b>
							</div>
							<div class="card-body">
								<div class="form-row">
									<?php foreach($pascasarjana as $ris){?>
										<div class="col-4">
											<div class="form-group">
												<div class="text-center">
													<a href="<?php echo $ris->link_apps ?>" target="_blank" >
														<div class="app-box">
															<img src="<?php echo $ris->image_url ?>" width="60%" >
															<div class="app-name" title=""><?php echo $ris->nama_apps ?></div>
														</div>
													</a>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>

					<?php if($kepegawaian != NULL){ ?>	
						<div class="col-lg-12">
							<div class="m-b-10 f-s-10 m-t-10">
								<b class="text-inverse">KEPEGAWAIAN</b>
							</div>
							<div class="card-body">
								<div class="form-row">
									<?php foreach($kepegawaian as $ris){?>
										<div class="col-4">
											<div class="form-group">
												<div class="text-center">
													<a href="<?php echo $ris->link_apps ?>" target="_blank" >
														<div class="app-box">
															<img src="<?php echo $ris->image_url ?>" width="60%" >
															<div class="app-name" title=""><?php echo $ris->nama_apps ?></div>
														</div>
													</a>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>

					<?php if($kerjasama != NULL){ ?>	
						<div class="col-lg-12">
							<div class="m-b-10 f-s-10 m-t-10">
								<b class="text-inverse">KERJASAMA</b>
							</div>
							<div class="card-body">
								<div class="form-row">
									<?php foreach($kerjasama as $ris){?>
										<div class="col-4">
											<div class="form-group">
												<div class="text-center">
													<a href="<?php echo $ris->link_apps ?>" target="_blank" >
														<div class="app-box">
															<img src="<?php echo $ris->image_url ?>" width="60%" >
															<div class="app-name" title=""><?php echo $ris->nama_apps ?></div>
														</div>
													</a>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php if($pengasuhan != NULL){ ?>	
						<div class="col-lg-12">
							<div class="m-b-10 f-s-10 m-t-10">
								<b class="text-inverse">PENGASUHAN</b>
							</div>
							<div class="card-body">
								<div class="form-row">
									<?php foreach($pengasuhan as $ris){?>
										<div class="col-4">
											<div class="form-group">
												<div class="text-center">
													<a href="<?php echo $ris->link_apps ?>" target="_blank" >
														<div class="app-box">
															<img src="<?php echo $ris->image_url ?>" width="60%" >
															<div class="app-name" title=""><?php echo $ris->nama_apps ?></div>
														</div>
													</a>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>