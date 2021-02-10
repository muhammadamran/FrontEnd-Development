  
<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Upload</a></li>
		<li class="breadcrumb-item active">POK/SAPRAS</li>
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
									<?php if ($title == "sarpras") { ?>
										<?php echo $this->session->flashdata($title."_".$kampus) ?>
										<?php echo form_open_multipart("uploads/".$title."_".$kampus); ?>
									<?php } else { ?>
										<?php echo $this->session->flashdata("$title") ?>
										<?php echo form_open_multipart("uploads/$title"); ?>
									<?php } ?>
									<div class="form-group">
										<?php if ($title == "pok") { ?>
											<label>UNGGAH 5 FILE EXCEL <?= strtoupper($title); ?> (BIRO I, II, III, IV, PASCA & PROFESI)</label>
										<?php } elseif ($title == "sarpras") { ?>
											<label>UNGGAH FILE EXCEL <?= strtoupper($title)." ".strtoupper($kampus); ?></label>
										<?php } elseif ($title == "rank") { ?>
											<label>UNGGAH 3 FILE EXCEL <?= strtoupper($title); ?> (ESELON 1, SATKER, KEGIATAN)</label>
										<?php } ?>
										<span class="ml-2">
											<i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
										</span>
										<?php if ($title == "pok") { ?>
											<input type="file" multiple name="<?= $title; ?>[]" class="form-control">
										<?php } elseif ($title == "sarpras") { ?>
											<input type="file" name="<?= $title; ?>_<?= $kampus; ?>" class="form-control">
										<?php } elseif ($title == "rank") { ?>
											<input type="file" multiple name="<?= $title; ?>[]" class="form-control">
										<?php } ?>
									</div>

									<button id="biroN" type="submit" class="btn btn-success">UPLOAD REKAP <?= strtoupper($title); ?></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>