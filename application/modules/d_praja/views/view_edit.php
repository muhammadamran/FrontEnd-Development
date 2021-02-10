<link rel="stylesheet" href="<?php echo base_url() . 'assets/js/morris.css' ?>">
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('d_praja'); ?>">Edit Praja <?php echo $data[0]->nama ?> </a></li>

  </ol>
  <hxl class="page-header">EDIT PRAJA <?php echo $data[0]->nama;?> </hxl>
  <div class="row">
    <div class="col-xl-12">
      <!-- begin panel -->

      <!-- end panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title">
            ID : <?php echo $data[0]->id ?>
          </h4>

          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-col-xllapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="table-responsive">
          <div class="panel-body">
            <form action="<?php echo base_url('d_praja/view_edit'); ?>" method="POST">
              <h3> DATA DIRI </h3>
              <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data[0]->id ?>" >
              <br>
              <div class="form-group">
                <div class="row">
                 <div class="col-xl">
                   <label for="basic-url">Nama</label>
                   <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data[0]->nama == NULL ? "-" :$data[0]->nama ?>" readonly>
                 </div>
                 <div class="col-xl">
                   <label for="basic-url">NPP</label>
                   <input type="text" class="form-control" id="npp" name="npp" value="<?php echo $data[0]->npp == NULL ? "-" :$data[0]->npp ?>" readonly>
                 </div>
                 <div class="col-xl">
                  <label for="basic-url">NIK</label>


                  <?php if($data[0]->nik_praja == NULL) { ?>    

                    <input type="text" class="form-control"  id="nik_praja" name="nik_praja" value="<?php echo $data[0]->nik_praja == NULL ? "-" : $data[0]->nik_praja ?>">       
                  <?php }else{ ?>
                   <input type="text" class="form-control"  id="nik_praja" name="nik_praja" value="<?php echo $data[0]->nik_praja ?>" readonly>

                 <?php }?>
               </div>
               <div class="col-xl">
                <label for="basic-url">No SPCP</label>
                <input type="text" class="form-control" id="no_spcp" name="no_spcp" value="<?php echo  $data[0]->no_spcp == NULL ? "-" : $data[0]->no_spcp ?>" >
              </div>

              <div class="col-xl">
                <label for="basic-url">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $data[0]->nisn == NULL ? "-" : $data[0]->nisn ?>" >
              </div>

              <div class="col-xl">
                <label for="basic-url">Agama</label>
                <input type="text" class="form-control"  id="agama" name="agama"  value="<?php echo $data[0]->agama == NULL ? "-" : $data[0]->agama ?>" >
              </div>
              <div class="col-xl">
                <label for="basic-url">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $data[0]->tgl_lahir == NULL ? "-" : $data[0]->tgl_lahir ?>" >
              </div>
              <div class="col-xl">
                <label for="basic-url">Jenis Kelamin : <?php echo $data[0]->jk == "P" ? "Perempuan" : "Laki-Laki" ?></label>
                <select class="form-control" name="jk" id="jk">
                 <!-- <option value="<?php echo $data[0]->jk== NULL ? "-" : $data[0]->jk?>"><?php echo $data[0]->jk == NULL ? "-" : $data[0]->jk?> -->
                   <option value="L">Laki-Laki</option>
                   <option value="P">Perempuan</option>
                 </select>
               </div>
               <div class="col-xl">
                <label for="basic-url">Tempat Lahir</label>
                <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" value="<?php echo $data[0]->tmpt_lahir == NULL ? "-" : $data[0]->tmpt_lahir ?>" > 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-xl-3">
                <label for="basic-url">Alamat</label>
                <input type="text" class="form-control"  id="alamat" name="alamat"  value="<?php echo $data[0]->alamat == NULL ? "-" : $data[0]->alamat ?>">
              </div>
              <div class="col-xl">
                <label for="basic-url">RT</label>
                <input type="text" class="form-control"  id="rt" name="rt"  value="<?php echo $data[0]->rt == NULL ? "-" : $data[0]->rt  ?>">
              </div>
              <div class="col-xl">
                <label for="basic-url">RW</label>
                <input type="text" class="form-control"  id="rw" name="rw" value="<?php echo $data[0]->rw == NULL ? "-" : $data[0]->rw ?>" >
              </div>
              <div class="col-xl">
                <label for="basic-url">Nama Dusun</label>
                <input type="text" class="form-control"  id="nama_dusun" name="nama_dusun"  value="<?php echo $data[0]->nama_dusun == NULL ? "-" : $data[0]->nama_dusun ?>">
              </div>
              <div class="col-xl-2">
                <label for="basic-url">Kelurahan</label>
                <input type="text" class="form-control"  id="kelurahan" name="kelurahan"  value="<?php echo $data[0]->kelurahan == NULL ? "-" : $data[0]->kelurahan ?>">
              </div>
              <div class="col-xl-2">
                <label for="basic-url">Kecamatan</label>
                <input type="text" class="form-control"  id="kecamatan" name="kecamatan"  value="<?php echo $data[0]->kecamatan == NULL ? "-" : $data[0]->kecamatan ?>">
              </div>
              <div class="col-xl">
                <label for="basic-url">Kode Pos</label>
                <input type="text" class="form-control"  id="kode_pos" name="kode_pos"  value="<?php echo $data[0]->kode_pos == NULL ? "-" : $data[0]->kode_pos ?>">
              </div>


            </div>
          </div>
          <div class="form-group">
            <div class="row">

              <div class="col-xl">
                <label for="basic-url">Kab/Kota</label>
                <input type="text" class="form-control"  id="kab_kota" name="kab_kota"  value="<?php echo $data[0]->kab_kota == NULL ? "-" : $data[0]->kab_kota ?>">
              </div>
              <div class="col-xl-2">            
                <label for="basic-url">Provinsi</label>
                <input type="text" class="form-control"  id="Provinsi" name="provinsi"  value="<?php echo $data[0]->provinsi == NULL ? "-" :  $data[0]->provinsi ?>">
              </div>
              <div class="col-xl">
                <label for="basic-url">Jenis Tinggal</label>
                <input type="text" class="form-control"  id="jenis_tinggal" name="jenis_tinggal"  value="<?php echo $data[0]->jenis_tinggal == NULL ? "-" : $data[0]->jenis_tinggal ?>" >
              </div>
              <div class="col-xl">
                <label for="basic-url">Alat Transportasi</label>
                <input type="text" class="form-control"   id="alat_transport" name="alat_transport"  value="<?php echo $data[0]->alat_transport == NULL ? "-" : $data[0]->alat_transport ?>" >
              </div>
              <div class="col-xl">
                <label for="basic-url">TLP Rumah</label>
                <input type="number" class="form-control"  id="tlp_rumah" name="tlp_rumah"  value="<?php echo $data[0]->tlp_rumah == NULL ? "-" : $data[0]->tlp_rumah ?>">
              </div>
              <div class="col-xl">
                <label for="basic-url">TLP Pribadi</label>
                <input type="number" class="form-control"  id="tlp_pribadi" name="tlp_pribadi" value="<?php echo $data[0]->tlp_pribadi == NULL ? "-" : $data[0]->tlp_pribadi ?>">
              </div>
              <div class="col-xl-2">
                <label for="basic-url">Email</label>
                <input type="text" class="form-control"  id="email" name="email" value="<?php echo $data[0]->email == NULL ? "-" : $data[0]->email ?>">
              </div>
              <div class="col-xl">
                <label for="basic-url">Kewarganegaraan</label>
                <input type="text" class="form-control"  id="kewarganegaraan" name="kewarganegaraan"  value="<?php echo $data[0]->kewarganegaraan == NULL ? "-" : $data[0]->kewarganegaraan ?>" >
              </div>
              

            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-xl">
                <label for="basic-url">Penerima PKS</label>
                <input type="text" class="form-control"  id="penerima_pks" name="penerima_pks"  value="<?php echo $data[0]->penerima_pks == NULL ? "-" : $data[0]->penerima_pks ?>" >
              </div>
              <div class="col-xl">
                <label for="basic-url">No PKS</label>
                <input type="text" class="form-control"  id="no_pks" name="no_pks" value="<?php echo $data[0]->no_pks == NULL ? "-" : $data[0]->no_pks ?>" >
              </div>
              <div class="col-xl">
                <label for="basic-url">Prodi</label>
                <input type="text" class="form-control" id="prodi" name="prodi"  value="<?php echo  $data[0]->prodi == NULL ? "-" : $data[0]->prodi ?>" >
              </div>
              <div class="col-xl">
                <label for="basic-url">Fakultas</label>
                <input type="text" class="form-control" id="prodi" name="prodi"  value="<?php echo  $data[0]->fakultas == NULL ? "-" : $data[0]->prodi ?>" >
              </div>
              <div class="col-xl">
                <label for="basic-url">Jenis Pendaftaran</label>
                <input type="text" class="form-control"  id="jenis_pendaftaran" name="jenis_pendaftaran" value="<?php echo $data[0]->jenis_pendaftaran == NULL ? "-" : $data[0]->jenis_pendaftaran ?>" >
              </div>

              <div class="col-xl">
                <label for="basic-url">Tanggal Masuk Kuliah</label>
                <input type="date" class="form-control"  id="tgl_masuk_kuliah" name="tgl_masuk_kuliah" value="<?php echo $data[0]->tgl_masuk_kuliah == NULL ? "-" : $data[0]->tgl_masuk_kuliah ?>" >
              </div>


            </div>
          </div>
          <div class="form-group">
            <div class="row">

              <div class="col-xl">
                <label for="basic-url">Tahun Masuk Kuliah</label>
                <input type="text" class="form-control"  id="tahun_masuk_kuliah" name="tahun_masuk_kuliah"  value="<?php echo $data[0]->tahun_masuk_kuliah == NULL ? "-" : $data[0]->tahun_masuk_kuliah ?>" >
              </div>
              <div class="col-xl">
                <label for="basic-url">Pembiayaan</label>
                <input type="text" class="form-control"  id="pembiayaan" name="pembiayaan"  value="<?php echo $data[0]->pembiayaan == NULL ? "-" : $data[0]->pembiayaan ?>" >
              </div>
              <div class="col-xl">
                <label for="basic-url">Jalur Masuk</label>
                <input type="text" class="form-control"  id="jalur_masuk" name="jalur_masuk"  value="<?php echo $data[0]->jalur_masuk == NULL ? "-" : $data[0]->jalur_masuk ?>" >
              </div>
              <div class="col-xl">
                <label for="basic-url">Tingkat</label>
                <input type="text" class="form-control"  id="tingkat" name="tingkat"  value="<?php echo $data[0]->tingkat == NULL ? "-" : $data[0]->tingkat ?>"readonly >
              </div>
              <div class="col-xl">
                <label for="basic-url">Angkatan</label>
                <input type="text" class="form-control" id="angkatan" name="angkatan"   value="<?php echo $data[0]->angkatan == NULL ? "-" : $data[0]->angkatan ?>" readonly>
              </div>
              <div class="col-xl">
                <label for="basic-url">Status</label>
                <input type="text" class="form-control" id="status" name="status"   value="<?php echo $data[0]->status == NULL ? "-" : $data[0]->status ?>"readonly >
              </div>
            </div>
          </div>

          <br>
          <br>
          <h3> DATA ORANG TUA </h3>
          <br>
          <div class="form-group">
            <div class="row">

              <div class="col-xl">
               <input type="hidden" class="form-control" id="id_ortu" name="id_ortu" value="<?php echo $data[0]->id_ortu ?>" >
               <input type="hidden" class="form-control" id="nik_praja">
               <input type="hidden" class="form-control" id="nama">
               <label for="basic-url">Nama Ayah</label>
               <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"   value="<?php echo $data[0]->nama_ayah == NULL ? "-" : $data[0]->nama_ayah ?>" >
             </div>
             <div class="col-xl">
               <label for="basic-url">NIK Ayah</label>
               <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" value="<?php echo $data[0]->nik_ayah == NULL ? "-" : $data[0]->nik_ayah ?>" >
             </div>
             <div class="col-xl">
              <label for="basic-url">Tanggal Lahir Ayah </label>
              <input type="date" class="form-control" id="tgllahir_ayah" name="tgllahir_ayah" value="<?php echo $data[0]->tgllahir_ayah == NULL ? "-" : $data[0]->tgllahir_ayah ?>" >
            </div>
            <div class="col-xl">
             <label for="basic-url">No Tlp Ayah</label>
             <input type="text" class="form-control" id="tlp_ayah" name="tlp_ayah" value="<?php echo $data[0]->tlp_ayah == NULL ? "-" : $data[0]->tlp_ayah ?>" >
           </div>

           <div class="col-xl">
            <label for="basic-url">Pekerjaan Ayah</label>

            <select class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" >
             <option value="<?php echo $data[0]->pekerjaan_ayah == NULL ? "-" : $data[0]->pekerjaan_ayah ?>"><?php echo $data[0]->pekerjaan_ayah == NULL ? "-" : $data[0]->pekerjaan_ayah ?>
             <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
             <option value="Nelayan">Nelayan</option>
             <option value="Petani">Petani</option>
             <option value="Peternak">Peternak</option>
             <option value="Karyawan Swasta">Karyawan Swasta</option>
             <option value="Pedagang Kecil">Pedagang Kecil</option>
             <option value="Pedagang Besar">Pedagang Besar</option>
             <option value="Wiraswasta">Wiraswasta</option>
             <option value="Wirausaha">Wirausaha</option>
             <option value="Buruh">Buruh</option>
             <option value="Pensiunan">Pensiunan</option>
             <option value="Tidak Bekerja">Tidak Bekerja</option>
             <option value="Lainnya">Lainnya</option>

           </select>


         </div>

         <div class="col-xl">
          <label for="basic-url">Pengahasilan Ayah</label>
          <!-- <input type="text" class="form-control" value="<?php echo $data[0]->penghasilan_ayah == NULL ? "-" : $data[0]->penghasilan_ayah ?>" readonly> -->
          <select class="form-control" name="penghasilan_ayah" id="penghasilan_ayah" >
           <option value="<?php echo $data[0]->penghasilan_ayah == NULL ? "-" : $data[0]->penghasilan_ayah ?>"><?php echo $data[0]->penghasilan_ayah == NULL ? "-" : $data[0]->penghasilan_ayah ?>
           <option value="kurang dari Rp. 500.000">kurang dari Rp. 500.000</option>
           <option value="Rp. 500.000 s/d Rp. 999.999">Rp. 500.000 s/d Rp. 999.999</option>
           <option value="Rp. l.000.000 s/d Rp. l.999.999">Rp. l.000.000 s/d Rp. l.999.999</option>
           <option value="Rp. l.000.000 s/d Rp. 4.999.999">Rp. l.000.000 s/d Rp. 4.999.999</option>
           <option value="Rp. 5.000.000 s/d Rp. 7.499.999">Rp. 5.000.000 s/d Rp. 7.499.999</option>
           <option value="Rp. 7.500.000 s/d Rp. 9.999.999">Rp. 7.500.000 s/d Rp. 9.999.999</option>
           <option value="Lebih dari Rp. l0.000.000">Lebih dari Rp. l0.000.000</option>
         </select>
       </div>
     </div>
     <br>
     <div class="form-group">
       <div class="row">
         <div class="col-xl">
          <label for="basic-url">Nama Ibu</label>
          <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?php echo $data[0]->nama_ibu == NULL ? "-" : $data[0]->nama_ibu ?>" >
        </div>
        <div class="col-xl">
          <label for="basic-url">NIK Ibu</label>
          <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" value="<?php echo $data[0]->nik_ibu == NULL ? "-" : $data[0]->nik_ibu ?>" >
        </div>
        <div class="col-xl">
          <label for="basic-url">Tanggal Lahir Ibu </label>
          <input type="date" class="form-control" id="tgllahir_ibu" name="tgllahir_ibu" value="<?php echo $data[0]->tgllahir_ibu == NULL ? "-" : $data[0]->tgllahir_ibu ?>" >
        </div>
        <div class="col-xl">
          <label for="basic-url">No Tlp Ibu</label>
          <input type="text" class="form-control" id="tlp_ibu" name="tlp_ibu" value="<?php echo $data[0]->tlp_ibu == NULL ? "-" :  $data[0]->tlp_ibu ?>" >
        </div>
        <div class="col-xl">
          <label for="basic-url">Pekerjaan Ibu</label>
          <select class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" >
           <option value="<?php echo $data[0]->pekerjaan_ibu == NULL ? "-" : $data[0]->pekerjaan_ibu ?>"><?php echo $data[0]->pekerjaan_ibu == NULL ? "-" : $data[0]->pekerjaan_ibu ?>
           <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
           <option value="Nelayan">Nelayan</option>
           <option value="Petani">Petani</option>
           <option value="Peternak">Peternak</option>
           <option value="Karyawan Swasta">Karyawan Swasta</option>
           <option value="Pedagang Kecil">Pedagang Kecil</option>
           <option value="Pedagang Besar">Pedagang Besar</option>
           <option value="Wiraswasta">Wiraswasta</option>
           <option value="Wirausaha">Wirausaha</option>
           <option value="Buruh">Buruh</option>
           <option value="Pensiunan">Pensiunan</option>
           <option value="Pensiunan">Ibu Rumah Tangga</option>
           <option value="Tidak Bekerja">Tidak Bekerja</option>
           <option value="Lainnya">Lainnya</option>
           <!--  <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?php echo $data[0]->pekerjaan_ibu == NULL ? "-" : $data[0]->pekerjaan_ibu ?>" > -->
         </select>
       </div>
       <div class="col-xl">
        <label for="basic-url">Pengahasilan Ibu</label>
                  <!-- <input type="text" class="form-control" value="<?php echo $data[0]->penghasilan_ibu == NULL ? "-" :  $data[0]->penghasilan_ibu ?>" >
                  -->       
                  <select class="form-control" name="penghasilan_ibu" id="penghasilan_ibu" >
                   <option value="<?php echo $data[0]->penghasilan_ibu== NULL ? "-" : $data[0]->penghasilan_ibu?>"><?php echo $data[0]->penghasilan_ibu == NULL ? "-" : $data[0]->penghasilan_ibu?>
                   <option value="kurang dari Rp. 500.000">kurang dari Rp. 500.000</option>
                   <option value="Rp. 500.000 s/d Rp. 999.999">Rp. 500.000 s/d Rp. 999.999</option>
                   <option value="Rp. l.000.000 s/d Rp. l.999.999">Rp. l.000.000 s/d Rp. l.999.999</option>
                   <option value="Rp. l.000.000 s/d Rp. 4.999.999">Rp. l.000.000 s/d Rp. 4.999.999</option>
                   <option value="Rp. 5.000.000 s/d Rp. 7.499.999">Rp. 5.000.000 s/d Rp. 7.499.999</option>
                   <option value="Rp. 7.500.000 s/d Rp. 9.999.999">Rp. 7.500.000 s/d Rp. 9.999.999</option>
                   <option value="Lebih dari Rp. l0.000.000">Lebih dari Rp. l0.000.000</option>
                 </select>
               </div>
             </div>
           </div>

           <br>
           <br>
           <h3> DATA WALI </h3>
           <br>
           <div class="form-group">
             <div class="row">
              <div class="col-xl">
                <input type="hidden" class="form-control" id="id_wali" name="id_wali" value="<?php echo $data[0]->id_wali ?>" >
                <input type="hidden" class="form-control" id="nik_praja">
                <input type="hidden" class="form-control" id="nama">
                <label for="basic-url">Nama Wali</label>
                <input type="text" class="form-control" id="nama_wali" name="nama_wali"  value="<?php echo $data[0]->nama_wali == NULL ? "-" : $data[0]->nama_wali ?>" >
              </div>
              <div class="col-xl">
                <label for="basic-url">NIK Wali</label>
                <input type="text" class="form-control" id="nik_wali" name="nik_wali" value="<?php echo $data[0]->nik_wali == NULL ? "-" :  $data[0]->nik_wali ?>" >
              </div>
              <div class="col-xl">

                <label for="basic-url">Tanggal Lahir Wali </label>
                <input type="date" class="form-control" id="tgllahir_wali" name="tgllahir_wali" value="<?php echo $data[0]->tgllahir_wali == NULL ? "-" : $data[0]->tgllahir_wali ?>" >
              </div>
              <div class="col-xl">

                <label for="basic-url">No Tlp Wali</label>
                <input type="text" class="form-control" id="tlp_wali" name="tlp_wali" value="<?php echo $data[0]->tlp_wali == NULL ? "-" : $data[0]->tlp_wali ?>" >
              </div>
              <div class="col-xl">

                <label for="basic-url">Pendidikan Wali</label>
                <input type="text" class="form-control" id="pendidikan_wali" name="pendidikan_wali" value="<?php echo $data[0]->pendidikan_wali == NULL ? "-" :  $data[0]->pendidikan_wali ?>" >
              </div>
              <div class="col-xl">

                <label for="basic-url">Pekerjaan Wali</label>
                <select class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" >
                 <option value="<?php echo $data[0]->pekerjaan_wali == NULL ? "-" : $data[0]->pekerjaan_wali ?>"><?php echo $data[0]->pekerjaan_wali == NULL ? "-" : $data[0]->pekerjaan_wali ?>
                 <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                 <option value="Nelayan">Nelayan</option>
                 <option value="Petani">Petani</option>
                 <option value="Peternak">Peternak</option>
                 <option value="Karyawan Swasta">Karyawan Swasta</option>
                 <option value="Pedagang Kecil">Pedagang Kecil</option>
                 <option value="Pedagang Besar">Pedagang Besar</option>
                 <option value="Wiraswasta">Wiraswasta</option>
                 <option value="Wirausaha">Wirausaha</option>
                 <option value="Buruh">Buruh</option>
                 <option value="Pensiunan">Pensiunan</option>
                 <option value="Pensiunan">Ibu Rumah Tangga</option>
                 <option value="Tidak Bekerja">Tidak Bekerja</option>
                 <option value="Lainnya">Lainnya</option>
             
               </select>
            

             </div>

             <div class="col-xl">
              <label for="basic-url">Pengahasilan Wali</label>

              <select class="form-control" name="penghasilan_wali" id="penghasilan_wali" >
               <option value="<?php echo $data[0]->penghasilan_wali== NULL ? "-" : $data[0]->penghasilan_wali?>"><?php echo $data[0]->penghasilan_wali == NULL ? "-" : $data[0]->penghasilan_wali?>
               <option value="kurang dari Rp. 500.000">kurang dari Rp. 500.000</option>
               <option value="Rp. 500.000 s/d Rp. 999.999">Rp. 500.000 s/d Rp. 999.999</option>
               <option value="Rp. l.000.000 s/d Rp. l.999.999">Rp. l.000.000 s/d Rp. l.999.999</option>
               <option value="Rp. l.000.000 s/d Rp. 4.999.999">Rp. l.000.000 s/d Rp. 4.999.999</option>
               <option value="Rp. 5.000.000 s/d Rp. 7.499.999">Rp. 5.000.000 s/d Rp. 7.499.999</option>
               <option value="Rp. 7.500.000 s/d Rp. 9.999.999">Rp. 7.500.000 s/d Rp. 9.999.999</option>
               <option value="Lebih dari Rp. l0.000.000">Lebih dari Rp. l0.000.000</option>

             </select>
           </div>
         </div>
       </div>
       <div class="form-group">
         <div class="row">
           <div class="col-xl">
            <br>
            <button type="submit" class="btn btn-warning" value="Cek">Ubah</button>
            <a href="<?php echo base_url('d_praja'); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
          </div>
        </div>
      </div>
      <br>
    </form>
    <br>


  </div>
</div>
<!-- end panel-body -->
</div>
<!-- end panel -->
</div>
<!-- end col-xl-l0 -->
</div>
</div>

<script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>