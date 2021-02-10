<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('d_praja'); ?>">Detail Praja </a></li>

  </ol>
  <h1 class="page-header"> PRAJA</h1>
  <div class="row">
    <div class="col-xl-12">
      <!-- begin panel -->

      <!-- end panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            <span><a href="<?php echo base_url('d_praja/editstatus');?>" class="btn btn-sm btn-warning">KEMBALI</a></span>
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="table-responsive">
          <div class="panel-body">
            <form action="<?php echo base_url('d_praja/tambah_status'); ?>" method="POST" enctype="multipart/form-data">
              <h3> DATA DIRI </h3>
              <br>
              <div class="row">
               <div class="col-3">
                <label for="basic-url">NPP  : </label>
                <input class="form-control" list="nppp" name="npp" id="npp">
                <datalist id="nppp">
                 <?php foreach (json_decode($data, true) as $x) : ?>

                   <option value="<?php echo $x['npp'] ?>">

                   <?php endforeach; ?>
                 </datalist>
                 <br>

                 <label for="basic-url">Status : </label>
                 <select class="form-control" name="status" id="status" required="">
                  <option value="">Pilih Status</option>
                  <option value="aktif">Aktif</option>
                  <option value="cuti">Cuti</option>
                  <option value="diberhentikan">Diberhentikan</option>
                  <option value="turuntingkat">Turun Tingkat</option>
                  <option value="meninggal">Meninggal</option>
                </select>
                <br>
                <label for="basic-url">Keterangan : </label>
                <textarea cols="50" rows="10" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan.." required=""></textarea>

                <br>
                <br>

                  <label for="basic-url">Upload SK : </label>
                  <input type="file" class="btn btn-light btn-lg-5" name="fileToUpload" id="fileToUpload" required="">
                  <br>
              </div>
            </div>

          </div>
        </div>
        <div class="panel-body">
         <table class="table table-striped table-bordered table-td-valign-middle" id="praja" width="100%">
          <thead>
            <tr align="center">

              <th>NPP</th>
              <th>Nama</th>
              <th>Status</th>
              <th>Angkatan</th>
              <th>Tingkat</th>

            </tr>
          </thead>
        </table>
        <div class="col-11">
          <br>

          <button type="submit" class="btn btn-blue" value="Cek">Ubah</button>
          <a href="<?php echo base_url('d_praja'); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
        </div>
      </div>


    </div>


  </form>

  <div id="ini">

  </div>
  <br>


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link hrf="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet"></link>

<script >
 $(document).on('change', 'input', function(){
  var options = $('datalist')[0].options;
  var val = $(this).val();
  for (var i=0;i<options.length;i++){
   if (options[i].value === val) {
    // alert(convertToSlug(val));
    // $.ajax({url: "<?php echo base_url('d_praja').'/coba/'; ?>"+convertToSlug(val), success: function(result){
    //   $("#ini").html(result);
    // }});
    var uri = "<?php echo base_url('d_praja').'/coba/'; ?>" + val;
    // alert(uri);
    $('#praja').dataTable({
      "searching": false,
      "paging": false,
      retrieve: true,
      destroy: true,
      "ajax": {
        "url": uri,
        "dataSrc": ""
      },
      "columns": [
      { "data": "npp" },
      { "data": "nama" },
      { "data": "status" },
      { "data": "angkatan"},
      { "data": "tingkat"}
      ]
    });
    break;
  }
}
});
 function convertToSlug(Text)
 {
  return Text
  .toLowerCase()
  .replace(/ /g,'-')
  .replace(/[^\w-]+/g,'')
  ;
}

</script>

